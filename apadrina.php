<?php 
    $root = $_SERVER['DOCUMENT_ROOT'];
    require_once ($root."/inc/config.php");
    $title = "Apadrina";//titulo de página y de menú
    $pagina = "apadrina";//necesaria para que funcionen los modulos
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
        
        //mostrar cabecerade titulo
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

                <!-- final del arreglo -->
                <div id="final" class="text-center px-4" style="display:none">
                    <hr>
                    <p class="lead fs-2">No existen más solicitudes para mostrar</p> 
                    <hr>
                </div>

                <!-- no se encontraron solicitudes -->
                <div id="sin-solicitudes" class="c-align-middle" style="min-height:60vh;display:none">
                    <p class="lead fs-2-5">NO SE ENCONTRARON SOLICITUDES</p>'
                </div>

                <!-- animación de carga -->
                <div id="carga" class="c-align-middle" style="min-height:60vh">
                    <img src="/img/gif/loader.gif" alt="cargando">
                </div>

            <?php
    
        }//else

        //pie de página
        include ('mod/footer.php');
        
        //generar arreglo de beneficiarios 
        if( !isset($_GET['b']) )
        {
            //genera arreglo de solicitudes
            include ('inc/arreglo-solicitudes-estatus.php');
            
            //muestra modal de eventos de donación 
            include ('mod/beneficiarios/modalEventos.php');
            ?>
            <!-- scripts -->
            <script src="http://kendo.cdn.telerik.com/2018.2.620/js/kendo.all.min.js"></script>
            <script src="/js/muestra-ubicacion.js"></script><!-- crea campos de ubicación para filtro de busqueda -->
            <script src="/js/tarjeta-lista-beneficiarios.js"></script><!-- crea tarjetas de lista de beneficiarios-->
            <script src="/js/apadrinamiento.js"></script><!-- crea tarjetas de lista de beneficiarios-->

        <?php
        }
        //genera datos del beneficiario
        else
        {
            //incluir modal de donación banwire
            include ('mod/donar/modalBanwire.php');
            include ("mod/donar/modalFinal.php");
            ?>
            <script type="text/javascript" src="https://sw.banwire.com/checkout.js"></script>
            <script src="/js/recaudacion-apadrinamiento.js"></script>
            <script src="/js/motorPago.js"></script>
            <?php
        }
    ?>
    
</body>