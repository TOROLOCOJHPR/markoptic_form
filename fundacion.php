<?php require_once( 'cms/cms.php' ); ?>
<cms:template title='Fundacion' order='2'>
<cms:editable name='titulo' type='text' order='1' />
<cms:editable name='historia' type='textarea' order='2' />
<cms:editable name='mision' type='textarea' order='3' />
<cms:editable name='vision' type='textarea' order='4' />
<cms:repeatable name='objetivos' order='5'>
    <cms:editable name='objetivo' type='textarea' label ='objetivo'/>
</cms:repeatable>
<cms:repeatable name='directorio' order='6'>
    <cms:editable type='image' name='img_director' label='Director' show_preview='1' preview_width='150' input_width='200' col_width='300' />
    <cms:editable type='text' label='Nombre' name='nom_director' />
    <cms:editable type='text' label='Puesto' name='puesto_director' />
    <cms:editable type='nicedit' label='Descripcion' name='desc_director' />
</cms:repeatable>
<cms:repeatable name='colaborador' order='7'>
    <cms:editable type='image' name='img_colaborador' label='Colaborador' show_preview='1' preview_width='200' input_width='200' col_width='300' />
    <cms:editable type='text' label='Nombre' name='nom_colaborador' />
    <cms:editable type='text' label='Puesto' name='puesto_colaborador' />
    <cms:editable type='nicedit' label='Descripcion' name='desc_colaborador' />
</cms:repeatable>
<cms:repeatable name='equipo' order='8'>
    <cms:editable type='image' name='img_equipo' label='centro de investigación' show_preview='1' preview_width='200' input_width='200' col_width='300' />
    <cms:editable type='text' name='nombre_equipo'label='nombre_equipo'  />
    <cms:editable type='nicedit'name='desc_equipo' label='Descripcion'  />
</cms:repeatable>
<cms:repeatable name='transparencias' order='9'>
    <cms:editable name='transparencia' type='text' label='transparencia'/>
    <cms:editable name='pdf_file' label='archivo pdf' desc='Sube un documento de transparencia aqui'  type='file'/>
</cms:repeatable>
</cms:template>

<?php include 'mod/header.php';?>
</head>
<body>
<?php include 'mod/menu.php';?>
<div class="container-fluid p-0">
    <!-- Titulo principal -->
    <div class="t-shadow-2-black text-white bg-cover-center text-center" style="background-image:url('/img/val2.jpg');">
        <h1 class="opacity-green mb-0 py-5"><cms:show titulo/></h1>
    </div>

    <!--Directorio-->
    <section id="directorio" id="directorio" class="row m-0">
        <cms:show_repeatable 'directorio'>
            <div class="col-12 col-sm-6 bg-cover-directorio p-0" style="background-image: url('<cms:show img_director />');height:450px;">
                <div class="h-100 director-descripcion opacity-black">
                    <div class='h-25'>
                        <h3 class="text-truncate mb-0 mt-1 mx-2"><cms:show nom_director/></h3>
                        <p><cms:show puesto_director /></p>
                    </div>
                    <div class="h-75 px-2 d-flex align-items-center">
                        <p class='desc'>"<cms:show desc_director />"</p>
                    </div>
                </div>
            </div>
        </cms:show_repeatable>
    </section>
    <!--/Directorio-->
    <!-- colaboradores -->
    <section id="colaboradores" class="row m-0">
        <cms:show_repeatable 'colaborador'>
        <div class="col-sm-4 p-0 bg-cover-directorio" style="background-image: url('<cms:show img_colaborador />');height:250px;">
            <div class="h-100 colaborador-descripcion opacity-black">
                <div class="h-25">
                    <h4 class="text-truncate mb-0"><cms:show nom_colaborador/></h4>
                    <p><cms:show puesto_colaborador /></p>
                </div>
                <div class="h-75 d-flex align-items-center">
                    <p class='desc'>"<cms:show desc_colaborador />"</p>
                </div>
            </div>
        </div>
        </cms:show_repeatable>
    </section>
    <!-- /colaboradeores -->

    <!--Historia-->
    <section id="historia" class='text-center p-2 py-5 p-md-5'>
        <h2 class='text-markoptic mb-3'>Historia</h2>
        <p class="lead mx-3 mx-md-5">
            <cms:show historia />
        </p>
    </section>
    <!--/Historia-->
    <!--Misión Visión-->
    <section id="mision" class="bg-cover" style="background-image: url('/img/mis.jpg');background-position:0% 30%;">
        <div class="row capa-green-50 mx-0 text-white t-shadow-2-black p-3 p-md-5 text-center">
            <div class="col-12 col-md-6 bordes mt-3 mb-0 my-md-5 p-0">
                <h2>Misión</h2>
                <p class="lead-heavy mx-3"><cms:show mision /></p>
            </div>
            <div class="col-12 col-md-6 mt-0 mb-3 my-md-5 p-0">
                <h2>Visión</h2>
                <p class="lead-heavy mx-3"><cms:show vision /></p>
            </div>
        </div>
    </section>
    <!--/Misión Visión-->
    <!--Objetivos-->
    <section id="objetivos" class="p-5">
        <h2 class="text-center text-markoptic mb-3">Objetivos</h2>
        <ul class="text-left col-12 col-md-8 mx-auto">
            <cms:show_repeatable 'objetivos'>
                <li class='lead mb-3'>
                    <cms:show objetivo />
                </li>
            </cms:show_repeatable>
        </ul>
    </section>
    <!--/Objetivos-->
    <!--Valores-->
    <section id="valores" class="text-white bg-cover-center" style='background-image:url(/img/val2.jpg);'>
        <div class='capa-green-dark-75 text-center t-shadow-2-black p-5'>
            <h2 class='mb-3'>Valores</h2>
            <ul class='col-sm-6 mx-auto text-left'>
                <li><strong>Innovación: </strong>Buscamos constantemente nuevas soluciones tecnológicas con un enfoque de ayuda social.</li>
                <li><strong>Solidaridad: </strong>Trabajamos en equipo para generar soluciones que mejoren la calidad de vida de personas con discapacidad.</li>
            </ul>

    </section>
    <!--/Valores-->
    <!--sevent.block-->
    <section id="transparencia" class='p-5'>
        <h2 class="text-center text-markoptic mb-3">Transparencia</h2>
            <div class="c-align-middle">
                <ul>
                    <cms:show_repeatable 'transparencias'>
                        <li><a href="<cms:show pdf_file />" class="text-info fs-1-2" target="blank"><cms:show transparencia /></a></li>
                    </cms:show_repeatable>
                </ul>
            </div>
    </section>
    <!--/sevent.block-->
</div>
<!--footer-->
    <?php
        include 'mod/footer.php';
    ?>
<!--/footer-->

</body>
</html>
<?php COUCH::invoke(); ?>