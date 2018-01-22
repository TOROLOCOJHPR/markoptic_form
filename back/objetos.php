<?php
include 'back/conexion.php';
class DatosPersonales {
    //atributos
    public $nombre,$apellidos,$sexo,$fecNacimiento,$ciudad,$calle,$colonia,$cp,$telefono,$email,$idMedioDifusion,$descMedioDif;
    
    //getter and setter
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
    
    //funcion para buscar el país 
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
    //funcion para buscar el estado
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
    //funcion para buscar la ciudad
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

}//datosPersonales
class Tutor extends DatosPersonales{
    public $independiente,$nombreTutor,$apellidoTutor,$nacimientoTutor,$sexoTutor,$viveBen,$parentesco,$telTutor,$emailTutor;
    
    //getter and setter
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
}
class Beneficiario extends Tutor{
    public $dispositivo,$condicion,$descObtencion,$foto1,$foto2,$foto3;
    private $idSolicitud;
    //getter and setter
    public function getDispositivo(){return $this->dispositivo;}
    public function setDispositivo($sDispositivo){$this->dispositivo = $sDispositivo;}
    public function getCondicion(){return $this->condicion;}
    public function setCondicion($sCondicion){$this->condicion = $sCondicion;}
    public function getDescObtencion(){return $this->descObtencion;}
    public function setDescObtencion($sDescObtencion){$this->descObtencion = $sDescObtencion;}
    public function getFoto1(){return $this->foto1;}
    public function setFoto1($sFoto1){$this->foto1 = $sFoto1;}
    public function getFoto2(){return $this->foto2;}
    public function setFoto2($sFoto2){$this->foto2 = $sFoto2;}
    public function getFoto3(){return $this->foto3;}
    public function setFoto3($sFoto3){$this->foto3 = $sFoto3;}
    
    //busca dispositivo biomedico
    public function buscaDispositivo($sol,$nd){
        try{
            $sql = "SELECT id,nombre FROM dispositivos WHERE nombre LIKE '%".$sol."%' AND mostrar = 1 ";
            $objCon = new conexion();
            $con = $objCon->conectar();
            $result = $con->query($sql);
            if($sol == "superior"){                
                echo'<div class="c-align-horizontal flex-column">
                    <label><strong>¿Qué extremidad necesita?</strong></label>
                    <select name="solicitud" class="form-control" required>
                        <option value="" class="text-muted" >Selecciona un dispositivo</option>';
                    while($row = mysqli_fetch_array($result)){
                        echo'<option value="'.$row['id'].'" '; if( $row['id'] == $nd ){ echo "selected"; } echo'>'.$row['nombre'].'</option>';
                    }  
                echo'</select>
            </div>';
            }else if($sol == 'colchon'){
                while($row = mysqli_fetch_array($result)){
                echo'<input type="hidden" name="solicitud" value="'.$row['id'].'">';
                }
            }
        }catch(Exception $e){
            echo $e->getMessage();
        }finally{
            $con->close();
        }   
    }

    //busca condición de la parte del cuerpo a solicitar de la persona
    public function buscaCondicion($condicion){
        try{
            if($condicion != "n/a"){
                $sql="SELECT id,condicion,imgFrontal,imgTrasera FROM condiciones WHERE condicion LIKE '".$condicion."%'";
                $objCon = new conexion();
                $con = $objCon->conectar();
                $result = $con->query($sql);
                echo'
                    <p class="w-100 text-center mt-3"><strong>Selecciona la condición de tu '.$condicion.'</strong></p>
                    <div class="row mx-0" id="condiciones">
                ';
                while($row = $result->fetch_array()){
                    echo'                    
                        <div class="col-12 col-md-4 text-center condBrazo">
                            <input type="radio" value="'.$row['id'].'" name="condicion" id="condicion'.$row['id'].'"/>
                            <label for="condicion'.$row['id'].'">
                                <img class="h-100" src="../imagenes/condiciones/'.$row['imgFrontal'].'" alt="imagen frontal de '.$row['condicion'].'">
                                <img class="h-100" src="../imagenes/condiciones/'.$row['imgTrasera'].'" alt="imagen trasera de '.$row['condicion'].'" style="display:none;">
                            </label>
                        </div>
                    ';
                }
                echo'
                    </div>
                ';    
            }else{
                echo '<input type="hidden" name="condicion" value="5">';
            }
        }catch(Exception $e){
            echo $e->getMessage();
        }finally{
            if($condicion != "n/a"){
                $con->close();
            }
        }  
    }

    //busca medio de difusión
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

