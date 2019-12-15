<?php

    // Se comprueba la sesión
    require_once("backend/controladores/sesiones/redireccion.php");

    // Cargamos el include del header
    require_once("includes/header.php");

    // Cargamos el controlador de la Lista de Usuarios
    require_once("backend/controladores/usuarios/listado.php");

?>

<div class="container listado">
    <div class="row">
        <div class="col">
            <div class="card">
                <h2>Listado de Usuarios</h2>
                <div class="fluid-container">

<?php

	// Para cada usuario, generamos una fila
	foreach($listaUsuarios as $usuario){
        echo "<div class='row'>";
        echo "<div class='col-2'>";
        echo $usuario["rol"];
        echo "</div>";             
        echo "<div class='col-4'>";
        echo $usuario["username"];
        echo "</div>";
        echo "<div class='col-4'>";
        echo $usuario["email"];
        echo "</div>";
        echo "<div class='col-2'>";
        if($usuario["estado"] == 1){
            echo "<a class='btn btn-danger btn-sm' href='backend/controladores/usuarios/bloquear.php?id=".$usuario["id"]."'>Bloquear usuario</a>";
        }else{
            echo "<a class='btn btn-success btn-sm' href='backend/controladores/usuarios/desbloquear.php?id=".$usuario["id"]."'>Desbloquear usuario</a>";
        }
        echo "</div>";  
        echo "</div>";
	}

?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php

    // Cargamos el include del footer
    require_once("includes/footer.php");

?>