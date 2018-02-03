<?php
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
    include 'back/conexion.php';
    include 'back/objetos.php';
    
    if( isset( $_POST['formDispositivo'] ) ){ $d = $_POST['formDispositivo'];
    }elseif( isset( $_GET['dispositivo'] ) ){ $d = $_GET['dispositivo'];
    }else{ header('Location: ../'); }

    $fechaError = "";
    if( isset( $_POST['form'] ) ){ 
        $fecha = $_POST['date'];
        $objBen = new Beneficiario;
        $edad = $objBen->generaEdadBeneficiario($fecha);
        //echo "<script>console.log('".$edad."');</script>";
        if($edad < 6){ $fechaError = "Edad minima 6 años";
        }elseif($edad >= 6 and $edad< 18){ $fechaError = "menor edad";
        }elseif($edad > 100){ $fechaError = "La edad excede los 100 años ";
        }else{
            //$fechaError = "";
            //$d=$_POST['formDispositivo'];
            $fecha = date("-d-m-Y-H-i-s");
            $objBen = new Beneficiario();    
            $objBen->setNombre($_POST['nombre']);
            $objBen->setApellidos($_POST['apellido']);
            $objBen->setSexo($_POST['sexo']);
            $objBen->setNacimiento($_POST['date']);
            $objBen->setCiudad($_POST['ciudad']);
            $objBen->setCalle($_POST['calle']);
            $objBen->setColonia($_POST['colonia']);
            $objBen->setCp($_POST['cp']);
            $objBen->setTelefono($_POST['tel']);
            $objBen->setEmail($_POST['email']);
            //comprobar si el beneficiario cuenta con un tutor
            $objBen->setIndependiente($_POST['independiente']);
            if( $_POST['independiente'] == 1 ){
                $objBen->setNombreTutor($_POST['tutNombre']);
                $objBen->setApellidoTutor($_POST['tutApellido']);
                $objBen->setSexoTutor($_POST['sexoTutor']);
                $objBen->setViveBen($_POST['tutVive']);
                $objBen->setParentesco($_POST['parentesco']);
                $objBen->setNacimientoTutor($_POST['tutDate']);
                $objBen->setTelTutor($_POST['tutTel']);
                $objBen->setEmailTutor($_POST['tutEmail']);
            }
            $objBen->setDispositivo($_POST['solicitud']);
            //if($d == 'brazo'){
                $objBen->setCondicion($_POST['condicion']);
                //echo $objBen->getCondicion();
            //}
            $objBen->setIdMedioDifusion($_POST['enterado']);
            if(isset($_POST['enteradoOtro'])){
                $objBen->setDescMedioDif($_POST['enteradoOtro']);
            }        
            $objBen->setDescObtencion($_POST['breveDescripcion']); 
            //$objBen->setFoto1($_FILES['foto1']['name']);
            //$objBen->setFoto2($_FILES['foto2']['name']);
            //$objBen->setFoto3($_FILES['foto3']['name']);
            $foto1 = "";
            $foto2 = "";
            $foto3 = "";
            for($i=1; $i<=3; $i++){
                $getFile="foto".$i;
                $func ="setFoto".$i;
                $tmp = explode(".", $_FILES[$getFile]['name']);
                $imageFileType = end($tmp);
                $add= $getFile.$fecha.".".$imageFileType;
                //$file_name = $_FILES[$getFile]['name'];
                ${"foto".$i} = $add;
                echo ${"foto".$i};
                $objBen->$func($add);
            }

            //$objBen->mostrar();
        
            if( $objBen->inserta() ){
                for($i=1; $i<=3; $i++){
                    $getFile="foto".$i;
                    move_uploaded_file ($_FILES[$getFile]['tmp_name'],"imagenes/uploads/".${"foto".$i} );
                }
                header('Location: ../gracias?solicitud=exito');
            }
        }
    }
    if( $d =='brazo' ){  
        $menuBack = "Solicitud de Prótesis";    
        $descDispositivo='<div class="container-fluid text-white">'.
            '<div class="row pt-2 pb-2">'.
                '<div class="col-12 col-sm-6">'.
                    '<div class="card w-75 mx-auto">'.
                        '<div class="w-100 c-img bg-primary">'.
                            '<img class=" img-cover-center w-100 h-100" src="../imagenes/fundación/form-protesis-mecanica.jpg" alt="Prótesis Mecánica">'.
                        '</div>'.
                        '<div class="w-100  c-text bg-verde-menu c-align-middle flex-column">'.
                            '<p class="mb-0">Prótesis Mecánica</p>'.
                            '<p class="mb-0">6-18 años</p>'.
                        '</div>'.
                    '</div>'.
                '</div>'.
                '<div class="col-12 col-sm-6">'.
                    '<div class="card w-75 mx-auto">'.
                        '<div class="w-100 c-img bg-primary">'.
                            '<img class=" img-cover-center w-100 h-100" src="../imagenes/fundación/form-protesis-robotica.jpg" alt="Prótesis robótica">'.
                        '</div>'.
                        '<div class="w-100  c-text bg-verde-menu c-align-middle flex-column">'.
                            '<p class="mb-0">Prótesis Robotica</p>'.
                            '<p class="mb-0">19 años en adelante</p>'.
                        '</div>'.
                    '</div>'.
                '</div>'.
            '</div>'.
        '</div>';

        $imgfoto1 ='<img src="../imagenes/fundación/foto beneficiario 1.jpg" alt="Fotografia de beneficiario numero uno">';
        $imgfoto2 ='<img src="../imagenes/fundación/foto beneficiario 3.jpg " alt="Fotografia de beneficiario numero dos">';
        $imgfoto3 ='<img src="../imagenes/fundación/foto beneficiario 2.jpg " alt="Fotografia de beneficiario numero tres">';
        $porUltimo ='Por último, ayúdanos adjuntando unas fotografías recientes y claras, como se muestra en las siguientes imágenes, donde podamos identificar tu necesidad';
    }
    if($d =='colchon'){
        $menuBack = "Solicitud de Colchón";
        $descDispositivo ='<div class="row mx-0"> 
                <div class="col-12 col-sm-6 c-align-middle p-5 order-2 order-md-1 text-center ">
                    <p>"Colchón vibrador que ayuda en la prevención de neumonía y ulceras en la piel, para personas postradas en cama por causa de alguna enfermedad o accidente."</p>
                </div>
                <div class="col-12 col-sm-6 order-1 order-md-2">
                    <div class="card w-75 mx-auto">
                        <div class="w-100 c-img bg-primary">
                            <img class=" img-cover-center w-100 h-100" src="../imagenes/fundación/proy-colchon.jpg" alt="Colchón vittmat">
                        </div>
                        <div class="w-100  c-text text-white bg-verde-menu c-align-middle flex-column">
                            <p class="mb-0">Colchón Vittmat</p>
                        </div>
                    </div>
                </div>            
            </div>
        ';
        $imgfoto1 = "<div class='text-center' style='height:150px;width:100%;'><img class='img-cover-center' src='imagenes/fundación/img-sin-foto.png' /></div>";
        $imgfoto2 = "<div class='text-center' style='height:150px;width:100%;'><img class='img-cover-center' src='imagenes/fundación/img-sin-foto.png' /></div>";
        $imgfoto3 = "<div class='text-center' style='height:150px;width:100%;'><img class='img-cover-center' src='imagenes/fundación/img-sin-foto.png' /></div>";
        $porUltimo ='Por último, ayúdanos adjuntando unas fotografías recientes y claras, donde podamos identificar tu necesidad';
    }       
    include 'mod/header.php';
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
        </div><!--/container menu-->
    <!--/menu-->
    <!-- contenido -->
    <?php
        if( isset( $_POST['descDispositivo'] ) ){
            $descDispositivo = $_POST['descDispositivo'];
        }
        echo $descDispositivo;
        
    ?>    
    <div class='row mx-0'>
        <div class='col-md-4 bg-verde-menu c-align-middle text-white p-3'>
            <p class='mb-0'>Información del beneficiario</p>
        </div>
    </div>
    <form class='px-5' enctype='multipart/form-data' method='post' action="/formulario">
        <!-- datos personales -->
        <div class="form-row">
            <div class="form-group col-md-6">
                <label>Nombre(s)</label><input type="text" class='form-control' name='nombre' placeholder='Nombre' value ="<?php if(isset($_POST['nombre'])){echo $_POST['nombre'];} ?>" required>
            </div>
            <div class="form-group col-md-6">
                <label>Apellido(s)</label><input type="text" class='form-control' name='apellido' placeholder='Apellido' value ="<?php if(isset($_POST['apellido'])){echo $_POST['apellido'];} ?>" required>
            </div>
        </div>    
        <div class='form-row'>
            <div class='form-group col-md-6'>
                <label>Sexo</label>
                <?php 
                    if( isset($_POST['sexo']) ){
                        $sexo = $_POST['sexo'];
                    }else{
                        $sexo = "";
                    } 
                ?>
                <select name='sexo' class="form-control" required="true">
                    <option value="" class="text-muted">Selecciona Tu Sexo</option>
                    <option <?php if($sexo == "m"){echo "selected";}?> value='m'>Masculino</option>
                    <option <?php if($sexo == "f"){echo "selected";}?> value='f'>Femenino</option>
                </select>
            </div>
            <div class='form-group col-md-6'>
                <label>Fecha de Nacimiento<?php if($fechaError != "" ){ echo "<span style='color:red;'> * ".$fechaError."</span>"; } ?> </label><input type="date" class='form-control' name='date' id="dateBen" placeholder='Fecha de Nacimiento' value ="<?php if(isset($_POST['date'])){echo $_POST['date'];} ?>" required>
            </div>
        </div>
        <div class='form-row'>
            <div class='form-group col-md-4'>
                <label>País</label>
                <?php 
                    if( isset($_POST['pais']) ){
                        $p = $_POST['pais'];
                    }else{
                        $p = "";
                    }
                    $objDato = new DatosPersonales;
                    $objDato->buscaPais($p);
                ?>
            </div>
            <div class='form-group col-md-4'>
                <label>Estado</label>
                <?php 
                    if( isset( $_POST['estado'] ) ){
                        $id = $_POST['pais'];
                        $es = $_POST['estado'];
                        $objDato->buscaEstado($id,$es);
                    }else{
                        echo'<select id="estado" name="estado" class="form-control" required>
                        <option disabled selected>Selecciona un Estado</option>
                        </select>';
                    }
                ?>
            </div>
            <div class='form-group col-md-4'>
                <label>Ciudad o Localidad</label>
                <?php 
                    if( isset( $_POST['ciudad'] ) ){
                        $id = $_POST['estado'];
                        $c = $_POST['ciudad'];
                        $objDato->buscaCiudad($id,$c);
                    }else{
                        echo'<select id="ciudad" name="ciudad" class="form-control" required>
                                <option selected disabled>Selecciona una Ciudad</option>
                            </select>';
                    }
                ?>
            </div>
        </div>
        <div class='form-row'>
            <label>Calle y Número</label><input type="text" class='form-control' name='calle' placeholder='Calle y Número' value ="<?php if(isset($_POST['calle'])){echo $_POST['calle'];} ?>" required>
        </div>
        <div class='form-row'>
            <div class='form-group col-sm-8'>
                <label>Colonia</label><input type="text" class='form-control' name='colonia' placeholder='Colonia' value ="<?php if(isset($_POST['colonia'])){echo $_POST['colonia'];} ?>" required>
            </div>
            <div class='form-group col-sm-4'>
                <label>Código Postal</label><input type="text" class='form-control' name='cp' placeholder='Código Postal' value ="<?php if(isset($_POST['cp'])){echo $_POST['cp'];} ?>" required>
            </div>
        </div>            
        <div class='form-row'>
            <div class='form-group col-sm-6'>
                <label>Teléfono</label><input type="text" class='form-control' name='tel' placeholder='Teléfono' value ="<?php if(isset($_POST['tel'])){echo $_POST['tel'];} ?>" required>
            </div>
            <div class='form-group col-sm-6'>
                <label>Email</label><input type="email" class='form-control' name='email' placeholder='Email' value ="<?php if(isset($_POST['email'])){echo $_POST['email'];} ?>" required> 
            </div>
        </div>
        <!-- datos del tutor -->
        <div class='row pb-3' style='margin-left:-3rem;margin-right:-3rem;'>
            <div class='col-md-4 bg-verde-menu c-align-middle text-white p-3'>
                <p class='mb-0'>Información del tutor</p>
            </div>
            <div class='col-md-8 c-align-middle'>
                <p><strong>¿El beneficiario depende de otra persona?</strong></p> &nbsp;&nbsp;
                <?php 
                    if( isset( $_POST['independiente'] ) ){
                        $independiente = $_POST['independiente'];
                    }else{
                        $independiente = "0";
                    }
                ?>
                <div class="form-check form-check-inline">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="independiente" value="0" <?php if($independiente == 0){ echo"checked"; } ?> >no<br>
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="independiente" value="1" <?php if($independiente == 1){ echo"checked"; } ?> >si<br>
                    </label>
                </div>
            </div>
        </div>
        
        <!-- formulario del tutor -->
        <div class="text-center text-danger" style='display:none;' id="msgMenorEdad"><span>* Datos requeridos, por minoría de edad del solicitante</span></div>
        <div class='seccionTutor' style='display:none;'>
            <div class='form-row'>
                <div class='form-group col-sm-6'>
                    <label>Nombre</label><input type="text" class='form-control' name='tutNombre' placeholder='Nombre' value ="<?php if(isset($_POST['tutNombre'])){echo $_POST['tutNombre'];} ?>">
                </div>
                <div class='form-group col-sm-6'>
                    <label>Apellido</label><input type="text" class='form-control' name='tutApellido' placeholder='Apellido' value ="<?php if(isset($_POST['tutApellido'])){echo $_POST['tutApellido'];} ?>"> 
                </div>
            </div>
            <div class='form-row'>
                <div class='form-group col-md-6'>
                    <label>Sexo</label>
                    <?php 
                        if( isset($_POST['sexoTutor']) ){
                            $sexoTutor = $_POST['sexoTutor'];
                        }else{
                            $sexoTutor = "";
                        } 
                    ?>
                    <select name='sexoTutor' id="sexoTutor" class="form-control">
                        <option <?php if($sexoTutor == ""){echo "selected";}?> disabled>Selecciona Tu Sexo</option>
                        <option <?php if($sexoTutor == "m"){echo "selected";}?> value='m'>Masculino</option>
                        <option <?php if($sexoTutor == "f"){echo "selected";}?> value='f'>Femenino</option>
                    </select>
                </div>
                <div class='form-group col-md-6 text-center'>                
                    <label>¿Vives con el beneficiario?</label> &nbsp;&nbsp;<br>
                    <div class="form-check form-check-inline">
                        <label class="form-check-label">
                            <?php 
                                if( isset($_POST['tutVive']) ){
                                    $tutVive = $_POST['tutVive'];
                                }else{
                                    $tutVive = "";
                                }
                            ?>
                            <input type="radio" class="form-check-input" name="tutVive" value="0" <?php if($tutVive == "0"){echo "checked";} ?> > 
                            no
                        </label>                  
                    </div>
                    <div class="form-check form-check-inline">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="tutVive" value="1" <?php if($tutVive == "1"){echo "checked";} ?> >   
                            si 
                        </label>                
                    </div>
                </div>
            </div>
            <div class='form-row'>
                <div class='form-group col-md-6'>
                    <label>Parentesco</label>
                    <!-- <div id="parentesco"></div> -->
                    <?php 
                        if( isset( $_POST['parentesco'] ) ){
                            $parentesco = $_POST['parentesco'];
                        }else{
                            $parentesco = "";
                        }
                        $objTut = new tutor;
                        $objTut->buscaParentesco($parentesco);  
                    ?>
                </div>
                <div class='form-group col-md-6'>
                    <label class=''>Fecha de nacimiento</label> 
                    <input type="date" class='form-control' name='tutDate' placeholder='Fecha de Nacimiento' value ="<?php if(isset($_POST['tutDate'])){echo $_POST['tutDate'];} ?>"> 
                </div>
            </div>
            <div class='form-row'>
                <div class='form-group col-md-6'>
                    <label>Teléfono</label><input type="text" class='form-control' name='tutTel' placeholder='Teléfono' value ="<?php if(isset($_POST['tutTel'])){echo $_POST['tutTel'];} ?>">
                </div>
                <div class='form-group col-md-6'>
                    <label>Email</label><input type="email" class='form-control' name='tutEmail' placeholder='Email' value ="<?php if(isset($_POST['tutEmail'])){echo $_POST['tutEmail'];} ?>"> 
                </div>
            </div>      
        </div>    
          
        <?php
            //buscar dipositivos
            if( $d == "brazo"){
                $sol = "superior";
            }elseif($d == "colchon"){
                $sol = "colchon";
            }
            if( isset( $_POST['solicitud'] ) ){
                $nd = $_POST['solicitud'];
            }else{
                $nd = "";
            }
            $objBen = new Beneficiario();
            $objBen->buscaDispositivo($sol,$nd);
            
            //buscar condiciones de la amputación
            if($d == "brazo"){
                $condicion = $d;
            }elseif($d == "colchon"){
                $condicion = "n/a";
            }
            $objBen->buscaCondicion($condicion);
        ?>
        <p class="w-100 text-center mt-3"><strong>¿Cómo te enteraste de Fundación Markoptic?</strong></p>
        <div class='form-inline col-md-12'>
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
                    $objBen->buscaDifusion($difusion,$otro);
                ?>
        </div>
        <!-- descripcion -->
        <div class='col-12'>
            <textarea name='breveDescripcion' rows="4" cols="50" class='form-control mt-3' placeholder="Cuéntanos brevemente porque te gustaría recibir el dispositivo biomédico" required><?php if(isset($_POST['breveDescripcion'])){echo $_POST['breveDescripcion'];}?></textarea>
        </div>
        <h4 class='px-5 pt-3 text-center'><?php echo "<h3 class='text-center' style='line-height:140%;'>".$porUltimo."</h3>"; ?></h4>
        <div class='row mx-0' id='foto'>
            <div class='col-12 col-md-4 mx-auto' id='foto1'>
                <div class="row mx-0">
                    <div class="col-6">
                        <label id="label" for="fotofile1"><?php echo $imgfoto1; ?></label>
                        <input id="fotofile1" name="foto1" class="form-control-file" type='file'>
                    </div>
                    <div class="col-6 c-align-middle">
                        <img class="preview" id="previewFoto1" src="" style="display:none;">
                    </div>
                </div>  
            </div>
            <div class='col-12 col-md-4 mx-auto' id="foto2"> 
                <div class="row mx-0">
                    <div class="col-6">
                        <label for="fotofile2"><?php echo $imgfoto2; ?></label>     
                        <input id='fotofile2' name="foto2" class="form-control-file" type='file'>
                    </div>
                    <div class="col-6 c-align-middle">
                        <img class="preview" id="previewFoto2" src="" style="display:none;">
                    </div>
                </div>
            </div>
            <div class='col-12 col-md-4 mx-auto' id="foto3">
                <div class="row mx-0">
                    <div class="col-6">
                        <label for="fotofile3"><?php echo $imgfoto3; ?></label>     
                        <input id='fotofile3' name="foto3" class="form-control-file" type='file'>
                    </div>
                    <div class="col-6 c-align-middle">
                        <img class="preview" id="previewFoto3" src="" style="display:none;">
                    </div>
                </div> 
            </div>
        </div>
        <!-- <h4 class='px-5 pt-3 text-center'>Seguiremos trabajando para cumplir su petición lo antes posible</h4> -->
        <input type='hidden' value='form' name='form' />
        <input type='hidden' value='<?php echo $d;?>' name='formDispositivo' />
        <input type='hidden' value='' name='edad' id="edad"/>
        <!-- <div id="edad"><div/> -->
        <br>
        <div class="row mx-0">
            <button class="btn bg-verde-menu ml-auto text-white p-3 mt-3 mb-3">Enviar</button> 
        </div>        
    </form>
