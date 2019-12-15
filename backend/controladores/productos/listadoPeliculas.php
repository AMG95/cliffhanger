<?php

	//Include de todas las dependencias
	include "backend/libreria.php";

	// Ejecutamos una query de recogida de productos
	$objetoProducto = new Producto();

	$listaPeliculas = $objetoProducto->getPeliculas();

	// Cierro conexión a BBDD
	$objetoProducto->close();

?>