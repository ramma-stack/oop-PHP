<?php

    class User extends db_object{

        protected static $table_name = 'user';
        protected static $array = array('id','username','password','email','rule');
        public $id;
        public $username;
        public $password;
        public $email;
        public $rule;

    }

        $user = new User();    
?>