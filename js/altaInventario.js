$(document).ready(function(){
	$("#navbar").load("../html/layouts/navbar_layout.html");
	$("#sidebar").load("../html/layouts/sidebar_layout.html",function(){
		$("#sidebar").find("#4").attr("class","active");
	});
	$("#modal").load("../html/layouts/modal_pedido_pendiente_layout.html");
	cargarCompanias();
	cargarPersonajes();
	cargarComics();
	submitInventario();
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

function cargarComics(){
	$('#personaje').change(function(){
		$('#comic').empty();
		$.get("/php/cargarComics.php",
			$('#personaje').serialize(),
			function(data){
				$('#comic').append('<option selected>Selecciona un comic</option>');
				$.each(data.comics, function(i, val){
					$('#comic').append('<option value='+val.cat_comic_unique_id+'>'+val.cat_comic_unique_id+' '+val.cat_comic_titulo+' '+val.cat_comic_numero_ejemplar+'</option>');
				});
			},
			'json');
	});
}

function submitInventario(){
	$('#alta_inventario').submit(function(e){
		console.log($(this).serialize());
		$.post("/php/altaInventario.php",
			$(this).serialize(),
			function(data){
				if(data.exito == true){
					alert("Exito");
					window.location.href = "altaInventario.php";
				}
				else{
					alert("Error");
				}
			},
			'json');
		e.preventDefault();
	});
}