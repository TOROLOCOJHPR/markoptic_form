<?php require_once('cms/cms.php'); ?>
<cms:template title='galeria' order='4'>
    <cms:editable name='testimonio' label='testimonio' type='textarea' order='10' />
    <cms:editable name='autor_testimonio' label='Autor del testimonio' type='text' order='11' />
    <cms:editable name='url_testimonio' label='url testimonio' type='text' order='12' />
    <cms:editable name='img_testimonio' label='imagen testimonio' type='image' show_preview='1' preview_height='400' order='13'/>
</cms:template>
<?php
    //header
    include 'mod/header.php';
    include 'mod/menu.php';
?>

<!-- Titulo principal -->
<div class="t-shadow-2-black text-white bg-cover-center bg-cover-cabecera text-center">
    <h1 class="p-5 mb-0 opacity-green">Galería</h1>  
</div>

<!--Galería fotografica-->
<div class=" container-fluid p-0">
        <section class="text-center text-white bg-secondary p-3 p-md-5" id="fotografias">
            <!-- sección fotografica -->
            <h2 class="text-center text-light mb-4">Fotografias</h2>
            <div class="row mx-0">
            <cms:folders masterpage="album.php" include_subfolders='0' hierarchical = '1' paginate = '1' limit='3' orderby="weight" order="desc">
                <div class="col-sm-4 col-12 mb-3">
                    <a href='<cms:show k_folder_link />' class='tarjetas'>
                        <div class="card border-0">
                            <div class="c-img">
                                <img class="img-cover-center" src="<cms:show k_folder_image />" alt="">
                            </div>
                            <h4 class="bg-verde-menu mb-0 p-3 p-md-2 py-md-3">
                                <cms:show k_folder_title />
                                <br>
                                <small><cms:show k_folder_pagecount /> Fotografías</small>
                            </h4>
                        </div>
                    </a>
                </div>
            </cms:folders>
            </div>
            <a href="/album" class="btn btn-success bg-verde-menu rounded-0 font-weight-bold">ver todos los albums</a>
        </section>

        <section id='videos' class='text-center py-5'>
        <!-- Galería videos -->
            <h2 class="text-center text-markoptic mb-4">Videos</h2>
            <div class="row mx-0 px-2">
            <cms:pages masterpage='video.php' limit='3' folder="NOT testimonios">
                <div class="col-12 col-lg-4 col-md-6 p-2 d-block d-lg-block <cms:if k_count = '3'>d-md-none</cms:if>">
                    <div class="row mx-0">
                        <div class="col-12 p-0">
                            <div class="embed-responsive embed-responsive-16by9">
                                <iframe class="border-0" src="https://www.youtube.com/embed/<cms:show video_url />" allowfullscreen></iframe>
                            </div>
                        </div>
                        <div class="col-12 p-0">
                            <div class="row mx-0 text-white text-center">
                                <div class="col-auto bg-footer text-light d-flex">
                                    <div class='c-align-middle font-weight-bold small'><cms:date k_page_date format='%d / %b / %Y' locale="es_MX.utf8"/></div>
                                </div>
                                <div class="col bg-verde-menu">
                                    <h5 class='mb-0 p-2'><cms:show k_page_title /></h5>
                                </div>
                            </div>
                            <p class="lead m-2"><cms:show video_desc /></p>
                        </div>
                    </div>  
                </div>
            </cms:pages>
            </div>
            <a href="/video" class="btn btn-success bg-verde-menu rounded-0 font-weight-bold mx-auto mt-3">ver todos los videos</a>
        </section>

        <section id='testimonios' class='text-center py-5  bg-secondary'>
        <!-- Galería videos -->
            <h2 class="text-center text-white mb-4">Testimonios</h2>
            <div class="row mx-0 px-2">
            <cms:pages masterpage="video.php" folder="testimonios" limit='3'>
                <div class="col-12 col-lg-4 col-md-6 p-2 d-block d-lg-block <cms:if k_count = '3'>d-md-none</cms:if>">
                    <div class="row mx-0">
                        <div class="col-12 p-0">
                            <div class="embed-responsive embed-responsive-16by9">
                                <iframe class="border-0" src="https://www.youtube.com/embed/<cms:show video_url />" allowfullscreen></iframe>
                            </div>
                        </div>
                        <div class="col-12 p-0">
                            <div class="row mx-0 text-white text-center">
                                <div class="col-auto bg-footer text-light d-flex">
                                    <div class='c-align-middle font-weight-bold small'><cms:date k_page_date format='%d / %b / %Y' locale="es_MX.utf8"/></div>
                                </div>
                                <div class="col bg-verde-menu">
                                    <h5 class='mb-0 p-2'><cms:show k_page_title /></h5>
                                </div>
                            </div>
                            <p class="lead m-2 text-white"><cms:show video_desc /></p>
                        </div>
                    </div>  
                </div>
            </cms:pages>
            </div>
            <a href="/video?f=11" class="btn btn-success bg-verde-menu rounded-0 font-weight-bold mx-auto mt-3">ver todos los videos</a>
        </section>
</div> 
<!--/contenido-->
<!--footer-->
    <?php
        include 'mod/footer.php';
    ?>
<!--/footer-->
<script>
    function masonryResponsive(){
        var w = $(document).width();
        var f = $('#flexbox').width();
        var cont = 0;
        console.log("w :" + w + " f :" +f);
    }
    //funciones
    function centrar(){
             var wc = $('.lightbox-div').width()/2;
             var hc = $('.lightbox-div').height()/2;
             $('.lightbox-div').css({"top":"50%","left":"50%","margin-top":-hc,"margin-left":-wc});
    }

    //window load
    window.onload = function(){ 
        $('#load').hide();
        $('#flexbox, footer').show();
        masonryResponsive();
        $(window).resize(function(){
            masonryResponsive(); 
        });
    }
        //document ready
    $(document).ready(function(){
        $('#flexbox, footer').hide();

        //clicks
        $('.lightbox').click(function(){
            $(this).hide();
            $('.lightbox-div').hide();
        });

        $('#flexbox .item').click(function(){
            var sr = $(this).children().attr('src');
            $('.lightbox-div img').attr('src',sr);
            var w =  $(this).children().width();
            var h = $(this).children().height();
            if(w>h){
                //alert("w");
                $('.lightbox-div').css({"width":"auto","height":"90%",});
                $('.lightbox-div img').css({"width":"auto","height":"100%"});
            }
            if(w<h){
                //alert("h");
                $('.lightbox-div').css({"height":"90%","width":"auto"});
                $('.lightbox-div img').css({"height":"100%","width":"auto"});
            }
            if(w==h){
               // alert("==");
                $('.lightbox-div').css({"height":"90%","width":"auto"});
                $('.lightbox-div img').css({"height":"100%","width":"auto"});
            }
            centrar();
            $('.lightbox-div ,.lightbox').show();
        });
    });
  
</script>

    </body>
</html>
<?php COUCH::invoke(); ?>