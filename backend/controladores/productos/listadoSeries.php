<!--Alejandro Millet Gerion-->

<?php

	//Include de todas las dependencias
	include "backend/libreria.php";

	// Ejecutamos una query de recogida de productos
	$objetoProducto = new Producto();

	$listaSeries = $objetoProducto->getSeries();

	// Cierro conexión a BBDD
	$objetoProducto->close();

?>