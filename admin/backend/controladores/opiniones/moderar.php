<?php

	//Include de todas las dependencias
	include "../../../backend/libreria.php";

    // Recuperamos las variables del formulario
    $id = $_GET["id"];

	// Ejecutamos una query de recogida de opiniones
	$objetoOpinion = new Opinion();

    $estadoCambio = $objetoOpinion->moderarOpinion($id);
    
    // Si se ha completado el cambio
    if($estadoCambio == 1){
        header('Location: ../../../listadoOpiniones.php?mensaje=31');
    }

?>