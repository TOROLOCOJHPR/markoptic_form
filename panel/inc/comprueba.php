<?php 
    session_start();
    $root = $_SERVER['DOCUMENT_ROOT'];
    require ($root.'/inc/config.php');
    
    if($_SESSION[ACCESS] == ""){
        header("Location: /panel/login");
    }

    if( isset($_SESSION[TIME]) ) {

        //Tiempo en segundos para dar vida a la sesión.
        $inactivo = 3600;//10min en este caso.

        //Calculamos tiempo de vida inactivo.
        $vida_session = time() - $_SESSION[TIME];
        //echo time();
        //Compraración para redirigir página, si la vida de sesión sea mayor a el tiempo insertado en inactivo.
        if($vida_session > $inactivo)
        {
            //Removemos sesión.
            session_unset();
            //Destruimos sesión.
            session_destroy();              
            //Redirigimos pagina.
            header("Location: /panel/login");

            exit();
        }
    }
    $_SESSION[TIME] = time();
    
?>