<?php
//incluir objetos
    include 'inc/objetos/ubicacion.php';
    include_once 'inc/objetos/beneficiario.php';
    include 'inc/objetos/tutor.php';
    include 'inc/objetos/parentesco.php';
    include 'inc/objetos/dispositivo.php';
    include 'inc/objetos/condicion.php';
    include 'inc/objetos/medioDifusion.php';
    include 'inc/objetos/solicitud.php';
    include 'inc/objetos/imagen.php';

//validar tipo de metodo de respuesta servidor
    $metodo = $_SERVER['REQUEST_METHOD'];
    
    //redirección en caso de que no se encuentre variable de formulario seleccionado
    if($metodo == "GET"){ //metodo == GET
        $d = ( !empty($_GET['dispositivo']) )? $_GET['dispositivo'] : header('Location: /solicitud');
    }elseif(!empty($_POST['formDispositivo'])){ //metodo == POST
        $d = ( isset( $_POST['formDispositivo'] ) ) ? $_POST['formDispositivo'] : header('Location: /solicitud');
    }else{
        header('Location: /solicitud');
    }

// inicialización de objetos
    $objUb = new Ubicacion;
    $objBen = new Beneficiario;
    $objTut = new Tutor;
    $objPar = new Parentesco;
    $objDis = new Dispositivo;
    $objCond = new Condicion;
    $objMedio = new MedioDifusion;
    $objSol = new Solicitud;

