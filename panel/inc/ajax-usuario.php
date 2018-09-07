<?php 
    @session_start();
    $root = $_SERVER['DOCUMENT_ROOT'];
    require_once ($root.'/inc/objetos/usuario.php');

    $envio =  $_POST['envio'];
    $objUsuario = new Usuario;

    //crea usuario en la base de datos
    if($envio == "crea"){
        
        $array = array();

        //verifica que el usuario cuente con privilegios de administrador
        if($_SESSION[ROL] == 2 or $_SESSION[ROL] == 3){
            
            $objUsuario->setUser($_POST['usuarioCrea']);
            
            //busca usuario en la base de datos para verificar que no exista
            //si no encuentra el usuario en la base de datos procede a registrarlo
            if(!$objUsuario->muestraExistente()){
                
                //colocar valor a variables de objeto usuario
                $objUsuario->setPass($_POST['passCrea']);
                $objUsuario->setRol($_POST['rolCrea']);
                
                //crear usuario en la base de datos
                if($objUsuario->crea()){
                    
                    array_push($array,array("success"=>true,"message"=>"Usuario registrado exitosamente") );
                    
                }else{
                    
                    array_push($array,array("=>success"=>false,"message"=>"Ocurrio un error intentalo de nuevo"));
                    
                }//crea
            }else{
                //mostrar error usuario existente
                array_push($array,array("success"=>false,"message"=>"El usuario ya se encuentra registrado") );
                
            }//muestraExistente
        }else{
            array_push($array,array("success"=>false,"message"=>"Disculpa no cuentas con los permisos para crear usuarios"));
        }
        echo json_encode($array);
    }//crea

    //actualiza usuario en la base de datos
    if($envio == "actualiza"){
        
        $array = array();
        
        //verificar si las contraseñas coinciden
        if($_POST['actualizaConfirma'] == $_POST['actualizaContraseña']){
            
            //colocar valor a variables de objeto usuario
            $objUsuario->setId($_POST['actualizaId']);
            $objUsuario->setPass($_POST['actualizaContraseña']);
            
            if(isset($_POST['actualizaRol'])){
                $objUsuario->setRol($_POST['actualizaRol']);
                $resultado = $objUsuario->actualiza();
            }else{
                $resultado = $objUsuario->actualizaRol();
            }
            
            //actualizar usuario seleccionado
            if($resultado == true){
                //mostrar mensaje contraseña actualizada correctamente
                array_push($array,array("success"=>true,"message"=>'Usuario actualizado correctamente'));
            }else{
                //mostrar error actualización fallida
                array_push($array,array("success"=>false,"message"=>"Ocurrio un error intentalo de nuevo"));
            }
        }else{
            //mostrar error las contraseñas no coinciden
            array_push($array,array("success"=>false,"message"=>"Las contraseñas no coinciden"));
        }
        echo json_encode($array);

    }//actualiza

    //elimina usuario de la base de datos
    if($envio == "elimina"){
        $array= array();
        if($_SESSION[ID] != $_POST['id']){
            $objUsuario->setId($_POST['id']);
            if($objUsuario->elimina()){
                array_push($array,array("success"=>true,"message"=>"Usuario eliminado correctamente"));
            }else{
                array_push($array,array("success"=>false,"message"=>"Ocurrio un error intentalo de nuevo"));
            }
        }else{
            array_push($array,array("success"=>false,"message"=>"No puedes eliminar tu propio usuario"));
        }
        echo json_encode($array);
    }//elimina

    //recarga usuarios existente
    if($envio == "recargaUsuarios"){
        $objUsuario = new Usuario;
        $usuarios = $objUsuario->muestraTodos();
        echo json_encode($usuarios);
    }//recarga