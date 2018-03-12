<?php 

?>

<!-- Modal Donación-->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div id="ben" ben="<?php echo $id; ?>"></div>
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle"><?php echo $result['nombre'].'&nbsp;'.$result['apellidos']; ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h4>Monto a donar</h4>
                <span class="mb-2">Monto mínimo de donación 50.00 mxn</span>
                <div class="form-group pt-2">
                    <button class="btn bg-verde-menu text-white mb-2 mr-2 minimo" m="50">50.00 mxn</button>
                    <button class="btn bg-verde-menu text-white mb-2 mr-2 minimo" m="100">100.00 mxn</button>
                    <button class="btn bg-verde-menu text-white mb-2 mr-2 minimo" m="200">200.00 mxn</button>
                    <button class="btn bg-verde-menu text-white mb-2 mr-2 minimo" m="500">500.00 mxn</button>
                    <button class="btn bg-verde-menu text-white mb-2 mr-2 minimo" m="otro">Otro</button>
                    <input type="text" placeholder="Introduce el monto a donar" value="" id="donacion" class="form-control text-muted" disabled>
                    <input type="hidden" id="donacionBoton" value="">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <!-- <button type="button" class="btn btn-primary" onclick="prePagar();">Donar</button> -->
                <button type="button" class="btn btn-primary "  onclick ="prePagar()">Donar</button>
            </div>
        </div>
    </div>
</div>