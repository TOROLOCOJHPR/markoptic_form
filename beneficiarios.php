<?php
    $title = "Beneficiarios";
    include 'back/objetos.php';
    include 'mod/header.php';
?>

</head>
<body>    
<?php include 'mod/menu.php';?>
    <!-- contenido -->
    <!-- Titulo principal -->
    <div class="text-white bg-cover-center bg-cover-cabecera">
        <h1 class="t-shadow-2-black c-align-middle opacity-green p-5 mb-0">Conoce a nuestros Beneficiarios</h1>
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