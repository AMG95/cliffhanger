<?php

	//Include de todas las dependencias
	include "../../../backend/libreria.php";

    $nombre = $_POST["nombre"];

	// Ejecutamos una query de recogida de categorias
	$objetoCategoria = new Categoria();

	$listaCategorias = $objetoCategoria->insertarCategoria($nombre);

    // Redirigimos a la portada
    header('Location: ../../../listadoCategorias.php?mensaje=52');

?>