<?php  
    $root = $_SERVER['DOCUMENT_ROOT'];
    require ($root.'/panel/inc/excepciones-login.php');
    $title = "Login";
    include ($root.'/mod/header.php');
?>  
    <!-- errores de sesión -->
    <div class="alert bg-danger" <?php echo ($metodo == "GET") ? "style='display:none'" : "" ?>>
        <p class="text-white text-center fs-1-5 mb-0">
            <?php echo $usuario[0]['error'] ?>
        </p>
    </div>
    <!-- titulo -->
    <h3 class="text-center mt-5">Panel Inicio Sesión</h3>
    
    <!-- formulario -->
    <form class="m-4" action="" method="post">
        
        <!-- usuario -->
        <div class="form-row">
            <div class="form-group col-sm-10 col-md-6 col-xl-4 px-0 mx-auto">
                <label>Usuario</label>
                <input 
                    name="user" type="text"
                    class="form-control" required
                    <?php if ( isset( $_POST['user'] ) ) echo "value='".$_POST['user']."'" ?>
                />
            </div>
        </div><!-- usuario -->
        
        <!-- contraseña -->
        <div class="form-row">
            <div class="form-group col-sm-10 col-md-6 col-xl-4 px-0 mx-auto">
                <label>Contraseña</label>
                <input
                    name="pass" type="password"
                    class="form-control" required
                    <?php if(isset($_POST['pass'])) echo "value ='".$_POST['pass']."'" ?>
                />
            </div>
        </div><!-- contraseña -->

        <!-- submit y regreso a página de inicio -->
        <div class="form-row">
            
            <div class="col-12 col-sm-10 col-md-6 col-xl-4 px-0 mx-auto">
                <div class="row mx-0">
                    <div class="col">
                        <a class="text-info ml-4s" href="/">Regresar a Fundación Markoptic</a>
                    </div>
                    <div class="col-auto pr-0">
                        <input class=" btn bg-verde-menu text-white" type="submit" value="Ingresar">
                    </div>
                </div>
            </div>

        </div><!-- submit y regreso a página de inicio -->
    
    </form><!-- formulario -->