<!--Alejandro Millet Gerion-->

<?php

	class Opinion{

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

		// Método que recoge solo una opinion
		public function getOpinion($id){
			try{

				$resultadoMetodo = array();
				$resultadoConsulta = $this->conn->query("SELECT * FROM OPINIONES WHERE id = ".$id);

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

		// Método que recoge todas las opiniones
		public function getOpiniones(){
			try{

				$resultadoMetodo = array();
				$resultadoConsulta = $this->conn->query("SELECT OPINIONES.id, PRODUCTOS.nombre, USUARIOS.username, OPINIONES.estado, OPINIONES.comentario, OPINIONES.valoracion, OPINIONES.fecha FROM OPINIONES INNER JOIN PRODUCTOS ON OPINIONES.id_producto = PRODUCTOS.id INNER JOIN USUARIOS ON OPINIONES.id_usuario = USUARIOS.id");

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

		// Método que inserta una opinion
		public function insertarOpinion($comentario, $valoracion, $idUsuario, $idProducto){

			try{

				$resultadoMetodo = $this->conn->query("INSERT INTO OPINIONES(comentario, valoracion, id_usuario, id_producto) VALUES('".$comentario."', ".$valoracion.", ".$idUsuario.", ".$idProducto.")");
				return $resultadoMetodo;

			}catch(Exception $error){
				$objetoLog = new Log("admin", $error->getMessage());
				return 0;
			}
			
		}

		// Método que borra una opinion
		public function borrarOpinion($id){
			try{

				$resultadoMetodo = $this->conn->query("DELETE FROM OPINIONES WHERE id = ".$id);
				return $resultadoMetodo;

			}catch(Exception $error){
				$objetoLog = new Log("admin", $error->getMessage());
				return 0;
			}

		}

		// Método que actualiza una opinion
		public function moderarOpinion($id){
			try{

				$resultadoMetodo = $this->conn->query("UPDATE OPINIONES SET estado = 0 WHERE id = ".$id);
				return $resultadoMetodo;

			}catch(Exception $error){
				$objetoLog = new Log("admin", $error->getMessage());
				return 0;
			}

		}

	}

?>