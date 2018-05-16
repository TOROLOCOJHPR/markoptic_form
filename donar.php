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
    <div class="container-fluid text-center ">
        <h2 class="mt-3 mx-2 mx-md-5 text-dark">Agradecemos tu participación como donador. Selecciona cualquiera de nuestras opciones y se parte de esta gran causa.</h2>
        <div class="row text-white">
        <!-- botones -->
            <!-- motor de pagos Banwire -->
            <div class="col-12 col-md-6 col-xl-3 p-3">
                <div class="mx-auto mx-md-0 ml-md-auto mx-xl-auto pointer c-align-middle flex-column" data-toggle="modal" data-target=".banwire" style="background-color:#337ab7;height:300px;max-width:300px">
                    <img src="../imagenes/fundación/banwire.png" class="" style="height:150px;display:block" alt="">
                    <h3>Donativo con tarjeta</h3>
                </div>
            </div>
            <!-- transferencia electronica -->
            <div class="col-12 col-md-6 col-xl-3 p-3">
                <div class="mx-auto mx-md-0 mr-md-auto mx-xl-auto pointer c-align-middle flex-column" data-toggle="modal" data-target=".transferencia" style="background-color:#ff8d2c;height:300px;max-width:300px">
                    <img src="../imagenes/fundación/transferencia.png" class="" style="height:150px;display:block" alt="">
                    <h3>Transferencia Electrónica</h3>
                </div>
            </div>
            <!-- paypal -->
            <div class="col-12 col-md-6 col-xl-3 p-3">
                <div class="mx-auto mx-md-0 ml-md-auto mx-xl-auto pointer c-align-middle flex-column" data-toggle="modal" data-target=".paypal" style="background-color:#63c62f;height:300px;max-width:300px">
                    <img src="../imagenes/fundación/paypal.png" class="" style="height:150px;display:block" alt="logo paypal">
                        <h3>paypal</h3>
                    </div>
                </div>
            <!-- deposito en efectivo -->
            <div class="col-12 col-md-6 col-xl-3 p-3">
                <div class="mx-auto mx-md-0 mr-md-auto mx-xl-auto pointer c-align-middle flex-column" data-toggle="modal" data-target=".deposito-efectivo" style="background-color:#25AAE3;height:300px;max-width:300px">
                    <img src="../imagenes/fundación/deposito.png" class="" style="height:150px;display:block" alt="">
                        <h3>Deposito en efectivos</h3>
                    </div>
                </div>
            </div>
        <!-- datos adicionales -->
            <!-- <div class="col-12 bg-secondary mb-3"><h1 class="text-white">Una ves hecho tu donativo tienes dos opciones</h1></div>
            <div class="row d-flex w-100 justify-content-center mb-3 ">
                <button class="btn bg-info text-white btn-lg">Apadrinar a un solicitante</button><button class="btn bg-success ml-1 text-white btn-lg">Solicitar mi conprobante fiscal</button>
            </div>
            <p class="text-center text-dark w-100" style="font-size:1.5rem;">"Unidos todos hacemos más. Tu donación desarrolla tecnología que transforma vidas."</p> -->
    </div>    
    <!--/contenido-->
    <?php 
        //modales de donación
        include "mod/donar/modalPaypal.php";
        include "mod/donar/modalDepositoEfectivo.php";
        include "mod/donar/modalBanwire.php";
        include "mod/donar/modalTransferenciaElectronica.php";
        include "mod/donar/modalExcedente.php";
        include "mod/donar/modalFinal.php";
    ?>
    <?php
        include 'mod/footer.php';
    ?>
        <script type="text/javascript" src="https://sw.banwire.com/checkout.js"></script>
        <script src="/js/motorPago.js"></script>
    </body>
</html>