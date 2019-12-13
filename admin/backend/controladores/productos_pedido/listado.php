<!--Alejandro Millet Gerion-->

<?php

	//Include de todas las dependencias
	include_once "backend/libreria.php";

	// Ejecutamos una query de recogida de categorias
	$objetoProductosPedido = new Productos_Pedido();

	$listaProductosPedido = $objetoProductosPedido->getProductosPedido($id);

?>