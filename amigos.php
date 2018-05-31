<?php require_once('cms/cms.php'); ?>
<cms:template title='Amigos' order='5'>
    <cms:repeatable name='aliado'>
        <cms:editable type='image' name='img_aliado' label='aliado' show_preview='1' preview_width='150' input_width='200' col_width='300' />
        <cms:editable type='text' label='Nombre' name='nom_aliado' />
    </cms:repeatable>
</cms:template>
<?php include 'mod/header.php';?>
</head>
<body>
<?php include 'mod/menu.php';?>
    <!-- Titulo principal -->
    <div class="t-shadow-2-black text-white bg-cover-center bg-cover-cabecera">
        <div class="p-5 opacity-green text-white text-center">
            <h1 class='text-center'>¡Muchas Gracias!</h1>
            <h4 class='text-center mb-0'>Gracias por la confianza que nos brindan, juntos mejoramos la calidad de vida de personas con discapacidad</h4>
        </div>
    </div>
    <ul class='list-inline mx-5 mt-3 text-center' id='aliados'>
        <cms:show_repeatable 'aliado'>
            <li><img src='<cms:show img_aliado />' alt='<cms:show nom_aliado />'></li>
        </cms:show_repeatable>
    </ul>

    <?php include 'mod/footer.php';?>
    </body>
</html>
<?php COUCH::invoke(); ?>