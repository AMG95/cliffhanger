<?php

    // Se abre la sesión
    session_start();

    $id = $_GET["id"];

    // Eliminamos el Producto del Carrito (en sesión)
    unset($_SESSION["listadoProductosCarrito"][array_search($id, $_SESSION["listadoProductosCarrito"])]);

    // Redirigimos a la pantalla del carrito
    header("Location: ../../../carrito.php?mensaje=31");

?>