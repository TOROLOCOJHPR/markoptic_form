<!-- Modal -->
<div class="modal fade" id="tiempoDonaciones" ocultar="<?php echo (isset($_COOKIE['hide'])) ? $_COOKIE['hide'] : ""; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content text-dark">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Bienvenido al sistema de apadrinamiento</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Nos es grato informarte que nuestros programas de donación se celebran los meses de Marzo y Diciembre, por lo cual te pedimos que seas paciente, estamos trabajando para ti</p>
      </div>
      <div class="modal-footer text-center justify-content-center">
        <button class="btn btn-success bg-verde-menu" style='white-space:normal;' onclick="hideModal();">he leído este mensaje y quiero dejar de verlo</button>
      </div>
    </div>
  </div>
</div>