<?php

    // Variable de posición para el menú principal
    $paginaActiva = 'series';

    //Header(Cabecera) de la página
    require_once("include/header.php");

?>

<?php

    // Cargamos el controlador de la lista de series
    require_once("backend/controladores/productos/listadoSeries.php");

?>

<!--Migas de pan-->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
        <li class="breadcrumb-item active" aria-current="page">Series</li>
    </ol>
</nav>

<div class="container">
    <h2 class="titulo">SERIES</h2>
    <hr />
    <div class="row">
    
        <?php

            //Por cada serie, generamos una fila
            foreach($listaSeries as $serie){
                echo '<div class="card col-md-3 text-center">';
                echo '<a href="producto.php?id=' . $serie["id"] . '"><img class="card-img-top" src=' . $serie['imagen'] . ' /></a>';
                echo '<h5 class="card-title"><strong>' . $serie['nombre'] . '</strong></h5>';
                echo '<a class="btn btn-primary" href="producto.php?id=' . $serie["id"] . '">Ver más</a>';
                echo '</div>';
            }

        ?>

    </div>
</div>

<?php

    // Footer de la página
    require_once("include/footer.php");

?>