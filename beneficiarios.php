<?php
    error_reporting(E_ALL);
    ini_set('display_errors', '1');

    include 'mod/header.php';
    // header("Expires: Sat, 01 De enero de 2000 00:00:00 GMT"); 
    // header("Last-Modified: ".gmdate("D, d M Y H:i:s")." GMT"); 
    // header("Cache-Control: post-check=0, pre-check=0",false); 
    // session_cache_limiter("must-revalidate");
    include 'back/objetos.php';
    $menuBack = "Beneficiados";
    include 'mod/menu.php';
?>
    <!-- contenido -->
    <!-- Titulo principal -->
    <div class="w100 h-25 text-white bg-cover-center" style="background-image:url('/imagenes/fundación/valores.jpg');">
        <div class="w-100 h-100 c-align-middle opacity-green">
            <h1 class="t-shadow-2-black">Beneficiados</h1>
        </div>
    </div>
    <?php 
        $pagina = "beneficiarios";
        //$objBen = new Beneficiario;
        if( isset($_GET['b']) ){ //datos completos
            include 'mod/beneficiarios/datosCompletos.php';
        }else{ //lista de beneficiarios
            include 'mod/beneficiarios/filtro.php';
            include 'mod/beneficiarios/lista.php';
        }
    ?>
    <?php
    include 'mod/footer.php';
?>
<script src="/js/filtro.js"></script>