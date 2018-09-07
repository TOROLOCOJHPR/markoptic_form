<?php 

    class MedioDifusion {

        //atributos
        public $medio,$reqDesc,$placeHolder;
        private $id;

        //métodos

        //getter and setter

        public function getMedio(){return $this->medio;}
        public function getReqDesc(){return $this->reqDesc;}
        public function getPlaceHolder(){return $this->placeHolder;}

        public function setId($sId){$this->id = $sId;}
        public function setMedio($smedio){$this->medio = $sMedio;}
        public function setReqDesc($sReqDesc){$this->reqDesc = $sReqDesc;}
        public function setPlaceHolder($sPlaceHolder){$this->placeHolder = $sPlaceHolder;}


        //muestra los datos del medio de difusión seleccionado
        public function muestra(){
            try{
                $array = array();
                $con = new Conexion;
                $con = $con->conectar();
                $sql="SELECT id,medio,reqDesc,placeholder FROM mediosdifusion WHERE id = ".$this->id;                
                $result = $con->query($sql);
                $row = $result->fetch_assoc();
                array_push(
                    $array,
                    array(
                        "idmedio"=>$row['id'],
                        "medio"=>$row['medio'],
                        "reqDesc"=>$row['reqDesc'],
                        "placeholder"=>$row['placeholder']
                    ) 
                );//array_push
                return $array;
            }catch(Exception $e){
                echo $e->getMessage();
            }finally{
                $con->close();
            }
        }//muestra

        //muestra todos los medios de difusión 
        public function muestraTodos(){
            try{
                $array = array();
                $con = new Conexion;
                $con = $con->conectar();
                $sql="SELECT id,medio,reqDesc,placeholder FROM mediosdifusion GROUP BY medio ASC";
                $result = $con->query($sql);
                while( $row = $result->fetch_array() ){
                    array_push(
                        $array,
                        array(
                            "idMedio"=>$row['id'],
                            "medio"=>$row['medio'],
                            "reqDesc"=>$row['reqDesc'],
                            "placeholder"=>$row['placeholder']
                        ) 
                    );//array_push
                }//while
                return $array;
            }catch(Exception $e){
                echo $e->getMessage();
            }finally{
                $con->close();
            }
        }//muestraTodos

        //crea nuevo medio de difusión
        public function crea(){
            try{
                $con = new Conexion;
                $con = $con->conectar();
                $sql="";
                $result = $con->query($sql);
            }catch(Exception $e){
                echo $e->getMessage();
            }finally{
                $con->close();
            }
        }//crea

        //actualiza medio de difusión seleccionado
        public function actualiza(){
            try{
                $con = new Conexion;
                $con = $con->conectar();
                $sql="";
                $result = $con->query($sql);
            }catch(Exception $e){
                echo $e->getMessage();
            }finally{
                $con->close();
            }
        }//actualiza

        //elimina medio de difusión seleccionado
        public function elimina(){
            try{
                $con = new Conexion;
                $con = $con->conectar();
                $sql="";
                $result = $con->query($sql);
            }catch(Exception $e){
                echo $e->getMessage();
            }finally{
                $con->close();
            }
        }//elimina

    }//class

?>