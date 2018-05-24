<?php
class conexion{
    //Conexion php 7
    public $con;
    public function conectar(){
        $this->con = new mysqli("USER","PASS","","BD");
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
