<!--Alejandro Millet Gerion-->

<?php

	//Include de todas las dependencias
	include "backend/libreria.php";

	// Ejecutamos una query de recogida de incidencias
	$objetoIncidencia = new Incidencia();

	$listaIncidencias = $objetoIncidencia->getIncidencias();

?>