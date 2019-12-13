<!--Alejandro Millet Gerion-->

<?php
    
    //Include de todas las dependencias
	include "backend/libreria.php";

	// Ejecutamos una query de recogida de usuarios
	$objetoUsuario = new Usuario();

    $listaUsuarios = $objetoUsuario->getUsuarios();
    
?>