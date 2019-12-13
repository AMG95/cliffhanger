<!--Alejandro Millet Gerion-->

<?php

    // Se comprueba la sesión
    require_once("backend/controladores/sesiones/redireccion.php");

    // Cargamos el include del header
    require_once("includes/header.php");

    // Cargamos el controlador de la Lista de Opiniones
    require_once("backend/controladores/categorias/listado.php");

?>

<div class="container listado">
    <div class="row">
        <div class="col">
            <div class="card">
                <h2>Listado de Categorías</h2>
                <div class="fluid-container">

<?php

        echo "<form action='backend/controladores/categorias/insertar.php' method='POST'>";
        echo "<div class='row'>";
        echo "<div class='col-10'>";
        echo "<input class='form-control insertar-categoria' name='nombre' type='text'>";
        echo "</div>";
        echo "<div class='col-2'>";
        echo "<input type='submit' class='btn btn-primary btn-sm' value ='Insertar Categoría' />";
        echo "</div>";               
        echo "</div>";
        echo "</form>";        

	// Para cada opinion, generamos una fila
	foreach($listaCategorias as $categoria){
        echo "<div class='row'>";
        echo "<div class='col-10'>";
        echo "<input class='input-categorias' id='input-".$categoria["id"]."' type='text' value='".$categoria["nombre"]."' disabled>";
        echo "</div>";
        echo "<div class='col-2'>";
        echo "<button class='btn btn-secondary btn-sm modificar-categoria' data-id='".$categoria["id"]."'>Modificar Categoría</button>";
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