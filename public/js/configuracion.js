	
	$("#btnGuardar").click(function() {		
		var nombre_inst_emp = $("#nombre_inst_emp").val();
		if (nombre_inst_emp != '') {
			$.ajax({
				url: 'controller/configuracion_controller.php',
				type: 'POST',			
				data: $('form').serialize(),
				success:function(msg){
					alert(msg);
					$("input").val("");					
					cargarConfiguracion();
				}
			});	
		} else {
			alert("El Nombre de la Empresa o Institucion no puede estar en blanco");
		}	
	});

	
	function cargarConfiguracion() {
		$.ajax({
			type: 'POST',
			url: 'controller/configuracion_controller.php',
			data: {evento:'cargar_configuracion'},
			success:function(data){				
				datos = $.parseJSON(data);
				if (datos) {
					$("#nombre_inst_emp").val(datos.nombre_inst_emp);
					$("#ruta_circulares").val(datos.ruta_circulares);
					$("#ruta_descargas").val(datos.ruta_descargas);
					if (datos.responder_comentarios == 'si') {
						$("#responder_comentarios_si").prop('checked', true);						
					}else{
						$("#responder_comentarios_no").prop('checked', true);
					}					
					if (datos.ocultar_comentarios == 'si') {
						$("#ocultar_comentarios_si").prop('checked', true);
					}
					if (datos.ocultar_comentarios == 'no') {
						$("#ocultar_comentarios_no").prop('checked', true);
					}
					$("#ruta_imagenes").val(datos.ruta_imagenes);
					$("#noticiasxpaginas").val(datos.noticiasxpaginas);
					$("#evento").val("actualizar_configuracion");					
				}else{
					$("#evento").val("insertar_configuracion");
				};
			}
		});
					
	}

	cargarConfiguracion();