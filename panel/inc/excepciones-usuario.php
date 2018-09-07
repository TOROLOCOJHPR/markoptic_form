<?php
    $root = $_SERVER['DOCUMENT_ROOT'];// tomar la ruta hacía el directorio raíz
    $metodo = $_SERVER['REQUEST_METHOD'];

    require_once ($root.'/inc/objetos/rol.php');
    require_once ($root.'/inc/objetos/usuario.php');

    $objUsuario = new Usuario;










    $objRol = new Rol;
    $roles = $objRol->muestraTodos();

    $objUsuario = new Usuario;
    $usuarios = $objUsuario->muestraTodos();

    /*-- errores de usuario crea--*/
    $creaExistente = 0;
    $creaFalse = 0;
    $creaTrue = 0;

    /*-- errores de usuario actualiza contraseña--*/
    $actualizaPassContraseña = 0;
    $actualizaPassFalse = 0;
    $actualizaPassTrue = 0;

    /*-- errores de usuario actualiza rol --*/
    $actualizaRolFalse = 0;
    $actualizaRolTrue = 0;


    /*-- $errore de usuario elimina --*/
    $eliminaConfirma = 0;
    $eliminaFalse = 0;
    $eliminaTrue = 0;


    // if($metodo == "POST"){

    // //determinar de que formulario procede la consulta    
    //     $envio = $_POST['envio'];//crear, actualizar, eliminar
        
    // //-- crea usuario nuevo en la base de datos
    //     if($envio == "crea"){
            
    //         //busca usuario en la base de datos para verificar que no exista
    //         if(!$objUsuario->muestraExistente()){
                
    //             //colocar valor a variables de objeto usuario
    //             $objUsuario->setUser($_POST['usuarioCrea']);
    //             $objUsuario->setPass($_POST['passCrea']);
    //             $objUsuario->setRol($_POST['rolCrea']);
                
    //             //crear usuario en la base de datos
    //             if($objUsuario->crea()){
                    
    //                 //eliminar valor de variables almacenadas en el método post
    //                 $_POST['usuarioCrea'] = "";
    //                 $_POST['passCrea'] = "";
    //                 $_POST['rolCrea'] = "";
                    
    //                 //mostrar mensaje usuario creado exitosamente
    //                 $creaTrue = 1;

    //             }else{

    //                 //mostrar error inserción fallida 
    //                 $creaFalse = 1;

    //             }//crea

    //         }else{

    //             //mostrar error usuario existente
    //             $creaExistente = 1;
            
    //         }//muestraExistente

    //     }//-- envío crear


    // //-- actualiza contraseña de usuario en la base de datos
    //     if($envio == "actualizaPass"){
            
    //         //verificar si las contraseñas coinciden
    //         if($_POST['passActualizaPass'] == $_POST['confirmaActualizaPass']){

    //             //colocar valor a variables de objeto usuario
    //             $objUsuario->setId($_POST['usuarioActualizaPass']);
    //             $objUsuario->setPass($_POST['passActualizaPass']);

    //             //actualizar contraseña de usuario seleccionado
    //             if($objUsuario->actualizaPass()){

    //                 //mostrar mensaje contraseña actualizada correctamente
    //                 $actualizaPassTrue = 1;
    //                 $_POST['usuarioActualizaPass'] = "";
    //                 $_POST['passActualizaPass'] = "";
    //                 $_POST['confirmaActualizaPass'] = "";

    //             }else{

    //                 //mostrar error actualización fallida
    //                 $actualizaPassFalse = 1;

    //             }
            
    //         }else{
            
    //             //mostrar error las contraseñas no coinciden
    //             $actualizaPassContraseña = 1;

    //         }

    //     }// --envío actualizarPass

    // //-- actualiza rol del usuario en la base de datos
    //     if($envio == "actualizaRol"){
            
    //         //colocar valor a variables de objeto usuario
    //         $objUsuario->setId($_POST['usuarioActualizaRol']);
    //         $objUsuario->setRol($_POST['rolActualizaRol']);
            
    //         //actualizar rol del usuario
    //         if($objUsuario->actualizaRol()){

    //             //mostrar mensaje rol actualizado correctamente
    //             $actualizaRolTrue = 1;
    //             $_POST['usuarioActualizaRol'] = "";
    //             $_POST['rolActualizaRol'] = "";
    //         }else{
    //             //mostrar error actualización fallida
    //             $actualizaRolFalse = 1;
    //         }

    //     }//-- actualiza rol del usuario en la base de datos

    // //-- eliminar usuario de la base de datos
    //     if($envio == "elimina"){
            
    //         //verificar si se confirmo la eliminación del usuario
    //         if(isset($_POST['confirmaElimina'] )){
                
    //             //colocar valor a variables de objeto usuario
    //             $objUsuario->setId($_POST['usuarioElimina']);
                
    //             //eliminar usuario de la base de datos
    //             if( $objUsuario->elimina() ){   
                    
    //                 //mostrar mensaje usuario eliminado correctamente
    //                 $eliminaTrue = 1;
    //                 $_POST['usuarioElimina'] = "";

    //             }else{

    //                 //mostrar error eliminación fallida
    //                 $eliminaFalse = 1;
                
    //             }

    //         }else{

    //             //mostrar error confirma la eliminación de usuario
    //             $eliminaConfirma = 1;

    //         }
    //     }//-- eliminar
    
    // }//método post