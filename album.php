<?php require_once('cms/cms.php');?>
<cms:template title='Album fotografico' clonable='1' dynamic_folders='1' gallery='1' order='6'>
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
<?php include 'mod/header.php';?>

</head>
<body>
<?php include 'mod/menu.php';?>
<cms:if k_is_folder>
    <!--load-->
    <div id="load"class='c-align-middle'>
        <img src="/img/gif/gatito.gif" alt="loading" class=''>
    </div>

    <div class="p-0" id="flexbox" style='display:none;'>
    <cms:pages folder=k_folder_name>
        <a href='<cms:show gg_image />' data-lightbox="roadtrip">
            <div class="item"><img src="<cms:show gg_image />" /></div>
        </a>
        </cms:pages>
    </div>
<cms:else />
    <div class="container-fluid p-2" style='background-color:whitesmoke;' id="tarjetas">
        <div class="row mx-0">
            <!-- sección fotografica -->
            <cms:folders masterpage="album.php" include_subfolders='0' orderby="weight" hierarchical = '1' order="desc" limit='6' paginate='1'>
            <div class="col-sm-4 col-12 p-2">
                <a href='<cms:show k_folder_link />' class='tarjetas'>
                    <div class="card border-0">
                        <div class="c-img">
                            <img class="img-cover-center" src="<cms:show k_folder_image />" alt="">
                        </div>
                        <h4 class="bg-verde-menu mb-0 p-3 p-md-2 py-md-3 text-center">
                            <cms:show k_folder_title />
                            <br>
                            <small><cms:show k_folder_pagecount /> Fotografías</small>
                        </h4>
                    </div>
                </a>
            </div>
            <cms:if k_paginated_bottom >
                <cms:if k_paginator_required >
                <hr style='width:100%;'>   
                    <div class="text-center w-100 mb-2">
                        <cms:if k_paginate_link_prev >
                        <a class="btn btn-success rounded-0 bg-verde-menu mr-2" href="<cms:show k_paginate_link_prev />">más recientes</a>
                        </cms:if>
                        <cms:if k_paginate_link_next >
                        <a class="btn btn-success rounded-0 bg-verde-menu ml-2" href="<cms:show k_paginate_link_next />">más antiguas</a>
                        </cms:if>
                    </div>
                </cms:if> 
            </cms:if>
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