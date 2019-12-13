<!--Alejandro Millet Gerion-->

<?php

    // Se abre la sesión
    session_start();

    //Importación del fichero libreria.php
    require_once "../../libreria.php";

    // Recuperar los datos del formulario
    $email = $_POST["email_login"];
    $passwd = md5($_POST["pwd_login"]);

    // Realizar una consulta que me compruebe si existe un usuario con ese email y que la contraseña coincida
    $objetoUsuario = new Usuario();

    // Guardamos el resultado de la consulta en un array respuesta
    $respuesta = $objetoUsuario->comprobarUsuario($email, $passwd);

    // Si el array está vacío, no existe ningún usuario con ese email y esa contraseña
    if(count($respuesta) == 0){
        // Volvemos a la pantalla anterior y mostramos el error
        header('Location: ../../../login.php?mensaje=13');        
    } else{
        // Guardamos sus datos en sesión si el estado es 1
        if($respuesta[0]["estado"] == 1){
            $_SESSION["id"]          = $respuesta[0]["id"];
            $_SESSION["nombre"]      = $respuesta[0]["nombre"];
            $_SESSION["primer_ape"]  = $respuesta[0]["primer_ape"];
            $_SESSION["segundo_ape"] = $respuesta[0]["segundo_ape"];
            $_SESSION["rol"]         = $respuesta[0]["rol"];
            $_SESSION["estado"]      = $respuesta[0]["estado"];
            $_SESSION["dni"]         = $respuesta[0]["dni"];
            $_SESSION["username"]    = $respuesta[0]["username"];
            $_SESSION["email"]       = $respuesta[0]["email"];
            $_SESSION["listadoProductosCarrito"] = array();

            // Validamos el rol. Si es administrador, redirigiremos a la pantalla pertinente
            if($_SESSION["rol"] == 'administrador'){
                header('Location: ../../../admin/index.php');
            } else{
                header('Location: ../../../index.php');
            }

        } else{
            // Volvemos a la pantalla anterior y mostramos el error
            header('Location: ../../../login.php?mensaje=12');
        }
    }


?>  