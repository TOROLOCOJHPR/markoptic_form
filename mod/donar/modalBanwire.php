<!-- banwire -->
<div class="modal fade banwire" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content px-5 pb-3">
            <h2 class="text-center pt-3">Banwire</h2>
            <img src="../imagenes/fundación/paypal-azul.png" class="mx-auto w-25" alt="logo paypal">
            <p class=" text-center">FUNDACION MARKOPTIC A.C</p>
            <h4>Monto a donar</h4>
            <span class="mb-2">Monto mínimo de donación 50.00 mxn</span>
            <form onsubmit="return prePagar()">
            <div class="form-group pt-2">
                <button type="button" class="btn bg-verde-menu text-white mb-2 mr-2 minimo" m="50">50.00 mxn</button>
                <button type="button" class="btn bg-verde-menu text-white mb-2 mr-2 minimo" m="100">100.00 mxn</button>
                <button type="button" class="btn bg-verde-menu text-white mb-2 mr-2 minimo" m="200">200.00 mxn</button>
                <button type="button" class="btn bg-verde-menu text-white mb-2 mr-2 minimo" m="500">500.00 mxn</button>
                <button type="button" class="btn bg-verde-menu text-white mb-2 mr-2 minimo" m="otro">Otro</button>
                <input type="text" placeholder="Introduce el monto a donar" value="" id="donacion" class="form-control text-muted" disabled>
                <input type="hidden" id="donacionBoton" value="">
            </div>
            <div class="form-group col-12 col-md-6 px-0">
                <input id="emailCliente" class="form-control"type ="email" name="emailCliente" value="" placeholder="Introduce Email" required>
            </div>
            <div class="row mx-0 mb-2">
                <button type="button" class="btn btn-secondary ml-auto" data-dismiss="modal">Cerrar</button>
                <!-- <button type="button" class="btn btn-primary" onclick="prePagar();">Donar</button> -->
                <!-- <button type="button" class="btn btn-primary ml-2"  onclick ="prePagar()">Donar</button> -->
                <input type="submit" value="donar" class="btn btn-primary ml-2">
            </div>
            </form>
            <a href="" class="text-info">Políticas aplicables a donativos</a>
            <a href="" class="text-info">Motor pagos Banwire</a>
            <div id="resultado"></div>
        </div>
    </div>
</div>
<div id="ben" ben="<?php echo ( isset($id) )? "f"."$id" : "f"."0";?>"></div>