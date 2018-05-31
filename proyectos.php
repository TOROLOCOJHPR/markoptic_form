 <?php require_once('cms/cms.php'); ?>
<cms:template title ='Proyectos' order="3">
    <cms:editable name='titulo' type='text' order='1'/>
    <cms:repeatable name='proyecto' order='2'>
        <cms:editable type='image' name='img_proyecto' show_preview='1' preview_width='150' input_width='200' col_width='300' />
        <cms:editable type='text' name='nom_proyecto' label='nombre' />
        <cms:editable type='nicedit' name='desc_proyecto' label='descripcion' />
    </cms:repeatable>
</cms:template>
<?php include 'mod/header.php';?>

</head>
<body>
<?php include 'mod/menu.php';?>
<!-- Titulo principal -->
<div class="t-shadow-2-black text-white text-center bg-cover-center" style="background-image:url('/img/val2.jpg');">
    <h1 class="opacity-green p-5 mb-0"><cms:show titulo/></h1>  
</div>

<div class=" container-fluid text-center text-white px-0 tarjetas">
    <div class="row mx-0 p-2">        
        <cms:show_repeatable 'proyecto'>
        <div class="col-sm-6 col-12 p-2 pointer">
            <div class="card pointe border-0" data-info="<h2 class='mb-3'><cms:show nom_proyecto/></h2><img src='<cms:show img_proyecto />' class='img-thumbnail w-50 mb-3'/><p class='lead-heavy'><cms:show desc_proyecto /></p>">
                <div class="w-100 c-img">
                    <img class=" img-cover-center w-100 h-100" src="<cms:show img_proyecto />" alt="">
                </div>
                <h5 class="bg-verde-menu py-3 mb-0"><cms:show nom_proyecto/></h5>
            </div>
        </div>            
        </cms:show_repeatable>
    </div>
</div>
<!-- descripción de la tarjeta -->
<div class="lightbox-proyectos">
    <div id="dt" class="p-4 text-white text-center">
    </div>
</div>

<!--footer-->
    <?php include 'mod/footer.php'; ?>
<!--/footer-->
    <script src="/js/js-fundacion-proyectos.js"></script>
    </body>
</html>
<?php COUCH::invoke(); ?>