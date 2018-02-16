<?php
    $cont = 0; $mostrar = 10; $estatus = 2;
    $objBen = new beneficiario();
    $idMax = $objBen->buscaMaxSolicitudes();
    $idCount = $objBen->buscaCountSolicitudes($estatus);
    //echo $idMax;
    if($idCount == 0){
        echo "no se encontraron beneficiarios";
    }elseif($idCount < $mostrar){
        $mostrar = $idCount;
    }
    $arregloRandom = $objBen->generaSolicitudesAleatorias($mostrar,$idMax,$estatus);
?>
<div id="directorio" class="container-fluid bg-cover-center p-0">
    <div class="row mx-0 text-white text-center">
<?php  
    //busca datos apadrinado
    foreach($arregloRandom as $fila){
        $result = $objBen->buscaDatosApadrinado($fila);             
?>
    <div class="col-12 col-md-3 col-sm-6 p-0 bg-cover-directorio" style="background-image:url('/imagenes/uploads/<?php echo $result['foto1']; ?>');height:250px;">
            <a href="apadrina?b=<?php echo $result['id']; ?>">
                <div class="colaborador-descripcion opacity-black">
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