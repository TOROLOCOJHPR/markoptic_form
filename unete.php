<?php 
    include 'mod/header.php';
    $menuBack = "Únete";
    include 'mod/menu.php';
?>
    
    <!-- Titulo principal -->
    <div class="t-shadow-2-black w100 h-25 text-white bg-cover-center" style="background-image:url('/img/val2.jpg');">
        <div class="w-100 h-100 c-align-middle opacity-green">
            <h1>Únete</h1>
        </div>
    </div>
    <!-- contenido -->

    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-md-6 bg-cover-center p-0" style="height:300px;background-image:url('/img/residencias.jpg');">
                <div class="capa-green-50 capa-transparent">
                    <a href='/aliados?al=residencias' class='fs-2 t-shadow-2-black w-100 h-100 c-align-middle'>
                        Residencias
                    </a>
                </div>
            </div>
            <div class="col-12 col-md-6 bg-cover-center p-0" style="height:300px;background-image:url('/img/voluntariado.jpg');">
                <div class="capa-blue-50 capa-transparent">
                <a href='/aliados?al=voluntariado' class='fs-2 t-shadow-2-black w-100 h-100 c-align-middle'>
                    Voluntariado
                </a>
                </div>
            </div>
            <div class="col-12 col-md-6 p-0 bg-cover-center" style="height:300px;background-image:url('/img/bolsa_trabajo.jpg');">
                <div class="capa-pink-50 capa-transparent">
                    <a href='/aliados?al=bolsaTrabajo' class='fs-2 t-shadow-2-black w-100 h-100 c-align-middle'>
                        Bolsa de Trabajo</span>
                    </a>
                </div>
            </div>
            <div class="col-12 col-md-6 bg-cover-center p-0" style="height:300px;background-image:url('/img/amigos.jpg');">
                <div class="capa-purple-50 capa-transparent">
                    <a href='/aliados' class='fs-2 t-shadow-2-black w-100 h-100 c-align-middle'>    
                        Amigos
                    </a>
                </div>
            </div>
        </div>
    </div>

    <?php  include 'mod/footer.php'; ?>
    </body>
</html>