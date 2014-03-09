<?php
	include 'conexion.php';
	$con = conexion();

	ini_set('display_errors',1);
	error_reporting(E_ALL);

	$datos_comic_personaje_id = $_REQUEST['datos_comic_personaje_id'];
	$datos_comic_titulo = $_REQUEST['datos_comic_titulo'];
	$datos_comic_descripcion = $_REQUEST['datos_comic_descripcion'];

	$json = new stdClass();

	$queryInsertaDatosComic = "INSERT INTO datos_comics VALUES('',
																'$datos_comic_titulo',
																'$datos_comic_descripcion',
																'$datos_comic_personaje_id')";
	//echo $queryInsertaDatosComic;
	$queryExito = mysql_query($queryInsertaDatosComic);

	if($queryExito == true){
		$json->exito = true;
	}
	else{
		$json->exito = false;
	}

	echo json_encode($json);

?>