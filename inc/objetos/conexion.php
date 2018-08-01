<?php

	class Conexion{

            //Conexion php 7

            public $con;

		public function conectar(){
                  $this->con = new mysqli(SERVER,USER,PASS,DB);
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

<?php
  