<?php

	class CategoriasProducto{

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
				$this->conn->query("SET NAMES 'utf8'");
			}catch(Exception $error){
				$objetoLog = new Log("admin", $error->getMessage());
			}

		}

		// Método que cierra la conexión a BBDD
		public function close(){

			try{
				mysqli_close($this->conn);
			}catch(Exception $error){
				$objetoLog = new Log("admin", $error->getMessage());
			}

		}

		// Método que recoge solo un producto con su categoria
		public function getCategoriasProducto($id){
			try{

				$resultadoMetodo = array();
				$resultadoConsulta = $this->conn->query("SELECT * FROM CATEGORIAS_PRODUCTOS WHERE id_producto = ".$id);

				// Devuelve un array asociativo, del que sólo nos interesan los datos que corresponden a los alias que nos devuelve la consulta
				while($row = $resultadoConsulta->fetch_assoc()){
					array_push($resultadoMetodo, $row);
				}

				return $resultadoMetodo;

			}catch(Exception $error){
				$objetoLog = new Log("admin", $error->getMessage());
				return 0;
			}

		}

		// Método que inserta un producto con su categoria
		public function insertarCategoriasProducto($idCategoria, $idProducto){

			try{

				$resultadoMetodo = $this->conn->query("INSERT INTO CATEGORIAS_PRODUCTOS(id_categoria, id_producto) VALUES(".$idCategoria.", ".$idProducto.")");
				return $resultadoMetodo;

			}catch(Exception $error){
				$objetoLog = new Log("admin", $error->getMessage());
				return 0;
			}
			
		}

		// Método que borra un producto y su categoria
		public function borrarCategoriasProducto($id){
			try{

				$resultadoMetodo = $this->conn->query("DELETE FROM CATEGORIAS_PRODUCTOS WHERE id_producto = ".$id);
				return $resultadoMetodo;

			}catch(Exception $error){
				$objetoLog = new Log("admin", $error->getMessage());
				return 0;
			}

		}

	}

?>