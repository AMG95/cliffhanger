<?php

    // Se abre la sesión
    session_start();

    // Finalmente, destruir la sesión.
    session_destroy();

    // Redirigimos a la portada de la web
    header("Location: ../../../index.php");

?>