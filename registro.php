<?php

    // Variable de posición para el menú principal
    $paginaActiva = '';

    //Header(Cabecera) de la página
    require_once("include/header.php");

?>

<div class="container">
	<!--Formulario para registrar un usuario-->
	<form action="backend/controladores/usuarios/insertar.php" method="POST" id="form">
		<fieldset class="scheduler-border">
		<legend class="scheduler-border">Datos Personales</legend>
		<div>
			<label for="id_nombre"><strong><em>Nombre:</em></strong></label>
			<span id="error_nombre"></span>
			<input type="text" class="form-control" name="nombre" id="id_nombre" required>
		</div>
		<div>
			<label for="id_primer_ape"><strong><em>Primer apellido:</em></strong></label>
			<span id="error_primer_ape"></span>
			<input type="text" class="form-control" name="primer_ape" id="id_primer_ape" required>
		</div>
		<div>
			<label for="id_segundo_ape"><strong><em>Segundo apellido:</em></strong></label>
			<span id="error_segundo_ape"></span>
			<input type="text" class="form-control" name="segundo_ape" id="id_segundo_ape">
		</div>
		<div>
			<label for="id_dni"><strong><em>DNI:</em></strong></label>
			<span id="error_dni"></span>
			<input type="text" class="form-control" name="dni" id="id_dni" maxlength="9" placeholder="00000000(?)" pattern="^[0-9]{8}[A-Z]{1}$" required>
		</div>
		</fieldset>

		<fieldset class="scheduler-border">
		<legend class="scheduler-border">Datos de Acceso</legend>
		<div class="form-group">
			<label for="id_username"><strong><em>Usuario:</em></strong></label>
			<span id="error_username"></span>
			<input type="text" class="form-control" name="username" id="id_username" minlength="3" maxlength="20" placeholder="ejemplo123" required>
		</div>
		<div class="form-group">
			<label for="id_pwd"><strong><em>Contraseña:</em></strong></label>
			<span id="error_pwd"></span>
			<input type="password" class="form-control" name="pwd" id="id_pwd" minlength="5" maxlength="15" required>
		</div>
		<div class="form-group">
			<label for="id_rpwd"><strong><em>Repite contraseña:</em></strong></label>
			<span id="error_rpwd"></span>
			<input type="password" class="form-control" name="rpwd" id="id_rpwd" minlength="5" maxlength="15" required>
		</div>
		<div class="form-group">
			<label for="id_email"><strong><em>Email:</em></strong></label>
			<span id="error_email"></span>
			<input type="text" class="form-control" name="email" id="id_email" placeholder="ejemplo@gmail.com" required>
		</div>
		</fieldset>
		<br>
		<button type="submit" class="btn btn-dark" name="submit" id="id_submit">Registrarse</button>
		<button type="reset" class="btn btn-dark" name="reset" id="id_reset">Reiniciar formulario</button>
	</form>
</div>

<?php

    // Footer de la página
    require_once("include/footer.php");

?>