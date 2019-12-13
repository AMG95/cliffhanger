<!--Alejandro Millet Gerion-->

<?php

	class Producto{

		private $host;
		private $database;
		private $user;
		private $password;

		public $conn;

		// Método constructor de la clase. Se ejecuta cuando se crea el objeto
		function __construct(){

			//Inicializamos las propiedades del objeto
			$this->host     = $GLOBALS["host"];
			$this->database = $GLOBALS["database"];
			$this->user     = $GLOBALS["user"];
			$this->password = $GLOBALS["password"];

			// Abrimos conexión a BBDD
			$this->open();

		}	
		
		// Método que abre la conexión a BBDD. Es privado porque se llama sólo al crear el objeto.
		public function open(){

			try{
				$this->conn = new mysqli($this->host, $this->user, $this->password, $this->database);
			}catch(Exception $error){
				//Inserta errores en el log
				$objetoLog = new Log("public", $error->getMessage());
			}

		}

		// Método que cierra la conexión a BBDD
		public function close(){

			try{
				mysqli_close($this->conn);
			}catch(Exception $error){
				$objetoLog = new Log("public", $error->getMessage());
			}

		}

		// Método que recoge solo un producto
		public function getProducto($id){
			try{

				$resultadoMetodo = array();
				$resultadoConsulta = $this->conn->query("SELECT * FROM PRODUCTOS WHERE id = ".$id);

				// Devuelve un array asociativo, del que sólo nos interesan los datos que corresponden a los alias que nos devuelve la consulta
				while($row = $resultadoConsulta->fetch_assoc()){
					array_push($resultadoMetodo, $row);
				}

				return $resultadoMetodo;

			}catch(Exception $error){
				$objetoLog = new Log("public", $error->getMessage());
				return 0;
			}

		}

		// Método que recoge todos los productos
		public function getProductos(){
			try{

				$resultadoMetodo = array();
				$resultadoConsulta = $this->conn->query("SELECT * FROM PRODUCTOS");

				// Devuelve un array asociativo, del que sólo nos interesan los datos que corresponden a los alias que nos devuelve la consulta
				while($row = $resultadoConsulta->fetch_assoc()){
					array_push($resultadoMetodo, $row);
				}

				return $resultadoMetodo;

			}catch(Exception $error){
				$objetoLog = new Log("public", $error->getMessage());
				return 0;
			}

		}

		// Método que recoge todas las películas		
		public function getPeliculas(){
			try{

				$resultadoMetodo = $this->conn->query("SELECT * FROM PRODUCTOS WHERE tipo = 'pelicula'");
				return $resultadoMetodo;

			}catch(Exception $error){
				$objetoLog = new Log("public", $error->getMessage());
				return 0;
			}

		}

		// Método que recoge todas las series
		public function getSeries(){
			try{

				$resultadoMetodo = $this->conn->query("SELECT * FROM PRODUCTOS WHERE tipo = 'serie'");
				return $resultadoMetodo;

			}catch(Exception $error){
				$objetoLog = new Log("public", $error->getMessage());
				return 0;
			}

		}

		// Método que inserta un producto
		public function insertarProducto($nombre, $imagen, $descripcion, $tipo, $precio){

			try{

				$resultadoMetodo = $this->conn->query("INSERT INTO PRODUCTOS(nombre, imagen, descripcion, tipo, precio) VALUES('".$nombre."', '".$imagen."', '".$descripcion."', '".$tipo."', ".$precio.")");
				return $resultadoMetodo;

			}catch(Exception $error){
				$objetoLog = new Log("public", $error->getMessage());
				return 0;
			}
			
		}

		// Método que borra un producto
		public function borrarProducto($id){
			try{

				$resultadoMetodo = $this->conn->query("DELETE FROM PRODUCTOS WHERE id = ".$id);
				return $resultadoMetodo;

			}catch(Exception $error){
				$objetoLog = new Log("public", $error->getMessage());
				return 0;
			}

		}

		// Método que actualiza un producto
		public function actualizarProducto($id, $nombre, $imagen, $descripcion, $tipo, $precio){
			try{

				$resultadoMetodo = $this->conn->query("UPDATE PRODUCTOS SET nombre = '".$nombre."', imagen = '".$imagen."', descripcion = '".$descripcion."', tipo = '".$tipo."', precio = ".$precio." WHERE id = ".$id);
				return $resultadoMetodo;

			}catch(Exception $error){
				$objetoLog = new Log("public", $error->getMessage());
				return 0;
			}

		}

	}

?>