<?php
    $redireccion = 'onclick="window.history.back();"';
    if($url == "/gracias"){
        $redireccion = 'href="/"';
    }elseif($url == "/beneficiarios" && $url2 == "?"){
        $redireccion = 'href="/"';
    }elseif($url == "/apadrina" && $url2 == "?"){
        $redireccion = 'href="/"';
    }elseif($url == "/formulario"){
        $redireccion = "href=/solicitud";
    }elseif($url == "/solicitud"){
        $redireccion = "href=/";
    }
    // echo "<script>console.log('".$redireccion."');</script>";
    // echo "<script>console.log('".$url."');</script>";
    // echo "<script>console.log('".$url2."');</script>";
?>
<header id="menu" class="bg-white fixed-top mx-0" style=" height:50px; box-shadow:0px 2px 10px black;">
    <div class="row mx-0 h-100">
        <!--regresar-->
        <div class="col-auto p-0 h-100 bordes">
            <a class="c-align-middle w-100 h-100 px-4" <?php echo $redireccion; ?> >
                <i class="fa fa-arrow-left" aria-hidden="true"></i>
                &nbsp;regresar
            </a>
        </div>
        <!--inicio-->
        <div class="col-auto  p-0 h-100 bordes">
            <a href="../" class="c-align-middle w-100 h-100 px-4">
            <i class="fa fa-home fa-2x fa-fw" aria-hidden="true"></i>
            </a>
        </div>
        <!-- nombre página -->
        <div class="col h-100 p-0 c-align-middle" style="font-weight:bold;">
            <p class="mb-0"><?php echo $menuBack; ?></p>
        </div>
        <!-- donar -->
        <div class="col-auto  h-100 px-4 bg-verde-menu">
            <a href="/donar" class="w-100 h-100 c-align-middle">
                <span class="text-center text-white">Donar</span>
            </a>
        </div>
    </div>
</header>
<div class="push"></div>