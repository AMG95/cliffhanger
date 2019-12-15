<?php

	class Pedido{

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

		// Método que recoge solo un pedido
		public function getPedido($id){
			try{

				$resultadoMetodo = array();
				$resultadoConsulta = $this->conn->query("SELECT * FROM PEDIDOS WHERE id = ".$id);

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

		// Método que recoge todos los pedidos
		public function getPedidos(){
			try{

				$resultadoMetodo = array();
				$resultadoConsulta = $this->conn->query("SELECT PEDIDOS.id, USUARIOS.username, PEDIDOS.fecha, PEDIDOS.estado FROM PEDIDOS INNER JOIN USUARIOS ON USUARIOS.id = PEDIDOS.id_usuario");

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

		// Método que inserta un pedido
		public function insertarPedido($idUsuario){

			try{

				$resultadoMetodo = $this->conn->query("INSERT INTO PEDIDOS(id_usuario) VALUES(".$id_usuario.")");
				return $resultadoMetodo;

			}catch(Exception $error){
				$objetoLog = new Log("admin", $error->getMessage());
				return 0;
			}
			
		}

		// Método que borra un pedido
		public function borrarPedido($id){
			try{

				$resultadoMetodo = $this->conn->query("DELETE FROM PEDIDOS WHERE id = ".$id);
				return $resultadoMetodo;

			}catch(Exception $error){
				$objetoLog = new Log("admin", $error->getMessage());
				return 0;
			}

		}

		// Método que actualiza un pedido
		public function cancelarPedido($id){
			try{

				$resultadoMetodo = $this->conn->query("UPDATE PEDIDOS SET estado = 0 WHERE id = ".$id);
				return $resultadoMetodo;

			}catch(Exception $error){
				$objetoLog = new Log("admin", $error->getMessage());
				return 0;
			}

		}

		// Método que recoge todos los pedidos
		public function getProductosPedido($id_pedido){
			try{

				$resultadoMetodo = array();
				$resultadoConsulta = $this->conn->query("SELECT * FROM PRODUCTOS_PEDIDOS INNER JOIN PRODUCTOS ON PRODUCTOS_PEDIDOS.id_producto = PRODUCTOS.id WHERE PRODUCTOS_PEDIDOS.id_pedido = " . $id_pedido);

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

	}

?>