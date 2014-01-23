<?php
	include 'data_functions.php';

	ini_set('display_errors',1);
	error_reporting(E_ALL);

	$json = new stdClass();

	$json = mostrarPedidosPendientes();

	echo json_encode($json);

?>