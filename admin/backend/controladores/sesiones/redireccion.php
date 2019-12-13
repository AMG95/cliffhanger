<!--Alejandro Millet Gerion-->

<?php

    // Se abre la sesión
    session_start();    

    // Controlamos que el usuario es administrador y que se ha logueado
    if(!isset($_SESSION["rol"]) || $_SESSION["rol"] != "administrador"){

        // Si no lo es, redirigimos a la portada
        header("Location: ../index.php");

    }

?>