    //busca datos del apadrinado
    public function buscaDatosApadrinado($id){
        try{
            $con = new conexion();
            $objCon = $con->conectar();

            $sql="SELECT 
	                beneficiarios.fecNacimiento,beneficiarios.nombre AS nombreBE,beneficiarios.apellidos,
                    beneficiarios.idCiudad,
                    dispositivos.nombre AS nombreDI,dispositivos.precio,
                    paises.nombre AS pais,
                    regiones.nombre AS estado,
                    localidades.nombre AS ciudad,
                    imgsolicitud.fotoHistoria,
                    solicitudes.recabado,solicitudes.id,solicitudes.porque 
                FROM solicitudes 
                    INNER JOIN beneficiarios ON beneficiarios.id = solicitudes.idBeneficiario 
                    INNER JOIN dispositivos ON dispositivos.id = solicitudes.idDispositivo
                    INNER JOIN imgsolicitud ON imgsolicitud.idSolicitud = solicitudes.id 
   	                INNER JOIN localidades ON localidades.id = beneficiarios.idCiudad 
                    INNER JOIN regiones on regiones.id = localidades.id_region
                    INNER JOIN paises ON paises.id = localidades.id_pais
                AND solicitudes.id = $id"
            ;

            $result = $objCon->query($sql);
            $result = mysqli_fetch_assoc($result);

            $datosBeneficiario = array(
                "id"=>$result['id'], //id solicitud
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
                "porque"=>$result['porque'] //por qué el beneficiario solicito el dispositivo
            );

            return $datosBeneficiario;

        }catch(Exception $e){
            echo $e->getMessage();
        }finally{
            $objCon->close();
        }
    }

