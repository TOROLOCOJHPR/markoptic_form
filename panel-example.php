<?php require('back/comprueba.php');
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
    <title>Panel Beneficiarios</title>
</head>
<body>
    <header id="menu" class="row mx-0 text-center menu p-2">
        <div class="col c-align-middle bordes p-0">
            <span class="fs-1-5">Panel Edición</span>
        </div>
        <div class="col-auto c-align-middle bordes p-0">
            <span class="px-2"><?php echo $_SESSION['usuario']; ?></span>
        </div>
        <div class="col-auto c-align-middle p-0">
            <a class="w-100 h-100 px-3 px-md-2 c-align-middle" href="/back/cerrarSesion">
                <span class="d-none d-md-inline-block mr-2">Cerrar Sesión</span>
                <i class="fa fa-power-off" aria-hidden="true"></i>
            </a>
        </div>
    </header>
    <!-- <h1 class="text-center mt-4">Panel de Beneficiarios</h1> -->
    <?php
        include 'mod/panel/usuarioEstandar.php';
        //nivel de acceso al panel
        if($_SESSION[''] == "administrador"){ include 'mod/panel/usuarioAdmin.php'; }
    ?>
    <script src="/js/jquery-3.1.1.js"></script>
    <script src="/js/popper.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="https://use.fontawesome.com/8077e15131.js"></script> 
    <script src="/js/no-back.js"></script>  
    <script>
        $(document).ready(function(){
            $('#reporte').click(function(){
                console.log('reporte');
                //location.href = "/back/generaExcel.php";
                $.ajax({
                   url: "",
                   beforeSend: function() {
                   location.href = "/back/generaExcel.php";
                   },
                   success: function (html) {
                    }
                });
            });
        });
    </script>   