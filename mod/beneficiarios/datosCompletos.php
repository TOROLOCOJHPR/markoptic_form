<?php 
    $objBen = new beneficiario;
    $id = $_GET['b'];
    $foto = ($pagina == "beneficiarios")? "fotoHistoria" : "foto1";
    $ubicacion = ($pagina == "beneficiarios")? "beneficiados/" : "";
    $result = $objBen->buscaDatosApadrinado($id);
    $edad = $objBen->generaEdadBeneficiario($result['fecNacimiento']); 
?>
<div class="row mx-0" style="">
    <div class="col-12 col-sm-6 col-md-4 ">
        <h5 class="text-capitalize text-center mt-2"><?php echo $result['nombre'].'&nbsp;'.$result['apellidos']; ?></h5>
        <img class="img-fluid" src="/imagenes/uploads/<?php echo $ubicacion.$result[$foto]; ?>" alt="imagen del beneficiario">
    </div>
    <div class="col-12 col-sm-6 <?php echo ($pagina == "beneficiarios")?"col-md-8":"col-md-8"; ?> p-4 px-5 " style="font-size:1.2rem;">
        <div class="mt-4"> 
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
            <span class="text-first-uppercase"><?php echo ucfirst($result['porque']); ?></span>
            <?php 
                if($pagina == "humberto"){  
            ?>
                    <h5 class="mt-5">Te invitamos a que apoyes a: </h5><h5><?php echo $result['nombre'].'&nbsp;'.$result['apellidos']; ?></h5>
                    <div class="row mx-0">
                        <button class="btn bg-verde-menu text-white ml-auto" data-toggle="modal" data-target="#exampleModalCenter" >Apadrinar</button>
                    </div>
            <?php                    
                }
            ?>
        </div>
    </div>
    <?php if($pagina == "humberto"){include 'mod/beneficiarios/recaudacion.php';include 'mod/beneficiarios/modalDonacion.php';} ?>
</div>       