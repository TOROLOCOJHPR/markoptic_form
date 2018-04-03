<!-- Crea Usuario -->
<h5 class="text-info ml-1">Crear Usuario</h5>
<form class="form-row mx-0" method ="post">
    <div class="form-group col-md-3">
        <label>Usuario</label>
        <input class="form-control" type="text" name="creaUsuario" value="<?php ?><?php echo (isset($_POST['creaUsuario']))? $_POST['creaUsuario'] : ""; ?>" placeholder="Usuario" required/>    
    </div>
    <div class="form-group col-md-3">
        <label>contraseña</label>
        <input class="form-control" type="password" name="creaPass" value="<?php echo (isset($_POST['creaPass']))? $_POST['creaPass'] :""; ?>" placeholder="Contraseña" required/>    
    </div>
    <div class="form-group col-md-3">
        <label>rol</label>
        <select class="form-control" name="creaRol" required>
            <option class="text-muted" value="">Selecciona un rol</option>
        <?php
            $roles = $objBen->buscaRoles();
            foreach($roles as $row){
        ?>
            <option value="<?php echo $row['id'] ;?>" <?php if(isset($_POST['creaRol'])){ echo ($_POST['creaRol'] == $row['id'] )? "selected" : ""; } ?> > <?php echo $row['nombre'];?> </option>
        <?php
            }
        ?>
        </select>
    </div>
    <div class="form-group col-md-3 align-self-end">
        <input class="btn text-white bg-verde-menu" type="submit" value="Continuar">
    </div>
    <input type="hidden" name="form" value="crea"/>
</form>
<hr/>

<?php
// busca todos los usuarios disponibles
$usuarios = $objBen->buscaUsuarios();
?>

<!-- modifica contraseña usuarios -->
<h5 class="text-info ml-1">Cambiar Contraseña</h5>
<form class="form-row mx-0" method="post">
    <div class="form-group col-md-3">
        <label>Usuarios</label>
        <select class="form-control" name="cambiaId" required>
        <option class="text-muted" value="">Selecciona un usuario</option>
        <?php
            foreach($usuarios as $row){
                ?>
                <option value="<?php echo $row['id']; ?>"><?php echo $row['usuario']; ?></option>
                <?PHP
            }
        ?>
        </select>
    </div>
    <div class="form-group col-md-3">
        <label>Contraseña</label>
        <input class="form-control" type="password" name="cambiaPass" value="<?php echo (isset($_POST['cambiaPass']))? $_POST['cambiaPass'] :""; ?>" placeholder="Contraseña" required/>
    </div>
    <div class="form-group col-md-3">
        <label>Repite Contraseña</label>
        <input class="form-control" type="password" name="cambiaRepPass" value="<?php echo (isset($_POST['cambiaRepPass']))? $_POST['cambiaRepPass'] :""; ?>" placeholder="Repite contraseña" required/>
    </div>
    <div class="form-group col-md-3 align-self-end">
        <input class="btn bg-verde-menu text-white" type="submit" value="Continuar"/>
    </div>
    <input type="hidden" name="form" value="cambia"/>
</form>
<hr/>

<!-- elimina usuario -->
<h5 class="text-danger ml-1">Eliminar Usuario</h5>
<form class="form-row mx-0" method="post">
    <div class="form-group col-md-3">
        <label>Usuarios</label>
        <select class="form-control" name="eliminaId" required>
            <option class="text-muted" value="">Selecciona un usuario</option>
        <?php
            foreach($usuarios as $row){
                ?>
                <option value="<?php echo $row['id']; ?>"><?php echo $row['usuario']; ?></option>
                <?PHP
            }
        ?>
        </select>
    </div>
    <div class="form-inline col-auto">
        <label class="px-2">Confirmar</label>
        <input class="mx-2" type="checkbox" value="1" required>
    </div>
    <div class="form-group col-md-3 align-self-end">
        <input class="btn bg-verde-menu text-white" type="submit" value="Continuar"/>
    </div>
    <input type="hidden" name="form" value="elimina"/>
</form>