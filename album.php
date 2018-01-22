<?php require_once('cms/cms.php'); ?>
<cms:template title='album' clonable='1' dynamic_folders='1' gallery='1' order='6'>
<cms:editable
      name="gg_image"
      label="Image"
      show_preview='1'
      preview_height='400'
      type="image"
   />

   <cms:editable
      name="gg_thumb"
      assoc_field="gg_image"
      label="Image Thumbnail"
      width='500'
      height='500'
      enforce_max='1'
      type="thumbnail"
   />
</cms:template>
<?php include 'mod/header.php';
?>
<style>
    #menu{
        margin-top:50px;
    }

</style>
<!--menu-->
    <div class="container-fluid fixed-top" id="menu" style=" z-index:10;">
    <cms:if k_is_folder>
        <cms:php> 
        $menuBack = "<cms:show k_folder_title />";
        include 'mod/menu.php';
        </cms:php>
    <cms:else />
        <cms:php> 
        $menuBack = "Álbums";
        include 'mod/menu.php';
        </cms:php>
    </cms:if>
    </div><!--/container menu-->
<!--/menu-->
<!--push-down-->
<div class=""style="height:50px;position:relative;"></div>
<!--/push-down-->
<cms:if k_is_folder>
<!--load-->
<div id="load"class='c-align-middle'>
    <img src="/imagenes/gif/gatito.gif" alt="loading" class=''>
</div>
<!--/load-->
<!-- <a class='btn-verde f-opacity-75 p-1' style='top:50px;border-left:none;' href="/galeria"><i class="fa fa-2x fa-arrow-left" aria-hidden="true"></i></a> -->
<div class="p-0" id="flexbox" style='display:none;'>
<cms:pages folder=k_folder_name>
    <a href='<cms:show gg_image />' data-lightbox="roadtrip">
        <div class="item"><img src="<cms:show gg_image />" /></div>
    </a>
    </cms:pages>
</div>
    <cms:else />
    <div class=" container-fluid text-center text-white unete" style='background-color:whitesmoke;' id="tarjetas">
        <div class="row pb-4">
            <!-- sección fotografica -->
            <cms:folders masterpage="album.php" include_subfolders='0' orderby="weight" order="desc">
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
    </div>  
</cms:if>

    <?php include 'mod/footer.php'?>
    <script>
        //window load
        window.onload = function(){ 
            $('#load').hide();
            $('#flexbox, footer').show();
            $(window).resize(function(){ 
            });
        }
    </script>
</body>
</html>
<?php COUCH::invoke(); ?>