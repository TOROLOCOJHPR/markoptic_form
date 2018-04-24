<?php
    //header
    include 'mod/header.php';
    include 'mod/menu.php';
?>

<!-- Titulo principal -->
<div class="t-shadow-2-black w100 h-25 text-white bg-cover-center" style="background-image:url('/imagenes/fundación/val2.jpg');">
    <div class="w-100 h-100 c-align-middle opacity-green">
            <h1>Donar</h1> 
    </div>
</div>

<!-- first-block -->
    <div class="container-fluid text-center">
        <h2 class="w-75 mx-auto mt-3">Agradecemos tu participación como donador. Selecciona cualquiera de nuestras opciones y se parte de esta gran causa.</h2>
        <div class="row text-white">
        <!-- botones -->
            <!-- paypal -->
            <div class="col-12 col-lg-6 p-3 "><div class="mx-auto pointer" data-toggle="modal" data-target=".paypal" style="width:300px;height:300px;background-color:#63c62f;"><img src="../imagenes/fundación/paypal.png" class=""style="width:60%;" alt="logo paypal"><p style="font-size:2rem;">paypal</p></div></div>
            <!-- transferencia electronica -->
            <div class="col-12 col-lg-6 p-3 "><div class="mx-auto pointer" data-toggle="modal" data-target=".transferencia" style="width:300px;height:300px;background-color:#337ab7;"><img src="../imagenes/fundación/transferencia.png" class=""style="width:60%;" alt=""><p style="font-size:2rem;">Transferencia Electrónica</p></div></div>
            <!-- motor de pagos Banwire -->
            <div class="col-12 col-lg-6 p-3 "><div class="mx-auto pointer" data-toggle="modal" data-target=".banwire" style="width:300px;height:300px;background-color:#ff8d2c;"><img src="../imagenes/fundación/paypal.png" class=""style="width:60%;" alt=""><p style="font-size:2rem;">Donativo con tarjeta</p></div></div>
            <!-- deposito en efectivo -->
            <div class="col-12 col-lg-6 p-3 "><div class="mx-auto pointer" data-toggle="modal" data-target=".deposito-efectivo" style="width:300px;height:300px;background-color:#25AAE3;"><img src="../imagenes/fundación/deposito.png" class=""style="width:60%;" alt=""><p style="font-size:2rem;">Deposito en efectivos</p></div></div>
        <!-- datos adicionales -->
            <!-- <div class="col-12 bg-secondary mb-3"><h1 class="text-white">Una ves hecho tu donativo tienes dos opciones</h1></div>
            <div class="row d-flex w-100 justify-content-center mb-3 ">
                <button class="btn bg-info text-white btn-lg">Apadrinar a un solicitante</button><button class="btn bg-success ml-1 text-white btn-lg">Solicitar mi conprobante fiscal</button>
            </div>
            <p class="text-center text-dark w-100" style="font-size:1.5rem;">"Unidos todos hacemos más. Tu donación desarrolla tecnología que transforma vidas."</p> -->
        </div>
    </div>    
<!--/contenido-->
<?php 
    //modales de donación
    include "mod/donar/modalPaypal.php";
    include "mod/donar/modalDepositoEfectivo.php";
    include "mod/donar/modalBanwire.php";
    include "mod/donar/modalTransferenciaElectronica.php";
?>
<?php
    include 'mod/footer.php';
?>
<script async type="text/javascript" src="https://sw.banwire.com/checkout.js"></script>
<script async src="/js/motorPago.js"></script>
<script>
    $(document).ready(function(){
        $('#donacion').on('input', function () { 
            this.value = this.value.replace(/[^0-9]/g,'');
        });
    });
</script>
    </body>
</html>