<?php
    $root = $_SERVER['DOCUMENT_ROOT'];
    require_once $root.'/inc/objetos/conexion.php';
    require_once $root.'/inc/objetos/conexion-old.php';
    require_once $root.'/inc/objetos/beneficiario.php';
    require_once $root.'/inc/objetos/tutor.php';
    require_once $root.'/inc/objetos/ubicacion.php';
    require_once $root.'/inc/objetos/dispositivo.php';
    require_once $root.'/inc/objetos/condicion.php';
    require_once $root.'/inc/objetos/parentesco.php';

    class Solicitud{
        
        //-- atributos
        public $porque,$fechaSolicitud;
        protected $id,$idBen,$idCondicion,$idDispositivo,$idEstatus;

        //-- getter and setter

        public function setId($sId){$this->id = $sId;}
        public function setIdBen($sIdBen){$this->idBen = $sIdBen;}
        public function setIdCondicion($sIdCondicion){$this->idCondicion = $sIdCondicion;}
        public function setIdDispositivo($sIdDispositivo){$this->idDispositivo = $sIdDispositivo;}
        public function setIdEstatus($sIdEstatus){$this->idEstatus = $sIdEstatus;}
        public function setPorque($sPorque){$this->porque = $sPorque;}
        public function setFechaSolicitud($sFechaSolicitud){$this->fechaSolicitud = $sFechaSolicitud;}

        public function getPorque(){return $this->porque;}

        //-- crea solicitud en la base de datos
        public function crea($objBen,$objTut){
            
            try{
                $con = new conexion;//crear objeto de conexion
                $con = $con->conectar();//conectar con base de datos
                $con->autocommit(FALSE);
                $error=0;
                if($objBen->creaFormulario($con)){
                    $resBen = mysqli_insert_id($con);
                    if($objTut->getIndependiente() == 1){
                        $objTut->setIdBen($resBen);
                        if(!$objTut->creaFormulario($con)){
                            $error = 1;
                        }
                    }
                    echo "idBen ".$resBen."<br>";
                    $sql=
                    '
                        INSERT INTO solicitudes(
                            idBeneficiario,
                            idCondicion,
                            idDispositivo,
                            idEstatusSolicitud,
                            porque
                        )
                        VALUES(
                            '.$resBen.',
                            '.$this->idCondicion.',
                            '.$this->idDispositivo.',
                            '.$this->idEstatus.',
                            "'.$this->porque.'"
                        )
                    ';
                    if(!$con->query($sql)){
                        $error = 1;
                    }else{
                        $resSol = mysqli_insert_id($con);
                    }
                
                }else{
                    $error = 1;
                }

                if($error == 0){
                    $con->commit();
                    return $resSol;
                }else{
                    $con->rollback();
                    return false;
                }

            }catch(Exception $e){
                $e->getMessage();
            }finally{
                $con->close();
            }
        }

        //-- actualiza datos de la solicitud en la base de datos
        public function actualiza(){
            try{
                $con = new conexion;
                $con = $con->conectar();
                $sql='UPDATE solicitudes SET idBeneficiario='.$this->idBen.',idCondicion='.$this->idCondicion.',idDispositivo='.$this->idDispositivo.',idEstatusSolicitud='.$this->idEstatus.',porque="'.$this->porque.'",fechaSolicitud="'.$this->fechaSolicitud.'" WHERE id='.$this->id;
                if($con->query($sql)){
                    return true;
                }else{
                    return false;
                }
            }catch(Exception $e){
                $e->getMessage();
            }finally{
                $con->close();
            }
        }//-- actualiza datos de la solicitud en la base de datos

        //-- muestra los datos de la solicitud
        public function muestra(){
            try{
                // declaracion e inicialización de objetos
                $objBen = new Beneficiario;
                $objTut = new Tutor;
                $objUb = new Ubicacion;
                $objDis = new Dispositivo;
                $objCond = new Condicion;
                $objmedio = new MedioDifusion;
                $objPar = new Parentesco;

                $array = array();
                $con = new Conexion;

                // inicialización conexion
                $con = $con->conectar();

                //seleccionar datos de solicitud
                $sql="SELECT idBeneficiario,idCondicion,idDispositivo,idEstatusSolicitud,porque,fechaSolicitud FROM `solicitudes` WHERE id = ".$this->id." ";
                $result = $con->query($sql);
                $row = $result->fetch_assoc();
                
                // asignar valores a arreglo a mostrar de datos de solicitud
                array_push( $array, array("estatus"=>$row['idEstatusSolicitud'],"porque"=>$row['porque'],"fechaSolicitud"=>$row['fechaSolicitud'] ) );
                
                // asignar valor a id objeto beneficiario y traer sus datos
                $objBen->setId($row['idBeneficiario']);
                $arrayBen = $objBen->muestra();//id,nombre,apellido,sexo,nacimiento,ciudad,calle,colonia,cp,telefono,email,idMedioDif,descMedioDif

                // asignar valor a id objeto tutor y traer sus datos
                $objTut->setIdBen($arrayBen[0]['id']);
                $tutor = $objTut->muestra();

                if($tutor == false){
                    $arrayTut = array("independiente"=> 1);
                }else{
                    //asignar valor a id parentesco y traer sus datos
                    $objPar->setId($tutor[0]['parentesco']);
                    $arrayPar = $objPar->muestra();    
                    $arrayTut = array_merge(["independiente" => 0],$tutor[0], $arrayPar[0]);
                }

                // asignar valor a idCiudad objeto ubicacion y traer nombre de ciudad estado y país correspondientes al beneficiario                    
                $objUb->setCiudad( $arrayBen[0]['ciudad'] );
                $ubicacion = $objUb->muestraUbicacion();//idTut,idBen,nombreTut,apellidoTut,nacimientoTut,sexoTut,viveBen,Parentesco,telefonoTut,emailTut

                //asignar valor a id de dispositivo y traer sus datos
                $objDis->setId($row['idDispositivo']);
                $arrayDis = $objDis->muestra();

                //asignar valor a id de condición y traer sus datos
                $objCond->setId($row['idCondicion']);
                $arrayCond = $objCond->muestra();

                // unir los diferentes arreglos con los datos de los arreglos
                $arrayMerge = array_merge($arrayBen[0],$ubicacion[0],$arrayTut,$arrayDis[0],$arrayCond[0],$array[0]); // $array[0],$array[0] para crear un solo arreglo al unir y no crear un arreglo multidimensional

                return $arrayMerge;

            }catch(Exception $e){
                $e->getMessage();
            }finally{
                $con->close();
            }
        }//-- muestra los datos de la solicitud

        //-- muestra todas las solicitudes
        public function muestraTodos(){
            try{
                $objBeneficiario = new Beneficiario;
                $array = array();
                $con = new conexion;
                $con = $con->conectar();
                $sql='SELECT
                    dispositivos.siglas,
                    solicitudes.id AS idSolicitud,
                    estatussolicitud.estatus,
                    dispositivos.nombre AS dispositivo,
                    condiciones.condicion,
                    solicitudes.porque,
                    mediosdifusion.medio,
                    beneficiarios.descMedioDif,
                    solicitudes.fechaSolicitud,
                    beneficiarios.nombre,
                    beneficiarios.apellidos,
                    beneficiarios.sexo,
                    beneficiarios.fecNacimiento AS nacimiento,
                    beneficiarios.calle,
                    beneficiarios.colonia,
                    beneficiarios.cp,
                    localidades.nombre AS ciudad, 
                    regiones.nombre AS estado, 
                    paises.nombre AS pais, 
                    beneficiarios.telefono,
                    beneficiarios.email,
                    tutores.nombre AS tutNombre,
                    tutores.apellidos AS tutApellidos,
                    tutores.fecNacimiento  AS tutNacimiento,
                    tutores.sexo AS Tutsexo,
                    tutores.viveConBen,
                    parentescos.parentesco,
                    tutores.telefono AS tutTelefono, 
                    tutores.email AS tutEmail
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
                    LEFT JOIN estatussolicitud ON estatussolicitud.id = solicitudes.idEstatusSolicitud
                ';
                $result = $con->query($sql);
                while($row = $result->fetch_array()){
                    $objBeneficiario->setNacimiento($row['nacimiento']);
                    $edad = $objBeneficiario->generaEdad();
                    array_push(
                        $array,
                        array(
                            "folio"=>$row['siglas']."-".$row['idSolicitud'],
                            "peticion"=>$row['dispositivo'],
                            "condicion"=>$row['condicion'],
                            "estatus"=>$row['estatus'],
                            "porque"=>$row['porque'],
                            "medioDifusion"=>$row['medio'],
                            "descripcionMedioDifusion"=>$row['descMedioDif'],
                            "fechaSolicitud"=>$row['fechaSolicitud'],
                            "nombre"=>$row['nombre'],
                            "apellido"=>$row['apellidos'],
                            "sexo"=>$row['sexo'],
                            "nacimiento"=>$row['nacimiento'],
                            "edad"=>$edad,
                            "direccion"=>$row['calle'],
                            "colonia"=>$row['colonia'],
                            "cp"=>$row['cp'],
                            "ciudad"=>$row['ciudad'],
                            "estado"=>$row['estado'],
                            "pais"=>$row['pais'],
                            "telefono"=>$row['telefono'],
                            "email"=>$row['email'],
                            "tutNombre"=>$row['tutNombre'],
                            "tutApellido"=>$row['tutApellidos'],
                            "viveConBen"=>$row['viveConBen'],
                            "tutParentesco"=>$row['parentesco'],
                            "tutTelefono"=>$row['tutTelefono'],
                            "tutEmail"=>$row['tutEmail'],
                        )
                    );
                }
                return $array;
            }catch(Exception $e){
                $e->getMessage();
            }finally{
                $con->close();
            }
        }//-- muestra todas las solicitudes

        //-- muestra solicitudes folio
        public function muestraFolio(){
            try{
                $array = array();
                $con = new Conexion;
                $con = $con->conectar();
                $sql ="
                    SELECT solicitudes.id, beneficiarios.nombre,beneficiarios.apellidos 
                    FROM solicitudes
                    INNER JOIN beneficiarios ON beneficiarios.id = solicitudes.idBeneficiario
                    WHERE solicitudes.id LIKE '".$this->id."%'
                    ORDER BY solicitudes.id ASC
                ";
                $result = $con->query($sql);
                while($row = $result->fetch_array()){
                    array_push($array,array("id"=>$row['id'],"nombre"=>$row['nombre'],"apellidos"=>$row['apellidos']));
                }
                return $array;
            }catch(Exception $e){
                echo $e->getMessage();
            }finally{
                $con->close();
            }
        }//-- muestra solicitudes folio

        //-- muestra folio antiguo
        public function muestraFolioAntiguo(){
            try{
                $con_old = new ConexionOld;
                $con_old = $con_old->conectar();
                $sql = 'SELECT folio FROM beneficiario_solicitud INNER JOIN solicitud on beneficiario_solicitud.id_solicitud = solicitud.id WHERE beneficiario_solicitud.id = '.$this->idBen;
                $result = $con_old->query($sql);
                $row = $result->fetch_assoc();
                return $row['folio'];
            }catch(Exception $e){
                echo $e->getMessage();
            }finally{
                $con_old->close();
            }
        }//-- /muestra folio antiguo

        //-- muestra el total de solicitudes
        public function muestraSolicitudes(){
            try{
                $con = new Conexion;
                $con = $con->conectar();
                $sql = 'SELECT COUNT(id) as total FROM solicitudes';
                $result = $con->query($sql);             
                $result = mysqli_fetch_assoc($result);
                $idCount = $result['total'];
                return $idCount;
            }catch(Exception $e){
                echo $e->getMessage();
            }finally{
                $con->close();
            }
        }//-- muestra total de solicitudes existentes
        
        //-- muestra el total de solicitudes de prótesis superior derecha
        public function muestraSolicitudesPSD(){
            try{
                $con = new Conexion;
                $con = $con->conectar();
                $sql = 'SELECT COUNT(id) as total FROM solicitudes where idDispositivo = 1';
                $result = $con->query($sql);
                $result = mysqli_fetch_assoc($result);
                $idCount = $result['total'];
                return $idCount;
            }catch(Exception $e){
                echo $e->getMessage();
            }finally{
                $con->close();
            }
        }//-- muestra el total de solicitudes de prótesis superior derecha
        
        //-- muestra el total de solicitudes de prótesis superior izquierda
        public function muestraSolicitudesPSI(){
            try{
                $con = new Conexion;
                $con = $con->conectar();
                $sql = 'SELECT COUNT(id) as total FROM solicitudes where idDispositivo = 2';
                $result = $con->query($sql);
                $result = mysqli_fetch_assoc($result);
                $idCount = $result['total'];
                return $idCount;
            }catch(Exception $e){
                echo $e->getMessage();
            }finally{
                $con->close();
            }
        }//-- muestra el total de solicitudes de prótesis superior izquierda

        //-- muestra el total de solicitudes de colchón vimatt
        public function muestraSolicitudesCV(){
            try{
                $con = new Conexion;
                $con = $con->conectar();
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
        }//-- muestra el total de solicitudes de colchón vimatt

        //-- muestra el total de solicitudes de prótesis inferior derecha
        public function muestraSolicitudesPID(){
            try{
                $con = new Conexion;
                $con = $con->conectar();
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
        }//-- muestra el total de solicitudes de prótesis superior derecha
        
        //-- muestra el total de solicitudes de prótesis superior derecha
        public function muestraSolicitudesPII(){
            try{
                $con = new Conexion;
                $con = $con->conectar();
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
        }//-- muestra el total de solicitudes de prótesis superior derecha

        //-- muestra el total de los estatus de las solicitudes
        public function muestraSolicitudesEstatus(){
            try{
                $array = array();
                $con = new Conexion;
                $con = $con->conectar();
                $sql ='SELECT estatussolicitud.estatus AS estatus, COUNT(*) AS total 
                FROM solicitudes 
                INNER JOIN estatussolicitud ON estatussolicitud.id = solicitudes.idEstatusSolicitud 
                WHERE idEstatusSolicitud GROUP BY solicitudes.idEstatusSolicitud ';
                $result = $con->query($sql);
                while($row = $result->fetch_array()){
                    array_push($array,array("estatus"=>$row['estatus'],"total"=>$row['total']));
                }
                return $array;
            }catch(Exception $e){
                echo $e->getMessage();
            }finally{
                $con->close();
            }
        }//-- muestra el total de los estatus de las solicitudes

        //-- elimina la solicitud de la base de datos
        public function elimina(){
            try{
                $con = new conexion;
                $con = $con->conectar();
                $sql="";
            }catch(Exception $e){
                $e->getMessage();
            }finally{
                $con->close();
            }
        }//-- elimina la solicitud de la base de datos

    }
?>