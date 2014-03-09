$(document).ready(function(){
	$("#navbar").load("../html/layouts/navbar_layout.html");
	$("#sidebar").load("../html/layouts/sidebar_layout.html", function(){
		$("#sidebar").find("#3").attr("class", "active");
	});
	
	$("#modal").load("../html/layouts/modal_pedido_pendiente_layout.html");
	cargarCompanias();
	cargarPersonajes();
	cargarDescripciones()
	submitComic();
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

function cargarDescripciones(){
	$('#personaje').change(function(){
		$('#descripcion').empty();
		$.get("/php/cargarDescripcion2.php",
			$("#personaje").serialize(),
				function(data){
				$('#descripcion').append('<option selected>Selecciona un Titulo</option>');
				$.each(data.descripcion, function(i, val){
					$('#descripcion').append('<option value='+val.datos_comic_id+'>'+val.datos_comic_titulo+'</option>');
				});
			},
			'json');
	});
}

function submitComic(){
	$('#comic').submit(function(e){
		console.log($(this).serialize());
		$.post("../php/altaComic.php",
			$(this).serialize(),
			function(data){
				if(data.exito == true){
					alert("Exito");
					window.location.href = "altaComic.php";

				}
				else{
					alert("Error");
				}
			},
			'json');
		e.preventDefault();
	});
}
