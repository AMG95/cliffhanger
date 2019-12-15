<!DOCTYPE html>
<html class="no-js" lang="ES">

    <head>
    <meta charset="utf-8">
    <title>Cliffhanger - Administración</title>
    <meta name="descripcion" content="Página web de administración de la tienda Cliffhanger.com">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Place favicon.ico in the root directory -->
    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/vendor/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.7/css/all.css">
    <link rel="stylesheet" href="assets/css/style.css">
    </head>

    <body>

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="index.php">Panel de Administración</a>
            <span id="index_fe"><a href="../index.php">Volver a la página principal</a></span>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                </ul>
                <span class="navbar-text  welcome">Bienvenido, <?php echo $_SESSION["username"];?></span>
                <a href="backend/controladores/login/logout.php" class="btn btn-secondary btn-sm active">Cerrar Sesión</a>
            </div>
        </nav>