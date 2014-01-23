<?php
	include 'conexion.php';
	$con = conexion();

	ini_set('display_errors',1);
	error_reporting(E_ALL);

	$respuestaJSON 	= array();
	$json 			= new stdClass();
	$cadenaColumnas = "SELECT pedido_usuario_id, pedido_id, pedido_compania_id, pedido_personaje_id, pedido_textolibre, pedido_lugar_entrega, pedido_forma_pago_id, pedido_fecha FROM pedidos";

	function mostrarPedidosPendientes(){
		global $usuario_id;
		global $json;
		global $cadenaColumnas;

		$queryPedidosPendientes = $cadenaColumnas . " WHERE pedido_estado = 0";
		$resultado = ejecutarQuery($queryPedidosPendientes);
		$json ->pendientes = $resultado;
		return $json;
	}

	function mostrarPedidosResueltos(){
		global $usuario_id;
		global $json;
		global $cadenaColumnas;

		$queryPedidosResueltos = $cadenaColumnas . " AND pedido_estado = 1";
		$resultado = ejecutarQuery($queryPedidosResueltos);
		$json ->resueltos = $resultado;
	}

	function mostrarPedidosCancelados(){
		global $usuario_id;
		global $json;
		global $cadenaColumnas;

		$queryPedidosCancelados = $cadenaColumnas . " AND pedido_estado = 2";
		$resultado = ejecutarQuery($queryPedidosCancelados);
		$json ->cancelados = $resultado;

	}

	function buscarNombreEmpresa($pedido_compania_id){
		$query = "SELECT compania_nombre FROM companias WHERE compania_id = $pedido_compania_id";
		$queryNombreEmpresa = mysql_query($query);
		$resNombreEmpresa = mysql_result($queryNombreEmpresa, 0, "compania_nombre");

		return $resNombreEmpresa;
	}

	function buscarNombrePersonaje($pedido_personaje_id){
		$query = "SELECT personaje_nombre FROM personajes WHERE personaje_id = $pedido_personaje_id";
		$queryNombrePersonaje = mysql_query($query);
		$resNombrePersonaje = mysql_result($queryNombrePersonaje, 0, "personaje_nombre");

		return $resNombrePersonaje;
	}

	function buscarFormaDePago($pedido_forma_pago_id){
		$query = "SELECT forma_pago_nombre FROM formasdepago WHERE forma_pago_id = $pedido_forma_pago_id";
		$queryNombrePago = mysql_query($query);
		$resNombrePago = mysql_result($queryNombrePago, 0, "forma_pago_nombre");

		return $resNombrePago;
	}

	function buscarNombreUsuario($pedido_usuario_id){
		$query = "SELECT usuario_nombre FROM usuarios WHERE usuario_id = $pedido_usuario_id";
		$queryNombreUsuario = mysql_query($query);
		$resNombreUsuario = mysql_result($queryNombreUsuario, 0, "usuario_nombre");

		return $resNombreUsuario;
	}

	function ejecutarQuery($queryAsk){
		global $respuestaJSON;
		
		$respuestaJSON = array();
		$query 	= mysql_query($queryAsk);
		$num 	= mysql_num_rows($query);

		if($num >= 0){
			for($i=0; $i < $num; $i++){
				$pedido_id 				= mysql_result($query, $i, "pedido_id");
				$pedido_compania_id		= mysql_result($query, $i, "pedido_compania_id");
				$pedido_personaje_id	= mysql_result($query, $i, "pedido_personaje_id");
				$pedido_textolibre		= mysql_result($query, $i, "pedido_textolibre");
				$pedido_lugar_entrega	= mysql_result($query, $i, "pedido_lugar_entrega");
				$pedido_forma_pago_id 	= mysql_result($query, $i, "pedido_forma_pago_id");
				$pedido_fecha 			= mysql_result($query, $i, "pedido_fecha");
				$pedido_usuario_id		= mysql_result($query, $i, "pedido_usuario_id");

				$compania_nombre 	= buscarNombreEmpresa($pedido_compania_id);
				$personaje_nombre 	= buscarNombrePersonaje($pedido_personaje_id);
				$formaPago_nombre	= buscarFormaDePago($pedido_forma_pago_id);
				$usuario_nombre 	= buscarNombreUsuario($pedido_usuario_id);

				$respuestaJSON[] = array('pedido_id' => $pedido_id,
										 'compania_nombre' => $compania_nombre,
										 'personaje_nombre' => $personaje_nombre,
										 'pedido_textolibre' => $pedido_textolibre,
										 'pedido_lugar_entrega' => $pedido_lugar_entrega,
										 'formaPago_nombre' => $formaPago_nombre,
										 'pedido_fecha' => $pedido_fecha,
										 'usuario_nombre' => $usuario_nombre
				);
			}
		}

		return $respuestaJSON;

	}

?>