var rango = 5;
var pagina;
var saltoPrevio;
$(document).ready(function(){
	$("#navbar").load("../html/layouts/navbar_layout.html");
	$("#sidebar").load("../html/layouts/sidebar_layout.html");
	mostrarPedidos(0,rango);
	clickPaginacion();
});

function mostrarPedidos(saltoPrevio,rango){
	$("#pedidos").empty();
	$("#paginacion").empty();
	cadena = 'saltoPrevio='+saltoPrevio+"&rango="+rango;
	$.get("../php/pedidos_pendientes.php",
		cadena,
		function(data){
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
		$("#totalPedidos").text(data.registros);
		paginacion(data.registros, saltoPrevio);
	},'json');
}

function paginacion(registros, saltoPrevioPag){
	paginas = Math.ceil(registros/rango);
		for(var i = 0; i < paginas; i++){
			if(i == Math.round(saltoPrevioPag/rango)){
				$("#paginacion").append("<li class='active' id='paginaActiva'><a>"+(i+1)+"<span class='sr-only'>(current)</span></a></li>");
				pagina = i+1;
			}
			else
				$("#paginacion").append("<li id='paginaInactiva'><a>"+(i+1)+"</a></li>");
		}
	saltoPrevio = saltoPrevioPag;	
}

function clickPaginacion(){
	$("#paginacion").on( "click", "#paginaInactiva", function(){
		paginaClick = $(this).text();
		
		saltoPrevio = (paginaClick-1) * rango;
		mostrarPedidos(saltoPrevio,rango);
	});
}