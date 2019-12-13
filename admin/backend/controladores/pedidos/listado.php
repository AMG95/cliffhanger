<!--Alejandro Millet Gerion-->

<?php

	//Include de todas las dependencias
	include "backend/libreria.php";

	// Ejecutamos una query de recogida de pedidos
	$objetoPedido = new Pedido();

	$listaPedidos = $objetoPedido->getPedidos();

?>