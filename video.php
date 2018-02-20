<?php require_once('cms/cms.php'); ?>
<cms:template title='video' clonable='1' order='8' dynamic_folders='1'>
    <cms:editable type='text' name='video_url' label='id del video' order='3'/>
    <cms:editable type='textarea' name='video_desc' label=' descripción' order='2'/>
</cms:template>
<?php include 'mod/header.php';
?>
<style>
    #menu{
        margin-top:50px;
    }
</style>

<?php 
    $menuBack = "Videos";
    if(isset($_GET['p'])){
        $menuBack = "Testimonio";
    }
    if(isset($_GET['f'])){
        if($_GET['f'] == "11"){
            $menuBack = "Testimonios";
        }
    }
?>

<!--menu-->
    <div class="container-fluid fixed-top" id="menu" style=" z-index:10;">
        <?php
            include 'mod/menu.php';
        ?>
    </div><!--/container menu-->
<!--/menu-->
<!--push-->
    <div class=" w-100" style="height:50px;"></div>
<!--/push-->
    <div class="t-shadow-2-black w100 h-25 text-white bg-cover-center" style="background-image:url('/imagenes/fundación/valores.jpg');">
        <div class="w-100 h-100  c-align-middle flex-column opacity-green">
            <cms:if k_is_page><h3>Testimonio</h3></cms:if>
            <h1 class="text-center" style='text-transform:capitalize;'><cms:if k_is_folder><cms:show k_folder_name /><cms:else /><cms:if k_is_page><cms:show k_page_title /><cms:else />Videos</cms:if></cms:if></h1>
        </div>
    </div>
    <cms:if k_is_folder >
    <div class="container-fluid px-0 text-center">
        <div class="row mx-0">
            <cms:pages folder=k_folder_name >
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
                                <div class="col-auto c-align-vertical" style="background-color:#bab4b3;">
                                    <cms:date k_page_date format='%b' locale="es-MX" />
                                </div>
                                <div class="col" style="background-color:#00a55f;">
                                    <cms:show k_page_title />
                                </div>
                            </div>
                            <div class="row mx-0">
                                <div class="col-12 text-dark p-3 text-center "><cms:show video_desc /></div>
                                <!-- <cms:show k_page_link /> -->
                            </div>
                        </div>
                    </div>  
                </div>
            </cms:pages> 
        </div>
    </div>
    <cms:else />
        <cms:if k_is_page>
        <div class="row mx-0">
            <div class="col-12 col-md-6 px-0">
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<cms:show video_url />" allowfullscreen></iframe>
                </div>
            </div>
            <div class="col-12 col-md-6 p-0 d-flex flex-wrap fs-1-5">
                <span class="text-center align-self-end w-100 px-5 f-style-italic">"<cms:show video_desc />"</span>
                <a href="/video?f=11" class="btn bg-verde-menu align-self-end mx-auto mb-3">Ver todos los testimonios</a>               
                </div>
            </div>
        </div>

        <!-- <cms:folders masterpage='video.php' hierarchical='1'>
            <cms:show k_folder_title /> [<cms:show k_level />] <br> [<cms:show k_folder_link />] <br>
        </cms:folders> -->
                
    <cms:else />
    <div class="container-fluid px-0 text-center">
    <div class="row mx-0">
        <cms:pages masterpage='video.php' folder="NOT testimonios">
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
                            <div class="col-12 text-dark p-3 text-center"><cms:show video_desc /></div>
                            <!-- <cms:show k_page_link /> -->
                        </div>
                    </div>
                </div>  
            </div>
        </cms:pages> 
    </div>
</div>
</cms:if>    
    </cms:if>
<?php include 'mod/footer.php' ?>
</body>
</html>
<?php COUCH::invoke(); ?>




