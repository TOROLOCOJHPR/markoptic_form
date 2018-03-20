<?php
    if($d == "brazo"){
        $imgfoto1 = "../imagenes/fundación/foto beneficiario 1.jpg";
        $imgfoto2 = "../imagenes/fundación/foto beneficiario 2.jpg";
        $imgfoto3 = "../imagenes/fundación/foto beneficiario 3.jpg";
        $porUltimo ='Por último, ayúdanos adjuntando unas fotografías recientes y claras, como se muestra en las siguientes imágenes, donde podamos identificar tu necesidad';
    }elseif($d == "colchon"){
        $imgfoto1 = "imagenes/fundación/img-sin-foto.png";
        $imgfoto2 = "imagenes/fundación/img-sin-foto.png";
        $imgfoto3 = "imagenes/fundación/img-sin-foto.png";
        $porUltimo ='Por último, ayúdanos adjuntando unas fotografías recientes y claras, donde podamos identificar tu necesidad';
    }
?>
<div class='row mx-0 mt-4'>
    <div class='col-md-4 bg-verde-menu c-align-middle text-white p-3'>
        <p class='mb-0'>Información del dispositivo</p>
    </div>
</div>
<?php
    $objBen = new Beneficiario();
    //busca dipositivos
    if( $d == "brazo"){
        $sol = "superior";
    ?>
    <div class="form-row px-4 mx-0 mt-2">
        <div class="form-group col-md-6">
            <label class="pt-4 pb-2"><strong>¿Qué extremidad necesita?</strong></label>
            <span class="text-danger <?php echo ($edispositivo == 1)?"":"d-none"; ?>"> *Selecciona un dispositivo</span>
    <?php
    }elseif($d == "colchon"){
        $sol = "colchon";
    }
    if( isset( $_POST['solicitud'] ) ){
        $nd = $_POST['solicitud'];
    }else{
        $nd = "";
    }
?>
<?php
    $objBen->buscaDispositivo($sol,$nd);
    if( $d == "brazo"){
?>
        </div>
    </div>
<?php  
    }
    //busca condiciones de la amputación
    if($d == "brazo"){
        $condicion = $d;
        $vCondicion = ( isset($_POST['condicion']) )? $_POST['condicion'] : "";
    }elseif($d == "colchon"){
        $condicion = "n/a";
        $vCondicion = "";
    }
?>
<div class="for-row px-4 mx-0">
    <span class="text-danger <?php echo ($econdicion == 1)?"":"d-none"; ?>"> *Selecciona una condición</span>
    <?php
        $objBen->buscaCondicion($condicion,$vCondicion);
    ?>
</div>
<label class="pt-4 pb-2"><strong class="w-100 mt-5 mx-4">¿Cómo te enteraste de Fundación Markoptic?</strong></label>
<span style='color:red;display:<?php echo ($emedio == 1)?"":"none"; ?>;'> *Selecciona un medio de difusión</span>
<span style='color:red;display:<?php echo ($emedioOtro == 1)?"":"none"; ?>;'> *Introduce una descripción</span>
<?php
    if( isset($_POST['enterado']) ){
        $difusion = $_POST['enterado'];
    }else{
        $difusion = "";
    }
    if( isset( $_POST['enteradoOtro'] ) ){
        $otro = $_POST['enteradoOtro'];
    }else{
        $otro = "";
    }
?>
<div class="form-row mx-0 px-4">
    <div class='form-inline col-md-12 px-0'>
    <?php
        $objBen->buscaDifusion($difusion,$otro);
    ?>
    </div>
</div>
<!-- descripcion -->
<label class ="text-danger px-4 pt-3 <?php echo ($eporque == 1)?"":"d-none"; ?>"> *Introduce por que solicitas el dispositivo</label>
<div class="form-row px-4 mx-0">
    <div class='form-group col-12 px-0'>
        <textarea name='breveDescripcion' rows="4" cols="50" class='form-control mt-3' placeholder="Cuéntanos brevemente porque te gustaría recibir el dispositivo biomédico" required><?php if(isset($_POST['breveDescripcion'])){echo $_POST['breveDescripcion'];}?></textarea>
    </div>
