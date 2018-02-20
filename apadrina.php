<?php require_once('cms/cms.php'); ?> 
<?php 
    if(!isset($_COOKIE['hide'])){
        setcookie('hide','0'); 
    }
     ?>
    <cms:template title = 'apadrina' order='15'>
        <cms:editable name='textomotivador' label='Texto Motivador' type='text' order='1'/>
    </cms:template>
<?php    
    include 'mod/header.php';
    include 'back/objetos.php';
    if(isset($_GET['b'])){
        $menuBack = "Porcentaje de Apadrinación";    
    }else{
        $menuBack = "Apadrina";
    }
    
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
    <div id="resultado"></div>
</div>

<?php
    include 'mod/footer.php';
?>
<script>
    $(document).ready(function(){
        //centrar texto de porcentaje
        texto();
        $(window).resize(function(){
            texto();
        });
    
        <?php if( $_COOKIE['hide'] == 0 ){ $ocultar = '"show"'; }else{ $ocultar = '"hide"'; } ?>
        
        //iniciar modal
        $('#tiempoDonaciones').modal(<?php echo $ocultar; ?>);
        
        //cantidad minima
        $('.minimo').click(function(){
            console.log('minimo');
            var monto = $(this).attr('m');
            $('#donacion').val(monto);
        });
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
    function texto(){
        var por = ($('#porciento').width()/2);
        var cir = ($('#contPorcentaje').width()/2);
        var pos = cir - por ;
        $('#porciento').attr('x',pos);
    }
    function hideModal(){
        var f = 'ocultarModal';
        var r = "resultado";
        var parametros ={
            "formulario" : f
        }
        ajax(parametros,r);
        $('#tiempoDonaciones').modal('hide');
    }
</script>
    </body>
</html>
<?php COUCH::invoke(); ?>