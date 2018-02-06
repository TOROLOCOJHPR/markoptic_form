<div class="row mx-0" style="">
    <div class="col-12 col-sm-7 col-md-4 px-0">
        <img class="img-cover-center m-auto" src="/imagenes/uploads/beneficiados/<?php echo $result['fotoHistoria']; ?>" alt="fotografia del beneficiado"/>
    </div>
    <div class="col-12 col-sm-5 col-md-8 p-4 px-5" style="font-size:1.2rem;">
    <strong>Nombre: </strong><span class="text-capitalize"><?php echo $result['nombre'].'&nbsp;'.$result['apellidos']; ?></span>
    <br>
    <strong>Edad: </strong><?php echo $edad; ?>
    <br>
    <strong>Vive en: </strong><span><?php $result['ciudad']."&nbsp;".$result['estado']."&nbsp;".$result['pais']; ?></span>
    <br>
    <strong>Beneficiado con: </strong><span><?php echo $result['dispositivo']; ?></span>
    <br>
    <strong>¿Por qué solicitó? </strong>
    <br>
    <span class="text-first-uppercase"><?php echo ucfirst($result['porque']); ?></span>
    </div>
</div>       