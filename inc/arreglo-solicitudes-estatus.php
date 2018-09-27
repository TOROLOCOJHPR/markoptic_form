<?php

    //valores necesarios para renderizar la tarjeta de la lista

        /*
            //obligatoria
            $pagina -- de la cual se hace la solicitud(apadrina, beneficiarios)

            //opcional variables generadas por el filtro de busqueda declaradas en modulo filtro
            $filtro -- detecta si se aplico un filtro para componer cadena sql
            $sexo -- genero de busqueda
            $dispositivo -- seleccionado
            $folio -- clave unica del beneficiario
            $pais -- del solicitante
            $estado -- del solicitante
            $ciudad -- del solicitante

        */


    $root = $_SERVER['DOCUMENT_ROOT'];
    require_once ($root.'/inc/objetos/solicitud.php');
    
    //verificar si se encuentra seleccionado un filtro
    $filtro = (isset($_GET['pais'])) ? 1 : 0;
        
        
    if($pagina == "beneficiarios"){
        $estatus = "idEstatusSolicitud = 3";//3 beneficiado
    }elseif($pagina == "apadrina"){
        $estatus = "( (idEstatusSolicitud = 2) OR (idEstatusSolicitud = 5) )";//2 en proceso, 5 completado
    }
    
    //filtro
    $sqlInicial = 'SELECT solicitudes.id FROM solicitudes'.' ';
    
    $sqlEstatus = 'WHERE '.$estatus.' ';
    $sqlSexo = ($sexo != '' AND $folio == '' )? 'AND beneficiarios.sexo = "'.$sexo.'"'.' ' : '';
    $inner = '';
    $complemento = '';
    $sqlDispositivo = ($dispositivo != '')? 'AND solicitudes.idDispositivo = "'.$dispositivo.'"'.' ' : '';
    if($filtro == 1)
    {
        //no tiene folio
        if($folio == '')
        {
            //tiene pais
            if($pais != '')
            {
                $inner = '
                    INNER JOIN beneficiarios ON beneficiarios.id = solicitudes.idBeneficiario
                    INNER JOIN localidades ON localidades.id = beneficiarios.idCiudad
                    INNER JOIN regiones ON regiones.id = localidades.id_region
                    INNER JOIN paises ON paises.id = localidades.id_pais
                '.' ';
                $complemento = ' AND paises.id = "'.$pais.'"'.' ';
                // tiene estado
                if($estado != '')
                { 
                    $inner = '
                        INNER JOIN beneficiarios ON beneficiarios.id = solicitudes.idBeneficiario
                        INNER JOIN localidades ON localidades.id = beneficiarios.idCiudad
                        INNER JOIN regiones ON regiones.id = localidades.id_region
                    '.' ';
                    $complemento = 'AND regiones.id = "'.$estado.'"'.' ';
                    // tiene ciudad
                    if($ciudad != '')
                    {
                        $inner = 'INNER JOIN beneficiarios ON beneficiarios.id = solicitudes.idBeneficiario'.' ';
                        $complemento = 'AND beneficiarios.idCiudad = "'.$ciudad.'"'.' ';
                    }
                }
            }
            //solamente tiene sexo
            elseif($sexo != '')
            {
                $inner = 'INNER JOIN beneficiarios ON beneficiarios.id = solicitudes.idBeneficiario'. ' ';
                $complemento = '';
                //tiene sexo y dispositivo
                if( $dispositivo != ''){
                    $complemento = 'AND solicitudes.idDispositivo = "'.$dispositivo.'"'.' ';
                }
            }
            //no tiene ningún filtro
            elseif($pais == '' && $estado == '' && $ciudad == '' && $sexo == '' && $folio == '')
            {
                $filtrosAplicados = 'No seleccionaste ningún filtro';
            }
        }
        else
        { //tiene folio
            $sqlInicial = 'SELECT solicitudes.id,concat_ws("",dispositivos.siglas,"-",solicitudes.id) as folio FROM solicitudes'. ' ';
            $sqlDispositivo = '';
            $inner = 'INNER JOIN dispositivos ON dispositivos.id = solicitudes.idDispositivo'.' ';
            $complemento = 'AND concat_ws("",dispositivos.siglas,"-",solicitudes.id) = "'.$folio.'"'.' ';
        }
    }//filtro
    else
    {
        $inner = ''; $complemento = '';
    }

    //composición de la sentencia de base de datos
    $sql = $sqlInicial.$inner.$sqlEstatus.$complemento.$sqlSexo.$sqlDispositivo;
    
    //instanciar objeto solicitud
    $objSolicitud = new solicitud;
    //generar arreglo de solicitudes a mostrar
    $arreglo = $objSolicitud->muestraArregloEstatus($sql);

    //revolver solicitudes
    shuffle($arreglo);

    //crear objetos json para utilizar en página apadrina y beneficiarios
?>
    <script>
        let beneficiarios = <?php echo json_encode($arreglo); ?>;
        let pagina = <?php echo json_encode($pagina); ?>;
    </script>
