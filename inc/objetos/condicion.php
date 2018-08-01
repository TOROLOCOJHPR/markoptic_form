<?php

    class Condicion {

        //atributos
        public $condicion,$imgFrontal,$imgTrasera,$formulario;
        private $id;

        //métodos

        // getter and setter

        public function getCondicion(){return $this->condicion;}
        public function getImgFrontal(){return $this->imgFrontal;}
        public function getImgTrasera(){return $this->imgTrasera;}
        public function getFormulario(){return $this->formulario;}

        public function setId($sId){$this->id = $sId; }
        public function setCondición($sCondicion){$this->condicion = $sCondicion;}
        public function setImgFrontal($sImgFrontal){$this->imgFrontal = $sImgFrontal;}
        public function setImgTrasera($sImgTrasera){$this->imgTrasera = $sImgTrasera;}
        public function setFormulario($sFormulario){$this->formulario = $sFormulario;}


        //muestra las condiciones por dispositivo

        public function muestra(){
            try{
                $array = array();
                $con = new Conexion;
                $con = $con->conectar();
                $sql ="SELECT id,condicion FROM condiciones WHERE id =".$this->id;
                $result = $con->query( $sql );
                while( $row = $result->fetch_array() ){
                    array_push( $array, array( "id"=>$row['id'],"condicion"=>$row['condicion'] ) );
                }
                return $array;
            }catch(Exception $e){
                echo $e->getMessage();
            }finally{
                $con->close();
            }
        }

        //muestra todas las condiciones
        public function muestraTodos(){
            try{
                $array = array();
                $con = new Conexion;
                $con = $con->conectar();
                $sql ="SELECT * FROM condiciones";
                $result = $con->query($sql);
                while( $row = $result->fetch_array() ){
                    array_push( $array,array("id"=>$row['id'],"condicion"=>$row['condicion']) );
                }
                return $array;
            }catch(Exception $e){
                echo $e->getMessage();
            }finally{
                $con->close();
            }
        }

        //muestra condiciones dependiendo del formulario solicitado
        public function muestraFormulario(){
            try{
                $array = array();
                $arrayForm = explode(",", $this->formulario);
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
                $sql="SELECT * FROM condiciones WHERE ".$cadena;
                $result = $con->query($sql);
                while( $row = $result->fetch_array() ){
                    array_push( $array,array( "id"=>$row['id'],"condicion"=>$row['condicion'],"imgFrontal"=>$row['imgFrontal'],"imgTrasera"=>$row['imgTrasera'] ) );
                }
                return $array;
            }catch(Exception $e){
                echo $e->getMessage();
            }finally{
                $con->close();
            }
        }

    }
?>