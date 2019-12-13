<!--Alejandro Millet Gerion-->

<?php

	//Include de todas las dependencias
	include "../../../backend/libreria.php";

    // Recuperamos las variables del formulario
    $id = $_GET["id"];

	// Ejecutamos una query de recogida de pedidos
	$objetoPedido = new Pedido();

    $estadoCambio = $objetoPedido->cancelarPedido($id);
    
    // Si se ha completado el cambio
    if($estadoCambio == 1){
        header('Location: ../../../listadoPedidos.php?mensaje=21');
    }

?>