<?php
	include 'conexion.php';
	$con = conexion();

	ini_set('display_errors',1);
	error_reporting(E_ALL);

	$datos_comic_personaje_id = $_REQUEST['cat_comic_personaje_id'];

	$json = new stdClass();
	$arrayDescripcion = array();

	$queryDescripcion = "SELECT * FROM datos_comics WHERE datos_comic_personaje_id = $datos_comic_personaje_id";
	$query = mysql_query($queryDescripcion);
	$num = mysql_num_rows($query);

	if($num >= 0){
		for($i = 0; $i < $num; $i++){
			$datos_comic_id = mysql_result($query, $i, "datos_comic_id");
			$datos_comic_titulo = mysql_result($query, $i, "datos_comic_titulo");
			$datos_comic_descripcion = mysql_result($query, $i, "datos_comic_descripcion");

			$arrayDescripcion[] = array('datos_comic_id' => $datos_comic_id,
										'datos_comic_titulo' => $datos_comic_titulo,
										'datos_comic_descripcion' => $datos_comic_descripcion
				);
		}
	}
	else{
		$arrayDescripcion = array();
	}

	$json->descripcion = $arrayDescripcion;

	echo json_encode($json);
?>