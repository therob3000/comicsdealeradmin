<?php
	include 'conexion.php';
	$con = conexion();

	ini_set('display_errors',1);
	error_reporting(E_ALL);

	$inventario_cat_comic_unique_id = $_REQUEST['cat_comic_unique_id'];
	$inventario_comprador           = $_REQUEST['inventario_comprador'];
	$inventario_precio_entrada 		= $_REQUEST['inventario_precio_entrada'];
	$inventario_precio_salida		= $_REQUEST['inventario_precio_salida'];
	$inventario_integridad			= $_REQUEST['inventario_integridad'];

	$json = new stdClass();

	$queryInsertaInventario = "INSERT INTO inventario VALUES('',
															'$inventario_cat_comic_unique_id',
															'$inventario_comprador',
															'$inventario_precio_entrada',
															'$inventario_precio_salida',
															 1,
															 NOW(),
															 NULL,
															 '$inventario_integridad',
															 1)";
	
	$queryExito = mysql_query($queryInsertaInventario);

	if($queryExito == true){
		actualizarNumeroCopias($inventario_cat_comic_unique_id);
		$json->exito = true;
	}

	else{
		$json->exito = false;
	}

	echo json_encode($json);

	function actualizarNumeroCopias($unique_id){
		$queryActualizaNumero = "UPDATE cat_comics SET cat_comic_copias = cat_comic_copias +1 WHERE cat_comic_unique_id = $unique_id";
		mysql_query($queryActualizaNumero);
	}

?>