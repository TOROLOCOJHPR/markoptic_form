<?php require_once('cms/cms.php'); ?>
<cms:template title='Aliados' order='5'>
    <cms:repeatable name='asesor' order='1'>
        <cms:editable type='image' name='img_asesor' label='Asesor' show_preview='1' preview_width='200' input_width='200' col_width='300' />
        <cms:editable type='text' label='Nombre asesor' name='nom_asesor' />
        <cms:editable type='text' label='Puesto asesor' name='puesto_asesor' />
        <cms:editable type='nicedit' label='Descripcion asesor' name='desc_asesor' />
    </cms:repeatable>
    <cms:repeatable name='aliado' order='2'>
        <cms:editable type='image' name='img_aliado' label='aliado' show_preview='1' preview_width='150' input_width='200' col_width='300' />
        <cms:editable type='text' label='Nombre' name='nom_aliado' />
    </cms:repeatable>
</cms:template>
<?php
    include 'mod/header.php';
    $menuBack = "Amigos";
    if(isset($_GET['al'])){
        $titulo = $_GET['al'];
        if($titulo == "residencias"){$menuBack = "Residencias";}
        if($titulo == "voluntariado"){$menuBack = "Voluntariado";}
        if($titulo == "bolsaTrabajo"){$menuBack = "Bolsa de Trabajo";}
        if($titulo == "asesores"){$menuBack = "Asesores";}
    }
