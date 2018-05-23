<?php 
    $objBen = new beneficiario;
    $id = $_GET['b'];
    $foto = ($pagina == "beneficiarios")? "fotoHistoria" : "foto1";
    $ubicacion = ($pagina == "beneficiarios")? "beneficiados/" : "";
    $result = $objBen->buscaDatosApadrinado($id);
    $edad = $objBen->generaEdadBeneficiario($result['fecNacimiento']); 
?>
<div class="col-11 col-xl-9 px-0 rounded mx-auto my-3 text-dark" style="box-shadow:0 2px 5px 2px rgba(0,0,0,.3);overflow:hidden;">
    <div class="row mx-0">
        <div class="col-12 col-md-4 mx-auto p-0 d-flex flex-row flex-wrap">
            <img class="img-cover-top" src="/imagenes/uploads/<?php echo $ubicacion.$result[$foto]; ?>" alt="imagen del beneficiario">
            <h5 class="text-capitalize text-center text-white bg-verde-menu py-2 mb-0 position-absolute align-self-end w-100"><strong><?php echo $result['nombre'].'&nbsp;'.$result['apellidos']; ?></strong></h5>
        </div>
        <div class="col-12 p-3 d-flex flex-row flex-wrap <?php echo ($pagina == "beneficiarios")?"col-md-8":"col-md-8"; ?>" style="font-size:1.2rem;">
            <div class="w-100">
                <strong>Folio: </strong><span><?php echo $result['folio'];?><span>
                <br>
                <strong>Edad: </strong><span><?php echo $edad; ?>&nbsp;años<span>
                <br>
                <strong>Vive en: </strong><span><?php echo $result['ciudad']."&nbsp;".$result['estado']."&nbsp;".$result['pais']; ?></span>
                <br>
                <strong>Beneficiado con: </strong><span><?php echo $result['dispositivo']; ?></span>
                <br>
                <strong><?php echo ($pagina == "beneficiarios")?"¿Por qué solicitó?":"¿Por qué solicita?" ?></strong>
                <br>
                <div class="rounded p-2" style="height:100px;overflow-y:scroll;background-color:#e9ecef">
                    <span class="text-first-uppercase"><?php echo ucfirst($result['porque']); ?></span>
                </div>
            </div>    
                <?php 
                    if($pagina == "apadrina"){ 
                        include 'mod/beneficiarios/recaudacion.php';              
                    }
                ?>
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