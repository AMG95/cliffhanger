<?php

    // Se comprueba la sesión
    require_once("backend/controladores/sesiones/redireccion.php");

    // Cargamos el include del header
    require_once("includes/header.php");

    // Cargamos el controlador de la Lista de Productos
    require_once("backend/controladores/productos/listado.php");

?>

<div class="container botonAgregar">
    <div class="row">
        <div class="col">
            <div class="button">
                <a href="insertarProducto.php"><button type="button" class="btn btn-primary btn-lg btn-block">Insertar Nuevo Producto</button></a>
            </div>
        </div>
    </div>
</div>

<div class="container listado">
    <div class="row">
        <div class="col">
            <div class="card">
                <h2>Listado de Productos</h2>
                <div class="fluid-container">

<?php

	// Para cada película, generamos una fila
	foreach($listaProductos as $producto){
        echo "<div class='row'>";
        echo "<div class='col-10'>";
        echo $producto["nombre"];
        echo "</div>";
        echo "<div class='col-1'>";
        echo "<a class='btn btn-primary btn-sm' href='editarProducto.php?id=".$producto["id"]."'>Editar</a>";
        echo "</div>";         
        echo "<div class='col-1'>";
        echo "<a class='btn btn-danger btn-sm' href='backend/productos/borrar.php?id=".$producto["id"]."'>Borrar</a>";
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