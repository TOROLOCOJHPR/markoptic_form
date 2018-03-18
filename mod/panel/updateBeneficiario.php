<?php
    $fecha = date("-d-m-Y-H-i-s");
    $objBen->setNombre( trim( mb_strtolower($_POST['nombre']) ) );
    $objBen->setApellidos(trim( mb_strtolower($_POST['apellido']) ) );
    $objBen->setSexo($_POST['sexo']);
    $objBen->setNacimiento($_POST['fNacimiento']);
    $objBen->setCiudad($_POST['ciudad']);
    $objBen->setCalle( trim( mb_strtolower($_POST['calle']) ) );
    $objBen->setColonia( trim( mb_strtolower($_POST['colonia']) ) );
    $objBen->setCp($_POST['cp']);
    $objBen->setTelefono($_POST['tel']);
    $objBen->setEmail($_POST['email']);
    //comprobamos si el beneficiario cuenta con un tutor
    if($_POST['independiente'] != 0){
        //$objBen->setIndependiente($_POST['independiente']);
        $objBen->setNombreTutor( trim( mb_strtolower($_POST['nombreTut']) ) );
        $objBen->setApellidoTutor( trim( mb_strtolower($_POST['apellidoTut']) ) );
        $objBen->setSexoTutor($_POST['sexoTut']);
        $objBen->setViveBen($_POST['viveBen']);
        $objBen->setParentesco($_POST['parentesco']);
        $objBen->setNacimientoTutor($_POST['fNacimientoTut']);
        $objBen->setTelTutor($_POST['telTut']);
        $objBen->setEmailTutor($_POST['emailTut']);
        //echo "id Tutor".$_POST['idTut']."<br>";
        $compruebaTut = $objBen->updateDatosTut($_POST['idTut'],$_POST['idBen']);
    }
    $objBen->setDispositivo($_POST['solicitud']);
    $objBen->setCondicion($_POST['condicion']);
    $objBen->setIdMedioDifusion($_POST['medio']);
    //comprobamos si el medio requiere descripción
    if( isset( $_POST['medioOtro'] ) ){
        $objBen->setDescMedioDif($_POST['medioOtro']);
    }
    $objBen->setDescObtencion( trim( mb_strtolower($_POST['breveDescripcion']) ) ); 
    $objBen->setEstatusSolicitud($_POST['estatus']);
    //$objBen->mostrar();
    $compruebaBen = $objBen->updateDatosBen($_POST['idBen']);
    //echo  $_POST['id'];
    $compruebaSol = $objBen->updateDatosSol($_POST['id']);
    for($i=1; $i<=4; $i++){
        if( $i == 4){
            $getFile="fotoHistoria";
            $url = "imagenes/uploads/beneficiados/";
            $num = rand(1,100);
            $nombre = $_POST['id']."-".$num;
        }else{
            $getFile="foto".$i;
            $url = "imagenes/uploads/";
            $nombre = $getFile.$fecha;
        }
        if( $_FILES[$getFile]['name'] != ""){
            //$func ="setFoto".$i;
            $tmp = explode(".", $_FILES[$getFile]['name']);
            $imageFileType = end($tmp);
            $add= $nombre.".".$imageFileType;
            //$file_name = $_FILES[$getFile]['name'];
            /*${"foto".$i} = $add;
            echo ${"foto".$i};*/
            if($_POST[$getFile] != ""){
                unlink($url.$_POST[$getFile]);
                // unlink('imagenes/uploads/'.$_POST[$getFile]);
            }
            move_uploaded_file ($_FILES[$getFile]['tmp_name'],$url.$add);
            // move_uploaded_file ($_FILES[$getFile]['tmp_name'],"imagenes/uploads/".$add);
            $objBen->updateFotoBen($_POST['id'],$add,$getFile);
        }
    }
    if($_POST['independiente'] != 0){
        $notificacion = ($compruebaBen and $compruebaSol and $compruebaTut) ? "Datos Actualizados" : "Ocurrio un error intentalo de nuevo";
        $classNotificacion = ($compruebaBen and $compruebaSol and $compruebaTut) ? "bg-success" : "bg-danger";
    } else{
        $notificacion = ($compruebaBen and $compruebaSol) ? "Datos Actualizados" : "Ocurrio un error intentalo de nuevo";
        $classNotificacion = ($compruebaBen and $compruebaSol) ? "bg-success" : "bg-danger";
    }
?>
<h3 class="text-white p-4 <?php echo $classNotificacion; ?>"><?php echo $notificacion; ?></h3>
