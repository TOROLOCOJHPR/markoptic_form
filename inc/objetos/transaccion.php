<?php 

    $root = $_SERVER['DOCUMENT_ROOT'];
    require_once ($root.'/inc/objetos/conexion.php');

    Class Transaccion 
    {

        public $donacion,$auth_code,$event,$hash,$status,
            $card_bin,$card_brand,$card_category,$card_type,
            $card_country,$card_issuer,$env,$cust_fname,
            $cust_lname,$cust_lname_2,$cust_address,$cust_city,
            $cust_state,$cust_zip,$cust_country,$card_last_4,
            $card_owner,$fecha
        ;
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
        public function setCard_bin($sCard_bin){$this->card_bin = $sCard_bin;}
        public function setCard_brand($sCard_brand){$this->card_brand = $sCard_brand;}
        public function setCard_category($Card_categorys){$this->card_category = $sCard_category;}
        public function setCard_type($sCard_type){$this->card_type = $sCard_type;}
        public function setCard_country($sCard_contry){$this->card_country = $sCard_contry;}
        public function setCard_issuer($sCard_issuer){$this->card_issuer = $sCard_issuer;}
        public function setEnv($sEnv){$this->env = $sEnv;}
        public function setCust_fname($sCust_setCust_fname){$this->cust_fname = $sCust_setCust_fname;}
        public function setCust_lname($sCust_lname){$this->cust_lname = $sCust_lname;}
        public function setCust_lname_2($sCust_lname_2){$this->cust_lname_2 = $sCust_lname_2;}
        public function setCust_address($sCust_address){$this->cust_address = $sCust_address;}
        public function setCust_city($sCust_city){$this->cust_city = $sCust_city;}
        public function setCust_state($sCust_state){$this->cust_state = $sCust_state;}
        public function setCust_zip($sCust_zip){$this->cust_zip = $sCust_zip;}
        public function setCust_country($sCust_country){$this->cust_country = $sCust_country;}
        public function setCard_last_4($sCard_last_4){$this->card_last_4 = $sCard_last_4;}
        public function setCard_owner($sCard_owner){$this->card_owner = $sCard_owner;}
        public function setFecha($sFecha){$this->fecha = $sFecha;}

        //métodos

        //-- crea transaccion
        public function crea()
        {
            try
            {
                $con = new Conexion;
                $con = $con->conectar();
                $sql = 'INSERT INTO 
                    transacciones(
                        donacion,
                        idSolicitud,
                        idBanwire,
                        auth_code,
                        event,
                        hash,
                        status,
                        card_bin,
                        card_brand,
                        card_category,
                        card_type,
                        card_country,
                        card_issuer,
                        env,
                        cust_fname,
                        cust_lname,
                        cust_lname_2,
                        cust_address,
                        cust_city,
                        cust_state, 
                        cust_zip, 
                        cust_country, 
                        card_last_4, 
                        card_owner
                    ) 
                    VALUES (
                        '.$this->donacion.',
                        '.$this->idSolicitud.',
                        '.$this->idBanwire.',
                        "'.$this->auth_code.'",
                        "'.$this->event.'",
                        "'.$this->hash.'",
                        "'.$this->status.'",
                        "'.$this->card_bin.'",
                        "'.$this->card_brand.'",
                        "'.$this->card_category.'",
                        "'.$this->card_type.'",
                        "'.$this->card_country.'",
                        "'.$this->card_issuer.'",
                        "'.$this->env.'",
                        "'.$this->cust_fname.'",
                        "'.$this->cust_lname.'",
                        "'.$this->cust_lname_2.'",
                        "'.$this->cust_address.'",
                        "'.$this->cust_city.'",
                        "'.$this->cust_state.'",
                        "'.$this->cust_zip.'",
                        "'.$this->cust_country.'",
                        "'.$this->card_last_4.'",
                        "'.$this->card_owner.'"
                    )
                ';

                if( $con->query($sql) )
                {
                    echo "insertado";
                }
                else
                {
                    echo "fail";
                }
            }
            catch(Exception $e)
            {
                echo $e->getMessage();
            }
            finally
            {
                $con->close();
            }
        }

        //-- muestra todas las transacciones del beneficiario
        public function muestraTodosSolicitud()
        {
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


        //--muestra la suma del total de las donaciones
        public function muestraTotalDonaciones()
        {
            try
            {
                $con = new Conexion;
                $con = $con->conectar();
                $sql = 'SELECT SUM(donacion) AS total FROM transacciones where idSolicitud ='.$this->idSolicitud;
                $result = $con->query($sql);
                $result = $result->fetch_assoc();
                return $result['total'];
            }
            catch(Exception $e)
            {
                echo $e->getMessage();
            }
            finally
            {
                $con->close();
            }
        }//--muestra la suma del total de las donaciones


    }//transacción