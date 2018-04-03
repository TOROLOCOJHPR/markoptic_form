<?php 
    require 'back/comprueba.php';
    include 'back/objetos.php';
    /*$entrada = array("a" => "verde", "rojo", "b" => "verde", "azul", "rojo");
    $resultado = array_unique($entrada);
    print_r($resultado);*/
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
                $r = $objBen->creaTransacciones($name,$ruta);
                $message = ($r[0] == 1)? "Inserción Satisfactoria" : "Inserción Fallida";
                $message = $message."<br>Filas insertadas: ".$r[1];
            }else{
                $message = "Por favor carga un archivo csv";
            }
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
    <body class="px-4" style="padding-top:70px;">
    <?php include 'mod/panel/menuPanel.php'; ?>
        <!-- <h3 class="text-center">Sistema de apadrinamiento</h3> -->
        <form method="post" action="" enctype="multipart/form-data">
            <input type="file" name="csv">
            <br>
            <input class="btn bg-verde-menu text-white mt-2" type="submit" value="actualizar">
        </form>
        <p class="text-info"><?php echo ($metodo == "POST")? $message : ""; ?></p>

        <!-- scripts -->
        <script type="text/javascript" src="https://sw.banwire.com/checkout.js"></script>
        <script src="/js/jquery-3.1.1.js"></script>
        <script src="https://use.fontawesome.com/8077e15131.js"></script>
        <script src="/js/no-back.js"></script>
    </body>
</html>