//variables para validar errores de usuario
    
    //variables error  beneficiario
    $enombre = 0;
    $eapellido = 0;
    $esexo = 0;
    $edate = 0;
    $edateMinima = 0;
    $edateNoPermitida = 0;
    $epais = 0;
    $eestado = 0;
    $eciudad = 0;
    $ecalle = 0;
    $ecolonia = 0;
    $ecp = 0;
    $etel = 0;
    $eemail = 0;
    $eemailValido = 0;
    
    
    //variables error tutor
    $tutorObligatorio = 0;
    $etutNombre = 0; 
    $etutApellido = 0; 
    $etutSexo = 0; 
    $etutVive = 0; 
    $etutParentesco = 0; 
    $etutDate = 0;
    $etutDateMinima = 0;
    $etutTel = 0; 
    $etutEmail = 0; 
    $etutemailValido = 0;
    
    // variables error adicionales 
    $edispositivo = 0;
    $econdicion = 0;
    $emedio = 0;
    $emedioOtro = 0;
    $reqDesc = 0;
    $eporque = 0;
    $efoto1 = 0;
    $efoto2 = 0;
    $efoto3 = 0;
    $efifoto1 = 0;
    $efifoto2 = 0;
    $efifoto3 = 0;
    $etmfoto1 = 0;
    $etmfoto2 = 0;
    $etmfoto3 = 0;
    $eterminos = 0; 

    //inicializar variables
    $e = 0;

    $idPais = "";
    $idEstado = "";
    $independiente = 0;
    $tutSexo = "";
    $tutVive = "";
    $tutParentesco = "";
    $dispositivo = "";
    $condicion = "";
    $medio = "";
    $mime = array("image/jpeg","image/png");
    
    
    if($metodo == "GET"){
        
        // $objUb->setPais(42);//colocar valor a variable id país en objeto ubicación
        if( $d == "brazo" ){
            $objDis->setFormulario("1,2");
            $objCond->setFormulario("2,3,4");
        }elseif( $d == "colchon" ){
            $objDis->setFormulario("3");
            $objCond->setFormulario("5");
        }

        //rellenar listas del formulario
        $paises = $objUb->muestraPaises();//crear arreglo de países
        $estados = $objUb->muestraEstados();//crear arreglo de estados
        $parentescos = $objPar->muestraTodos();//crear arreglo de parentescos
        $dispositivos = $objDis->muestraFormulario();//crear arreglo de dispositivos
        $condiciones = $objCond->muestraFormulario();//crear arreglo de condiciones
        $medios = $objMedio->muestraTodos();//crear arreglos de medios de difusión
    }

    if($metodo == "POST"){
        
        //validar errores de usuario en campos del beneficiario
            if( empty($_POST['nombre'])){
                $e = 1; 
                $enombre = 1;
            }//campo nombre beneficiario vacio
            
            if( empty($_POST['apellido'])){
                $e = 1; 
                $eapellido = 1; 
            }//campo apellido beneficiario vacio
            
            if( empty($_POST['sexo']) ){
                $e = 1; 
                $esexo = 1; 
            }//campo sexo beneficiario vacio
            
            if( empty($_POST['pais'] )){
                $e = 1; 
                $epais = 1; 
            }//campo país vacio
            
            if( empty($_POST['estado'])){
                $e = 1; 
                $eestado = 1; 
            }//campo estado vacio
            
            if( empty($_POST['ciudad'] )){
                $e = 1; 
                $eciudad = 1; 
            }//campo ciudad vacio
            
            if( empty($_POST['calle'] )){
                $e = 1; 
                $ecalle = 1; 
            }//campo calle vacio
            
            if( empty($_POST['colonia'])){
                $e = 1; 
                $ecolonia = 1; 
            }//campo colonia vacio
            
            if( empty($_POST['cp'])){
                $e = 1; 
                $ecp = 1; 
            }//campo código postal vacío
            
            if( empty($_POST['tel'])){
                $e = 1; 
                $etel = 1; 
            }//campo teléfono beneficiario vacio
            
            //verificar si el email del beneficiario es correcto
            if( empty($_POST['email']) ){//campo email beneficiario vacio
                $eemail = 1; 
                $e = 1;
            }else{
                $objBen->setEmail($_POST['email']);//añadimos valor a email
                if(!$objBen->validaEmail()){//si método retorna false email invalido
                    $e = 1; 
                    $eemailValido = 1;
                }
            }//email beneficiario
            
            //verificar errores de usuario en campo edad de beneficiario
            if( empty($_POST['date']) ){
                $edate = 1; $e = 1;//campo edad beneficiario vacio
            }else{
                $objBen->setNacimiento($_POST['date']);//guardamos la fecha de nacimiento del beneficiario
                $edad = $objBen->generaEdad();//generamos la edad del beneficiario
            
                if( $edad < 1 or $edad > 120 ){ //beneficiario menor de 6 años y mayor de 100
                    $edateMinima = 1; $e = 1;
                }elseif( $edad >= 1 and $edad < 18 ){ //beneficiario menor de edad
                    $tutorObligatorio = 1;
                }
            }//edad beneficiario

        //validar errores de usuario en campos del beneficiario

        //validar errores de usuario en campos del tutor
            if($independiente == 1){
                
                if( empty($_POST['tutNombre'])){
                    $e = 1; 
                    $etutNombre = 1;
                }//campo nombre beneficiario vacio

                if( empty($_POST['tutApellido'])){
                    $e = 1; 
                    $etutApellido = 1;
                }//campo nombre beneficiario vacio
            
                if( empty($_POST['tutSexo'])){
                    $e = 1; 
                    $etutSexo = 1;
                }//campo nombre beneficiario vacio
            
                if( !isset($_POST['tutVive'])){
                    $e = 1;      
                    $etutVive = 1;
                }//campo nombre beneficiario vacio
            
                if( empty($_POST['tutParentesco'])){
                    $e = 1; 
                    $etutParentesco = 1;
                }//campo nombre beneficiario vacio
            
                if( empty($_POST['tutTel'])){
                    $e = 1; 
                    $etutTel = 1;
                }//campo nombre beneficiario vacio
            

                // verificar errores de usuario en campo edad del tutor
                if( empty($_POST['tutDate'])){
                    $e = 1; 
                    $etutDate = 1;
                }else{
                    $objTut->setNacimiento($_POST['tutDate']);
                    $tutEdad = $objTut->generaEdad();
                    if($tutEdad < 18){
                        $e = 1;
                        $etutDateMinima = 1;
                    }
                }//verificar errores de usuario en campo edad del tutor
            
                // verificar errores de usuario en campo email del tutor
                if( empty($_POST['tutEmail'])){//campo email del tutor vacio
                    $e = 1; 
                    $etutEmail = 1;
                }else{
                    $objTut->setEmail($_POST['tutEmail']);// añadimos valor a email del tutor
                    if(!$objTut->validaEmail()){//si método retorna false email invalido
                        $e = 1;
                        $etutemailValido = 1;
                    }
            
                }//verificar errores de usuario en campo email del tutor
            
            }
        //validar errores de usuario en campos del tutor
        
        //validar errores de usuario en campo dispositivo y condición de la amputacaión
            if($d != "colchon"){

                if(empty($_POST['dispositivo'])){
                    $e = 1;
                    $edispositivo = 1;
                }//campo nombre beneficiario vacio
            
                if(empty($_POST['condicion'])){
                    $e = 1;
                    $econdicion = 1;
                }//campo nombre beneficiario vacio

            }
        //validar errores de usuario en campos adicionales
            if(empty($_POST['medio'])){
                $e = 1;
                $emedio = 1;
            }else{
                $objMedio->setId($_POST['medio']);
                $medioDato =  $objMedio->muestra();
                
                if($medioDato[0]['reqDesc'] == 1){
                    $reqDesc = 1;
                    if(empty($_POST['medioOtro'])){
                        $e = 1;
                        $emedioOtro = 1;
                    }
                }   
            }

            if(empty($_POST['porque'])){
                $e = 1;
                $eporque = 1;
            }

            if(empty($_POST['terminos'])){
                $e = 1;
                $eterminos = 1;
            }

        //validar errores de usuario en campos adicionales
        
        //validar errores de usuario en fotografías
            for($i = 1; $i <4; $i++){//crear ciclo para verificar los tres archivos
                
                $foto = "foto".$i;//crear nombre del campo del formulario a comprobar 
                
                if($_FILES[$foto]['tmp_name'] == ""){//verificar si el campo coontiene un archivo
                    $e = 1; //cambiar valoar de error a 1
                    ${"efoto".$i} = 1;//crear variable $efoto con su respectivo indice y cambiar valor de error foto vacia a 1
                }else{
                    if($_FILES[$foto]['size'] > 10485760){//verificar si el archivo es superior a 2 mb
                        $e = 1;// cambiar valor de error a 1
                        ${"etmfoto".$i} = 1;//crear variable $etmfoto con su respectivo indice y cambiar valor de error tamaño de archivo excedido a 1
                    }elseif(!in_array($_FILES[$foto]['type'],$mime)){//comprobar si el archivo no es una imagen
                        $e = 1;//cambiar valor de error a 1
                        ${"efifoto".$i} = 1;//crear variable $efifoto con su respectivo indice y cambiar valor de formato invalido a 1
                    }
                }
            }//for

        //validar errores de usuario en fotografías



        //valores del formulario
        if(!empty($_POST['pais'])){$idPais = $_POST['pais'];}
        if(!empty($_POST['estado'])){$idEstado = $_POST['estado'];}
        if(!empty($_POST['ciudad'])){$idCiudad = $_POST['ciudad'];}
        if(!empty($_POST['independiente'])){$independiente = $_POST['independiente'];}
        if(!empty($_POST['tutSexo'])){$tutSexo = $_POST['tutSexo'];}
        if(isset($_POST['tutVive'])){$tutVive = $_POST['tutVive'];}
        if(isset($_POST['tutParentesco'])){$tutParentesco = $_POST['tutParentesco'];}
        if(isset($_POST['dispositivo'])){$dispositivo = $_POST['dispositivo'];}
        if(isset($_POST['medio'])){$medio = $_POST['medio'];}
        
        if($d == "colchon"){//verificar si el dispositivo solicitado es colchón

            $dispositivo = 3;//colocar el id del dispositivo automaticamente en colchón
            $condicion = 5;//colocar la condición de la amputación en desconocida
        
        }else{//verificar si el dispositivo procede de una amputación
        
            $dispositivo = ( isset( $_POST['dispositivo'] ) )? $_POST['dispositivo'] : "" ;//tomar el valor del dispositivo
            $condicion = ( isset( $_POST['condicion'] ) ) ? $_POST['condicion'] : "";//tomar el valor de la condición de la amputación
        
        }

        //rellenar listas del formulario
        $objUb->setPais($idPais);//colocar valor a variable id país en objeto ubicación
        $objUb->setEstado($idEstado);//colocar valor a variable id estado en objeto ubicación
        
        //buscar dispositovos por tipo de solicitud
        if( $d == "brazo" ){
            $objDis->setFormulario("1,2");
            $objCond->setFormulario("2,3,4");
        }elseif( $d == "colchon" ){
            $objDis->setFormulario("3");
            $objCond->setFormulario("5");
        }

        $paises = $objUb->muestraPaises();//crear arreglo de países
        $estados = $objUb->muestraEstados();//crear arreglo de estados
        $ciudades = $objUb->muestraCiudades();//crear arreglo de ciudades
        $parentescos = $objPar->muestraTodos();//crear arreglo de parentescos
        $dispositivos = $objDis->muestraFormulario();
        $condiciones = $objCond->muestraFormulario();
        $medios = $objMedio->muestraTodos();//crear arreglos de medios de difusión

    
    //verificar si no existen errores para envíar formulario
        if($e == 0){

            //agregar valor a objeto beneficiario
            $objBen->setNombre($_POST['nombre']);
            $objBen->setApellido($_POST['apellido']);
            $objBen->setSexo($_POST['sexo']);
            $objBen->setNacimiento($_POST['date']);      
            $objBen->setCiudad($_POST['ciudad']);
            $objBen->setCalle($_POST['calle']);
            $objBen->setColonia($_POST['colonia']);
            $objBen->setCp($_POST['cp']);
            $objBen->setTelefono($_POST['tel']);
            $objBen->setEmail($_POST['email']);
            $objBen->setIdMedioDif($_POST['medio']);
            if(isset($_POST['medioOtro'])){
                $objBen->setDescMedioDif($_POST['medioOtro']);
            }else{
                $objBen->setDescMedioDif("");
            }

            //agregar valor a objeto tutor
            if($_POST['independiente'] == 1){

                $objTut->setIndependiente(1);
                $objTut->setNombre($_POST['tutNombre']);
                $objTut->setApellido($_POST['tutApellido']);
                $objTut->setSexo($_POST['tutSexo']);
                $objTut->setViveBen($_POST['tutVive']);
                $objTut->setParentesco($_POST['tutParentesco']);
                $objTut->setNacimiento($_POST['tutDate']);
                $objTut->setTelefono($_POST['tutTel']);
                $objTut->setEmail($_POST['tutEmail']);
            }
            else{
                $objTut->setIndependiente(0);
            }

            // agregar valor a objeto solicitud
            $objSol->setIdCondicion($condicion);
            $objSol->setIdDispositivo($dispositivo);
            $objSol->setIdEstatus(1);
            $objSol->setPorque($_POST['porque']);
            $idSolicitud = $objSol->crea($objBen,$objTut);
            
            if($idSolicitud != false){//comprobar si se inserto la solicitud

                //crear carpeta e insertar imágenes
                $objImg = new Imagen;
                $objImg->setIdSolicitud($idSolicitud);
                for($i = 1; $i < 4; $i ++ ){
                    $foto = "foto".$i;
                    $objImg->setFoto($_FILES[$foto]);
                    $objImg->crea();
                }
                
                //crea y envía correo de solicitud
                $objUb->setCiudad($_POST['ciudad']);//asignar valor a variable ciudad de objeto ubicación
                $ubicacion = $objUb->muestraUbicacion();// traer nombre del país,estado y ciudad del beneficiario
                $sexoMail = ($objBen->getSexo() == "m")? "masculino" : "femenino";

                // agregar datos del beneficiario
                $message = '
                    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                    <html xmlns="http://www.w3.org/1999/xhtml">
                        <head>
                            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
                            <title>Solicitud Fundación Markoptic</title>
                        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
                        </head>
                        <body style="margin: 0; padding: 0;">
                            <table cellpadding="0" cellspacing="0" width="480px" align="center">
                                <tr>
                                    <td align="center">
                                        <img src="http://fundacionmarkoptic.org.mx/img/respuesta%20heart.jpg" width="100%"  style="display:block;">
                                    </td>
                                </tr>
                                <tr><td><strong>DATOS DEL BENEFICIARIO</strong></td></tr>
                                <tr><td><strong>Nombre: </strong><span>'.$objBen->getNombre().'</span></td></tr>
                                <tr><td><strong>Apellidos: </strong><span>'.$objBen->getApellido().'</span></td></tr>
                                <tr><td><strong>Sexo: </strong><span>'.$sexoMail.'</span></td></tr>
                                <tr><td><strong>Fecha de nacimiento: </strong><span>'.$objBen->getNacimiento().'</span></td></tr>
                                <tr><td><strong>Ciudad: </strong><span>'.$ubicacion[0]['ciudad'].'</span></td></tr>
                                <tr><td><strong>Estado: </strong><span>'.$ubicacion[0]['estado'].'</span></td></tr>
                                <tr><td><strong>País: </strong><span>'.$ubicacion[0]['pais'].'</span></td></tr>
                                <tr><td><strong>Calle y número: </strong><span>'.$objBen->getCalle().'</span></td></tr>
                                <tr><td><strong>Colonia: </strong><span>'.$objBen->getColonia().'</span></td></tr>
                                <tr><td><strong>Código postal: </strong><span>'.$objBen->getCp().'</span></td></tr>
                                <tr><td><strong>Teléfono</strong><span>'.$objBen->getTelefono().'</span></td></tr>
                                <tr><td><strong>Email: </strong><span>'.$objBen->getEmail().'</span></td></tr>
                ';

                //verificar si el usuario cuenta con tutor
                if( $_POST['independiente'] == 1 ){

                    $objPar->setId($_POST['tutParentesco']); //asignar valor al id del parentesco
                    $parentesco = $objPar->muestra(); // traer nombre del parentesco seleccionado
                    $tutSexoMail = ($objTut->getSexo() == "m")? "masculino" : "femenino";

                    //agregar datos del tutor
                    $message .='
                                <tr><td><strong>DATOS DEL TUTOR</strong></td></tr>
                                <tr><td><strong>Nombre: </strong><span>'.$objTut->getNombre().'</span></td></tr>
                                <tr><td><strong>Apellidos: </strong><span>'.$objTut->getApellido().'</span></td></tr>
                                <tr><td><strong>Sexo: </strong><span>'.$tutSexoMail.'</span></td></tr>
                                <tr><td><strong>Vive con el beneficiario: </strong><span>'.$objTut->getViveBen().'</span></td></tr>
                                <tr><td><strong>Parentesco: </strong><span>'.$parentesco.'</span></td></tr>
                                <tr><td> <strong>Fecha de nacimiento: </strong><span>'.$objTut->getNacimiento().'</span></td></tr>
                                <tr><td><strong>Teléfono: </strong><span>'.$objTut->getTelefono().'</span></td></tr>
                                <tr><td><strong>Email: </strong><span>'.$objTut->getEmail().'</span></td></tr>   
                    ';
                }//verificar si el usuario cuenta con tutor

                // agregar datos adicionales
                $objDis->setId($_POST['dispositivo']); //asignar valor a id dispositivo
                $dispositivoNombre = $objDis->muestra();//traer nombre del dispositivo seleccionado
                $objCond->setId($_POST['condicion']);
                $condicionNombre = $objCond->muestra();
                $objMedio->setId($_POST['medio']);
                $medioNombre = $objMedio->muestra();

                $message.= '
                                <tr><td><strong>Dispositivo Solicitado: </strong><span>'.$dispositivoNombre[0]['nombre'].'</span></td></tr>
                                <tr><td><strong>Condición de la amputación: </strong><span>'.$condicionNombre[0]['condicion'].'</span></td></tr>
                                <tr><td><strong>Medio de difusión: </strong><span>'.$medioNombre[0]['medio'].'</span></td></tr>
                ';
                
                //verificar si el medio requiere descripción
                if( isset($_POST['medioOtro']) ){
                    $message .= '
                                <tr><td><strong>Nombre del medio: </strong><span>'.$objTut->getDescMedioDif().'</span></td></tr>
                    ';            
                }
                
                $message.='
                                <tr><td><strong>Por qué solicito el dispositivo: </strong><span>'.$objSol->getPorque().'</span><tr></tr>
                                <tr>
                                    <td align="center">
                                        <img src="http://fundacionmarkoptic.org.mx/img/footer-correo.jpg" width="100%"  style="display:block;">
                                    </td>
                                </tr>
                            </table>
                        </body>
                    </html>
                ';

                // $m = $this->mensajeFormulario($id);
                $to = "jesusparra07hp@gmail.com";
                $subject = "Solicitud Formulario Markoptic";
                $headers = "MIME-Version: 1.0"."\r\n";
                $headers .= "Content-Type: text/html; charset=ISO-8859-1"."\r\n";
                // $headers.= "Cc:jparra@markoptic.mx,info@fundacionmarkoptic.org.mx,racosta@fundacionmarkoptic.org.mx"."\r\n";
                $headers.= "Cc:jparra@markoptic.mx"."\r\n";
                $headers .= "From: Fundación Markoptic <info@fundacionmarkoptic.org.mx>";
                $result = mail($to,utf8_decode($subject),utf8_decode($message),utf8_decode($headers));
                
                //redirecciona mostrando agradeciemiento
                header('Location: /gracias?solicitud=exito');
            
            }else{

                //redirecciona mostrando una disculpa 
                header('Location: /gracias?solicitud=error');
            }

        }//verificar si no existen errores para envíar formulario
        
    }//método post