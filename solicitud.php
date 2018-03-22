<?php
    include 'mod/header.php';
    $menuBack = "Solicita tu Donación";
    include 'mod/menu.php';
?>
    <!-- contenido -->

    <!-- Titulo principal -->
    <div class="t-shadow-2-black w100 h-25 text-white bg-cover-center" style="background-image:url('/imagenes/fundación/valores.jpg');">
        <div class="w-100 h-100 c-align-middle opacity-green">
                <h1>Solicitud</h1>  
        </div>
    </div>

    <div class="container-fluid p-0 text-center text-white" id="tarjetas">
        <h2 class='text-dark'>¿Con qué te podemos ayudar?</h2>
        <div class="row mb-4 mx-0">
            <div class="col-sm-4 mx-auto mt-2 col-12 ">
                <a href="formulario?dispositivo=brazo">
                    <div class="card" d="protesis">
                        <div class="w-100 c-img bg-primary">
                            <img class=" img-cover-center w-100 h-100" src="../imagenes/fundación/dos-protesis.jpg" alt="Prótesis robótica">
                        </div>
                        <div class="w-100  c-text bg-verde-menu d-flex align-items-center">
                            <p class="w-100 ">Prótesis</p>
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
                            <p class=" w-100">Colchón</p>
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