<?php
    include 'back/objetos.php';
    $metodo = $_SERVER['REQUEST_METHOD'];
    echo $metodo;
    if($metodo == "GET"){ //metodo == GET
        $d = ( isset($_GET['dispositivo']) )? $_GET['dispositivo'] : "";
    }else{ //metodo == POST
        $d = ( isset( $_POST['formDispositivo'] ) ) ? $_POST['formDispositivo'] : "";
    }
    include 'mod/formulario/excepciones.php';
    echo "<br>dispositivo ".$d;
    echo "<br>error ".$e;
    include 'mod/header.php';

    if( $d == "brazo" ){
        include 'mod/formulario/descBrazo.php';
    }elseif( $d == "colchon" ){
        include 'mod/formulario/descColchon.php';
    }
?>
<form class='' enctype='multipart/form-data' method='post' action="/formulario">
<?php
    include 'mod/formulario/datosBeneficiario.php';
    include 'mod/formulario/datostutor.php';
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