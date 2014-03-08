<?php
	include 'conexion.php';
	$con = conexion();

	ini_set('display_errors',1);
	error_reporting(E_ALL);

	$cat_comic_unique_id = $_REQUEST['cat_comic_unique_id'];

	$json = new stdClass();
	$arrayInventario = array();

	$queryInventario = "SELECT * FROM inventario WHERE inventario_cat_comic_unique_id = $cat_comic_unique_id AND inventario_existente = 1";
	$query = mysql_query($queryInventario);
	$num = mysql_num_rows($query);

	if($num >= 0){
		for($i = 0; $i < $num; $i++){
			$inventario_id 						= mysql_result($query, $i, "inventario_id");
			$inventario_cat_comic_unique_id 	= mysql_result($query, $i, "inventario_cat_comic_unique_id");
			$inventario_comprador				= mysql_result($query, $i, "inventario_comprador");
			$inventario_precio_entrada 			= mysql_result($query, $i, "inventario_precio_entrada");
			$inventario_precio_salida			= mysql_result($query, $i, "inventario_precio_salida");

			$arrayInventario[] = array('inventario_id' => $inventario_id,
										'inventario_cat_comic_unique_id' => $inventario_cat_comic_unique_id,
										'inventario_comprador' => $inventario_comprador,
										'inventario_precio_entrada' => $inventario_precio_entrada,
										'inventario_precio_salida' => $inventario_precio_salida
				);
		}
	}
	else{
		$arrayInventario = array();
	}

	$json->inventario = $arrayInventario;

	echo json_encode($json);

?>