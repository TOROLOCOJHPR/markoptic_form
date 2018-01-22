<?php include_once('cms/cms.php');?>
<cms:template title='testimonios' clonable='1' order='8'>

</cms:template>
<?php 
    include 'header.php';
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
                include 'menu.php';
            ?>
        </div><!--/container menu-->
    <!--/menu-->
    <!-- contenido -->
    <!-- Titulo principal -->
<div class="t-shadow-2-black w100 h-25 text-white bg-cover-center" style="background-image:url('/imagenes/fundación/valores.jpg');">
    <div class="w-100 h-100 c-align-middle opacity-green">
        <h1>Testimonios</h1>
    </div>
</div>
<!-- Galeria videografica -->
<div class="container-fluid p-0">
    <!-- sección de video -->
    <div class="row mx-0">
        <cms:pages masterpage='testimonios.php'>
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
                            <div class="col-auto c-align-vertical" style="background-color:#bab4b3;">
                                <cms:date k_page_date format='M' />
                            </div>
                            <div class="col" style="background-color:#00a55f;">
                                <cms:show k_page_title />
                            </div>
                        </div>
                        <div class="row mx-0">
                            <div class="col-12 text-dark p-3 text-left "><cms:show video_desc /></div>
                        </div>
                    </div>
                </div>  
            </div>
        </cms:pages> 
    </div>
</div>
<?php 
include 'footer.php';
?>
    </body>
</html>
<?php COUCH::invoke(); ?>