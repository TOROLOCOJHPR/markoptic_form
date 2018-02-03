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
    echo'
        <div class="row mx-0" style="">
            <div class="col-12 col-sm-7 col-md-4 px-0">
                <img class="img-cover-center m-auto" src="/imagenes/uploads/beneficiados/'.$result['fotoHistoria'].'" alt="fotografia del beneficiado"/>
            </div>
            <div class="col-12 col-sm-5 col-md-8 p-4 px-5" style="font-size:1.2rem;">
            <strong>Nombre: </strong><span class="text-capitalize">'.$result['nombre'].'&nbsp;'.$result['apellidos'].'</span>
            <br>
            <strong>Edad: </strong>'.$edad.'
            <br>
            <strong>Vive en: </strong><span>'.$result['ciudad']."&nbsp;".$result['estado']."&nbsp;".$result['pais'].'</span>
            <br>
            <strong>Beneficiado con: </strong><span>'.$result['dispositivo'].'</span>
            <br>
            <strong>¿Por qué solicitó? </strong>
            <br>
            <span class="text-first-uppercase">'.ucfirst($result['porque']).'</span>
            </div>
        </div>
    ';       
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
    echo'
        <div id="directorio" class="container-fluid bg-cover-center p-0">
            <div class="row mx-0 text-white text-center">
    ';
    foreach($arregloRandom as $fila){
        $result = $objBen->buscaDatosApadrinado($fila);             
        foreach($result as $row){
        echo'     
                <div class="col-12 col-md-3 col-sm-6 p-0 bg-cover-directorio" style="background-image:url('."'/imagenes/uploads/beneficiados/".$result['fotoHistoria']."'".');height:250px;">
                    <a href="/beneficiarios?b='.$result['id'].'">    
                        <div class="colaborador-descripcion opacity-black">
                            <div class="c-align-middle">
                                <p class="px-3 pt-2 "style="font-size:1.3rem;text-overflow:ellipsis;overflow:hidden;white-space: nowrap;">
                                    <span>'.$result['nombre'].'&nbsp;'.$result['apellidos'].'</span>
                                    <br>
                                    <span style="font-size:1.1rem;">'.$result['dispositivo'].'</span>
                                </p>
                            </div>
                            <div style="font-size:1.3rem;" class="c-align-middle px-2">
                            </div>
                        </div>    
                    </a>
                </div>
            ';
        break 1;
        }   
    }
    echo'
            </div>
        </div>
    ';
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