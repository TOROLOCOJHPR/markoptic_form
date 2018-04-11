<?php
    echo "<script>console.log('".$url."');</script>";
?>
<header id="menu" class="bg-white mx-0 w-100<?php echo ($url != "/")? " fixed-top" : ""; ?>" style=" height:50px;z-index:10;">
    <div class="row mx-0 h-100">

        <!--logo-->
        <div class="col-auto col-md-3 p-0 h-100  d-lg-block bordes">
            <a class="c-align-middle h-100 px-2 px-md-0" href="/";>                    
                <img class="d-none d-md-block" style="height:90%;" src="/imagenes/fundación/logo.svg"/>
                <i class="fa fa-home fa-2x fa-fw d-block d-md-none" aria-hidden="true"></i>                
            </a>
        </div>

        <!--links-->
        <div class="col col-lg-9 h-100 ">
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