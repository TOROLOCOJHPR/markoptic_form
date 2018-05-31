<?php
    if($pagina == "beneficiarios"){
        $mostrar = 12;
        $estatus = 3;
    }elseif($pagina == "apadrina"){
        $mostrar = 12;
        $estatus = 2;
        include 'mod/beneficiarios/modalEventos.php';
    }
    $recorrido = 0;
    //filtro
    $sqlInicial = "SELECT solicitudes.id FROM solicitudes ";
    $sqlEstatus = " WHERE idEstatusSolicitud = '".$estatus."'" ;
    $sqlSexo = ($sexo != "" AND $folio == "" )? " AND beneficiarios.sexo = '".$sexo."'" : "";
    $inner = "";
    $complemento = "";
    $sqlDispositivo = ($dispositivo != "")? "AND solicitudes.idDispositivo = '".$dispositivo."'" : "";
    if($metodo == "POST"){
        if($folio == ""){ //no tiene folio
            if($pais != ""){ //tiene pais
                $inner = "
                    INNER JOIN beneficiarios ON beneficiarios.id = solicitudes.idBeneficiario
                    INNER JOIN localidades ON localidades.id = beneficiarios.idCiudad
                    INNER JOIN regiones ON regiones.id = localidades.id_region
                    INNER JOIN paises ON paises.id = localidades.id_pais
                ";
                $complemento = " AND paises.id = '".$pais."' ";
                if($estado != ""){ // tiene estado
                    $inner = "
                        INNER JOIN beneficiarios ON beneficiarios.id = solicitudes.idBeneficiario
                        INNER JOIN localidades ON localidades.id = beneficiarios.idCiudad
                        INNER JOIN regiones ON regiones.id = localidades.id_region
                    ";
                    $complemento = "AND regiones.id = '".$estado."'";
                    if($ciudad != ""){ // tiene ciudad
                        $inner = "INNER JOIN beneficiarios ON beneficiarios.id = solicitudes.idBeneficiario";
                        $complemento = " AND beneficiarios.idCiudad = '".$ciudad."'" ;
                    }
                }
            }elseif($sexo != ""){ //solamente tiene sexo
                $inner = "INNER JOIN beneficiarios ON beneficiarios.id = solicitudes.idBeneficiario";
                $complemento = "";
                if( $dispositivo != ""){ //tiene sexo y dispositivo
                    $complemento = "AND solicitudes.idDispositivo = '".$dispositivo."'";
                }
            }elseif($pais == "" && $estado == "" && $ciudad == "" && $sexo == "" && $folio == ""){ //no tiene ningún filtro
                $filtrosAplicados = "No seleccionaste ningún filtro";
            }
        }else{ //tiene folio
            $sqlInicial = "SELECT solicitudes.id,concat_ws('',dispositivos.siglas,'-',solicitudes.id) as folio FROM solicitudes";
            $sqlDispositivo = "";
            $inner = " INNER JOIN dispositivos ON dispositivos.id = solicitudes.idDispositivo";
            $complemento = " AND concat_ws('',dispositivos.siglas,'-',solicitudes.id) = '".$folio."'";
        }
    }else{
        $inner = ""; $complemento = "";
    }
    //composición de la sentencia de base de datos
    $sql = $sqlInicial.$inner.$sqlEstatus.$complemento.$sqlSexo.$sqlDispositivo;
    $arreglo = $objBen->generaSolicitudesFiltro($sql);
    shuffle($arreglo);

    //$code = json_encode($arreglo);
    $totalArreglo = count($arreglo);
    //$prueba = new stdClass();
    // $prueba->propiedad = 'valor de propiedad';
?>
    <script>
        let beneficiarios = <?php echo json_encode($arreglo); ?>;
        let mostrar = <?php echo json_encode($mostrar); ?>;
        let pagina = <?php echo json_encode($pagina); ?>;
    </script>
<?php 
    if($totalArreglo != 0 ){
        //include 'mod/beneficiarios/tarjetasBeneficiarios.php';
    }else{
?>
        <p class="display-4 text-center p-5 mb-0">
            No se encontraron solicitantes<br>por favor inténtalo de nuevo más tarde.
        </p>
<?php
    }
?>

<div id="div"></div>