<!--Alejandro Millet Gerion-->

<?php

    // Se abre la sesión
    session_start();

    // Include de todas las dependencias
	include "../../libreria.php";    

    // Acceder al array listadoProductosCarrito y eliminar el elemento que se le pasa por $_GET
    echo "<pre>";
    print_r($_SESSION["listadoProductosCarrito"]);
    echo "</pre>";

	// Se ejecuta una query de inserción de pedido
	$objetoPedido = new Pedido();
    
    $insertarPedido = $objetoPedido->insertarPedido($_SESSION["id"]);
  
    // Recuperamos el ID del Pedido que acabamos de generar
    $idPedido = $objetoPedido->getUltimoPedido();

    $id = $idPedido[0]["id"];

    // Se cierra conexión a BBDD
    $objetoPedido->close();

    // Se ejecuta la query de insertado de productos
    $objetoProductosPedido = new Producto_Pedido();    

    // Para cada producto
    foreach($_SESSION["listadoProductosCarrito"] as $producto){
        $insertarProductosPedido = $objetoProductosPedido->insertarProductoPedido($producto, $id);
    }

    $objetoProductosPedido->close();    

    // Borramos la lista de Productos de la sesión
    $_SESSION["listadoProductosCarrito"] = Array();

    // Redirigimos a la pantalla del carrito
    header("Location: ../../../carrito.php?mensaje=32");

?>