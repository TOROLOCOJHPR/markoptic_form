<div id="directorio" class="container-fluid bg-cover-center p-0">
    <div class="row mx-0 text-white text-center">
    <?php 
        foreach($arregloRandom as $fila){
            $result = $objBen->buscaDatosApadrinado($fila);
    ?>             
        <div class="col-12 col-md-3 col-sm-6 p-0 bg-cover-directorio" style="background-image:url('/imagenes/uploads/beneficiados/<?php echo $result['fotoHistoria']; ?>');height:250px;">
            <a href="/beneficiarios?b=<?php echo $result['id']; ?>">    
                <div class="colaborador-descripcion opacity-black">
                    <div class="c-align-middle">
                        <p class="px-3 pt-2 "style="font-size:1.3rem;text-overflow:ellipsis;overflow:hidden;white-space: nowrap;">
                            <span><?php echo $result['nombre'].'&nbsp;'.$result['apellidos']; ?></span>
                            <br>
                            <span style="font-size:1.1rem;"><?php echo $result['dispositivo']; ?></span>
                        </p>
                    </div>
                    <div class="c-align-middle px-2">
                        <p style="font-size:1.3rem;"><?php echo mb_strimwidth($result['porque'], 0, 100, "..."); ?></p>
                    </div>
                </div>    
            </a>
        </div>
    <?php
        }
    ?>
    </div>
</div>