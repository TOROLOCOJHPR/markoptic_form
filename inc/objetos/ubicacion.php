<?php
    require_once 'conexion.php';

    class Ubicacion{
        //-- atributos de ubicación
        public $pais,$estado,$ciudad;
        
        //-- Getter and Setter
        public function getPais(){return $this->pais; }
        public function getEstado(){return $this->estado; }
        public function getCiudad(){return $this->ciudad; }

        public function setPais($sPais){$this->pais = $sPais; }
        public function setEstado($sEstado){$this->estado = $sEstado; }
        public function setCiudad($sCiudad){$this->ciudad = $sCiudad; }

        //-- muestra todos los países existentes
        public function muestraPaises(){
            try{
                $array = array();
                $con = new Conexion;
                $con = $con->conectar();
                $sql ="SELECT id,nombre FROM paises";
                $result =  $con->query($sql);
                while($row = $result->fetch_array()){
                    if($row['id'] == 42){// verificar si el id pertenece a México
                        //añadir México al principio del arreglo
                        array_unshift($array,array("id"=>$row['id'],"nombre"=>$row['nombre']) );
                    }else{
                        // añadir los demas países al final del arreglo
                        array_push($array,array("id"=>$row['id'],"nombre"=>$row['nombre']) );
                    }
                }
                return $array;
            }catch(Exception $e){
                echo $e-getMessage();
            }finally{
                $con->close();
            }
        }

        //-- muestra el nombre del país seleccionado
        public function muestraPais(){
            try{
                $con = new Conexion;
                $con = $con->conectar();
                $sql = "SELECT nombre FROM paises where id ='".$this->pais."' ";
                $result = $con->query($sql);
                $result = $result->fetch_assoc();
                return $result['nombre'];
            }catch(Exception $e){
                echo $e->getMessage();
            }finally{
                $con->close();
            }
        }

        //-- muestra todos los estados que coinciden con el páis
        public function muestraEstados(){
            try{
                $array = array();
                $con = new Conexion;
                $con = $con->conectar();
                $sql = "SELECT id,nombre FROM regiones WHERE id_pais = '".$this->pais."' ";
                $result = $con->query($sql);
                while($row = $result->fetch_array()){
                    array_push($array,array("value"=>$row['id'],"text"=>$row['nombre']) );
                }
                return $array;
            }catch(Exception $e){
                echo $e->getMessage();
            }finally{
                $con->close();
            }
        }
        
        //-- muestra el nombre del estado seleccionado
        public function muestraEstado(){
            try{
                $con = new Conexion;
                $con = $con->conectar();
                $sql = "SELECT nombre FROM regiones where id ='".$this->estado."' ";
                $result = $con->query($sql);
                $result = $result->fetch_assoc();
                return $result['nombre'];
            }catch(Exception $e){
                echo $e->getMessage();
            }finally{
                $con->close();
            }
        }

        //-- muestra todas las ciudades que coinciden con el estado
        public function muestraCiudades(){
            try{
                $array = array();
                $con = new Conexion;
                $con = $con->conectar();
                $sql = "SELECT id,nombre FROM localidades WHERE id_region = '".$this->estado."' ";
                $result = $con->query($sql);
                while($row = $result->fetch_array()){
                    array_push($array,array("value"=>$row['id'],"text"=>$row['nombre']) );
                }
                return $array;

            }catch(Exception $e){
                echo $e->getMessage();
            }finally{
                $con->close();
            }
        }

        //-- muestra el nombre de la ciudad seleccionada
        public function muestraCiudad(){
            try{
                $con = new Conexion;
                $con = $con->conectar();
                $sql = "SELECT nombre FROM localidades where id ='".$this->ciudad."' ";
                $result = $con->query($sql);
                $result = $result->fetch_assoc();
                return $result['nombre'];
            }catch(Exception $e){
                echo $e->getMessage();
            }finally{
                $con->close();
            }
        }

        //muestra el estado y el país de la ciudad seleccionada
        public function muestraUbicacion(){
            try{
                $array = array();
                $con = new Conexion;
                $con = $con->conectar();
                $sql = "SELECT id_region,id_pais FROM localidades WHERE id = ".$this->ciudad." ";
                $result = $con->query($sql);
                $row = $result->fetch_assoc();

                $c = $this->muestraCiudad();

                $this->estado = $row['id_region'];
                $e = $this->muestraEstado();

                $this->pais = $row['id_pais'];
                $p = $this->muestraPais();
                array_push( $array,array( "pais"=>$p,"estado"=>$e,"ciudad"=>$c ) );
                return $array;

            }catch(Exception $e){
                echo $e->getMessage();
            }finally{
                $con->close();
            }
        }

    }
?>