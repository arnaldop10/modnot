
	$("#btnGuardar").click(function() {        
        var id_usuario = $("#id_usuario").val();
        if (id_usuario != '') {
            $.ajax({
                url: 'controller/usuario_controller.php',
                type: 'POST',           
                data: $('form').serialize(),
                success:function(msg){
                    $("#mensaje").html(msg);
                    $("input").val("");
                }
            }); 
            alert("Registro Enviado");
        };      
    });

    $("#btnActualizar").click(function() {		
		var id_usuario = $("#id_usuario").val();
		if (id_usuario != '') {
			$.ajax({
				url: 'controller/usuario_controller.php',
				type: 'POST',			
				data: $('form').serialize(),
				success:function(msg){
					alert(msg);
					$("input").val("");
				}
			});	
			alert("Registro Enviado");
		};		
	});

    $("#tablaUsuarios").on('click', 'button', function() {        
        var idUsu = $(this).data("id");
        if (idUsu) {
            $.post('controller/usuario_controller.php', {evento: 'buscar_usuario', id_usuario: idUsu}, function(data) {                
                var datos = $.parseJSON(data);
                if (datos) {
                    $("#formulario").empty();
                    $.ajax({
                        url: 'views/usuario/usuario_view.php',
                        type: 'POST',           
                        data: {evento: 'actualizar_usuario'},
                        success:function(view){
                            $("#formulario").html(view);
                            $("#id_usuario").val(idUsu);
                            $("#nombre_usuario").val(datos.nombre_usuario);
                            $("#login").val(datos.login);
                            $("#password").val(datos.password);
                            $("#email").val(datos.email);
                            $("#pregunta_secreta").val(datos.pregunta_secreta);
                            $("#respuesta_secreta").val(datos.respuesta_secreta);                            
                        }
                    });
                };
            });
        };
    });


    function cargarTablaUsuarios() {
        fila = '';
        $("#tablaUsuarios tbody").empty();

        $.ajax({
            type: 'POST',  
            url: 'controller/usuario_controller.php',          
            data: {evento:'lista_usuarios'},
            success: function(data){
                datos = $.parseJSON(data);
                for (var i in datos) {
                    fila = "<tr>";
                    fila += "<td>" + i + "</td>";
                    fila += "<td>" + datos[i].nombre_usuario + "</td>";
                    fila += "<td>" + datos[i].login + "</td>";
                    fila += "<td>" + datos[i].email + "</td>";
                    fila += "<td><button name='btnUpdate' class='btn btn-info' data-id='" + datos[i].id_usuario + "'><i class='fa fa-edit'></i> Actualizar</button></td>";
                    fila += "</tr>";

                    $("#tablaUsuarios tbody").append(fila);
                };
            },
            error: function(error) {
                alert(error);
            }
        });
    };

    function cargarTablaEliminarUsuarios() {
        fila = '';
        $("#tablaEliminarUsuarios tbody").empty();

        $.ajax({
            type: 'POST',  
            url: 'controller/usuario_controller.php',          
            data: {evento:'lista_usuarios'},
            success: function(data){
                datos = $.parseJSON(data);
                for (var i in datos) {
                    fila = "<tr>";
                    fila += "<td>" + i + "</td>";
                    fila += "<td>" + datos[i].nombre_usuario + "</td>";
                    fila += "<td>" + datos[i].login + "</td>";
                    fila += "<td>" + datos[i].email + "</td>";
                    fila += "<td><button name='btnDelete' class='btn btn-danger' data-id='" + datos[i].id_usuario + "'><i class='fa fa-remove'></i> Eliminar</button></td>";
                    fila += "</tr>";

                    $("#tablaEliminarUsuarios tbody").append(fila);
                };
            },
            error: function(error) {
                alert(error);
            }
        });
    };

    $("#tablaEliminarUsuarios").on('click', 'button', function() {
        var idUsu = $(this).data('id');
        if (idUsu != 0) {
            if (confirm("¿Esta seguro de eliminar este usuario?")) {
                $.ajax({
                    url: 'controller/usuario_controller.php',
                    type: 'POST',            
                    data: {evento: 'eliminar_usuario', id_usuario: idUsu},
                    success: function(msg){
                        alert(msg);                        
                        cargarTablaEliminarUsuarios();
                    }
                });
            };
        };
    });

    function cargarTablaUsuariosClave() {
        fila = '';
        $("#tablaCambiarClave tbody").empty();

        $.ajax({
            type: 'POST',  
            url: 'controller/usuario_controller.php',          
            data: {evento:'lista_usuarios'},
            success: function(data){
                datos = $.parseJSON(data);
                for (var i in datos) {
                    fila = "<tr>";
                    fila += "<td>" + i + "</td>";
                    fila += "<td>" + datos[i].nombre_usuario + "</td>";
                    fila += "<td>" + datos[i].login + "</td>";
                    fila += "<td>" + datos[i].email + "</td>";
                    fila += "<td><button name='btnUpdate' class='btn btn-default' data-id='" + datos[i].id_usuario + "' data-nombre='" + datos[i].nombre_usuario + "'><i class='fa fa-lock'></i> Cambiar Clave</button></td>";
                    fila += "</tr>";

                    $("#tablaCambiarClave tbody").append(fila);
                };
            },
            error: function(error) {
                alert(error);
            }
        });
    };

    function cargarTablaUsuariosPregunta() {
        fila = '';
        $("#tablaCambiarPregunta tbody").empty();

        $.ajax({
            type: 'POST',  
            url: 'controller/usuario_controller.php',          
            data: {evento:'lista_usuarios'},
            success: function(data){
                datos = $.parseJSON(data);
                for (var i in datos) {
                    fila = "<tr>";
                    fila += "<td>" + i + "</td>";
                    fila += "<td>" + datos[i].nombre_usuario + "</td>";
                    fila += "<td>" + datos[i].login + "</td>";
                    fila += "<td>" + datos[i].email + "</td>";
                    fila += "<td><button name='btnUpdate' class='btn btn-default' data-id='" + datos[i].id_usuario + "' data-nombre='" + datos[i].nombre_usuario + "'><i class='fa fa-question-circle'></i> Cambiar Pregunta</button></td>";
                    fila += "</tr>";

                    $("#tablaCambiarPregunta tbody").append(fila);
                };
            },
            error: function(error) {
                alert(error);
            }
        });
    };

    $("#tablaCambiarClave").on('click', 'button', function() {

        $("#id_usuario").val($(this).data('id'));
        $("#nombre").html($(this).data('nombre'));
        $("#CambiarClave").css('display', 'inherit');

    });
    
    $("#btnEnviarClave").click(function() {
                        
        var ca = $("#clave_actual").val();
        var nc = $("#nueva_clave").val();
        var cc = $("#confirmar_clave").val();        
        
        if (ca != '') {
            
            if (nc == cc) {
                $.ajax({
                    url: 'controller/usuario_controller.php',
                    type: 'POST',            
                    data: $('form').serialize(),
                    success: function(msg){
                        alert(msg);
                        $('input').val('');
                        cargarTablaUsuariosClave();
                    }
                });
            } else {
                alert("Las Claves no coinciden, vuelva a intentarlo.");
                $('input').val('');
                $("#nueva_clave").focus();
            };

        } else {
            alert("La Clave Actual no puede estar en Blanco.");
        };
    });


    $("#tablaCambiarPregunta").on('click', 'button', function() {

        $("#id_usuario").val($(this).data('id'));
        $("#nombre").html($(this).data('nombre'));
        $("#CambiarPregunta").css('display', 'inherit');

    });
    
    $("#btnEnviarPregunta").click(function() {
                        
        var pa = $("#pregunta_actual").val();
        var np = $("#nueva_clave").val();        
        
        if (pa != '' && np != '') {
                        
            $.ajax({
                url: 'controller/usuario_controller.php',
                type: 'POST',            
                data: $('form').serialize(),
                success: function(msg){
                    alert(msg);
                    $('input').val('');
                    cargarTablaUsuariosPregunta();
                    $("#CambiarPregunta").css('display', 'none');
                }
            });

        } else {
            alert("La Pregunta y/o Respuesta no puede estar en Blanco.");
        };
    });

    cargarTablaUsuarios();
    cargarTablaEliminarUsuarios();
    cargarTablaUsuariosClave();
    cargarTablaUsuariosPregunta();
