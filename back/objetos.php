<?php
include 'conexion.php';
//include 'conexion-old.php';
class DatosPersonales { //**DatosPersonales
    //--atributos DatosPersonales
    public $nombre,$apellidos,$sexo,$fecNacimiento,$ciudad,$calle,$colonia,$cp,$telefono,$email,$idMedioDifusion,$descMedioDif;
    
    //--getter and setter DatosPersonales
    public function getNombre(){return $this->nombre;}
	public function setNombre($sNombre){$this->nombre = $sNombre;}
    public function getApellidos(){return $this->apellidos;}
	public function setApellidos($sApellidos){$this->apellidos = $sApellidos;}
    public function getSexo(){return $this->sexo;}
	public function setSexo($sSexo){$this->sexo = $sSexo;}
    public function getNacimiento(){return $this->fecNacimiento;}
	public function setNacimiento($sNacimiento){$this->fecNacimiento = $sNacimiento;}
    public function getCiudad(){return $this->ciudad;}
	public function setCiudad($sCiudad){$this->ciudad = $sCiudad;}
    public function getCalle(){return $this->calle;}
	public function setCalle($sCalle){$this->calle = $sCalle;}
    public function getColonia(){return $this->colonia;}
	public function setColonia($sColonia){$this->colonia = $sColonia;}
    public function getCp(){return $this->cp;}
	public function setCp($sCp){$this->cp = $sCp;}
    public function getTelefono(){return $this->telefono;}
	public function setTelefono($sTelefono){$this->telefono = $sTelefono;}
    public function getEmail(){return $this->email;}
    public function setEmail($sEmail){$this->email = $sEmail;}
    public function getIdMedioDifusion(){return $this->idMedioDifusion;}
    public function setIdMedioDifusion($sIdMedioDifusion){$this->idMedioDifusion = $sIdMedioDifusion;}
    public function getDescMedioDif(){return $this->descMedioDif;}
    public function setDescMedioDif($sDescMedioDif){$this->descMedioDif = $sDescMedioDif;}
    
    //--//SELECT DatosPersonales
    
    //--funcion para buscar los países 
    public function buscaPais($p){
        try{
            $sql="SELECT id,nombre FROM paises ORDER BY nombre ASC";
            $objCon = new conexion();
            $con = $objCon->conectar();
            $result = $con->query($sql);
            echo"                
            <select id='pais' name='pais' class='form-control' required>
                <option value='' class='text-muted'>Selecciona un País</option>";
                while($row = $result->fetch_array()){
                  echo" <option value ='".$row['id']."' "; if( $p == $row['id'] ){ echo"selected"; } echo">".$row['nombre']."</option>";
                }                    
            echo"</select>";
        }catch(Exception $e){
            echo $e->getMessage();
        }finally{
            $con->close();
        }        
    }
    //--funcion para buscar los estados
    public function buscaEstado($id,$es){
        try{
           $sql="SELECT id,nombre FROM regiones WHERE id_pais = '".$id."' ORDER BY nombre ASC";
            $objCon = new conexion();
            $con = $objCon->conectar();
            $result = $con->query($sql);
            echo"                
            <select id='estado' name='estado' class='form-control' required>
                <option value='' class='text-muted'>Selecciona un Estado</option>";
                while($row = $result->fetch_array()){
                  echo" <option value ='".$row['id']."' "; if($es == $row['id']){ echo" selected"; } echo ">".$row['nombre']."</option>";
                }                   
            echo"</select>";
        }catch(Exception $e){
            echo $e->getMessage();
        }finally{
            $con->close();
        }   
    }
    //--funcion para buscar las ciudades
    public function buscaCiudad($id,$c){       
        try{
            $sql="SELECT id,nombre FROM localidades WHERE id_region ='".$id."' ORDER BY nombre ASC";
            $objCon = new conexion();
            $con = $objCon->conectar();
            $result = $con->query($sql);
            echo"                
            <select id='ciudad' name='ciudad' class='form-control' required>
                <option value='' class='text-muted'>Selecciona una Ciudad</option>";
                while($row = $result->fetch_array()){
                  echo" <option value ='".$row['id']."' "; if($c == $row['id']){ echo" selected"; } echo ">".$row['nombre']."</option>";
                }                    
            echo"</select>";
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }
    //--función para buscar el nombre del país
    public function buscaNombrePais($p){
        try{
            $sql = "SELECT nombre FROM paises WHERE id = '".$p."' ";
            $objCon = new conexion;
            $con = $objCon->conectar();
            $result = $con->query($sql);
            $row = $result->fetch_assoc();
            return $row['nombre'];
        }catch(Exception $e){
            echo $e->getMessage();
        }finally{
            $con->close();
        }
    }
    //--función para buscar el nombre del estado
    public function buscaNombreEstado($e){
        try{
            $sql = "SELECT nombre FROM regiones WHERE id = '".$e."' ";
            $objCon = new conexion;
            $con = $objCon->conectar();
            $result = $con->query($sql);
            $row = $result->fetch_assoc();
            return $row['nombre'];
        }catch(Exception $e){
            echo $e->getMessage();
        }finally{
            $con->close();
        }
    }
    //--función para buscar el nombre del ciudad
    public function buscaNombreCiudad($c){
        try{
            $sql = "SELECT nombre FROM localidades WHERE id = '".$c."' ";
            $objCon = new conexion;
            $con = $objCon->conectar();
            $result = $con->query($sql);
            $row = $result->fetch_assoc();
            return $row['nombre'];
        }catch(Exception $e){
            echo $e->getMessage();
        }finally{
            $con->close();
        }
    }

    //--//INSERT DatosPersonales
    //--//UPDATE DatosPersonales
    //--//DELETE DatosPersonales

}//--fin DatosPersonales

class Tutor extends DatosPersonales{ //**Tutor
    //--atributos Tutor
    public $independiente,$nombreTutor,$apellidoTutor,$nacimientoTutor,$sexoTutor,$viveBen,$parentesco,$telTutor,$emailTutor;
    
    //--getter and setter Tutor
    public function getIndependiente(){return $this->independiente;}
    public function setIndependiente($sIndependiente){$this->independiente = $sIndependiente;}
    public function getNombreTutor(){return $this->nombreTutor;}
    public function setNombreTutor($sNombreTutor){$this->nombreTutor = $sNombreTutor;}
    public function getApellidoTutor(){return $this->apellidoTutor;}
    public function setApellidoTutor($sApellidoTutor){$this->apellidoTutor = $sApellidoTutor;}
    public function getSexoTutor(){return $this->sexoTutor;}
    public function setSexoTutor($sSexoTutor){$this->sexoTutor = $sSexoTutor;}
    public function getViveBen(){return $this->viveBen;}
    public function setViveBen($sViveBen){$this->viveBen = $sViveBen;}
    public function getNacimientoTutor(){return $this->nacimientoTutor;}
    public function setNacimientoTutor($sNacimientoTutor){$this->nacimientoTutor = $sNacimientoTutor;}
    public function getParentesco(){return $this->parentesco;}
    public function setParentesco($sParentesco){$this->parentesco = $sParentesco;}
    public function getTelTutor(){return $this->telTutor;}
    public function setTelTutor($sTelTutor){$this->telTutor = $sTelTutor;}
    public function getEmailTutor(){return $this->emailTutor;}
    public function setEmailTutor($sEmailTutor){$this->emailTutor = $sEmailTutor;}

    //--//SELECT Tutor
    
    //--función para buscar el parentesco del tutor con el beneficiario
    public function buscaParentesco($parentesco){
        $sql ="SELECT id,parentesco FROM parentescos";
        $objCon = new conexion();
        $con = $objCon->conectar();
        $result = $con->query($sql);
        echo'
            <select id="parentesco" name="parentesco" class="form-control">
                <option value="" class="text-muted">Selecciona un Parentesco</option>
        ';
        while($row = $result->fetch_array()){
            echo'               
                <option value="'.$row["id"].'" '; if( $parentesco ==  $row["id"] ){ echo "selected";  } echo '>'.$row['parentesco'].'</option>
            ';
        }
        echo'</select>';
    }

