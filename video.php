<?php require_once('cms/cms.php'); ?>
<cms:template title='Videos' clonable='1' order='8' dynamic_folders='1'>
    <cms:editable type='text' name='video_url' label='id del video' order='3'/>
    <cms:editable type='textarea' name='video_desc' label=' descripción' order='2'/>
</cms:template>
<?php include 'mod/header.php';?>

</head>
<body>
<?php include 'mod/menu.php';?>
<div class="container-fluid p-2 text-center">
<cms:if k_is_folder >
    <div class="row mx-0">
    <cms:pages folder=k_folder_name limit='6' paginate='1'>
        <div class="col-12 col-lg-4 col-md-6 p-2">
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
        <cms:if k_paginated_bottom >
                <cms:if k_paginator_required >
                <hr style='width:100%;'>   
                    <div class="text-center w-100 mb-2">
                        <cms:if k_paginate_link_prev >
                        <a class="btn btn-success rounded-0 bg-verde-menu mr-2" href="<cms:show k_paginate_link_prev />">más recientes</a>
                        </cms:if>
                        <cms:if k_paginate_link_next >
                        <a class="btn btn-success rounded-0 bg-verde-menu ml-2" href="<cms:show k_paginate_link_next />">más antiguos</a>
                        </cms:if>
                    </div>
                </cms:if> 
        </cms:if>
    </cms:pages> 
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
            <p class="lead align-self-end w-100 px-5 f-style-italic fs-1-5">"<cms:show video_desc />"</p>
            <a href="/video?f=11" class="btn btn-success rounded-0 bg-verde-menu align-self-end mx-auto mb-3">Ver todos los testimonios</a>               
            </div>
    </div>             
    <cms:else />
    <div class="row mx-0">
    <cms:pages masterpage='video.php' folder="NOT testimonios" limit='6' paginate='1'>
        <div class="col-12 col-lg-4 col-md-6 p-2">
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
        <cms:if k_paginated_bottom >
                <cms:if k_paginator_required >
                <hr style='width:100%;'>   
                    <div class="text-center w-100 mb-2">
                        <cms:if k_paginate_link_prev >
                        <a class="btn btn-success rounded-0 bg-verde-menu mr-2" href="<cms:show k_paginate_link_prev />">más recientes</a>
                        </cms:if>
                        <cms:if k_paginate_link_next >
                        <a class="btn btn-success rounded-0 bg-verde-menu ml-2" href="<cms:show k_paginate_link_next />">más antiguos</a>
                        </cms:if>
                    </div>
                </cms:if> 
        </cms:if>
    </cms:pages> 
    </div>
    </cms:if>    
</cms:if>
</div>
<?php include 'mod/footer.php' ?>
</body>
</html>
<?php COUCH::invoke(); ?>




