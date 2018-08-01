<?php 

    class Dispositivo {

        //-- atributos
        public $nombre,$siglas,$precio,$mostrar,$formulario;
        private $id;

        //-- métodos
        
        //getter
        public function getNombre(){return $this->nombre;}
        public function getSiglas(){return $this->siglas;}
        public function getPrecio(){return $this->precio;}
        public function getMostrar(){return $this->mostrar;}
        public function getFormulario(){return $this->formulario;}

        //setter
        public function setId($sId){$this->id = $sId;}
        public function setNombre($sNombre){$this->nombre = $sNombre;}
        public function setSiglas($sSiglas){$this->siglas = $sSiglas;}
        public function setPrecio($sPrecio){$this->precio = $sPrecio;}
        public function setMostrar($sMostrar){$this->mostrar = $sMostrar;}
        public function setFormulario($sFormulario){$this->formulario = $sFormulario;}

        //-- crea dispositivo
        public function crea(){

        }//-- crea dispositivo
        
        //-- muestra los datos del dispositivo
        public function muestra(){
            try{
                $array = array();
                $con = new Conexion;
                $con = $con->conectar();
                $sql = "SELECT id,nombre,siglas,precio,mostrar FROM dispositivos WHERE id = ".$this->id ;
                $result = $con->query($sql);
                while( $row = $result->fetch_array() ){
                    array_push( $array,array( "id"=>$row['id'],"nombre"=>$row['nombre'],"siglas"=>$row['siglas'],"precio"=>$row['precio'],"mostrar"=>$row['mostrar'] ) );
                }
                return $array;
            }catch(Exception $e){
                echo $e->getMessage();
            }finally{

            }
        }//-- muestra los datos del dispositivo

        //-- muestra los datos de todos los dispositivos
        public function muestraTodos(){
            try{
                $array = array();
                $con = new Conexion;
                $con = $con->conectar();
                $sql = "SELECT id,nombre,siglas,precio,mostrar FROM dispositivos";
                $result = $con->query($sql);
                while( $row = $result->fetch_array() ){
                    array_push( $array,array( "id"=>$row['id'],"nombre"=>$row['nombre'],"siglas"=>$row['siglas'],"precio"=>$row['precio'],"mostrar"=>$row['mostrar'] ) );
                }
                return $array;
            }catch(Exception $e){
                echo $e->getMessage();
            }finally{

            }
        }//-- muestra los datos de todos los dispositivos

        //-- muestra dispositivos del formulario solicitado
        public function muestraFormulario(){
            try{
                $array = array();
                $arrayForm = explode(",", $this->formulario);// verificar el formulario
                $arrayLenght = count($arrayForm);
                $cadena = "(";
                
                for($i=0; $i < $arrayLenght; $i++){
                    if( $i == $arrayLenght -1){
                        $cadena = $cadena.=" id = ".$arrayForm[$i]." )";
                    }else{
                        $cadena = $cadena.=" id = ".$arrayForm[$i]." or";
                    }
                }

                $con = new Conexion;
                $con = $con->conectar();
                $sql = "SELECT id,nombre FROM dispositivos WHERE ".$cadena." AND mostrar = 1 ";
                $result = $con->query($sql);
                while( $row = $result->fetch_array() ){
                    array_push( $array,array( "id"=>$row['id'],"nombre"=>$row['nombre'] ) );
                }
                return $array;
            }catch(Exception $e){
                echo $e->getMessage();
            }finally{
                $con->close();
            }
        }


        //actualiza los datos del dispositivo
        public function actualiza(){
            try{
                $array = array();
                $con = new Conexion;
                $con = $con->conectar();
                $sql = "";
                $result = $con->query($sql);
                while( $row = $result->fetch_array() ){
                    array_push( $array,array() );
                }
                return $array;
            }catch(Exception $e){
                echo $e->getMessage();
            }finally{

            }
        }

        //elimina el dispositivo
        public function elimina(){
            try{
                $con = new Conexion;
                $con = $con->conectar();
                $sql = "DELETE FROM dispositivos WHERE id =".$this->id;
                if( $con->query($sql) ){
                    return true;
                }else{
                    return false;
                }
            }catch(Exception $e){
                echo $e->getMessage();
            }finally{

            }
        }

    }//class

?>