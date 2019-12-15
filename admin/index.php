<?php

    // Se comprueba la sesión
    require_once("backend/controladores/sesiones/redireccion.php");

    // Cargamos el include del header
    require_once("includes/header.php");

?>

<div class="container options">
    <div class="row">
        <div class="col-sm">
            <a href="listadoProductos.php">
                <div class="card">
                    <i class="fas fa-film"></i>
                    <h4>Productos</h4>
                </div>
            </a>
        </div>
        <div class="col-sm">
            <a href="listadoPedidos.php">
                <div class="card">
                    <i class="fas fa-shopping-cart"></i>
                    <h4>Pedidos</h4>
                </div>
            </a>
        </div>
        <div class="col-sm">
            <a href="listadoCategorias.php">
                <div class="card">
                <i class="fas fa-puzzle-piece"></i>
                <h4>Categorías</h4>
                </div>
            </a>
        </div>        
    </div>
    <div class="row">
    <div class="col-sm">
            <a href="listadoUsuarios.php">
                <div class="card">
                    <i class="fas fa-users"></i>
                    <h4>Usuarios</h4>
                </div>
            </a>
        </div>
        <div class="col-sm">
            <a href="listadoOpiniones.php">
                <div class="card">
                    <i class="far fa-thumbs-up"></i>
                    <h4>Opiniones</h4>
                </div>
            </a>
        </div>
        <div class="col-sm">
            <a href="listadoIncidencias.php">
                <div class="card">
                    <i class="fas fa-exclamation-circle"></i>
                    <h4>Incidencias</h4>
                </div>
            </a>
        </div>    
    </div>    
</div>

<?php

    // Cargamos el include del footer
    require_once("includes/footer.php");

?>