<!--Alejandro Millet Gerion-->

<?php

    // Variable de posición para el menú principal
    $paginaActiva = 'carrito';

    //Header(Cabecera) de la página
    require_once("include/header.php");

?>

<!--Migas de pan-->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
        <li class="breadcrumb-item active" aria-current="page">Carrito</li>
    </ol>
</nav>

<div class="container">
    <h2 class="titulo">Carrito</h2>
    <hr />

<?php

    // Controlador de la lista del carrito
    require_once("backend/controladores/carrito/listadoProductos.php");

?>

</div>
<br /><br /><br /><br /><br /><br />

<?php

    // Footer de la página
    require_once("include/footer.php");

?>