    //--//INSERT Tutor
    //--//UPDATE Tutor
    //--//DELETE Tutor
}//-- fin Tutor

class Beneficiario extends Tutor{ //**Beneficiario
    //--atributos Beneficiario
    public $dispositivo,$condicion,$descObtencion,$estausSolicitud,$foto1,$foto2,$foto3;
    private $idSolicitud;
    //getter and setter Beneficiario
    public function getDispositivo(){return $this->dispositivo;}
    public function setDispositivo($sDispositivo){$this->dispositivo = $sDispositivo;}
    public function getCondicion(){return $this->condicion;}
    public function setCondicion($sCondicion){$this->condicion = $sCondicion;}
    public function getDescObtencion(){return $this->descObtencion;}
    public function setDescObtencion($sDescObtencion){$this->descObtencion = $sDescObtencion;}
    public function getEstatusSolicitud(){return $this->estatusSolicitud;}
    public function setEstatusSolicitud($sEstatusSolicitud){$this->estatusSolicitud = $sEstatusSolicitud;}
    public function getFoto1(){return $this->foto1;}
    public function setFoto1($sFoto1){$this->foto1 = $sFoto1;}
    public function getFoto2(){return $this->foto2;}
    public function setFoto2($sFoto2){$this->foto2 = $sFoto2;}
    public function getFoto3(){return $this->foto3;}
    public function setFoto3($sFoto3){$this->foto3 = $sFoto3;}
    
    //--//SELECT Beneficiario

    //--busca dispositivo biomedico
    public function buscaDispositivo($sol,$nd){
        try{
            $sql = "SELECT id,nombre FROM dispositivos WHERE nombre LIKE '%".$sol."%' AND mostrar = 1 ";
            $objCon = new conexion();
            $con = $objCon->conectar();
            $result = $con->query($sql);
            if($sol == "superior"){
            ?>               
                <select name="solicitud" class="form-control" required>
                    <option value="" class="text-muted" >Selecciona un dispositivo</option>
                    <?php
                    while($row = mysqli_fetch_array($result)){
                    ?>
                        <option value="<?php echo $row['id']; ?>" <?php echo ( $row['id'] == $nd )? "selected" : ""; ?> ><?php echo $row['nombre']; ?></option>
                    <?php
                    }  
                    ?>
                </select>
            <?php
            }else if($sol == 'colchon'){
                while($row = mysqli_fetch_array($result)){
            ?>
                <input type="hidden" name="solicitud" value="<?php echo $row['id']; ?>">
            <?php
                }
            }
        }catch(Exception $e){
            echo $e->getMessage();
        }finally{
            $con->close();
        }   
    }
    //--busca todos los dispositivos
    public function buscaDispositivoAll($id){
        try{
            $sql = "SELECT id,nombre FROM dispositivos WHERE mostrar = 1 ORDER BY nombre ASC";
            $objCon = new conexion();
            $con = $objCon->conectar();
            $result = $con->query($sql);           
            echo'
                <select name="solicitud" class="form-control">
                    <option value = ""'; if( $id == "" ){ echo " selected"; } echo'>Selecciona un dispositivo</option>    
            ';
                    while($row = mysqli_fetch_array($result)){
                    echo'<option value="'.$row['id'].'" '; if( $row['id'] == $id ){ echo "selected"; } echo'>'.$row['nombre'].'</option>';
                }
            echo'</select>';
        }catch(Exception $e){
            echo $e->getMessage();
        }finally{
            $con->close();
        }
    }
    //--busca el nombre del dispositivo solicitado
    public function buscaDispositivoNombre ($id){
        try{
            $objCon = new conexion;
            $con = $objCon->conectar();
            $sql = "SELECT nombre FROM dispositivos WHERE id = '".$id."'";
            $result = $con->query($sql);
            $row = $result->fetch_assoc();
            return $row['nombre'];
        }catch(Exception $e){
            $e->getMessage();
        }finally{
            $con->close();
        }
    }
    //--busca todas las condiciones
    public function buscaCondicionesAll($id){
        try{
            $sql = "SELECT id,condicion FROM condiciones  ORDER BY condicion ASC";
            $objCon = new conexion();
            $con = $objCon->conectar();
            $result = $con->query($sql);
            echo'
                <label>Condición amputación</label>
                    <select name="condicion" class="form-control">';
                    while($row = mysqli_fetch_array($result)){
                        echo'<option value="'.$row['id'].'" '; if( $row['id'] == $id ){ echo "selected"; } echo'>'.$row['condicion'].'</option>';
                    }
                echo'</select>';
        }catch(Exception $e){
            echo $e->getMessage();
        }finally{
            $con->close();
        }   
    }
    //--busca todos los medios
    public function buscaMedioAll($id){
        try{
            $sql = "SELECT id,medio,reqDesc,placeholder FROM mediosdifusion  ORDER BY medio ASC";
            $objCon = new conexion();
            $con = $objCon->conectar();
            $result = $con->query($sql);
            echo'
                <label>Medio de difusión</label>
                    <select name="medio" id="medio" class="form-control">';
                    while($row = mysqli_fetch_array($result)){
                        echo'<option value="'.$row['id'].'" '; if( $row['reqDesc'] != 0 ){ echo 'ph="'.$row['placeholder'].'"'; }else{ echo 'ph="" '; } if( $row['id'] == $id ){ echo "selected"; } echo'>'.$row['medio'].'</option>';
                    }
                echo'</select>';
        }catch(Exception $e){
            echo $e->getMessage();
        }finally{
            $con->close();
        }
    }