</div>
<!-- fotografias del usuario -->
<div class='row mx-0 px-4' id='foto'>
    <h3 class='text-center' style='line-height:140%;'><?php echo $porUltimo; ?></h3>
    <div class='col-12 col-md-4 mx-auto' id='foto1'>
        <div class="row mx-0">
            <div class="col-6">
                <label id="label" for="fotofile1"><img src="<?php echo $imgfoto1; ?>" alt="Fotografia de beneficiario numero uno"></label>
                <input id="fotofile1" name="foto1" class="form-control-file" type='file'>
            </div>
            <div class="col-6 c-align-middle">
                <img class="preview" id="previewFoto1" src="" style="display:none;">
            </div>
        </div>  
        <span class="text-danger <?php echo ($efoto1 == 1)?"":"d-none"; ?>"> *Introduce una fotografía</span>
        <span class="text-danger <?php echo ($efifoto1 == 1)?"":"d-none"; ?>"> *Introduce un archivo jpg o png</span>
    </div>
    <div class='col-12 col-md-4 mx-auto' id="foto2"> 
        <div class="row mx-0">
            <div class="col-6">
                <label for="fotofile2"><img src="<?php echo $imgfoto2; ?>" alt="Fotografia de beneficiario numero dos"></label>     
                <input id='fotofile2' name="foto2" class="form-control-file" type='file'>
            </div>
            <div class="col-6 c-align-middle">
                <img class="preview" id="previewFoto2" src="" style="display:none;">
            </div>
        </div>
        <span class="text-danger <?php echo ($efoto2 == 1)?"":"d-none"; ?>"> *Introduce una fotografía</span>
        <span class="text-danger <?php echo ($efifoto2 == 1)?"":"d-none"; ?>"> *Introduce un archivo jpg o png</span>
    </div>
    <div class='col-12 col-md-4 mx-auto' id="foto3">
        <div class="row mx-0">
            <div class="col-6">
                <label for="fotofile3"><img src="<?php echo $imgfoto3; ?>" alt="Fotografia de beneficiario numero tres"></label>     
                <input id='fotofile3' name="foto3" class="form-control-file" type='file'>
            </div>
            <div class="col-6 c-align-middle">
                <img class="preview" id="previewFoto3" src="" style="display:none;">
            </div>
        </div> 
        <span class="text-danger <?php echo ($efoto3 == 1)?"":"d-none"; ?>"> *Introduce una fotografía</span>
        <span class="text-danger <?php echo ($efifoto3 == 1)?"":"d-none"; ?>"> *Introduce un archivo jpg o png</span>
    </div>
</div>
<!-- campos ocultos -->
<input type='hidden' value='form' name='form' />
<input type='hidden' value='<?php echo $d;?>' name='formDispositivo' />
<input type='hidden' value='' name='edad' id="edad"/>
<!-- terminos y condiciones -->
<hr>
<h3 class="m-4">Términos y Condiciones</h3>
<div class="form-row mx-0">
    <textarea type="textarea" class="form-control px-4 mx-4" style="resize: none;" rows="10" readonly="true">
TERMINOS Y CONDICIONES DE USO Y PRIVACIDAD

A los Usuarios les informamos de los siguientes Términos y Condiciones de Uso y Privacidad, les son aplicables por el simple uso o acceso a cualquiera de las Páginas que integran el Portal de FUNDACIÓN MARKOPTIC A.C. (“LA PAGINA”) por lo que entenderemos que los acepta, y acuerda en obligarse en su cumplimiento.
El Usuario entendido como aquella persona que realiza el acceso mediante equipo de cómputo y/o de comunicación, conviene en no utilizar dispositivos, software, o cualquier otro medio tendiente a interferir tanto en las actividades y/u operaciones del “LA PAGINA” o en las bases de datos y/o información que se contenga en el mismo.

