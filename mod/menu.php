<?php

//verificamos si existe alguna redirección
if( isset($_SERVER['HTTP_REFERER']) ){
    //verificamos si el protocolo es http o https
    if( isset($_SERVER['HTTPS']) ){ $h =  $_SERVER['HTTPS']; } else{ $h = "http://"; }
    //concatenamos el protocolo con el nombre del dominio
    $url = $h.$_SERVER['SERVER_NAME'];
    //guardamos la redirección de la página
    $cadena = $_SERVER['HTTP_REFERER'];
    //especificamos el valor que deseamos encontrar
    $subcadena = "?"; 
    //localicamos en que posición se haya la $subcadena
    $posicionsubcadena = strpos ($cadena, $subcadena); 
    if($posicionsubcadena > 0){
        //eliminamos variables get en caso de que las contenga
        $final = substr ($cadena,0,$posicionsubcadena); 
        $refer = str_replace($url,"",$final);
    }else{
        $refer = str_replace($url,"",$cadena);
    }

 /*   echo $cadena;
    echo "<br>".$subcadena;
    echo "<br>".$refer;
    echo "<br>".$posicionsubcadena;*/
}

//guardamos la dirección despues del dominio a la que hemos accedido
$url = $_SERVER['REQUEST_URI'];
//guardamos variables url
$url2 = "?".$_SERVER['QUERY_STRING'];
//eliminamos las variables 
$url = str_replace($url2,"",$url);

?>
<style>
#menu a{
    color:black;
}
</style>

<?php
    if($url == "/" or $url == "/fundacion" or $url == "/proyectos" or $url == "/galeria" or $url == "/donar"){        
        include 'mod/menu/menu-principal.php';
    }else{
        include 'mod/menu/menu-secundario.php';
    }
?>