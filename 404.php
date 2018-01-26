<?php
    $menuBack = "página no encontrada";
    include 'mod/header.php';
?>
    <style>
    #menu{
        margin-top:50px;
    }
    </style>
    <!--menu-->
        <div class="container-fluid fixed-top" id="menu" style=" z-index:10;">
            <?php
                include 'mod/menu.php';
            ?>
        </div><!--/container menu-->
    <!--/menu-->
    <!-- contenido -->
    <!-- Titulo principal -->
    <div class="w100 h-100 text-white bg-cover-center c-align-middle" style="background-image:url('/imagenes/imagen404.jpg');">
        <div class="p-4 w-100 opacity-black-50 c-align-middle">
            <div>
                <div class="c-align-vertical"><span class="fs-3">Error 404</span><img src="imagenes/imagen404.png" style="max-width:65px;"></div>
                <span class="fs-3">Página no encontrada</span>
            </div>
        </div>
    </div>

<?php
    include 'mod/footer.php';
?>
    </body>
</html>