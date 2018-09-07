<?php 
    $root = $_SERVER['DOCUMENT_ROOT'];
    require_once ($root.'/inc/objetos/conexion.php');

    Class Transaccion {

        public $donacion,$auth_code,$event,$hash,$status,$fecha;
        private $id,$idSolicitud,$idBanwire;

        //getter and setter
        public function setId($sId){$this->id = $sId;}
        public function setIdSolicitud($sIdSolicitud){$this->idSolicitud = $sIdSolicitud;}
        public function setIdBanwire($sIdBanwire){$this->idBanwire = $sIdBanwire;}
        
        public function setDonacion($sDonacion){$this->donacion = $sDonacion;}
        public function setAuth_code($sAuth){$this->auth_code = $sAuth;}
        public function setEvent($sEvent){$this->event = $sEvent;}
        public function setHash($sHash){$this->hash = $sHash;}
        public function setStatus($sStatus){$this->status = $sStatus;}
        public function setFecha($sFecha){$this->fecha = $sFecha;}

        //métodos

        //-- muestra todas las transacciones del beneficiario
        public function muestraTodosSolicitud(){
            try{
                $array = array();
                $con = new Conexion;
                $con = $con->conectar();
                $sql = 'SELECT id,donacion,idSolicitud,idBanwire,auth_code,event,hash,status,fecha FROM transacciones WHERE idSolicitud = '.$this->idSolicitud;
                $result = $con->query($sql);
                while($row = $result->fetch_array()){
                    array_push($array,array("id"=>$row['id'],"donacion"=>$row['donacion'],"idSolicitud"=>$row['idSolicitud'],"idBanwire"=>$row['idBanwire'],"auth_code"=>$row['auth_code'],"event"=>$row['event'],"hash"=>$row['hash'],"status"=>$row['status'],"fecha"=>$row['fecha']));
                }
                return $array;
            }catch(Exception $e){
                echo $e->getMessage();
            }finally{
                $con->close();
            }
        }//-- muestra todas las transacciones del beneficiario

    }