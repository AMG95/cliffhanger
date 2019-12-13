<!--Alejandro Millet Gerion-->

<?php

    // Variable de posición para el menú principal
    $paginaActiva = 'inicio';

    //Header(Cabecera) de la página
    require_once("include/header.php");

?>

<!--Slider-->
<div class="ism-slider" data-play_type="loop" data-image_fx="zoompan" id="my-slider">
    <ol>
        <li>
            <img src="imageslidermaker/ism/image/slides/_u/1576018619475_335167.jpg">
        </li>
        <li>
            <img src="imageslidermaker/ism/image/slides/_u/1576016970043_156013.jpg">
        </li>
        <li>
            <img src="imageslidermaker/ism/image/slides/_u/1576016973891_679901.jpg">
        </li>
        <li>
            <img src="imageslidermaker/ism/image/slides/_u/1576016980406_707859.jpg">
        </li>
        <li>
            <img src="imageslidermaker/ism/image/slides/_u/1576016983737_142837.jpg">
        </li>
    </ol>
</div>

<?php

    // Cargamos el controlador de la Lista de Productos
    require_once("backend/controladores/productos/listadoProductos.php");

?>
<div class="container">
    <h2 class="titulo">NOVEDADES</h2>
    <hr />
    <div class="row">
    
        <?php

            //Por cada producto, generamos una fila
            foreach($listaProductos as $producto){
                echo '<div class="card col-md-3 text-center">';
                echo '<a href="producto.php?id=' . $producto["id"] . '"><img class="card-img-top" src=' . $producto['imagen'] . ' /></a>';
                echo '<h5 class="card-title"><strong>' . $producto['nombre'] . '</strong></h5>';
                echo '<a class="btn btn-primary" href="producto.php?id=' . $producto["id"] . '">Ver más</a>';
                echo '</div>';
            }

        ?>

    </div>
</div>

<?php

    // Footer de la página
    require_once("include/footer.php");

?>

