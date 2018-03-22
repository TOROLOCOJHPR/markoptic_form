<?php
    //header
    include 'mod/header.php';
    include 'mod/menu.php';
?>

<!-- Titulo principal -->
<div class="t-shadow-2-black w100 h-25 text-white bg-cover-center" style="background-image:url('/imagenes/fundación/valores.jpg');">
    <div class="w-100 h-100 c-align-middle opacity-green">
            <h1>Donar</h1>  
    </div>
</div>

<!-- first-block -->
    <div class="container-fluid text-center">
        <h2 class="w-75 mx-auto mt-3">Agradecemos tu participación como donador. Selecciona cualquiera de nuestras opciones y se parte de esta gran causa.</h2>
        <div class="row text-white">
            <div class="col-12 col-lg-6 p-3 "><div class="mx-auto pointer" data-toggle="modal" data-target=".paypal" style="width:300px;height:300px;background-color:#63c62f;"><img src="../imagenes/fundación/paypal.png" class=""style="width:60%;" alt="logo paypal"><p style="font-size:2rem;">paypal</p></div></div>
            <div class="col-12 col-lg-6 p-3 "><div class="mx-auto pointer" data-toggle="modal" data-target=".transferencia" style="width:300px;height:300px;background-color:#337ab7;"><img src="../imagenes/fundación/transferencia.png" class=""style="width:60%;" alt=""><p style="font-size:2rem;">Transferencia Electrónica</p></div></div>
            <div class="col-12 col-lg-6 p-3 "><div class="mx-auto pointer" data-toggle="modal" data-target=".open-pay" style="width:300px;height:300px;background-color:#ff8d2c;"><img src="../imagenes/fundación/paypal.png" class=""style="width:60%;" alt=""><p style="font-size:2rem;">openpay</p></div></div>
            <div class="col-12 col-lg-6 p-3 "><div class="mx-auto pointer" data-toggle="modal" data-target=".deposito-efectivo" style="width:300px;height:300px;background-color:#25AAE3;"><img src="../imagenes/fundación/deposito.png" class=""style="width:60%;" alt=""><p style="font-size:2rem;">Deposito en efectivos</p></div></div>
            <!-- <div class="col-12 bg-secondary mb-3"><h1 class="text-white">Una ves hecho tu donativo tienes dos opciones</h1></div>
            <div class="row d-flex w-100 justify-content-center mb-3 ">
                <button class="btn bg-info text-white btn-lg">Apadrinar a un solicitante</button><button class="btn bg-success ml-1 text-white btn-lg">Solicitar mi conprobante fiscal</button>
            </div>
            <p class="text-center text-dark w-100" style="font-size:1.5rem;">"Unidos todos hacemos más. Tu donación desarrolla tecnología que transforma vidas."</p> -->
        </div>
    </div>    
<!--/contenido-->
<!-- modal -->
<!-- paypal -->
    <div class="modal fade paypal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <h2 class="text-center pt-3">Paypal</h2>
            <img src="../imagenes/fundación/paypal-azul.png" class="mx-auto w-25" alt="logo paypal">
            <p class="px-5 text-center">En caso de que usted cuente con una cuenta PayPal y desee hacernos llegar su donativo por este medio, solo debe hacer clic en el siguiente botón.</p>
            <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_blank" class="text-center">
                <input type="hidden" name="cmd" value="_s-xclick">
                <input type="hidden" name="hosted_button_id" value="YDDHME7ZN8YRL">
                <input type="image" src="https://www.paypalobjects.com/es_XC/MX/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal, la forma más segura y rápida de pagar en línea.">
                <img alt="boton donar paypal" border="0" src="https://www.paypalobjects.com/es_XC/i/scr/pixel.gif" style="font-size:1.5rem;">
            </form>
        </div>
      </div>
    </div>
<!-- transferencia -->
<div class="modal fade transferencia" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <h2 class="text-center pt-3">Transferencia</h2>
            <img src="../imagenes/fundación/transferencia-blue.png" class="mx-auto w-25" alt="logo paypal">
            <p class="px-5 text-center">
                Si desea hacer su donativo mediante Transferencia Electrónica Bancaria los datos son los siguientes.
                <br><strong>Banco:</strong>
                Citibanamex
                <br><strong>Nombre:</strong>
                Fundación Markoptic A.C.
                <br><strong>CLABE:</strong>
                002730700737425429 
            </p>
        </div>
      </div>
    </div>
<!-- open pay -->
<div class="modal fade open-pay" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <h2 class="text-center pt-3">Open Pay</h2>
            <img src="../imagenes/fundación/paypal-azul.png" class="mx-auto w-25" alt="logo paypal">
            <p class="px-5">En caso de que usted cuente con una cuenta PayPal y desee hacernos llegar su donativo por este medio, solo debe hacer clic en el siguiente botón.</p>
        </div>
      </div>
    </div>
<!-- deposito en efectivo -->
<div class="modal fade deposito-efectivo" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <h2 class="text-center pt-3">Deposito en Efectivo</h2>
            <img src="../imagenes/fundación/deposito-blue.png" class="mx-auto w-25" alt="logo paypal">
            <p class="px-5 text-center">
                Puede hacer su donativo mediante depósito en efectivo a nuestra cuenta bancaria (las donaciones en efectivo solo serán recibidas mediante depósito bancario):
                <br><strong>Banco:</strong> 
                Citibanamex 
                <br><strong>Nombre:</strong> 
                Fundación Markoptic A.C.
                <br><strong>Cuenta:</strong> 
                7007 3742542
            </p>
        </div>
      </div>
    </div>

<!--footer-->
    <?php
        include 'mod/footer.php';
    ?>
<!--/footer-->
    </body>
</html>