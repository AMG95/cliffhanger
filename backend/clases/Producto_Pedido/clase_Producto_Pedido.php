<!--Alejandro Millet Gerion-->

<?php

	class Producto_Pedido{

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

		// Método que recoge solo un pedido con su/s producto/s
		public function getProductoPedido($id){
			try{

				$resultadoMetodo = array();
				$resultadoConsulta = $this->conn->query("SELECT * FROM PRODUCTOS_PEDIDOS WHERE id = ".$id);

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

		// Método que recoge todos los pedidos con su/s producto/s
		public function getProductosPedidos(){
			try{

				$resultadoMetodo = array();
				$resultadoConsulta = $this->conn->query("SELECT * FROM PRODUCTOS_PEDIDOS");

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

		// Método que inserta un pedido con su/s producto/s
		public function insertarProductoPedido($idProducto, $idPedido){

			try{

				$resultadoMetodo = $this->conn->query("INSERT INTO PRODUCTOS_PEDIDOS(id_producto, id_pedido) VALUES(".$idProducto.", ".$idPedido.")");
				return $resultadoMetodo;

			}catch(Exception $error){
				$objetoLog = new Log("public", $error->getMessage());
				return 0;
			}
			
		}

		// Método que borra un pedido con su/s producto/s
		public function borrarProductoPedido($id){
			try{

				$resultadoMetodo = $this->conn->query("DELETE FROM PRODUCTOS_PEDIDOS WHERE id = ".$id);
				return $resultadoMetodo;

			}catch(Exception $error){
				$objetoLog = new Log("public", $error->getMessage());
				return 0;
			}

		}

	}

?>