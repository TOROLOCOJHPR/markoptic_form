<!-- datos del tutor -->
<div class='row mx-0 mt-2'>
    <div class='col-md-4 bg-verde-menu c-align-middle text-white p-3'>
        <p class='mb-0'>Información del tutor</p>
    </div>
</div>
<!-- confirmación de tutor -->
<div class="form-row mx-0 mt-2">
    <div class="form-inline col-12 p-4">
        <strong>¿El beneficiario depende de otra persona?</strong> &nbsp;&nbsp;
        <?php 
        if( isset( $_POST['independiente'] ) ){
            $independiente = $_POST['independiente'];
        }else{
            $independiente = "0";
        }
        ?>
        <div class="form-check form-check-inline">
            <label class="form-check-label">
                <input type="radio" class="form-check-input" name="independiente" value="0" <?php if($independiente == 0){ echo"checked"; } echo ($tutObligatorio == 0 )?"":"disabled"; ?> >no<br>
            </label>
        </div>
        <div class="form-check form-check-inline">
            <label class="form-check-label">
                <input type="radio" class="form-check-input" name="independiente" value="1" <?php if($independiente == 1){ echo"checked"; } ?> >si<br>
            </label>
        </div>
    </div>
</div>        
<!-- datos personales -->
<div class="text-info mt-2 mb-2 mx-4" style='display:<?php echo ($tutObligatorio != 0)?"":"none"; ?>;' id="msgMenorEdad"><span>* Datos requeridos, por minoría de edad del solicitante</span></div>
<div class='seccionTutor' style='display:none;'>
    <div class='form-row px-4 mx-0'>
        <div class='form-group col-sm-6'>
            <label>Nombre</label>
            <span class="text-danger <?php echo ($etutNombre == 1)?"":"d-none"; ?>"> *Introduce nombre(s) del tutor</span>
            <input type="text" class='form-control' name='tutNombre' placeholder='Nombre' value ="<?php if(isset($_POST['tutNombre'])){echo $_POST['tutNombre'];} ?>">
        </div>
        <div class='form-group col-sm-6'>
            <label>Apellido</label>
            <span class="text-danger <?php echo ($etutApellido == 1)?"":"d-none"; ?>"> *Introduce apellido(s) del tutor</span>
            <input type="text" class='form-control' name='tutApellido' placeholder='Apellido' value ="<?php if(isset($_POST['tutApellido'])){echo $_POST['tutApellido'];} ?>"> 
        </div>
    </div>
    <div class='form-row px-4 mx-0'>
        <div class='form-group col-md-6'>
            <label>Sexo</label>
            <span class="text-danger <?php echo ($esexoTutor == 1)?"":"d-none"; ?>"> *Selecciona un sexo</span>
            <?php 
            if( isset($_POST['sexoTutor']) ){
                $sexoTutor = $_POST['sexoTutor'];
            }else{
                $sexoTutor = "";
            } 
            ?>
            <select name='sexoTutor' id="sexoTutor" class="form-control">
                <option <?php if($sexoTutor == ""){echo "selected";}?> value="" class="text-muted">Selecciona Tu Sexo</option>
                <option <?php if($sexoTutor == "m"){echo "selected";}?> value='m'>Masculino</option>
                <option <?php if($sexoTutor == "f"){echo "selected";}?> value='f'>Femenino</option>
            </select>
        </div>
        <div class='form-group col-md-6 text-center'>                
            <label>¿Vives con el beneficiario?</label>
            <span class="text-danger <?php echo ($etutVive == 1)?"":"d-none"; ?>"> *Selecciona una opción</span>
             &nbsp;&nbsp;<br>
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
    <div class='form-row px-4 mx-0'>
        <div class='form-group col-md-6'>
            <label>Parentesco</label>
            <span class="text-danger <?php echo ($eparentesco == 1)?"":"d-none"; ?>"> *Selecciona un parentesco</span>
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
            <span id="msgTutMenorEdadLabel" class="text-danger <?php echo ($edadErrorTut != 0)?"":"d-none"; ?>"> *Edad minima 18 años</span>
            <span class="text-danger <?php echo ($etutDate == 1)?"":"d-none"; ?>"> *Introduce una fecha de nacimiento</span>
            <input type="date" class='form-control' name='tutDate' id="dateTut" placeholder='Fecha de Nacimiento' value ="<?php if(isset($_POST['tutDate'])){echo $_POST['tutDate'];} ?>"> 
        </div>
    </div>
    <!-- datos contacto -->
    <div class='form-row px-4 mx-0'>
        <div class='form-group col-md-6'>
            <label>Teléfono</label>
            <span class="text-danger <?php echo ($etutTel == 1)?"":"d-none"; ?>"> *Introduce un número de telefono</span>
            <input type="text" class='form-control' name='tutTel' placeholder='Teléfono' value ="<?php if(isset($_POST['tutTel'])){echo $_POST['tutTel'];} ?>">
        </div>
        <div class='form-group col-md-6'>
            <label>Email</label>
            <span class="text-danger <?php echo ($etutEmail == 1)?"":"d-none"; ?>"> *Introduce un email</span>
            <span class="text-danger <?php echo ($etutemailvalido == 1)?"":"d-none"; ?>"> *Introduce un email valido</span>
            <input type="email" class='form-control' name='tutEmail' placeholder='Email' value ="<?php if(isset($_POST['tutEmail'])){echo $_POST['tutEmail'];} ?>"> 
        </div>
    </div>
</div>