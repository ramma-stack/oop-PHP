<?php

class session{

    public $user_id;
    public $rule;
    private $user_logged = false;

    public function __construct(){
        session_start();
        $this->login_check();
    }

    public function get_user_logged(){
        return $this->user_logged;
    }

    public function login($user){
        $user ? $result = true :  $result = false;
        if($result){
            $this->user_id = $_SESSION['user_id'] = $user->id;
            $this->rule = $_SESSION['rule'] = $user->rule;
            $this->user_logged = true;
        }

    }

    public function logout(){
        unset($this->user_id);
        unset($this->rule);
        unset($_SESSION['user_id']);
        unset($_SESSION['rule']);
        $this->user_logged = false;
    }

    private function login_check(){
        if(isset($_SESSION['user_id']) && isset($_SESSION['rule'])){
            $this->user_id = $_SESSION['user_id'];
            $this->rule = $_SESSION['rule'];
            $this->user_logged = true;
            // echo "one";
        }else{
            // echo "tow";
            $this->logout();
        }
    }
}

$session = new session();

?>