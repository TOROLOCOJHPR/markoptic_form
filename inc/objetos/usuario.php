<?php 

    $root = $_SERVER['DOCUMENT_ROOT'];
    require_once ($root.'/inc/objetos/conexion.php');

    Class Usuario {

        public $user,$rol;
        protected $pass;
        private $id;

        //-- getter and setter
        public function setId($sId){$this->id = $sId;}
        public function setUser($sUser){$this->user = $sUser;}
        public function setRol($sRol){$this->rol = $sRol;}
        public function setPass($sPass){$this->pass = $sPass;}

        public function getUser(){return $this->user;}
        public function getRol(){return $this->rol;}

        //-- crea usuario en la base de datos
        public function crea(){
            try{
                $opciones = ['cost' => 10,'salt' => SALT,];
                $hash = password_hash($this->pass,PASSWORD_BCRYPT,$opciones);
                $con = new Conexion;
                $con = $con->conectar();
                $sql = 'INSERT INTO usuarios(user,pass,rol) VALUES("'.$this->user.'","'.$hash.'",'.$this->rol.')';
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
        }//-- crea usuario en la base de datos

        //-- valida usuario
        public function valida(){
            
            try{
                $array = array();
                $con = new Conexion;
                $con = $con->conectar();
                $sql = 'SELECT id,user,pass,rol FROM usuarios Where user = "'.$this->user.'"';
                $result = $con->query($sql);
                if($result->num_rows > 0){//verificar si se encontro usuario
                    $row = $result->fetch_assoc();
                    if(password_verify($this->pass,$row['pass']) ) {//verificar hash de las contraseñas
                        array_push($array,array("valida"=>true,"id"=>$row['id'],"usuario"=>$row['user'],"rol"=>$row['rol'],"error"=>""));
                    }else{
                        array_push($array,array("valida"=>false,"id"=>"","usuario"=>$row['user'],"rol"=>$row['rol'],"error"=>"Contraseña incorrecta"));
                    }
                }else{
                    array_push($array,array("valida"=>false,"id"=>"","usuario"=>"","rol"=>"","error"=>"Usuario no encontrado"));
                }
                return $array;
            }catch(Exception $e){
                echo $e->getMessage();
            }finally{
                $con->close();
            }

        }//-- valida usuario

        //-- muestra todos los usuarios existentes
        public function muestra(){
            $array = array();
            $con = new Conexion;
            $con = $con->conectar();
            $sql = 'SELECT id,user,rol FROM usuarios WHERE id = '.$this->id;
            $result = $con->query($sql);
            while($row = $result->fetch_array()){
                array_push($array,array("id"=>$row['id'],"user"=>$row['user'],"rol"=>$row['rol']));
            }
            return $array;
        }//--muestra todos los usuarios existentes
        
        //-- muestra todos los usuarios existentes
        public function muestraTodos(){
            try{
                $array = array();
                $con = new Conexion;
                $con = $con->conectar();
                $sql = 'SELECT id,user,rol FROM usuarios ORDER BY user ASC';
                $result = $con->query($sql);
                while($row = $result->fetch_array()){
                    array_push($array,array("id"=>$row['id'],"user"=>$row['user'],"rol"=>$row['rol']));
                }
                return $array;
            }catch(Exception $e){
                echo $e->getMessage();
            }finally{
                $con->close();
            }

        }//--muestra todos los usuarios existentes

        //-- muestra si el usuario existe
        public function muestraExistente(){
            try{
                $con = new Conexion;
                $con = $con->conectar();
                $sql = 'SELECT user FROM usuarios WHERE user = "'.$this->user.'"';
                $result = $con->query($sql);
                return  ($result->num_rows > 0) ? true : false ;
            }catch(Exception $e){
                echo $e->getMessage();
            }
            finally{
                $con->close();
            }
        }//

        //-- actualiza contraseña del usuario
        public function actualiza(){
            try{
                $opciones = ['cost' => 10,'salt' => SALT,];
                $hash = password_hash($this->pass,PASSWORD_BCRYPT,$opciones);
                $con = new Conexion;
                $con = $con->conectar();
                $sql = 'UPDATE usuarios SET pass="'.$hash.'", rol='.$this->rol.' WHERE id = '.$this->id;
                return ($con->query($sql)) ? true : false;
            }catch(Exception $e){
                echo $e->getMessage();
            }finally{
                $con->close();
            }
        }//-- actualiza contraseña del usuario
        
        //-- actualiza contraseña y rol del usuario
        public function actualizaRol(){
            try{
                $opciones = ['cost' => 10,'salt' => SALT,];
                $hash = password_hash($this->pass,PASSWORD_BCRYPT,$opciones);
                $con = new Conexion;
                $con = $con->conectar();
                $sql = 'UPDATE usuarios SET pass="'.$hash.'" WHERE id = '.$this->id;
                return ($con->query($sql)) ? true : false;
            }catch(Exception $e){
                echo $e->getMessage();
            }finally{
                $con->close();
            }
        }//-- actualiza contraseña y rol del usuario

        //-- elimina usuario de la base de datos
        public function elimina(){
            try{
                $con = new Conexion;
                $con = $con->conectar();
                $sql = 'DELETE FROM usuarios WHERE id = '.$this->id;
                return ($con->query($sql)) ? true : false;
            }catch(Exception $e){
                echo $e->getMessage();
            }finally{
                $con->close();
            }
        }//-- elimina usuario de la base de datos
    }//class