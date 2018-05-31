<?php
    //header
    $title = "Solcitud completada";
    include 'mod/header.php';
    include 'mod/menu.php';
?>

<!-- Titulo principal -->
<?php
    if($_GET['solicitud'] == 'exito'){
        echo'
        <div class="w-100 text-center p-4">
            <img class="img-fluid" src="/img/respuesta heart.jpg" alt="solicitud exitosa">
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