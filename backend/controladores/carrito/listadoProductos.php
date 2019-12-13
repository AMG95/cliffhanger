<!--Alejandro Millet Gerion-->

<?php

	//Include de todas las dependencias
	include "backend/libreria.php";

	// Para cada pedido, generamos una fila
	foreach($_SESSION["listadoProductosCarrito"] as $idProducto){

        // Se ejecuta una query de inserción de producto
        $objetoProducto = new Producto(); 

        $producto = $objetoProducto->getProducto($idProducto);

        echo "<div class='row'>";
        echo "<div class='col-1'>";
        echo "<img class='img_carrito' src='" . $producto[0]["imagen"] . "' />";
        echo "</div>"; 
        echo "<div class='col-7'>";
        echo $producto[0]["nombre"];
        echo "</div>";        
        echo "<div class='col-2'>";
        echo $producto[0]["precio"] . "€";
        echo "</div>";     
        echo "<div class='col-2'>";
        echo "<a class='btn btn-danger btn-sm' href='backend/controladores/carrito/eliminarProducto.php?id=".$producto[0]["id"]."'>Eliminar producto</a>";

        echo "</div>";               
        echo "</div>";

        echo "<hr />";

        // Se cierra conexión a BBDD
        $objetoProducto->close();


    }

    //Si el carrito contiene al menos 1 producto te mostrará un botón de finalizar pedido
    if(count($_SESSION["listadoProductosCarrito"]) != 0){
        echo "<a class='btn btn-secondary btn-block' href='backend/controladores/carrito/finalizarPedido.php'>Finalizar pedido</a>";
    }else{
        echo "Carrito vacio";
    }


?>