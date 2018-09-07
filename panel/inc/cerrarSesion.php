<?php
    @session_start();
    if(session_destroy()){
        $_SESSION = array();        
        header('Location: /panel/login');
    }else{
        header('Location: /panel/panel');
    }