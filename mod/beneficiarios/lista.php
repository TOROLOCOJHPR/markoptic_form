<?php
    if($pagina == "beneficiarios"){
        $mostrar = 10;
        $estatus = 3;
    }elseif($pagina == "apadrina"){
        $mostrar = 10;
        $estatus = 2;
        include 'mod/beneficiarios/modalEventos.php';
    }

    //filtro
    $sqlInicial = "SELECT solicitudes.id FROM solicitudes ";
    $sqlEstatus = " WHERE idEstatusSolicitud = '".$estatus."'" ;
    if($metodo == "POST"){
        if($folio == ""){
            if($pais != ""){ //tiene pais
                $inner = "
                    INNER JOIN beneficiarios ON beneficiarios.id = solicitudes.idBeneficiario
                    INNER JOIN localidades ON localidades.id = beneficiarios.idCiudad
                    INNER JOIN regiones ON regiones.id = localidades.id_region
                    INNER JOIN paises ON paises.id = localidades.id_pais
                ";
                $complemento = " AND paises.id = '".$pais."' ";
                //echo "busca datos por país";
                if($estado != ""){ // tiene estado
                    $inner = "
                        INNER JOIN beneficiarios ON beneficiarios.id = solicitudes.idBeneficiario
                        INNER JOIN localidades ON localidades.id = beneficiarios.idCiudad
                        INNER JOIN regiones ON regiones.id = localidades.id_region
                    ";
                    $complemento = "AND regiones.id = '".$estado."'";
                    //echo "busca datos por estado";
                    if($ciudad != ""){ // tiene ciudad
                        $inner = "INNER JOIN beneficiarios ON beneficiarios.id = solicitudes.idBeneficiario";
                        $complemento = " AND beneficiarios.idCiudad = '".$ciudad."'" ;
                    }
                }
                $filtro = 1;
            }elseif($sexo != "" && $pais == "" && $estado == "" && $ciudad == ""){ //solamente tiene sexo
                //echo "busca datos por sexo";
                $filtro = 1;
            }elseif($pais == "" && $estado == "" && $ciudad == "" && $sexo == "" && $folio == ""){ //no tiene ningún filtro
                //echo "no seleccionado ningún filtro";
                $filtrosAplicados = "No seleccionaste ningún filtro";
                $filtro = 1;
            }
        }else{
            echo "busca datos por folio";
            // $filtro = 0;
            $sqlInicial = "SELECT solicitudes.id,concat_ws('',dispositivos.siglas,'-',solicitudes.id) as folio FROM solicitudes";
            $inner = " INNER JOIN dispositivos ON dispositivos.id = solicitudes.idDispositivo";
            //$sqlEstatus = "";
            $complemento = " AND concat_ws('',dispositivos.siglas,'-',solicitudes.id) = '".$folio."'";
        }
    }else{
        $inner = ""; $complemento = "";
    }
    //composición de la sentencia de base de datos
    $sqlSexo = ($sexo != "" AND $folio == "" )? " AND beneficiarios.sexo = '".$sexo."'" : "";
    // $sqlEstatus = ($filtro == 1)? " WHERE idEstatusSolicitud = '".$estatus."'" : "";
    $sql = $sqlInicial.$inner.$sqlEstatus.$complemento.$sqlSexo;
    $arreglo = $objBen->generaSolicitudesFiltro($sql);
    $totalArreglo = count($arreglo);
    if($totalArreglo != 0 ){
        //echo "<br>count arreglo ".$totalArreglo;
        include 'mod/beneficiarios/tarjetasBeneficiarios.php';
    }else{
        echo "no se encontraron solicitudes";
    }
    //var_dump($arreglo);
?>