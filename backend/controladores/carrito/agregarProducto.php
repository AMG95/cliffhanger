<!--Alejandro Millet Gerion-->

<?php

    // Se abre la sesión
    session_start();

    // Include de todas las dependencias
	include "../../libreria.php";

    // Se recogen los datos de la URL 
    $id = $_GET["id"];

    array_push($_SESSION["listadoProductosCarrito"], $id);
    
    // Redirigimos a la pantalla del carrito
    header("Location: ../../../carrito.php");

?>