<?php

    $root = $_SERVER['DOCUMENT_ROOT'];
    require_once $root.'/inc/objetos/conexion.php';

    class Imagen{
        //-- atributos
        public $ruta,$foto;
        private $idSolicitud,$idFotoHistoria;
        
        //-- getter and setter
        public function getRuta(){return $_SERVER['DOCUMENT_ROOT']."/img/uploads/".$this->idSolicitud."/";}
        public function getFoto(){return $this->foto; }

        public function setIdSolicitud($sIdSolicitud){$this->idSolicitud = $sIdSolicitud;}
        public function setIdFotoHistoria($sIdFotoHistoria){$this->idFotoHistoria = $sIdFotoHistoria;}
        public function setFoto($sFoto){$this->foto = $sFoto;}
        
        //crea imagenes 
        public function crea(){
            
            // obtener extensión del archivo
            $extension = explode(".", $this->foto['name']);
            $extension = end($extension);

            // crear nombre de fotografía compuesto por idSolicitud-fecha actual-número aleatorio y extensión de archivo
            $fecha = date("d-m-Y-H-i-s");
            $num = rand(1,1000);
            $nombre = $this->idSolicitud."-".$fecha."-".$num.".".$extension;

            //creamos el directorio con el id de la solicitud en caso de que no exista
            if ( !file_exists( $this->getRuta() ) ) {
                // mkdir($path, 0700);
                $dirmake = mkdir($this->getRuta(), 0777);
            }

            // movemos la imagen al directorio creado
            move_uploaded_file ($this->foto['tmp_name'],$this->getRuta().$nombre );
            
        }// fin crea

        //-- muestra todas las imágenes del beneficiario seleccionado
        public function muestra(){
            try{
                $array = array();
                $ruta = $this->getRuta(); // Indicar ruta
                $filehandle = @opendir($ruta); // Abre el directorio
                while ($file = @readdir($filehandle)) {// obtener el archivo
                    if(@!is_dir($ruta.$file)){// comprobar que no sea directorio por . y ..
                        array_push( $array,array("nombre"=>$file) );
                    } 
                }
                return $array;
            }catch(Exception $e){
                echo $e->getMessage();
            }finally{
                @closedir($filehandle); // Fin lectura archivos
            }
        }// fin muestra


        //-- crea foto de historia para el beneficiario
        public function creaFotoHistoria(){
            try{
                $con = new Conexion;
                $con = $con->conectar();
                $sql = 'INSERT INTO imghistoria(idSolicitud,fotoHistoria) VALUES('.$this->idSolicitud.',"'.$this->foto.'")';
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
        }//-- crea foto de historia para el beneficiario

        //-- muestra la foto seleccionada de la historia
        public function muestraFotoHistoria(){
            try{
                $array = array();
                $con = new Conexion;
                $con = $con->conectar();
                $sql = 'SELECT id,fotoHistoria FROM imghistoria WHERE idSolicitud = '.$this->idSolicitud;
                $result = $con->query($sql);
                if($result->num_rows > 0)
                {
                    $row = $result->fetch_assoc();    
                    array_push(
                        $array,
                        array(
                            "id"=>$row['id'],
                            "fotoHistoria"=>$row['fotoHistoria']
                        )
                    );
                }
                else
                {
                    array_push(
                        $array,
                        array(
                            "id"=>0,
                            "fotoHistoria"=>""
                        )
                    );
                }
                return $array;
            }catch(Exception $e){
                echo $e->getMessage();
            }finally{
                $con->close();
            }
        }//-- muestra la foto seleccionada de la historia
    
        //-- actualiza la foto seleccionada de la historia
        public function actualizaFotoHistoria(){
            try{
                $con = new Conexion;
                $con = $con->conectar();
                $sql = 'UPDATE imghistoria SET fotoHistoria="'.$this->foto.'" WHERE id ='.$this->idFotoHistoria;
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
        }//-- actualiza la foto seleccionada de la historia

    }// fin class Imagen

?>