<?php
    include 'mod/footer.php';
?>
<script>
$(document).ready(function(){
    //inicializar el valor de beneficiario depende de otra persona siempre en no
    $('#dateBen').blur(function(){
        f = $(this).val();
        ed = calculaEdad(f);
        console.log(ed);
        if(ed >= 6 && ed < 18 ){
            $('input[name$="independiente"]')[1].checked = true;
            $('input[name$="independiente"]:not(:checked)').attr('disabled',true);
            rTutor();
            $('.seccionTutor,#msgMenorEdad').show(500);
        }else{
            $('input[name$="independiente"]:not(:checked)').attr('disabled',false);
            $('#msgMenorEdad').hide(500);
        }
    });

    //función para seleccionar los estados del país
    $('#pais').change(function(){
        var p =  $(this).val();
        var f = "buscaEstado";
        var r = "estado";
        var id = p;
        var parametros ={
            "formulario": f,
            "id" : id,
            "es" : ""
	    }
        ajax(parametros,r);
        $('#ciudad option').remove();
        $('#ciudad').append('<option selected="selected" disabled="disabled">Selecciona una Ciudad</option>');
    });

    //función para seleccionar las ciudades del estado
    $('#estado').change(function(){
        var p =  $(this).val();
        var f = "buscaCiudad";
        var r = "ciudad";
        var id = p;
        var parametros ={
            "formulario": f,
            "id" : id,
            "c"  : ""
	    }
        ajax(parametros,r);
    });

    //función para ocultar o mostrar los campos de el tutor 
    if( $('input[name$="independiente"]:checked').val() == 1 ){
        rTutor();
        $('.seccionTutor').show(500);
    }
    console.log("independiente: " + $('input[name$="independiente"]:checked').val());  
    
    $('input[name$="independiente"]').click(function(){        
        if( $(this).val() == 0 ){
            f = $('#dateBen').val();
            ed = calculaEdad(f);
            if(ed >= 6 && ed <18){
                $('input[name$="independiente"]')[1].checked = true;
                alert('el solicitante es menor de edad porfavor introduce los datos del tutor');
            }else{
                nrTutor();
                $('.seccionTutor').hide(500);
            }
        }    
        if( $(this).val() == 1 ){
            rTutor();
            $('.seccionTutor').show(500);
        }    
    });

    //función para cambiar las condiciones del brazo a color
    $('input[name$="condicion"]').click(function(){
        $('#condiciones .imgCondicion img:nth-child(2)').css({"display":"none"});
        $('#condiciones .imgCondicion img:nth-child(1)').css({"display":"block"});
        $("#condiciones label[for='"+this.id+"'] img:nth-child(1)").css({"display":"none"});   
        $("#condiciones label[for='"+this.id+"'] img:nth-child(2)").css({"display":"block"});
    });

   //desabilitar o habilitar la caja de texto otro de seccion como se entero de fundación 
   $('#enterado').change(function(){
        var ph = $('#enterado option:selected').attr('ph');
        if( ph !== "" ){
            console.log( $('#enterado option:selected').attr('ph') ); 
            $('input[name$="enteradoOtro"]').show(500);
            $('input[name$="enteradoOtro"]').attr('placeholder',ph);
            $('input[name$="enteradoOtro"]').attr('disabled',false);
        }else{
            $('input[name$="enteradoOtro"]').hide(500);
            $('input[name$="enteradoOtro"]').attr('placeholder',"");
            $('input[name$="enteradoOtro"]').attr('disabled',true);
            $('input[name$="enteradoOtro"]').val("");
        }
   });

   //función para cuando se envía el formulario
   $('form').submit(function(){
        if($('input[name$="formDispositivo"]').val() == "brazo"){
            if (! $('input[name$="condicion"]').is(':checked')){
                alert("Seleccione la condición de su brazo"); 
                return false; 
            }
        }

       if($('#fotofile1').val() == "" || $('#fotofile2').val() == "" || $('#fotofile3').val() == ""){
           alert("ingrese las fotografias del beneficiario");
           return false;
       }
       return true;
    });

    //función para crear miniaturas de las fotografias que sube el usuario 
    $('#foto1 input[type="file"]').change(function(){
        var id="previewFoto1";
        mostrar(id);
        var foto = $(this).attr('id');
        preview(id,foto);    
    });
    $('#foto2 input[type="file"]').change(function(){
        var id="previewFoto2";
        mostrar(id);
        var foto = $(this).attr('id');
        preview(id,foto);    
    });
    $('#foto3 input[type="file"]').change(function(){
        var id="previewFoto3";
        mostrar(id);
        var foto = $(this).attr('id');
        preview(id,foto);    
    });

    // función que posiciona el scroll correctamente en los campos requeridos al tener el menu un margen
    var elements = document.querySelectorAll('input,select,textarea');
    var invalidListener = function(){ this.scrollIntoView(false); };
    for(var i = elements.length; i--;)
    elements[i].addEventListener('invalid', invalidListener);

});//document ready

