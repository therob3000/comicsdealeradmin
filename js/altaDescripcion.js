var rango = 10;
$(document).ready(function(){
	$("#navbar").load("../html/layouts/navbar_layout.html");
	$("#sidebar").load("../html/layouts/sidebar_layout.html", function(){
		$("#sidebar").find("#2").attr("class", "active");
	});
	
	$("#modal").load("../html/layouts/modal_pedido_pendiente_layout.html");

	cargarCompanias();
	cargarPersonajes();

	submitDescripcion();
	$('#personaje').change(function(){
		cargarTitulosDescripcion(0,rango);
	});
});

function cargarCompanias(){
	$.get("/php/cargarCompanias.php",
		function(data){
			//alert(data);
			$('#compania').append('<option selected>Selecciona una compañia</option>');
			$.each(data, function(i, val){
				$('#compania').append('<option value='+val.compania_id+'>'+val.compania+'</option>');
			});

		},
		'json');
}

function cargarPersonajes(){
	$('#compania').change(function() {
		//alert($('#compania').serialize());
		$('#personaje').empty();
		$.get("/php/cargarPersonajes.php",
			$('#compania').serialize(),
			function(data){
				$('#personaje').append('<option selected>Selecciona un personaje</option>');
				$.each(data, function(i, val){
					$('#personaje').append('<option value='+val.personaje_id+'>'+val.personaje+'</option>');
				});
				
			},
			'json');
	});
}

function cargarTitulosDescripcion(saltoPrevio,rango){
	$("#datos_comic").empty();
	$("#paginacion").empty();
	cadena = 'saltoPrevio='+saltoPrevio+"&rango="+rango+"&"+$("#personaje").serialize();
	console.log(cadena);
	$.get("/php/cargarDescripcion.php",
		cadena,
		function(data){
			$.each(data.descripcion, function(i, val){
				$.get("../html/layouts/titulo_descripcion_layout.html", function(data){
					$("#datos_comic").append(data);
					$("#datos_comic").find("#row").attr('id', val.datos_comic_id);
					$("#"+val.datos_comic_id+".desc").find("#id").text(val.datos_comic_id);
					$("#"+val.datos_comic_id+".desc").find("#titulo").text(val.datos_comic_titulo);
					$("#"+val.datos_comic_id+".desc").find("#descripcion").text(val.datos_comic_descripcion);
				})
			});
			paginacion(data.registros, saltoPrevio);
		},'json');

}

function submitDescripcion(){
	$('#descripcion').submit(function(e){
		console.log($(this).serialize());
		$.post("/php/altaDescripcion.php",
			$(this).serialize(),
			function(data){
				if(data.exito == true){
					alert("Exito");
					window.location.href = "altaDescripcionComic.php";
				}
				else{
					alert("Error");
				}
			},
			'json');
		e.preventDefault();
	});
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