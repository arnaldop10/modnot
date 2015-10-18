	
	$("#btnGuardar").click(function() {		
		var categoria = $("#nombre_categoria").val();
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
	});

	$("#btnActualizar").click(function() {
		var categoria = $("#nombre_categoria").val();
		var id = $("#id_categoria").val();
		if (categoria != '' && id != '') {
			$.ajax({
				url: 'controller/categoria_controller.php',
				type: 'POST',			
				data: $('form').serialize(),
				success:function(msg){
					$("#mensaje").html(msg);
					$("input").val("");
					$("#mensaje").fadeOut(3000);					
				}
			});	
			alert("Registro Actualizado");
			cargarTablaCategorias();
		} else {
			alert("El nombre de la categoria no puede estar en blanco");
		}	
	});

	$("#btnEliminar").click(function() {
		var categoria = $("#nombre_categoria").val();
		var id = $("#id_categoria").val();
		if (categoria != '' && id != '') {
			if (confirm("¿Esta seguro de eliminar esta Categoria?")) {
				$.ajax({
					url: 'controller/categoria_controller.php',
					type: 'POST',
					data: $('form').serialize(),
					success:function(msg){
						$("#mensaje").html(msg);
						$("input").val("");
						$("#mensaje").fadeOut(3000);
					}
				});	
				alert("Registro Eliminado");
				cargarTablaCategorias();
			};
		} else {
			alert("El Nombre de la categoria no puede estar en blanco");
		}	
	});

	$("#tablaCategorias").on('click', 'a', function() {
		var idCat = $(this).data('id');
		var nomCat = $(this).data('name');
		$("#id_categoria").val(idCat);
		$("#nombre_categoria").val(nomCat);
	});
	

