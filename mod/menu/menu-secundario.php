<?php 
    $redireccion = 'onclick="window.history.back();"'; 
    if($url == "/gracias"){
        $redireccion = 'href="/"'; 
    }elseif($url == "/beneficiarios" && $url2 == "?"){
        $redireccion = 'href="/"'; 
    }elseif($url == "/apadrina" && $url2 == "?"){
        $redireccion = 'href="/"'; 
    }
    echo "<script>console.log('".$redireccion."');</script>";
    echo "<script>console.log('".$url."');</script>";
    echo "<script>console.log('".$url2."');</script>";
?>
<!--regresar-->
<div class="col-auto p-0 h-100 bordes">
    <a class="c-align-middle w-100 h-100 px-4" <?php echo $redireccion; ?> >                    
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
            <p class="mb-0"><?php echo $menuBack; ?></p>
        </div>
        <div class="col-auto  h-100 px-4 bg-verde-menu">
        <a href="/donar" class="w-100 h-100 c-align-middle">
            <span class="text-center text-white">Donar</span>
        </a>
    </div>
</div>