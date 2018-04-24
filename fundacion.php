<?php require_once( 'cms/cms.php' ); ?>
<cms:template title='fundacion' order='2'>
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
    <cms:editable name='pdf_file' label='archivo pdf' desc='Upload the file here'  type='file'/>
</cms:repeatable>
</cms:template>

<?php
    include 'mod/header.php';
    include 'mod/menu.php';
?>
<!-- Titulo principal -->
<div class="t-shadow-2-black w100 h-25 text-white bg-cover-center" style="background-image:url('/imagenes/fundación/val2.jpg');">
    <div class="w-100 h-100 c-align-middle opacity-green">
            <h1><cms:show titulo/></h1>  
    </div>
</div>

<!--Directorio-->
    <div id="directorio" class="container-fluid bg-cover-center" id="directorio">
        <div class="row text-white text-center">
            <cms:show_repeatable 'directorio'>
                <div height="450px" class="col-12 col-sm-6 bg-cover-directorio p-0" style="background-image: url('<cms:show img_director />');height:450px;">
                    <div class="directorio-descripcion opacity-black">
                        <div class="c-align-middle">
                            <p class="w-100 px-2">
                                <span class="fs-2" ><cms:show nom_director/></span>
                                <br>
                                <span style="font-size:1.2rem;" ><cms:show puesto_director /></span>                       
                            </p>
                        </div>
                        <div class="c-align-middle fs-2 px-2 f-style-italic">"<cms:show desc_director />"</div>
                    </div>
                </div>
            </cms:show_repeatable>
        </div>
    </div>
<!--/Directorio-->
    <!-- colaboradores -->
    <div id="directorio" class="container-fluid bg-cover-center">
        <div class="row text-white text-center">
            <cms:show_repeatable 'colaborador'>
                <div class="col-12 col-sm-4 p-0 bg-cover-directorio" style="background-image: url('<cms:show img_colaborador />');height:250px;">
                    <div class="colaborador-descripcion opacity-black">
                        <div class="c-align-middle">
                            <p class="px-3 pt-1">
                                <span style="font-size:1.3rem;"><cms:show nom_colaborador/></span>
                                <br>
                                <span style="font-size:1.1rem;"><cms:show puesto_colaborador /></span>
                            </p>
                        </div>
                        <div style="font-size:1.3rem;" class="c-align-middle px-2">
                            <p class="f-style-italic">"<cms:show desc_colaborador />"</p>
                        </div>
                    </div>
                </div>
            </cms:show_repeatable>
        </div>
    </div>
    <!-- /colaboradeores -->
    <!-- equipo markoptic -->
    <!-- <div id="directorio" class="container-fluid bg-cover-center" id="directorio">
        <div class="row text-white text-center">
            <cms:show_repeatable 'equipo'>
                <div class="col-12 col-sm-6 bg-cover-directorio p-0" style="background-image: url('<cms:show img_equipo />');height:450px;">
                    <div class="directorio-descripcion opacity-black">
                        <div class="c-align-middle">
                            <p class="w-100 px-2">
                                <span class="fs-2" ><cms:show nombre_equipo/></span>
                            </p>
                        </div>
                        <div class="c-align-middle fs-2 px-2 f-style-italic">"<cms:show desc_equipo />"</div>
                    </div>
                </div>
            </cms:show_repeatable>
        </div>
    </div> -->
    <!--Historia-->
<div class="container-fluid" id="historia">
    <div class="row ">
        <div class="col-lg-10 col-11 mx-auto text-center px-3 pt-5 pb-5">
            <h1 class="text-center">Historia</h1>
                <p class="fs-1-5 m-0">
                    <cms:show historia />
                </p>
        </div>
    </div>
</div>
<!--/Historia-->
<!--Misión Visión-->
<div id="mision" class=" container-fluid p-0 bg-cover" style="background-image: url('/imagenes/fundación/mis.jpg');background-position:0% 30%;">
<div class="capa-green-50 pt-5 pb-5">
<div class="row mx-0 text-white t-shadow-2-black fs-1-5">
    <div class="col-12 col-md-6 bordes p-5">
        <h1 class="text-center">Misión</h1>
            <p class="text-center ">
            <cms:show mision />
            </p>
    </div>
    <div class="col-12 col-md-6 p-5">
        <h1 class="text-center">Visión</h1>
            <p class="text-center ">
            <cms:show vision />
            </p>
    </div>
</div>
</div>
</div>
<!--/Misión Visión-->
<!--Objetivos-->
    <div id="objetivos" class="container-fluid ">
        <div class="row p-3" style="font-size:1.3rem;">
        <h1 class="text-center w-100">Objetivos</h1>
            <div class="col-12 col-sm-8 mx-auto">
                <ul class="text-justify ">
                    <cms:show_repeatable 'objetivos'>
                        <li>
                            <cms:show objetivo />
                        </li>
                    </cms:show_repeatable>
                </ul>
            </div>
        </div>
    </div>
<!--/Objetivos-->
<!--Valores-->
    <div id="valores" class="container-fluid text-white bg-verde-menu bg-cover-center p-0" style='background-image:url(/imagenes/fundación/val2.jpg);'>
        <div class='capa-green-dark-75 t-shadow-2-black'>
            <div class="row mx-0 text-center px-5">
                <div class="col-12"><h2 class="fs-3">Valores</h2></div>
                <div class="col-md-4 col-6 px-3 mx-auto p-3 c-align-middle"><p class="grow">Liderazgo</p></div>
                <div class="col-md-4 col-6 px-3 mx-auto p-3 c-align-middle"><p class="grow">Solidaridad</p></div>
                <div class="col-md-4 col-6 px-3 mx-auto p-3 c-align-middle"><p class="grow">Familia</p></div>
                <div class="col-md-4 col-6 px-3 mx-auto p-3 c-align-middle"><p class="grow">Calidad</p></div>
                <div class="col-md-4 col-6 px-3 mx-auto p-3 c-align-middle"><p class="grow">Fidelización</p></div>
                <div class="col-md-4 col-6 px-3 mx-auto p-3 c-align-middle"><p class="grow">Inclusión</p></div>
                <div class="col-md-4 col-6 px-3 mx-auto p-3 c-align-middle"><p class="grow">Respeto</p></div>
                <div class="col-md-4 col-6 px-3 mx-auto p-3 c-align-middle"><p class="grow">Empatía</p></div>
            </div>
        </div>
    </div>
<!--/Valores-->
<!--sevent.block-->
    <div id="transparencia" class="container-fluid">
        <h1 class="text-center ">Transparencia</h1>
        <div class="row">
            <div class="col-12 c-align-middle">
                <ul>
                    <cms:show_repeatable 'transparencias'>
                        <li><a href="<cms:show pdf_file />" class="text-info fs-1-5" target="blank"><cms:show transparencia /></a></li>
                    </cms:show_repeatable>
                </ul>
            </div>
        </div>
    </div>
<!--/sevent.block-->

<!--footer-->
    <?php
        include 'mod/footer.php';
    ?>
<!--/footer-->

</body>
</html>
<?php COUCH::invoke(); ?>