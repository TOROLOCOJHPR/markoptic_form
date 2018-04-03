<?php 
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
    require('back/comprueba.php');
    $metodo = $_SERVER['REQUEST_METHOD'];
    $url2 = "?".$_SERVER['QUERY_STRING'];
    //echo  $url2;
    include 'back/objetos.php'; 
    $objBen = new Beneficiario;
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="/css/bootstrap.min.css">
        <link rel="stylesheet" href="/css/style-fundacion.css">
        <link rel="stylesheet" href="/css/universal.css">
        <title>Editor Beneficiarios</title>
    </head>
    <body class="px-4" style="padding-top:60px;">
        <?php
            if ($metodo == "GET"){ //consulta GET

                if($url2 == "?"){ //muestra buscador de beneficiarios
                    // $redireccion = "/panel";
                    include "mod/panel/formularioBuscador.php";
                }elseif(isset($_GET['b'])){ //muestra datos beneficiario
                    $b = $_GET['b']; //id del beneficiario
                    $f = $_GET['f']; //id de busqueda 
                    // $redireccion = '/editorBeneficiarios?f='.$f;
                    $dato = $objBen->buscaDatosFormulario($b);
                    include 'mod/panel/datosBeneficiarios.php';
                    include 'mod/panel/transacciones.php';
                }elseif(isset($_GET['f'])){
                    // $redireccion = "/panel";
                    $f = $_GET['f'];
                    include "mod/panel/formularioBuscador.php";
                    include 'mod/panel/buscadorBeneficiarios.php';
                }

            }else{ //consulta POST
                
                if($_POST['update'] == 0){ //muestra buscador y lista de beneficiarios
                    // $redireccion = "/panel";
                    $f = $_POST['lista'];
                    include "mod/panel/formularioBuscador.php";
                    include 'mod/panel/buscadorBeneficiarios.php';
                }elseif($_POST['update'] == 1){ //actualiza datos y muestra de nuevo los datos del beneficiario
                    $b = $_POST['id'];
                    $f = $_POST['f']; //id de busqueda 
                    // $redireccion = '/editorBeneficiarios?f='.$_POST['f'];
                    include 'mod/panel/updateBeneficiario.php';
                    $dato = $objBen->buscaDatosFormulario($_POST['id']);
                    include 'mod/panel/datosBeneficiarios.php';
                    include 'mod/panel/transacciones.php';
                }

            }
            include 'mod/panel/menuPanel.php';
        ?>
        <script src="/js/jquery-3.1.1.js"></script>
        <script src="/js/popper.min.js"></script>
        <script src="/js/bootstrap.min.js"></script>
        <script src="/js/panel/editorBeneficiarios.js"></script>
        <script src="https://use.fontawesome.com/8077e15131.js"></script>
        <script src="/js/no-back.js"></script>
    </body>
</html>