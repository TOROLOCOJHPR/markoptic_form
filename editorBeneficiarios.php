<?php 
    include 'back/conexion.php';
    include 'back/objetos.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/bootstrap.min.css">    
    <link rel="stylesheet" href="/css/style-fundacion.css">    
    <link rel="stylesheet" href="/css/universal.css">
    <title>Editor Beneficiarios</title>
</head>
<body>
    <h1 class="text-center">Sección Beneficiarios</h1>
    <form action="" enctype='multipart/form-data' method="post" class="m-4">
        <label>Introduce el número de folio</label><br>
        <select></select>
        <input type="text" name="folio" class="mx-auto" placeholder="introduce el numero del folio">
        <input type="submit" class="btn bg-verde-menu text-white px-2" value="consultar">
    </form>
    <?php 

    
        $objBen = new Beneficiario;
        if(isset($_POST['folio'])){
            $folio = $_POST['folio'];
            include 'mod/panel/buscadorBeneficiarios.php';
        }elseif(isset($_GET['b'])){
            $b = $_GET['b'];
            $dato = $objBen->buscaDatosFormulario($b);
            include 'mod/panel/datosBeneficiarios.php';
        }elseif(isset($_POST['update'])){
            $fecha = date("-d-m-Y-H-i-s");
            $objBen->setNombre($_POST['nombre']);
            $objBen->setApellidos($_POST['apellido']);
            $objBen->setSexo($_POST['sexo']);
            $objBen->setNacimiento($_POST['fNacimiento']);
            $objBen->setCiudad($_POST['ciudad']);
            $objBen->setCalle($_POST['calle']);
            $objBen->setColonia($_POST['colonia']);
            $objBen->setCp($_POST['cp']);
            $objBen->setTelefono($_POST['tel']);
            $objBen->setEmail($_POST['email']);
            //comprobar si el beneficiario cuenta con un tutor
            if($_POST['independiente'] != 0){
                //$objBen->setIndependiente($_POST['independiente']);
                $objBen->setNombreTutor($_POST['nombreTut']);
                $objBen->setApellidoTutor($_POST['apellidoTut']);
                $objBen->setSexoTutor($_POST['sexoTut']);
                $objBen->setViveBen($_POST['viveBen']);
                $objBen->setParentesco($_POST['parentesco']);
                $objBen->setNacimientoTutor($_POST['fNacimientoTut']);
                $objBen->setTelTutor($_POST['telTut']);
                $objBen->setEmailTutor($_POST['emailTut']);
            }
            $objBen->setDispositivo($_POST['solicitud']);
            $objBen->setCondicion($_POST['condicion']);
            $objBen->setIdMedioDifusion($_POST['medio']);
            if( isset( $_POST['medioOtro'] ) ){
                $objBen->setDescMedioDif($_POST['medioOtro']);
            }
            $objBen->setDescObtencion($_POST['breveDescripcion']); 
            $objBen->setEstatusSolicitud($_POST['estatus']);
            $objBen->mostrar();
            $objBen->updateDatosBen($_POST['idBen']);
            echo  $_POST['id'];
            $objBen->updateDatosSol($_POST['id']);
            for($i=1; $i<=4; $i++){
                if( $i == 4){
                    $getFile="fotoH";
                    $url = "imagenes/uploads/beneficiados/";
                    $nombre = $_POST['id'];
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
        }
        
    ?>
    <script src="/js/jquery-3.1.1.js"></script>
    <script src="/js/popper.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function(){
            //desabilitar o habilitar la caja de texto otro de seccion como se entero de fundación 
            $('#medio').change(function(){
                var ph = $('#medio option:selected').attr('ph');
                if( ph !== "" ){
                    console.log( $('#medio option:selected').attr('ph') ); 
                    $('input[name$="medioOtro"]').show(500);
                    $('input[name$="medioOtro"]').attr('placeholder',ph);
                    $('input[name$="medioOtro"]').attr('disabled',false);
                }else{
                    $('input[name$="medioOtro"]').hide(500);
                    $('input[name$="medioOtro"]').attr('placeholder',"");
                    $('input[name$="medioOtro"]').attr('disabled',true);
                    //$('input[name$="medioOtro"]').val("");
                }
            });
            //función para seleccionar los estados del país
            $('#pais').change(function(){
                var p =  $(this).val();
                var f = "buscaEstado";
                var r = "estado";
                var id = p;
                var parametros ={"formulario":f,"id":id,"es":""}
                ajax(parametros,r);
                $('#ciudad option').remove();
                $('#ciudad').append('<option selected="selected" disabled="disabled">Selecciona una Ciudad</option>');
            });
            //función para seleccionar las ciudades del estado
            $('#estado').change(function(){
                var p =  $(this).val();
                var f = "buscaCiudad";
                var r = "ciudad";
                var id = p;
                var parametros ={"formulario":f,"id":id,"c":""}
                ajax(parametros,r);
            });
        });
            //función ajax
            function ajax(ajaxParametros,resultado){
                $.ajax({
	                data:ajaxParametros,
                 	url:'/back/ajax.php',
                    type:'post',
                	beforeSend: function () {
	                    //$("#beforeresultado").html("<div class='beforeSend'><label>Cargando, espere por favor...</label></div>");
                    },
                    success:  function (response) {						
	            	    $("#beforeresultado").html("");
	            	    $('#'+ resultado).html(response);
                    }
                });
            }
    </script>
</body>
</html>