	
/*	$("#btnComentario").click(function() {		
		alert("hola mundo");
		/*var categoria = $("#nombre_categoria").val();
		if (categoria != '') {
			$.ajax({
				url: 'controller/categoria_controller.php',
				type: 'POST',			
				data: $('form').serialize(),
				success:function(msg){
					$("#mensaje").html(msg);
					$("input").val("");
					cargarTablaCategorias();
				}
			});	
			alert("Registro Enviado");
		} else {
			alert("El nombre de la categoria no puede estar en blanco");
		}
	});*/

	$("#btnComentario").on('click', function() {
		alert("Este es un Comentario");
		/* Act on the event */
	});
