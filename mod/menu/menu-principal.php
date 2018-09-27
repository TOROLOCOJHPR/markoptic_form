<nav id="menu" class="bg-light <?php echo ($url != "/")? " fixed-top" : ""; ?>">
    <div class="row mx-0">
        <!--logo-->
        <div class="col-4 col-md-3 p-0 bordes">
            <a class="w-100 h-100 c-align-center" href="/">
                <img class="logo" src="/img/logo.svg"/>
            </a>
        </div>
        <!--links-->
        <div class="col p-0 bordes">
            <a href="/fundacion" class="w-100 h-100 c-align-middle">
                Nosotros
            </a>
        </div>
        <div class="col p-0 bordes">
            <a href="/proyectos" class="w-100 h-100 c-align-middle">
                Proyectos
            </a>
        </div>
        <div class="col p-0">
            <a href="/galeria" class="w-100 h-100 c-align-middle">
                Galería
            </a>
        </div>
        <div class="col p-0 d-none d-md-block bg-verde-menu">
            <a href="/donar" class="w-100 h-100 c-align-middle text-white">
                <strong>Donar</strong>
            </a>
        </div>
    </div>
</nav>
<div class="<?php echo ($url != "/")? "push" : "";?>"> </div>

<!-- <a href="/donar" class="bg-verde-menu position-fixed d-flex align-items-center d-md-none border border-left-0 text-white text-center p-2 top-btn-flotantes" style="z-index:9">
        donar
</a> -->