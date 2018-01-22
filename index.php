<?php require_once('cms/cms.php'); ?>
<cms:template title = 'inicio' order='1'>
    <cms:repeatable name='carouselfondo' order='1'>
        <cms:editable type='image' name='img_fondo' show_preview='1' preview_width='150' input_width='200' col_width='300' />
        <cms:editable type='text' name='titulo' label='titulo' />
        <cms:editable type='text' name='url' label='url' />
    </cms:repeatable>
    <cms:editable name='img_beneficiarios' label='imagen beneficiarios' type='image' show_preview='1' preview_height='200' order='2'/>
    <cms:editable name='beneficiarios' label='etiqueta beneficiarios' type='text' order='3'/>
    <cms:editable name='img_solicita' label='imagen solicita' type='image' show_preview='1' preview_height='200' order='4'/>
    <cms:editable name='solicita' label='etiqueta solicita' type='text' order='5'/>
    <cms:editable name='img_apadrina' label='imagen apadrina' type='image' show_preview='1' preview_height='200' order='6'/>
    <cms:editable name='apadrina' label='etiqueta apadrina' type='text' order='7'/>
    <cms:editable name='img_unete' label='imagen unete' type='image' show_preview='1' preview_height='200' order='8'/>
    <cms:editable name='unete' label='etiqueta unete' type='text' order='9'/>
    <cms:editable name='testimonio' label='testimonio' type='textarea' order='10' />
    <cms:editable name='autor_testimonio' label='Autor del testimonio' type='text' order='11' />
    <cms:editable name='url_testimonio' label='url testimonio' type='text' order='12' />
    <cms:editable name='img_testimonio' label='imagen testimonio' type='image' show_preview='1' preview_height='400' order='13'/>
</cms:template>
<?php
include 'mod/header.php';
include 'back/objetos.php'; 
?>
<style>
    body{
        margin-top:100vh;
    }
</style>
<!--fondo-->
    <!--principal-->
        <div class="fixed-top h-100 fondo" style='z-index:-2;'>
            <!--slider-->
            <div id="carouselPrincipal" class="carousel slide" data-ride="carousel" style='z-index:-1;'>
                <div class="carousel-inner">
                    <cms:show_repeatable 'carouselfondo'>
                        <div class="carousel-item <cms:if k_count ='1'>active</cms:if>">
                            <a href="<cms:show url />">
                                <img class="d-block w-100" src="<cms:show img_fondo />" alt="First slide">
                                <div class="carousel-caption w-100  text-center opacity-black" style='bottom:150px;'>
                                    <h4><cms:show titulo /></h4>
                                </div>
                            </div>
                        </a>
                    </cms:show_repeatable>
                </div>
                <a class="carousel-control-prev" href="#carouselPrincipal" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselPrincipal" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
            <!--/slider-->   
        </div>

    <!--menu-->
        <div class="container-fluid" id="menu" style=" z-index:10;">
            <?php
                include 'mod/menu.php';
            ?>
        </div><!--/container menu-->
    <!--/menu-->
    <!--contenid
        <!--contador-->
        <?php
           # $estatus = 1;
           # $objBen = new beneficiario;
           #$valor = $objBen->buscaCountSolicitudes($estatus);
           $valor = 2070;
        ?>
            <div id="controlMenu" class='text-white pl-4' style='height:50px;margin-top:-100px;position:absolute;'>
                <p class="fs-2 d-inline" style="text-shadow:2px 2px 3px black;" id="contador" valor="<?php echo $valor;?>"></p>
                <p class="fs-2 d-inline" style="text-shadow:2px 2px 3px black;">&nbsp;Solicitudes</p>
            </div>
       
        <!--first-block-->
        <section class='row bg-dark bg-cover-center mx-0' style="position:relative;height:300px;background-image:url('<cms:show img_beneficiarios />');">
            <div class='capa-green-25 c-align-middle '>
                <a href="">
                    <h1 class='t-shadow-2-black text-center'><a href="/beneficiarios"><cms:show beneficiarios /></a></h1>
                </a>
            </div>
        </section>
        <!--/first-block-->    
        <!--seond-block-->
        <div class="container-fluid p-0 unete">
            <div class="row no-gutters h-100 ">
                <div class="col-12 col-sm-4 bg-primary bg-cover-center" style="height:300px;background-image:url('<cms:show img_solicita />');">
                    <div class='capa-black-25 capa-transparent'>    
                        <a href="/solicitud" class='fs-1-5 w-100 h-100 c-align-middle'> 
                            <span class="fa-stack fa-lg fs-1">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-file-text fa-stack-1x fa-flip-horizontal"></i>
                            </span>
                            <span class="t-shadow-2-black"><cms:show solicita /></span>
                        </a>
                    </div>
                </div>
                <div class="col-12 col-sm-4 bg-secondary bg-cover-center" style="height:300px;background-image:url('<cms:show img_apadrina />');">
                    <div class='capa-black-25 capa-transparent '>    
                        <a href="apadrina" class='fs-1-5 w-100 h-100 c-align-middle'>
                            <span class="fa-stack fa-lg fs-1">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-gift fa-stack-1x fa-flip-horizontal"></i>
                            </span>
                            <span class="t-shadow-2-black"><cms:show apadrina /></span>
                        </a>
                    </div>    
                </div>
                <div class="col-12 col-sm-4 bg-success bg-cover-bottom" style="height:300px;background-image:url('<cms:show img_unete />');">
                    <div class='capa-black-25 capa-transparent  '>    
                        <a href="unete" class='fs-1-5 w-100 h-100 c-align-middle'>
                            <span class="fa-stack fa-lg fs-1">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-handshake-o fa-stack-1x fa-flip-horizontal"></i>
                            </span>
                            <span class="t-shadow-2-black"><cms:show unete /></span>
                        </a>
                    </div>
                </div>

            </div>
        </div>          
        <!--/second-block-->
        <!-- Noticias -->
                <div class="container-fluid p-0 bg-verde-menu">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                        <cms:pages masterpage='noticias.php' limit='3'>
                            <div class="carousel-item <cms:if k_count ='1'>active</cms:if>">
                            <a href="<cms:show k_page_link />">
                                <img class="d-block w-100" src=" <cms:show img_noticia />" alt="First slide">
                                <div class="carousel-caption  w-100  text-center opacity-black">
                                    <h4><cms:show k_page_title /></h4>
                                </div>
                            </a>
                            </div>
                            </cms:pages>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            <!--/noticias-->     
            <!--testimonio-->
            <section class='row bg-dark bg-cover-center mx-0 text-white' style="position:relative;background-image:url('<cms:show img_testimonio />');">
                <div class='flex-column c-align-middle pt-5  pb-5 px-3'>
                    <h1>Testimonio:</h1>
                    <blockquote class="blockquote text-center f-style-italic">
                    <p class="mx-5 fs-2">"<cms:show testimonio />"</p>
                    <footer class="blockquote-footer text-light fs-1-5"><cms:show autor_testimonio /></footer>
                    </blockquote> 
                    <a href="<cms:show url_testimonio />" class="btn-fundacion opacity-black text-white">Ver Testimonio</a>                          
                </div>
            </section> 
            <!--testimonio-->               
    <!--/contenido-->  

        <!--footer-->   
        <?php
            include 'mod/footer.php';
        ?>
    <!--/footer--> 
        <script src="../js/js-fundacion.js"></script>
    </body>
</html>
<?php COUCH::invoke(); ?>