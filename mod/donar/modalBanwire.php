<!-- banwire -->
<div id="modal-banwire" class="modal fade banwire" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog">

        <div class="modal-content p-3"> 
            <button type="button" class="close ml-auto" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            
            <!-- logo banwire y nombre fundación Markotic -->
            <img src="../imagenes/fundación/banwire-blue.png" class="mx-auto w-25" alt="logo paypal">
            <p class=" text-center">FUNDACION MARKOPTIC A.C</p>
            
            <!-- leyenda de donación -->
            <h4 class="mb-0 text-center">Monto a donar</h4>
            <small class="text-secondary text-center">Monto mínimo de donación 50.00 mxn</small>
            <!-- formulario de predonación -->
            <form class="mt-3" id="donar">
                <!-- botones de donación fija -->
                <div class="form-group">
                    <div class="btn-group-toggle text-center" data-toggle="buttons">
                        <label class="btn btn-outline-success">
                            <input type="radio" name="donacionRBtn" value="50">$50
                        </label>
                        <label class="btn btn-outline-success">
                            <input type="radio" name="donacionRBtn" value="100">$100
                        </label>
                        <label class="btn btn-outline-success active">
                            <input type="radio" name="donacionRBtn" value="200" checked>$200
                        </label>
                        <label class="btn btn-outline-success">
                            <input type="radio" name="donacionRBtn" value="500">$500
                        </label>
                        <label class="btn btn-outline-success">
                            <input type="radio" name="donacionRBtn" value="otro">Otro
                        </label>
                    </div>
                </div>
                <!-- campo de donación establecida -->
                <div class="form-group" style="display: none;" id='cantidad-input'>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">$</span>
                        </div>
                        <input type="text" placeholder="Monto a donar" id="donacionTxt"  disabled class="form-control" required="false">
                    </div>                
                </div>
                <!-- correo, cerrar y submit -->
                <div class="form-group">
                    <input id="emailCliente" class="form-control"type ="email" name="emailCliente" value="" placeholder="Introduce Email" required>
                </div>
                <div id="d-excedente" class="alert-warning rounded text-center py-3" style="display:none">
                    <p class="px-2 py-0 mb-0 text-dark">
                        Gracias por tú interés en donar. Por regulaciones ante el SAT, en pagos mayores a $100,000 MXN, 
                        es necesario que te comuniques con nosotros a través de los siguientes medios:
                    </p>
                    <span>
                        Número de teléfono: 01 800 509 1985 
                        <br/>Vía E-mail: info@fundacionmarkoptic.org.mx
                    </span>
                </div>
                <hr />
                <div id="btn-donacion" class="form-group text-center">
                    <input type="submit" value="donar" class="btn btn-block btn-success">
                    <!-- <button type="button" class="btn btn-link text-secondary" data-dismiss="modal">Cancelar</button> -->
                </div>
            
            </form>
            <!-- politicas de donación markoptic y banwire -->
            <a href="" class="text-secondary text-center"><small>Políticas aplicables a donativos</small></a>
            <a href="" class="text-secondary text-center"><small>Motor pagos Banwire</small></a>
            <div id="resultado"></div>
        </div>
    </div>
</div>
<!-- <div id="ben" ben="<?php //echo ( isset($id) )? $id : "f"."0";?>"></div> -->