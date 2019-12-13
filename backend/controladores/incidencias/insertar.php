<!--Alejandro Millet Gerion-->

<?php

    // Include de todas las dependencias
	include "../../libreria.php";

    // Se recogen los datos del formulario
    $descripcion = $_POST["descripcion"];
    $id = $_POST["id"];

	// Se ejecuta una query de inserción de incidencia
	$objetoIncidencia = new Incidencia();
    
    $insertarIncidencia = $objetoIncidencia->insertarIncidencia($descripcion, $id);

    // Cierro conexión a BBDD
    $objetoIncidencia->close();

    header('Location: ../../../index.php?mensaje=21');

?>