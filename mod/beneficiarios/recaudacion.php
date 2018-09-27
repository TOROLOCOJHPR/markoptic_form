<?php 
    $root = $_SERVER['DOCUMENT_ROOT'];
    require_once ($root."/inc/objetos/transaccion.php");

    $objTransaccion = new Transaccion;

    $idSolicitud = $_GET['b'];

    $objTransaccion->setIdSolicitud($idSolicitud);
    $donacion = $objTransaccion->muestraTotalDonaciones();
    $precio = $solicitud['precioDispositivo'];
    $progressBar = ($donacion/$precio) * 100;
                
    //convertir porcentaje a 100% en caso de que el porcentaje sobrepase el 100%
    if($progressBar > 100)
    {
        $progressBar = 100;
    }
    $porciento = bcdiv($progressBar, '1', 2);

?>
    <!-- información del porcentaje recaudado -->
        <div class="row w-100">
            <div class="col-12 col-lg-auto">
                <p class="mb-0">
                    <strong>porcentaje de recaudación</strong>
                </p>
            </div>
            <div class="col-12 col-lg">
                <p class="mb-0 text-lg-right">
                    <span id="cRecabado">
                        <strong>Recabado: </strong>
                        $<span id="recabado">
                            <?php echo ($donacion != "")? $donacion : "0.00" ?>
                        </span> MXN
                    </span>
                    <br class="d-block d-lg-none">
                    <strong> Total: </strong>
                    $<span id="precio"><?php echo $precio?></span> MXN
                </p>
            </div>
        </div>

        <!-- porcentaje de recaudación -->
        <div class="row mx-0 w-100 align-self-end">
            <div id="porciento" class="col-auto px-0 pr-2 text-center d-flex align-items-center">
                <?php 
                    echo $porciento."%";
                ?>
            </div>
            <div class=" col px-0 progress rounded-0 " style="height:38px">
                <!-- barra de progreso -->
                <div 
                    id="progress" 
                    class="progress-bar progress-bar-striped"
                    role="progressbar" 
                    style="width:0%" 
                    aria-valuenow="0" 
                    aria-valuemin="0" 
                    aria-valuemax="100"
                    data-porcentaje="<?php echo $progressBar; ?>"
                ></div>

            </div>

            <?php
            //mostrar botón de apadrinamiento en caso de que no se halla completado el total del porcentaje
            if($progressBar < 100 )
            {
            ?>
            <!-- botón de apadrinamiento -->
            <div class="">
                <button 
                    id="apadrinar" 
                    class="btn btn-success rounded-0 bg-verde-menu text-white" 
                    data-toggle="modal" 
                    data-target=".banwire"

                >
                    Apadrinar
                </button>

            </div>
            <?php
            }
            ?>
        </div>
        