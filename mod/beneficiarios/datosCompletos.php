<?php 
    $objBen = new beneficiario;
    $id = $_GET['b'];
    $foto = ($pagina == "beneficiarios")? "fotoHistoria" : "foto1";
    $ubicacion = ($pagina == "beneficiarios")? "beneficiados/" : "";
    $result = $objBen->buscaDatosApadrinado($id);
    $edad = $objBen->generaEdadBeneficiario($result['fecNacimiento']); 
?>
<div class="col-11 col-xl-9 px-0 mx-auto my-5" style="box-shadow:0 2px 5px 2px rgba(0,0,0,.3);">
    <div class="row mx-0">
        <div class="col-12 col-md-4 p-0">
            <img class='img-cover-top' src='/img/uploads/<?php echo ($row[$foto] != '')?$ubicacion.$row[$foto]:'sin-foto.png';?>' alt='imagen del beneficiario'>
        </div>
        <div class='col-12 col-md-8 p-0'>
            <h5 class="text-capitalize text-center text-white bg-verde-menu p-3 mb-0">
                <?php echo $result['nombre'].'&nbsp;'.$result['apellidos']; ?>
            </h5>
            <div class="p-4">
                <p class='mb-1'><strong>Folio: </strong><?php echo $result['folio'];?></p>
                <p class='mb-1'><strong>Edad: </strong><?php echo $edad; ?> años</p>
                <p class='mb-1'><strong>Vive en: </strong><?php echo $result['ciudad']."&nbsp;".$result['estado']."&nbsp;".$result['pais']; ?></p>
                <p class='mb-1'><strong>Beneficiado con: </strong><?php echo $result['dispositivo']; ?></p>
                <label><strong><?php echo ($pagina == "beneficiarios")?"¿Por qué solicitó?":"¿Por qué solicita?" ?></strong></label>
                <div class="text-first-uppercase rounded p-3 mb-3" style="max-height:150px;overflow-y:scroll;background-color:#e9ecef">
                    <?php echo $result['porque']; ?>
                </div>
                <?php 
                    if($pagina == "apadrina"){ 
                        //include 'mod/beneficiarios/recaudacion.php';              
                    }
                ?>
            </div>    

        </div>
    </div>
</div>
    <?php 
        if($pagina == "apadrina"){
            // include 'mod/beneficiarios/recaudacion.php'; 
            include 'mod/donar/modalBanwire.php';
            include 'mod/donar/modalExcedente.php';
        } 
    ?>
</div>