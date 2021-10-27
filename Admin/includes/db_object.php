<?php

    class db_object{

        public function viwe_all($condition){
            $vars = static::propertis();
            $array = array_keys($vars);
            $primery = $array[0];

            if($condition == 0){
                return static::query_pros("SELECT * FROM ".static::$table_name." ORDER BY `$primery` DESC ");
            }else{
                return static::query_pros("SELECT * FROM ".static::$table_name." WHERE $condition ORDER BY `$primery` DESC ");;
            }
        }

        public function propertis(){

            $prop = array();
            global $db;
            foreach(static::$array as $arr){
                if(property_exists($this , $arr)){
                    if($arr != 'password'){
                        $prop[$arr] = $db->secure($this->$arr);
                    }else{
                        $prop[$arr] = $db->secure(hash('gost',$this->$arr));
                    }
                }
            }
            return $prop;
        }

        public function viwe_id($condition){
            $query = static::query_pros("SELECT * FROM ".static::$table_name." WHERE $condition");
            return !empty($query) ? array_shift($query): false;
        }

        public function verify($username , $password){
            $password = hash('gost',$password);
            $query = $this->query_pros("SELECT * FROM ".static::$table_name." WHERE `username` = '$username' and `password` = '$password'");
            $vars = new $this;
            foreach ($query as $key) {
                $vars = $key;
            }
            return !empty($query) ? $vars : false;
        } 
        
        public function convert_var($row){
           $allVar = new static;
           $class_vars = get_object_vars($this);
           foreach ($row as $var => $value) {
               if(array_key_exists($var,$class_vars)){
                   $allVar->$var = $value;
               }
           }
           return $allVar;
        }

        public function query_pros($sql){
            global $db;
            $query = $db->query($sql);
            $array_row = array();
            while($row = mysqli_fetch_assoc($query)){
                $array_row[] = $this->convert_var($row);
            }
            return $array_row;
        }

        public function create(){
            global $db;
            $vars = static::propertis();
            $query = $db->query("INSERT INTO ".static::$table_name." (".implode(',',array_keys($vars)).") VALUES ('".implode("','",array_values($vars))."')");
            if($query){
                return true;
             }else{
                 return false;
             }
        }

        public function update($id){
            global $db;
            $vars = static::propertis();
            $update_arr = array();
            foreach ($vars as $key => $value) {
                $update_arr[] = $key."='$value'";
            }
            $array = array_keys($vars);
            $primery = $array[0];
            $query = $db->query("UPDATE ".static::$table_name." SET ".implode(',',array_values($update_arr))." WHERE `$primery` = '$id'");
            if($query){
                return true;
             }else{
                 return false;
             }
        }

        public function delete($condition){
            global $db;
            $query = $db->query("DELETE FROM ".static::$table_name." WHERE $condition");
            if($query){
                return true;
            }else{
                return false;
            }
        }
    }

    $db_object = new db_object();

?>