    //--busca condición de la parte del cuerpo a solicitar de la persona
    public function buscaCondicion($condicion,$vCondicion){
        try{
            if($condicion != "n/a"){
                $sql="SELECT id,condicion,imgFrontal,imgTrasera FROM condiciones WHERE condicion LIKE '".$condicion."%'";
                $objCon = new conexion();
                $con = $objCon->conectar();
                $result = $con->query($sql);
                ?>
                <p class="w-100 mx-1 mt-3"><strong>Selecciona la condición de tu <?php echo $condicion; ?></strong></p>
                <div class="row mx-0" id="condiciones">
                <?php
                while($row = $result->fetch_array()){
                    ?>
                    <div class="col-12 col-sm-6 col-md-4 text-center">
                        <div class="row mx-0">
                            <div class="col-12">
                                <label for="condicion<?php echo $row['id']; ?>" class="imgCondicion text-center">
                                    <img class="mx-auto" style="max-height:200px;position:relative;display:<?php echo ($vCondicion == $row['id'])?"none":""; ?>" src="/img/condiciones/<?php echo $row['imgFrontal']; ?>" alt="imagen frontal de <?php echo $row['condicion']; ?>">
                                    <img class="mx-auto" style="max-height:200px;position:relative;display:<?php echo ($vCondicion == $row['id'])?"":"none"; ?>;" src="/img/condiciones/<?php echo $row['imgTrasera']; ?>" alt="imagen trasera de <?php echo $row['condicion']; ?>">
                                </label>
                            </div>
                            <div class="col-12 form-check-inline px-5">
                                <input type="radio" value="<?php echo $row['id']; ?>" name="condicion" id="condicion<?php echo $row['id']; ?>" <?php echo ($vCondicion == $row['id'])?"checked":""; ?> required/><label for="condicion<?php echo $row['id']; ?>" class="rCondicion mb-0">&nbsp;<?php echo $row['condicion'] ?></label>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
                </div>
            <?php    
            }else{
            ?>
                <input type="hidden" name="condicion" value="5">
            <?php
            }
        }catch(Exception $e){
            echo $e->getMessage();
        }finally{
            if($condicion != "n/a"){
                $con->close();
            }
        }  
    }

    //--busca medio de difusión
    public function buscaDifusion($difusion,$otro){
        try{
            $sql="SELECT id,medio,reqDesc,placeholder FROM mediosdifusion ORDER BY medio ASC";
            $objCon = new conexion();
            $con = $objCon->conectar();
            $result = $con->query($sql);
            echo'
                <select name="enterado" id="enterado" class="form-control col-md-6 col-12" required>
                    <option value="" class="text-muted">Selecciona un medio de difusión</option>
            ';
            while($row = $result->fetch_array()){
                if($row['medio'] != "otro"){
                    echo'
                        <option value="'.$row['id'].'" '; if( $row['reqDesc'] != 0 ){ echo 'ph="'.$row['placeholder'].'"'; }else{ echo 'ph="" '; } if( $difusion == $row['id'] ){ echo "selected";} echo'>'.$row['medio'].'</option>
                    ';
                }else{
                    $otroId = $row['id'];$otroMedio = $row['medio'];$ph = $row['placeholder'];
                }
            }
            echo'
                    <option value="'.$otroId.'" id="otro" '; if( $difusion == $otroId ){ echo "selected";} echo' ph="'.$ph.'" >'.$otroMedio.'</option>
                </select>
                <div class="col-12 col-md-6">
                    <input type="text" class="form-control" name="enteradoOtro" value="'; if( $otro != "" ){ echo $otro; } echo'" placeholder=""'; if( $otro == "" ){ echo "disabled";} echo' required style="'; if( $otro != "" ){ echo"display:block;"; }else{ echo "display:none;"; } echo'">
                </div>
            ';

        }catch(Exception $e){
            echo $e->getMessage();
        }finally{
            $con->close();
        }  
    }
    //--busca estatus de la solicitud
    public function buscaEstatus($estatus){
        try{
            $sql ="SELECT id,estatus FROM estatussolicitud";
            $objCon = new conexion;
            $con= $objCon->conectar();
            $result = $con->query($sql);
            echo'<select name="estatus" class="mt-2 mb-2 form-control">';
            while($row = $result->fetch_array()){
                echo'<option value="'.$row['id'].'" '; if($row['id'] == $estatus){ echo "selected"; } echo'>'.$row['estatus'].'</option>';
            }
            echo'<select>';
        }catch(Exception $e){
            echo $e->getMessage();
        }finally{
            $con->close();
        }
    }
    //--busca datos del apadrinado
    public function buscaDatosApadrinado($id){
        try{
            $con = new conexion();
            $objCon = $con->conectar();

            $sql="SELECT 
	                beneficiarios.fecNacimiento,beneficiarios.nombre AS nombreBE,beneficiarios.apellidos,
                    beneficiarios.idCiudad,
                    dispositivos.nombre AS nombreDI,dispositivos.precio,
                    concat(dispositivos.siglas,'-',solicitudes.id) as folio,
                    paises.nombre AS pais,
                    regiones.nombre AS estado,
                    localidades.nombre AS ciudad,
                    imgsolicitud.fotoHistoria,
                    imgsolicitud.foto1,
                    solicitudes.recabado,solicitudes.id,solicitudes.porque
                FROM solicitudes
                    LEFT JOIN beneficiarios ON beneficiarios.id = solicitudes.idBeneficiario 
                    LEFT JOIN dispositivos ON dispositivos.id = solicitudes.idDispositivo
                    LEFT JOIN imgsolicitud ON imgsolicitud.idSolicitud = solicitudes.id 
   	                LEFT JOIN localidades ON localidades.id = beneficiarios.idCiudad 
                    LEFT JOIN regiones on regiones.id = localidades.id_region
                    LEFT JOIN paises ON paises.id = localidades.id_pais
                WHERE solicitudes.id = $id"
            ;

            $result = $objCon->query($sql);
            $result = mysqli_fetch_assoc($result);

            $datosBeneficiario = array(
                "id"=>$result['id'], //id solicitud
                "folio" =>$result['folio'], //folio del beneficiario 
                "nombre"=>$result['nombreBE'], //nombres beneficiario
                "apellidos"=>$result['apellidos'], //apellidos del beneficiario
                "fecNacimiento"=>$result['fecNacimiento'], //fecha de nacimiento del beneficiado
                "dispositivo"=>$result['nombreDI'], // nombre del dispositivo 
                "precio"=>$result['precio'], //precio del dispositivo
                "recabado"=>$result['recabado'], //monto total recabado por el beneficiario 
                "pais"=>$result['pais'], // país de residencia del beneficiario 
                "estado"=>$result['estado'], //estado de residencia del beneficiario
                "ciudad"=>$result['ciudad'], //ciudad de residencia del beneficiario
                "fotoHistoria"=>$result['fotoHistoria'], //foto con dispositivo del beneficiario
                "foto1"=>$result['foto1'], //foto con dispositivo del beneficiario
                "porque"=>$result['porque'] //por qué el beneficiario solicito el dispositivo
            );

            return $datosBeneficiario;

        }catch(Exception $e){
            echo $e->getMessage();
        }finally{
            $objCon->close();
        }
    }
    //--busca transacciones de cada usuario
    public function buscaTransacciones($b){
        try{
            $sql = "SELECT donacion,idBanwire,fecha FROM transacciones WHERE idSolicitud ='".$b."'";
            $cont = 0;
            $objCon = new conexion;
            $con= $objCon->conectar();
            $result = $con->query($sql);
            ?>
                <tr>
                    <th>Donación</th><th>Id Transacción</th><th>Fecha</th>
                </tr>
            <?php
            while($row = $result->fetch_assoc()){ 
            ?>
                <tr>
                    <td><?php echo $row['donacion']; ?></td>
                    <td><?php echo $row['idBanwire']; ?></td>
                    <td><?php echo $row['fecha']; ?></td>
                </tr>
            <?php 
            $cont = $cont + 1;
            }
            $resultadoB = ($cont == 0) ? "No se encontraron transacciones para este usuario" : "" ;
            echo $resultadoB;
        }catch(Exception $e){
            echo $e->getMessage();
        }finally{
            $con->close();
        }
    }

    //--busca datos del formulario
    public function buscaDatosFormulario($id){
        try{
            $con = new conexion();
            $objCon = $con->conectar();

            $sql="SELECT
                beneficiarios.nombre AS nombreBen,
                beneficiarios.id AS idBen, 
                beneficiarios.apellidos AS apellidosBen,
                beneficiarios.sexo AS sexoBen, 
                beneficiarios.fecNacimiento AS fNacimientoBen,
                localidades.id AS ciudadId, 
                localidades.nombre AS ciudad, 
                regiones.id AS estadoId, 
                regiones.nombre AS estado, 
                paises.id AS paisId, 
                paises.nombre AS pais, 
                beneficiarios.calle AS calleBen, 
                beneficiarios.colonia AS coloniaBen, 
                beneficiarios.cp AS cpBen, 
                beneficiarios.telefono AS telefonoBen,
                beneficiarios.email AS emailBen, 
                tutores.id AS idTut,
                tutores.nombre AS nombreTut,
                tutores.apellidos AS apellidosTut,
                tutores.sexo AS sexoTut,
                tutores.viveConBen,
                parentescos.id AS pId,
                parentescos.parentesco,
                tutores.fecNacimiento  AS fNacimientoTut,
                tutores.telefono AS telefonoTut, 
                tutores.email AS emailTut,
                dispositivos.id AS dispositivoId, 
                dispositivos.nombre AS dispositivo, 
                condiciones.id AS condicionId,
                condiciones.condicion,
                mediosdifusion.id AS medioId,
                mediosdifusion.medio,
                beneficiarios.descMedioDif,
                solicitudes.porque,
                solicitudes.fechaSolicitud,
                solicitudes.idEstatusSolicitud AS estatus,
                imgsolicitud.foto1,
                imgsolicitud.foto2,
                imgsolicitud.foto3,
                imgsolicitud.fotoHistoria
            FROM solicitudes
            LEFT JOIN beneficiarios ON beneficiarios.id = solicitudes.idBeneficiario
            LEFT JOIN mediosdifusion ON beneficiarios.idMedioDifusion = mediosdifusion.id
            LEFT JOIN localidades ON beneficiarios.idCiudad = localidades.id
            LEFT JOIN regiones ON localidades.id_region = regiones.id
            LEFT JOIN paises ON paises.id = regiones.id_pais
            LEFT JOIN tutores ON tutores.idBeneficiario = solicitudes.idBeneficiario
            LEFT JOIN parentescos ON parentescos.id = tutores.idParentesco
            LEFT JOIN dispositivos ON dispositivos.id = solicitudes.idDispositivo
            LEFT JOIN condiciones ON condiciones.id = solicitudes.idCondicion
            LEFT JOIN imgsolicitud ON imgsolicitud.idSolicitud = solicitudes.id
            WHERE solicitudes.id = $id
            ";

            $result = $objCon->query($sql);
            $result = mysqli_fetch_assoc($result);
            $sT = "";
            if( $result['sexoBen'] == "m" ){ $sB = "Masculino"; }elseif( $result['sexoBen'] == "f" ){ $sB = "Femenino"; }
            if( $result['sexoTut'] == "m" ){ $sT = "Masculino"; }elseif( $result['sexoTut'] == "f" ){ $sT = "Femenino"; }
            if( $result['viveConBen'] == 0 ){ $vB = "no"; }elseif( $result['viveConBen'] == 1 ){ $vB = "si"; }
            $datosFormulario = array(
                //"id"=>$result['id'], //id solicitud
                "nombreBen"=>$result['nombreBen'], //nombres beneficiario
                "idBen"=>$result['idBen'], //nombres beneficiario
                "apellidoBen"=>$result['apellidosBen'], //apellidos del beneficiario
                "sexoBen"=>$sB, //sexo  del beneficiario
                "fNacimientoBen"=>$result['fNacimientoBen'], //fecha de nacimiento del beneficiado
                "ciudad"=>$result['ciudad'], //ciudad de residencia del beneficiario
                "ciudadId"=>$result['ciudadId'], //ciudad de residencia del beneficiario
                "estado"=>$result['estado'], //estado de residencia del beneficiario
                "estadoId"=>$result['estadoId'], //estado de residencia del beneficiario
                "pais"=>$result['pais'], // país de residencia del beneficiario 
                "paisId"=>$result['paisId'], // país de residencia del beneficiario 
                "calleBen"=>$result['calleBen'], //ciudad de residencia del beneficiario
                "coloniaBen"=>$result['coloniaBen'], //ciudad de residencia del beneficiario
                "cpBen"=>$result['cpBen'], //ciudad de residencia del beneficiario
                "telefonoBen"=>$result['telefonoBen'], //ciudad de residencia del beneficiario
                "emailBen"=>$result['emailBen'], //ciudad de residencia del beneficiario
                "idTut"=>$result['idTut'], //ciudad de residencia del beneficiario
                "nombreTut"=>$result['nombreTut'], //ciudad de residencia del beneficiario
                "apellidoTut"=>$result['apellidosTut'], //ciudad de residencia del beneficiario
                "sexoTut"=>$sT, //ciudad de residencia del beneficiario
                "viveConBen"=>$vB, //ciudad de residencia del beneficiario
                "parentescoId"=>$result['pId'], // nombre del dispositivo 
                "parentesco"=>$result['parentesco'], // nombre del dispositivo 
                "fNacimientoTut"=>$result['fNacimientoTut'], // nombre del dispositivo 
                "telefonoTut"=>$result['telefonoTut'], // nombre del dispositivo 
                "emailTut"=>$result['emailTut'], // nombre del dispositivo 
                "dispositivoId"=>$result['dispositivoId'], // nombre del dispositivo 
                "dispositivo"=>$result['dispositivo'], // nombre del dispositivo 
                "condicionId"=>$result['condicionId'], // nombre del dispositivo 
                "condicion"=>$result['condicion'], // nombre del dispositivo 
                "medioId"=>$result['medioId'], // nombre del dispositivo 
                "medio"=>$result['medio'], // nombre del dispositivo 
                "descMedioDif"=>$result['descMedioDif'], // nombre del dispositivo 
                "porque"=>$result['porque'], //por qué el beneficiario solicito el dispositivo
                "estatus"=>$result['estatus'], //por qué el beneficiario solicito el dispositivo
                "foto1"=>$result['foto1'], //por qué el beneficiario solicito el dispositivo
                "foto2"=>$result['foto2'], //por qué el beneficiario solicito el dispositivo
                "foto3"=>$result['foto3'], //por qué el beneficiario solicito el dispositivo
                "fotoHistoria"=>$result['fotoHistoria'], //por qué el beneficiario solicito el dispositivo
                "fechaSolicitud"=>$result['fechaSolicitud']//fecha de inicio de la solicitud
            );

            return $datosFormulario;

        }catch(Exception $e){
            echo $e->getMessage();
        }finally{
            $objCon->close();
        }
    }
    //--busca ultimo id de las solicitudes de los beneficiarios
    public function buscaMaxSolicitudes($con){
        try{
            //$con = new conexion();
            //$objCon = $con->conectar();
            $sql = "SELECT MAX(id) as total FROM solicitudes";
            $result = $con->query($sql);
            $result = mysqli_fetch_assoc($result);
            $idMax = $result['total'];
            return $idMax;
        }catch(Exception $e){
            echo $e->getMessage();
        }finally{
            //$con->close();
        }
    }
    //--busca el total de solicitudes de los beneficiarios con estatus
    public function buscaCountSolicitudes($con,$estatus){
        try{
            //$objCon = new conexion();
            //$con = $objCon->conectar();
            $sql = "SELECT COUNT(id) as total FROM solicitudes WHERE idEstatusSolicitud = '".$estatus."'";
            $result = $con->query($sql);
            $result = mysqli_fetch_assoc($result);
            $idCount = $result['total'];
            return $idCount;
        }catch(Exception $e){
            echo $e->getMessage();
        }finally{
            //$con->close();
        }
    }
    //--busca el total de solicitudes de los beneficiarios
    public function buscaTotalSolicitudes(){
        try{
            $objCon = new conexion();
            $con = $objCon->conectar();
            $sql = "SELECT COUNT(id) as total FROM solicitudes";
            $result = $con->query($sql);
            $result = mysqli_fetch_assoc($result);
            $idCount = $result['total'];
            return $idCount;
        }catch(Exception $e){
            echo $e->getMessage();
        }finally{
            $con->close();
        }
    } 
    //--busca el total de solicitudes de protesis superior derecha
    public function buscaTotalPsd(){
        try{
            $objCon = new conexion();
            $con = $objCon->conectar();
            $sql = "SELECT COUNT(id) as total FROM solicitudes where idDispositivo = 1";
            $result = $con->query($sql);
            $result = mysqli_fetch_assoc($result);
            $idCount = $result['total'];
            return $idCount;
        }catch(Exception $e){
            echo $e->getMessage();
        }finally{
            $con->close();
        }
    }
    //--busca el total de solicitudes de protesis superior izquierda
    public function buscaTotalPsi(){
        try{
            $objCon = new conexion();
            $con = $objCon->conectar();
            $sql = "SELECT COUNT(id) as total FROM solicitudes where idDispositivo = 2";
            $result = $con->query($sql);
            $result = mysqli_fetch_assoc($result);
            $idCount = $result['total'];
            return $idCount;
        }catch(Exception $e){
            echo $e->getMessage();
        }finally{
            $con->close();
        }
    }
    //--busca el total de solicitudes de colchón vittmat
    public function buscaTotalCv(){
        try{
            $objCon = new conexion();
            $con = $objCon->conectar();
            $sql = "SELECT COUNT(id) as total FROM solicitudes where idDispositivo = 3";
            $result = $con->query($sql);
            $result = mysqli_fetch_assoc($result);
            $idCount = $result['total'];
            return $idCount;
        }catch(Exception $e){
            echo $e->getMessage();
        }finally{
            $con->close();
        }
    }
    //--busca el total de solicitudes de protésis inferior derecha
    public function buscaTotalPid(){
        try{
            $objCon = new conexion();
            $con = $objCon->conectar();
            $sql = "SELECT COUNT(id) as total FROM solicitudes where idDispositivo = 4";
            $result = $con->query($sql);
            $result = mysqli_fetch_assoc($result);
            $idCount = $result['total'];
            return $idCount;
        }catch(Exception $e){
            echo $e->getMessage();
        }finally{
            $con->close();
        }
    }
    //--busca el total de solicitudes de protésis inferior izquierda
    public function buscaTotalPii(){
        try{
            $objCon = new conexion();
            $con = $objCon->conectar();
            $sql = "SELECT COUNT(id) as total FROM solicitudes where idDispositivo = 5";
            $result = $con->query($sql);
            $result = mysqli_fetch_assoc($result);
            $idCount = $result['total'];
            return $idCount;
        }catch(Exception $e){
            echo $e->getMessage();
        }finally{
            $con->close();
        }
    }
    //--buscar beneficiarios
    public function buscaBeneficiario($nombre,$estatus){
        try{
            $sql ="select nombre, apellidos, concat(beneficiarios.nombre,beneficiarios.apellidos) AS nombres ,solicitudes.id
                from solicitudes INNER join beneficiarios on solicitudes.idBeneficiario = beneficiarios.id
                WHERE solicitudes.idEstatusSolicitud = '".$estatus."'
                HAVING nombres like '%".$nombre."%' ESCAPE ' ' ORDER by nombre ASC
            ";
            $con= new conexion;
            $objCon = $con->conectar();
            $result = $objCon->query($sql);
            if( mysqli_num_rows($result) > 0 ){
                while( $row = mysqli_fetch_array($result) ){
                    echo "<a class='text-dark d-block' href='/apadrina?b=".$row['id']."'>&nbsp;&nbsp;".$row['nombre']." ".$row['apellidos']."</a>";
                }
            }else{
                echo "No se encontraron benficiarios";
            }
        }catch(Exception $e){
            echo $e->getMessage();
        }finally{
            $objCon->close();
        }
    }
    //--buscar beneficiarios por folio
    public function buscaBeneficiarioFolio($f){
        try{
            $sql ="SELECT solicitudes.id, beneficiarios.nombre,beneficiarios.apellidos 
                FROM solicitudes
                INNER JOIN beneficiarios ON beneficiarios.id = solicitudes.idBeneficiario
                WHERE solicitudes.id LIKE '".$f."%' ";
            $con= new conexion;
            $objCon = $con->conectar();
            $result = $objCon->query($sql);
            if( mysqli_num_rows($result) > 0 ){
                echo "<div class='row mx-0'>";
                while( $row = mysqli_fetch_array($result) ){
                    echo "<div class='col-md-4 px-0'><a href='/editorBeneficiarios?b=".$row['id']."&f=".$f."' id='res' class='mb-0 text-dark'>&nbsp;&nbsp;".$row['id']." -- ".$row['nombre']." ".$row['apellidos']."</a></div>";
                }
                echo "</div>";
            }else{
                echo "No se encontraron beneficiarios";
            }
        }catch(Exception $e){
            echo $e->getMessage();
        }finally{
            $objCon->close();
        }
    }
    //--busca folio antiguo del beneficiario
    public function buscaFolioAntiguo($idBen){
        try{
            $sql ="SELECT folio FROM beneficiario_solicitud INNER JOIN solicitud on beneficiario_solicitud.id_solicitud = solicitud.id WHERE beneficiario_solicitud.id = '".$idBen."' ";
            $objCon = new conexionOld;
            $con = $objCon->conectar();
            $result = $con->query($sql);
            $result = $result->fetch_assoc();
            if($result['folio'] != ""){
                $folio = $result['folio'];
            }else{
                $folio = "Sin Zip";
            }
            return $folio;
        }catch(Exception $e){
            echo $e->getMessage();
        }finally{
            $con->close();
        }
    }
    //--busca precio del dispositivo
    public function buscaPrecio($idD){
        try{
            $sql ="SELECT precio FROM dispositivos WHERE id = '".$idD."' ";
            $objCon = new conexion;
            $con = $objCon->conectar();
            $result = $con->query($sql);
            $result = $result->fetch_assoc();
            return $result['precio'];
        }catch(Exception $e){
            echo $e->getMessage();
        }finally{
            $con->close();
        }
    }
    //--busca roles de los usuarios
    public function buscaRoles(){
        try{
            $array = array();
            $objCon = new conexion;
            $con = $objCon->conectar();
            $sql = "SELECT id,nombre FROM roles";
            $result = $con->query($sql);
            while($row = $result->fetch_array() ){
                array_push( $array,array('id'=>$row['id'],'nombre'=>$row['nombre']) );
            }
            return $array;
        }catch(Exception $e){
            echo $e->getMessage();
        }finally{
            $con->close();
        }
    }
    //busca usuarios
    public function buscaUsuarios(){
        try{
            $array = array();
            $objCon = new conexion;
            $con = $objCon->conectar();
            $sql ="SELECT id,user FROM usuarios WHERE eliminado = 0";
            $result = $con->query($sql);
            while( $row = $result->fetch_array() ){
                array_push($array,array('id'=>$row['id'],'usuario'=>$row['user']));
            }
            return $array;
        }catch(Exception $e){
            echo $e->getMessage();
        }finally{
            $con->close();
        }
    }

    //--//INSERT Beneficiario

    //--inserta solicitud 
    public function inserta(){
        try{
        $objCon = new conexion();
        $con = $objCon->conectar();
        $con->autocommit(FALSE);
        $error=0;
        $sql="INSERT INTO beneficiarios(nombre,apellidos,sexo,fecNacimiento,idCiudad,calle,colonia,cp,telefono,email,idMedioDifusion,descMedioDif) VALUES ('".$this->nombre."','".$this->apellidos."','".$this->sexo."','".$this->fecNacimiento."','".$this->ciudad."','".$this->calle."','".$this->colonia."','".$this->cp."','".$this->telefono."','".$this->email."','".$this->idMedioDifusion."','".$this->descMedioDif."')";
        $con->query($sql)?NULL:$error=1;
        //echo "beneficiario insertado";   
        $id = mysqli_insert_id($con);
        if($this->independiente == '1'){
            $sql="INSERT INTO tutores(idBeneficiario,nombre,apellidos,fecNacimiento,sexo,viveConBen,idParentesco,telefono,email) VALUES ('".$id."','".$this->nombreTutor."','".$this->apellidoTutor."','".$this->nacimientoTutor."','".$this->sexoTutor."','".$this->viveBen."','".$this->parentesco."','".$this->telTutor."','".$this->emailTutor."')";
            $con->query($sql)?NULL:$error=1;
            //echo "tutor insertado";   
        }
        $sql="INSERT INTO solicitudes(idBeneficiario,idCondicion,idDispositivo,idEstatusSolicitud,porque)VALUES('".$id."','".$this->condicion."','".$this->dispositivo."','1','".$this->descObtencion."')";
        $con->query($sql)?NULL:$error=1;
        //echo "solicitud insertado";
        $id = mysqli_insert_id($con);
        //echo $id;
        $sql="INSERT INTO imgsolicitud(foto1,foto2,foto3,idSolicitud)VALUES('".$this->foto1."','".$this->foto2."','".$this->foto3."',".$id.")";
        $con->query($sql)?NULL:$error=1;
            //echo $error; 
            if(!$error){                
                $con->commit();
                //envia correo al beneficiario
                
                $m = $this->mensajeFormulario($id);
                $to = $this->email;
                $subject = "Solicitud Formulario Markoptic";
                $headers = "MIME-Version: 1.0"."\r\n";
                $headers .= "Content-Type: text/html; charset=ISO-8859-1"."\r\n";
                $headers.= "Cc:jparra@markoptic.mx,racosta@fundacionmarkoptic.org.mx"."\r\n";
                $headers .= "From: Fundación Markoptic <info@fundacionmarkoptic.org.mx>";
                $result = mail($to,utf8_decode($subject),utf8_decode($m),utf8_decode($headers));
                return true;
                //header('Location: ../gracias?solicitud=exito');
            }  else {
                $con->rollback();
                //header('Location: ../gracias?solicitud=fail');
            }
        }catch(Exception $e){
            echo $e->getMessage();
        }finally{
            $con->close();
        }
    }
    //--insertar los ingresos recabados 
    public function insertTransaccion($total,$solicitud,$idBanwire,$auth_code,$event,$hash,$status){
        try{
            $sql= "INSERT INTO transacciones(donacion,idSolicitud,idBanwire,auth_code,event,hash,status)VALUES('".$total."','".$solicitud."','".$idBanwire."','".$auth_code."','".$event."','".$hash."','".$status."')";
            $objCon = new conexion();
            $con = $objCon->conectar();
            if($con->query($sql)){
                //echo "insercion exitosa";
            }else{
                //echo "insercion fallida";
            }
        }catch(Exception $e){
            $e->getMessage();
        }finally{
            $con->close();
        }
    }
    //--función para insertar los ingresos recabados fuera de linea 
    public function insertTransacciones($sql){
        try{
            $objCon = new conexion();
            $con = $objCon->conectar();
            $con->query($sql);
        }catch(Exception $e){
            $e->getMessage();
        }finally{
        }
    }
    //-- crea usuario
    public function creaUsuario($user,$hash,$rol){
        try{
            $m = 0;
            $array = array();
            $objCon = new conexion;
            $con = $objCon->conectar();
            $sqlBusca = "SELECT id,user,eliminado FROM usuarios  WHERE user ='".$user."'";
            $busca = $con->query($sqlBusca);
            if($busca->num_rows > 0){
                $row = $busca->fetch_assoc();
                // 1 usuario existente 2 usuario existente eliminado
                $m = ($row['eliminado'] == 0)? 1 : 2;
                array_push($array,array('id'=>$row['id'],'m'=>$m));
            }else{
                $sql = "INSERT INTO usuarios(user,pass,rol) VALUES('".$user."','".$hash."','".$rol."')";
                if(!$con->query($sql)){
                    $m = 3;
                    array_push($array,array('id'=>'0','m'=>$m));
                }
            }
            return $array;
        }catch(Exception $e){
            echo $e->getMessage();
        }finally{
            $con->close();
        }
    }

    //--//UPDATE Beneficiario

    //--función para actualizar imagenes de los beneficiarios
    public function updateFotoBen($id,$add,$foto){
        try{
            $sqlSelect="SELECT idSolicitud FROM imgsolicitud WHERE idSolicitud= '".$id."' ";
            $sqlInsert = "INSERT INTO imgsolicitud(".$foto.",idSolicitud) VALUES('".$add."','".$id."')";
            $sqlUpdate= "update imgsolicitud set ".$foto." = '".$add."' where idSolicitud = '".$id."' ";
            $objCon = new conexion();
            $con = $objCon->conectar();
            $result = $con->query($sqlSelect);
            if( $result->num_rows > 0){
                $con->query($sqlUpdate);
            }else{
                echo "no encontrado";
                $con->query($sqlInsert);
            }
        }catch(Exception $e){
            $e->getMessage();
        }finally{
            $con->close();
        }
    }
    //--función para actualizar los datos del beneficiario 
    public function updateDatosBen($id){
        try{
            $sqlUpdate= "update beneficiarios set nombre='".$this->nombre."', apellidos='".$this->apellidos."', sexo='".$this->sexo."',fecNacimiento='".$this->fecNacimiento."', idCiudad='".$this->ciudad."',calle='".$this->calle."',colonia='".$this->colonia."',cp='".$this->cp."',telefono='".$this->telefono."',email='".$this->email."',idMedioDifusion='".$this->idMedioDifusion."',descMedioDif='".$this->descMedioDif."' where id = '".$id."' ";
            $objCon = new conexion();
            $con = $objCon->conectar();
            //if ternario 
            return ( $con->query($sqlUpdate) ) ? true : false;
        }catch(Exception $e){
            $e->getMessage();
        }finally{
            $con->close();
        }
    }
    //--función para actualizar los datos del tutor 
    public function updateDatosTut($idT,$idB){
        try{
            $sqlInsert = "INSERT INTO tutores(idBeneficiario,nombre,apellidos,fecNacimiento,sexo,viveConBen,idParentesco,telefono,email) values('".$idB."','".$this->nombreTutor."','".$this->apellidoTutor."','".$this->nacimientoTutor."','".$this->sexoTutor."','".$this->viveBen."','".$this->parentesco."','".$this->telTutor."','".$this->emailTutor."')";
            $sqlUpdate= "update tutores set nombre='".$this->nombreTutor."', apellidos='".$this->apellidoTutor."',fecNacimiento='".$this->nacimientoTutor."', sexo='".$this->sexoTutor."',viveConBen='".$this->viveBen."',idParentesco='".$this->parentesco."',telefono='".$this->telTutor."',email='".$this->emailTutor."' where id = '".$idT."' ";
            $objCon = new conexion();
            $con = $objCon->conectar();
            if($idT != ""){
               return ( $con->query($sqlUpdate) ) ? true : false;
            }else{
                return ( $con->query($sqlInsert) ) ? true : false;
            }
        }catch(Exception $e){
            $e->getMessage();
        }finally{
            $con->close();
        }
    }
    //--función para actualizar los datos del beneficiario 
    public function updateDatosSol($id){
        try{
            $sqlUpdate= "update solicitudes set idCondicion='".$this->condicion."',idDispositivo='".$this->dispositivo."',idEstatusSolicitud='".$this->estatusSolicitud."', porque = '".$this->descObtencion."' where id = '".$id."' ";
            $objCon = new conexion();
            $con = $objCon->conectar();
            return ( $con->query($sqlUpdate) ) ? true : false;
        }catch(Exception $e){
            $e->getMessage();
        }finally{
            $con->close();
        }
    }
    //-- actualiza contraseña del usuario 
    public function actualizaContraseña($id,$hash){
        try{
            $objCon = new conexion;
            $con = $objCon->conectar();
            $sql = "UPDATE usuarios SET pass = '".$hash."' WHERE id = '".$id."' ";
            $m = (!$con->query($sql))? 1 : 0;
            return $m;
        }catch(Exception $e){
            echo $e->getMessage();
        }finally{
            $con->close();
        }
    }
    
    //--//DELETE Beneficiario
    
    //-- elimina usuario
    public function eliminaUsuario($id){
        try{
            $objCon = new conexion;
            $con = $objCon->conectar();
            $sql = "UPDATE usuarios SET eliminado = 1 WHERE id ='".$id."'";
            $m = (!$con->query($sql))? 1 : 0 ;
            return $m;
        }catch(Exception $e){
            echo $e->getMessage();
        }finally{
            $con->close();
        }
    }
    //-- elimina usuario
    public function restauraUsuario($id,$hash,$rol){
        try{
            $objCon = new conexion;
            $con = $objCon->conectar();
            $sql = "UPDATE usuarios SET eliminado = 0, pass = '".$hash."', rol = '".$rol."' WHERE id ='".$id."'";
            $m = (!$con->query($sql))? 1 : 0 ;
            return $m;
        }catch(Exception $e){
            echo $e->getMessage();
        }finally{
            $con->close();
        }
    }

    //--//GENERA

    //--genera mensaje a enviar al formulario 
    public function mensajeFormulario($id){
        try{
            $datosFormulario = $this->buscaDatosFormulario($id);
            $message = '
            <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
            <html xmlns="http://www.w3.org/1999/xhtml">
                <head>
                    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
                    <title>Solicitud Fundación Markoptic</title>
                <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
                </head>
                <body style="margin: 0; padding: 0;">
                    <table cellpadding="0" cellspacing="0" width="480px" align="center">
                        <tr>
                            <td align="center">
                                <img src="http://fundacionmarkoptic.org.mx/img/respuesta%20heart.jpg" width="100%"  style="display:block;">
                            </td>
                        </tr>
                        <tr><td><strong>DATOS DEL BENEFICIARIO</strong></td></tr>
                        <tr><td><strong>Nombre: </strong><span>'.$datosFormulario['nombreBen'].'</span></td></tr>
                        <tr><td><strong>Apellidos: </strong><span>'.$datosFormulario['apellidoBen'].'</span></td></tr>
                        <tr><td><strong>Sexo: </strong><span>'.$datosFormulario['sexoBen'].'</span></td></tr>
                        <tr><td><strong>Fecha de nacimiento: </strong><span>'.$datosFormulario['fNacimientoBen'].'</span></td></tr>
                        <tr><td><strong>Ciudad: </strong><span>'.$datosFormulario['ciudad'].'</span></td></tr>
                        <tr><td><strong>Estado: </strong><span>'.$datosFormulario['estado'].'</span></td></tr>
                        <tr><td><strong>País: </strong><span>'.$datosFormulario['pais'].'</span></td></tr>
                        <tr><td><strong>Calle y número: </strong><span>'.$datosFormulario['calleBen'].'</span></td></tr>
                        <tr><td><strong>Colonia: </strong><span>'.$datosFormulario['coloniaBen'].'</span></td></tr>
                        <tr><td><strong>Código postal: </strong><span>'.$datosFormulario['cpBen'].'</span></td></tr>
                        <tr><td><strong>Teléfono</strong><span>'.$datosFormulario['telefonoBen'].'</span></td></tr>
                        <tr><td><strong>Email: </strong><span>'.$datosFormulario['emailBen'].'</span></td></tr>
                        ';
                    if( $_POST['independiente'] == 1 ){
                    $message .='
                        <tr><td><strong>DATOS DEL TUTOR</strong></td></tr>
                        <tr><td><strong>Nombre: </strong><span>'.$datosFormulario['nombreTut'].'</span></td></tr>
                        <tr><td><strong>Apellidos: </strong><span>'.$datosFormulario['apellidoTut'].'</span></td></tr>
                        <tr><td><strong>Sexo: </strong><span>'.$datosFormulario['sexoTut'].'</span></td></tr>
                        <tr><td><strong>Vive con el beneficiario: </strong><span>'.$datosFormulario['viveConBen'].'</span></td></tr>
                        <tr><td><strong>Parentesco: </strong><span>'.$datosFormulario['parentesco'].'</span></td></tr>
                        <tr><td> <strong>Fecha de nacimiento: </strong><span>'.$datosFormulario['fNacimientoTut'].'</span></td></tr>
                        <tr><td><strong>Teléfono: </strong><span>'.$datosFormulario['telefonoTut'].'</span></td></tr>
                        <tr><td><strong>Email: </strong><span>'.$datosFormulario['emailTut'].'</span></td></tr>   
                        ';
                    }
                    $message.= '
                        <tr><td><strong>Dispositivo Solicitado: </strong><span>'.$datosFormulario['dispositivo'].'</span></td></tr>
                        <tr><td><strong>Condición de la amputación: </strong><span>'.$datosFormulario['condicion'].'</span></td></tr>
                        <tr><td><strong>Medio de difusión: </strong><span>'.$datosFormulario['medio'].'</span></td></tr>
                    ';
                    if( $datosFormulario['descMedioDif'] != "" ){
                        $message .= '
                        <tr><td><strong>Nombre del medio: </strong><span>'.$datosFormulario['descMedioDif'].'</span></td></tr>
                        ';            
                    }
                    $message.='
                        <tr><td><strong>Por qué solicito el dispositivo: </strong><span>'.$datosFormulario['porque'].'</span><tr></tr>
                        <tr>
                            <td align="center">
                                <img src="http://fundacionmarkoptic.org.mx/img/footer-correo.jpg" width="100%"  style="display:block;">
                            </td>
                        </tr>
                    </table>
                </body>
            </html>
            ';
            //echo $message;
            return $message;
        }catch(Exception $e){
            echo $e->getMessage();
        }finally{

        }
    }

    //--generar solicitudes aleatoriamente para el sistema de apadrinamiento
    public function generaSolicitudesAleatorias($mostrar,$estatus,$sentencia,$inner){
        try{
            $cont = 0;
            $index = 0;
            $arregloRandom = array();
            $objCon = new conexion;
            $con = $objCon->conectar();
            $idMax = $this->buscaMaxSolicitudes($con);
            //echo "idMax".$idMax."<br>";
            $idCount = $this->buscaCountSolicitudes($con,$estatus);
            //echo "idCount".$idCount."<br>";
            if($idCount == 0){ 
                echo "no se encontraron Solicitudes";
                return 0;
            }else{
                if($idCount < $mostrar){
                    $mostrar = $idCount;
                }
                while($cont < $mostrar){
                    $num = rand(1,$idMax);
                    $sql = "SELECT id FROM solicitudes".$inner." WHERE id = '".$num.$sentencia;
                    echo $sql."<br>";
                    $result = $con->query($sql);
                    if(mysqli_num_rows($result)>0){
                        foreach($arregloRandom as $fila){
                            if($fila == $num){
                                $index = 1;
                                //echo $fila;
                                break 1;
                            }
                        }
                        if($index == 0){
                            $arregloRandom[$cont] = $num;
                            $cont = $cont + 1;
                        }else{
                            $index = 0;
                        }
                        //echo " encontrado";
                    }else{
                        //echo " no-encontrado";
                    }
                }
            }
            return $arregloRandom;
        }catch(Exception $e){
            $e->getMessage();
        }finally{
            $con->close();
        }
    }
    //--genera solicitudes por medio de filtraciones
    public function generaSolicitudesFiltro($sql){
        try{
            $cont = 0;
            $arreglo = array();
            $multidimensional ="";
            $objCon = new conexion;
            $con = $objCon->conectar();
            $result = $con->query($sql);
            //echo $sql;
            while($row = $result->fetch_array()){
                // array_push($arreglo,array('id'=>$row['id'],'mostrar'=>0));
                array_push($arreglo,array('id'=>$row['id']));
            }
            return $arreglo;
            //echo json_encode($arreglo);
        }catch(Exception $e){
            $e->getMessage();
        }finally{

        }
    }

    //--genera edad actual del beneficiario
    public function generaEdadBeneficiario($fecha){
        try{            
            $now = new DateTime();
            //echo json_encode($now);
            $fecNac = new DateTime($fecha);
            $edad = $now->diff($fecNac);
            return $edad->y;       
        }catch(Exception $e){
            echo $e-getMessage();
        }finally{

        }
    }
    
    //--valida email
    function validaEmail($mail){
        //$invalidos = array("correo.com","correo.mx","test.com","test.mx");
        $dominio = explode('@',$mail);
        //var_dump( $dominio);
        if(checkdnsrr($dominio[1])){
            return true;
        }else{
            return false;
        }
    }

    //--genera el total de los dispositivos y solicitudes
    public function generaTotalSolicitudes($activeSheet){
        try{
            $totalSol = $this->buscaTotalSolicitudes();
            $totalPsd = $this->buscaTotalPsd();
            $totalPsi = $this->buscaTotalPsi();
            $totalCv = $this->buscaTotalCv();
            $totalPID = $this->buscaTotalPid();
            $totalPII = $this->buscaTotalPii();
            $activeSheet->setCellValue('A2',"TOTAL SOLICITUDES");
            $activeSheet->setCellValue('B2', $totalSol);
            $activeSheet->setCellValue('A3',"TOTAL PSD");
            $activeSheet->setCellValue('B3', $totalPsd);
            $activeSheet->setCellValue('A4',"TOTAL PSI");
            $activeSheet->setCellValue('B4', $totalPsi);
            $activeSheet->setCellValue('A5',"TOTAL CV");
            $activeSheet->setCellValue('B5', $totalCv);
            $activeSheet->setCellValue('A6',"TOTAL PID");
            $activeSheet->setCellValue('B6', $totalPID);
            $activeSheet->setCellValue('A7',"TOTAL PII");
            $activeSheet->setCellValue('B7', $totalPII);
            for($i=2; $i<=8; $i++ ){
                $activeSheet->getStyle('B'.$i)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);                
            }

        }catch(Exception $e){
            echo $e->getMessage();
        }finally{

        }
    }
    public function generaEstatusSolicitudes($activeSheet){
        try{
            $objCon = new conexion;
            $con = $objCon->conectar();
            $fila = 2;
            $sql ="SELECT estatussolicitud.estatus AS estatus, COUNT(*) AS total 
                FROM `solicitudes` 
                INNER JOIN estatussolicitud ON estatussolicitud.id = solicitudes.idEstatusSolicitud 
                WHERE idEstatusSolicitud GROUP BY solicitudes.idEstatusSolicitud ";
            $result = $con->query($sql);
            while( $row = $result->fetch_array() ){
                $activeSheet->setCellValue('C'.$fila , $row['estatus']);
                $activeSheet->setCellValue('D'.$fila , $row['total']);
                $activeSheet->getStyle('D'.$fila)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);                
                $fila = $fila + 1;
            }
        }catch(Exception $e){
            echo $e->getMessage();
        }finally{
            $con->close();
        }
    }
    //--genera los datos de las solicitudes
    public function generaExcelSolicitudes($activeSheet){
        try{
            //consulta a la base de datos para tomar los datos a crear 
            $con = new conexion;
            $objCon = $con->conectar();
            $fila = 10;
            $sql = "SELECT
                dispositivos.siglas,
                solicitudes.id AS idSolicitud,
                estatussolicitud.estatus AS estatusSolicitud,
                dispositivos.nombre AS dispositivo, 
                condiciones.condicion,
                solicitudes.porque,
                mediosdifusion.medio,
                beneficiarios.descMedioDif,
                solicitudes.fechaSolicitud,
                beneficiarios.nombre AS nombreBen, 
                beneficiarios.apellidos AS apellidosBen,
                beneficiarios.sexo AS sexoBen,
                beneficiarios.fecNacimiento AS fNacimientoBen,
                beneficiarios.calle AS calleBen, 
                beneficiarios.colonia AS coloniaBen, 
                beneficiarios.cp AS cpBen, 
                localidades.nombre AS ciudad, 
                regiones.nombre AS estado, 
                paises.nombre AS pais, 
                beneficiarios.telefono AS telefonoBen,
                beneficiarios.email AS emailBen, 
                tutores.nombre AS nombreTut,
                tutores.apellidos AS apellidosTut,
                tutores.fecNacimiento  AS fNacimientoTut,
                tutores.sexo AS sexoTut,
                tutores.viveConBen,
                parentescos.parentesco,
                tutores.telefono AS telefonoTut, 
                tutores.email AS emailTut
            FROM solicitudes
            LEFT JOIN beneficiarios ON beneficiarios.id = solicitudes.idBeneficiario
            LEFT JOIN mediosdifusion ON beneficiarios.idMedioDifusion = mediosdifusion.id
            LEFT JOIN localidades ON beneficiarios.idCiudad = localidades.id
            LEFT JOIN regiones ON localidades.id_region = regiones.id
            LEFT JOIN paises ON paises.id = regiones.id_pais
            LEFT JOIN tutores ON tutores.idBeneficiario = solicitudes.idBeneficiario
            LEFT JOIN parentescos ON parentescos.id = tutores.idParentesco
            LEFT JOIN dispositivos ON dispositivos.id = solicitudes.idDispositivo
            LEFT JOIN condiciones ON condiciones.id = solicitudes.idCondicion
            LEFT JOIN estatussolicitud ON estatussolicitud.id = solicitudes.idEstatusSolicitud";
            $result = $objCon->query($sql);

            //$objBen = new Beneficiario();
            while( $row = mysqli_fetch_array($result) ){
                $edad = $this->generaEdadBeneficiario($row['fNacimientoBen']);
                $viveConBen = $row['viveConBen'];
                if( $viveConBen == 1 ){
                    $viveConBen = "si";
                }elseif( $viveConBen == 0 ){
                    $viveConBen = "no";
                }
                $porque = $row['porque'];
                $activeSheet->setCellValue( 'A'.$fila, $row['siglas']."-".$row['idSolicitud'] );
                $activeSheet->setCellValue( 'B'.$fila, $row['dispositivo'] );
                $activeSheet->setCellValue( 'C'.$fila, $row['estatusSolicitud'] );
                //$objPHPExcel->getActiveSheet()->setCellValue( 'C'.$fila, $row['condicion'] );
                //$objPHPExcel->getActiveSheet()->setCellValue( 'D'.$fila, $row['estatusSolicitud'] );
                $activeSheet->setCellValue( 'D'.$fila, $porque );
                $activeSheet->setCellValue( 'E'.$fila, $row['medio'] );
                $activeSheet->setCellValue( 'F'.$fila, $row['descMedioDif'] );
                $activeSheet->setCellValue( 'G'.$fila, $row['fechaSolicitud'] );
                $activeSheet->setCellValue( 'H'.$fila, $row['nombreBen'] );
                $activeSheet->setCellValue( 'I'.$fila, $row['apellidosBen'] );
                $activeSheet->setCellValue( 'J'.$fila, $row['sexoBen'] );
                $activeSheet->setCellValue( 'K'.$fila, $row['fNacimientoBen'] );
                $activeSheet->setCellValue( 'L'.$fila, $edad );
                $activeSheet->setCellValue( 'M'.$fila, $row['calleBen'] );
                $activeSheet->setCellValue( 'N'.$fila, $row['coloniaBen'] );
                $activeSheet->setCellValue( 'O'.$fila, $row['cpBen'] );
                $activeSheet->setCellValue( 'P'.$fila, $row['ciudad'] );
                $activeSheet->setCellValue( 'Q'.$fila, $row['estado'] );
                $activeSheet->setCellValue( 'R'.$fila, $row['pais'] );
                $activeSheet->setCellValue( 'S'.$fila, $row['telefonoBen'] );
                $activeSheet->setCellValue( 'T'.$fila, $row['emailBen'] );
                $activeSheet->setCellValue( 'U'.$fila, $row['nombreTut'] );
                $activeSheet->setCellValue( 'V'.$fila, $row['apellidosTut'] );
                //$objPHPExcel->getActiveSheet()->setCellValue( 'X'.$fila, $row['fNacimientoTut'] );
                //$objPHPExcel->getActiveSheet()->setCellValue( 'Y'.$fila, $row['sexoTut'] );
                //$objPHPExcel->getActiveSheet()->setCellValue( 'Z'.$fila, $viveConBen );
                $activeSheet->setCellValue( 'W'.$fila, $row['parentesco'] );
                $activeSheet->setCellValue( 'X'.$fila, $row['telefonoTut'] );
                $activeSheet->setCellValue( 'Y'.$fila, $row['emailTut'] );
            
                $fila++;
            }

        }catch(Exception $e){
            echo $e->getMessage();
        }finally{
            $objCon->close();
        }
    }
    //--muestra datos a insertar en el formulario 
    public function mostrar(){
        echo "<br>nombre".$this->getNombre();
        echo "<br> apellidos".$this->getApellidos();
        echo"<br>sexo".$this->getSexo();
        echo"<br>nacimiento".$this->getNacimiento();
        echo"<br>ciudad".$this->getCiudad();
        echo"<br>calle".$this->getCalle();
        echo"<br>colonia".$this->getColonia();
        echo"<br>cp".$this->getCp();
        echo"<br>telefono".$this->getTelefono();
        echo"<br>email".$this->getEmail();    
        echo"<br>medio difusion".$this->getIdMedioDifusion();    
        echo"<br>desscripción medio difusion".$this->getDescMedioDif();    
        echo"<br>independiente".$this->getIndependiente();    
        echo"<br>tutor".$this->getNombreTutor();    
        echo"<br>apellido tutor".$this->getApellidoTutor();    
        echo"<br>nacimiento tutor".$this->getNacimientoTutor();    
        echo"<br>sexo tutor".$this->getSexoTutor();    
        echo"<br>vive ben".$this->getViveBen();    
        echo"<br>parentesco".$this->getParentesco();    
        echo"<br>tel fijo".$this->getTelTutor();        
        echo"<br>email".$this->getEmailTutor();    
        echo"<br>dispositivo".$this->getDispositivo();    
        echo"<br>condicion".$this->getCondicion();    
        echo"<br>porque".$this->getDescObtencion();    
        echo"<br>foto1".$this->getFoto1();    
        echo"<br>foto2".$this->getFoto2();    
        echo"<br>foto3".$this->getFoto3();  
    }

