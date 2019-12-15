<?php

    // Se comprueba la sesión
    require_once("backend/controladores/sesiones/redireccion.php");

    // Cargamos el include del header
    require_once("includes/header.php");

    // Cargamos el controlador de la Lista de Categorías
    require_once("backend/controladores/categorias/listado.php");

?>

<div class="container listado">
    <div class="row">
        <div class="col">
            <div class="card">
                <h2>Insertar Producto</h2>
                <div class="fluid-container">
                    <form id="insertarProducto" method="POST" action="backend/controladores/productos/insertar.php">
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">                        
                                    <label for="nombre">Nombre:</label>
                                    <input type="name" class="form-control" id="nombre" placeholder="Nombre" name="nombre">
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">                        
                                    <label for="imagen">Imagen:</label>
                                    <input type="name" class="form-control" id="portada" placeholder="Imagen" name="imagen">
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">                        
                                    <label for="nombre">Tipo:</label>
                                    <select class="form-control" id="tipo" name="tipo">
                                        <option value="pelicula">Película</option>
                                        <option value="serie">Serie</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-group">                        
                                    <label for="precio">Precio:</label>
                                    <select class="form-control" id="precio" name="precio">
                                        <option value="1.99">1.99€</option>
                                        <option value="2.99">2.99€</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="precio">Descripción:</label>
                                    <textarea class="form-control" name="descripcion"></textarea>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="listaCategorias">
                                    <div class="col-12">
                                        <div class="row checkbox-line">

<?php

    // Sacamos todas las categorías
    foreach($listaCategorias as $categoria){
        echo "<div class='col-3'>";
        echo "<div class='custom-control custom-checkbox custom-control-inline'>";
        echo "<input type='checkbox' class='custom-control-input' id='categoria-".$categoria['id']."' name='categorias[".$categoria['id']."]'>";
        echo "<label class='custom-control-label' for='categoria-".$categoria['id']."'>".$categoria['nombre']."</label>";
        echo "</div>";
        echo "</div>";
    }

?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group add-button">
                                    <input type="submit" class="btn btn-primary btn-block" value="Insertar Producto" />
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>                
