<?php

    // Se comprueba la sesión
    require_once("backend/controladores/sesiones/redireccion.php");

    // Cargamos el include del header
    require_once("includes/header.php");

    // Cargamos el controlador de la Lista de Incidencias
    require_once("backend/controladores/incidencias/listado.php");

?>

<div class="container listado">
    <div class="row">
        <div class="col">
            <div class="card">
                <h2>Listado de Incidencias</h2>
                <div class="fluid-container">

<?php

	// Para cada incidencia, generamos una fila
	foreach($listaIncidencias as $incidencia){
        echo "<div class='row'>";
        echo "<div class='col-3'>";
        echo date( "d/m/Y H:s:i", strtotime($incidencia["fecha"])) . "h";
        echo "</div>";         
        echo "<div class='col-2'>";
        echo $incidencia["username"];
        echo "</div>";         
        echo "<div class='col-7'>";
        echo $incidencia["descripcion"];
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