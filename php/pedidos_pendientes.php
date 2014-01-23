<?php
	include 'data_functions.php';
	include 'conexion.php';
	$con = conexion();

	ini_set('display_errors',1);
	error_reporting(E_ALL);

	$json = new stdClass();
	$cadenaColumnas = "SELECT pedido_usuario_id, pedido_id, pedido_compania_id, pedido_personaje_id, pedido_textolibre, pedido_lugar_entrega, pedido_forma_pago_id, pedido_fecha FROM pedidos WHERE pedido_estado = 0";
	$query 	= mysql_query($cadenaColumnas);
	$num 	= mysql_num_rows($query);
	echo $num;

	//$json = mostrarPedidosPendientes();

	//echo json_encode($json);

?>