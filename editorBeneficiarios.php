<?php 
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
    require('back/comprueba.php');
    //include 'back/conexion.php';
    include 'back/objetos.php'; 
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
            $metodo = $_SERVER['REQUEST_METHOD'];
            $url = $_SERVER['REQUEST_URI'];
            //guardamos variables url
            $url2 = "?".$_SERVER['QUERY_STRING'];
            //eliminamos las variables
            $url = str_replace($url2,"",$url);
            $objBen = new Beneficiario;
            $redireccion = "/panel";
            if($metodo == "GET"){
                //buscar datos del beneficiario seleccionado
                if(isset($_GET['b'])){
                    $b = $_GET['b'];
                    $f = $_GET['f'];
                    $redireccion = '/editorBeneficiarios?f='.$f;
                    $dato = $objBen->buscaDatosFormulario($b);
                    include 'mod/panel/datosBeneficiarios.php';
                    include 'mod/panel/transacciones.php';
                // mostrar formulario de busqueda
                }elseif( isset($_GET['f']) ) {
                    $f = $_GET['f'];
                    include "mod/panel/formularioBuscador.php";
                    include 'mod/panel/buscadorBeneficiarios.php';
                }else{
                    include "mod/panel/formularioBuscador.php";
                }
            }else{
                // mostrar lista de beneficiarios
                if( isset($_POST['lista']) ){
                    $f = $_POST['lista'];
                    include "mod/panel/formularioBuscador.php";
                    include 'mod/panel/buscadorBeneficiarios.php';
                // actualizar datos del beneficiario
                }elseif(isset($_POST['update'])){
                    $redireccion = '/editorBeneficiarios?f='.$_POST['f'];      
                    include 'mod/panel/updateBeneficiario.php';
                    $dato = $objBen->buscaDatosFormulario($_POST['id']);
                    include 'mod/panel/datosBeneficiarios.php';
                }
            }
            include 'mod/panel/menuBeneficiario.php';
        ?>
        <script src="/js/jquery-3.1.1.js"></script>
        <script src="/js/popper.min.js"></script>
        <script src="/js/bootstrap.min.js"></script>
        <script src="/js/panel/editorBeneficiarios.js"></script>
        <script src="https://use.fontawesome.com/8077e15131.js"></script>
        <script>
            $(document).ready(function(){
                window.location.hash="no-back-button";
                window.location.hash="Again-No-back-button" //chrome
                window.onhashchange=function(){window.location.hash="no-back-button";}
            });
        </script>
    </body>
</html>