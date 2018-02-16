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
    <?php 
        //página de porcentaje de recaudación del  beneficiario
        if(isset($_GET['b'])){
            include 'mod/apadrinamiento/datosCompletos.php';
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
            include 'mod/apadrinamiento/lista.php';
        }
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