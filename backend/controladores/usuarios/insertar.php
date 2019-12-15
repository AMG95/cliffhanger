<?php

    // Include de todas las dependencias
	include "../../libreria.php";

    // Se recogen los datos del formulario
    $nombre = $_POST["nombre"];
    $primer_ape = $_POST["primer_ape"];
    $segundo_ape = $_POST["segundo_ape"];
    $dni = $_POST["dni"]; 
    $username = $_POST["username"];
    $passwd = md5($_POST["rpwd"]);
    $email = $_POST["email"];

	// Se ejecuta una query de inserción de usuario
	$objetoUsuario = new Usuario();
    
    $insertarUsuario = $objetoUsuario->insertarUsuario($nombre, $primer_ape, $segundo_ape, $dni, $username, $passwd, $email);

    // Cierro conexión a BBDD
    $objetoUsuario->close();

    header('Location: ../../../index.php?mensaje=11');

?>