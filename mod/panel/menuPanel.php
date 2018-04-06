<?php
    $url = $_SERVER['REQUEST_URI'];
    //guardamos variables url
    $url2 = "?".$_SERVER['QUERY_STRING'];
    //eliminamos las variables 
    $url = str_replace($url2,"",$url);
    $metodo = $_SERVER['REQUEST_METHOD'];
    $redireccion = '/panel';
    if($url == "/editorBeneficiarios"){
        if(isset($_GET['b'])){ //muestra datos beneficiario
            $f = $_GET['f']; //id de busqueda
            $redireccion = '/editorBeneficiarios?f='.$f;
        }
    }/*elseif($url == "/editorUsuarios"){
        if($metodo == "POST"){
            $redireccion = '/editorUsuarios';
        }
    }*/

    echo "<script>console.log('".$redireccion."');</script>";
    echo "<script>console.log('".$url."');</script>";
    echo "<script>console.log('".$url2."');</script>";
?>
<div id="menu" class="row mx-0 fs-1-5 p-2 mb-5 fixed-top bg-light" style="box-shadow: 2px 2px 5px 0px rgba(0,0,0,0.75);z-index:20;margin-bottom:55px;">
    <div class="col-auto bordes c-align-vertical">
        <a href="<?php echo $redireccion; ?>" class="text-dark">
            <i class="fa fa-arrow-left mr-2" aria-hidden="true"></i>
            <span>regresar</span>
        </a>
    </div>
    <div class="col-auto bordes p-0">
        <a href="/panel" class="text-dark px-2 c-align-middle w-100 h-100">
            <i class="fa fa-home fa-2x fa-fw" aria-hidden="true"></i>
        </a>
    </div>
    <div class="col  c-align-middle text-center">
        <strong><?php echo $menuBack; ?></strong>
    </div>
</div>