<header id="menu" class="bg-light w-100 mx-0 <?php echo ($url != "/")? " fixed-top ctamaño" : ""; ?>" style="z-index:10">
    <div class="h-100 row mx-0">
        <!--logo-->
        <div class="h-100 col-4 col-md-3 p-0 bordes">
            <a class="h-100 py-1 d-flex align-items-center" href="/">
                <img style="max-height:95%;width:80%" class="mx-auto" src="/img/logo.svg"/>
            </a>
        </div>
        <!--links-->
        <div class="col col-lg-9 h-100 ">
            <div class="row h-100 text-center">
                <div class="col h-100 p-0 bordes">
                    <a href="/fundacion" class="w-100 h-100 c-align-middle text-dark">
                        Fundación
                    </a>
                </div>
                <div class="col h-100 p-0 bordes">
                    <a href="/proyectos" class="c-align-middle w-100 h-100 text-dark">
                        Proyectos
                    </a>
                </div>
                <div class="col h-100 p-0">
                    <a href="/galeria" class="c-align-middle w-100 h-100 text-dark">
                        Galería
                    </a>
                </div>
                <div class="col h-100 p-0 d-none d-md-block bg-verde-menu">
                    <a href="/donar" class="w-100 h-100 c-align-middle text-dark">
                        <strong class="text-center text-white">Donar</strong>
                    </a>
                </div>
            </div>
        </div>
        <!-- <div class="col-12 d-block d-md-none bg-danger print" style="margin-top:60px;">
            inicio
        </div> -->
    </div>
</header>
<div class="<?php echo ($url != "/")? "push" : "";?>"> </div>

<!-- <a href="/donar" class="bg-verde-menu position-fixed d-flex align-items-center d-md-none border border-left-0 text-white text-center p-2 top-btn-flotantes" style="z-index:9">
        donar
</a> -->