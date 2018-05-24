<?php 
session_start();
//variable con la cual se verifica si el usuario inicio sesión
if($_SESSION[''] == ""){
    header("Location: /login");
}

if( isset($_SESSION['tiempo']) ) {

    //Tiempo en segundos para dar vida a la sesión.
    $inactivo = 3600;//10min en este caso.

    //Calculamos tiempo de vida inactivo.
    $vida_session = time() - $_SESSION['tiempo'];
        //echo time();
        //Compraración para redirigir página, si la vida de sesión sea mayor a el tiempo insertado en inactivo.
        if($vida_session > $inactivo)
        {
            //Removemos sesión.
            session_unset();
            //Destruimos sesión.
            session_destroy();              
            //Redirigimos pagina.
            header("Location: /login");

            exit();
        }
}
$_SESSION['tiempo'] = time();