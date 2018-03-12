<?php
    $metodo = $_SERVER['REQUEST_METHOD'];
    $objDato = new DatosPersonales;
    $objBen = new Beneficiario;
    if( $metodo == "POST" ){ //metodo POST
        $pais = ( isset( $_POST['pais'] ) )? $_POST['pais'] : "";
        $estado = ( isset( $_POST['estado'] ) )? $_POST['estado'] : "";
        $ciudad = ( isset($_POST['ciudad']) )? $_POST['ciudad'] : "";
        $sexo = ( isset($_POST['sexo']) )? $_POST['sexo'] : "";
        $folio = ( isset( $_POST['folio'] ) )? $_POST['folio'] : "";
        $dispositivo = ( isset( $_POST['solicitud'] ) )?$_POST['solicitud'] : "";
        $filtro = 0 ;
        $estatus = "";
        $num = "";
        $filtrosAplicados = "";
        //echo $pais; echo $estado." "; echo $ciudad." "; echo $sexo." "; echo $folio." ";
        
        //concatenar los filtros buscados
        $filtrosAplicados = (!empty($pais))? $filtrosAplicados." País: ".$objDato->buscaNombrePais($pais) : $filtrosAplicados;
        $filtrosAplicados = (!empty($estado))? $filtrosAplicados." Estado: ".$objDato->buscaNombreEstado($estado) : $filtrosAplicados;
        $filtrosAplicados = (!empty($ciudad))? $filtrosAplicados." Ciudad: ".$objDato->buscaNombreCiudad($ciudad) : $filtrosAplicados;
        $sexoNombre = ($sexo == "m")?"Masculino" : "Femenino";
        $filtrosAplicados = (!empty($sexo))? $filtrosAplicados." Sexo: ".$sexoNombre : $filtrosAplicados;
        $filtrosAplicados = (!empty($dispositivo))? $filtrosAplicados." Dispositivo: ".$objBen->buscaDispositivoNombre($dispositivo) : $filtrosAplicados;
        $filtrosAplicados = (!empty($folio))? " Folio: ".$folio:$filtrosAplicados;
        $filtro = ($filtrosAplicados != "")? 1 : 0;
        
    }else{ //metodo GET
        $pais =""; $estado =""; $ciudad =""; $sexo =""; $folio =""; $dispositivo ="";
    }
?>

<div class="row mx-0" id="filtroBtn">
    <div class="px-2 text-white mr-0 position-absolute pointer c-align-middle" style="font-size:1.2rem;z-index:5;right:0;height:30px;margin-top:-30px;background-color:orange;"><span class="mr-2">Mostrar Filtros</span><i class="fa fa-filter" aria-hidden="true"></i></div>
</div>
<div class="container-fluid bg-secondary" id="filtroPanel" style="display:none;">
    <h5 class="text-center text-white pt-3">Selecciona uno o varios filtros</h5>
    <form class="" id ="filtro" method="post" action="<?php $_SERVER['PHP_SELF'] . '?' . $_SERVER['QUERY_STRING'] ?>">
        <div class="form-row mx-0">
            <div class="col-12 col-sm-6 col-md-4 mt-2">
                <?php $objDato->buscaPais($pais); ?>
            </div>
            <div class="col-12 col-sm-6 col-md-4 mt-2">
                <?php $objDato->buscaEstado($pais,$estado); ?>
            </div>
            <div class="col-12 col-sm-6 col-md-4 mt-2">
                <?php $objDato->buscaCiudad($estado,$ciudad); ?>
            </div>
            <div class="col-12 col-sm-6 col-md-4 mt-2">
                <select id="sexo" name="sexo" class="form-control">
                    <option value="" class="text-muted">Selecciona un sexo</option>
                    <option value="m"<?php if( "m" == $sexo){ echo "selected"; } ?>>Masculino</option>
                    <option value="f"<?php if( "f" == $sexo){ echo "selected"; } ?>>Femenino</option>
                </select>
            </div>
            <div class="col-12 col-sm-6 col-md-4 mt-2">
                <?php $objBen->buscaDispositivoAll($dispositivo); ?>
            </div>
            <div class="col-12 col-sm-6 col-md-4 mt-2">
                <input class="form-control" type="text" name="folio" value="<?php echo $folio; ?>" id="filtroFolio" placeholder="Introduce folio">
            </div>

        </div>
        <div class="row mx-0">
            <input class=" btn bg-light text-danger ml-auto mt-2 mb-4" value="Limpiar" id="reset" type="button" >
            <input class="btn text-white ml-2 mt-2 mb-4" style="background-color:orange;" value="Aplicar Filtro" type="submit">
        </div>
    </form>
</div>
<div class="p-2 bg-verde-menu text-white <?php if( $filtro == 0 ){ echo "d-none"; } ?>">
    <span><strong>Filtro(s) Aplicado(s) (</strong><?php echo $filtrosAplicados; ?> <strong>)</strong></span>
</div>