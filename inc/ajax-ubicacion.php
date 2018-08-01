<?php 
    require_once 'config.php';
    include 'objetos/ubicacion.php';

    $form = $_POST['form'];

    if($form == "muestraEstados"){
        $objUb = new Ubicacion;
        $objUb->setPais($_POST['id']);
    
        echo json_encode( $objUb->muestraEstados() );
    }

    if($form == "muestraCiudades"){
        $objUb = new Ubicacion;
        $objUb->setEstado($_POST['id']);

        echo json_encode( $objUb->muestraCiudades() );
    }
?>