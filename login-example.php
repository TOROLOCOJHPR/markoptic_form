<?php 
@session_start();
//variable con la cual se verifica si el usuario inicio sesión
$_SESSION[''] = "";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/style-fundacion.css">
    <link rel="stylesheet" href="/css/universal.css">
    <title>Panel inicio</title>
</head>
<body>
    <div class="w-100 p-3 bg-danger <?php echo (isset($_SESSION['e']))? $SESSION['e']:"d-none" ?>">
        <span class="text-white"><?php echo (isset($_SESSION['e']))? $_SESSION['e'] :""; ?></span>
    </div>
    <!-- titulo -->
    <h3 class="text-center mt-5">Panel Inicio Sesión</h3>
    <!-- formulario -->
    <form class="m-4" action="/back/login.php" method="post">
        <!-- usuario -->
        <div class="form-row">
            <div class="form-group col-md-4 px-0 mx-auto">
                <label>Usuario</label>
                <input class="form-control" type="text" name="user" value="<?php echo (isset($_SESSION['usuario']))? $_SESSION['usuario'] : ""; ?>" required>
            </div>
        </div>
        <!-- contraseña -->
        <div class="form-row">
            <div class="form-group col-md-4 px-0 mx-auto">
                <label>Contraseña</label>
                <input type="password" name="pass" class="form-control" required>
            </div>
        </div>
        <!-- submit y página Markoptic -->
        <div class="form-row">
            <div class="col-md-4 px-0 mx-auto">
                <div class="row mx-0">
                    <div class="col-auto pl-0">
                        <input class=" btn bg-verde-menu text-white p-2 px-4" type="submit" value="Ingresar">
                    </div>
                    <div class="col text-right pr-0">
                        <a class="text-info ml-4s" href="/">Regresar a Fundación Markoptic</a>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <?php session_unset(); ?>
    <script src="/js/jquery-3.1.1.js"></script>
    <script src="/js/no-back.js"></script>
</body>
</html>
