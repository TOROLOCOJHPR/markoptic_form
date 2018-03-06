<?php 
    $recabado = $objBen->recabado($id);   
    $precioProtesis = $result['precio']; 
    //if($recabado == 0){ $por = 0; }else{ $por = (($recabado / $precioProtesis)*100); }
    $por = ($recabado == 0)? 0 : (($recabado / $precioProtesis)*100);
    //if($por > 100){ $por = 100; }
    $por = ($por > 100)? 100 : $por;
    $porciento = number_format($por,2);
    $dashoffset =(628/100)*(100 - $porciento);
?>
    <!-- información del porcentaje recaudado -->
    <div class="col-12 col-md-4 mt-4 c-align-middle flex-column order-2 order-md-3 ">
        <div id='contCirculo' class="">
            <h5 class="text-center mt-4">Porcentaje de Recaudación</h5>
            <svg id="contPorcentaje" height='300' width='300' class="">
                <circle id='circulo<?php echo $cont ?>' cx='50%' cy='50%' r='100' stroke-dasharray='628' stroke-dashoffset='<?php echo $dashoffset; ?>'></circle>
                <text id='porciento' x='34%' font-size='2.5rem' y='52%' fill='black'><?php echo $porciento; ?>%</text>
            </svg>
            <h6 class="text-center">Precio dispositivo: <?php echo $precioProtesis; ?> MXN</h6>
            <h6 class="text-center">Total Recabado: <?php echo $baseDatosDinero; ?> MXN</h6>
        </div><!--contCirculo-->
    </div>