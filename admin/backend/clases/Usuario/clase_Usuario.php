<!--Alejandro Millet Gerion-->

<?php

	class Usuario{

		public $host;
		public $database;
		public $user;
		public $password;

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

		// Método que recoge solo un usuario
		public function getUsuario($id){
			try{

				$resultadoMetodo = array();
				$resultadoConsulta = $this->conn->query("SELECT * FROM USUARIOS WHERE id = ".$id);

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

		// Método que recoge todos los usuarios
		public function getUsuarios(){
			try{

				$resultadoMetodo = array();
				$resultadoConsulta = $this->conn->query("SELECT * FROM USUARIOS");

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

		//Método que recoge si existe el usuario con esa contraseña
		public function comprobarUsuario($email, $password){
			try{
				$resultadoMetodo = array();
				$resultadoConsulta = $this->conn->query("SELECT * FROM USUARIOS WHERE email = '".$email."' AND password = '".$password."'");

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

		// Método que inserta un usuario	
		public function insertarUsuario($email, $password){
			try{

				$resultadoMetodo = $this->conn->query("INSERT INTO USUARIOS(email, password) VALUES('".$email."', '".$password."')");
				return $resultadoMetodo;

			}catch(Exception $error){
				$objetoLog = new Log("admin", $error->getMessage());
				return 0;
			}
			
		}

		// Método que borra un usuario
		public function borrarUsuario($id){
			try{

				$resultadoMetodo = $this->conn->query("DELETE FROM USUARIOS WHERE id = ".$id);
				return $resultadoMetodo;

			}catch(Exception $error){
				$objetoLog = new Log("admin", $error->getMessage());
				return 0;
			}
		}

		// Método que actualiza un usuario
		public function actualizarUsuario($id, $email, $password){
			try{

				$resultadoMetodo = $this->conn->query("UPDATE USUARIOS SET email = '".$email."', password = '".$password."' WHERE id = ".$id);
				return $resultadoMetodo;

			}catch(Exception $error){
				$objetoLog = new Log("admin", $error->getMessage());
				return 0;
			}

		}
		
		// Método que bloquea a un usuario
		public function bloquearUsuario($id){
			try{

				$resultadoMetodo = $this->conn->query("UPDATE USUARIOS SET estado = 0 WHERE id = ".$id);
				return $resultadoMetodo;

			}catch(Exception $error){
				$objetoLog = new Log("admin", $error->getMessage());
				return 0;
			}

		}

		// Método que desbloquea a un usuario
		public function desbloquearUsuario($id){
			try{

				$resultadoMetodo = $this->conn->query("UPDATE USUARIOS SET estado = 1 WHERE id = ".$id);
				return $resultadoMetodo;

			}catch(Exception $error){
				$objetoLog = new Log("admin", $error->getMessage());
				return 0;
			}
		}

	}

?>