 <?php require_once('cms/cms.php'); ?>
<cms:template title ='proyectos' order="3">
    <cms:editable name='titulo' type='text' order='1'/>
    <cms:repeatable name='proyecto' order='2'>
        <cms:editable type='image' name='img_proyecto' show_preview='1' preview_width='150' input_width='200' col_width='300' />
        <cms:editable type='text' name='nom_proyecto' label='nombre' />
        <cms:editable type='nicedit' name='desc_proyecto' label='descripcion' />
    </cms:repeatable>
</cms:template>
<?php
    //header
    include 'mod/header.php';
?>
<style>
    #menu{
        margin-top:50px;
    }

</style>
<!--menu-->
    <div class="container-fluid fixed-top" id="menu" style=" z-index:10;">
        <?php
            include 'mod/menu.php';
        ?>
    </div><!--/container menu-->
<!--/menu-->

<!--push-down-->
<div class=""style="height:50px;position:relative;"></div>
<!--/push-down-->

<!-- Titulo principal -->
<div class="t-shadow-2-black w100 h-25 text-white bg-cover-center" style="background-image:url('/imagenes/fundación/valores.jpg');">
    <div class="w-100 h-100 c-align-middle opacity-green">
            <h1><cms:show titulo/></h1>  
    </div>
</div>

<div class=" container-fluid text-center text-white" id="tarjetas">
    <div class="row mt-4 mb-4">        
        <cms:show_repeatable 'proyecto'>
            <div class="col-sm-4 mt-2 col-12 ">
                <div class="card pointer" d="<h2 class='text-center mb-2 mt-2'><cms:show nom_proyecto/></h2><div class='text-center'><img src='<cms:show img_proyecto />'class='img-thumbnail mx-auto' style='width:60%;'/></div><br><cms:show desc_proyecto />">
                    <div class="w-100 c-img">
                        <img class=" img-cover-center w-100 h-100" src="<cms:show img_proyecto />" alt="">
                    </div>
                    <div class="w-100  c-text bg-verde-menu">
                        <cms:show nom_proyecto/>
                    </div>
                </div>
            </div>
            
        </cms:show_repeatable>

    </div>
</div>
<!-- descripción de la tarjeta -->
<div class="lightbox-proyectos">
    <div id="dt" class="px-3 text-white text-center">
        <p></p>
    </div>
</div>

<!--footer-->
    <?php
        include 'mod/footer.php';
    ?>
<!--/footer-->
    <script src="/js/js-fundacion-proyectos.js"></script>
    </body>
</html>
<?php COUCH::invoke(); ?>