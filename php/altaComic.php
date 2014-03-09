<?php
	include 'conexion.php';
	$con = conexion();

	ini_set('display_errors',1);
	error_reporting(E_ALL);

	$cat_comic_personaje_id 	= $_REQUEST['cat_comic_personaje_id'];
	$cat_comic_descripcion_id	= $_REQUEST['cat_comic_descripcion_id'];
	$cat_comic_numero_ejemplar	= $_REQUEST['cat_comic_numero_ejemplar'];
	$cat_comic_imagen_url		= $_REQUEST['cat_comic_imagen_url'];
	$cat_comic_precio_portada	= $_REQUEST['cat_comic_precio_portada'];
	$cat_comic_idioma			= $_REQUEST['cat_comic_idioma'];
	$cat_comic_rareza			= $_REQUEST['cat_comic_rareza'];


	$json = new stdClass();



	$registroComics = contarRegistros()+1;
	$cat_comic_unique_id = $registroComics.$cat_comic_personaje_id.$cat_comic_numero_ejemplar.$cat_comic_precio_portada;
	$queryInsertaComic = "INSERT INTO cat_comics VALUES('$cat_comic_unique_id',
														'$cat_comic_descripcion_id', 
														'$cat_comic_personaje_id', 
														'$cat_comic_numero_ejemplar', 
														'$cat_comic_imagen_url',
														'$cat_comic_precio_portada',
														0,
														'$cat_comic_idioma',
														1,
														'$cat_comic_rareza')";
	$queryExito = mysql_query($queryInsertaComic);

	if($queryExito == true){
		$json->exito = true;
	}

	else{
		$json->exito = false;
	}

	echo json_encode($json);

	function contarRegistros(){
		
		$queryCount 	= "SELECT COUNT(*) FROM cat_comics";
		$resultado 		= mysql_query($queryCount);
		$numero_pedidos = mysql_result($resultado, 0);

		return $numero_pedidos;

	}

	//"compania_id=1&cat_comic_personaje_id=4&cat_comic_titulo=dsadas+dsa+as&cat_comic_idioma=esp&cat_comic_descripcion=dasdas+das+ads+&cat_comic_numero_ejemplar=12&cat_comic_imagen_url=sad+asd+asd+asd+as&cat_comic_precio_portada=23"

?>