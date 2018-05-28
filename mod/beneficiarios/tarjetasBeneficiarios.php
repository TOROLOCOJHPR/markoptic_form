    <div class="row mx-0 text-dark">
    <?php
        /*foreach($arreglo as $fila){
            //echo "<br>".$fila;
        }*/
        $cont = 0;
        foreach($arreglo as $fila){
            //echo $fila;
            $row = $objBen->buscaDatosApadrinado($fila);
            if($pagina == "apadrina"){
                $recabado = $objBen->recabado($fila);
                $precioProtesis = $row['precio'];
                $por = ($recabado == 0)? 0 : (($recabado / $precioProtesis)*100);
                $por = ($por > 100)? 100 : $por;
                $porciento = number_format($por,2);
                $cont = $cont + 1;
            }
            /*for($i=$recorrido; $i < $mostrar; $i++){
                //echo "id".$arreglo[$cont]['id']."<br>";
                $row = $objBen->buscaDatosApadrinado($arreglo[$i]['id']);
                if($pagina == "apadrina"){
                    $recabado = $objBen->recabado($arreglo['id']);
                    $precioProtesis = $row['precio'];
                    $por = ($recabado == 0)? 0 : (($recabado / $precioProtesis)*100);
                    $por = ($por > 100)? 100 : $por;
                    $porciento = number_format($por,2);
                }
                $cont = $cont + 1;*/
    ?>
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 p-0 bg-cover-directorio" style="background-image:url('/img/uploads/<?php echo $ubicacion.$row[$foto];?>');height:250px;">
            <a class="d-block h-100 colaborador-descripcion opacity-black" href="<?php echo ($pagina == "beneficiarios")?"/beneficiarios?b=":"/apadrina?b="; echo $row['id']; ?>">
                <div class="h-25">
                    <div class="w-100 progress bg-secondary rounded-0 <?php echo ($pagina != "apadrina")?"d-none":"" ?>" style="height:5px">
                        <div class="progress-bar h-100" style="width:<?php echo $por; ?>%" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"><?php //echo $porciento; ?></div>
                    </div>
                    <div class="row w-100 mx-0">
                        <!-- nombre beneficiario -->
                        <div class="col-9 p-0">
                            <h5 class="text-capitalize mb-0 pt-1 px-2" style="white-space:nowrap;text-overflow: ellipsis;overflow:hidden"><strong><?php echo $row['nombre'].'&nbsp;'.$row['apellidos'] ?></strong></>
                            <br/>
                            <label class="mb-0" style="font-size: 1rem"><?php echo $row['dispositivo']; ?></label>
                        </div>
                        <!-- porcentaje de recaudación -->
                        <div class="col-3 p-0 text-center d-flex align-items-center justify-content-center">
                            <label class="mb-0 <?php echo ($pagina != "apadrina")?"d-none":"" ?>"><?php echo $porciento; ?>% </label>
                            <img class="<?php echo ($pagina != "beneficiarios")?"d-none":"" ?>" style="height:30px;" src="/img/checkedNew.svg" alt="">
                        </div>
                        <!-- dispositivo solicitado -->
                        <!-- <div class="col-12 p-0 print">
                        </div> -->
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