<?php

    $metodo = $_SERVER['REQUEST_METHOD'];
    require_once $root.'/inc/objetos/imagen.php';//incluir objeto imagen
    require_once $root.'/inc/objetos/beneficiario.php';//incluir objeto beneficiario
    require_once $root.'/inc/objetos/solicitud.php';// incluir objeto solicitud
    require_once $root.'/inc/objetos/estatus.php';// incluir objeto estatus solicitud
    require_once $root.'/inc/objetos/ubicacion.php';//incluir objeto ubicación
    require_once $root.'/inc/objetos/dispositivo.php';//incluir objeto dispositivo
    require_once $root.'/inc/objetos/condicion.php';//incluir objeto condicion
    require_once $root.'/inc/objetos/medioDifusion.php';//incluir objeto medio de difusión
    require_once $root.'/inc/objetos/tutor.php';//incluir objeto tutor
    require_once $root.'/inc/objetos/parentesco.php';//incluir objeto parentesco
    require_once $root.'/inc/objetos/transaccion.php';//incluir objeto parentesco

    $idSolicitud = ($metodo == "GET") ? $_GET['b'] : $_POST['idSolicitud'];

    $objImagen = new Imagen;// crear nuevo objeto imagen
    $objImagen->setIdSolicitud($idSolicitud);// colocar valor a variable id solicitud
    
    $fotoHistoria = $objImagen->muestraFotoHistoria();
    
    $objSolicitud = new Solicitud;// crear nuevo objeto solicitud
    $objSolicitud->setId($idSolicitud);// colocar valor a variable id solicitud
    $solicitud = $objSolicitud->muestra();//datos de la solicitud del beneficiario
    $objSolicitud->setIdBen($solicitud['id']);
    $folioAntiguo = $objSolicitud->muestraFolioAntiguo();

    if($metodo == "POST"){

        if( $_FILES['fotoUpload']['name'] != "" ){
            $objImagen->setFoto($_FILES['fotoUpload']);
            $objImagen->crea();
        }
        // seleccionar fotografía de historia del beneficiario
        if(isset($_POST['historia'])){
            $objImagen->setFoto($_POST['historia']);
            if($fotoHistoria[0]['id'] == ""){
                $objImagen->creaFotoHistoria();
            }else{
                $objImagen->setIdFotoHistoria($fotoHistoria[0]['id']);
                $objImagen->actualizaFotoHistoria();
            }
        }
        // $imagenes = $objImagen->muestra();// imágenes del beneficiario
        
        $objBeneficiario = new Beneficiario;
        
        //otorgar valor a atributos del objeto beneficiario
        //id de beneficiario
        $objBeneficiario->setId($solicitud['id']);
        //nombre
        $objBeneficiario->setNombre( trim( 
            mb_strtolower($_POST['nombre'] ) ) 
        );
        //apellido
        $objBeneficiario->setApellido( 
            trim( mb_strtolower($_POST['apellido'] ) ) 
        );
        //sexo
        $objBeneficiario->setSexo($_POST['sexo']);
        //nacimiento
        $objBeneficiario->setNacimiento($_POST['nacimiento']);
        //ciudad
        $objBeneficiario->setCiudad($_POST['ciudad']);
        //calle
        $objBeneficiario->setCalle( trim(
            mb_strtolower($_POST['calle'] ) ) 
        );
        //colonia
        $objBeneficiario->setColonia( trim( 
            mb_strtolower($_POST['colonia'] ) ) 
        );
        //código postal
        $objBeneficiario->setCp($_POST['cp']);
        //teléfono
        $objBeneficiario->setTelefono($_POST['telefono']);
        //email
        $objBeneficiario->setEmail($_POST['email']);
        //medio de descripción
        $objBeneficiario->setIdMedioDif($_POST['medio']);
        if(isset($_POST['medioOtro'])){
            //descripción del medio de difusión
            $objBeneficiario->setDescMedioDif( trim( 
                mb_strtolower($_POST['medioOtro'] ) ) 
            );
        }else{
            $objBeneficiario->setDescMedioDif("");
        }

        //otorgar valor a atributos del objeto solicitud
        //id solicitud
        $objSolicitud->setId($idSolicitud);
        //id beneficiario
        $objSolicitud->setIdBen($_POST['idBeneficiario']);
        // id condición
        $objSolicitud->setIdCondicion($_POST['condicion']);
        //id dispositivo
        $objSolicitud->setIdDispositivo($_POST['dispositivo']);
        //id estatus
        $objSolicitud->setIdEstatus($_POST['estatus']);
        //porque solicita el dispositivo
        $objSolicitud->setPorque(trim( 
                mb_strtolower($_POST['porque'])
            )
        );
        //fecha de la solicitud
        $objSolicitud->setFechaSolicitud($solicitud['fechaSolicitud']);

        //comprobar si el beneficiario cuenta con tutor
        if(isset($_POST['tutor'])){
            // echo "tutor con datos";
            $objTutor = new Tutor;
            //tutor id
            $objTutor->setIdBen($_POST['idBeneficiario']);
            //tutor nombre
            $objTutor->setNombre(
                trim( mb_strtolower( $_POST['tutNombre'] ) )
            );
            //tutor apellido
            $objTutor->setApellido(
                trim( mb_strtolower($_POST['tutApellido'] ) )
            );
            //tutor sexo
            $objTutor->setSexo($_POST['tutSexo']);
            //tutor vive con el beneficiario
            $objTutor->setViveBen($_POST['viveBen']);
            //tutor parentesco
            $objTutor->setParentesco($_POST['parentesco']);
            //tutor nacimiento
            $objTutor->setNacimiento($_POST['tutNacimiento']);
            //tutor teléfono
            $objTutor->setTelefono(
                trim($_POST['tutTelefono'])
            );
            //tutor email
            $objTutor->setEmail($_POST['tutEmail']);
            if($solicitud['independiente'] == 0){//el beneficiario cuenta con tutor
                //tutor id solicitud
                $objTutor->setId($solicitud['idTut']);

                //actualizar tutor en caso de que el beneficiario cuente con tutor
                $objTutor->actualiza();
            }else{//el beneficiario no cuenta con tutor

                //crear tutor en caso de que el beneficiario no cuente con tutor 
                $objTutor->crea();
            }
        }else{
            // echo "tutor sin datos";
        }

        if($objSolicitud->actualiza()){
            $success = true;
        }else{
            $success = false;
            $message = "La solicitud no pudo ser actualizada";
        }


        if($objBeneficiario->actualiza()){
            $success = true;
        }else{
            $success = false;
            $message = "El beneficiario no pudo ser actualizado";
        }
    
    $solicitud = $objSolicitud->muestra();//datos de la solicitud del beneficiario
    
    }//método post

    $imagenes = $objImagen->muestra();// imágenes del beneficiario
    


    $objEstatus = new Estatus;//crea nuevo objeto estatus
    $estatus = $objEstatus->muestraTodos();//traer todos los estatus de solicitud

    $objUbicacion = new Ubicacion;//crear nuevo objeto ubicación
    $paises = $objUbicacion->muestraPaises();//traer todos los países
    $objUbicacion->setPais($solicitud['idPais']);//colocar valor a id país
    $estados = $objUbicacion->muestraEstados();//traer todos los estados del país seleccionado
    $objUbicacion->setEstado($solicitud['idEstado']);//colocar valor a id estado
    $ciudades = $objUbicacion->muestraCiudades();//traer todas las ciudades del estado seleccionado

    $objDispositivo = new Dispositivo;// crear nuevo objeto dispositivo
    $dispositivos = $objDispositivo->muestraTodos();//traer todos los dispositivos

    $objCondicion = new Condicion;// crear nuevo objeto condicion
    $condiciones = $objCondicion->muestraTodos();// traer todas las condiciones

    $objMedio = new  MedioDifusion;//crear nuevo objeto medio difusión
    $medios = $objMedio->muestraTodos();// traer todos los medios de difusión 

    $objParentesco = new Parentesco;//crear nuevo objeto parentesco
    $parentescos = $objParentesco->muestraTodos();

    $objTransaccion = new  Transaccion;
    $objTransaccion->setIdSolicitud($idSolicitud);
    $transacciones = $objTransaccion->muestraTodosSolicitud();
 
    $fotoHistoria = $objImagen->muestraFotoHistoria();
    
    echo "<pre>";
        // print_r($solicitud);
    echo "</pre>";
    
    echo "<pre>";
        // print_r($_POST);
    echo "</pre>";