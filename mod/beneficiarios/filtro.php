<?php 
    $root = $_SERVER['DOCUMENT_ROOT'];
    require_once ($root.'/inc/objetos/ubicacion.php');
    require_once ($root.'/inc/objetos/dispositivo.php');

    //inicializar objetos
    $objUb = new Ubicacion;
    $objDispositivo = new Dispositivo;

    //obtener países
    $paises = $objUb->muestraPaises();//crear arreglo de países

    //inicializar varibales del filtro
    $pais = "";
    $estado = "";
    $ciudad = "";
    $sexo = "";
    $dispositivo = "";
    $folio = "";
    
    $filtrosAplicados = "";
    
    //obtener dispositivos
    $dispositivos = $objDispositivo->muestraTodos();
    
    //verificar si se encuentra seleccionado algún país
    if (isset($_GET['pais']))
    {
        $pais = $_GET['pais'];//obtener valor del url
        $objUb->setPais($pais);//pasar valor al objeto ubicación del país seleccionado
        $estados = $objUb->muestraEstados();//traer estados del país seleccionado

        //etiqueta filtros aplicados país
        if($pais != "")
        {
            $nombrePais = $objUb->muestraPais();//traer nombre del país seleccionado
            //generar etiqueta del país
            $filtrosAplicados = $filtrosAplicados."<strong>País: </strong>".$nombrePais."&nbsp;&nbsp;";
        }
    }//no se encuentra seleccionado ningún país
    else
    {
        $estados = "";//borrar estados a mostrar
    }

    //verificar si se encuentra seleccionado algún estado
    if (isset($_GET['estado']))
    {
        $estado = $_GET['estado'];//obtener valor del url
        $objUb->setEstado($estado);//pasar valor al objeto ubicación del estado seleccionado
        $ciudades = $objUb->muestraCiudades();//traer ciudades del estado seleccionado

        //etiqueta filtros aplicados estado
        if($estado != "")
        {
            $nombreEstado = $objUb->muestraEstado();//traer nombre del estado seleccionado
            //generar etiqueta del estado seleccionado
            $filtrosAplicados = $filtrosAplicados."<strong>Estado: </strong>".$nombreEstado."&nbsp;&nbsp;";
        }
    }//no se encuentra seleccionado ningún estado
    else
    {
        $ciudades = "";//borrar ciudades a mostrar
    }

    // verificar si se encuentra una ciudad seleccionada
    if( isset($_GET['ciudad']) )
    {
        $ciudad = $_GET['ciudad'];//obtener valor del url
        
        //etiqueta filtros aplicados ciudad
        if($ciudad != "")
        {
            $objUb->setCiudad($ciudad);//pasar valor al objeto ubicación de la ciudad seleccionada
            $nombreCiudad = $objUb->muestraCiudad();//traer nombre de la ciudad seleccionada
            //generar etiqueta de la ciudad seleccionada
            $filtrosAplicados = $filtrosAplicados."<strong>Ciudad: </strong>".$nombreCiudad."&nbsp;&nbsp;";
        }
    }

    //verificar si se encuentra seleccionado el sexo
    if( isset($_GET['sexo']) )
    {
        $sexo = $_GET['sexo'];//obtener valor del url

        //etiqueta filtros aplicados sexo
        if($sexo != "")
        {
            $nombreSexo = ($sexo == "m")? "Masculino" : "Femenino";//generar nombre del sexo seleccionado
            //generar etiqueta del sexo seleccionado 
            $filtrosAplicados = $filtrosAplicados."<strong>Sexo: </strong>".$nombreSexo."&nbsp;&nbsp;";
        }
    }

    //verificar si se encuentra seleccionado el dispositivo
    if( isset($_GET['dispositivo']) )
    {
        $dispositivo = $_GET['dispositivo'];//obtener valor del url

        //etiqueta filtros aplicados dispositivo
        if($dispositivo !="")
        {
            $objDispositivo->setId($dispositivo);//pasar valor a objeto dispositivo del dispositivo seleccionado
            $muestraDispositivo = $objDispositivo->muestra();//traer datos del dispositivo seleccionado
            //generar etiqueta del dispositivo seleccionado
            $filtrosAplicados = $filtrosAplicados."<strong>Dispositivo: </strong>".
                $muestraDispositivo[0]['nombreDispositivo']."&nbsp;&nbsp;"
            ;

        }
    }

    //verificar si se introdujo un folio
    //si se introdujo un folio se omiten todos los demás criterios de busquda
    if( isset($_GET['folio']) )
    {

        $folio = $_GET['folio'];//obtener valor del url
        
        //etiqueta filtros aplicados folio
        if($folio !="")
        {
            //generar etiqueta folio
            $filtrosAplicados = "<strong>Folio: </strong>".$folio."&nbsp;&nbsp;";
        }
    }

