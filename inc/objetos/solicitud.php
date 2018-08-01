<?php

    require_once 'conexion.php';
    require_once 'inc/config.php';
    // require_once 'beneficiario.php';
    // require_once 'tutor.php';
    // require 'ubicacion.php';

    class Solicitud{
        
        

        //-- atributos
        public $porque,$fechaSolicitud;
        private $id,$idBen,$idCondicion,$idDispositivo,$idEstatus;

        //-- getter and setter

        public function setId($sId){$this->id = $sId;}
        public function setIdBen($sIdBen){$this->idBen = $sIdBen;}
        public function setIdCondicion($sIdCondicion){$this->idCondicion = $sIdCondicion;}
        public function setIdDispositivo($sIdDispositivo){$this->idDispositivo = $sIdDispositivo;}
        public function setIdEstatus($sIdEstatus){$this->idEstatus = $sIdEstatus;}
        public function setPorque($sPorque){$this->porque = $sPorque;}
        public function setFechaSolicitud($sFechaSolicitud){$this->fechaSolicitud = $sFechaSolicitud;}

        public function getPorque(){return $this->porque;}


        //-- crea solicitud en la base de datos
        public function crea($objBen,$objTut){
            try{
                $con = new conexion;//crear objeto de conexion
                $con = $con->conectar();//conectar con base de datos
                $con->autocommit(FALSE);
                $error=0;
                if($objBen->creaFormulario($con)){
                    
                    $resBen = mysqli_insert_id($con);
                    if($objTut->getIndependiente() == 1){
                        $objTut->setIdBen($resBen);
                        if(!$objTut->creaFormulario($con)){
                            $error = 1;
                        }
                    }
                    
                    $sql="INSERT INTO solicitudes(idBeneficiario,idCondicion,idDispositivo,idEstatusSolicitud,porque) VALUES(".$resBen.",".$this->idCondicion.",".$this->idDispositivo.",".$this->idEstatus.",'".$this->porque."')";
                    if(!$con->query($sql)){
                        $error = 1;
                    }else{
                        $resSol = mysqli_insert_id($con);
                    }
                
                }else{
                    $error = 1;
                }
                
                if($error == 0){
                    $con->commit();
                    return $resSol;
                }else{
                    $con->rollback();
                    return false;
                }

            }catch(Exception $e){
                $e->getMessage();
            }finally{
                $con->close();
            }
        }

        //-- actualiza datos de la solicitud en la base de datos
        public function actualiza(){
            try{
                $con = new conexion;
                $con = $con->conectar();
                $sql="";
            }catch(Exception $e){
                $e->getMessage();
            }finally{
                $con->close();
            }
        }

        //-- muestra los datos de la solicitud
        public function muestra(){
            try{
                // declaracion e inicialización de objetos
                $objBen = new Beneficiario;
                $objTut = new Tutor;
                $objUb = new Ubicacion;
                $array = array();
                $con = new Conexion;

                // inicialización conexion
                $con = $con->conectar();

                //seleccionar datos de solicitud
                $sql="SELECT idBeneficiario,idCondicion,idDispositivo,idEstatusSolicitud,porque,fechaSolicitud FROM `solicitudes` WHERE id = ".$this->id." ";
                $result = $con->query($sql);
                $row = $result->fetch_assoc();
                
                // asignar valores a arreglo a mostrar de datos de solicitud
                array_push( $array, array( "porque"=>$row['porque'],"fechaSolicitud"=>$row['fechaSolicitud'] ) );
                
                // asignar valor a id objeto beneficiario y traer sus datos
                $objBen->setId($row['idBeneficiario']);
                $arrayBen = $objBen->muestra();

                // asignar valor a id objeto tutor y traer sus datos
                $objTut->setIdBen($arrayBen[0]['id']);
                $arrayTut = $objTut->muestraBeneficiario();

                // asignar valor a idCiudad objeto ubicacion y traer nombre de ciudad estado y país correspondientes al beneficiario                    
                $objUb->setCiudad( $arrayBen[0]['ciudad'] );
                $ubicacion = $objUb->muestraUbicacion();

                // unir los diferentes arreglos con los datos de los arreglos
                $arrayMerge = array_merge($arrayBen[0],$ubicacion[0],$arrayTut[0],$array[0]); // $array[0],$array[0] para crear un solo arreglo al unir y no crear un arreglo multidimensional

                return $arrayMerge;

            }catch(Exception $e){
                $e->getMessage();
            }finally{
                $con->close();
            }
        }

        //-- muestra todas las solicitudes
        public function muestraTodos(){
            try{
                $con = new conexion;
                $con = $con->conectar();
                $sql="";
            }catch(Exception $e){
                $e->getMessage();
            }finally{
                $con->close();
            }
        }

        //-- elimina la solicitud de la base de datos
        public function elimina(){
            try{
                $con = new conexion;
                $con = $con->conectar();
                $sql="";
            }catch(Exception $e){
                $e->getMessage();
            }finally{
                $con->close();
            }
        }

    }
?>