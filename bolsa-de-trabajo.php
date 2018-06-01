<?php require_once('cms/cms.php'); ?>
<cms:template title='Bolsa de trabajo' parent='_aliados_'  order='3'>
    <cms:editable type='image' label='imagen cabezera' name='img_cabezera' show_preview='1' preview_width='250'/>
    <cms:editable type='text' label='Titulo de la cabezera' name='titulo_cabezera' />
    <cms:editable type='textarea' label='Mensaje de la cabezera' name='mensaje_cabezera' />
    <cms:editable type='text' label='correo' name='correo' />
    <cms:repeatable name='oferta'>
            <cms:editable type='text' label='Nombre' name='nombre_documento' />
            <cms:editable type='file' label='Subir documento' name='documento'/>
    </cms:repeatable>
</cms:template>
<?php include 'mod/header.php';?>

</head>
<body>
<?php include 'mod/menu.php';?>
    <div class="container-fluid">
        <!-- cabezera -->
        <div class="row">
            <div class="col-12 col-md-6 bg-cover-center" style='min-height:300px;background-image: url(<cms:show img_cabezera />);'></div>
            <div class="col-12 col-md-6 bg-cover-top d-flex p-5" style='background-image: url(/img/resident.png);'>
                <div class="c-align-middle flex-column w-100 text-center">
                    <h1 class='text-markoptic titulo'><cms:show titulo_cabezera /></h1>
                    <p class="lead-heavy "><cms:show mensaje_cabezera /></p>
                    <ul class=' lead-heavy text-left'>
                    <cms:show_repeatable 'oferta'>
                        <li><a href="<cms:show documento />" class='text-markoptic'><cms:show nombre_documento /></a></li>
                    </cms:show_repeatable>
                    </ul>
                    <p class="lead-heavy mb-0">Envianos tu curriculum y solicitud a:</p>
                    <a href="mailto:<cms:show correo />" class='text-markoptic fs-1-2'><cms:show correo /></a>
                </div>
            </div>
        </div>
    </div>
    <?php include 'mod/footer.php';?>
</body>
</html>
<?php COUCH::invoke(); ?>