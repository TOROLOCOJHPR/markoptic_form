<?php
    include 'mod/header.php';
    include 'back/objetos.php';
    if(isset($_GET['b'])){
        $menuBack = "Porcentaje de Apadrinación";    
    }else{
        $menuBack = "Apadrina";
    }
    
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
?>
    <style>
    #menu{
        margin-top:50px;
    }
        [id*=circulo]{
        fill:none;
        stroke:orange;
        stroke-width:10px;
        stroke-dasharray:628;
        stroke-dashoffset:628;
    }
    #contCirculo{
        width:100%;
        position:relative;
    }
    #contCirculo svg{
        width:100%;
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
    <div class="t-shadow-2-black w100 h-25 text-white bg-cover-center" style="background-image:url('/imagenes/fundación/valores.jpg');">
        <div class="w-100 h-100 c-align-middle opacity-green">
            <h1>Apadrina</h1>
        </div>
    </div>
    <h3 class="text-center px-5">Gracias a ti,<br> nos estamos renovando,<br> para que puedas tener un mejor servicio<br> y una mejor experiencia</h3>
    <!-- redes sociales -->
    <div class="w-100 text-center mb-1">
                        
                        <span class="fa-stack fa-lg">
                            <a class=" text-white" target="blank" href="https://www.facebook.com/fundacionmarkoptic/">
                                <i class="fa fa-square fa-stack-2x"></i>
                                <i class="fa fa-facebook fa-stack-1x fa-inverse"style="color:#2a9f5b;"></i>
                            </a>
                        </span>
                      
                        
                        <span class="fa-stack fa-lg">
                            <a class=" text-white" target="blank" href="https://twitter.com/FMarkopticAC">
                                <i class="fa fa-square fa-stack-2x"></i>
                                <i class="fa fa-twitter fa-stack-1x fa-inverse"style="color:#2a9f5b;"></i>
                            </a>
                        </span>
                        
                        
                        <span class="fa-stack fa-lg">
                            <a class=" text-white" target="blank" href="https://www.youtube.com/channel/UCIh2HeU_uwMwDYnEw_IMvLQ?view_as=subscriber">
                                <i class="fa fa-square fa-stack-2x"></i>
                                <i class="fa fa-youtube-play fa-stack-1x fa-inverse"style="color:#2a9f5b;"></i>
                            </a>
                        </span>
                        
                        
                        <span class="fa-stack fa-lg">
                            <a class=" text-white" target="blank" href="https://www.linkedin.com/in/fundaci%C3%B3n-markoptic-4b8041153/">
                                <i class="fa fa-square fa-stack-2x"></i>
                                <i class="fa fa-linkedin fa-stack-1x fa-inverse"style="color:#2a9f5b;"></i>
                            </a>
                        </span>
                        
                    </div> 
