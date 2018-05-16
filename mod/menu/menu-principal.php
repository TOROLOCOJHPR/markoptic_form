<style>
    .pv-d-none{display:none}
</style>
<header style="z-index:10" id="menu" class="w-100 bg-white mx-0 <?php echo ($url != "/")? " fixed-top ctamaño" : ""; ?>">
    <div class="h-100 row mx-0">
        <!--logo-->
        <div class="h-100 col-auto col-md-3 p-0 d-lg-block bordes">
            <a class="h-100 px-2 px-md-0 py-2 c-align-middle" href="/">
                <img style="height:90%" class=" d-none d-md-block" src="/imagenes/fundación/logo.svg"/>
                <svg class="d-block d-md-none px-2" height="45%" viewBox="0 0 576 512" xmlns="http://www.w3.org/2000/svg">
                    <path class="svg-dark" d="M488 312.7V456c0 13.3-10.7 24-24 24H348c-6.6 0-12-5.4-12-12V356c0-6.6-5.4-12-12-12h-72c-6.6 0-12 5.4-12 12v112c0 6.6-5.4 12-12 12H112c-13.3 0-24-10.7-24-24V312.7c0-3.6 1.6-7 4.4-9.3l188-154.8c4.4-3.6 10.8-3.6 15.3 0l188 154.8c2.7 2.3 4.3 5.7 4.3 9.3zm83.6-60.9L488 182.9V44.4c0-6.6-5.4-12-12-12h-56c-6.6 0-12 5.4-12 12V117l-89.5-73.7c-17.7-14.6-43.3-14.6-61 0L4.4 251.8c-5.1 4.2-5.8 11.8-1.6 16.9l25.5 31c4.2 5.1 11.8 5.8 16.9 1.6l235.2-193.7c4.4-3.6 10.8-3.6 15.3 0l235.2 193.7c5.1 4.2 12.7 3.5 16.9-1.6l25.5-31c4.2-5.2 3.4-12.7-1.7-16.9z"></path>
                </svg>
            </a>
        </div>
        <!--links-->
        <div class="col col-lg-9 h-100 ">
            <div class="row h-100 text-center">
                <div class="col-3 h-100 p-0 bordes">
                    <a href="/fundacion" class="w-100 h-100 c-align-middle text-dark">
                        Fundación
                    </a>
                </div>
                <div class="col-3 h-100 p-0 bordes">
                    <a href="/proyectos" class="c-align-middle w-100 h-100 text-dark">
                        Proyectos
                    </a>
                </div>
                <div class="col-3 h-100 p-0">
                    <a href="/galeria" class="c-align-middle w-100 h-100 text-dark">
                        Galería
                    </a>
                </div>
                <div class="col-3 h-100 p-0 bg-verde-menu">
                    <a href="/donar" class="w-100 h-100 c-align-middle text-dark">
                        <span class="text-center text-white">Donar</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="<?php echo ($url != "/")? "push" : "";?>"> </div>