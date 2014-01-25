<?php
	include 'pedidos_data.php';

	ini_set('display_errors',1);
	error_reporting(E_ALL);

	$saltoPrevio = $_GET['saltoPrevio'];
	$rango = $_GET['rango'];

	$json = new stdClass();

	$json = mostrarPedidosPendientes($saltoPrevio,$rango);

	echo json_encode($json);

?>