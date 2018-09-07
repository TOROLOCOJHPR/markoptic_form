<?php 
    $root = $_SERVER['DOCUMENT_ROOT'];
    require_once $root.'/inc/objetos/conexion.php';
    
    Class Estatus{
        
        //atributos
        public $estatus;
        private $id;

        //getter and setter
        public function setId($sId){$this->id = $sId;}
        public function setEstatus($sEstatus){$this->estatus = $sEstatus;}

        public function getEstatus(){return $this->estatus;}


        //muestra todos los estatus de solicitud
        public function muestraTodos(){
            try{

                $array = array();
                $con = new Conexion;
                $con = $con->conectar();
                $sql = 'SELECT id,estatus FROM estatussolicitud';
                $result = $con->query($sql);
                while($row = $result->fetch_array()){
                    array_push($array,array("id"=>$row['id'],"estatus"=>$row['estatus']));
                }
                return $array;

            }catch(Exception $e){
                echo $e->getMessage();
            }finally{
                $con->close();
            }
        }//muestra todos los estatus de soicitud

    }//class
