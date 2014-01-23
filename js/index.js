$(document).ready(function(){
	$("#navbar").load("../html/layouts/navbar_layout.html");
	$("#sidebar").load("../html/layouts/sidebar_layout.html");
	$.post("../php/pedidos_pendientes.php", function(data){
		$.each(data.pendientes, function(i, val){
			$.get("../html/layouts/pedido_layout.html", function(data){
				$("#pedidos").append(data);
				$("#pedidos").find("#row").attr('id', val.pedido_id);
				$("#"+val.pedido_id).find("#pedido_id").text(val.pedido_id);
				$("#"+val.pedido_id).find("#nombre_usuario").text(val.usuario_nombre);
				$("#"+val.pedido_id).find("#correo_usuario").text(val.usuario_correo);
				$("#"+val.pedido_id).find("#compania").text(val.compania_nombre);
				$("#"+val.pedido_id).find("#personaje").text(val.personaje_nombre);
				$("#"+val.pedido_id).find("#descripcion").text(val.pedido_textolibre);
				$("#"+val.pedido_id).find("#lugar_entrega").text(val.pedido_lugar_entrega);
				$("#"+val.pedido_id).find("#forma_pago").text(val.formaPago_nombre);
				$("#"+val.pedido_id).find("#fecha_pedido").text(val.pedido_fecha);
			});
			
		});
	},'json');
});