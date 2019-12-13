<!--Alejandro Millet Gerion-->

<?php

    // Variable de posición para el menú principal
    $paginaActiva = 'contacto';

    //Header(Cabecera) de la página
    require_once("include/header.php");

    //Si el usuario no logueado intenta acceder a la seccion de "Contacto", lo redirige al 404
      if(!isset($_SESSION["id"])){
        header("Location: 404.php");
      }

?>

<!--Migas de pan-->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
        <li class="breadcrumb-item active" aria-current="page">Contacto</li>
    </ol>
</nav>

<!--Contenido de la seccion "Contacto" del menu de navegacion en el que a traves de un formulario se recogera las incidencias que un usuario haya tenido.-->
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="well well-sm">
        <h2 class="titulo">CONTACTA CON NOSOTROS</h2>
        <hr/>
        <form action="backend/controladores/incidencias/insertar.php" method="POST" id="contacto_form">
          <div class="form-group">
            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-pencil-square-o bigicon"></i></span>
            <div class="col-md-10">
              <textarea class="form-control" name="descripcion" id="id_descripcion" maxlength="500" placeholder="Escribe tu mensaje aquí para nosotros. Te atenderemos lo más rapido posible." rows="7"></textarea>
              <input type="hidden" name="id" value="<?php echo $_SESSION["id"]; ?>" />
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-10 text-center">
              <button type="submit" class="btn btn-danger btn-lg" name="submit_contacto" id="id_submit_contacto">Enviar</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<?php

    // Footer de la página
    require_once("include/footer.php");

?>