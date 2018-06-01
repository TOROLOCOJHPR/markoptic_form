<?php require_once('cms/cms.php'); ?>
<cms:template title='Unete' parent='_aliados_'  order='1'>
        <cms:editable type='text' label='Mensaje' name='mensaje' />
        <cms:repeatable name='secciones' >
            <cms:editable type='image' name='caratula' label='Caratula de la seccion' show_preview='1' preview_width='150' input_width='200' col_width='300' />
            <cms:editable type='text' label='Titulo de la seccion' name='seccion' />
            <cms:editable name="colores" label="Color de la caratula" desc="Selecciona el color de la caratula"
            opt_values='Verde=capa-green-50 | Rosa=capa-pink-50 | Azul=capa-blue-50 | Morada=capa-purple-50'
            opt_selected = 'capa-green-50'
            type='dropdown'
            />
            <cms:editable type='text' label='Enlace a la seccion' name='link' />
        </cms:repeatable>
</cms:template>
<?php include 'mod/header.php';?>

</head>
<body>
<?php include 'mod/menu.php';?>
    
    <!-- Titulo principal -->
    <div class="t-shadow-2-black text-white bg-cover-center text-center bg-cover-cabecera">
        <h1 class="p-5 mb-0 opacity-green"><cms:show mensaje /></h1>
    </div>
    <!-- contenido -->

    <div class="container-fluid p-0">
        <div class="row mx-0">
            <cms:show_repeatable 'secciones'>
            <a href='<cms:show link />' class="col-12 col-md-6 bg-cover-center aliados-block" style="height:300px;background-image:url('<cms:show caratula />');">
                <div class="<cms:show colores /> capa-transparent c-align-middle">
                        <h3><cms:show seccion /></h3>
                </div>
            </a>
            </cms:show_repeatable>
        </div>
    </div>

    <?php  include 'mod/footer.php'; ?>
    </body>
</html>
<?php COUCH::invoke(); ?>