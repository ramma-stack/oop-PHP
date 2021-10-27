<?php
function direct($url){
 header("Location:{$url}");
}

function in($i){
    global $session;
    // echo $session->get_user_logged();
    // echo $session->rule;
    if($i == 0){
        if($session->get_user_logged()){
            direct("index.php");
        }
    }
    
    if($i == 1){
        if(!$session->get_user_logged()){
            direct("login.php");
        }
    }

    if($i == 2){
        if((!$session->get_user_logged() || $session->get_user_logged()) && $session->rule == 0){
            direct("../public/index.php");
        }
    }

    if(isset($_GET['logout'])){
        $session->logout();
        direct("login.php");
    }

}
?>