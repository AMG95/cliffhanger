<?php

    // Variable de posición para el menú principal
    $paginaActiva = 'producto';

    //Header(Cabecera) de la página
    require_once("include/header.php");

    // Si no viene el parámetro id por la URL no te pinta el producto y te redirige al 404
    if(!isset($_GET["id"])){
        header("Location: 404.php");
    }else{

?>

<?php

        $id = $_GET["id"];

        // Cargamos el controlador de la Lista de Productos y obtenemos el detalle del producto
        require_once("backend/controladores/productos/detalle.php");

        // Cargamos el controlador que calcula el número de likes de ese producto
        require_once("backend/controladores/opiniones/listado.php");

        // Cargamos el controlador que pinta 
        require_once("backend/controladores/categoriasProducto/listado.php");

?>

<!--Migas de pan-->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
<?php
    if($detalleProducto[0]["tipo"] == 'pelicula'){
        echo "<li class='breadcrumb-item'><a href='peliculas.php'>Películas</a></li>";
    }elseif($detalleProducto[0]["tipo"] == 'serie'){
        echo "<li class='breadcrumb-item'><a href='series.php'>Series</a></li>";
    }
?>
        <li class="breadcrumb-item active" aria-current="page"><?php echo $detalleProducto[0]["nombre"] ?></li>
    </ol>
</nav>

<?php
    //Contador de likes
    $contadorLikes    = 0;
    $contadorDislikes = 0;

    //Cálculo de likes
    foreach($listaOpiniones as $opinion){
        //Valoramos si es like o no
        if($opinion["valoracion"] == 1){
            $contadorLikes++;
        }else{
            $contadorDislikes++;
        }
    }
?>

<div class="container">
    <br /><br /><br />
    <div class="row">
        <div class="col-4">
            <img src="<?php echo $detalleProducto[0]["imagen"]; ?>" style="width: 100%;" />
        </div>
        <div class="col-8">
            <h3><?php echo $detalleProducto[0]["nombre"]; ?></h3>
            <h5><?php echo $contadorLikes . " <i class='far fa-thumbs-up'></i>    " . $contadorDislikes . "<i class='far fa-thumbs-down'></i>" ?></h5>
            <hr />
            <p><?php echo $detalleProducto[0]["descripcion"]; ?></p>
            <hr />
            <?php
                // Pintamos las categorías del producto
                foreach($listaCategoriasProducto as $categoria){
                    echo "<span class='categoria'>".$categoria["nombre"]."</span>";
                }
                echo "<br /><br />";
                // Dejará añadir el producto al carrito si eres un usuario logueado
                if(isset($_SESSION["nombre"])){
                    echo "<div><a href='backend/controladores/carrito/agregarProducto.php?id=". $detalleProducto[0]["id"] ."'><button type='button' class='btn btn-success'><i class='fas fa-shopping-cart'></i> Añadir por ".$detalleProducto[0]["precio"] . "€"."</button></a></div>";
                }
                //*******************************<OPINIONES>*******************************
                echo "<h5 class='opiniones'>Opiniones: </h5>";
                $productoComentado = false;
                foreach($listaOpiniones as $opinion){
                    if($opinion["estado"] == 1){
                        echo "<div><div>";
                        echo $opinion["username"];
                        echo " | " . date("d-m-Y - H:i", strtotime($opinion["fecha"])) . "h";
                        echo "</div>";
                        echo "<div class='opinion'>";
                        echo "<div class='row'>";
                        echo "<div class='col-1'>";
                        if($opinion["valoracion"] == 1){
                            echo "<i class='far fa-thumbs-up'></i>";
                        }else{
                            echo "<i class='far fa-thumbs-down'></i>";
                        }
                        echo "</div>";                        
                        echo "<div class='col-11'>";
                        echo "<p>" . $opinion["comentario"] . "</p>";
                        echo "</div>";                        
                        echo "</div>";
                        echo "</div></div>";
                        if(isset($_SESSION["id"])){
                            if($opinion["id_usuario"] == $_SESSION["id"]){
                                $productoComentado = true;
                            }
                        }   
                    }
                }
                if(isset($_SESSION["nombre"]) && !$productoComentado){
            ?>
                    <form method="POST" action="backend/controladores/opiniones/insertar.php">
                        <input type="hidden" name="idProducto" value="<?php echo $id;?>"/>
                        <input type="hidden" name="idUsuario" value="<?php echo $_SESSION["id"];?>"/>
                        <select class="form-control" name="valoracion">
                            <option value="1">Me gusta</option>
                            <option value ="0">No me gusta</option>
                        </select>
                        <br />
                        <textarea class="form-control" name="comentario"></textarea>
                        <br />
                        <input class="btn btn-secondary btn-block" type="submit" value="Enviar Opinión" />
                    </form>
            <?php 
                }
                //*******************************</OPINIONES>*******************************
            ?>
        </div>
    </div>
    <br /><br /><br />
</div>

<?php

    }

    // Footer de la página
    require_once("include/footer.php");

?>