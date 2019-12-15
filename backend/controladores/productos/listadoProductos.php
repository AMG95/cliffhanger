<?php

	//Include de todas las dependencias
	include "backend/libreria.php";

	// Ejecutamos una query de recogida de productos
	$objetoProducto = new Producto();

	$listaProductos = $objetoProducto->getProductos();

	// Cierro conexión a BBDD
	$objetoProducto->close();

?>