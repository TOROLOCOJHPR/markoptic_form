<?php
    $root = $_SERVER['DOCUMENT_ROOT']; // tomar ruta hacía el directorio raíz
    
    require ($root.'/panel/inc/comprueba.php');//comprueba si el usuario se encuentra autentificado

    $requireBack = 1;// 1 requiere botón de regreso en menú 0 no requiere botón de regreso en el menú
    $title = "Beneficiarios";

    include $root.'/panel/inc/excepciones-formulario.php';
?>
<link rel="stylesheet" href="http://kendo.cdn.telerik.com/2018.2.620/styles/kendo.bootstrap.min.css" />
<link rel="stylesheet" href="http://kendo.cdn.telerik.com/2018.2.620/styles/kendo.common.min.css">
<?php
    
    include $root.'/panel/mod/header.php';
    include $root.'/panel/mod/menu-principal.php';
?>
<style>
    .k-widget{border:none}
    .k-icon, .k-tool-icon {
        position: initial;
    }
</style>

    <?php 
        if($metodo == "POST"){ ?>
            <!-- mensaje success -->
            <div id="actualiza-alert" class="alert alert-dismissible alert-success fade show" style="display:none" role="alert">
                <span id="actualiza-message"></span>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div><!-- message success -->
    <?php 
        }
    ?>

    <!-- folios antiguos  -->
    <div class="row mx-0 px-4">
        <div class="col-auto p-0">
            <h4>Datos Beneficiarios</h4>
        </div>
        <div class="col p-0 text-right">
            <button class="btn btn-primary rounded-0" id="btnOcultar">Ocultar datos</button>
        </div>
    </div>
    
    <!-- datos del beneficiario -->
    <div id="datosBeneficiario">
        
        <!-- folio antiguo -->
        <p class="mx-4 px-2 lead">
            <span class="font-weight-bold">Folio zip:</span>
            <?php echo ($folioAntiguo == "")? "Sin Zip" : $folioAntiguo ?>
        </p>
        
        <p class="mx-4 px-2 lead">
            <span class="font-weight-bold">Fecha Solicitud:</span>
            <?php echo $solicitud['fechaSolicitud']?>
        </p>
        <hr class="mx-5">
        <form class="px-4" id="form" method="post" enctype="multipart/form-data">
        
            <fieldset <?php echo ($_SESSION[ROL] == 4)? 'disabled' : '' ?> >
                
                <!-- imágenes del beneficiario -->
                <h5 class="px-2 text-primary">Imágenes del beneficiario</h5>
                <div class="row mx-0">
                    <?php
                
                    $cont = 0;
                    foreach($imagenes as $row){
                        $checked = ($fotoHistoria[0]['fotoHistoria'] == $row['nombre']) ? "checked" : "";
                        ?>
                        <div class="form-group col-12 col-sm-6 col-md-4 col-lg-3 px-2 d-flex flex-column text-center">
                            <div class="flex-grow-1 d-flex align-items-center justify-content-center">
                                <img class="mb-2" style="max-width:100%;max-height:300px;" src="/img/uploads/<?php echo $_GET['b']."/".$row['nombre']?>" alt="imagen del beneficiario">
                            </div>
                            <div>
                                <input
                                    name="historia" type="radio"
                                    <?php
                                        echo'id="historia'.$cont.'"
                                        value="'.$row['nombre'].'" '.$checked;
                                    ?>
                                />
                                <label <?php echo "for='historia".$cont."'" ?> >
                                    <?php echo $row['nombre'] ?>
                                </label>
                            </div>
                        </div>
                        <?php
                        $cont ++;
                    }//foreach
                    ?>

                    <!-- upload -->
                    <div class="form-group col-12 col-sm-6 col-md-4 col-lg-3 px-2 d-flex flex-column text-center">          
                        <div class="flex-grow-1 d-flex align-items-center justify-content-center">
                            <img id="preview" class="mb-2" style="max-width:100%;max-height:300px;" src="/img/form/img-sin-foto.png" alt="">
                        </div>
                        <div>
                            <input
                                name="fotoUpload" type="file" id="fotoUpload"
                                class=""
                            />
                        </div>
                    </div>
                </div><!-- /imágenes del beneficiario -->

                <!-- estatus de solicitud -->
                <h5 class="text-primary">Estatus Solicitud</h5>
                <div class="form-row">
                    <div class="form-group col-12">
                        <label for="estatus">
                            Estatus solicitud
                        </label>
                        <select class="form-control" name="estatus" required>
                            <option value="">Selecciona un estatus de solicitud</option>
                            <?php 
                            foreach($estatus as $row){
                                $selected = ($row['id'] == $solicitud['estatus'])? "selected" : "";
                                echo "<option value='".$row['id']."' ".$selected.">".$row['estatus']."</option>";
                            }//foreach
                            ?>
                        </select>
                    </div>
                </div><!-- /estatus de solicitud -->

            <!-- datos personales -->
                <h5 class="text-primary">Datos Personales</h5>
                <div class="form-row">
            
                    <!-- nombre -->
                    <div class="form-group col-md-4">
                        <label for="nombre">
                            Nombre(s)
                        </label>
                        <input 
                            name="nombre" type="text" id="nombre" placeholder="Introduce un nombre"
                            class="form-control" required 
                            <?php echo "value='".$solicitud['nombre']."'" ?>
                        />
                    </div><!-- /nombre -->

                    <!-- apellidos -->
                    <div class="form-group col-md-4">
                        <label for="apellidos">
                            Apellido(s)
                        </label>
                        <input
                            name="apellido" type="text" id="apellidos" placeholder="Selecciona un apellido"
                            class="form-control" required 
                            <?php echo "value='".$solicitud['apellido']."'" ?>
                        />
                    </div><!-- /apellidos -->
            
                    <!-- sexo -->
                    <div class="form-group col-md-4">
                        <label>Sexo</label>
                        <select name="sexo" class="form-control" required>
                            <option value="" <?php if($solicitud['sexo'] == ""){echo'selected';}?> class="text-muted" >Selecciona sexo</option>
                            <option value="m" <?php if($solicitud['sexo'] == "m"){echo'selected';}?> >Masculino</option>
                            <option value="f" <?php if($solicitud['sexo'] == "f"){echo'selected';} ?> >Femenino</option>
                        </select>
                    </div><!-- /sexo -->

                    <!-- nacimiento -->
                    <div class="form-group col-md-3">
                        <label for="nacimiento">
                            Fecha Nacimiento
                        </label>
                        <input 
                            name="nacimiento" type="date" id="nacimiento"
                            class="form-control" required
                            <?php echo "value='".$solicitud['nacimiento']."'"?>
                        />
                    </div><!-- /nacimiento -->

                    <!-- país -->
                    <div class="form-group col-md-3">
                        <label>Selecciona un país</label>
                        <select name="pais" id="pais" class="form-control">
                            <option value="" >Selecciona un país</option>
                            <?php 
                            foreach($paises as $row){
                                $selected = ($row['id'] == $solicitud['idPais']) ? "selected" : "";
                                echo '<option value="'.$row['id'].'" '.$selected.'>'.$row['nombre'].'</option>';
                            }//foreach
                            ?>
                        </select>
                    </div><!-- /país -->

                    <!-- estado -->
                    <div class="form-group col-md-3">
                        <label>Selecciona un estado</label>
                        <select name="estado" id="estado" class="form-control">
                            <option value="">Selecciona un estado</option>
                            <?php 
                            foreach($estados as $row){
                                $selected = ($row['value'] == $solicitud['idEstado'])? "selected" : "";
                                echo '<option value="'.$row['value'].'" '.$selected.'>'.$row['text'].'</option>';
                            }//foreach
                            ?>
                        </select>
                    </div><!-- /estado -->

                    <!-- ciudad -->
                    <div class="form-group col-md-3">
                        <label>Selecciona una ciudad</label>
                        <select name="ciudad" id="ciudad" class="form-control">
                            <option value="">Selecciona una ciudad</option>
                            <?php 
                            foreach($ciudades as $row){
                                $selected = ($row['value'] == $solicitud['idCiudad']) ? "selected" : "";
                                echo '<option value="'.$row['value'].'" '.$selected.'>'.$row['text'].'</option>';
                            }//foreach
                            ?>
                        </select>
                    </div><!-- /ciudad -->

                    <!-- calle y número -->
                    <div class="form-group col-md-6">
                        <label for="calle">Calle y Número</label>
                        <input 
                            name="calle" type="text" id="calle" placeholder="Introduce calle y número"
                            class="form-control" required
                            <?php echo 'value="'.$solicitud['calle'].'"' ?>
                        />
                    </div><!-- /calle y número -->

                    <!-- colonia -->
                    <div class="form-group col-md-3">
                        <label for="colonia">Colonia</label>
                        <input 
                            name="colonia" type="text" id="colonia" placeholder="Introduce una colonia"
                            class="form-control" required
                            <?php echo 'value="'.$solicitud['colonia'].'"' ?> 
                        />
                    </div><!-- /colonia -->
        
                    <!-- código postal -->
                    <div class="form-group col-md-3">
                        <label for="cp">Código Postal</label>
                        <input 
                            name="cp" type="text" id="cp" placeholder="Introduce un código postal"
                            class="form-control" required
                            <?php echo 'value="'.$solicitud['cp'].'"' ?>
                        />
                    </div><!-- /código postal -->

                    <!-- teléfono -->
                    <div class="form-group col-md-3">
                        <label for="telefono">Teléfono</label>
                        <input 
                            type="telefono" name="telefono" id="telefono" placeholder="Introduce un teléfono"
                            class="form-control"  required
                            <?php echo 'value="'.$solicitud['telefono'].'"'?>
                        />
                    </div><!-- /teléfono -->

                    <!-- email -->
                    <div class="form-group col-md-3">
                        <label for="email">Email</label>
                        <input 
                            name="email" type="email" id="email" placeholder="Introduce un email"
                            class="form-control" required
                            <?php echo 'value="'.$solicitud['email'].'"' ?>
                        />
                    </div><!-- /email -->
        
                    <!-- dispositivo -->
                    <div class="form-group col-md-3">
                        <label>Dispositivo</label>
                        <select name="dispositivo" id="dispositivo" class="form-control">
                            <option value="">Selecciona un dispositivo</option>
                            <?php 
                            foreach($dispositivos as $row){
                                if($row['mostrarDispositivo'] == 1){
                                    $selected = ($row['idDispositivo'] == $solicitud['idDispositivo']) ? "selected" : "";
                                    echo '<option value="'.$row['idDispositivo'].'" '.$selected.'>'.$row['nombreDispositivo'].'</option>';
                                }//if
                            }//foreach
                            ?>
                        </select>
                    </div><!-- /dispositivo -->

                    <!-- condición de la amputación -->
                    <div class="form-group col-md-3">
                        <label>Selecciona una condición</label>
                        <select name="condicion" id="condicion" class="form-control">
                            <option value="">Selecciona una condición</option>
                            <?php 
                            foreach($condiciones as $row){
                                $selected = ($row['idCondicion'] == $solicitud['idCondicion']) ? "selected" : "";
                                echo '<option value="'.$row['idCondicion'].'" '.$selected.' >'.$row['condicion'].'</option>';
                            }//foreach
                            ?>
                        </select>
                    </div><!-- /condición de la amputación -->

                    <!-- medio de difusión -->
                    <div class="form-group col-md-3">
                       <label>Medio de difusión</label>
                       <select name="medio" id="medio" class="form-control">
                           <option value="" data-ph="">Selecciona un medio de difusión</option>
                           <?php 
                           $reqDesc = 0;
                           foreach($medios as $row){
                                if($row['idMedio'] == $solicitud['idMedioDif']){//mostrar el medio seleccionado por el beneficiario
                                    $selected = "selected";
                                    if($row['reqDesc'] == 1){
                                        $reqDesc = 1;
                                    }
                                }else{
                                    $selected = "";
                                }
                               echo '<option value="'.$row['idMedio'].'" '.$selected.' data-ph="'.$row['placeholder'].'">'.$row['medio'].'</option>';
                           }//foreach
                           ?>
                       </select>
                    </div><!-- /medio de difusión -->

                    <!-- descripción del medio de difusión -->
                    <div class="form-group col-md-6">
                        <div <?php echo ($reqDesc == 0) ?'style="display:none"' :'style="display:block"'; ?> id="medioOtro">
                            <label for="medioOtro">Descripción del medio</label>
                            <input
                                name="medioOtro" type="text"
                                class="form-control"
                                <?php 
                                    echo 'value="'.$solicitud['descMedioDif'].'"';
                                    echo ($reqDesc == 1) ? "required" : "";
                                 ?>
                            />
                        </div>
                    </div><!-- /descripción del medio de difusión -->
        
                    <!-- porque -->
                    <div class="form-group col-md-9">
                        <label>¿Por qué solicita?</label>
                        <textarea name="porque" rows="4" cols="50" class="form-control" required ><?php echo $solicitud['porque']?></textarea>
                    </div><!-- /porque -->

                </div><!-- /datos beneficiario -->

            <!-- datos tutor -->
                <h3 class="">Datos Tutor</h3>
            
                <button 
                    <?php echo ($solicitud['independiente'] == 1) ?"": "style='display:none'" ?>
                    type = "button"
                    class="btn btn-secondary rounded-0 border-0" id="btnMuestraTutor"
                >
                    agregar tutor
                </button>
            
                <div 
                    <?php echo ($solicitud['independiente'] == 1) ?"style='display:none' data-tutor='0'": "data-tutor='1'" ?> 
                    class="form-row" id="datosTutor"
                >
                    <div class="col-12">
                        <h5 class="text-primary">Datos personales</h5>
                        <hr>
                    </div>

                    <!-- nombre tutor -->
                    <div class="form-group col-md-4">
                        <label for="tutNombre">Nombre(s) Tutor</label>
                        <input
                            name="tutNombre" type="text" id="tutNombre" placeholder="Introduce el nombre del tutor"
                            class="form-control"
                            <?php
                                echo ($solicitud['independiente'] == 0) ? 'value="'.$solicitud['tutNombre'].'" required' : "" 
                            ?>
                        /> 
                    </div><!-- /nombre tutor -->

                    <!-- apellido tutor -->
                    <div class="form-group col-md-4">
                        <label for="tutApellido">Apellido(s) Tutor</label>
                        <input
                            name="tutApellido" type="text" id="tutApellido" placeholder="Introduce el apellido del tutor"
                            class="form-control"
                            <?php 
                                echo ($solicitud['independiente'] == 0) ? 'value="'.$solicitud['tutApellido'].'" required' : ""
                            ?>
                        />
                    </div><!-- /apellido tutor -->
        
                    <!-- sexo tutor -->
                    <div class="form-group col-md-4">
                        <label>Sexo Tutor</label>
                        <select name="tutSexo" id="tutSexo" class="form-control">
                            <?php 
                                if(!isset($solicitud['tutSexo'])){
                                    $tutSexo = "";
                                }else{
                                    $tutSexo = $solicitud['tutSexo'];
                                }
                            ?>
                            <option value="" <?php if($tutSexo == ""){echo'selected';} ?> class="text-muted" >Selecciona un sexo</option>
                            <option value="m" <?php if($tutSexo == "m"){echo'selected';} ?> >Masculino</option>
                            <option value="f" <?php if($tutSexo == "f"){echo'selected';} ?>>Femenino</option>
                        </select>
                    </div><!-- /sexo tutor -->

                    <!-- vive con el beneficiario -->
                    <div class="form-group col-md-4">
                        <label>¿Vive con el Beneficiario?</label>
                        <select name="viveBen" id="viveBen" class="form-control">
                            <?php 
                                if(!isset($solicitud['viveBen'])){
                                    $viveBen = "";
                                }else{
                                    $viveBen = $solicitud['viveBen'];
                                }
                            ?>
                            <option value="" <?php if($viveBen == ""){echo'selected';} ?> class="text-muted" >Selecciona si vive con el beneficiario</option>
                            <option value="0" <?php if($viveBen == "0"){echo'selected';} ?> >no</option>
                            <option value="1" <?php if($viveBen == "1"){echo'selected';} ?> >si</option>
                        </select>
                    </div><!-- /vive con el beneficiario -->
        
                    <!-- parentesco -->
                    <div class="form-group col-md-4">
                        <label>Parentesco</label>
                        <select name="parentesco" id="parentesco" class="form-control">
                            <option value="">Selecciona un parentesco</option>
                            <?php
                            foreach($parentescos as $row){
                                $selected = ($row['idParentesco'] == $solicitud['idParentesco']) ? "selected" : "";
                                echo '<option value="'.$row['idParentesco'].'" '.$selected.'>'.$row['parentesco'].'</option>';
                            }//foreach
                            ?>
                        </select>
                    </div><!-- /parentesco -->
        
                    <!-- nacimiento tutor -->
                    <div class="form-group col-md-4">
                        <label for="tutNacimiento">Fecha Nacimiento Tutor</label>
                        <input
                            name="tutNacimiento" type="date" id="tutNacimiento"
                            class="form-control"
                            <?php
                                echo ($solicitud['independiente'] == 0) ? 'value="'.$solicitud['tutNacimiento'].'" required' : "" 
                            ?>
                        />
                    </div><!-- /nacimiento tutor -->
        
                    <!-- teléfono tutor -->
                    <div class="form-group col-md-4">
                        <label for="tutTelefono">Teléfono Tutor</label>
                        <input
                            name="tutTelefono" type="tel" id="tutTelefono" placeholder="Introduce el teléfono del tutor" 
                            class="form-control"
                            <?php
                                echo ($solicitud['independiente'] == 0) ? 'value="'.$solicitud['tutTelefono'].'" required' : "" 
                            ?>
                        />
                    </div><!-- /teléfono tutor -->
            
                    <!-- email tutor -->
                    <div class="form-group col-md-4">
                        <label for="tutEmail">Email Tutor</label>
                        <input
                            name="tutEmail" type="email" id="tutEmail" placeholder="Introduce el email del tutor"
                            class="form-control"
                            <?php 
                                echo ($solicitud['independiente'] == 0) ? 'value="'.$solicitud['tutEmail'].'" required' : ""
                            ?>
                        />
                    </div> <!-- /email tutor -->
                
                    <input 
                        type="hidden" name="tutor" id="tutor" 
                        value="1" 
                        <?php 
                            echo ($solicitud['independiente'] == 0) ? '' : 'disabled="true"';
                        ?>
                    />

                </div><!--/datos tutor -->

                <!-- submit -->
                <input
                    type="hidden" name="idSolicitud"
                    <?php
                        echo 'value="'.$idSolicitud.'"'
                    ?>
                />
                <input
                    type="hidden" name="idBeneficiario"
                    <?php
                        echo 'value="'.$solicitud['id'].'"';
                    ?>
                />

                <hr>
                <div class="text-right">
                    <input class="btn btn-success bg-markoptic rounded-0" id="submit" type="submit" value="Guardar">
                </div>
            
            </fieldset>
        </form>

    </div><!-- /datos del beneficiario -->
    
    <!-- transacciones totales -->
    <div class="px-4">
        <h4>Transacciones totales</h4>
        <div class="row mx-0 mb-5">
            <div class="col-4 p-0 border-bottom">
                <p class="font-weight-bold">Donación</p>
            </div>
            <div class="col-4 p-0 border-bottom">
                <p class="font-weight-bold">Transacción</p>
            </div>
            <div class="col-4 p-0 border-bottom">
                <p class="font-weight-bold">Fecha</p>
            </div>
            <?php 
                foreach($transacciones as $row){
            ?>
                <div class="col-4 border-bottom pt-2">
                    <?php echo $row['donacion']; ?>
                </div>
                <div class="col-4 border-bottom pt-2">
                    <?php echo $row['idBanwire']?>
                </div>
                <div class="col-4 border-bottom pt-2">
                    <?php echo $row['fecha']?>
                </div>
            <?php
                }
            ?>
        </div>
    </div><!-- transacciones totales-->

    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="http://kendo.cdn.telerik.com/2018.2.620/js/kendo.all.min.js"></script>    
    <script src="/js/muestra-ubicacion.js"></script>
    <script src="/panel/js/beneficiariosDatos.js"></script>
    <script src="/panel/js/crea-miniatura.js"></script>
    <script>
        
    </script>