?>
    <style>
    #menu{
        margin-top:50px;
    }
    </style>
    <!--push-down-->
        <div class=""style="height:50px;position:relative;"></div>
    <!--/push-down-->
    <!--menu-->
        <div class="container-fluid fixed-top" id="menu" style=" z-index:10;">
            <?php
                include 'mod/menu.php';
            ?>
        </div>
    <!-- Titulo principal -->
    <div class="t-shadow-2-black w-100 h-25 text-white bg-cover-center" style="background-image:url('/imagenes/fundación/valores.jpg');">
        <div class="w-100 h-100 c-align-middle opacity-green">
        <style>
            h1{
                text-transform:capitalize;
            }
        </style>
        <?php
            if(isset($_GET['al'])){
                $titulo = $_GET['al'];
                if($titulo == "bolsaTrabajo"){
                    $titulo = "Bolsa de Trabajo";
                }
                echo "<h1>".$titulo."</h1>";
            }else{
                echo "<h1>Amigos</h1>";
            }
        ?>
        </div>
    </div>
    <!-- contenido -->
    <?php     
        $contenido="
        <h2 class='text-center pt-3'>¡Muchas Gracias!</h2>
        <h4 class='text-center px-5 pb-4'>Gracias por la confianza que nos brindan, juntos mejoramos la calidad de vida de personas con discapacidad</h4>
        <ul class='list-inline mx-5 mt-3 text-center' id='aliados'>
            <cms:show_repeatable 'aliado'>
                <li><img src='<cms:show img_aliado />' alt='<cms:show nom_aliado />'></li>
            </cms:show_repeatable>
        </ul>";
        if(isset($_GET['al'])){
            $contenido = $_GET['al'];
            if ($contenido == 'residencias'){
                $contenido = '
                <div class="row mx-0">
                    <div class="col-12 col-md-6 p-0">
                        <img class="img-fluid" src="../imagenes/fundación/residencias.jpg" alt="residentes fundación markoptic">
                    </div>
                    <div class="col-12 col-md-6 c-align-middle px-5 fs-1-5 text-center">
                        <p> ¡Únete al equipo de Markoptic! <br>Libera tu servicio social y residencias con nosotros.<br> Envía tus datos a <br><a class="text-info" href="mailto:residencias@markoptic.mx">residencias@markoptic.mx</a></p>
                    </div>
                </div>
                <div class="row mx-0">
                    <div class="col-12 col-md-6 c-align-middle px-5 fs-1-5 text-center">
                        <p>
                        <span><strong>Conoce a: </strong>Misael Verdugo</span>
                        <span><br><strong>Estudiante de: </strong>Ingenieria Mecánica</span>
                        <span><br><strong>De: </strong>El Instituto Tecnológico de Culiacán</span>
                        </p>
                    </div>
                    <div class="col-12 col-md-6 p-0">
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/lMPqaebeVec" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
                <div class="row mx-0">
                    <div class="col-12 col-md-6 p-0">
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/YeTZaCjZclQ" allowfullscreen></iframe>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 c-align-middle px-5 fs-1-5 text-center">
                        <p>
                            <span><strong>Conoce a: </strong>Pamela Puente Armienta</span>
                            <span><br><strong>Estudiante de: </strong>Ciencias de la Comunicación</span>
                            <span><br><strong>De: </strong>La Universidad de Occidente</span>
                        </p>
                    </div>
                </div>
                <div class="row mx-0">
                    <div class="col-12 col-md-6 c-align-middle px-5 fs-1-5 text-center">
                        <p>
                        <span><strong>Conoce a: </strong>Eric Alejandro</span>
                        <span><br><strong>Estudiante de: </strong>Ingenieria Mecatrónica</span>
                        <span><br><strong>De: </strong>El Instituto Tecnológico de Culiacán</span>
                        </p>
                    </div>
                    <div class="col-12 col-md-6 p-0">
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/P7NCK_sFCFI" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
                <div class="row mx-0">
                    <div class="col-12 col-md-6 p-0">
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/GJim0yCj0N0" allowfullscreen></iframe>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 c-align-middle px-5 fs-1-5 text-center">
                        <p>
                            <span><strong>Conoce a: </strong>Francisco Cibrian</span>
                            <span><br><strong>Estudiante de: </strong>Ingenieria Mecatrónica</span>
                            <span><br><strong>De: </strong>El Instituto Tecnológico de Culiacán</span>
                        </p>
                    </div>
                </div>
                ';
            }
            if ($contenido == 'voluntariado'){
                $contenido = '
                <div class="row mx-0" >
                    <div class="col-12 col-md-6 p-0">
                        <img class="img-fluid" src="../imagenes/fundación/voluntariado.jpg" alt="voluntariado fundación markoptic">
                    </div>
                    <div class="col-12 col-md-6 px-5 c-align-middle flex-column fs-1-5">
                        <p class="text-center mb-0">Únete a nosotros, participa en nuestras actividades y ayúdanos a cumplir nuestra labor social, contamos con varias opciones de voluntariado<br><a href="/files/voluntariado.pdf" target="blank" class="text-info" href="">Consultar las opciones de voluntariado</a><br> Si necesitas más información puedes comunicarte al Teléfono <a class="text-info" href="tel:7152166">715 21 66</a> o al correo <a class="text-info" href="mailto:info@fundacionmarkoptic.org.mx">info@fundacionmarkoptic.org.mx</a></p>
                    </div>
                </div>
                '; 
            }
            if ($contenido == 'bolsaTrabajo'){
                $contenido = '
                <div class="row mx-0">
                <div class="col-12 col-md-6 p-0">
                    <img class="img-fluid "src="../imagenes/fundación/bolsa de trabajo.jpg" alt="bolsa de trabajo fundación markoptic">
                </div>    
                <div class="col-12 col-md-6 p-0 c-align-middle flex-column px-5 fs-1-5">
                <p class="text-center w-100 mb-0">Te invitamos a formar parte del equipo de trabajo de Gallbo - Markoptic, consulta nuestros puestos de trabajo en los siguientes enlaces:</p>
                <div class="w-100 c-align-horizontal">
                    <ul class="mb-0">
                        <li><a class="text-info" href="/files/Bolsa_Trabajo_Fundación_Markoptic.pdf" target="blank">Bolsa de Trabajo Fundación Markoptic</a></li>
                        <li><a class="text-info" href="/files/Bolsa_Trabajo_Gallbo.pdf" target="blank">Bolsa de Trabajo Gallbo Reclamación estratégica</a></li>
                        <li><a class="text-info" href="/files/Bolsa_Trabajo_Centro_Investigación_Markoptic.pdf" target="blank">Bolsa de Trabajo Centro de investigación Markoptic</a></li>
                    </ul>
                </div>
                <p class="text-center mb-0">Haznos llegar tu currículum y solicitud a la dirección <br> <a class="text-info" href="mailto:curriculum@markoptic.mx">curriculum@markoptic.mx</a></p>
                </div>
                </div>
                '; 
            }
            if($contenido == "asesores"){
                $contenido = '
                <div id="colaborador" class="container-fluid bg-cover-center">
                    <div class="row text-white text-center">
                        <cms:show_repeatable "asesor">
                            <div class="col-12 col-sm-4 p-0 bg-cover-directorio" style="background-image: url('."<cms:show img_asesor />".');height:250px;">
                                <div class="colaborador-descripcion opacity-black">
                                    <div class="c-align-middle">
                                        <p class="px-3 pt-1">
                                            <span style="font-size:1.3rem;"><cms:show nom_asesor/></span>
                                            <br>
                                            <span style="font-size:1.1rem;"><cms:show puesto_asesor /></span>
                                        </p>
                                    </div>
                                    <div style="font-size:1.3rem;" class="c-align-middle px-2">
                                        <cms:show desc_asesor />
                                    </div>
                                </div>
                            </div>
                        </cms:show_repeatable>
                    </div>
                </div>
                ';
            }
        }
    ?>
    
<?php
    echo $contenido;
    include 'mod/footer.php';
?>
    </body>
</html>
<?php COUCH::invoke(); ?>