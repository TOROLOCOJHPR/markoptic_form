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
        /* margin-top:80vh; */
    }
</style>
<!--fondo-->
    <!--principal-->
        <div class=" fondo">
            <!--slider-->
            <div id="carouselPrincipal" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <cms:show_repeatable 'carouselfondo'>
                        <div class="carousel-item <cms:if k_count ='1'>active</cms:if>">
                            <a href="<cms:show url />">
                                <img class="d-block w-100 carousel-item-position-top" src="<cms:show img_fondo />" alt="First slide">
                                <div class="fixed-bottom carousel-caption w-100  text-center opacity-black">
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
        <?php
            include 'mod/menu.php';
        ?>
    <!--/menu-->
    <!--contenido-->
        <!--contador-->
        <?php
            $estatus = 1;
            $objBen = new beneficiario;
            $valor = $objBen->buscaTotalSolicitudes();
           //$valor = 2070;
        ?>
            <div id="controlMenu" class='text-white pl-4' style='height:50px;margin-top:-150px;position:absolute;'>
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
                    <div class='capa-black-25 capa-transparent d-flex justify-content-center align-items-center'>
                        <a href="/solicitud" class='fs-1-5 print'>
                            <div class="c-align-middle bg-white circle mx-auto">
                                <svg width="45%" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" >
                                    <path class="svg-dark" d="M224 136V0H24C10.7 0 0 10.7 0 24v464c0 13.3 10.7 24 24 24h336c13.3 0 24-10.7 24-24V160H248c-13.2 0-24-10.8-24-24zm64 236c0 6.6-5.4 12-12 12H108c-6.6 0-12-5.4-12-12v-8c0-6.6 5.4-12 12-12h168c6.6 0 12 5.4 12 12v8zm0-64c0 6.6-5.4 12-12 12H108c-6.6 0-12-5.4-12-12v-8c0-6.6 5.4-12 12-12h168c6.6 0 12 5.4 12 12v8zm0-72v8c0 6.6-5.4 12-12 12H108c-6.6 0-12-5.4-12-12v-8c0-6.6 5.4-12 12-12h168c6.6 0 12 5.4 12 12zm96-114.1v6.1H256V0h6.1c6.4 0 12.5 2.5 17 7l97.9 98c4.5 4.5 7 10.6 7 16.9z" class=""></path>
                                </svg>
                            </div>
                            <span class="t-shadow-2-black ml-1"><cms:show solicita /></span>
                        </a>
                    </div>
                </div>
                <div class="col-12 col-sm-4 bg-secondary bg-cover-center" style="height:300px;background-image:url('<cms:show img_apadrina />');">
                    <div class='capa-black-25 capa-transparent '>    
                        <a href="apadrina" class='fs-1-5 w-100 h-100 c-align-middle'>
                            <div class="circle c-align-middle bg-white">
                                <svg width="60%" viewBox="0 0 512 512">
                                    <path class="svg-dark" d="M32 448c0 17.7 14.3 32 32 32h160V320H32v128zm448-288h-42.1c6.2-12.1 10.1-25.5 10.1-40 0-48.5-39.5-88-88-88-41.6 0-68.5 21.3-103 68.3-34.5-47-61.4-68.3-103-68.3-48.5 0-88 39.5-88 88 0 14.5 3.8 27.9 10.1 40H32c-17.7 0-32 14.3-32 32v80c0 8.8 7.2 16 16 16h480c8.8 0 16-7.2 16-16v-80c0-17.7-14.3-32-32-32zm-326.1 0c-22.1 0-40-17.9-40-40s17.9-40 40-40c19.9 0 34.6 3.3 86.1 80h-86.1zm206.1 0h-86.1c51.4-76.5 65.7-80 86.1-80 22.1 0 40 17.9 40 40s-17.9 40-40 40zm-72 320h160c17.7 0 32-14.3 32-32V320H288v160z"></path>
                                </svg>
                            </div>
                            <span class="t-shadow-2-black ml-1"><cms:show apadrina /></span>
                        </a>
                    </div>    
                </div>
                <div class="col-12 col-sm-4 bg-success bg-cover-bottom" style="height:300px;background-image:url('<cms:show img_unete />');">
                    <div class='capa-black-25 capa-transparent  '>    
                        <a href="unete" class='fs-1-5 w-100 h-100 c-align-middle'>
                            <div class="circle c-align-middle bg-white">
                                <svg width="70%"viewBox="0 0 640 512">
                                    <path class="svg-dark" d="M519.2 127.9l-47.6-47.6A56.252 56.252 0 0 0 432 64H205.2c-14.8 0-29.1 5.9-39.6 16.3L118 127.9H0v255.7h64c17.6 0 31.8-14.2 31.9-31.7h9.1l84.6 76.4c30.9 25.1 73.8 25.7 105.6 3.8 12.5 10.8 26 15.9 41.1 15.9 18.2 0 35.3-7.4 48.8-24 22.1 8.7 48.2 2.6 64-16.8l26.2-32.3c5.6-6.9 9.1-14.8 10.9-23h57.9c.1 17.5 14.4 31.7 31.9 31.7h64V127.9H519.2zM48 351.6c-8.8 0-16-7.2-16-16s7.2-16 16-16 16 7.2 16 16c0 8.9-7.2 16-16 16zm390-6.9l-26.1 32.2c-2.8 3.4-7.8 4-11.3 1.2l-23.9-19.4-30 36.5c-6 7.3-15 4.8-18 2.4l-36.8-31.5-15.6 19.2c-13.9 17.1-39.2 19.7-55.3 6.6l-97.3-88H96V175.8h41.9l61.7-61.6c2-.8 3.7-1.5 5.7-2.3H262l-38.7 35.5c-29.4 26.9-31.1 72.3-4.4 101.3 14.8 16.2 61.2 41.2 101.5 4.4l8.2-7.5 108.2 87.8c3.4 2.8 3.9 7.9 1.2 11.3zm106-40.8h-69.2c-2.3-2.8-4.9-5.4-7.7-7.7l-102.7-83.4 12.5-11.4c6.5-6 7-16.1 1-22.6L367 167.1c-6-6.5-16.1-6.9-22.6-1l-55.2 50.6c-9.5 8.7-25.7 9.4-34.6 0-9.3-9.9-8.5-25.1 1.2-33.9l65.6-60.1c7.4-6.8 17-10.5 27-10.5l83.7-.2c2.1 0 4.1.8 5.5 2.3l61.7 61.6H544v128zm48 47.7c-8.8 0-16-7.2-16-16s7.2-16 16-16 16 7.2 16 16c0 8.9-7.2 16-16 16z"></path>
                                </svg>
                            </div>
                            <span class="t-shadow-2-black ml-1"><cms:show unete /></span>
                        </a>
                    </div>
                </div>

            </div>
        </div>          
        <!--/second-block-->
        <!-- Noticias -->
                <div class="container-fluid p-0 bg-primary">
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
        <script src="/js/js-fundacion.js"></script>
    </body>
</html>
<?php COUCH::invoke(); ?>