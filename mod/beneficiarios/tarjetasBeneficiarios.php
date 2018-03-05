<div id="directorio" class="container-fluid bg-cover-center p-0">
    <div class="row mx-0 text-white text-center">
    <?php 
        foreach($arregloRandom as $fila){
            $result = $objBen->buscaDatosApadrinado($fila);
            if($pagina == "apadrina"){
                $recabado = $objBen->recabado($fila);   
                $precioProtesis = $result['precio']; 
                //if($recabado == 0){ $por = 0; }else{ $por = (($recabado / $precioProtesis)*100); }
                $por = ($recabado == 0)? 0 : (($recabado / $precioProtesis)*100);
                //if($por > 100){ $por = 100; }
                $por = ($por > 100)? 100 : $por;
                $porciento = number_format($por,2);  
            }
    ?>             
        <div class="col-12 col-md-3 col-sm-6 p-0 bg-cover-directorio" style="background-image:url('/imagenes/uploads/<?php echo $ubicacion.$result[$foto];?>');height:250px;">
            <a href="<?php echo ($pagina == "beneficiarios")?"/beneficiarios?b=":"/apadrina?b="; echo $result['id']; ?>">    
                <div class="colaborador-descripcion opacity-black">
                    <!-- linea de progreso -->
                        <div class="bg-secondary w-100 position-absolute <?php echo ($pagina == "beneficiarios")? "d-none":""; ?>" style="height:7px;">
                            <div class="h-100" style=" width:<?php echo $porciento; ?>%;background-color:orange;"></div>
                        </div>
                        <div class="w-100 text-left position-absolute mt-3 ml-1 <?php echo ($pagina == "beneficiarios")? "d-none":""; ?>"><span><?php echo $porciento; ?> %<span></div>
                <!-- linea de progreso recabado -->
                    <!-- datos del beneficiario -->
                    <div class="c-align-middle">
                        <p class="px-3 pt-2 "style="font-size:1.3rem;text-overflow:ellipsis;overflow:hidden;white-space: nowrap;">
                            <span class="text-capitalize"><?php echo $result['nombre'].'&nbsp;'.$result['apellidos']; ?></span>
                            <br>
                            <span style="font-size:1.1rem;"><?php echo $result['dispositivo']; ?></span>
                        </p>
                    </div>
                    <div class="c-align-middle px-2">
                        <p style="font-size:1.3rem;"><?php echo mb_strimwidth(ucfirst($result['porque']), 0, 100, "..."); ?></p>
                    </div>
                </div>    
            </a>
        </div>
    <?php
        }
    ?>
    </div>
</div>