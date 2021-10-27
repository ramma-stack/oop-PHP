<?php

    class Upload extends db_object{
        
        protected static $table_name = 'post';
        protected static $array = array('post_id','user_id','title','price','fileName');
        public $post_id;
        public $user_id;
        public $title;
        public $price;
        public $fileName;
        public $fileType;
        public $fileTmpName;
        public $fileDirection = "../images/";
        public $fileError = array();
        public $file_arr = array(

           UPLOAD_ERR_OK => "تەواوە",
           UPLOAD_ERR_INI_SIZE => "تەواو نییە",
           UPLOAD_ERR_FORM_SIZE => "تەواو نییە",
           UPLOAD_ERR_PARTIAL=> "تەواو نییە",
           UPLOAD_ERR_NO_FILE => "تەواو نییە",
           UPLOAD_ERR_NO_TMP_DIR => "تەواو نییە",
           UPLOAD_ERR_CANT_WRITE => "تەواو نییە",
           UPLOAD_ERR_EXTENSION => "تەواو نییە",

        );

        public function set_image($image){
   
            $fileAllow = array('png','jpg','jpeg','gif');
            $fileExt = explode('.',$image['name']);
            $fileLowerExt = strtolower(end($fileExt));

            if(empty($image)){
                return $this->fileError = $this->file_arr[UPLOAD_ERR_NO_FILE];
            }elseif($image['error'] != 0){
                return $this->fileError = $this->file_arr[UPLOAD_ERR_PARTIAL];
            }elseif(!in_array($fileLowerExt , $fileAllow)){
                return $this->fileError = $this->file_arr[UPLOAD_ERR_EXTENSION];
            }else{
                $this->fileName = rand().$image['name'];
                $this->fileTmpName = $image['tmp_name'];
                return true;
            }
       }
       public function save(){
           if($this->post_id){
             echo "hello world!";
             global $db;
            if(!empty($this->fileError)){
                return $this->filError = $this->file_arr[UPLOAD_ERR_CANT_WRITE];
               }
               if(empty($this->fileName) || empty($this->fileTmpName)){
                return $this->filError = $this->file_arr[UPLOAD_ERR_NO_TMP_DIR];
               }

               $query = $db->query("SELECT * FROM ".static::$table_name." WHERE `post_id` = '$this->post_id'");
               while($row = mysqli_fetch_assoc($query)){
                   $image = $row['fileName'];
               }
               unlink("../images/$image");
               
               $direct = $this->fileDirection.$this->fileName;
               if(file_exists($direct)){
                return $this->filError = $this->file_arr[UPLOAD_ERR_NO_TMP_DIR];
               }
               if(move_uploaded_file($this->fileTmpName , $direct)){
                  if($this->update($this->post_id)){
                    unset($this->fileTmpName);
                    return true;
                  }
               }else{
                return $this->filError = $this->file_arr[UPLOAD_ERR_NO_TMP_DIR];
              }

           }else{
               if(!empty($this->fileError)){
                return $this->filError = $this->file_arr[UPLOAD_ERR_CANT_WRITE];
               }
               if(empty($this->fileName) || empty($this->fileTmpName)){
                return $this->filError = $this->file_arr[UPLOAD_ERR_NO_TMP_DIR];
               }
               $direct = $this->fileDirection.$this->fileName;
               if(file_exists($direct)){
                return $this->filError = $this->file_arr[UPLOAD_ERR_NO_TMP_DIR];
               }
               if(move_uploaded_file($this->fileTmpName , $direct)){
                  if($this->create()){
                    unset($this->fileTmpName);
                    return true;
                  }
               }else{
                return $this->filError = $this->file_arr[UPLOAD_ERR_NO_TMP_DIR];
              }
           }

        }
    }

        $upload = new Upload();    
?>