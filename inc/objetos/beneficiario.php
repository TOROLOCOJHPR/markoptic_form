<?php
    require_once 'conexion.php';
    require_once 'inc/config.php';

    class Beneficiario{
        
        //-- atributos
        public  $nombre,$apellido,$sexo,$nacimiento,$ciudad,$calle,$colonia,$cp,$telefono,$email,$descMedioDif;
        private $id,$idMedioDif;

        //--getter and setter
        public function setId($sId){$this->id = $sId;}
        public function setIdMedioDif($sIdMedioDif){$this->idMedioDif = $sIdMedioDif;}

        public function getNombre(){return $this->nombre;}
        public function getApellido(){return $this->apellido;}
        public function getSexo(){return $this->sexo;}
        public function getNacimiento(){return $this->nacimiento;}
        public function getCiudad(){return $this->ciudad;}
        public function getCalle(){return $this->calle;}
        public function getColonia(){return $this->colonia;}
        public function getCp(){return $this->cp;}
        public function getTelefono(){return $this->telefono;}
        public function getEmail(){return $this->email;}
        public function getDescMedioDif(){return $this->descMedioDif;}

        public function setNombre($sNombre){$this->nombre = $sNombre;}
        public function setApellido($sApellido){$this->apellido = $sApellido;}
        public function setSexo($sSexo){$this->sexo = $sSexo;}
        public function setNacimiento($sNacimiento){$this->nacimiento = $sNacimiento;}
        public function setCiudad($sCiudad){$this->ciudad = $sCiudad;}
        public function setCalle($sCalle){$this->calle = $sCalle;}
        public function setColonia($sColonia){$this->colonia = $sColonia;}
        public function setCp($sCp){$this->cp = $sCp;}
        public function setTelefono($sTelefono){$this->telefono = $sTelefono;}
        public function setEmail($sEmail){$this->email = $sEmail;}
        public function setDescMedioDif($sDescMedioDif){$this->descMedioDif = $sDescMedioDif;}

        //-- crea beneficiario en la base de datos
        public function crea(){
            try{
                $con = new Conexion;
                $con = $con->conectar();
                $sql="INSERT INTO beneficiarios(nombre,apellidos,sexo,fecNacimiento,idCiudad,calle,colonia,cp,telefono,email,idMedioDifusion,descMedioDif) VALUES ('".$this->nombre."','".$this->apellido."','".$this->sexo."','".$this->nacimiento."',".$this->ciudad.",'".$this->calle."','".$this->colonia."','".$this->cp."','".$this->telefono."','".$this->email."',".$this->idMedioDif.",'".$this->descMedioDif."')";
                if( $con->query($sql) ){
                    return $id = mysqli_insert_id($con);
                }else{
                    return false;
                }
            }catch(Exception $e){
                echo $e->getMessage();
            }finally{
                $con->close();
            }
        }//-- crea beneficiario en la base de datos
        
        //-- crea beneficiario en la base de datos
        public function creaFormulario($con){
            try{
                $sql="INSERT INTO beneficiarios(nombre,apellidos,sexo,fecNacimiento,idCiudad,calle,colonia,cp,telefono,email,idMedioDifusion,descMedioDif) VALUES ('".$this->nombre."','".$this->apellido."','".$this->sexo."','".$this->nacimiento."',".$this->ciudad.",'".$this->calle."','".$this->colonia."','".$this->cp."','".$this->telefono."','".$this->email."',".$this->idMedioDif.",'".$this->descMedioDif."')";
                if( $con->query($sql) ){
                    return true;
                }else{
                    return false;
                }
            }catch(Exception $e){
                echo $e->getMessage();
            }
        
        }//-- crea beneficiario en la base de datos

        //-- actualiza beneficiario en la base de datos
        public function actualiza(){
            try{
                $con = new Conexion;
                $con = $con->conectar();
                $sql = "UPDATE beneficiarios SET nombre='".$this->nombre."',apellidos='".$this->apellido."',sexo=".$this->sexo.",fecNacimiento='".$this->nacimiento."',idCiudad=".$this->ciudad.",calle='".$this->calle."',colonia='".$this->colonia."',cp='".$this->cp."',telefono='".$this->telefono."',email='".$this->email."',idMedioDifusion=".$this->idMedioDif.",descMedioDif='".$this->descMedioDif."' WHERE id = ".$this->id." ";
                if( $con->query($sql) ){
                    return "true";
                }else{
                    return "false";
                }
            }catch(Exception $e){
                echo $e->getMessage();
            }finally{
                $con->close();
            }
        }//-- actualiza beneficiario en la base de datos

        //-- muestra los datos del beneficiario
        public function muestra(){
            try{
                $array = array();
                $con = new Conexion;
                $con = $con->conectar();
                $sql = "SELECT * FROM beneficiarios WHERE id = ".$this->id." ";
                $result = $con->query($sql);
                $row = $result->fetch_assoc();
                array_push( $array, array("id"=>$row['id'],"nombre"=>$row['nombre'],"apellido"=>$row['apellidos'],"sexo"=>$row['sexo'],"nacimiento"=>$row['fecNacimiento'],"ciudad"=>$row['idCiudad'],"calle"=>$row['calle'],"colonia"=>$row['colonia'],"cp"=>$row['cp'],"telefono"=>$row['telefono'],"email"=>$row['email'],"idMedioDif"=>$row['idMedioDifusion'],"descMedioDif"=>$row['descMedioDif']) );
                return $array;
            }catch(Exception $e){
                echo $e->getMessage();
            }finally{
                $con->close();
            }
        }//-- muestra los datos del beneficiario

        //-- muestra todos los datos del beneficiario
        public function muestraTodos(){
            try{
                $array = array();
                $con = new Conexion;
                $con = $con->conectar();
                $sql = "SELECT * FROM beneficiarios";
                $result = $con->query($sql);
                while( $row = $result->fetch_assoc() ){
                    array_push( $array, array("id"=>$row['id'],"nombre"=>$row['nombre'],"apellido"=>$row['apellidos'],"sexo"=>$row['sexo'],"nacimiento"=>$row['fecNacimiento'],"ciudad"=>$row['idCiudad'],"calle"=>$row['calle'],"colonia"=>$row['colonia'],"cp"=>$row['cp'],"telefono"=>$row['telefono'],"email"=>$row['email'],"idMedioDif"=>$row['idMedioDifusion'],"descMedioDif"=>$row['descMedioDif']) );
                }
                return $array;
            }catch(Exception $e){
                echo $e->getMessage();
            }finally{
                $con->close();
            }
        }//-- muestra todos los datos del beneficiario

        //-- elimina beneficiario de la base de datos
        public function elimina(){
            try{
                $con = new Conexion;
                $con = $con->conectar();
                $sql = "";
            }catch(Exception $e){
                echo $e->getMessage();
            }finally{
                $con->close();
            }
        }//-- elimina beneficiario de la base de datos

        //-- genera la edad actual del beneficiario
        public function generaEdad(){
            try{
                $now = new DateTime();// obtenemos la fecha actual
                $fecNac = new DateTime($this->nacimiento);// convertimos en objeto date la fecha de nacimiento del beneficiario
                $edad = $now->diff($fecNac);// restamos la diferencia de la fecha actual contra la fecha de nacimiento del beneficiario
                return $edad->y;  
            }catch(Exception $e){
                echo $e->getMessage();
            }
        }//-- genera la edad actual del beneficiario

        //-- valida email
        public function validaEmail(){
            try{
                $dominio = explode('@',$this->email);
                if(!checkdnsrr($dominio[1])){
                    return false;
                }else{
                    return true;
                }
            }catch(Exception $e){
                echo $e->getMessage();
            }
        }//-- valida email

    }// clase
?>