    //busca datos del formulario
    public function buscaDatosFormulario($id){
        try{
            $con = new conexion();
            $objCon = $con->conectar();

            $sql="SELECT
                beneficiarios.nombre AS nombreBen, 
                beneficiarios.apellidos AS apellidosBen,
                beneficiarios.sexo AS sexoBen, 
                beneficiarios.fecNacimiento AS fNacimientoBen,
                localidades.nombre AS ciudad, 
                regiones.nombre AS estado, 
                paises.nombre AS pais, 
                beneficiarios.calle AS calleBen, 
                beneficiarios.colonia AS coloniaBen, 
                beneficiarios.cp AS cpBen, 
                beneficiarios.telefono AS telefonoBen,
                beneficiarios.email AS emailBen, 
                tutores.nombre AS nombreTut,
                tutores.apellidos AS apellidosTut,
                tutores.sexo AS sexoTut,
                tutores.viveConBen,
                parentescos.parentesco,
                tutores.fecNacimiento  AS fNacimientoTut,
                tutores.telefono AS telefonoTut, 
                tutores.email AS emailTut,
                dispositivos.nombre AS dispositivo, 
                condiciones.condicion,
                mediosdifusion.medio,
                beneficiarios.descMedioDif,
                solicitudes.porque
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
                "apellidoBen"=>$result['apellidosBen'], //apellidos del beneficiario
                "sexoBen"=>$sB, //sexo  del beneficiario
                "fNacimientoBen"=>$result['fNacimientoBen'], //fecha de nacimiento del beneficiado
                "ciudad"=>$result['ciudad'], //ciudad de residencia del beneficiario
                "estado"=>$result['estado'], //estado de residencia del beneficiario
                "pais"=>$result['pais'], // país de residencia del beneficiario 
                "calleBen"=>$result['calleBen'], //ciudad de residencia del beneficiario
                "coloniaBen"=>$result['coloniaBen'], //ciudad de residencia del beneficiario
                "cpBen"=>$result['cpBen'], //ciudad de residencia del beneficiario
                "telefonoBen"=>$result['telefonoBen'], //ciudad de residencia del beneficiario
                "emailBen"=>$result['emailBen'], //ciudad de residencia del beneficiario
                "nombreTut"=>$result['nombreTut'], //ciudad de residencia del beneficiario
                "apellidoTut"=>$result['apellidosTut'], //ciudad de residencia del beneficiario
                "sexoTut"=>$sT, //ciudad de residencia del beneficiario
                "viveConBen"=>$vB, //ciudad de residencia del beneficiario
                "parentesco"=>$result['parentesco'], // nombre del dispositivo 
                "fNacimientoTut"=>$result['fNacimientoTut'], // nombre del dispositivo 
                "telefonoTut"=>$result['telefonoTut'], // nombre del dispositivo 
                "emailTut"=>$result['emailTut'], // nombre del dispositivo 
                "dispositivo"=>$result['dispositivo'], // nombre del dispositivo 
                "condicion"=>$result['condicion'], // nombre del dispositivo 
                "medio"=>$result['medio'], // nombre del dispositivo 
                "descMedioDif"=>$result['descMedioDif'], // nombre del dispositivo 
                "porque"=>$result['porque'] //por qué el beneficiario solicito el dispositivo
            );

            return $datosFormulario;

        }catch(Exception $e){
            echo $e->getMessage();
        }finally{
            $objCon->close();
        }
    }

    //crea mensaje a enviar al formulario 
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
                                <img src="http://markoptic.mx/imagenes/respuesta%20heart.jpg" width="100%"  style="display:block;">
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
                                <img src="http://markoptic.mx/imagenes/footer-correo.jpg" width="100%"  style="display:block;">
                            </td>
                        </tr>
                    </table>
                </body>
            </html>
            ';
            echo $message;
            return $message;
        }catch(Exception $e){
            echo $e->getMessage();
        }finally{

        }
    }

    //busca ultimo id de las solicitudes de los beneficiarios
    public function buscaMaxSolicitudes(){
        try{
            $con = new conexion();
            $objCon = $con->conectar();
            $sql = "SELECT MAX(id) as total FROM solicitudes";
            $result = $objCon->query($sql);
            $result = mysqli_fetch_assoc($result);
            $idMax = $result['total'];
            return $idMax;
        }catch(Exception $e){
            echo $e->getMessage();
        }finally{
            $objCon->close();
        }
    }

    //busca el total de solicitudes de los beneficiarios con estatus
    public function buscaCountSolicitudes($estatus){
        try{
            $objCon = new conexion();
            $con = $objCon->conectar();
            $sql = "SELECT COUNT(id) as total FROM solicitudes WHERE idEstatusSolicitud = '".$estatus."'";
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
    
    //busca el total de solicitudes de los beneficiarios
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

    //busca el total de solicitudes de protesis superior derecha
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

    //busca el total de solicitudes de protesis superior izquierda
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

    //busca el total de solicitudes de colchón vittmat
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

    //busca el total de solicitudes de protésis inferior derecha
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

    //busca el total de solicitudes de protésis inferior izquierda
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

    //generar solicitudes aleatoriamente para el sistema de apadrinamiento
    public function generaSolicitudesAleatorias($mostrar,$idMax,$estatus){
        try{
            $cont = 0;
            $index = 0;
            $arregloRandom = array();
            $objCon = new conexion;
            $con = $objCon->conectar();
            while($cont < $mostrar){
                $num = rand(1,$idMax);
                $sql = "SELECT id FROM solicitudes WHERE id = '".$num."' and idEstatusSolicitud = '".$estatus."'";
                $result = $con->query($sql);
                if(mysqli_num_rows($result)>0){  
                    foreach($arregloRandom as $fila){
                        if($fila == $num){
                            $index = 1;
                            break 1;
                        }
                    }
                    if($index == 0){
                        $arregloRandom[$cont] = $num;
                        $cont = $cont + 1;
                    }else{
                        $index = 0;
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

    //genera edad actual del beneficiario
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

    //buscar beneficiarios
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

    //inserta solicitud 
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
            echo $error; 
            if(!$error){                
                $con->commit();
                //envia correo al beneficiario
                $this->mensajeFormulario($id);
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

    //mostrar datos a insertar en el formulario 
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

    //PHPExcel

    //genera el total de los dispositivos y solicitudes
    public function generaTotalSolicitudes($objPHPExcel){
        try{
            $totalSol = $this->buscaTotalSolicitudes();
            $totalPsd = $this->buscaTotalPsd();
            $totalPsi = $this->buscaTotalPsi();
            $totalCv = $this->buscaTotalCv();
            $totalPID = $this->buscaTotalPid();
            $totalPII = $this->buscaTotalPii();
            $objPHPExcel->getActiveSheet()->setCellValue('A2',"TOTAL SOLICITUDES");
            $objPHPExcel->getActiveSheet()->setCellValue('B2', $totalSol);
            $objPHPExcel->getActiveSheet()->setCellValue('A3',"TOTAL PSD");
            $objPHPExcel->getActiveSheet()->setCellValue('B3', $totalPsd);
            $objPHPExcel->getActiveSheet()->setCellValue('A4',"TOTAL PSI");
            $objPHPExcel->getActiveSheet()->setCellValue('B4', $totalPsi);
            $objPHPExcel->getActiveSheet()->setCellValue('A5',"TOTAL CV");
            $objPHPExcel->getActiveSheet()->setCellValue('B5', $totalCv);
            $objPHPExcel->getActiveSheet()->setCellValue('A6',"TOTAL PID");
            $objPHPExcel->getActiveSheet()->setCellValue('B6', $totalPID);
            $objPHPExcel->getActiveSheet()->setCellValue('A7',"TOTAL PII");
            $objPHPExcel->getActiveSheet()->setCellValue('B7', $totalPII);

        }catch(Exception $e){
            echo $e->getMessage();
        }finally{

        }
    }
    //genera los datos de las solicitudes
    public function generaExcelSolicitudes($objPHPExcel){
        try{
            //consulta a la base de datos para tomar los datos a crear 
            $con = new conexion;
            $objCon = $con->conectar();
            $fila = 10;
            $sql = "SELECT
                dispositivos.siglas,
                solicitudes.id AS idSolicitud,
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
            LEFT JOIN condiciones ON condiciones.id = solicitudes.idCondicion";
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
                $objPHPExcel->getActiveSheet()->setCellValue( 'A'.$fila, $row['siglas']."-".$row['idSolicitud'] );
                $objPHPExcel->getActiveSheet()->setCellValue( 'B'.$fila, $row['dispositivo'] );
                //$objPHPExcel->getActiveSheet()->setCellValue( 'C'.$fila, $row['condicion'] );
                //$objPHPExcel->getActiveSheet()->setCellValue( 'D'.$fila, $row['estatusSolicitud'] );
                $objPHPExcel->getActiveSheet()->setCellValue( 'C'.$fila, $porque );
                $objPHPExcel->getActiveSheet()->setCellValue( 'D'.$fila, $row['medio'] );
                $objPHPExcel->getActiveSheet()->setCellValue( 'E'.$fila, $row['descMedioDif'] );
                $objPHPExcel->getActiveSheet()->setCellValue( 'F'.$fila, $row['fechaSolicitud'] );
                $objPHPExcel->getActiveSheet()->setCellValue( 'G'.$fila, $row['nombreBen'] );
                $objPHPExcel->getActiveSheet()->setCellValue( 'H'.$fila, $row['apellidosBen'] );
                $objPHPExcel->getActiveSheet()->setCellValue( 'I'.$fila, $row['sexoBen'] );
                $objPHPExcel->getActiveSheet()->setCellValue( 'J'.$fila, $row['fNacimientoBen'] );
                $objPHPExcel->getActiveSheet()->setCellValue( 'K'.$fila, $edad );
                $objPHPExcel->getActiveSheet()->setCellValue( 'L'.$fila, $row['calleBen'] );
                $objPHPExcel->getActiveSheet()->setCellValue( 'M'.$fila, $row['coloniaBen'] );
                $objPHPExcel->getActiveSheet()->setCellValue( 'N'.$fila, $row['cpBen'] );
                $objPHPExcel->getActiveSheet()->setCellValue( 'O'.$fila, $row['ciudad'] );
                $objPHPExcel->getActiveSheet()->setCellValue( 'P'.$fila, $row['estado'] );
                $objPHPExcel->getActiveSheet()->setCellValue( 'Q'.$fila, $row['pais'] );
                $objPHPExcel->getActiveSheet()->setCellValue( 'R'.$fila, $row['telefonoBen'] );
                $objPHPExcel->getActiveSheet()->setCellValue( 'S'.$fila, $row['emailBen'] );
                $objPHPExcel->getActiveSheet()->setCellValue( 'T'.$fila, $row['nombreTut'] );
                $objPHPExcel->getActiveSheet()->setCellValue( 'U'.$fila, $row['apellidosTut'] );
                //$objPHPExcel->getActiveSheet()->setCellValue( 'X'.$fila, $row['fNacimientoTut'] );
                //$objPHPExcel->getActiveSheet()->setCellValue( 'Y'.$fila, $row['sexoTut'] );
                //$objPHPExcel->getActiveSheet()->setCellValue( 'Z'.$fila, $viveConBen );
                $objPHPExcel->getActiveSheet()->setCellValue( 'V'.$fila, $row['parentesco'] );
                $objPHPExcel->getActiveSheet()->setCellValue( 'W'.$fila, $row['telefonoTut'] );
                $objPHPExcel->getActiveSheet()->setCellValue( 'X'.$fila, $row['emailTut'] );
            
                $fila++;
            }

        }catch(Exception $e){
            echo $e->getMessage();
        }finally{
            $objCon->close();
        }
    }

}//beneficiario

?>