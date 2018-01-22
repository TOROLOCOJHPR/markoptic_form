<?php
    include 'mod/header.php';
    $menuBack = "Solicita tu Donación";
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
    <div class="t-shadow-2-black w100 h-25 text-white bg-cover-center" style="background-image:url('/imagenes/fundación/valores.jpg');">
        <div class="w-100 h-100 c-align-middle opacity-green">
                <h1>Solicitud</h1>  
        </div>
    </div>
    <!-- <h3 class="text-center px-5">Gracias a ti,<br> nos estamos renovando,<br> para que puedas tener un mejor servicio<br> y una mejor experiencia</h3> -->
    <!-- redes sociales -->
    <!-- <div class="w-100 text-center mb-1">
                        
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
                        
                    </div>  -->
    <!-- bloque -->

    <div class="container-fluid p-0 text-center text-white" id="tarjetas">
        <h2 class='text-dark'>¿Con que te podemos ayudar?</h2>
        <div class="row mb-4">
            <div class="col-sm-4 mx-auto mt-2 col-12 ">
                <a href="formulario?dispositivo=brazo">
                    <div class="card" d="protesis">
                        <div class="w-100 c-img bg-primary">
                            <img class=" img-cover-center w-100 h-100" src="../imagenes/fundación/dos-protesis.jpg" alt="Prótesis robótica">
                        </div>
                        <div class="w-100  c-text bg-verde-menu d-flex align-items-center">
                            <p class="w-100 ">Prótesis.</p>
                        </div>
                    </div>
                </a>
            </div>
            <!-- dispositivo -->
            <div class="col-sm-4 mx-auto mt-2 col-12">
                <a href="formulario?dispositivo=colchon">
                    <div class="card" d="colchon">
                        <div class="w-100 c-img bg-success">
                            <img class=" img-cover-center w-100 h-100" src="../imagenes/fundación/proy-colchon.jpg" alt="Colchon antiescaras">
                        </div>
                        <div class="w-100 c-text bg-verde-menu d-flex align-items-center">
                            <p class=" w-100">Colchón.</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>    
<?php
    include 'mod/footer.php';
?>
<script>
   /* $('.card').click(function(){
        var d = $(this).attr('d');
        alert(d);
    });*/
</script>
    </body>
</html>