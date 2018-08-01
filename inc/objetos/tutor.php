<?php 
    require_once 'inc/config.php';
    require_once 'conexion.php';
    
    class Tutor{
        
        //--atributos Tutor
        public $independiente,$nombre,$apellido,$nacimiento,$sexo,$viveBen,$parentesco,$telefono,$email;
        private $id,$idBen;

        //--getter and setter

        public function getIndependiente(){return $this->independiente;}
        public function getNombre(){return $this->nombre;}
        public function getApellido(){return $this->apellido;}
        public function getNacimiento(){return $this->nacimiento;}
        public function getSexo(){return $this->sexo;}
        public function getViveBen(){return $this->viveBen;}
        public function getParentesco(){return $this->parentesco;}
        public function getTelefono(){return $this->telefono;}
        public function getEmail(){return $this->email;}

        public function setId($sId){$this->id = $sId;}
        public function setIdBen($sIdBen){$this->idBen = $sIdBen;}
        
        public function setNacimiento($sNacimiento){$this->nacimiento = $sNacimiento;}
        public function setIndependiente($sIndependiente){$this->independiente = $sIndependiente;}
        public function setNombre($sNombre){$this->nombre = $sNombre;}
        public function setApellido($sApellido){$this->apellido = $sApellido;}
        public function setSexo($sSexo){$this->sexo = $sSexo;}
        public function setViveBen($sViveBen){$this->viveBen = $sViveBen;}
        public function setParentesco($sParentesco){$this->parentesco = $sParentesco;}
        public function setTelefono($sTelefono){$this->telefono = $sTelefono;}
        public function setEmail($sEmail){$this->email = $sEmail;}

        //-- crea tutor en la base de datos
        public function crea(){
            try{
                $con = new Conexion;
                $con = $con->conectar();
                $sql ="INSERT INTO tutores(idBeneficiario, nombre, apellidos, fecNacimiento, sexo, viveConBen, idParentesco, telefono, email) VALUES (".$this->idBen.",'".$this->nombre."','".$this->apellido."','".$this->nacimiento."','".$this->sexo."',".$this->viveBen.",".$this->parentesco.",'".$this->telefono."','".$this->email."')";
                if( $con->query($sql) ){
                    return mysqli_insert_id($con);
                }
                else{
                    return false;
                }
            }catch(Exception $e){
                echo $e->getMessage();
            }finally{
                $con->close();
            }
        }//-- crea tutor en la base de datos
        
        //-- crea tutor en la base de datos
        public function creaFormulario($con){
            try{                
                $sql="INSERT INTO tutores(idBeneficiario,nombre,apellidos,fecNacimiento,sexo,viveConBen,idParentesco,telefono,email) VALUES (".$this->idBen.",'".$this->nombre."','".$this->apellido."','".$this->nacimiento."','".$this->sexo."',".$this->viveBen.",".$this->parentesco.",'".$this->telefono."','".$this->email."')";
                if( $con->query($sql) ){
                    return true;
                }
                else{
                    echo "tutor false";
                    return false;
                }
            }catch(Exception $e){
                echo $e->getMessage();
            }
        }//-- crea tutor en la base de datos

        //-- actualiza tutor en la base de datos
        public function actualiza(){
            try{
                $con = new Conexion;
                $con = $con->conectar();
                $sql ="UPDATE tutores SET idBeneficiario='".$this->idBen."',nombre='".$this->nombre."',apellidos='".$this->apellido."',fecNacimiento='".$this->nacimiento."',sexo='".$this->sexo."',viveConBen='".$this->viveBen."',idParentesco='".$this->parentesco."',telefono='".$this->telefono."',email='".$this->email."' WHERE id ='".$this->id."' ";
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
        }//-- actualiza tutor en la base de datos

        //-- muestra los datos del tutor
        public function muestra(){
            try{
                $array = array();
                $con = new Conexion;
                $con = $con->conectar();
                $sql ="SELECT * FROM tutores WHERE id = '".$this->id."' ";
                $result = $con->query($sql);
                $row = $result->fetch_assoc();
                array_push( $array,array("id"=>$row['id'],"idBen"=>$row['idBeneficiario'],"nombre"=>$row['nombre'],"apellido"=>$row['apellidos'],"nacimiento"=>$row['fecNacimiento'],"sexo"=>$row['sexo'],"viveBen"=>$row['viveConBen'],"parentesco"=>$row['idParentesco'],"telefono"=>$row['telefono'],"email"=>$row['email']) );
                return $array;
            }catch(Exception $e){
                echo $e->getMessage();
            }finally{
                $con->close();
            }
        }//-- muestra los datos del tutor

        //-- muestra los datos de todos los tutores
        public function muestraTodos(){
            try{
                $array = array();
                $con = new Conexion;
                $con = $con->conectar();
                $sql ="SELECT * FROM tutores";
                $result = $con->query($sql);
                while( $row = $result->fetch_array() ){
                    array_push( $array,array("id"=>$row['id'],"idBen"=>$row['idBeneficiario'],"nombre"=>$row['nombre'],"apellido"=>$row['apellidos'],"nacimiento"=>$row['fecNacimiento'],"sexo"=>$row['sexo'],"viveBen"=>$row['viveConBen'],"parentesco"=>$row['idParentesco'],"telefono"=>$row['telefono'],"email"=>$row['email']) );
                }
                return $array;
            }catch(Exception $e){
                echo $e->getMessage();
            }finally{
                $con->close();
            }
        }//-- muestra los datos de todos los beneficiarios

        //-- muestra los tutores del beneficiario
        public function muestraBeneficiario(){
            try{
                $array = array();
                $con = new Conexion;
                $con = $con->conectar();
                $sql ="SELECT * FROM tutores WHERE idBeneficiario = '".$this->idBen."' ";
                $result = $con->query($sql);
                $row = $result->fetch_assoc();
                array_push( $array,array("idTut"=>$row['id'],"idBen"=>$row['idBeneficiario'],"nombreTut"=>$row['nombre'],"apellidoTut"=>$row['apellidos'],"nacimientoTut"=>$row['fecNacimiento'],"sexoTut"=>$row['sexo'],"viveBen"=>$row['viveConBen'],"parentesco"=>$row['idParentesco'],"telefonoTut"=>$row['telefono'],"emailTut"=>$row['email']) );
                return $array;
            }catch(Exception $e){
                echo $e->getMessage();
            }finally{
                $con->close();
            }
        }//-- muestra los tutores del beneficiario

        //-- elimina los datos del tutor
        public function elimina(){
            try{
                $con = new Conexion;
                $con = $con->conectar();
                $sql ="DELETE FROM tutores WHERE id = '".$this->id."' ";
                if($con->query($sql) ){
                    return "true";
                }else{
                    return "false";
                }
            }catch(Exception $e){
                echo $e->getMessage();
            }finally{
                $con->close();
            }
        }//-- elimina los datos del tutor

        //-- genera la edad actual del tutor
        public function generaEdad(){
            try{
                $now = new DateTime();// obtenemos la fecha actual
                $fecNac = new DateTime($this->nacimiento);// convertimos en objeto date la fecha de nacimiento del beneficiario
                $edad = $now->diff($fecNac);// restamos la diferencia de la fecha actual contra la fecha de nacimiento del beneficiario
                return $edad->y;  
            }catch(Exception $e){
                echo $e->getMessage();
            }
        }//-- genera la edad actual del tutor

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

    }// class
?>