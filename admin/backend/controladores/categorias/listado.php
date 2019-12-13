<!--Alejandro Millet Gerion-->

<?php

	//Include de todas las dependencias
	include "backend/libreria.php";

	// Ejecutamos una query de recogida de categorias
	$objetoCategoria = new Categoria();

	$listaCategorias = $objetoCategoria->getCategorias();

?>