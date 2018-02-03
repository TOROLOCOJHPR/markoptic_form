<h3 class="px-4">Datos Beneficiario</h3>
<hr>
<h5 class="px-4">Imagenes Beneficiario</h5>
<form class="px-4" method="post" enctype="multipart/form-data" action="/editorBeneficiarios">
    <!-- fotografias del beneficiario -->
    <div class="row">
        <div class="col-md-3">
            <label>Foto 1</label>
            <img class="img-fluid" src="/imagenes/uploads/<?php echo $dato['foto1'] ?>">
            <input type="file" name="foto1" id="foto1" class="form-control-file">
        </div>
        <div class="col-md-3">
            <label>Foto 2</label>
            <img class="img-fluid" src="/imagenes/uploads/<?php echo $dato['foto2'] ?>">
            <input type="file" name="foto2" id="foto2" class="form-control-file">
        </div>
        <div class="col-md-3">
            <label>Foto 3</label>
            <img class="img-fluid" src="/imagenes/uploads/<?php echo $dato['foto3'] ?>">
            <input type="file" name="foto3" id="foto3" class="form-control-file">
        </div>
        <div class="col-md-3">
            <label>Foto Historia</label>
            <img class="img-fluid" src="/imagenes/uploads/beneficiados/<?php echo $dato['fotoH'] ?>">
            <input type="file" name="fotoH" id="fotoH" class="form-control-file">
        </div>
    </div>
    <!-- estatus solicitud -->
    <hr class="mt-4">
    <h5 class="mb-2">Estatus Solicitud</h5>
    <?php 
    $objBen->buscaEstatus($dato['estatus']);
    ?>
    <hr>
    <h5 class="mb-4">Datos Personales</h5>
    <!-- datos del beneficiario -->
    <div class="form-row">            
        <div class="form-group col-md-4">
            <label>Nombre(s)</label><input class="form-control" type="text" name="nombre" value="<?php if( isset($dato['nombreBen'] )){ echo $dato['nombreBen']; } ?>">
        </div>
        <div class="form-group col-md-4">
            <label>Apellido(s)</label><input class="form-control" type="text" name="apellido" value="<?php if(isset($dato['apellidoBen'])){echo $dato['apellidoBen'];} ?>">
        </div>
        <div class="form-group col-md-4">
            <label>Sexo</label>
            <select name="sexo" class="form-control">
                <option value="m" <?php if($dato['sexoBen'] == "Masculino"){echo'selected';}?> >Masculino</option>
                <option value="f" <?php if($dato['sexoBen'] == "Femenino"){echo'selected';} ?> >Femenino</option>
            </select>
        </div>
        <div class="form-group col-md-3">
            <label>Fecha Nacimiento</label><input class="form-control" type="date" name="fNacimiento" value="<?php if( isset($dato['fNacimientoBen'] )){ echo $dato['fNacimientoBen']; } ?>">
        </div>
        <div class="form-group col-md-3">
            <label>Pais</label>
            <?php
                if( isset($dato['paisId']) ){ $p = $dato['paisId']; }
                else{ $p = ""; }
                $objBen->buscaPais($p);
            ?>
        </div>
        <div class="form-group col-md-3">
            <label>Estado</label>
            <?php
                if( isset( $dato['estadoId'] ) ){$id = $dato['paisId']; $es = $dato['estadoId']; 
                }else{ $es = ""; }
                $objBen->buscaEstado($id,$es);
            ?>
        </div>
        <div class="form-group col-md-3">
            <label>Ciudad</label>
            <?php
                if( isset( $dato['ciudadId'] ) ){ $id = $dato['estadoId']; $c = $dato['ciudadId'];
                }else{ $c = ""; }
                $objBen->buscaCiudad($id,$c);
            ?>  
        </div>
        <div class="form-group col-md-6">
            <label>Calle y Número</label><input class="form-control" type="text" name="calle" value="<?php if( isset($dato['calleBen'] )){ echo $dato['calleBen']; } ?>">
        </div>
        <div class="form-group col-md-3">
            <label>Colonia</label><input class="form-control" type="text" name="colonia" value="<?php if( isset($dato['coloniaBen'] )){ echo $dato['coloniaBen']; } ?>">
        </div>
        <div class="form-group col-md-3">
            <label>Código Postal</label><input class="form-control" type="text" name="cp" value="<?php if( isset($dato['cpBen'] )){ echo $dato['cpBen']; } ?>">
        </div>
        <div class="form-group col-md-3">
            <label>Teléfono</label><input class="form-control" type="tel" name="tel" value="<?php if( isset($dato['telefonoBen'] )){ echo $dato['telefonoBen']; } ?>">
        </div>
        <div class="form-group col-md-3">
            <label>Email</label><input class="form-control" type="email" name="email" value="<?php if( isset($dato['emailBen'] )){ echo $dato['emailBen']; } ?>">
        </div>
        <div class="form-group col-md-3">
            <?php $objBen->buscaDispositivoAll($dato['dispositivoId']); ?>
        </div>
        <div class="form-group col-md-3">
            <?php $objBen->buscaCondicionesAll($dato['condicionId']); ?>
        </div>
        <div class="form-group col-md-3">
            <?php $objBen->buscaMedioAll($dato['medioId']); ?>
        </div>    
        <div class="form-group col-md-6">
            <label>Descripción del medio</label>
            <input class="form-control" type="text" name="medioOtro" value="<?php if( isset($dato['descMedioDif']) ){echo $dato['descMedioDif']; } ?>">
        </div>
        <div class="form-group col-md-9">
            <label>¿Por qué solicita?</label>
            <textarea name="breveDescripcion" rows="4" cols="50" class="form-control" ><?php if( isset($dato['porque'] )){ echo $dato['porque']; } ?></textarea>
        </div>    
    </div>
    <?php 
        if( $dato['nombreTut'] != "" ){
            echo'<h3>Datos Tutor</h3>';
            $independiente = 1;
        }else{
            $independiente = 0;
        }
    ?>
    <!-- datos del tutor -->
    <div class="form-row" <?php if($dato['nombreTut'] == ""){ echo'style="display:none;" ';} ?>>
        <input type="hidden" name="independiente" value="<?php echo $independiente; ?>">
        <div class="form-group col-md-4">
            <label>Nombre(s) Tutor</label><input class="form-control" type="text" name="nombreTut" value="<?php if( isset($dato['nombreTut'] )){ echo $dato['nombreTut']; } ?>">
        </div>
        <div class="form-group col-md-4">
            <label>Apellido(s) Tutor</label><input class="form-control" type="text" name="apellidoTut" value="<?php if( isset($dato['apellidoTut'] )){ echo $dato['apellidoTut']; } ?>">
        </div>
        <div class="form-group col-md-4">
            <label>Sexo Tutor</label>
            <select name="sexoTut" class="form-control">
                <option value="m" <?php if($dato['sexoTut'] == "Masculino"){echo'selected';} ?> >Masculino</option>
                <option value="f" <?php if($dato['sexoTut'] == "Femenino"){echo'selected';} ?>>Femenino</option>
            </select>
        </div>
        <div class="form-group col-md-4">
            <label>¿Vive con el Beneficiario?</label>
            <select name="viveBen" class="form-control">
                <option value="0" <?php if($dato['viveConBen'] == "no"){echo'selected';} ?> >no</option>
                <option value="1" <?php if($dato['viveConBen'] == "si"){echo'selected';} ?> >si</option>
            </select>
        </div>
        <div class="form-group col-md-4">
            <label>Parentesco</label>
            <?php $objBen->buscaParentesco($dato['parentescoId']); ?>
        </div>
        <div class="form-group col-md-4">
            <label>Fecha Nacimiento Tutor</label><input class="form-control" type="date" name="fNacimientoTut" value="<?php if( isset($dato['fNacimientoTut'] )){ echo $dato['fNacimientoTut']; } ?>">
        </div>
        <div class="form-group col-md-4">
            <label>Teléfono Tutor</label><input class="form-control" type="tel" name="telTut" value="<?php if( isset($dato['telefonoTut'] )){ echo $dato['telefonoTut']; } ?>">
        </div>
        <div class="form-group col-md-4">
            <label>Email Tutor</label><input class="form-control" type="email" name="emailTut" value="<?php if( isset($dato['emailTut'] )){ echo $dato['emailTut']; } ?>">
        </div>  
    </div>
    <input type="hidden" value="<?php if( $dato['fotoH'] != "" ){echo $dato['fotoH'];}?>" name="fotoH">
    <input type="hidden" value="<?php if( $dato['foto1'] != "" ){echo $dato['foto1'];}?>" name="foto1">
    <input type="hidden" value="<?php if( $dato['foto2'] != "" ){echo $dato['foto2'];}?>" name="foto2">
    <input type="hidden" value="<?php if( $dato['foto3'] != "" ){echo $dato['foto3'];}?>" name="foto3">
    <input type="hidden" value="<?php echo $b;?>" name="id">
    <input type="hidden" value="<?php echo $dato['idBen'];?>" name="idBen">
    <input type="hidden" value="1" name="update">
    <input class="btn bg-verde-menu text-white px-2 mb-4 mt-4" type="submit" value="editar">
</form>           
<button class="btn bg-verde-menu text-white mb-4 mt-4" <?php if( $dato['nombreTut'] != "" ){ echo'style="display:none;"'; } ?>>Agregar Tutor</button>