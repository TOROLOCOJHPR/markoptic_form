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
    <div class="w100 h-100 text-white bg-cover-center" style="background-image:url('/imagenes/sad.jpg');">
        <div class="w-100 h-100 c-align-middle text-center">
            <h1>Felicidades lo lograste  &nbsp;.(^-^*).<br><small>No entiendo como lo hacen \(o_o)/</small></h1>
        </div>
    </div>

<?php
    include 'mod/footer.php';
?>
    </body>
</html>