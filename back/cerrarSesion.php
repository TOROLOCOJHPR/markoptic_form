<?php
    session_start();
    if(session_destroy()){
        $_SESSION = array();        
        header('Location: /login');
    }else{
        header('Location: /panel?m=1');
    }
?>