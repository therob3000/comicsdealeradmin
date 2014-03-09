<?php
	include 'conexion.php';
	$con = conexion();

	ini_set('display_errors',1);
	error_reporting(E_ALL);

	$cat_comic_personaje_id = $_REQUEST['cat_comic_personaje_id'];

	$json = new stdClass();
	$arrayComics = array();

	$queryComics = "SELECT cat_comic_unique_id, (SELECT datos_comic_titulo FROM datos_comics WHERE datos_comic_id = cat_comic_descripcion_id) as cat_comic_titulo,
	cat_comic_numero_ejemplar,
	cat_comic_precio_portada 
	FROM cat_comics WHERE cat_comic_personaje_id = $cat_comic_personaje_id";
	$query = mysql_query($queryComics);
	$num = mysql_num_rows($query);

	if($num >= 0){
		for ($i=0; $i < $num ; $i++) { 
			$cat_comic_unique_id 		= mysql_result($query, $i, "cat_comic_unique_id");
			$cat_comic_titulo 			= mysql_result($query, $i, "cat_comic_titulo");
			$cat_comic_numero_ejemplar 	= mysql_result($query, $i, "cat_comic_numero_ejemplar");
			$cat_comic_precio_portada 	= mysql_result($query, $i, "cat_comic_precio_portada");

			$arrayComics[] = array('cat_comic_unique_id' => $cat_comic_unique_id,
									'cat_comic_titulo' => $cat_comic_titulo,
									'cat_comic_numero_ejemplar' => $cat_comic_numero_ejemplar,
									'cat_comic_precio_portada' => $cat_comic_precio_portada
				);

		}
	}
	else{
		$arrayComics = array();
	}

	$json->comics = $arrayComics;

	echo json_encode($json);

?>