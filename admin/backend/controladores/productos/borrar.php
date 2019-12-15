<?php

    // Include de todas las dependencias
	include "../../libreria.php";

    // Se recogen los datos del formulario    
    $id = $_GET["id"];

	// Se ejecuta una query de borrado de producto
    $objetoProducto = new Producto();
    
    $productoBorrado = $objetoProducto->borrarProducto($id);

    // Si se ha borrado el producto
    if($productoBorrado == 1){
        header('Location: ../../../listadoProductos.php?mensaje=11');
    }

?>