    //--genera sentencia a partir de archivo csv para insertar transacciones
    public function creaTransacciones($name,$ruta){
        try{
            $file = fopen($ruta,"r");
            $array = array();
            $con = new conexion;
            $objCon = $con->conectar();
            $row=0;
            $cont = count (file("files/csv/".$name));
            $cadena = "INSERT IGNORE INTO transacciones(donacion,idSolicitud,idBanwire,auth_code,event,hash,status,fecha) VALUES";
            while (($data = fgetcsv($file, 1000, ",")) !== FALSE) {
                if($row >0){
                    $cadena = $cadena."(".$data[0].",".$data[1].",'".$data[2]."','".$data[3]."','".$data[4]."','".$data[5]."','".$data[6]."','".$data[7]."')";
                    if($row < $cont -1 ){
                        $cadena = $cadena.",";
                    }
                }
                $row = $row + 1;
            }
            //echo $cadena;
            if($objCon->query($cadena)){
                $array[0] = 1;
            }else {
                $array[0] = 0;
            }
            $array[1] = $objCon->affected_rows;
            //$n = $objCon->affected_rows;
            return $array;
        }catch(Exception $e){
            echo $e->getMessage();
        }finally{
            fclose($file);
            $objCon->close();
        }
    }
    //--genera total recabado del dispositivo
    public function recabado($id){
        try{
            $sql = "SELECT SUM(donacion) AS donacion FROM transacciones WHERE idSolicitud = '".$id."' ";
            $objCon = new conexion;
            $con = $objCon->conectar();
            $result = $con->query($sql);
            $result = $result->fetch_assoc();
            return $result['donacion'];
        }catch(Exception $e){
            echo $e->getMessage();
        }finally{
            $con->close();
        }
    }
}//--fin Beneficiario
