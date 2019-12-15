<?php

	//Include de todas las dependencias
	include "../../../backend/libreria.php";

    // Recuperamos las variables del formulario
    $id = $_GET["id"];

	// Ejecutamos una query de recogida de usuarios
	$objetoUsuario = new Usuario();

    $estadoCambio = $objetoUsuario->desbloquearUsuario($id);
    
    // Si se ha completado el cambio
    if($estadoCambio == 1){
        header('Location: ../../../listadoUsuarios.php?mensaje=42');
    }

?>