<!--Alejandro Millet Gerion-->

<?php

    // Se comprueba la sesión
    require_once("backend/controladores/sesiones/redireccion.php");

    // Cargamos el include del header
    require_once("includes/header.php");

    // Cargamos el controlador de la Lista de Pedidos
    require_once("backend/controladores/pedidos/listado.php");

?>

<div class="container listado">
    <div class="row">
        <div class="col">
            <div class="card">
                <h2>Listado de Pedidos</h2>
                <div class="fluid-container">

<?php

	// Para cada pedido, generamos una fila
	foreach($listaPedidos as $pedido){
        echo "<div class='row'>";
        echo "<div class='col-2'>";
        echo $pedido["fecha"];
        echo "</div>";
        echo "<div class='col-6'>";
        echo $pedido["username"];
        echo "</div>";        
        echo "<div class='col-2'>";
        echo "#" . $pedido["id"];
        echo "</div>";         
        echo "<div class='col-2'>";
        if($pedido["estado"] == 1){
            echo "<a class='btn btn-danger btn-sm' href='backend/controladores/pedidos/cancelar.php?id=".$pedido["id"]."'>Cancelar pedido</a>";
        }else{
            echo "Pedido Cancelado";
        }
        echo "</div>";

        //Incluímos el controlador        
        $listaProductosPedido = $objetoPedido->getProductosPedido($pedido["id"]);

        echo "<div class='col-12'>";
        foreach($listaProductosPedido as $producto){
            echo "<span class='producto'>" . $producto["nombre"] . "</span>";

        }
        echo "</div>";
        echo "</div>";
	}

?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php

    // Cargamos el include del footer
    require_once("includes/footer.php");

?>