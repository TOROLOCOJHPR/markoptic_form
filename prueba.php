<?php

    require 'inc/objetos/imagen.php';

    $objImg = new Imagen;

    $objImg->setIdSolicitud("2116");
    
    for($i=1; $i<=3; $i++){
        $getFile="foto".$i;
        $objImg->setFoto($_FILES[$getFile]);
        $objImg->crea();
    }

    // $ruta = $objImg->getRuta();
    // $objImg->setFoto( $_FILES["foto1"] );
    // $objImg->crea();
    
?>
<form method="post" enctype='multipart/form-data'>
    <input type="file" name="foto1" id=""><br>
    <input type="file" name="foto2" id=""><br>
    <input type="file" name="foto3" id=""><br>
    <input type="submit" value="enviar">
</form>