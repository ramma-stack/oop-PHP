<?php

    class connection{

        public $db;

        public function __construct(){
           $this->sql_connect();
        }

        public function sql_connect(){

            // $this->db = mysqli_connect('localhost','root','','home');
            $this->db = new mysqli('localhost','root','','home');
            if(!$this->db){
              exit("connect nya brakam" + $this->db->connect_error);
            }
        }

        public function query($sql){
            
            $query = $this->db->query($sql);
            if(!$query){
                exit("data bwny nya");
            }
            return $query;
        }
         
        public function secure($data){
            $var = $this->db->real_escape_string(htmlspecialchars($data));
            return $var;
        }
    }

    $db = new connection();

?>