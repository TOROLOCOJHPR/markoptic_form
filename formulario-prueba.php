<?php    
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
    $title = "Formulario de solicitud";
    require_once 'inc/config.php';
    require 'inc/excepciones.php';
?>
<link rel="stylesheet" href="http://kendo.cdn.telerik.com/2018.2.620/styles/kendo.bootstrap.min.css" />
<link rel="stylesheet" href="http://kendo.cdn.telerik.com/2018.2.620/styles/kendo.common.min.css">
<style>
    .k-widget{border:none}
</style>
<?php
    include 'mod/header.php';
    include 'mod/menu.php';
    if( $d == "brazo" ){
        // include 'mod/formulario/descBrazo.php';
    }elseif( $d == "colchon" ){
        // include 'mod/formulario/descColchon.php';
    }
?>
    <form id="formulario" action="" method="post" enctype="multipart/form-data">
            
    <!-- etiqueta beneficiario -->
        <div class='row mx-0 mt-4 text-dark'>
            <div class='col-md-4 bg-verde-menu c-align-middle text-white p-3'>
                <h6 class='mb-0'>Información del beneficiario</h6>
            </div>
        </div><!-- etiqueta beneficiario -->

    <!-- datos beneficiario -->
        <div class="form-row px-4 mx-0 mt-4 text-dark">
                
            <!-- nombre -->
            <div class="form-group col-md-6">
                    
                <!-- etiqueta -->
                <label>
                    Nombre(s)
                </label>
                    
                <!-- error campo vacio -->
                <span <?php if( $enombre == 1 ) echo "style='display:inline-block'" ?> data-error="enombre" class="error">
                    *Introduce nombre(s) del beneficiario
                </span>
                    
                <!-- campo -->
                <input
                    type="text" name='nombre' placeholder='Nombre'
                    class='form-control' required
                    <?php if( isset( $_POST['nombre'] ) ) echo "value = '".$_POST['nombre']."'" ?>
                />
                
            </div><!-- nombre -->
                
            <!-- apellido -->
            <div class="form-group col-md-6">

                <!-- etiqueta -->
                <label>
                    Apellido(s)
                </label>
                    
                <!-- error campo vacio -->
                <span <?php if( $eapellido == 1 ) echo "style='display:inline-block'" ?> data-error="eapellido" class="error"> 
                    *Introduce apellido(s) del beneficiario
                </span>

                <!-- campo -->
                <input 
                    type="text" name='apellido' placeholder='Apellido'
                    class='form-control' required
                    <?php if( isset( $_POST['apellido'] ) ) echo "value = '".$_POST['apellido']."'"; ?>
                />

            </div><!-- apellido -->
            
            <!-- sexo -->
            <div class='form-group col-md-6'>

                <!-- etiqueta -->
                <label>
                    Sexo
                </label>

                <!-- error campo vacio-->
                <span <?php if( $esexo == 1 ) echo "style='display:inline-block'" ?> data-error="esexo" class="error">
                    *Selecciona un sexo
                </span>
                    
                 <!-- campo -->
                 <?php $sexo = ( isset($_POST['sexo']) )? $_POST['sexo'] : "" ?>
                    
                <select id="sexo" name='sexo' class="form-control" required>
                    <option value="" class="text-muted">Selecciona Tu Sexo</option>
                    <option <?php if( $sexo == "m" ) echo "selected" ?> value='m'>Masculino</option>
                    <option <?php if( $sexo == "f" ) echo "selected" ?> value='f'>Femenino</option>
                </select>
                
            </div><!-- sexo -->

            <!-- fecha de nacimiento -->
            <div class='form-group col-md-6'>

                <!-- etiqueta -->
                <label>
                    Fecha de Nacimiento
                </label>

                <!-- error beneficiario menor a edad permitida -->
                <span <?php if($edateMinima == 1) echo "style='display:inline-block'" ?> data-error="edateMinima" class="error">
                    *Edad minima 1 año
                </span><!-- error beneficiario menor a edad permitida -->
                    
                <!-- error beneficiario mayor a edad permitida -->
                <span <?php if($edateNoPermitida == 1) echo "style='display:inline-block'" ?> data-error="edateNoPermitida" class="error">
                    *Edad permitida 1 a 120 años
                </span><!-- error beneficiario mayor a edad permitida -->
                    
                <!-- error edad vacía -->
                <span <?php if( $edate == 1 ) echo "style='display:inline-block'" ?> data-error="edate" class="error">
                    *Introduce una fecha de nacimiento
                </span><!-- error edad vacía -->
                    
                <!-- error tutor obligatorio -->
                <span <?php if( $tutorObligatorio == 1 ) echo "style='display:inline-block'" ?> data-error="tutorObligatorio" class="error text-info">
                    *Datos de tutor requeridos por minoria de edad
                </span><!-- error tutor obligatorio -->

                <!-- campo -->
                <input
                    type="date" name='date' id="dateBen" placeholder='Fecha de Nacimiento'
                    class='form-control' required
                    <?php if( isset($_POST['date']) ) echo "value='".$_POST['date']."'" ?>
                />
                    
            </div><!-- fecha de nacimiento -->

            <!-- país -->
            <div class='form-group col-md-4'>

                <!-- etiqueta -->
                <label>
                    País
                </label>
                    
                <!-- error campo vacio -->
                <span <?php if( $epais == 1 ) echo "style='display:inline-block'" ?> data-error="epais" class="error">
                    *Selecciona un país
                </span>
                    
                <!-- lista -->
                    
                <select id='pais' name='pais' class='form-control' required>
                    <?php
                        echo "<option></option>"; 
                        foreach($paises as $row){
                            $selected = ( $idPais == $row['id'] ) ? "selected" : "";
                            echo "<option value='".$row['id']."' ".$selected.">".$row['nombre']."</option>";
                        }
                    ?>
                </select>
                    
            </div><!-- país -->

            <!-- estado -->
            <div class='form-group col-md-4'>
                    
                <!-- etiqueta -->
                <label>
                    Estado
                </label>

                <!-- error campo vacio -->
                <span <?php if( $eestado == 1 ) echo "style='display:inline-block'" ?> data-error="eestado" class="error">
                    *Selecciona un estado
                </span>

                <!-- lista -->
                    <select id="estado" name="estado" class="form-control" required>
                        <?php
                            echo "<option></option>";
                            foreach($estados as $estado){
                                $id = $estado['id'];
                                $selEstado = ( $idEstado == $estado['value'] ) ? "selected" : "";
                                echo "<option value='".$estado['value']."' ".$selEstado.">".$estado['text']."</option>";
                            }
                        ?>
                    </select>

            </div><!-- estado -->

            <!-- ciudad -->
            <div class='form-group col-md-4'>

                <!-- etiqueta -->
                <label>
                    Ciudad o Localidad
                </label>

                <!-- error campo vacio -->
                <span <?php if ($eciudad == 1) echo "style='display:inline-block'" ?> data-error="eciudad" class="error">
                    *Selecciona una ciudad
                </span>
                    
                <!-- lista -->
                <select id="ciudad" name="ciudad" class="form-control" required>
                    <?php
                        echo "<option></option>";
                        foreach($ciudades as $row){
                            $selected = ( $idCiudad == $row['value'] ) ? "selected" : "";
                            echo "<option value='".$row['value']."' ".$selected.">".$row['text']."</option>";
                        }
                    ?>
                </select>

            </div><!-- ciudad -->
            
            <!-- calle y número -->
            <div class='form-group col-12'>
                    
                <!-- etiqueta -->
                <label>
                    Calle y Número
                </label>
                    
                <!-- error campo vacio -->
                <span <?php if( $ecalle == 1 ) echo"style='display:inline-block'" ?> data-error="ecalle" class="error">
                    *Introduce calle y número
                </span>

                <!-- campo -->
                <input 
                    type="text" name='calle' placeholder='Calle y Número' 
                    class='form-control' required
                    <?php if( isset($_POST['calle'] ) ) echo "value='".$_POST['calle']."'" ?>
                />
            
            </div><!-- calle y número -->
                
            <!-- colonia -->
            <div class='form-group col-md-8'>
                    
                <!-- etiqueta -->
                <label>
                    Colonia
                </label>

                <!-- error campo vacio -->
                <span <?php if( $ecolonia == 1 ) echo "style='display:inline-block'" ?> data-error="ecolonia" class="error">
                    *introduce una colonia
                </span>

                <!-- campo -->
                <input 
                    type="text" name='colonia' placeholder='Colonia'
                    class='form-control' required
                    <?php if( isset( $_POST['colonia'] ) ) echo "value ='".$_POST['colonia']."'" ?> 
                />
            
            </div><!-- colonia -->

            <!-- código postal -->
            <div class='form-group col-md-4'>

                <!-- etiqueta -->
                <label>
                    Código Postal
                </label>

                <!-- error campo vacio -->
                <span <?php if( $ecp == 1 )echo "style='display:inline-block'" ?> data-error="ecp" class="error">
                    *Introduce un código postal
                </span>

                <!-- campo -->
                <input 
                    type="text" name='cp' placeholder='Código Postal'
                    class='form-control' required
                    <?php if( isset( $_POST['cp'] ) ) echo "value='".$_POST['cp']."'"  ?>
                />

            </div><!-- código postal -->

            <!-- teléfono  -->
            <div class='form-group col-md-6'>

                <!-- etiqueta -->
                <label>
                    Teléfono
                </label>

                <!-- error campo vacio -->
                <span <?php if( $etel == 1 ) echo "style='display:inline-block'" ?> data-error="etel" class="error">
                    *Introduce un teléfono
                </span>

                <!-- campo -->
                <input 
                    type="text" name='tel' placeholder='Teléfono' 
                    class='form-control' required
                    <?php if( isset( $_POST['tel'] ) ) echo "value='".$_POST['tel']."'" ?>
                />

            </div><!-- teléfono -->

            <!-- email -->
            <div class='col-md-6'>

                <!-- etiqueta -->
                <label>
                    Email
                </label>

                <!-- error campo vacio -->
                <span <?php if($eemail == 1) echo "style='display:inline-block'" ?> data-error="eemail" class="error">
                    *Introduce un email
                </span>
                    
                <!-- error email invalido -->
                <span <?php if( $eemailValido == 1 ) echo "style='display:inline-block'" ?> data-error="eemailValido" class="error">
                    *Introduce un email valido
                </span>

                <!-- campo -->
                <input 
                    type="email" name='email' placeholder='Email' 
                     class='form-control' required
                    <?php if( isset( $_POST['email'] ) ) echo "value='".$_POST['email']."'" ?>
                /> 
                
            </div><!-- email -->            

        </div><!-- datos beneficiario -->

    <!-- etiqueta tutor -->
        <div class='row mx-0 mt-2 text-dark'>
            <div class='col-md-4 bg-verde-menu c-align-middle text-white p-3'>
                <h6 class='mb-0'>Información del tutor</h6>
            </div>
        </div><!-- etiqueta tutor -->

    <!-- confirmación de tutor -->
        <div class="form-row mx-0 mt-2 text-dark">
            <div class="form-inline col-12 p-4">
                    
                <strong>¿El beneficiario depende de otra persona?</strong> &nbsp;&nbsp;
                    
                <!-- no depende del tutor -->
                <div class="form-check form-check-inline">

                    <label class="form-check-label">
                        <input 
                            type="radio" name="independiente" value="0"
                            class="form-check-input"
                            <?php
                                if($independiente == 0) echo"checked "; //selecciona el valor establecido poe el usuario
                                echo ($tutorObligatorio == 1 )? "disabled" : "" //obliga al usuario a colocar un tutor
                            ?>
                        />
                        no
                    </label>
                </div>

                <!-- si depende del tutor-->
                <div class="form-check form-check-inline">
                    <label class="form-check-label">
                        <input 
                            type="radio" name="independiente" value="1"
                            class="form-check-input"
                            <?php
                                if($independiente == 1) echo"checked "; // selecciona el valor establecido por el usuario 
                                echo ($tutorObligatorio == 1) ? "checked" : ""
                            ?> 
                        />
                        si
                    </label>
                </div>

            </div>
        </div><!-- confirmación tutor -->

    <!-- error edad beneficiario menor a edad permitida-->
        <div <?php if( $edateMinima == 1 ) echo "style='display:inline-block'" ?> data-error="edateMinima" class="error mx-4">
            <span>
                * el solicitante debe tener minímo 1 año
            </span>
        </div><!-- error edad beneficiario menor a edad permitida -->
    
    <!-- error edad beneficiario mayor a edad permitida-->
        <div <?php if( $edateNoPermitida == 1 ) echo "style='display:inline-block'" ?> data-error="edateNoPermitida" class="error mx-4">
            <span>
                * el edad del solicitante debe ser de 1 a 120 años
            </span>
        </div><!-- error edad beneficiario mayor a edad permitida -->

    <!-- error beneficiario sin edad -->
        <div <?php if( $edate == 1 ) echo "style='display:inline-block'" ?> data-error="edate" class="error mx-4">
            <span>
                * Primero introduce la fecha de nacimiento del solicitante
            </span>
        </div><!-- error beneficiario sin edad -->

    <!-- error tutor obligatorio -->
        <div <?php if( $tutorObligatorio == 1 ) echo "style='display:inline-block'" ?> data-error="tutorObligatorio" class="error mx-4 text-info">
            <span>
                * Datos requeridos, por minoría de edad del solicitante
            </span>
        </div><!-- error tutor obligatorio -->

    <!-- datos tutor -->
        <div 
            id="seccionTutor" class="form-row px-4 mx-0 mt-4 text-dark"
            <?php
                if($tutorObligatorio == "1"){
                    echo "style='display:flex' ";
                }elseif( isset( $_POST['independiente'] ) ){
                    if($_POST['independiente'] == 0  && $tutorObligatorio == 0){
                        echo "style='display:none'";
                    }else{
                        echo "style='display:flex'";
                    }
                }else{
                    echo "style='display:none'";
                }
            ?>
        >
                
            <!-- nombre tutor -->
            <div class='form-group col-md-6'>

                <!-- etiqueta -->
                <label>
                    Nombre
                </label>

                <!-- error campo vacio -->
                <span <?php if($etutNombre == 1) echo "style='display:inline-block'" ?> data-error="etutNombre" class="error">
                    *Introduce nombre(s) del tutor
                </span>

                <!-- campo -->
                <input 
                    type="text" name='tutNombre' placeholder='Nombre'
                    class='form-control'
                    <?php if( isset( $_POST['tutNombre'] ) ) echo "value='".$_POST['tutNombre']."'" ?>
                />

            </div><!-- nombre tutor -->

            <!-- apellido tutor -->
            <div class='form-group col-md-6'>
                    
                <!-- etiqueta -->
                <label>
                    Apellido
                </label>

                <!-- error campo vacio -->
                <span <?php if( $etutApellido == 1 ) echo "style='display:inline-block'" ?> data-error="etutApellido" class="error">
                    *Introduce apellido(s) del tutor
                </span>

                <!-- campo -->
                <input 
                    type="text" name='tutApellido' placeholder='Apellido'
                    class='form-control'
                    <?php if( isset( $_POST['tutApellido'] ) ) echo "value ='".$_POST['tutApellido']."'" ?>
                /> 
            </div><!-- apellido tutor -->

            <!-- sexo tutor -->
            <div class='form-group col-md-6'>

                <!-- etiqueta -->
                <label>
                    Sexo
                </label>

                <!-- error campo vacio  -->
                <span <?php if( $etutSexo == 1 ) echo "style='display:inline-block'" ?> data-error="etutSexo" class="error">
                    *Selecciona un sexo
                </span>

                <!-- lista -->
                <select name='tutSexo' id="tutSexo" class="form-control">
                    <option <?php if($tutSexo == "") echo "selected" ?> value="" class="text-muted">Selecciona Tu Sexo</option>
                    <option <?php if($tutSexo == "m") echo "selected" ?> value='m'>Masculino</option>
                    <option <?php if($tutSexo == "f") echo "selected" ?> value='f'>Femenino</option>
                </select>
                    
            </div><!-- sexo tutor -->

            <!-- vive con el beneficiario -->
            <div class='form-group col-md-6 text-center'>

                <!-- etiqueta -->
                <label>
                    ¿Vives con el beneficiario?
                </label>

                <!-- error campo vacio -->
                <span <?php if($etutVive == 1) echo "style='display:inline-block'" ?> data-error="etutvive" class="error">
                    *Selecciona una opción
                </span>
                <br>

                <!-- no vive con el beneficiario -->
                <div class="form-check form-check-inline">
                    <label class="form-check-label">
                        <input 
                            type="radio" name="tutVive" value="0" 
                            class="form-check-input"
                            <?php if( $tutVive == "0" ) echo "checked" ?> 
                        /> 
                        no
                    </label>                  
                </div>

                <!-- vive con el beneficiario -->
                <div class="form-check form-check-inline">
                    <label class="form-check-label">
                        <input 
                            type="radio" name="tutVive" value="1"
                            class="form-check-input"
                            <?php if( $tutVive == "1" ) echo "checked" ?> 
                        />   
                        si
                    </label>                
                </div>
            
            </div><!-- vive con el beneficiario -->

            <!-- parentesco -->
            <div class='form-group col-md-6'>

                <!-- etiqueta -->
                <label>
                    Parentesco
                </label>
                    
                <!-- error campo vacio -->
                <span <?php if($etutParentesco == 1) echo "style='display:inline-block'" ?> data-error="etutParentesco" class="error">
                    *Selecciona un parentesco
                </span>

                <!-- lista -->
                <select id="tutParentesco" name="tutParentesco" class="form-control">
                    <option value="" class="text-muted">Selecciona un Parentesco</option>
                    <?php 
                        foreach($parentescos as $row){
                            $selected = ( $tutParentesco == $row['id'] ) ? "selected" : "";
                            echo "<option value='".$row['id']."' ".$selected.">".$row['parentesco']."</option>";
                        }
                    ?>
                </select>
            
            </div><!-- parentesco -->

            <!-- fecha nacimiento tutor -->
            <div class='form-group col-md-6'>

                <!-- etiqueta -->
                <label>
                    Fecha de nacimiento
                </label>

                <!-- error tutor menor de edad -->
                <span <?php if ( $etutDateMinima == 1 ) echo "style='display:inline-block'" ?> data-error="etutDateMinima" class="error">
                    *Edad minima 18 años y máxima 100 años
                </span>

                <!-- error campo vacio -->
                <span <?php if ( $etutDate == 1 ) echo "style='display:inline-block'" ?> data-error="etutDate" class="error">
                    *Introduce una fecha de nacimiento
                </span>
                    
                <!-- campo -->
                <input
                    type="date" name='tutDate' id="dateTut" placeholder='Fecha de Nacimiento'
                    class='form-control'
                    <?php if( isset( $_POST['tutDate'] ) ) echo "value='".$_POST['tutDate']."'" ?>
                /> 

            </div><!-- fecha nacimiento -->

            <!-- teléfono tutor -->
            <div class='form-group col-md-6'>

                <!-- etiqueta -->
                <label>
                    Teléfono
                </label>

                <!-- error campo vacio -->
                <span <?php if( $etutTel == 1 ) echo "style='display:inline-block'" ?> data-error="etutTel" class="error">
                    *Introduce un número de telefono
                </span>
                    
                <!-- campo -->
                <input 
                    type="text" name='tutTel' placeholder='Teléfono'
                    class='form-control'
                    <?php if( isset( $_POST['tutTel'] ) ) echo "value='".$_POST['tutTel']."'" ?>
                />

            </div><!-- teléfono tutor -->

            <!-- email tutor -->
            <div class='form-group col-md-6'>

                <!-- etiqueta -->
                <label>
                    Email
                </label>
                    
                <!-- error email invalido -->
                <span <?php if( $etutEmail == 1 ) echo "style='display:inline-block'" ?> data-error="etutEmail" class="error">
                    *Introduce un email
                </span>

                <!-- error campo vacio -->
                <span <?php if( $etutemailValido == 1 ) echo "style='display:inline-block'" ?> data-error="etutemailValido" class="error">
                    *Introduce un email valido
                </span>

                <!-- campo -->
                <input
                    type="email" name='tutEmail' placeholder='Email'
                    class='form-control'
                    <?php if( isset( $_POST['tutEmail'] ) ) echo "value='".$_POST['tutEmail']."'" ?>
                />

            </div><!-- email tutor -->

        </div><!-- datos tutor -->

    <!-- etiqueta información del dispositivo -->
        <div class='row mx-0 mt-4 text-dark'>
            <div class='col-md-4 bg-verde-menu c-align-middle text-white p-3'>
                <h6 class='mb-0'>Información del dispositivo</h6>
            </div>
        </div><!-- etiqueta información del dispositivo -->
        
    <!-- dispositivos -->
        <div <?php if($d == "colchon") echo"style='display:none'" ?> class="form-row mx-0 px-4 mt-4 text-dark">
            
            <div class="form-group col-md-6">
                    
                <!-- etiqueta -->
                <label class="pt-4 pb-2">
                    <strong>
                        ¿Qué extremidad necesita?
                    </strong>
                </label>
                
                <!-- error campo vacio -->
                <span <?php if( $edispositivo == 1 ) echo "style='display:inline-block'" ?> data-error="edispositivo" class="error" >
                    *Selecciona un dispositivo
                </span>
                    
                <!-- lista -->
                <select id="dispositivo" name="dispositivo" class="form-control" <?php if($d !="colchon" ) echo "required"?> >
                    <option value="" class="text-muted" selected>Selecciona un dispositivo</option>
                    <?php
                        foreach($dispositivos as $row){
                            $selected = ( $row['id'] == $dispositivo ) ? "selected" : "";
                            echo "<option value='".$row['id']."' ".$selected.">".$row['nombre']."</option>";
                        }
                    ?>
                </select>

            </div>

        </div><!-- dispositivos -->
        
    <!-- condiciones de la amputación-->
        <div <?php if($d == "colchon") echo"style='display:none'" ?> id="condiciones" class="form-row mx-0 px-4 mt-4 text-dark">
                
            <!-- etiqueta -->
            <div class="form-inline col-12">
            
                <label>
                    <strong>
                        Selecciona la condición de tu <?php echo $d; //$d variable que indica el formulario en el que te encuentras ?>
                    </strong>
                </label>

                <!-- error campo vacio -->
                <span <?php if($econdicion == 1) echo "style='display:inline-block'" ?> data-error="econdicion" class="error">
                    *Selecciona la condición de tu amputación
                </span>
            
            </div><!-- etiqueta -->

            <!-- campo -->
            <?php 
                
                $required = "";

                if($d != "colchon"){
                    $required = "required";
                }
                
                foreach($condiciones as $row){

                    // asignación de variables 
                    $id = $row['id'];
                    $labelFor = "condicion".$id;
                    $nombre = $row['condicion'];
                    $srcFrontal = "/img/condiciones/".$row['imgFrontal'];
                    $srcTrasera = "/img/condiciones/".$row['imgTrasera'];
                        
                    //comprobar si el campo se encuentra seleccionado
                    if( $condicion == $id ){ //$condicion variable post
                        $vistaTrasera = "style='display:block'";
                        $vistaDelantera = "style='display:none'";
                        $checked = "checked";
                    }else{
                        $vistaTrasera = "style='display:none'";
                        $vistaDelantera = "style='display:block'";
                        $checked = "";
                    }

                    //imprimir imágenes de la condición y campo 
                    echo "
                        <div class='col-12 col-sm-6 col-md-4 text-center'>
                            <label for='".$labelFor."' class='imgCondicionLabel text-center w-100'>
                                <!-- imagen de condición frontal -->
                                <img class='mx-auto imgCondicion' src='".$srcFrontal."' alt='imagen frontal de ".$nombre."' ". $vistaDelantera." />

                                <!-- imagen de condición trasera -->
                                <img class='mx-auto imgCondicion' src='".$srcTrasera."' alt='imagen trasera de ".$nombre."' ".$vistaTrasera." />
                            </label>

                            <!-- campo -->
                            <input 
                                type='radio' name='condicion' id='".$labelFor."'
                                value='".$id."' ".$required.                                
                                $checked.
                                "
                            />

                            <label for='".$labelFor."' class='rCondicion mb-0'>
                                &nbsp;".$nombre."
                            </label>
                        </div><!-- condiciones de la amputación -->
                    ";
                }
            ?>

        </div><!-- condiciones de la amputación -->

    <!-- datos adicionales -->
        <div class="form-row mx-0 px-4 mt-4 text-dark">

            <!-- etiqueta y errores de medios de difusión -->
            <div class="form-group col-12">
                    
                <!-- etiqueta -->
                <label class="pt-4 pb-2 text-dark">
                    <strong class="w-100 mt-5">
                        ¿Cómo te enteraste de Fundación Markoptic?
                    </strong>
                </label>

                <!-- error campo vacio -->
                <span <?php if( $emedio == 1 ) echo "style='display:inline-block'" ?> data-error="emedio" class="error">
                    *Selecciona un medio de difusión
                </span>

                <!-- error campo otro requerido -->
                <span <?php if( $emedioOtro == 1 ) echo "style='display:inline-block'" ?> data-error="emedioOtro" class="error">
                    *Introduce una descripción para el medio de difusión
                </span>

            </div><!-- etiqueta y errores de medios de difusión -->

            <!-- lista medios de difusión-->
            <div class="form-group col-md-6">
            
                <select name="medio" id="medio" class="form-control" required>
                    <option value="" data-ph="" class="text-muted" selected>Selecciona un medio de difusión</option>
                    <?php 

                    //imprimir las opciones que contendrá la lista
                    foreach( $medios as $row ){
                            
                        $ph = ( $row['reqDesc'] != 0 ) ? $row['placeholder'] : "";//verificar si la opción de la lista cuenta con descripción para el campo otro
                        $selected = ( $medio == $row['id'] )? "selected" : "";//verificar si la opción es la seleccionada por el beneficiario
                            
                        //verificar si la opción es diferente a otro
                        if( $row['medio'] != "otro" ){
                                
                            //imprimir la opción con sus respectivos datos
                            echo"<option value='".$row['id']."' data-ph='".$ph."' ".$selected.">".$row['medio']."</option>";

                        }else{

                            // guardar los datos de la opción otro para colocarla al final de la lista
                            $otroId = $row['id']; $otroMedio = $row['medio']; $otroPH = $row['placeholder'];

                        }
                    }//foreach

                    $selected = ( $medio == $otroId ) ? "selected" : "";//verificar si la opción otro es la seleccionada por el beneficiario
                    echo"<option value='".$otroId."' data-ph='".$otroPH."' ".$selected.">".$otroMedio."</option>";//imprimir la opción otro al final de la lista
                    ?>
                </select>
            
            </div><!-- lista medios de difusión -->
                
            <!-- otro medio de difusión-->
            <div class="form-group col-md-6">
                <input 
                    type="text" name="medioOtro" placeholder="" 
                 class="form-control"
                    <?php
                        //comprobamos si el campo medio requiere descripción
                        if( $reqDesc == 1 ) {
                            echo "style='display:block'";// imprimir el valor y mostrar el campo
                            if(isset( $_POST['medioOtro'] ) ){echo "value ='".$_POST['medioOtro']."'";}
                        }else{
                            echo "style='display:none'"."disabled";//ocultar el campo y dehabilitarlo para no enviarlo por post
                        }
                    ?>
                />
            </div><!-- otro medio de difusión -->

            <!-- porque -->
            <div class='form-group col-12'>
                    
                <!-- error campo vacio -->
                <label <?php if($eporque == 1) echo "style='display:inline-block'" ?> data-error="eporque" class ="error">
                    *Introduce por que solicitas el dispositivo
                </label>

                <!-- campo -->
                <textarea 
                    name='porque' rows="4" cols="50"
                    class='form-control mt-3' required
                    placeholder="Cuéntanos brevemente porque te gustaría recibir el dispositivo biomédico" 
                    
                ><?php if(isset($_POST['porque']))echo $_POST['porque']; //imprimir valor de porque en caso de que se encuentre disponible ?></textarea>

            </div><!-- porque -->

        </div><!-- datos adicionales -->
        
    <!-- fotografías -->
        <h5 class='text-center text-markoptic mx-5 py-3' style='line-height:140%;'>
            Por último ayúdanos adjuntando unas fotografías recientes y claras donde podamos identificar tu necesidad
        </h5>

        <div id="foto" class="row mx-0 justify-content-center">
                
            <!-- fotografía uno -->
            <div class="col-11 col-sm-6 col-lg-4 p-0 mb-2" id="foto1">
                <?php 
                    if($d == "colchon"){
                        $imgBen = "style='display:none'";
                        $col = "col-12";
                    }else{
                        $imgBen = "";
                        $col = "col-6";
                    }
                ?>
                <div class="row mx-0 text-center">
                   
                    <!-- muestra fotorgafía -->
                    <div <?php echo $imgBen ?> class="col-6 p-0">
                        <label id="label" for="fotofile1">
                            <img src="/img/form/foto beneficiario 1.jpg" alt="Fotografia de beneficiario numero uno">
                        </label>
                    </div>
                   
                    <!-- preview fotografía -->
                    <div class="<?php echo $col ?> p-0 text-center">
                        <img class=" preview" id="previewFoto1" src="/img/form/img-sin-foto.png">
                            
                        <input type="hidden" name="MAX_FILE_SIZE" value="2097152" />
                        <input id="fotofile1" name="foto1" class="form-control-file" type='file' hidden>
                    </div>

                    <!-- etiqueta -->
                    <div class="col-12 px-0 text-center">
                        <label for="fotofile1">Haz click aquí para subir fotografía</label><br>
                        <span class="text-info "> Tamaño máximo 2 MB</span>
                    </div>

                    <!-- errores -->
                    <div class="col-12 px-0 text-center">
                        <!-- error campo vacio -->
                        <span <?php if( $efoto1 == 1 ) echo "style='display:inline-block'" ?> data-error="efoto1" class="error">
                            *Introduce una fotografía
                            <br>
                        </span>
                            
                        <!-- error formato invalido -->
                        <span <?php if( $efifoto1 == 1 ) echo "style='display:inline-block'" ?> data-error="efifoto1" class="error">
                            *Introduce un archivo jpg o png
                            <br>
                        </span>

                        <!-- error tamaño excedido -->
                        <span <?php if( $etmfoto1 == 1 ) echo "style='display:inline-block'" ?> data-error="etmfoto1" class="error">
                            *Archivo mayor a 2 MB</span>
                    </div>
                    
                </div>
                
            </div><!-- fotografía uno -->

            <!-- fotografía dos -->
            <div class="col-11 col-sm-6 col-lg-4 p-0 mb-2" id="foto2">
                    
                <div class="row mx-0 text-center">
                   
                    <!-- muestra fotorgafía -->
                    <div <?php echo $imgBen ?> class="col-6 p-0">
                        <label id="label" for="fotofile2">
                            <img src="/img/form/foto beneficiario 2.jpg" alt="Fotografia de beneficiario numero uno">
                        </label>
                    </div>
                   
                    <!-- preview fotografía -->
                    <div class="<?php echo $col ?> p-0">
                        <img class=" preview" id="previewFoto2" src="/img/form/img-sin-foto.png">
                        
                        <input type="hidden" name="MAX_FILE_SIZE" value="2097152" />
                        <input id="fotofile2" name="foto2" class="form-control-file" type='file' hidden>
                    </div>

                    <!-- etiqueta -->
                    <div class="col-12 px-0 text-center">
                        <label for="fotofile2">Haz click aquí para subir fotografía</label><br>
                        <span class="text-info "> Tamaño máximo 2 MB</span>
                    </div>

                    <!-- errores -->
                    <div class="col-12 px-0 text-center">
                        <!-- error campo vacio -->
                        <span <?php if( $efoto2 == 1 ) echo "style='display:inline-block'" ?> data-error="efoto2" class="error">
                            *Introduce una fotografía
                            <br>
                        </span>
                            
                        <!-- error formato invalido -->
                        <span <?php if( $efifoto2 == 1 ) echo "style='display:inline-block'" ?> data-error="efifoto2" class="error">
                            *Introduce un archivo jpg o png
                            <br>
                        </span>

                        <!-- error tamaño excedido -->
                        <span <?php if( $etmfoto2 == 1 ) echo "style='display:inline-block'" ?> data-error="etmfoto2" class="error">
                            *Archivo mayor a 2 MB
                        </span>
                    </div>
                    
                </div>
                
            </div><!-- fotografía dos -->

            <!-- fotografía tres -->
            <div class="col-11 col-sm-6 col-lg-4 p-0 mb-2" id="foto3">
                    
                <div class="row mx-0 text-center">
                   
                    <!-- muestra fotorgafía -->
                    <div <?php echo $imgBen ?> class="col-6 p-0">
                        <label id="label" for="fotofile3">
                            <img src="/img/form/foto beneficiario 3.jpg" alt="Fotografia de beneficiario numero uno">
                        </label>
                    </div>
                   
                    <!-- preview fotografía -->
                    <div class="<?php echo $col ?> p-0">
                        <img class=" preview" id="previewFoto3" src="/img/form/img-sin-foto.png">
                        
                        <input type="hidden" name="MAX_FILE_SIZE" value="2097152" />
                        <input id="fotofile3" name="foto3" class="form-control-file" type='file' hidden>
                    </div>

                    <!-- etiqueta -->
                    <div class="col-12 px-0 text-center">
                        <label for="fotofile3">Haz click aquí para subir fotografía</label><br>
                        <span class="text-info "> Tamaño máximo 2 MB</span>
                    </div>

                    <!-- errores -->
                    <div class="col-12 px-0 text-center">
                        <!-- error campo vacio -->
                        <span <?php if( $efoto3 == 1 ) echo "style='display:inline-block'" ?> data-error="efoto3" class="error">
                            *Introduce una fotografía
                            <br>
                        </span>
                            
                        <!-- error formato invalido -->
                        <span <?php if( $efifoto3 == 1 ) echo "style='display:inline-block'" ?> data-error="efifoto3" class="error">
                            *Introduce un archivo jpg o png
                            <br>
                        </span>

                        <!-- error tamaño excedido -->
                        <span <?php if( $etmfoto3 == 1 ) echo "style='display:inline-block'" ?> data-error="etmfoto3" class="error">
                            *Archivo mayor a 2 MB</span>
                    </div>
                    
                </div>
                
            </div><!-- fotografía tres -->
            
        </div><!-- fotografías -->

    <!-- términos y condiciones -->
        <hr>
        <h4 class="m-4 text-markoptic">Términos y Condiciones</h4>
        
        <div class="form-row mx-0 text-dark">
            
            <textarea type="textarea" class="form-control px-4 mx-4" style="resize: none;" rows="10" readonly="true">

                TÉRMINOS Y CONDICIONES DE USO Y PRIVACIDAD.

                A los Usuarios les informamos de los siguientes Términos y Condiciones de Uso y Privacidad, los cuales son aplicables por el simple uso o acceso a cualquiera de las Páginas que integran el Portal de FUNDACIÓN MARKOPTIC A. C. (“LA PAGINA”) por lo que entenderemos que los acepta, y acuerda en obligarse en su cumplimiento.
                El Usuario entendido como aquella persona que realiza el acceso mediante equipo de cómputo y/o de comunicación, conviene en no utilizar dispositivos, software, o cualquier otro medio tendiente a interferir tanto en las actividades y/u operaciones del “LA PAGINA” o en las bases de datos y/o información que se contenga en el mismo.

                1. PROPIEDAD INTELECTUAL
                De una parte, Fundación Markoptic A.C. (FMAC) y domiciliado en Blvd. Enrique Sánchez Alonso, 2249-2, Col. Parque Alamedas, Culiacán, Sinaloa, y representada por el Lic. Manuel Humberto Gallardo Inzunza presidente de Fundación Markoptic, según lo dispuesto en el Diario Oficial de la Federación, Ley Federal del Derecho de Autor DOF 27-01-2012 y las plasmadas en la Ley de Acceso a la Información Pública del Estado de Sinaloa Capitulo Quinto del Procedimiento para el ejercicio del Derecho de Acceso a la Información Pública, Artículos 26 al 32.
                FUNDACIÓN MARKOPTIC A.C. y EL BENEFICIARIO Declaran:
                EL BENEFICIARIO autoriza a FUNDACIÓN MARKOPTIC A.C., así como a todas aquellas terceras personas físicas o jurídicas a las que FUNDACIÓN MARKOPTIC A.C. pueda ceder los derechos de explotación sobre las imágenes, así como la pista sonora o partes de las mismas, a que indistintamente puedan utilizar todas las imágenes, o partes de las mismas en las que intervengo como EL BENEFICIARIO.
                Mi autorización tiene ámbito geográfico, determinado por lo que la institución y otras personas físicas o jurídicas a las que FUNDACIÓN MARKOPTIC A.C. pueda ceder los derechos de explotación sobre las imágenes, así como la pista sonora o partes de las mismas, a que indistintamente puedan utilizar todas las imágenes, o partes de las mismas en las que intervengo como EL BENEFICIARIO, en cualquier país.
                Mi autorización se refiere a la totalidad de usos que puedan tener las imágenes, o partes de las mismas, en las que aparezco, utilizando los medios técnicos conocidos en la actualidad y los que pudieran desarrollarse en el futuro, y para cualquier aplicación. Todo ello con la única salvedad y limitación de aquellas utilizaciones o aplicaciones que pudieran atentar al derecho al honor en los términos previstos en la Ley Orgánica 1/85, de 5 de mayo, de Protección Civil al Derecho al Honor, la Intimidad Personal y familiar y a la Propia Imagen. Y al art. 87 de la Ley Federal del Derecho de Autor: “El retrato de una persona sólo puede ser usado o publicado, con su consentimiento expreso, o bien con el de sus representantes o los titulares de los derechos correspondientes. La autorización de usar o publicar el retrato podrá revocarse por quien la otorgó quién, en su caso, responderá por los daños y perjuicios que pudiera ocasionar dicha revocación. 
                Cuando a cambio de una remuneración o aún sin ella, una persona se dejare retratar, se presume que ha otorgado el consentimiento a que se refiere el párrafo anterior y no tendrá derecho a revocarlo, siempre que se utilice en los términos y para los fines pactados. 
                No será necesario el consentimiento a que se refiere este artículo cuando se trate del retrato de una persona que forme parte menor de un conjunto o la imagen sea tomada en un lugar público y con fines informativos o periodísticos. “
                Mi autorización fija límite de tiempo para su concesión y para la explotación de las imágenes, así como la pista sonora o parte de las mismas, en las que intervengo como EL BENEFICIARIO, por lo que mi autorización se considera concedida por un plazo de tiempo ilimitado para televisión y cualquier medio electrónico, incluyendo Internet, y para cualquier medio impreso.  Se considera como inicio del tiempo, una vez que la campaña tanto visual como gráfica, salga por primera vez al aire o este por primera vez en algún medio impreso, respectivamente. 
                EL BENEFICIARIO se libera de cualquier cuestión jurídica, a FUNDACIÓN MARKOPTIC A.C., en lo establecido por el Instituto de Transparencia e Información Pública del Estado de Sinaloa, en el presente o futuro, debiendo de sujetarse a lo acordado en este contrato.
                Se considera que es GRATUITO por concepto de pago por la cesión de mis derechos de imágenes y pista sonora, aceptando estar conforme con el citado acuerdo.

                2. USOS PERMITIDOS
                El aprovechamiento de los Servicios y Contenidos del “LA PAGINA” es exclusiva responsabilidad del Usuario, quien en todo caso deberá servirse de ellos acorde a las funcionalidades permitidas en la propia Página y a los usos autorizados en los presentes Términos y Condiciones de Uso y Privacidad, por lo que el Usuario se obliga a utilizarlos de modo tal que no atenten contra las normas de uso y convivencia en Internet, las leyes de los Estados Unidos Mexicanos y la legislación vigente en el país en que el Usuario se encuentre al usarlos, las buenas costumbres, la dignidad de la persona y los derechos de terceros. “LA PAGINA” es para el uso individual del Usuario por lo que no podrá comercializar de manera alguna los Servicios y Contenidos.

                3. CONFIDENCIALIDAD
                FUNDACIÓN MARKOPTIC A.C. se obliga a mantener confidencial la información que reciba del Usuario que tenga dicho carácter conforme a las disposiciones legales aplicables, en los Estados Unidos Mexicanos.

                4. MODIFICACIONES 
                Reservamos el derecho a modificar esta Declaración de Privacidad en cualquier momento. Su uso continuo de cualquier porción de este sitio tras la notificación o anuncio de tales modificaciones constituirá su aceptación de tales cambios.”

                5. ACEPTAR TERMINOS
                Al aceptar estos Términos y Condiciones FUNDACIÓN MARKOPTIC A.C. “Implica su aceptación plena y sin reservas a todas y cada una de las disposiciones incluidas en este Aviso Legal, por lo que, si usted no está de acuerdo con cualquiera de las condiciones aquí establecidas, no deberá usar u/o acceder a este sitio. Queda a disposición de los datos aquí ingresados, y no significa en ningún sentido el compromiso u obligación por parte de la organización en aceptar el seguimiento, desarrollo o fabricación de cualquier dispositivo.
                Fundación Markoptic A.C. iniciará un proceso de estudio de la solicitud y se contactará con usted personalmente al momento de haber analizado y ser verificada la información proporcionada, si en caso contrario de no haber sido aceptada su solicitud será incluido a la lista de espera.
            </textarea>
        
        </div><!-- terminos y condiciones -->

    <!-- aceptar terminos y condiciones -->
        <div class="form-row mx-0 text-dark">
            <div class="form-inline m-md-4 m-2 mx-4">
                <input 
                    type="checkbox" name="terminos" value="1" 
                    id="terminos"  class="mr-2" required
                />
                <label for="terminos">Aceptar los términos y condiciones</label>
                <span <?php if($eterminos == 1) echo "style='display:inline-block'"?> data-error="eterminos" class="error">&nbsp; *Acepta los términos y condiciones para continuar</span>
            </div>
            <a class="text-info m-md-4 m-2 mx-4 btn-link" href="/files/TERMINOS - CONDICIONES DE USO Y PRIVACIDAD.pdf" target="blank">Imprimir Términos y condiciones</a>
        </div><!-- aceptar terminos y condiciones -->
         
    <!-- errores de usuario  campos beneficiario -->
        <div class="px-4">
            <span <?php if( $enombre == 1 ) echo "style='display:inline-block'" ?> data-error="enombre" class="error">
                *Introduce nombre(s) del beneficiario &nbsp;
            </span>
            <span <?php if( $eapellido == 1 ) echo "style='display:inline-block'" ?> data-error="eapellido" class="error">
                *Introduce apellido(s) del beneficiario &nbsp;
            </span>
            <span <?php if( $esexo == 1 ) echo "style='display:inline-block'" ?> data-error="esexo" class="error">
                *Selecciona un sexo &nbsp;
            </span>
            <span <?php if($edateMinima == 1) echo "style='display:inline-block'" ?> data-error="edateMinima" class="error">
                *Edad minima 1 año &nbsp;
            </span>
            <span <?php if($edateNoPermitida == 1) echo "style='display:inline-block'" ?> data-error="edateNoPermitida" class="error">
                *Edad permitida 1 a 120 años &nbsp;
            </span>
            <span <?php if( $edate == 1 ) echo "style='display:inline-block'" ?> data-error="edate" class="error">
                *Introduce la fecha de nacimiento del beneficiario &nbsp;
            </span>
            <span <?php if( $epais == 1 ) echo "style='display:inline-block'" ?> data-error="epais" class="error">
                *Selecciona un país &nbsp;
            </span>
            <span <?php if( $eestado == 1 ) echo "style='display:inline-block'" ?> data-error="eestado" class="error">
                *Selecciona un estado &nbsp;
            </span>
            <span <?php if ($eciudad == 1) echo "style='display:inline-block'" ?> data-error="eciudad" class="error">
                *Selecciona una ciudad &nbsp;
            </span>
            <span <?php if( $ecalle == 1 ) echo"style='display:inline-block'" ?> data-error="ecalle" class="error">
                *Introduce calle y número &nbsp;
            </span>
            <span <?php if( $ecolonia == 1 ) echo "style='display:inline-block'" ?> data-error="ecolonia" class="error">
                *introduce una colonia &nbsp;
            </span>
            <span <?php if( $ecp == 1 )echo "style='display:inline-block'" ?> data-error="ecp" class="error">
                *Introduce un código postal &nbsp;
            </span>
            <span <?php if( $etel == 1 ) echo "style='display:inline-block'" ?> data-error="etel" class="error">
                *Introduce un teléfono &nbsp;
            </span>
            <span <?php if($eemail == 1) echo "style='display:inline-block'" ?> data-error="eemail" class="error">
                *Introduce un email &nbsp;
            </span>
            <span <?php if($eemailValido == 1) echo "style='display:inline-block'" ?> data-error="eemailValido" class="error">
                *Introduce un email valido &nbsp;
            </span>

        </div><!-- errores de usuario  campos beneficiario -->

    <!-- errores de usuario  campos tutor -->
        <div class="px-4">
            <span <?php if( $tutorObligatorio == 1 ) echo "style='display:inline-block'" ?> data-error="tutorObligatorio" class="error text-info">
                *Tutor requerido, por minoría de edad del solicitante &nbsp;
            </span>
            <span <?php if($etutNombre == 1) echo "style='display:inline-block'" ?> data-error="etutNombre" class="error">
                *Introduce nombre(s) del tutor &nbsp;
            </span>
            <span <?php if( $etutApellido == 1 ) echo "style='display:inline-block'" ?> data-error="etutApellido" class="error">
                *Introduce apellido(s) del tutor &nbsp;
            </span>
            <span <?php if( $etutSexo == 1 ) echo "style='display:inline-block'" ?> data-error="etutSexo" class="error">
                *Selecciona el sexo del tutor &nbsp;
            </span>
            <span <?php if($etutVive == 1) echo "style='display:inline-block'" ?> data-error="etutvive" class="error">
                *Selecciona si el tutor vive con el beneficiario &nbsp;
            </span>
            <span <?php if($etutParentesco == 1) echo "style='display:inline-block'" ?> data-error="etutParentesco" class="error">
                *Selecciona el parentesco del beneficiario con el tutor &nbsp;
            </span>
            <span <?php if ( $etutDateMinima == 1 ) echo "style='display:inline-block'" ?> data-error="etutDateMinima" class="error">
                *Edad minima del tutor 18 años &nbsp;
            </span>
            <span <?php if ( $etutDate == 1 ) echo "style='display:inline-block'" ?> data-error="etutDate" class="error">
                *Introduce la fecha de nacimiento del tutor &nbsp;
            </span>
            <span <?php if( $etutTel == 1 ) echo "style='display:inline-block'" ?> data-error="etutTel" class="error">
                *Introduce el número de teléfono del tutor &nbsp;
            </span>
            <span <?php if( $etutEmail == 1 ) echo "style='display:inline-block'" ?> data-error="etutEmail" class="error">
                *Introduce el email del tutor &nbsp;
            </span>
            <span <?php if( $etutemailValido == 1 ) echo "style='display:inline-block'" ?> data-error="etutEmailValido" class="error">
                *Introduce un email valido del tutor &nbsp;
            </span>
        </div><!-- errores de usuario campos tutor -->
        
    <!-- errores de usuario  campos adicionales -->
        <div class="px-4">
            <span <?php if( $edispositivo == 1 ) echo "style='display:inline-block'" ?> data-error="edispositivo" class="error">
                *Selecciona el dispositivo que necesitas &nbsp;
            </span>
            <span <?php if($econdicion == 1) echo "style='display:inline-block'" ?> data-error="econdicion" class="error">
                *Selecciona la condición de tu amputación &nbsp;
            </span>
            <span <?php if( $emedio == 1 ) echo "style='display:inline-block'" ?> data-error="emedio" class="error">
                *Selecciona un medio de difusión
            </span>
            <span <?php if( $emedioOtro == 1 ) echo "style='display:inline-block'" ?> data-error="emedioOtro" class="error">
                *Selecciona la descripción del medio de difusión &nbsp;
            </span>
            <span <?php if($eporque == 1) echo "style='display:inline-block'" ?> data-error="eporque" class="error">
                *Introduce por que solicitas el dispositivo &nbsp;
            </span>
            <span <?php if($efoto1 == 1) echo "style='display:inline-block'" ?> data-error="efoto1" class="error">
                *ingresa la fotografía número uno del beneficiario &nbsp;
            </span>
            <span <?php if($efifoto1 == 1 ) echo "style='display:inline-block'" ?> data-error="efifoto1" class="error">
                *formato invalido en la fotografía número uno del beneficiario &nbsp;
            </span>
            <span <?php if($etmfoto1 == 1 ) echo "style='display:inline-block'" ?> data-error="etmfoto1" class="error">
                *tamaño excedido en la fotografía número uno del beneficiario &nbsp;
            </span>
            <span <?php if($efoto2 == 1 ) echo "style='display:inline-block'" ?> data-error="efoto2" class="error">
                *ingresa la fotografía número dos del beneficiario &nbsp;
            </span>
            <span <?php if($efifoto2 == 1 ) echo "style='display:inline-block'" ?> data-error="efifoto2" class="error">
                *formato invalido en la fotografía número dos del beneficiario &nbsp;
            </span>
            <span <?php if($etmfoto2 == 1 ) echo "style='display:inline-block'" ?> data-error="etmfoto2" class="error">
                *tamaño excedido en la fotografía número dos del beneficiario &nbsp;
            </span>
            <span <?php if($efoto3 == 1 ) echo "style='display:inline-block'" ?> data-error="efoto3" class="error">
                *ingresa la fotografía número tres del beneficiario &nbsp;
            </span>
            <span <?php if($efifoto3 == 1 ) echo "style='display:inline-block'" ?> data-error="efifoto3" class="error">
                *formato invalido en la fotografía número tres del beneficiario &nbsp;
            </span>
            <span <?php if($etmfoto3 == 1 ) echo "style='display:inline-block'" ?> data-error="etmfoto3" class="error">
                *tamaño excedido en la fotografía número tres del beneficiario &nbsp;
            </span>
            <span <?php if($eterminos == 1) echo "style='display:inline-block'"?> data-error="eterminos" class="error">
                *Acepta los terminos y condiciones &nbsp;
            </span>

        </div><!-- errores de usuario campos adicionales -->
        

    <!-- submit -->
        <div class="row mx-0 px-4">
            <button class="btn bg-verde-menu ml-auto text-white p-3 mt-3 mb-3">Enviar</button>
        </div><!-- submit -->
        <input
            type="hidden" name="formDispositivo"
            <?php echo "value='".$d."'" //$d variable que indica el formulario en el que te encuentras?>
        />

    </form>
        
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="http://kendo.cdn.telerik.com/2018.2.620/js/kendo.all.min.js"></script>
    <script src="/js/muestra-ubicacion.js"></script>
    <script src="/js/formulario-prueba.js"></script>

</body>
</html>