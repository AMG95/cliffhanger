<?php

    // Se comprueba la sesión
    require_once("backend/controladores/sesiones/redireccion.php");

    // Cargamos el include del header
    require_once("includes/header.php");

    // Cargamos el controlador de la Lista de Opiniones
    require_once("backend/controladores/opiniones/listado.php");

?>

<div class="container listado">
    <div class="row">
        <div class="col">
            <div class="card">
                <h2>Listado de Opiniones</h2>
                <div class="fluid-container">

<?php

	// Para cada opinion, generamos una fila
	foreach($listaOpiniones as $opinion){
        echo "<div class='row'>";
        echo "<div class='col-2'>";
        echo $opinion["fecha"];
        echo "</div>";
        echo "<div class='col-2'>";
        echo $opinion["username"];
        echo "</div>";
        echo "<div class='col-2'>";
        echo $opinion["nombre"];
        echo "</div>";
        echo "<div class='col-4'>";
        echo $opinion["comentario"];
        echo "</div>";      
        echo "<div class='col-2'>";
        if($opinion["estado"] == 1){
            echo "<a class='btn btn-danger btn-sm' href='backend/controladores/opiniones/moderar.php?id=".$opinion["id"]."'>Moderar Opinión</a>";
        }else{
            echo "Opinión Moderada";
        }
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