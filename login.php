<?php

    // Variable de posición para el menú principal
    $paginaActiva = 'login';

    //Header(Cabecera) de la página
    require_once("include/header.php");

?>

<div class="container">
    <form action="backend/controladores/login/login.php" method="POST" id="form_login">
        <fieldset class="scheduler-border">
        <legend class="scheduler-border">Inicio de sesión</legend>
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Correo electrónico" name="email_login" id="id_email_login" required />
            <span id="error_email_login"></span>
        </div>
        <div class="form-group">
            <input type="password" class="form-control" placeholder="Contraseña" name="pwd_login" id="id_pwd_login" required />
        </div>
        </fieldset>
        <input type="submit" class="btn btn-dark" value="Iniciar sesión" />
        <span id="rlogin"><a href="registro.php">¿Aún no te has registrado?</a></span>
    </form>
</div>

<?php

    // Footer de la página
    require_once("include/footer.php");

?>
