<?php
    require_once 'inc/config.php';
    require_once 'conexion.php';
    class Parentesco{
        
        //-- atributos
        public $parentesco;
        private $id;

        //-- getter and setter
        public function setId($sId){$this->id = $sId;}
        public function setParentesco($sParentesco){$this->parentesco = $sParentesco;}

        public function getParentesco(){return $this->parentesco;}

        //-- crea parentesco con el beneficiario en la base de datos
        public function crea(){
            try{
                $con = new Conexion;
                $con = $con->conectar();
                $sql = "INSERT INTO parentescos(parentesco) VALUES('".$this->parentesco."')";
                if($con->query($sql)){
                    return true;
                }else{
                    return false;
                }
            }catch(Exception $e){
                echo $e->getMessage();
            }finally{
                $con->close();
            }
        }//-- crea parentesco con el beneficiario en la base de datos

        //-- actualiza parentesco del beneficiario
        public function actualiza(){
            try{
                $con = new Conexion;
                $con = $con->conectar();
                $sql = 'UPDATE parentescos SET parentesco="'.$this->parentesco.'" WHERE id = '.$this->id;
                if($con->query($sql)){
                    return true;
                }else{
                    return false;
                }
            }catch(Exception $e){
                echo $e->getMessage();
            }finally{
                $con->close();
            }
        }//-- actualiza parentesco del beneficiario

        //-- muestra los datos del parentesco seleccionado
        public function muestra(){
            try{
                $con = new Conexion;
                $con = $con->conectar();
                $sql ='SELECT parentesco FROM parentescos WHERE id = '.$this->id;
                $result = $con->query($sql);
                $result = $result->fetch_assoc();
                return $result['parentesco'];
            }catch(Exception $e){
                echo $e->getMessage();
            }finally{
                $con->close();
            }
        }//-- muestra los datos del parentesco seleccionado


        //-- muestra todos los parentescos del beneficiario
        public function muestraTodos(){
            try{
                $array = array();
                $con = new Conexion;
                $con= $con->conectar();
                $sql ="SELECT * FROM parentescos";
                $result = $con->query($sql);
                while( $row = $result->fetch_array() ){
                    array_push( $array,array("id"=>$row['id'],"parentesco"=>$row['parentesco']) );
                }
                return $array;
            }catch(Exception $e){
                echo $e->getMessage();
            }finally{
                $con->close();
            }
        }//-- muestra todos los parentescos del beneficiario

        //elimina parentesco de la base de datos
        public function elimina(){
            try{
                $con = new Conexion;
                $con = $con->conectar();
                $sql = 'DELETE FROM parentescos WHERE id = '.$this->id;
                if($con->query($sql)){
                    return true;
                }else{
                    return false;
                }
            }catch(Exception $e){
                echo $e->getMessage();
            }finally{
                $con->close();
            }
        }//elimina parentesco de la base de datos

    }//class
    
?>