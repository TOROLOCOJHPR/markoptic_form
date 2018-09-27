<?php 
    $title = "Beneficiarios";//titulo de página y de menú
    $pagina = "beneficiarios";//necesaria para que funcionen los modulos
    include ('mod/header.php');//incluir cabeceras
?>

    <link rel="stylesheet" href="http://kendo.cdn.telerik.com/2018.2.620/styles/kendo.bootstrap.min.css" />
    <link rel="stylesheet" href="http://kendo.cdn.telerik.com/2018.2.620/styles/kendo.common.min.css">
    <style>
        .k-widget{border:none}
    </style>
<body>
    <?php
        include ('mod/menu.php');//incluir menú
        
        //mostrar cabecera de titulo
        if(!isset($_GET['b'])){?>
        <div class="text-white bg-cover-center bg-cover-cabecera">
            <h1 class="t-shadow-2-black c-align-middle opacity-green p-5 mb-0">Conoce a nuestros Beneficiarios</h1>
        </div>
    <?php } ?>

    <?php
        
        //verificar si la consulta es para mostrar tarjeta con datos del beneficiario
        if(isset($_GET['b']))
        {
            include ('mod/beneficiarios/tarjeta.php');
        }
        
        //la consulta es para generar la lista de beneficiarios
        else
        {   
            include ('mod/beneficiarios/filtro.php');//incluir filtro de busqueda
            //cargar lista de beneficiarios mediante javascript tarjeta-lista-beneficiarios.js
            ?>
            
                <!-- lista de beneficiarios -->
                <div id="tarjeta-lista-beneficiarios"></div>
                
                <!-- animación de carga -->
                <div id="carga" class="c-align-middle" style="min-height:60vh">
                    <img src="/img/gif/loader.gif" alt="cargando">
                </div>

                <!-- mostrar más -->
                <p 
                    id="mostrar-mas" 
                    class="bg-markoptic text-white text-center lead p-2 fs-1-2"
                    style="display:none";
                >
                    desplázate hacia abajo para mostrar más
                <p>
                
                <!-- final del arreglo -->
                <div id="final" class="text-center px-4" style="display:none">
                    <hr>
                    <p class="lead fs-1-5">No existen más solicitudes para mostrar</p>
                    <hr>
                </div>
                
                <!-- no se encontraron solicitudes -->
                <div id="sin-solicitudes" class="c-align-middle" style="min-height:60vh;display:none">
                    <p class="lead fs-2-5">NO SE ENCONTRARON SOLICITUDES</p>'
                </div>

            <?php
    
        }//else

        //pie de página
        include ('mod/footer.php');
        
        //generar arreglo de beneficiarios 
        if( !isset($_GET['b']) )
        {
            include ('inc/arreglo-solicitudes-estatus.php');
        }
    ?>
    <!-- scripts -->
    <script src="http://kendo.cdn.telerik.com/2018.2.620/js/kendo.all.min.js"></script>
    <script src="/js/tarjeta-lista-beneficiarios.js"></script><!-- crea tarjetas de lista de beneficiarios-->
    <script src="/js/muestra-ubicacion.js"></script><!-- crea campos de ubicación para filtro de busqueda -->


</body>