1. PROPIEDAD INTELECTUAL
De una parte Fundación Markoptic A.C. (FMAC) y domiciliado en la calle Frida Kahlo #2411 Norte Fraccionamiento Rincón Alameda, Culiacán, Sinaloa, México. C.P. 80020, y representada por el Lic. Manuel Humberto Gallardo Inzunza presidente de Fundación Markoptic, según lo dispuesto en el Diario Oficial de la Federación, Ley Federal del Derecho de Autor DOF 27-01-2012 y las plasmadas en la Ley de Acceso a la Información Publica del Estado de Sinaloa Capitulo Quinto del Procedimiento para el ejercicio del Derecho de Acceso a la Información Pública, Artículos 26 al 32.
FUNDACIÓN MARKOPTIC A.C. y EL BENEFICIARIO Declaran:
EL BENEFICIARIO autoriza a FUNDACIÓN MARKOPTIC A.C., así como a todas aquellas terceras personas físicas o jurídicas a las que FUNDACIÓN MARKOPTIC A.C. pueda ceder los derechos de explotación sobre las imágenes, así como la pista sonora o partes de las mismas, a que indistintamente puedan utilizar todas las imágenes, o partes de las mismas en las que intervengo como EL BENEFICIARIO.
Mi autorización tiene ámbito geográfico, determinado por lo que la institución y otras personas físicas o jurídicas a las que FUNDACIÓN MARKOPTIC A.C. pueda ceder los derechos de explotación sobre las imágenes, así como la pista sonora o partes de las mismas, a que indistintamente puedan utilizar todas las imágenes, o partes de las mismas en las que intervengo como EL BENEFICIARIO, en cualquier país.
Mi autorización se refiere a la totalidad de usos que puedan tener las imágenes, o partes de las mismas, en las que aparezco, utilizando los medios técnicos conocidos en la actualidad y los que pudieran desarrollarse en el futuro, y para cualquier aplicación. Todo ello con la única salvedad y limitación de aquellas utilizaciones o aplicaciones que pudieran atentar al derecho al honor en los términos previstos en la Ley Orgánica 1/85, de 5 de Mayo, de Protección Civil al Derecho al Honor, la Intimidad Personal y familiar y a la Propia Imagen. Y al art. 87 de la Ley Federal del Derecho de Autor: “El retrato de una persona sólo puede ser usado o publicado, con su consentimiento expreso, o bien con el de sus representantes o los titulares de los derechos correspondientes. La autorización de usar o publicar el retrato podrá revocarse por quien la otorgó quién, en su caso, responderá por los daños y perjuicios que pudiera ocasionar dicha revocación. 
Cuando a cambio de una remuneración o aún sin ella, una persona se dejare retratar, se presume que ha otorgado el consentimiento a que se refiere el párrafo anterior y no tendrá derecho a revocarlo, siempre que se utilice en los términos y para los fines pactados. 
No será necesario el consentimiento a que se refiere este artículo cuando se trate del retrato de una persona que forme parte menor de un conjunto o la imagen sea tomada en un lugar público y con fines informativos o periodísticos. “
Mi autorización fija límite de tiempo para su concesión y para la explotación de las imágenes, así como la pista sonora o parte de las mismas, en las que intervengo como EL BENEFICIARIO, por lo que mi autorización se considera concedida por un plazo de tiempo ilimitado para televisión y cualquier medio electrónico, incluyendo Internet, y para cualquier medio impreso.  Se considera como inicio del tiempo, una vez que la campaña tanto visual como gráfica, salga por primera vez al aire o este por primera vez en algún  medio impreso, respectivamente. 
EL BENEFICIARIO se libera de cualquier cuestión jurídica, a FUNDACIÓN MARKOPTIC A.C., en lo establecido por el Instituto de Transparencia e Información Pública del Estado de Sinaloa, en el presente o futuro, debiendo de sujetarse a lo acordado en este contrato.
Se considera que es GRATUITO por concepto de pago por la cesión de mis derechos de imágenes y pista sonora, aceptando estar conforme con el citado acuerdo.

2. USOS PERMITIDOS
El aprovechamiento de los Servicios y Contenidos del “LA PAGINA” es exclusiva responsabilidad del Usuario, quien en todo caso deberá servirse de ellos acorde a las funcionalidades permitidas en la propia Página y a los usos autorizados en los presentes Términos y Condiciones de Uso y Privacidad, por lo que el Usuario se obliga a utilizarlos de modo tal que no atenten contra las normas de uso y convivencia en Internet, las leyes de los Estados Unidos Mexicanos y la legislación vigente en el país en que el Usuario se encuentre al usarlos, las buenas costumbres, la dignidad de la persona y los derechos de terceros. “LA PAGINA” es para el uso individual del Usuario por lo que no podrá comercializar de manera alguna los Servicios y Contenidos.

3. CONFIDENCIALIDAD
FUNDACIÓN MARKOPTIC A.C. se obliga a mantener confidencial la información que reciba del Usuario que tenga dicho carácter conforme a las disposiciones legales aplicables, en los Estados Unidos Mexicanos.

4. MODIFICACIONES 
Reservamos el derecho a modificar esta Declaración de Privacidad en cualquier momento. Su uso continuo de cualquier porción de este sitio tras la notificación o anuncio de tales modificaciones constituirá su aceptación de tales cambios.”

5. ACEPTAR TERMINOS
Al aceptar estos Términos y Condiciones FUNDACIÓN MARKOPTIC A.C. “Implica su aceptación plena y sin reservas a todas y cada una de las disposiciones incluidas en este Aviso Legal, por lo que si usted no está de acuerdo con cualquiera de las condiciones aquí establecidas, no deberá usar u/o acceder a este sitio. Queda a disposición de los datos aquí ingresados, y no significa en ningún sentido el compromiso u obligación por parte de la organización en aceptar el seguimiento, desarrollo o fabricación de cualquier dispositivo.
Fundación Markoptic A.C. iniciará un proceso de estudio de la solicitud y se contactara con usted personalmente al momento de haber analizado y ser verificada la información proporcionada, si en caso contrario de no haber sido aceptada su solicitud será incluido a la lista de espera.
    </textarea>
</div>
<div class="form-row mx-0">
    <div class="form-inline m-4">
        <input type="checkbox" value="1" id="terminos" name="terminos" required class="form-control mr-2">
        <label for="terminos">Aceptar los términos y condiciones</label>
        <span class="text-danger <?php echo ($eterminos == 1)?"":"d-none"; ?>">&nbsp; *Acepta los términos y condiciones para continuar</span>
    </div>
</div>