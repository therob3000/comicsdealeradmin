<?php
	include 'conexion.php';
	$con = conexion();

	ini_set('display_errors',1);
	error_reporting(E_ALL);

	$datos_comic_personaje_id = $_REQUEST['datos_comic_personaje_id'];
	$saltoPrevio = $_REQUEST['saltoPrevio'];
	$rango = $_REQUEST['rango'];

	$json = new stdClass();
	$arrayDescripcion = array();

	$queryDescripcion = "SELECT * FROM datos_comics WHERE datos_comic_personaje_id = $datos_comic_personaje_id LIMIT $saltoPrevio, $rango";
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
	$json->registros = contarRegistros($datos_comic_personaje_id);

	echo json_encode($json);

	function contarRegistros($datos_comic_personaje_id){
		//$pedido = 0 -> Pendientes
		//$pedido = 1 -> Resueltos
		//$pedido = 2 -> Cancelados
		$queryCount 	= "SELECT COUNT(*) FROM datos_comics WHERE datos_comic_personaje_id = $datos_comic_personaje_id";
		$resultado 		= mysql_query($queryCount);
		$numero_pedidos = mysql_result($resultado, 0);

		return $numero_pedidos;

	}
?>
