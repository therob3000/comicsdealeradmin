$(document).ready(function(){
	$("#navbar").load("../html/layouts/navbar_layout.html");
	$("#sidebar").load("../html/layouts/sidebar_layout.html");
	$.post("../php/pedidos_pendientes", function(data){
		$.each(data.pendientes, function(i, val){
			$.get("../html/layouts/pedido_layout.html", function(data){
				$("#pedidos").append(data);
				$("#pedidos").find("#row").attr('id', val.pedido_id);
				$("#"+val.pedido_id).find("#pedido_id").text(val.pedido_id);
				$("#"+val.pedido_id).find("#nombre_usuario").text(val.pedido_id);
			});
			
		});
	},'json');
});