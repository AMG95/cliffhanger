<!--Alejandro Millet Gerion-->

<?php

	// Para prevenir problemas con rutas absolutas usamos $_SERVER['DOCUMENT_ROOT']

	// Fichero properties
	require_once $_SERVER['DOCUMENT_ROOT'] . "/cliffhanger/propiedades.php";
	require_once $_SERVER['DOCUMENT_ROOT'] . "/cliffhanger/backend/modulos/log/clase_Log.php";

	// Clases del modelo
	require_once $_SERVER['DOCUMENT_ROOT'] . "/cliffhanger/backend/clases/Producto/clase_Producto.php";
	require_once $_SERVER['DOCUMENT_ROOT'] . "/cliffhanger/backend/clases/Usuario/clase_Usuario.php";
	require_once $_SERVER['DOCUMENT_ROOT'] . "/cliffhanger/backend/clases/Opinion/clase_Opinion.php";
	require_once $_SERVER['DOCUMENT_ROOT'] . "/cliffhanger/backend/clases/Incidencia/clase_Incidencia.php";
	require_once $_SERVER['DOCUMENT_ROOT'] . "/cliffhanger/backend/clases/Categoria_Producto/clase_Categoria_Producto.php";
	require_once $_SERVER['DOCUMENT_ROOT'] . "/cliffhanger/backend/clases/Pedido/clase_Pedido.php";
	require_once $_SERVER['DOCUMENT_ROOT'] . "/cliffhanger/backend/clases/Producto_Pedido/clase_Producto_Pedido.php";	

?>