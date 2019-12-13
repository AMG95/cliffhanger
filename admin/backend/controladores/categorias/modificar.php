<!--Alejandro Millet Gerion-->

<?php

	//Include de todas las dependencias
	include "../../../backend/libreria.php";

    $id     = $_GET["id"];
    $nombre = $_GET["nombre"];

	// Ejecutamos una query de recogida de categorias
	$objetoCategoria = new Categoria();

    $listaCategorias = $objetoCategoria->actualizarCategoria($id, $nombre);
    
    // Redirigimos a la portada
    header('Location: ../../../listadoCategorias.php?mensaje=51');

?>