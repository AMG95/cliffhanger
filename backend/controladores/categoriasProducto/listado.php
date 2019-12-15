<?php

	//Include de todas las dependencias
	include "backend/libreria.php";

	// Ejecutamos una query de recogida de opiniones
	$objetoCategoriasProducto = new Categoria_Producto();

	$listaCategoriasProducto = $objetoCategoriasProducto->getCategoriaProducto($id);

	// Cierro conexión a BBDD
	$objetoCategoriasProducto->close();

?>