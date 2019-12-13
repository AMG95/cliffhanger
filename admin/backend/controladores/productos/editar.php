<!--Alejandro Millet Gerion-->

<?php

    // Include de todas las dependencias
	include "../../libreria.php";

    // Se recogen los datos del formulario
    $id          = $_POST["id"];
    $nombre      = $_POST["nombre"];
    $imagen      = $_POST["imagen"];
    $descripcion = $_POST["descripcion"];
    $tipo        = $_POST["tipo"];
    $precio      = $_POST["precio"];

    // Recuperamos los IDs marcados en $_POST["categorias"] y los metemos en un array
    $categorias = array_keys($_POST["categorias"]);

	// Se ejecuta una query de actualización de producto
    $objetoProducto = new Producto();
    
    $actualizarProducto = $objetoProducto->actualizarProducto($id, $nombre, $imagen, $descripcion, $tipo, $precio);

    // Se cierra conexión a BBDD
	$objetoProducto->close();

    // Se ejecuta la query de borrado de categorías de ese producto y se insertan las nuevas
    $objetoCategoriasProducto = new CategoriasProducto();

    $borrarCategorias = $objetoCategoriasProducto->borrarCategoriasProducto($id);

    // Para cada categoría
    foreach($categorias as $categoria){
        $insertarCategoria = $objetoCategoriasProducto->insertarCategoriasProducto($categoria, $id);
    }

    $objetoCategoriasProducto->close();

    // Redirigimos al listado de productos
    header("Location: ../../../listadoProductos.php?mensaje=71");

?>