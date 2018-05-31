<?php require_once('cms/cms.php')?>
<cms:template title='Noticias' clonable='1' order='7'>
    <cms:editable name='img_noticia' label='imagen' type='image' show_preview = '1' preview_height ='400' order='1' />
    <cms:editable name='noticia' label='noticia' type='richtext' order='2' toolbar='full' />
</cms:template>
<?php include 'mod/header.php';?>
<meta property="og:url"                content="<cms:show k_page_link />" />
<meta property="og:type"               content="article" />
<meta property="og:image"              content="<cms:show img_noticia />" />
<meta property="og:description"        content="<cms:excerpt count='450'  truncate_chars='1'><cms:do_shortcodes><cms:show noticia /></cms:do_shortcodes></cms:excerpt>" />
<meta property="fb:app_id"             content="1632168933701186" />
</head>
<body>
<?php include 'mod/menu.php'; ?>

<!-- contenido -->
        <div class="container-fluid p-0">
            <cms:if k_is_page>
                <div class="t-shadow-2-black text-white bg-cover-center text-center mb-3 pub-header" style="filter: grayscale(0.4);background-image:url('<cms:show img_noticia />');">
                    <div class="opacity-green p-3 p-sm-5">
                        <h1 class=" mb-0"><cms:show k_page_title /></h1>
                        <hr>
                        <small>publicado el: <cms:date k_page_date format='%d de %B de %Y' locale="es_MX.utf8"/></small>
                    </div>
                </div>
                <div class="publicacion">
                    <cms:show noticia />
                <hr>
                <p class='h3 mb-0'>Compartir la publicacion</p>
                <div id="share"></div>
                </div>
            <cms:else />
                <cms:pages masterpage='noticias.php' limit='5' paginate='1'>
                    <div class="row mx-0">
                        <div class="col-12 col-md-4 p-0">
                            <img class="img-cover-center" src="<cms:show img_noticia />" style='max-height:300px;min-height:250px;' alt="imagen de noticia">
                        </div>
                        <div class="col-12 col-md-8 p-0">
                            <div class="row mx-0">
                                <!-- titulo y fecha -->
                                <div class="col-auto bg-footer text-light d-flex">
                                    <div class='c-align-middle font-weight-bold small'><cms:date k_page_date format='%d/%b/%Y' locale="es_MX.utf8"/></div>
                                </div>
                                <div class="col p-0 text-center c-align-middle p-2 bg-verde-menu">
                                    <h5 class="text-white p-0 m-0"><cms:show k_page_title /></h5>
                                </div>
                            </div>
                            <div class="row mx-0">
                                <div class="col-12 px-4 pt-3 pb-2 text-dark">
                                    <p><cms:excerpt count='450' truncate_chars='1'><cms:show noticia /></cms:excerpt></p>
                                    <a href='<cms:show k_page_link />' class='btn btn-sm btn-success bg-verde-menu font-weight-bold rounded-0' style="bottom:0px;">leer mas...</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- All the page variables can be accessed here -->
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
                </cms:pages>                
            </cms:if>
        </div>    
        <?php include 'mod/footer.php'; ?>
        <script src="/js/minify/jssocials.min.js"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
        <script>
        $("#share").jsSocials({
            showCount: true,
            showLabel: false,
            shareIn: "popup",
            showCount: "inside",
            shares: [
            { share: "facebook", logo: "fab fa-facebook",label: "Compartir"},
            { share: "twitter", logo: "fab fa-twitter"},
            { share: "linkedin", logo: "fab fa-linkedin",label: "Compartir"},
            { share: "whatsapp", logo: "fab fa-whatsapp"}
            ]
        });
    </script>
    </body>
</html>
<?php COUCH::invoke();?>