?>


<!-- campos de filtro -->
<div class="row mx-0" id="filtroBtn">
    <div class="px-2 text-white mr-0 position-absolute pointer c-align-middle" style="font-size:1.2rem;z-index:5;right:0;height:30px;margin-top:-30px;background-color:orange;"><span class="mr-2">Mostrar Filtros</span><i class="fa fa-filter" aria-hidden="true"></i></div>
</div>
<div 
    class="container-fluid"
    id="filtroPanel"
    style="display:none;background-color:rgba(0,0,0,.5)"
>
    <h5 class="text-center text-white pt-3">Selecciona uno o varios filtros</h5>
    <form class="form-row mx-0" id ="filtro" method="get" action="">
    
        <!-- países -->
        <div class="col-12 col-sm-6 col-md-4 mt-2">
            
            <select id='pais' name='pais' class="form-control w-100">
                <?php
                    echo "<option></option>";
                    foreach($paises as $row){
                        $selected = ( $pais == $row['id'] ) ? "selected" : "";
                        echo "<option value='".$row['id']."' ".$selected.">".$row['nombre']."</option>";
                    }
                ?>
            </select>
            
        </div>
                    
        <!-- estados -->
        <div class="col-12 col-sm-6 col-md-4 mt-2">            

            <select id="estado" name="estado" class="form-control w-100">
                <?php
                    echo "<option></option>";
                    foreach($estados as $row){
                        $selEstado = ( $estado == $row['value'] ) ? "selected" : "";
                        echo "<option value='".$row['value']."' ".$selEstado.">".$row['text']."</option>";
                    }
                ?>
            </select>

        </div>
        
        <!-- ciudades -->
        <div class="col-12 col-sm-6 col-md-4 mt-2">
                
            <select id="ciudad" name="ciudad" class="form-control w-100">
                <?php
                    echo "<option></option>";
                    foreach($ciudades as $row){
                        $selected = ( $ciudad == $row['value'] ) ? "selected" : "";
                        echo "<option value='".$row['value']."' ".$selected.">".$row['text']."</option>";
                    }
                ?>
            </select>

        </div>

        <!-- sexo -->
        <div class="col-12 col-sm-6 col-md-4 mt-2">
            
            <!-- sexo -->
            <select id="sexo" name="sexo" class="form-control">
                <option value="" class="text-muted">Selecciona un sexo</option>
                <option value="m"<?php if( "m" == $sexo){ echo "selected"; } ?>>Masculino</option>
                <option value="f"<?php if( "f" == $sexo){ echo "selected"; } ?>>Femenino</option>
            </select>
            
        </div>

        <!-- dispositivo -->
        <div class="col-12 col-sm-6 col-md-4 mt-2">
            <select name="dispositivo" class="form-control">
                    <option class="text-muted" value="">Selecciona un dispositivo</option>
                    <?php 
                        foreach($dispositivos as $row)
                        {
                            if($row['mostrarDispositivo'] == 1)
                            {
                                $selected = ($row['idDispositivo'] == $dispositivo) ? "selected" : "";
                                echo '<option value="'.$row['idDispositivo'].'"  '.$selected.'>'.$row['nombreDispositivo'].'</option>';
                            }
                        }
                    ?>
            </select>
        </div>

        <!-- folio -->
        <div class="col-12 col-sm-6 col-md-4 mt-2">
            <!-- campo -->
            <input
                class="form-control" 
                type="text" 
                name="folio" 
                value="<?php echo $folio; ?>" 
                id="filtroFolio" 
                placeholder="Introduce folio"
            />
        </div>

        <!-- submit, reset-->
        <div class="col-12 text-right py-3">

            <!-- reset -->
            <input
                class="btn btn-link btn-sm text-white"
                value="Limpiar" 
                id="reset" 
                type="button"
            />
        
            <!-- submit -->
            <input
                class="btn btn-sm text-white"
                style="background-color:orange;"
                value="Aplicar Filtro"
                type="submit"
            />

        </div>

    </form>

</div>

<!-- filtros aplicados -->
<div 
    class="
        p-2 bg-verde-menu text-white 
        <?php echo ( $filtrosAplicados != "")? "d-block": "d-none" ?>
    "
>
    <span>
        <strong>Filtro(s) Aplicado(s) (&nbsp;&nbsp;</strong>
        <?php echo (isset($filtrosAplicados))? $filtrosAplicados : ""; ?> 
        <strong>)</strong>
    </span>
    
</div>

