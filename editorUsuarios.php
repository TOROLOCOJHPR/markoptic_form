<?php
    require('back/comprueba.php');
    include 'back/objetos.php';
    $menuBack = "Usuarios";
    include 'mod/panel/editorUsuarios/excepciones.php';
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
    <title>Editor Usuarios</title>
</head>
<body class="px-4" style="padding-top:70px;">
    <?php
        include "mod/panel/menuPanel.php";
    ?>
    <div class="p-3 mb-2 bg-success<?php echo (isset($_GET['m']) && $metodo == "GET")? "" : " d-none";?>">
        <label class="text-white m-0">Cambios realizados Satisfactoriamente</label>
    </div>
    <div class="p-3 mb-2 bg-danger text-white<?php echo (isset($m) && $metodo == "POST") ? "" : " d-none"; ?>">
        <label class="text-white m-0"><?php echo (isset($message))?$message:""; ?></label>
        <div class="mt-2<?php echo (isset($restaurar) && $metodo == "POST") ? "" : " d-none"; ?>">
            <form class="form-row" method="post">
                <div class="form-inline col-auto">
                    <label class="mr-2" >no</label><input type="radio" name="restore" value="0">
                    <label class="mx-2" >si</label><input type="radio" name="restore" value="1">
                </div>
                <div class="form-group col-md-3 mb-0">
                    <input class="btn bg-light text-dark" type="submit" value="Restaurar">
                </div>
                <input type="hidden" name="form" value="restaurar"/>
                <input type="hidden" name="restaurarId" value="<?php echo (isset($e[0]['id']))? $e[0]['id'] : ""; echo (isset($_POST['restaurarId']))? $_POST['restaurarId'] : ""; ?>"/>
                <input type="hidden" name="restaurarPass" value="<?php echo (isset($_POST['creaPass']))? $_POST['creaPass'] : ""; echo (isset($_POST['restaurarPass']))? $_POST['restaurarPass'] : ""; ?>"/>
                <input type="hidden" name="restaurarRol" value="<?php echo (isset($_POST['creaRol']))? $_POST['creaRol'] : ""; echo (isset($_POST['restaurarRol']))? $_POST['restaurarRol'] : ""; ?>"/>
            </form>
        </div>
    </div>
    <?php
        include 'mod/panel/editorUsuarios/lista.php';
    ?>
    <script src="/js/jquery-3.1.1.js"></script>
    <script src="/js/popper.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="https://use.fontawesome.com/8077e15131.js"></script>
    <script src="/js/no-back.js"></script>
</body>
</html>