<div class="row mx-0">
    <?php 
    /*codigo para su posterior uso
        //página de porcentaje de recaudación del  beneficiario
        if(isset($_GET['b'])){
            
            $id = $_GET['b'];
            $cont = 0;
            
            //obtener datos del beneficiario 
            $objBen = new beneficiario;
            $result = $objBen->buscaDatosApadrinado($id);
            
            //desplegar información del beneficiario
            foreach($result as $fila){

                //información del beneficiario
                echo'
                <div class="col-12 col-md-6 c-align-middle flex-column p-3">
                    <div style="height:150px;width:150px;">
                        <img class="img-cover-top" src="/imagenes/uploads/'.$result['foto1'].'" alt="imagen del beneficiario">
                    </div>
                    <p class="">
                    <strong>Nombre</strong><br>
                    <span>'.$result['nombre'].'&nbsp;'.$result['apellidos'].'</span><br>'.
                    '<strong>Dispositivo</strong><br>'.
                    '<span>'.$result['dispositivo'].'</span>'.
                '</div>
                <div class="col-12 col-md-6 c-align-middle">
                ';

                //calcular el porcentaje de recaudación del beneficiario
                $baseDatosDinero = $result['recabado'];
                $precioProtesis = $result['precio'];
                $por = (($baseDatosDinero / $precioProtesis)*100);
                if($por > 100){
                    $por = 100;
                }
                $porciento = number_format($por,2);
                $dashoffset =(628/100)*(100 - $porciento);

                //información del porcentaje recaudado
                echo"<div id='contCirculo'>".
                "<svg height='300' width='300'>".
                "<circle id='circulo".$cont."' cx='50%' cy='50%' r='100' stroke-dasharray='628' stroke-dashoffset='".$dashoffset."'></circle>".
                "<text id='porciento' x='41%' font-size='2.5rem' y='52%' fill='black'>".$porciento."%</text>".
                "</svg>".
                "</div><!--contCirculo-->";
                $cont= $cont+1;
                echo'
                </div>
                ';
                break;   
            }                    
        }else{

          //buscador de beneficiarios
          echo'
            <div class="col-md-4 col-12 mt-3 mx-0" style=" position:absolute;z-index:5;right:0px;">
                <div class="form-group form-inline">
                    <label for="buscaBeneficiario" class="fa fa-search" aria-hidden="true"></label>    
                    <input type="text" id="buscaBeneficiario" class="form-control col ml-3" placeholder="Nombre(s) del beneficiario" e="1"/>
                </div>
                <div class="form-group ml-5 mr-2" style="border:1px solid gray;background-color:white;display:none;overflow:hidden;">
                    <div id="beneficiarioEncontrado"></div>
                </div>
            </div>             
        ';

            //lista aleatoria de beneficiarios a apadrinar
            $cont = 0;
            $mostrar = 10;
            $objBen = new beneficiario();
            $idMax = $objBen->buscaMaxSolicitudes();
            $estatus = 1;
            $idCount = $objBen->buscaCountSolicitudes($estatus);
            if($idCount == 0){
                echo "no se encontraron beneficiarios";
            } 
            elseif($idCount < $mostrar){
                $mostrar = $idCount;
            }
            $arregloRandom = $objBen->generaSolicitudesAleatorias($mostrar,$idMax,$estatus);
            echo "<ul class='w-100 text-center px-0 mt-5'>"; 
            //busca datos apadrinado
            $objBen = new beneficiario;
            foreach($arregloRandom as $fila){
                $result = $objBen->buscaDatosApadrinado($fila);             
                foreach($result as $row){
                    echo'
                    <li style="display:inline-block;" class="ml-2">
                        <a href="apadrina?b='.$result['id'].'">
                            <div class="" style="height:350px;width:250px;border:1px solid gray;margin-top:.8rem;">
                                <div class="mx-auto bg-cover-top" style="height:175px;width:100%;background-image:url('."'/imagenes/uploads/".$result['foto1']."'".');">
                                    <p></p>
                                </div>
                                <div class="p-text-black text-left">
                                    <p class="mb-0 mx-3 mt-1">
                                    <strong>Nombre:</strong>
                                    <br>
                                    <span>'.$result['nombre'].'&nbsp;'.$result['apellidos'].'</span>
                                    <br>
                                    <strong>Solicitud:</strong>
                                    <br>
                                    <span>'.$result['dispositivo'].'</span>
                                    </p>'.
                                '</div>
                            </div>
                        </a>
                    </li>
                ';
                break 1;
                }   
            }
            echo"</ul>";
        }
        */
    ?>  
</div>

<?php
    include 'mod/footer.php';
?>
<script>
    $(document).ready(function(){
        //barra de progreso
        var cont = 0;
        var id;
        $("[id*='circulo']").each(function(){ 
            id = "#circulo" + cont;  
            cont=cont+1;
            var dashoffset = $(id).attr('stroke-dashoffset');  
            $(id).css({
                "stroke-dasharray" : 628,
               "stroke-dashoffset" : dashoffset,
                      "transition" : "3s",
                          "stroke" : "orange"
            });
        });

        //buscador de beneficiarios
        $('#buscaBeneficiario').on('input',function(){
            var f = "buscaBeneficiario";
            var r = "beneficiarioEncontrado";
            var nombre = $(this).val();
           // $("#beneficiarioEncontrado").parent().toggleClass("noDisplay", nombre == "");
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