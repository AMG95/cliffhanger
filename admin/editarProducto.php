<?php

    // Se comprueba la sesión
    require_once("backend/controladores/sesiones/redireccion.php");

    // Recuperamos el id que viene por la URL
    $id = $_GET["id"];

    // Cargamos el include del header
    require_once("includes/header.php");

    // Recuperamos los datos del Producto
    require_once("backend/controladores/productos/detalle.php");

    // Cargamos el controlador de la Lista de Categorías
    require_once("backend/controladores/categorias/listado.php");

    // Cargamos el controlador de la Lista de Categorías de un producto
    require_once("backend/controladores/categorias_producto/listado.php");

?>

<div class="container listado">
    <div class="row">
        <div class="col">
            <div class="card">
                <h2>Editar Producto</h2>
                <div class="fluid-container">
                    <form id="insertarProducto" method="POST" action="backend/controladores/productos/editar.php">
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">                        
                                    <label for="nombre">Nombre:</label>
                                    <input type="name" class="form-control" value="<?php echo $detalleProducto[0]["nombre"]?>" id="nombre" placeholder="Nombre" name="nombre">
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">                        
                                    <label for="imagen">Imagen:</label>
                                    <input type="name" class="form-control" value="<?php echo $detalleProducto[0]["imagen"]?>" id="portada" placeholder="Imagen" name="imagen">
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">                        
                                    <label for="nombre">Tipo:</label>
                                    <select class="form-control" id="tipo" name="tipo">
                                        <option value="pelicula" <?php if($detalleProducto[0]["tipo"] == "pelicula") echo "selected"; ?>>Película</option>
                                        <option value="serie" <?php if($detalleProducto[0]["tipo"] == "serie") echo "selected"; ?>>Serie</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-group">                        
                                    <label for="precio">Precio:</label>
                                    <select class="form-control" id="precio" name="precio">
                                        <option value="1.99" <?php if($detalleProducto[0]["precio"] == "1.99") echo "selected" ?>>1.99€</option>
                                        <option value="2.99" <?php if($detalleProducto[0]["precio"] == "2.99") echo "selected" ?>>2.99€</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="precio">Descripción:</label>
                                    <textarea class="form-control" name="descripcion"><?php echo $detalleProducto[0]["descripcion"]?></textarea>
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
        $checked = false;
        foreach($listaCategoriasProducto as $categoriaProducto){
            if($categoriaProducto["id_categoria"] == $categoria["id"]){                
                $checked = true;
            }
        }
        if($checked){
            echo "<input type='checkbox' class='custom-control-input' id='categoria-".$categoria['id']."' name='categorias[".$categoria['id']."]' checked>";
        }else{
            echo "<input type='checkbox' class='custom-control-input' id='categoria-".$categoria['id']."' name='categorias[".$categoria['id']."]'>";
        }
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
                                    <input type="hidden" name="id" value="<?php echo $detalleProducto[0]["id"]; ?>">
                                    <input type="submit" class="btn btn-primary btn-block" value="Editar Producto" />
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>                
