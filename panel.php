<?php require('back/comprueba.php');?>
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
    <h1 class="text-center mt-4">Panel de Beneficiarios</h1>
    <?php 
        include 'mod/panel/usuarioEstandar.php';
        if($_SESSION['rol'] == "administrador"){ include 'mod/panel/usuarioAdmin.php'; }
    ?> 
    <div id="beforeresultado"></div>
    <div id="resultado"></div>
    <script src="/js/jquery-3.1.1.js"></script>
    <script src="/js/popper.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>    
</body>
</html>