<?php 
    
    $root = $_SERVER['DOCUMENT_ROOT'];// tomar la ruta hacía el directorio raíz
    require ($root.'/panel/inc/comprueba.php');//comprueba si el usuario se encuentra autentificado

    $title = "Panel Edición";
    $requireBack = 0;
    
    //incluir cabecera html
    include 'mod/header.php';
    // mostrar menú
    include 'mod/menu-principal.php';
    
?>
<body>
    
    <div class="row mx-0 mt-4">

    <!-- usuario estandar -->
        
        <!-- reporte de solicitudes -->
        <div 
            <?php echo ($_SESSION[ROL] == 4)? 'style="display:none"' : 'style="display:block"' ?> 
            class="col-12 col-sm-6 col-xl-3 text-center"
        >
            <a class="btn bg-markoptic" style="height:150px;width:150px" id="reporte">
                <img class="img-fluid p-4" src="/img/excel.png">
            </a>
            <h4 class="mb-5">Reporte de Solicitudes</h4>
        </div>

        <!-- editar beneficiarios -->
        <div class="col-12 col-sm-6 col-xl-3 text-center">
            <a class="bg-markoptic d-block rounded m-auto p-2" style="height:150px;width:150px" href="/panel/beneficiarioslista">
                <img class="img-fluid p-4" src="/img/edit.png">
            </a>
            <h4 class="mb-5">Editor de beneficiarios</h4>
        </div>

    <!-- usuario administrador -->
    
        <!-- administrar usuarios -->
        <div 
            class="col-12 col-sm-6 col-xl-3 text-center"
        >
            <a class="bg-markoptic d-block rounded m-auto" style="height:150px;width:150px" href="/panel/editorUsuarios">
                <img class="img-fluid p-4" src="/img/man.png">
            </a>
            <h4 class="mb-5">Administrar Usuarios</h4>

        </div>

        <!-- sistema apadrinamiento -->
        <div 
            <?php echo ($_SESSION[ROL] == 1 or $_SESSION[ROL] == 4)? 'style="display:none"' : 'style="display:block"' ?>
            class="col-12 col-sm-6 col-xl-3 text-center"
        >
            <a class="bg-markoptic d-block rounded m-auto" style="height:150px;width:150px" href="">
                <img class="img-fluid p-4" src="/img/charity.png">
            </a>
            <h4 class="mb-5">Sistema Apadrinamiento</h4>
        </div>

    </div><!-- row -->

</body>

<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function(){
        $('#reporte').click(function(){
            console.log('reporte');
            $.ajax({
               url: "",
               beforeSend: function() {
               location.href = "/panel/inc/generaExcel.php";
               },
               success: function (html) {
                }
            });
        });
    });
</script>  