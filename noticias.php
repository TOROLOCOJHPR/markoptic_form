<?php require_once('cms/cms.php')?>
<cms:template title='noticias' clonable='1' order='7'>
    <cms:editable name='img_noticia' label='imagen' type='image' show_preview = '1' preview_height ='400' order='1' />
    <cms:editable name='noticia' label='noticia' type='richtext' order='2' />
</cms:template>
<?php
    include 'mod/header.php';
    $menuBack = "Noticias";
    include 'mod/menu.php';
?>

<!-- contenido -->
        <div class="container-fluid p-0">
            <cms:if k_is_page>
            <!-- noticia completa -->
                <!-- <a class='btn-verde f-opacity-75 p-1 text-white' style='top:50px;border-left:none;' href="/video"><i class="fa fa-2x fa-arrow-left" aria-hidden="true"></i></a> -->
                <div class="row text-white text-center">
                    <div class="col-12 bg-verde-menu">
                        <h2 class="m-0 p-4"><cms:show k_page_title /></h2>
                    </div>
                    <div class="col-auto px-2"style="background-color:#888586;">
                        <label><cms:date k_page_date format='%d' locale='es-MX' /></label>
                    </div>
                    <div class="col-auto px-2 text-left pl-2"style="background-color:#bab4b3;">
                        <label class="text-capitalize"><cms:date k_page_date format='%B'  locale="es-MX"/></label>
                    </div>
                </div>
                <div class="row mx-0">
                    <div class="col-12 text-dark px-5 text-center desc-noticia">
                        <p><cms:show noticia /></p>
                    </div>
                </div>
            <cms:else />
            <!-- noticias  segmentadas -->
                <!-- Titulo principal -->
                <!-- <div class="t-shadow-2-black text-white bg-cover-center text-center" style="background-image:url('/img/val2.jpg');">
                        <h1 class="opacity-green p-5 mb-0">Noticias</h1>
                </div> -->
                <cms:pages masterpage='noticias.php' limit='10' paginate='1'>
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
                                            <a href='<cms:show k_page_link />' class='btn btn-sm bg-verde-menu font-weight-bold rounded-0' style="bottom:0px;">leer mas...</a>
                                        </div>
                                    </div>
                                </div>
                    </div>
                    <!-- All the page variables can be accessed here -->
                    <cms:if k_paginated_bottom >
                        <cms:if k_paginate_link_prev >
                            <a href="<cms:show k_paginate_link_prev />">prev</a>
                        </cms:if>
                        <cms:if k_paginate_link_next >
                            <a href="<cms:show k_paginate_link_next />">next</a>
                        </cms:if>
                    </cms:if>
                </cms:pages>                
            </cms:if>
        </div>    
        <?php include 'mod/footer.php'; ?>
    </body>
</html>
<?php COUCH::invoke();?>