<?php
// Se abre la sesión
    session_start();
?>
<!DOCTYPE html>
	<head>
		<!--Referencias necesarias ubicadas en cabecera del documento para scripts, estilos, un titulo, etc...-->
		<title>Cliffhanger</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="shortcut icon" href="assets/img/logo.png">
		<link rel="stylesheet" type="text/css" href="assets/css/style.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
		<link rel="stylesheet" href="imageslidermaker/ism/css/my-slider.css"/>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.7/css/all.css">
	</head>
	<body>
		<div class="row">
			<div class="col-md-12">
				<nav class="navbar navbar-expand bg-dark navbar-dark">
					<!-- El logo de la empresa que va dentro de la barra de navegacion el cual al pinchar sobre el nos llevara a la pagina principal-->
					<a href="index.php">
						<img src="assets/img/logo.png" id="logo" alt="Logo Cliffhanger"/>
					</a>
					<!-- Implementacion de boton de ocultacion
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
						<span class="navbar-toggler-icon"></span>
					</button>-->
					<!-- Los botones con los links a las otras secciones de la pagina-->
					<div class="collapse navbar-collapse" id="collapsibleNavbar">
						<span class="ml-auto"></span>
						<!--Botones de registro e inicio de sesion-->
						<!--Si el usuario no esta logueado, mostrara los botones de registro e inicio de sesion-->
						<?php if(!isset($_SESSION["username"])){ ?>
							<span data-toggle="modal" data-target="#modal1">
								<a href="registro.php"><button type="button" class="btn btn-dark" id="registro" data-toggle="tooltip" title="¿Aun no eres miembro? ¡Regístrate ya!">Registrarse</button></a>
							</span>
							<span data-toggle="modal" data-target="#modal2">
								<a href="login.php"><button type="button" class="btn btn-dark" id="login" data-toggle="tooltip" title="Iniciar sesión con una cuenta existente">Iniciar sesión</button></a>
							</span>
						<?php }else{ ?> <!--Si el usuario esta logueado, mostrara un boton con su nombre de usuario, una opcion de cierre de sesion dentro del mismo y el carrito-->
						<span class="dropdown">
							<button type="button" class="btn btn-primary dropdown-toggle" id="user" data-toggle="dropdown">
								<?php echo $_SESSION['username']; ?>
							</button>
							<div class="dropdown-menu">
								<?php //Si el usuario logueado es administrador, le saldra una opcion que podra ir al panel de control y administrar la aplicacion
									if($_SESSION["rol"] == 'administrador'){
										echo "<a class='dropdown-item' href='admin/index.php'>Administrar</a>";
									}
								?>
								<a class="dropdown-item" href="<?php echo 'backend/controladores/login/logout.php';?>">Cerrar sesión</a>
							</div>
							<span>
								<a href="carrito.php"><button type="button" class="btn btn-dark" id="login" data-toggle="tooltip" title="Carrito de la compra">Carrito (<?php echo count($_SESSION["listadoProductosCarrito"]);?>)</button></a>
							</span>
						</span>
						<?php } ?>
					</div>
				</nav>
			</div>
		</div>

		<?php
			//En caso de que nos encontremos en la ruta indicada, uno de los links del menu de navegacion aparecera mas iluminado que los otros indicando que nos encontramos en esa seccion de la pagina.
			switch ($paginaActiva) {
				case "inicio":
					$inicioClass    = "active";
					$peliculasClass = "";
					$seriesClass    = "";
					$contactoClass  = "";
					break;
				case "peliculas":
					$inicioClass    = "";
					$peliculasClass = "active";
					$seriesClass    = "";
					$contactoClass  = "";
					break;
				case "series":
					$inicioClass    = "";
					$peliculasClass = "";
					$seriesClass    = "active";
					$contactoClass  = "";
					break;
				case "contacto":
					$inicioClass    = "";
					$peliculasClass = "";
					$seriesClass    = "";
					$contactoClass  = "active";
					break;
				//Los tres hacen lo mismo
				case "producto":
				case "carrito":
				case "login":
					$inicioClass    = "";
					$peliculasClass = "";
					$seriesClass    = "";
					$contactoClass  = "";
					break;
			}
		?>

		<div class="row">
			<div class="col-md-12">
				<nav class="navbar navbar-expand bg-danger navbar-dark">
					<!-- Implementacion de boton de ocultacion-->
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
						<span class="navbar-toggler-icon"></span>
					</button>
					<!-- Los botones con los links a las otras secciones de la pagina-->
					<div class="collapse navbar-collapse" id="collapsibleNavbar">
						<ul class="navbar-nav text-uppercase" id="nav_nav">
							<li class="nav-item <?php echo $inicioClass; ?>">
								<a class="nav-link" href="index.php">Inicio</a>
							</li>
							<li class="nav-item <?php echo $peliculasClass; ?>">
								<a class="nav-link" href="peliculas.php">Películas</a>
							</li>
							<li class="nav-item <?php echo $seriesClass; ?>">
								<a class="nav-link" href="series.php">Series</a>
							</li>
							<?php //Si el usuario esta logueado, se le mostrara una seccion adicional llamada "Contacto" en la que dicho usuario podra enviar incidencias.
								if(isset($_SESSION["id"])){
							?>
									<li class="nav-item <?php echo $contactoClass; ?>">
										<a class="nav-link" href="contacto.php">Contacto</a>
									</li>
							<?php
								}
							?>
						</ul>
						<span class="ml-auto"></span>
						<!--El buscador para la barra de navegacion-->
						<form class="form-inline">
							<div class="p-1 bg-light rounded rounded-pill shadow-sm mb-4" id="buscar">
								<div class="input-group">
									<input type="search" placeholder="Buscar..." aria-describedby="button-addon1" class="form-control border-0 bg-light">
									<div class="input-group-append">
										<button id="button-addon1" type="submit" class="btn btn-link text-danger"><i class="fa fa-search"></i></button>
									</div>
								</div>
							</div>
						</form>
					</div>
				</nav>
			</div>
		</div>
