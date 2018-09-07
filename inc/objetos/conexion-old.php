<?php

    $root = $_SERVER['DOCUMENT_ROOT'];//tomar la ruta hacía el directorio raíz
	require_once $root.'/inc/config.php';// incluir variables de configuración
	class ConexionOld{

        //Conexion php 7

        public $con;

		public function conectar(){
            $this->con = new mysqli(SERVER,USER,PASS,DB_OLD);
			if($this->con->connect_errno){
				return "fail";
			}else{
                  mysqli_set_charset($this->con,'utf8');  
				return $this->con;
			}
		}
		public function close(){
			$this->con = close();
		}

	}

?>