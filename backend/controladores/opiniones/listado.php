<!--Alejandro Millet Gerion-->

<?php

	//Include de todas las dependencias
	include "backend/libreria.php";

	// Ejecutamos una query de recogida de opiniones
	$objetoOpinion = new Opinion();

	$listaOpiniones = $objetoOpinion->getOpiniones($id);

	// Cierro conexión a BBDD
	$objetoOpinion->close();

?>