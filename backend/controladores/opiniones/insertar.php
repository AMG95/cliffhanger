<!--Alejandro Millet Gerion-->

<?php

	//Include de todas las dependencias
	include "../../../backend/libreria.php";

    //Recuperamos los datos que vienen de formulario
    $idProducto = $_POST["idProducto"];
    $idUsuario  = $_POST["idUsuario"];
    $valoracion = $_POST["valoracion"];
    $comentario = $_POST["comentario"];

	// Ejecutamos una query de recogida de opiniones
	$objetoOpinion = new Opinion();

	$estadoOpinion = $objetoOpinion->insertarOpinion($comentario, $valoracion, $idUsuario, $idProducto);

	// Cierro conexión a BBDD
	$objetoOpinion->close();

	// Redirigimos a la página del producto
	header("Location: ../../../producto.php?id=" . $idProducto);

?>