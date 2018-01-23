<?php
    //header
    include 'mod/header.php';
    $menuBack = "Gracias";
    if(isset($_GET['solicitud'])){     
    }else{
        header('Location: ../');
    }
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

<!--push-down-->
<div class="" style="height:50px;position:relative;"></div>
<!--/push-down-->
<!-- Titulo principal -->
<div class="t-shadow-2-black w100 h-25 text-white bg-cover-center" style="background-image:url('/imagenes/fundación/valores.jpg');">
    <div class="w-100 h-100 c-align-middle opacity-green text-center">
        <h1>Gracias</h1>
    </div>
</div>
<?php
    if($_GET['solicitud'] == 'exito'){
        echo'
        <div class="w-100 text-center p-4">
            <img class="img-fluid" src="/imagenes/respuesta heart.svg" alt="solicitud exitosa">
        </div>
        ';
    }else{
        echo'
            <h2 class="text-center">Disculpa, algo salio mal, inténtalo de nuevo más tarde</h2>
        ';
    }
?>
<!--footer-->
<?php
    include 'mod/footer.php';
?>
<!--/footer-->
    <script src="/js/js-fundacion-proyectos.js"></script>
    </body>
</html>