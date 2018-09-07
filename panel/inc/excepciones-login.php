<?php 
   @session_start();
    
    $root = $_SERVER['DOCUMENT_ROOT'];
    require_once ($root.'/inc/config.php');
    require ($root.'/inc/objetos/usuario.php');
    
    $_SESSION[ACCESS] = "";// variable de sesión 

    $metodo = $_SERVER['REQUEST_METHOD'];
    if($metodo == "POST"){
        $objUsuario = new Usuario;
        $objUsuario->setUser($_POST['user']);
        $objUsuario->setPass($_POST['pass']);
        $usuario = $objUsuario->valida();
       
       //validar usuario y crear variables de sesión para el usuario
       if($usuario[0]['valida'] == true){
            $_SESSION[ACCESS] = 1;
            $_SESSION[ID] = $usuario[0]['id'];
            $_SESSION[USUARIO] = $usuario[0]['usuario'];
            $_SESSION[ROL] = $usuario[0]['rol'];
            header('Location: /panel/panel');
       }//valida usuario

    }//metodo post