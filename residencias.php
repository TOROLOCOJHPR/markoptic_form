<?php require_once('cms/cms.php'); ?>
<cms:template title='Residencias' parent='_aliados_'  order='4'>
    <cms:editable type='image' label='imagen cabezera' name='img_cabezera' show_preview='1' preview_width='250'/>
    <cms:editable type='text' label='Titulo de la cabezera' name='titulo_cabezera' />
    <cms:editable type='text' label='Mensaje de la cabezera' name='mensaje_cabezera' />
    <cms:editable type='text' label='correo' name='correo' />
    <cms:repeatable name='residente'>
            <cms:editable type='text' label='Video del residente' name='video'/>
            <cms:editable type='text' label='Nombre' name='nombre' />
            <cms:editable type='text' label='Escuela' name='escuela' />
            <cms:editable type='text' label='Carrera' name='carrera' />
    </cms:repeatable>
</cms:template>
<?php include 'mod/header.php';?>

</head>
<body>
<?php include 'mod/menu.php';?>
    <div class="container-fluid">
        <!-- cabezera -->
        <div class="row">
            <div class="col-12 col-md-6 bg-cover-center" style='height:350px;background-image: url(<cms:show img_cabezera />);'></div>
            <div class="col-12 col-md-6 bg-cover-top d-flex p-5" style='background-image: url(/img/resident.png);'>
                <div class="c-align-middle flex-column w-100 text-center">
                    <h1 class='text-markoptic titulo'><cms:show titulo_cabezera /></h1>
                    <p class="lead fs-1-2 mb-0"><cms:show mensaje_cabezera /></p>
                    <a href="mailto:<cms:show correo />" class='text-markoptic fs-1-2'><cms:show correo /></a>
                </div>
            </div>
        </div>

        <!-- videos de residencias -->
        <cms:show_repeatable 'residente'>
        <cms:set res = "<cms:mod k_count '2' />" />
        <div class="row">
            <div class="col-12 col-md-6 p-0 <cms:if res gt '0' >order-md-1</cms:if>">
                <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="border-0" src="https://www.youtube.com/embed/<cms:show video />" allowfullscreen></iframe>
                </div>
            </div>
            <div class="col-12 col-md-6 bg-cover-top d-flex p-3" style='background-image: url(/img/resident.png);'>
                <div class="c-align-middle flex-column w-100">
                    <p class="lead mb-0 font-weight-bold">Conoce a:</p>
                    <h2 class='text-markoptic titulo'><cms:show nombre /></h2>
                    <p class="lead mb-0 fs-1-2"><span class='text-markoptic font-weight-bold'>Estudia:</span> <cms:show carrera /></p>
                    <p class="lead fs-1-2"><span class='text-markoptic font-weight-bold'>En:</span> <cms:show escuela /></p>
                </div>
            </div>
        </div>
        </cms:show_repeatable>
    </div>
    <?php include 'mod/footer.php';?>
</body>
</html>
<?php COUCH::invoke(); ?>