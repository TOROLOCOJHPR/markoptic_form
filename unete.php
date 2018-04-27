<?php 
    include 'mod/header.php';
    $menuBack = "Únete";
    include 'mod/menu.php';
?>
    
    <!-- Titulo principal -->
    <div class="t-shadow-2-black w100 h-25 text-white bg-cover-center" style="background-image:url('/imagenes/fundación/val2.jpg');">
        <div class="w-100 h-100 c-align-middle opacity-green">
            <h1>Únete</h1>
        </div>
    </div>
    <!-- contenido -->

    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-md-6 bg-cover-center p-0" style="height:300px;background-image:url('/imagenes/fundación/residencias.jpg');">
                <div class="capa-green-50 capa-transparent">
                    <a href='/aliados?al=residencias' class='fs-2 t-shadow-2-black w-100 h-100 c-align-middle'>
                        Residencias
                    </a>
                </div>
            </div>
            <!-- <div class="col-12 col-sm-6 c-align-middle" style="height:300px;background-color:#25AAE3;"> -->
            <div class="col-12 col-md-6 bg-cover-center p-0" style="height:300px;background-image:url('/imagenes/fundación/voluntariado.jpg');">
                <div class="capa-blue-50 capa-transparent">
                <a href='/aliados?al=voluntariado' class='fs-2 t-shadow-2-black w-100 h-100 c-align-middle'>
                    <!-- <img src="../imagenes/fundación/voluntarios_w.svg" alt="imagen de voluntariado fundación markoptic"> -->
                    Voluntariado
                </a>
                </div>
            </div>
            <!-- <div class="col-12 col-sm-6 c-align-middle" style="height:300px;background-color:#E92A6F;"> -->
            <div class="col-12 col-md-6 p-0 bg-cover-center" style="height:300px;background-image:url('/imagenes/fundación/bolsa de trabajo.jpg');">
                <div class="capa-pink-50 capa-transparent">
                    <a href='/aliados?al=bolsaTrabajo' class='fs-2 t-shadow-2-black w-100 h-100 c-align-middle'>
                        <!-- <img src="../imagenes/fundación/trabajo_w.svg" alt="imagen de bolsa de trabajo fundación markoptic"> -->
                        Bolsa de Trabajo</span>
                    </a>
                </div>
            </div>
            <!-- <div class="col-12 col-sm-6 c-align-middle" style="height:300px;background-color:#A17AB3;"> -->
            <div class="col-12 col-md-6 bg-cover-center p-0" style="height:300px;background-image:url('/imagenes/fundación/amigos.jpg');">
                <div class="capa-purple-50 capa-transparent">
                    <a href='/aliados' class='fs-2 t-shadow-2-black w-100 h-100 c-align-middle'>    
                        <!-- <img src="../imagenes/fundación/aliados.png" alt="imagen de aliados fundación markoptic" style="width:150px;"> -->
                        Amigos
                    </a>
                </div>
            </div>
            <!-- <div class="col-12 col-sm-6 c-align-middle" style="height:300px;background-color:#A17AB3;">
                <a href='/aliados?al=asesores' class='c-align-middle'>    
                    <img src="../imagenes/fundación/asesores.png" alt="imagen de asesores fundación markoptic" style="width:150px;">
                    &nbsp;Asesores
                </a>
            </div> -->
        </div>
    </div>


    <?php 
        include 'mod/footer.php';
    ?>
    </body>
</html>