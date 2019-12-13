<!--Alejandro Millet Gerion-->

<?php

	//Include de todas las dependencias
	include "backend/libreria.php";

	// Ejecutamos una query de recogida de categorias
	$objetoCategoriasProducto = new CategoriasProducto();

	$listaCategoriasProducto = $objetoCategoriasProducto->getCategoriasProducto($id);

?>