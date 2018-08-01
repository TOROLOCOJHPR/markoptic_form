<?php 
    require_once 'config.php';
    include 'objetos/ubicacion.php';

    $form = $_POST['form'];

    if($form == "validaEmail"){
        $array = array();
        $dominio = explode('@',$_POST['email']);

        if(!checkdnsrr($dominio[1])){

            array_push($array,array("result"=>false));//email invalido
        
        }else{
                     
            array_push($array,array("result"=>true));//email valido

        }
        
        echo json_encode( $array );
    
    }

    if($form == "muestraCiudades"){
        $objUb = new Ubicacion;
        $objUb->setEstado($_POST['id']);

        echo json_encode( $objUb->muestraCiudades() );
    }
?>