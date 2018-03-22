<?php
    echo "<script>console.log('".$url."');</script>";
?>
<header id="menu" class="bg-white mx-0 w-100<?php echo ($url != "/")? " fixed-top" : ""; ?>" style=" height:50px;z-index:10;">
    <div class="row mx-0 h-100">

        <!--logo-->
        <div class="col-3 col-lg-3 p-0 h-100  d-none d-lg-block bordes">
            <a href="../" class="c-align-middle h-100">                    
                <img src="/imagenes/fundación/logo.svg" class="" style="height:90%;" />
            </a>                    
        </div>

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

    </div>
</header>
<div class="<?php echo ($url != "/")? "push" : "";?>"> </div>