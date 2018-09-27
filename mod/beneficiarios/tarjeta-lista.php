<?php 
    //valores necesarios para renderizar la tarjeta de la lista
    
    /*
        $página -- de la cual se hace la solicitud(apadrina o beneficiarios)
        $idSolicitud -- solicitud
        $img -- del beneficiario
        $nombre -- del beneficiario
        $apellido -- del beneficiario
        $dispositivo -- solicitado
        $porque -- solicito el dispositivo
    */

    //en el caso de que la solicitud provenga de la página de apadrinamiento
    /*
        $progressBar -- porcentaje el cual se muestra en la barra de progreso
        $porciento -- porcentaje el cual muestra el total
    */

?>
    <!-- imagen de fondo del beneficiario -->
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 p-0 bg-cover-directorio"
        style="height:250px;background-image:url('<?php echo '/img/uploads/'; echo ($img != '') ? $idSolicitud.'/'.$img : 'sin-foto.png'; ?>');"
    >
        
        <!-- redirección a tarjeta del beneficiario -->
        <a class="d-block h-100 colaborador-descripcion opacity-black"
           href="<?php echo ($pagina == "beneficiarios")? "/beneficiarios?b=" : "/apadrina?b="; echo $idSolicitud; ?>"
        >
            
            <!-- porcentaje y datos de la solicitud -->
            <div class="h-25">
                
                <?php 
                //mostrar barra de progreso
                if($pagina == "apadrina" && APADRINA == 1)
                {
                ?>
                    <!-- barra de progreso -->
                    <div class="w-100 progress bg-secondary rounded-0"
                        style="height:8px;margin-top:-5px;"
                    >
                        <div class="progress-bar progress-bar-striped h-100" 
                            style="width:<?php echo $progressBar; ?>%" 
                            role="progressbar" 
                            aria-valuenow="0" 
                            aria-valuemin="0" 
                            aria-valuemax="100"
                        ></div>
                    
                    </div>

                <?php
                }
                ?>

                <!-- datos beneficiario -->
                <div class="row w-100 mx-0">
                    
                    <!-- nombre y dispositivo -->
                    <div class="col-9 p-0">
                        
                        <!-- nombre beneficiario -->
                        <h5 class="text-capitalize mb-0 pt-1 px-2"
                            style="white-space:nowrap;text-overflow: ellipsis;overflow:hidden"
                        >
                            <?php echo $nombre.' '.$apellido ?>
                        </h5>
                        
                        <!-- dispositivo solicitado -->
                        <label class="mb-0" style="font-size: 1rem">
                            <?php echo $dispositivo; ?>
                        </label>
                    
                    </div>

                    <!-- porcentaje de recaudación -->
                    <div class="col-3 p-0 text-center d-flex align-items-center justify-content-center">
                        
                        <?php 
                        //mostrar porcentaje de apadrinamiento
                        if($pagina == "apadrina" && APADRINA == 1)
                        {
                        ?>
                            <!-- porcentaje -->
                            <label class="mb-0">
                                <?php echo $porciento." %"; ?>
                            </label>
                        
                        <?php
                        }
                        ?>                        
                        
                        <!-- monto completado -->
                        <img class="<?php echo ($pagina == 'beneficiarios')? 'd-block' : 'd-none' ?>"
                            style="height:30px;" src="/img/checkedNew.svg" alt=""
                        >
                    
                    </div>
                
                </div><!-- datos beneficiario -->
            
            </div><!-- porcentaje y datos de la solicitud -->

            <!-- descripción de la solicitud -->
            <div class="h-75 d-flex align-items-center text-center">
                <p class="desc" style="font-size:1.3rem;">
                    <?php echo mb_strimwidth(ucfirst($porque), 0, 100, "..."); ?>
                </p>
            </div>
        
        </a><!-- redirección a tarjeta del beneficiario -->
    
    </div>