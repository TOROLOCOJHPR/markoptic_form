<?php
    //include "conexion.php";
    include "objetos.php";
    $formulario = $_POST['formulario'];

    //--busca estados del país seleccionado
    if($formulario == "buscaEstado"){
        $id = $_POST['id'];
        $es = $_POST['es'];
        $objBen = new DatosPersonales();
        $objBen->buscaEstado($id,$es);
    }
    //--busca ciudades de el estado seleccionado
    if($formulario == "buscaCiudad"){
        $id = $_POST['id'];
        $c = $_POST['c'];
        $objBen = new DatosPersonales();
        $objBen->buscaCiudad($id,$c); 
    }
    //--busca parentesco del tutor con el beneficiario
    /*if($formulario == "buscaParentesco"){
        $objBen = new Tutor();
        $objBen->buscaParentesco();
    }*/
    //--envia el formulario de contacto 
    if($formulario == "contactForm"){
        $to = "info@fundacionmarkoptic.org.mx";
        //$to = "jparra@markoptic.mx";
        $subject = "Markoptic página Web Correo de información";
        $message = "<strong>correo: </strong>".$_POST['emailContacto']."<br><strong>Nombre: </strong>".$_POST['nombreContacto']."<br><strong>Teléfono: </strong>".$_POST['telefonoContacto']."<br><strong>Comentario: </strong>".$_POST['comentarioContacto'];
        $headers = "From: Página Web Markoptic";
        $headers .= "Reply-To: ". strip_tags($_POST['req-email']) . "\r\n";
        $headers .= "CC: susan@example.com\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
        $result = mail($to, utf8_decode($subject), utf8_decode($message), utf8_decode($headers));
        if(!$result) {   
             echo "Disculpa tu mensaje no pudo ser enviado";   
        } else {
            echo "<p class='text-dark'>Mensaje Enviado<p>";
        }    
    }
    //--busca beneficiarios 
    if($formulario == "buscaBeneficiario"){
        $nombre = trim($_POST['nombre']," ");
        $estatus = $_POST['estatus'];
        if($nombre == ""){
            echo "";
        }else{
            $strCount = strlen($nombre);
            if( $strCount < 3 ){
                echo "minimo tres caracteres";
            }else{
                $objBen = new beneficiario;
                $objBen->buscaBeneficiario($nombre,$estatus);
            }
        }
    }
    //--genera edad del beneficiario
    if($formulario == "generaEdad"){
        $fecha = $_POST['fecha'];
        $objBen = new Beneficiario;
        $edad = $objBen->generaEdadBeneficiario($fecha);
        echo "<script>console.log('".$edad."')</script>"; 
        //echo "<script>alert('edad'); </script>";
        if($edad >= 6 and $edad< 18){
        
         
        }
        //echo "<script>console.log('Edad: 20');</script>";
        //echo '<input type="hidden" value="20" name="edad" id="edad">';
    }
    //--busca beneficiario por medio de folio
    if($formulario == "buscaBeneficiarioFolio"){
        $folio = trim($_POST['folio']," ");
        //echo preg_replace('/[a-z]+/','',$folio);
        if($folio == ""){
            echo "";
        }else{
           /*$strCount = strlen($folio);
            if( $strCount < 3 ){
                echo "minimo tres caracteres";
            }else{*/
                $objBen = new beneficiario;
                $objBen->buscaBeneficiarioFolio($folio);
           // }
        }
    }
    if($formulario == "motorPago"){
       //$objBen = new beneficiario;
        //$objBen->insertTransaccion($_POST['folio'],$_POST['total']);
        //echo '<script>alert("motor de pago");</script>';
        $file = file_put_contents('../response.txt', json_encode($_POST));
    }
    //--crea cookie para ocultar modal de eventos donación
    if($formulario == "ocultarModal"){
        setcookie('hide','1',0,'/');
    }
    // crea tarjetas de presentación de beneficiarios
    if($formulario == "datosBeneficiario"){
        /*$array = array(
            0=>array("id"=>"1","codigo"=>"a","nombre"=>"user1"),
            1=>array("id"=>"2","codigo"=>"b","nombre"=>"user2"),
            2=>array("id"=>"3","codigo"=>"c","nombre"=>"user3"));


        echo json_encode($array);*/
        $pagina = $_POST['pagina'];
        if($pagina == "beneficiarios"){
            $foto = "fotoHistoria";
            $ubicacion = "beneficiados/";
        }else{
            $foto = "foto1";
            $ubicacion = "";
        }
        $objBen = new Beneficiario;
        $carga = $_POST['carga']+1;
        echo "<script>console.log('carga: ".$carga."')</script>";
        //$sql = "SELECT solicitudes.id FROM solicitudes  WHERE idEstatusSolicitud = 1";
        $arreglo = $_POST['arreglo'];
        include '../mod/beneficiarios/tarjetasBeneficiarios.php';
        echo "<div id='div".$carga."' class=''></div>";
        // $array = array();
        /* foreach($arregloAjax as $row){
            $dato = $objBen->buscaDatosApadrinado($row);
            array_push($array,$dato);
        }*/
        //echo json_encode($array);
?>
        <!-- <div class="row mx-0" id="tarjetasBeneficiarios<?php //echo $_POST['carga']; ?>"></div> -->
<?php
    }
    //--valida email correcto
    if($formulario == "validaEmail"){
        //$objBen = new Beneficiario();
        $valida = array();
        $email = $_POST['email'];
        //$email = "jparra@markoptic.mx";
        /*if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            array_push($valida,array("valor"=>"true"));
        }else{
            array_push($valida,array("valor"=>"false"));
        }*/
        array_push($valida,array("valor"=>"true"));
        echo json_encode($valida);
    }
?>