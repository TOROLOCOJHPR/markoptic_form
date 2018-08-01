<?php

    class Imagen{

        //-- atributos
        public $ruta,$foto;
        private $idSolicitud;

        //-- getter and setter
        public function getRuta(){return "img/uploads/".$this->idSolicitud."/" ;}
        public function getFoto(){return $this->foto; }

        public function setIdSolicitud($sIdSolicitud){$this->idSolicitud = $sIdSolicitud;}
        
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
                $filehandle = opendir($ruta); // Abre el directorio
                while ($file = readdir($filehandle)) {// obtener el archivo
                    if(!is_dir($ruta.$file)){// comprobar que no sea directorio por . y ..
                        array_push( $array,array("nombre"=>$file) );
                    } 
                }
                return $array;
            }catch(Exception $e){
                echo $e->getMessage();
            }finally{
                closedir($filehandle); // Fin lectura archivos
            }
        }// fin muestra
    
    
    
    }// fin class Imagen

?>