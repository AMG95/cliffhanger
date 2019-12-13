<!--Alejandro Millet Gerion-->

<?php

    // Variable de posición para el menú principal
    $paginaActiva = 'peliculas';

    //Header(Cabecera) de la página
    require_once("include/header.php");

?>

<?php

    // Cargamos el controlador de la lista de peliculas
    require_once("backend/controladores/productos/listadoPeliculas.php");

?>

<!--Migas de pan-->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
        <li class="breadcrumb-item active" aria-current="page">Películas</li>
    </ol>
</nav>

<div class="container">
    <h2 class="titulo">PELÍCULAS</h2>
    <hr />
    <div class="row">
    
        <?php

            //Por cada pelicula, generamos una fila
            foreach($listaPeliculas as $pelicula){
                echo '<div class="card col-md-3 text-center">';
                echo '<a href="producto.php?id=' . $pelicula["id"] . '"><img class="card-img-top" src=' . $pelicula['imagen'] . ' /></a>';
                echo '<h5 class="card-title"><strong>' . $pelicula['nombre'] . '</strong></h5>';
                echo '<a class="btn btn-primary" href="producto.php?id=' . $pelicula["id"] . '">Ver más</a>';
                echo '</div>';
            }

        ?>

    </div>
</div>

<?php

    // Footer de la página
    require_once("include/footer.php");

?>