<?php 
    $root = $_SERVER['DOCUMENT_ROOT'];// tomar la ruta hacía el directorio raíz
    require ($root.'/panel/inc/comprueba.php');//comprueba si el usuario se encuentra autentificado
    require $root.'/inc/objetos/solicitud.php';//incluir objeto solicitud
    $title = "Beneficiarios";// titulo de header y de menú
    $requireBack = 1;// 1 requiere botón de regreso en menú 0 no requiere botón de regreso en el menú
    include 'mod/header.php';//incluir cabeceras html
    include 'mod/menu-principal.php';//incluir menú 

    //verificar si la variable folio fue creada
    if(isset($_GET['folio'])){
        
        if(!empty($_GET['folio'])){ //verificar si la variable folio contiene valor 
            $objSol = new Solicitud;//crear nuevo objeto solicitud
            $objSol->setId($_GET['folio']);//colocar valor a variable id solicitud
            $solicitudes = $objSol->muestraFolio();//mostrar las solicitudes que coinciden con el id solicitud
        
        }//if
    
    }//if
?>

<form class="mx-4 mt-3" action="" method="get">
    <div class="form-row justify-content-center">
        <div class="form-group col-md-6">
            <label class="lead" for="folio">Introduce el número de folio del beneficiario</label>
            <input
                name="folio" type="text" id="folio" 
                class="form-control" placeholder="introduce el número del folio"
                <?php if(isset($_GET['folio'])) echo "value='".$_GET['folio']."'" ?>
            />
        </div>
    </div>
    <div class="form-row justify-content-center">
        <div class="form-group col-md-6 text-right">
            <input
                type="submit" class="btn btn-success bg-markoptic" 
                value="consultar"
            />
        </div>
    </div>
</form>

<?php 

    //lista de beneficiarios encontrados
    if(isset($_GET['folio'])){
        
        if(empty($_GET['folio'])){
            ?>
            <p class="lead text-center fs-1-5 text-danger">"Por favor introduce un número de folio"</p>
            <?php
        }else{
        
            ?>
            <h4 class="mx-4 px-3">Beneficiarios Encontrados</h4>
            <div class="row mx-4 mt-3">
            <?php
            foreach($solicitudes as $row){
                ?>
                <div class="col-md-4">
                    <a class="lead text-dark" href="/panel/beneficiariosdatos?b=<?php echo $row['id'] ?>">
                        <?php echo $row['id']." -- ".$row['nombre']."&nbsp;".$row['apellidos']?>
                    </a>
                </div>
                <?php
            }//foreach
            ?>
            </div><!-- row -->
            <?php
        
        }//else

    }//if
?>