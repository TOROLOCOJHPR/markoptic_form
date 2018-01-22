<?php require_once('cms/cms.php')?>
<cms:template title='noticias' clonable='1' order='7'>
    <cms:editable name='img_noticia' label='imagen' type='image' show_preview = '1' preview_height ='400' order='1' />
    <cms:editable name='noticia' label='noticia' type='richtext' order='2' />
</cms:template>
<?php
    include 'mod/header.php';
    $menuBack = "Noticias";
?>
    <style>
    #menu{
        margin-top:50px;
    }
    </style>
    <!--push-down-->
        <div class=""style="height:50px;position:relative;"></div>
    <!--/push-down-->
    <!--menu-->
        <div class="container-fluid fixed-top" id="menu" style=" z-index:10;">
            <?php
                include 'mod/menu.php';
            ?>
        </div><!--/container menu-->
    <!--/menu-->

<!-- contenido -->

    <cms:if k_is_page>
    <!-- noticia completa -->
        <!-- <a class='btn-verde f-opacity-75 p-1 text-white' style='top:50px;border-left:none;' href="/video"><i class="fa fa-2x fa-arrow-left" aria-hidden="true"></i></a> -->
        <div class="row no-gutters text-white text-center">
            <div class="col-12 bg-verde-menu">
                <p><cms:show k_page_title /></p>
            </div>
            <div class="col-auto px-2"style="background-color:#888586;">
                <label><cms:date k_page_date format='d' /></label>
            </div>
            <div class="col-auto px-2 text-left pl-2"style="background-color:#bab4b3;">
                <label><cms:date k_page_date format='F' /></label>
            </div>
        </div>
        <div class="row mx-0">
            <div class="col-12 text-dark px-5 text-center desc-noticia">
                <p><cms:show noticia /></p>
            </div>
        </div>
    <cms:else />
    <!-- noticias  segmentadas -->
        <!-- Titulo principal -->
        <div class="t-shadow-2-black w100 h-25 text-white bg-cover-center" style="background-image:url('/imagenes/fundación/valores.jpg');">
            <div class="w-100 h-100  c-align-middle opacity-green">
                <h1>Noticias</h1>
            </div>
        </div>
        <cms:pages masterpage='noticias.php'>
            <div class="row no-gutters mb-3 mt-3">
                <div class="col-12 col-md-4 p-0">
                    <img class="img-cover-center" src="<cms:show img_noticia />" alt="imagen de noticia">
                </div>
                <div class="col-12 col-md-8 p-0">
                            <div class="row mx-0">
                                <div class="col-12 p-0 text-center c-align-middle p-2 bg-verde-menu">
                                    <span class="pb-0 text-white"><cms:show k_page_title /></span>
                                </div>
                            </div>
                            <div class="row mx-0">
                                <div class="col-auto px-2 c-align-middle text-white" style="background-color:#888586;">
                                    <span class="p-0"><cms:date k_page_date format='d' /></span>
                                </div>
                                <div class="col-auto text-left px-2 c-align-middle text-white"style="background-color:#bab4b3;">
                                    <span class="p-0"><cms:date k_page_date format='F' /></span>
                                </div>
                                <div class="col-12 px-4 pt-3 pb-2">
                                    <p><cms:excerpt count='450' truncate_chars='1'><cms:show noticia /></cms:excerpt></p>
                                    <a href='<cms:show k_page_link />' class='btn bg-verde-menu mt-2' style="bottom:0px;">leer mas..</a>
                                </div>
                            </div>
                        </div>
            </div> 
        </cms:pages>
         
    </cms:if>
    
<?php
    include 'mod/footer.php';
?>
    </body>
</html>
<?php COUCH::invoke();?>