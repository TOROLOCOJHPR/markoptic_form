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
<div class="t-shadow-2-black w100 h-25 text-white bg-cover-center" style="background-image:url('/imagenes/fundación/val2.jpg');">
    <div class="w-100 h-100 c-align-middle opacity-green">
            <h1>Galería</h1>  
    </div>
</div>

<!--Galería fotografica-->
<div class=" container-fluid text-center text-white bg-secondary unete" id="tarjetas">
        <div class="row mb-4">
            <!-- sección fotografica -->
            <cms:folders masterpage="album.php" include_subfolders='0' hierarchical = '1' paginate = '1' limit='3' orderby="weight" order="desc">
                <div class="col-sm-4 mt-2 col-12 ">
                    <a href='<cms:show k_folder_link />'>
                        <div class="card">
                            <div class="w-100 c-img">
                                <img class=" img-cover-center w-100 h-100" src="<cms:show k_folder_image />" alt="">
                            </div>
                            <div class="w-100  c-text bg-verde-menu d-flex align-items-center">
                                <p class="w-100 ">
                                    <cms:show k_folder_title />
                                    <br>
                                    <cms:show k_folder_pagecount /> Fotografías
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
            </cms:folders>
        </div>
        <a href="/album" class="btn bg-verde-menu mb-3">ver todos los albums</a>
    </div>  
  
<!-- Galería videos -->
<h3 class="text-center mt-3">Videos</h3>
<div class="container-fluid px-0 text-center text-light">
    <div class="row mx-0">
        <cms:pages masterpage='video.php' limit='2' folder="NOT testimonios">
            <div class="col-12 col-sm-6 mt-4 px-0">
                <div class="row mx-0">
                    <div class="col-12 col-sm-5 px-0">
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<cms:show video_url />" allowfullscreen></iframe>
                        </div>
                    </div>
                    <div class="col-12 col-sm-7 px-0">
                        <div class="row mx-0 text-white text-center">
                            <div class="col-auto c-align-vertical" style="background-color:#888586;">
                                <cms:date k_page_date format='d' />
                            </div>
                            <div class="col-auto c-align-vertical text-capitalize" style="background-color:#bab4b3;">
                                <cms:date k_page_date format='%b' locale="es-MX" />
                            </div>
                            <div class="col" style="background-color:#00a55f;">
                                <cms:show k_page_title />
                            </div>
                        </div>
                        <div class="row mx-0">
                            <div class="col-12 text-dark p-3 text-center "><cms:show video_desc /></div>
                        </div>
                    </div>
                </div>  
            </div>
        </cms:pages> 
    </div>
    <a href="/video" class="btn bg-verde-menu mb-3 mt-5">ver todos los videos</a>   
</div>

<div class="container-fluid px-0 text-center bg-secondary">
    <h3 class="text-center text-white pt-3">Testimonios</h3>
    <div class="row mx-0">
        <cms:pages masterpage="video.php" folder="testimonios" limit='2'>
            <div class="col-12 col-sm-6 mt-4 px-0">
                <div class="row mx-0">
                    <div class="col-12 col-sm-5 px-0">
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<cms:show video_url />" allowfullscreen></iframe>
                        </div>
                    </div>
                    <div class="col-12 col-sm-7 px-0">
                        <div class="row mx-0 text-white text-center text-light">
                            <div class="col-auto c-align-vertical" style="background-color:#888586;">
                                <cms:date k_page_date format='d' />
                            </div>
                            <div class="col-auto c-align-vertical text-capitalize" style="background-color:#bab4b3;">
                                <cms:date k_page_date format='%b' locale="es-MX" />
                            </div>
                            <div class="col" style="background-color:#00a55f;">
                                <cms:show k_page_title />
                            </div>
                        </div>
                        <div class="row mx-0">
                            <div class="col-12 text-white p-3 text-center "><cms:show video_desc /></div>
                            <!-- <cms:show k_page_link /> -->
                        </div>
                    </div>
                </div>  
            </div>
        </cms:pages> 
    </div>
    <a href="/video?f=11" class="btn bg-verde-menu mb-3 mt-5 p-2">ver todos los testimonios</a> 
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