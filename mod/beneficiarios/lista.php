<?php //echo $pagina;
    $filtro = 0;
    $inner ="";
    if($pagina == "beneficiarios"){
        $mostrar = 10;
        $estatus = 3;      
    }elseif($pagina == "apadrina"){
        $mostrar = 10;
        $estatus = 2;
        include 'mod/beneficiarios/modalEventos.php';
    }
    $sentencia = "' and idEstatusSolicitud = '".$estatus."'";
    $arregloRandom = $objBen->generaSolicitudesAleatorias($mostrar,$estatus,$sentencia,$inner);
    include 'mod/beneficiarios/tarjetasBeneficiarios.php';
?>
