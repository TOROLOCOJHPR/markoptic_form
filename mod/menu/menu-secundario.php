<?php
    $redireccion = 'onclick="window.history.back();"';
    if($url == "/gracias"){
        $redireccion = 'href="/"';
    }elseif($url == "/beneficiarios" && $url2 == "?"){
        $redireccion = 'href="/"';
    }elseif($url == "/apadrina" && $url2 == "?"){
        $redireccion = 'href="/"';
    }elseif($url == "/apadrina" && $url2 != "?"){
        $redireccion = 'href="/apadrina"';
    }elseif($url == "/formulario"){
        $redireccion = "href=/solicitud";
    }elseif($url == "/solicitud"){
        $redireccion = "href=/";
    }
    echo "<script>console.log('".$redireccion."');</script>";
    echo "<script>console.log('".$url."');</script>";
    echo "<script>console.log('".$url2."');</script>";
?>
<header id="menu" class="bg-white fixed-top mx-0" style=" height:50px;">
    <div class="row mx-0 h-100">
        <!--regresar-->
        <div class="col-auto p-0 h-100 bordes">
            <a class="c-align-middle w-100 h-100 px-4 px-md-2" <?php echo $redireccion; ?> >
                <i class="fa fa-arrow-left mr-md-2" aria-hidden="true"></i>
                <span class="d-none d-md-inline-block">regresar</span>
            </a>
        </div>
        <!--inicio-->
        <div class="col-auto  p-0 h-100 bordes">
            <a class="c-align-middle w-100 h-100 px-2 px-md-2" href="../">
            <i class="fa fa-home fa-2x fa-fw" aria-hidden="true"></i>
            </a>
        </div>
        <!-- nombre página -->
        <div class="col h-100 p-0 c-align-middle" style="font-weight:bold;">
            <p class="mb-0"><?php echo $menuBack; ?></p>
        </div>
        <!-- donar -->
        <div class="col-auto  h-100 px-0 bg-verde-menu">
            <a href="/donar" class="w-100 h-100 px-3 px-md-4 c-align-middle">
                <span class="text-center text-white">Donar</span>
            </a>
        </div>
    </div>
</header>
<div class="push"></div>