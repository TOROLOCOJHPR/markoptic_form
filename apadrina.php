<?php
    if(!isset($_COOKIE['hide'])){
        setcookie('hide','0');
    }
    include 'back/objetos.php';
    if(isset($_GET['b'])){
        $objBen = new beneficiario;
        $id = $_GET['b'];
        $foto = ($pagina == "beneficiarios")? "fotoHistoria" : "foto1";
        $ubicacion = ($pagina == "beneficiarios")? "beneficiados/" : "";
        $result = $objBen->buscaDatosApadrinado($id);
        $edad = $objBen->generaEdadBeneficiario($result['fecNacimiento']);
        $title = "Apadrina a: ".$result['nombre'].' '.$result['apellidos'];
    }else{
        $title = "Lista de solicitantes";
    }
    include 'mod/header.php';
?>

</head>
<body>

<?php include 'mod/menu.php';?>
    <!-- contenido -->
    <!-- Titulo principal -->
    <?php if(!isset($_GET['b'])){?>
    <div class="t-shadow-2-black text-white bg-cover-center text-center bg-cover-cabecera">
        <h1 class="opacity-green p-5 mb-0">Apadrina un Solicitante</h1>
    </div>
    <?php } ?>
    <?php
        //página de porcentaje de recaudación del  beneficiario
        $pagina = "apadrina";
        //$objBen = new Beneficiario;
        if(isset($_GET['b'])){
            echo '<div class="p-5">';
            include 'mod/beneficiarios/datosCompletos.php';
            echo '</div>';
        }else{
            include 'mod/beneficiarios/filtro.php';
            include 'mod/beneficiarios/lista.php';
            echo '<div id="resultado"></div>';
        }
    ?>

<?php include 'mod/footer.php';?>
<?php if(isset($_GET['b'])){ ?>
    <script type="text/javascript" src="https://sw.banwire.com/checkout.js"></script>
    <script src="/js/barraProgreso.js"></script>
    <script src="/js/motorPago.js"></script>

<?php
    include "mod/donar/modalFinal.php";
    }else{
?>
    <script src="/js/filtro.js"></script>
<?php } ?>
<!-- <script src="/js/no-back.js"></script> -->
    <script>
        $(document).ready(function(){
            // comprobar la variable ocultar modal
            if( $('#tiempoDonaciones').attr('ocultar') == ""){
                var ocultar = "show";
            }else{ 
                if($('#tiempoDonaciones').attr('ocultar') == 0){
                var ocultar = "show";
                }else{
                var ocultar = "hide";
                }
            }
            //iniciar modal
            $('#tiempoDonaciones').modal(ocultar);
        });
        function hideModal(){
            var r = "tiempoDonaciones";
            var parametros ={
                "formulario" : "ocultarModal",
            }
            ajax(parametros,r);
            $('#tiempoDonaciones').modal('hide');
        }
    </script>
    </body>
</html>