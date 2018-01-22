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
<header>
    <div class="row bg-white" style=" height:50px;margin-top:-50px;position:relative;">
    <?php
        if($url == "/" or $url == "/fundacion" or $url == "/proyectos" or $url == "/galeria" or $url == "/donar"){        
            echo'
            <!--logo-->
            <div class="col-3 col-lg-3 p-0 h-100  d-none d-lg-block bordes">
                <a href="../" class="c-align-middle h-100">                    
                    <img src="/imagenes/fundación/logo.svg" class="" style="height:90%;" />
                </a>                    
            </div>
            <!--/logo-->
            <!--links-->
            <div class="col-12 col-lg-9 h-100 ">
                <div class="row h-100 text-center">
                    <div class="col-3 h-100 p-0 bordes">
                        <a href="/fundacion" class="w-100 h-100 c-align-middle">
                            Fundación     
                        </a>
                    </div>
                    <div class="col-3 h-100 p-0 bordes">
                        <a href="/proyectos" class="c-align-middle w-100 h-100">
                            Proyectos
                        </a>
                    </div>
                    <div class="col-3 h-100 p-0">
                        <a href="/galeria" class="c-align-middle w-100 h-100">
                            Galería
                        </a>
                    </div>
                    <div class="col-3 h-100 p-0 bg-verde-menu">
                    <a href="/donar" class="w-100 h-100 c-align-middle">
                        <span class="text-center text-white">Donar</span>
                    </a>
                </div>
            </div>
        </div>
            ';
        }else{
            echo'
            <!--regresar-->
            <div class="col-auto p-0 h-100 bordes">
                <a class="c-align-middle w-100 h-100 px-4" ';
                    if($url == "/gracias"){
                        echo 'href="/" ';
                    }else{
                       echo 'onclick="window.history.back();"'; 
                    }

                    echo '>                    
                    <i class="fa fa-arrow-left" aria-hidden="true"></i>
                    &nbsp;
                    regresar
                </a>                    
            </div>
            <!--logo-->
            <div class="col-auto  p-0 h-100 bordes">
                <a href="../" class="c-align-middle w-100 h-100 px-4">                    
                <i class="fa fa-home fa-2x fa-fw" aria-hidden="true"></i>
                </a>                    
            </div>
            <!--/logo-->
            <div class="col h-100">
                <div class="row h-100 text-center">
                    <div class="col h-100 p-0 c-align-middle" style="font-weight:bold;">
                        <p class="mb-0">
                            '.$menuBack.'
                        </p>
                    </div>
                    <div class="col-auto  h-100 px-4 bg-verde-menu">
                    <a href="/donar" class="w-100 h-100 c-align-middle">
                        <span class="text-center text-white">Donar</span>
                    </a>
                </div>
            </div>
        </div>
            ';
        }
    ?>

        <!--/links-->                    
    </div><!--row-->
</header>