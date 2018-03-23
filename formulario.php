<?php

    if($_SERVER['REQUEST_METHOD'] == 'POST' && empty($_POST) &&  empty($_FILES) && $_SERVER['CONTENT_LENGTH'] > 0)
    {
        header('Location: /solicitud');
        echo "Your file exceeds allowed upload file dimension";
    }
    include 'back/objetos.php';
    $metodo = $_SERVER['REQUEST_METHOD'];
    $menuBack = "Formulario";

    //verificar el tipo de método de entrada y dispositivo
    if($metodo == "GET"){ //metodo == GET
        $d = ( isset($_GET['dispositivo']) )? $_GET['dispositivo'] : "";
    }else{ //metodo == POST
        $d = ( isset( $_POST['formDispositivo'] ) ) ? $_POST['formDispositivo'] : "";
    }

    //redireccionar en caso de que no se encuentre dispositivo
    if( $d == ""){
        header("Location: /solicitud");
    }

    //incluir excepciones al formulario 
    include 'mod/formulario/excepciones.php';
    
    //insertar formulario en caso de que no exista ningun error y redireccionar
    if($metodo == "POST"){
        if($e == 0 ){
            //echo "insertar";
            include 'mod/formulario/insertFormulario.php';
        }else{
            //echo "no insertar";
        }
    }
    
    //echo "<br>error ".$e;
    include 'mod/header.php';
    include 'mod/menu.php';

    if( $d == "brazo" ){
        include 'mod/formulario/descBrazo.php';
    }elseif( $d == "colchon" ){
        include 'mod/formulario/descColchon.php';
    }
?>
<div class="bg-danger p-3 mt-4 text-white <?php echo ($e == 1)? "" : "d-none";?>">Por favor verifica que todos los datos sean correctos</div>
<form class='' enctype='multipart/form-data' method='post' action="/formulario">
<?php
    include 'mod/formulario/datosBeneficiario.php';
    include 'mod/formulario/datosTutor.php';
    include 'mod/formulario/datosAdicionales.php';
?>
    <div class="row mx-0 px-4">
        <button class="btn bg-verde-menu ml-auto text-white p-3 mt-3 mb-3">Enviar</button>
    </div>
</form>
<?php
    include 'mod/footer.php';
?>
<script src="/js/formulario.js"></script>
<script src="/js/no-back.js"></script>