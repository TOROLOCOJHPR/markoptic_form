<div class='row mx-0 mt-4'>
    <div class='col-md-4 bg-verde-menu c-align-middle text-white p-3'>
        <p class='mb-0'>Información del beneficiario</p>
    </div>
</div>
<!-- datos personales -->
<div class="form-row px-4 mx-0 mt-4">
    <div class="form-group col-md-6">
        <label>Nombre(s)</label>
        <span class="text-danger <?php echo ($enombre == 1)?"":"d-none"; ?>"> *Introduce nombre(s) del beneficiario</span>
        <input type="text" class='form-control' name='nombre' placeholder='Nombre' value ="<?php if(isset($_POST['nombre'])){echo $_POST['nombre'];} ?>" required>
    </div>
    <div class="form-group col-md-6">
        <label>Apellido(s)</label>
        <span class="text-danger <?php echo ($eapellido == 1)?"":"d-none"; ?>"> *Introduce apellido(s) del beneficiario</span>
        <input type="text" class='form-control' name='apellido' placeholder='Apellido' value ="<?php if(isset($_POST['apellido'])){echo $_POST['apellido'];} ?>" required>
    </div>
</div>    
<div class='form-row px-4 mx-0'>
    <div class='form-group col-md-6'>
        <label>Sexo</label>
        <span class="text-danger <?php echo ($esexo == 1)?"":"d-none"; ?>"> *Selecciona un sexo</span>
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
        <label>Fecha de Nacimiento</label>
        <span id="msgMenorEdadLabel" class="text-danger <?php echo ($edadError == 1)?"":"d-none"; ?>"> *Edad minima 6 años</span>
        <span class="text-danger <?php echo ($edate == 1)?"":"d-none"; ?>"> *Introduce una fecha de nacimiento</span>
        <input type="date" class='form-control' name='date' id="dateBen" placeholder='Fecha de Nacimiento' value ="<?php if(isset($_POST['date'])){echo $_POST['date'];} ?>" required>
    </div>
</div>
<!-- datos demográficos-->
<div class='form-row px-4 mx-0'>
    <div class='form-group col-md-4'>
        <label>País</label>
        <span class="text-danger <?php echo ($epais == 1)?"":"d-none"; ?>"> *Selecciona un país</span>
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
        <span class="text-danger <?php echo ($eestado == 1)?"":"d-none"; ?>"> *Selecciona un estado</span>
        <?php 
        if( isset( $_POST['estado'] ) ){
            $id = $_POST['pais'];
            $es = $_POST['estado'];
            $objDato->buscaEstado($id,$es);
        }else{
        ?>
            <select id="estado" name="estado" class="form-control" required>
                <option disabled selected>Selecciona un Estado</option>
            </select>
        <?php
        }
        ?>
    </div>
    <div class='form-group col-md-4'>
        <label>Ciudad o Localidad</label>
        <span class="text-danger <?php echo ($eciudad == 1)?"":"d-none"; ?>"> *Selecciona una ciudad</span>
        <?php 
        if( isset( $_POST['ciudad'] ) ){
            $id = $_POST['estado'];
            $c = $_POST['ciudad'];
            $objDato->buscaCiudad($id,$c);
        }else{
        ?>
            <select id="ciudad" name="ciudad" class="form-control" required>
                <option selected disabled>Selecciona una Ciudad</option>
            </select>
        <?php
        }
        ?>
    </div>
</div>
<div class='form-row px-4 mx-0'>
    <label>Calle y Número</label>
    <span class="text-danger <?php echo ($ecalle == 1)?"":"d-none"; ?>"> *Introduce calle y número</span>
    <input type="text" class='form-control' name='calle' placeholder='Calle y Número' value ="<?php if(isset($_POST['calle'])){echo $_POST['calle'];} ?>" required>
</div>
<div class='form-row px-4 mx-0'>
    <div class='form-group col-sm-8'>
        <label>Colonia</label>
        <span class="text-danger <?php echo ($ecolonia == 1)?"":"d-none"; ?>"> *introduce una colonia</span>
        <input type="text" class='form-control' name='colonia' placeholder='Colonia' value ="<?php if(isset($_POST['colonia'])){echo $_POST['colonia'];} ?>" required>
    </div>
    <div class='form-group col-sm-4'>
        <label>Código Postal</label>
        <span class="text-danger <?php echo ($ecp == 1)?"":"d-none"; ?>"> *Introduce un código postal</span>
        <input type="text" class='form-control' name='cp' placeholder='Código Postal' value ="<?php if(isset($_POST['cp'])){echo $_POST['cp'];} ?>" required>
    </div>
</div>  
<!-- datos de contacto-->          
<div class='form-row px-4 mx-0'>
    <div class='form-group col-sm-6'>
        <label>Teléfono</label>
        <span class="text-danger <?php echo ($etel == 1)?"":"d-none"; ?>"> *Introduce un teléfono</span>
        <input type="text" class='form-control' name='tel' placeholder='Teléfono' value ="<?php if(isset($_POST['tel'])){echo $_POST['tel'];} ?>" required>
    </div>
    <div class='form-group col-sm-6'>
        <label>Email</label>
        <span class="text-danger <?php echo ($eemail == 1)?"":"d-none"; ?>"> *Introduce un email</span>
        <span class="text-danger <?php echo ($eemailvalido == 1)?"":"d-none"; ?>"> *Introduce un email valido</span>
        <input type="email" class='form-control' name='email' placeholder='Email' value ="<?php if(isset($_POST['email'])){echo $_POST['email'];} ?>" required> 
    </div>
</div>