//funciones

//función para mostrar los bloques ocultos
function mostrar(id){
    $('#'+id).show();
}
//función para generar la miniatura de las imágenes que sube el beneficiario  
function preview(id,foto){
    var file = $('#'+ foto)[0].files[0];
    var reader = new FileReader();
    reader.onloadend = function () {
        $('#'+ id).attr("src",reader.result);
        $('#'+ id + "label").css({"display":"none"});
    }
    if (file) {
    reader.readAsDataURL(file);
    } else {
        $('#' + id).attr("src","");
    }

}
function calculaEdad(f){
    fecha = new Date(f);
    hoy = new Date();
    ed = parseInt((hoy -fecha)/365/24/60/60/1000);
    return ed;
}
function rTutor(){
    $('input[name$="tutNombre"]').prop('required',true);
    $('input[name$="tutApellido"]').prop('required',true);
    $('#sexoTutor').prop('required',true);
    $('input[name$="tutVive"]').prop('required',true);
    $('input[name$="tutDate"]').prop('required',true);
    $('input[name$="tutTel"]').prop('required',true);
    $('input[name$="tutEmail"]').prop('required',true);
    $('#parentesco').prop('required',true);
}
function nrTutor(){
    $('input[name$="tutNombre"]').prop('required',false);
    $('input[name$="tutApellido"]').prop('required',false);
    $('#sexoTutor').prop('required',false);
    $('input[name$="tutVive"]').prop('required',false);
    $('input[name$="tutDate"]').prop('required',false);
    $('input[name$="tutTel"]').prop('required',false);
    $('input[name$="tutEmail"]').prop('required',false);
    $('#parentesco').prop('required',false);
}
</script>
    </body>
</html>