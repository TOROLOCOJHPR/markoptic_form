<?php require_once('cms/cms.php'); ?>
<?php
    if(!isset($_COOKIE['hide'])){
        setcookie('hide','0');
    }
     ?>
    <cms:template title = 'apadrina' order='15'>
        <cms:editable name='textomotivador' label='Texto Motivador' type='text' order='1'/>
    </cms:template>
<?php
    include 'mod/header.php';
    include 'back/objetos.php';
    if(isset($_GET['b'])){
        $menuBack = "Porcentaje de Apadrinación";
    }else{
        $menuBack = "Apadrina";
    }
?>
    <style>
    #menu{
        margin-top:50px;
    }
    </style>
    <!--push-down-->
        <div class="" style="height:50px;position:relative;"></div>
    <!--/push-down-->
    <!--menu-->
        <div class="container-fluid fixed-top" id="menu" style=" z-index:10;">
            <?php
                include 'mod/menu.php';
            ?>
        </div><!--/container menu-->
    <!--/menu-->
    <!-- contenido -->
    <!-- Titulo principal -->
    <div class="t-shadow-2-black w100 h-25 text-white bg-cover-center" style="background-image:url('/imagenes/fundación/valores.jpg');">
        <div class="w-100 h-100 c-align-middle opacity-green">
            <h1>Apadrina</h1>
        </div>
    </div>
    <?php
        //página de porcentaje de recaudación del  beneficiario
        $pagina = "apadrina";
        //$objBen = new Beneficiario;
        if(isset($_GET['b'])){
            include 'mod/beneficiarios/datosCompletos.php';
        }else{
            include 'mod/beneficiarios/filtro.php';
            include 'mod/beneficiarios/lista.php';
        }
    ?>
    <div id="resultado"></div>
</div>

<?php
    include 'mod/footer.php';
?>
<?php
    if(isset($_GET['b'])){
?>
    <script type="text/javascript" src="https://sw.banwire.com/checkout.js"></script>
    <script src="/js/barraProgreso.js"></script>
    <script src="/js/motorPago.js"></script>

<?php
    }else{
?>
    <script src="/js/filtro.js"></script>
<?php
    }
?>
<script>
    $(document).ready(function(){
        // comprobar la variable ocultar modal
        if( $('#tiempoDonaciones').attr('ocultar') == 0 )
        {
            var ocultar = "show";
        }else{
            var ocultar = "hide";
        }
        //iniciar modal
        $('#tiempoDonaciones').modal(ocultar);
    });
    function hideModal(){
        var r = "tiempoDonaciones";
        var parametros ={
            "formulario" : "ocultarModal",
        }
        ajax(parametros,r);
        $('#tiempoDonaciones').modal('hide');
    }
</script>

    </body>
</html>
<?php COUCH::invoke(); ?>