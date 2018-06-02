    <div class="row mx-0 text-dark">
    <?php
        $cont = 0;
        foreach($arreglo as $fila){
            $row = $objBen->buscaDatosApadrinado($fila);
            if($pagina == "apadrina"){
                $recabado = $objBen->recabado($fila);
                $precioProtesis = $row['precio'];
                $por = ($recabado == 0)? 0 : (($recabado / $precioProtesis)*100);
                $por = ($por > 100)? 100 : $por;
                $porciento = number_format($por,2);
                $cont = $cont + 1;
            }
    ?>
<<<<<<< Updated upstream
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 p-0 bg-cover-directorio" style="background-image:url('/img/uploads/<?php echo ($row[$foto] != '')?$ubicacion.$row[$foto]:'sin-foto.png';?>');height:250px;">
            <a class="d-block h-100 colaborador-descripcion opacity-black" href="<?php echo ($pagina == "beneficiarios")?"/beneficiarios?b=":"/apadrina?b="; echo $row['id']; ?>">
                <div class="h-25">
                    <div class="w-100 progress bg-secondary rounded-0 <?php echo ($pagina != "apadrina")?"d-none":"" ?>" style="height:8px;margin-top:-5px;">
                        <div class="progress-bar h-100" style="width:<?php echo $por; ?>%" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
=======
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 p-0 bg-cover-directorio" style="background-image:url('/img/uploads/<?php echo $ubicacion; echo ($row[$foto] != '')?$row[$foto]:'sin-foto.jpg';?>');height:250px;">
            <a class="d-block h-100 colaborador-descripcion opacity-black" href="<?php echo ($pagina == "beneficiarios")?"/beneficiarios?b=":"/apadrina?b="; echo $row['id']; ?>">
                <div class="h-25">
                    <!-- sistema apadrinamiento -->
                    <div class="w-100 progress bg-secondary rounded-0 d-none <?php echo ($pagina != "apadrina")?"d-none":"" ?>" style="height:5px">
                        <div class="progress-bar h-100" style="width:<?php echo $por; ?>%" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"><?php //echo $porciento; ?></div>
>>>>>>> Stashed changes
                    </div>
                    <!-- datos beneficiario -->
                    <div class="row w-100 mx-0">
                        <!-- nombre beneficiario -->
                        <div class="col-9 p-0">
                            <h5 class="text-capitalize mb-0 pt-1 px-2" style="white-space:nowrap;text-overflow: ellipsis;overflow:hidden">
                            <?php echo $row['nombre'].' '.$row['apellidos'] ?>
                            </h5>
                            <label class="mb-0" style="font-size: 1rem"><?php echo $row['dispositivo']; ?></label>
                        </div>
                        <!-- porcentaje de recaudación -->
                        <div class="col-3 p-0 text-center d-flex align-items-center justify-content-center">
                            <label class="mb-0 <?php echo ($pagina != "apadrina")?"d-none":"" ?>"><?php //echo $porciento." %"; ?> </label>
                            <img class="<?php echo ($pagina != "beneficiarios")?"d-none":"" ?>" style="height:30px;" src="/img/checkedNew.svg" alt="">
                        </div>
                    </div>
                </div>
                <div class="h-75 d-flex align-items-center text-center">
                    <p class="desc" style="font-size:1.3rem;"><?php echo mb_strimwidth(ucfirst($row['porque']), 0, 100, "..."); ?></p>
                </div>
            </a>
        </div>
    <?php
        }
    ?>
    </div>
<!--</div> -->