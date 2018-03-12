<?php 
    require 'back/comprueba.php';
    include 'back/objetos.php';
    $message = "";
    //verificamos el método de acceso
    $metodo = $_SERVER['REQUEST_METHOD'];
    if( $metodo == 'POST' ){
        //obtenemos la extensión del archivo cargado
        $tmp = explode(".", $_FILES['csv']['name']);
        $imageFileType = end($tmp);
        //comprobamos que sea siempre un archivo csv
        if($imageFileType != "csv"){
            $message = "Por favor carga un archivo csv";
        }else{
            //creamos un nombre unico para el archivo
            $fecha = date("d-m-Y-H-i-s");
            $name = "recabado-".$fecha.".csv";
            $ruta = "files/csv/".$name;
            move_uploaded_file($_FILES['csv']['tmp_name'],$ruta);
            if( file_exists($ruta) ){
                //creamos las transacciones a insertar en la base de datos
                $objBen = new Beneficiario;
                $message = $objBen->creaTransacciones($name,$ruta);
            }else{
                $message = "Por favor carga un archivo csv";
            }
            // insertamos datos en la base de datos
            //$objBen->insertTransacciones($sql);
        }
    }
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
    <title>Sistema Apadrinamiento</title>
</head>
<body class="px-4">
<?php 
   // if($metodo == "GET"){
?>
    <h3 class="text-center">Sistema de apadrinamiento</h3>
    <form method="post" action="" enctype="multipart/form-data">
        <input type="file" name="csv">
        <br>
        <input class="btn bg-verde-menu text-white mt-2" type="submit" value="actualizar">
    </form>
<?php
   // }
    if($metodo == "POST"){
        echo $message;
    }
?>
<script type="text/javascript" src="https://sw.banwire.com/checkout.js"></script>
    <script src="/js/jquery-3.1.1.js"></script>
</body>
</html>