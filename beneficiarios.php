<?php
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
    include 'mod/header.php';
    include 'back/conexion.php';
    include 'back/objetos.php';
    $menuBack = "Beneficiados";
?>
    <style>
    #menu{
        margin-top:50px;
    }
    </style>
    <!--push-down-->
        <div class=""style="height:50px;position:relative;"></div>
    <!--/push-down-->
    <!--menu-->
        <div class="container-fluid fixed-top" id="menu" style=" z-index:10;">
            <?php
                include 'mod/menu.php';
            ?>
        </div><!--/container menu-->
    <!--/menu-->
    <!-- contenido -->
    <!-- Titulo principal -->
    <div class="w100 h-25 text-white bg-cover-center" style="background-image:url('/imagenes/fundación/valores.jpg');">
        <div class="w-100 h-100 c-align-middle opacity-green">
            <h1 class="t-shadow-2-black">Beneficiados</h1>
        </div>
    </div>

<?php 
/*codigo para su posterior uso*/
        //buscador de beneficiarios
       /* echo'
            <div class="col-md-4 col-12 mt-3 mx-0" style=" position:absolute;z-index:5;right:0px;">
                <div class="form-group form-inline">
                    <label for="buscaBeneficiario" class="fa fa-search" aria-hidden="true"></label>    
                    <input type="text" id="buscaBeneficiario" class="form-control col ml-3" placeholder="Nombre(s) del beneficiario" e="2"/>
                </div>
                <div class="form-group ml-5 mr-2" style="border:1px solid gray;background-color:white;display:none;overflow:hidden;">
                    <div id="beneficiarioEncontrado"></div>
                </div>
            </div>             
        ';*/
if( isset($_GET['b']) ){
    //datos del beneficiado
    $id = $_GET['b'];
    $objBen = new beneficiario;
    $result = $objBen->buscaDatosApadrinado($id);
    $edad = $objBen->generaEdadBeneficiario($result['fecNacimiento']);  
    include 'mod/beneficiarios/datosCompletos.php'; 
}else{
    //lista aleatoria de beneficiarios a apadrinar
    $cont = 0;
    $mostrar = 10;
    $objBen = new beneficiario();
    $idMax = $objBen->buscaMaxSolicitudes();
    $estatus = 3;
    $idCount = $objBen->buscaCountSolicitudes($estatus);
    if($idCount == 0){
        echo "no se encontraron beneficiarios";
    } 
    elseif($idCount < $mostrar){
        $mostrar = $idCount;
    }
    $arregloRandom = $objBen->generaSolicitudesAleatorias($mostrar,$idMax,$estatus);
    $objBen = new beneficiario;
    include 'mod/beneficiarios/lista.php';
}
?> 
<?php
    include 'mod/footer.php';
?>
    <script>
    $(document).ready(function(){

        //buscador de beneficiarios
        $('#buscaBeneficiario').on('input',function(){
            var f = "buscaBeneficiario";
            var r = "beneficiarioEncontrado";
            var nombre = $(this).val();
            //$("#beneficiarioEncontrado").parent().toggleClass("noDisplay", nombre == "");
            if(nombre == ""){
                $('#beneficiarioEncontrado').parent().css({"display":"none"});
            }else{
                $('#beneficiarioEncontrado').parent().css({"display":"block"});
            }
            var estatus = $(this).attr('e');
            var parametros = {
            "formulario" : f,
                "nombre" : nombre,
               "estatus" : estatus
            }
            ajax(parametros,r);
        });
    });
    </script>
    </body>
</html>