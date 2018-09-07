<?php 
    $root = $_SERVER['DOCUMENT_ROOT'];
    require_once ($root.'/inc/objetos/conexion.php');

    Class Rol {
        
        public $nombre;
        private $id;

        //--getter and setter
        public function setId($sId){$this->id = $sId;}
        public function setNombre($sNombre){$this->nombre = $sNombre;}

        public function getNombre(){return $this->nombre;}


        //--crea rol de usuario en la base de datos
        public function crea(){
            try{
                $con = new Conexion;
                $con = $con->conectar();
                $sql = 'INSERT INTO roles(nombre) VALUES("'.$this->nombre.'")';
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
        }//--crea rol de usuario en la base de datos
        

        //--muestra rol de usuario seleccionado
        public function muestra(){
            try{
                $arry();
                $con = new Conexion;
                $con = $con->conectar();
                $sql = 'SELECT id,nombre FROM roles where id = '.$this->id;
                $result= $con->query($sql);
                while($row = $result->fetch_array()){
                    array_push($array,array("id"=>$row['id'],"nombre"=>$row['nombre']));
                }
                return $array;
            }catch(Exception $e){
                $e->getMessage();
            }finally{
                $con->close();
            }
        }//--muestra rol de usuario seleccionado
        
        //--muestra todos los roles de usuario
        public function muestraTodos(){
            try{
                $array = array();
                $con = new Conexion;
                $con = $con->conectar();
                $sql = 'SELECT id,nombre FROM roles ORDER BY nombre ASC';
                $result= $con->query($sql);
                while($row = $result->fetch_array()){
                    array_push($array,array("id"=>$row['id'],"nombre"=>$row['nombre']));
                }
                return $array;
            }catch(Exception $e){
                $e->getMessage();
            }finally{
                $con->close();
            }
        }//--muestra todos los roles de usuario
        
        //--actualiza rol de usuario en la base de datos
        public function actualiza(){
            try{
                $con = new Conexion;
                $con = $con->conectar();
                $sql = 'UPDATE roles SET nombre="'.$this->nombre.'" WHERE id = '.$this->id;
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
        }//--actualiza rol de usuario en la base de datos

        //--elimina rol de usuario en la base de datos
        public function elimina(){
            try{
                $con = new Conexion;
                $con = $con->conectar();
                $sql = 'DELETE FROM roles WHERE id = '.$this->id;
            }catch(Exception $e){
                $e->getMessage();
            }finally{
                $con->close();
            }
        }//--elimina rol de usuario en la base de datos
    
    }//class