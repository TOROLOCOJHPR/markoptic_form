<?php
    $title = "Beneficiarios"; 
    include 'back/objetos.php';
    if( isset($_GET['b']) ){ //datos completos
        $objBen = new beneficiario;
        $id = $_GET['b'];
        $foto = "fotoHistoria";
        $ubicacion = "beneficiados/";
        $result = $objBen->buscaDatosApadrinado($id);
        $edad = $objBen->generaEdadBeneficiario($result['fecNacimiento']);
        $title = "Beneficiario: ".$result['nombre'].' '.$result['apellidos']; 
    }
       
    include 'mod/header.php';
?>

</head>
<body>    
<?php include 'mod/menu.php';?>
    <!-- contenido -->
    <!-- Titulo principal -->
    <?php if(!isset($_GET['b'])){?>
    <div class="text-white bg-cover-center bg-cover-cabecera">
        <h1 class="t-shadow-2-black c-align-middle opacity-green p-5 mb-0">Conoce a nuestros Beneficiarios</h1>
    </div>
    <?php } ?>
    <?php 
        $pagina = "beneficiarios";
        //$objBen = new Beneficiario;
        if ( isset($_GET['b']) ){ //datos completos
            echo '<div class="p-5">';
            include 'mod/beneficiarios/datosCompletos.php';
            echo '</div>';
        } else { //lista de beneficiarios
            include 'mod/beneficiarios/filtro.php';
            include 'mod/beneficiarios/lista.php';
            echo '<div id="resultado"></div>';
        }
    ?>
    <?php include 'mod/footer.php'; ?>
<script src="/js/filtro.js"></script>