<!--Alejandro Millet Gerion-->

<?php

    // Variable de posición para el menú principal
    $paginaActiva = '';

    //Header(Cabecera) de la página
    require_once("include/header.php");

?>
    
<!--Contenido de la seccion "Mapa del sitio" ubicado en el footer que mostrara la estructura del sitio web-->
<div class="row">
  <div class="col-md-12">
    <!--Mapa del sitio de la pagina web-->
    <h2 class="titulo">MAPA DEL SITIO</h2>
    <hr width="50%" >
    <ul id="mapa">
      <li><a href="index.php">Inicio</a></li>
      <li><a href="peliculas.php">Películas</a></li>
      <li><a href="series.php">Series</a></li>
      <li><a href="contacto.php">Contacto</a><span id="cmapa">(Acceso con usuario registrado)</span></li>
    </ul>
  </div>
</div>

<?php

    // Footer de la página
    require_once("include/footer.php");

?>