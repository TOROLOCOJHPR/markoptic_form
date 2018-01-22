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

?>





<?php

	//mysqli_select_db("wordpress",$conn) OR DIE ("Error: No es posible establecer la conexión");

/* Clase encargada de gestionar las conexiones a la base de datos */

/*Class Db{



   private $servidor='localhost';

   private $usuario='root';

   private $password='';

   private $base_datos='wordpress';

   private $link;

   private $stmt;

   private $array;



   static $_instance;

*/

   /*La función construct es privada para evitar que el objeto pueda ser creado mediante new*/

/*   private function __construct(){

      $this->conectar();

   }

*/

   /*Evitamos el clonaje del objeto. Patrón Singleton*/

   //private function __clone(){ }



   /*Función encargada de crear, si es necesario, el objeto. Esta es la función que debemos llamar desde fuera de la clase para instanciar el objeto, y así, poder utilizar sus métodos*/

 /*  public static function getInstance(){

      if (!(self::$_instance instanceof self)){

         self::$_instance=new self();

      }

      return self::$_instance;

   }

*/

   /*Realiza la conexión a la base de datos.*/

/*   private function conectar(){

      $this->link=mysqli_connect($this->servidor, $this->usuario, $this->password, $this->base_datos);

      mysqli_select_db($this->base_datos,$this->link);

      @mysqli_query("SET NAMES 'utf8'");

	  $con = $this->link;

	  return $con;

   }

   public function cerrarcon(){

	   mysqli_close($this->link);

   }

} 

		?>		

		

		<?php

		Conexion ios

		$con=mysql_connect("localhost", "root", "root");

		mysql_select_db("wop",$con) OR DIE ("Error: No es posible establecer la conexión");

		?>		

 */       