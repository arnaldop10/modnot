$(document).ready(function() {
		
	/********************************************************************
    ********************** Opciones de Usuarios *************************
    ********************************************************************/

    $("#btnCrearUsuario").click(function() {				
		$.ajax({
			url: 'views/usuario/usuario_view.php',
			type: 'POST',			
			data: {evento: 'crear_usuario'},
			success:function(data){
				$("#formulario").html(data);
			}
		});		
	});

	$("#btnActualizarUsuario").click(function() {        
        $.ajax({
            url: 'views/usuario/usuario_view.php',
            type: 'POST',           
            data: {evento: 'lista_usuarios'},
            success:function(data){
                $("#formulario").html(data);
            }
        });
    }); 

    $("#btnEliminarUsuario").click(function() {        
        $.ajax({
            url: 'views/usuario/usuario_view.php',
            type: 'POST',           
            data: {evento: 'eliminar_usuario'},
            success:function(data){
                $("#formulario").html(data);
            }
        });
    });

    $("#btnCambiarClave").click(function() {        
        $.ajax({
            url: 'views/usuario/usuario_view.php',
            type: 'POST',           
            data: {evento: 'cambiar_clave'},
            success:function(data){
                $("#formulario").html(data);
            }
        });
    }); 

    $("#btnPreguntaSeguridad").click(function() {        
		$.ajax({
            url: 'views/usuario/usuario_view.php',
            type: 'POST',           
            data: {evento: 'cambiar_pregunta'},
            success:function(data){
                $("#formulario").html(data);
            }
        });
	});	

    /************************************************************************************
    ****************** Código para las opciones del menu Articulos  *********************
    ************************************************************************************/ 

    $("#btnCrearArticulo").click(function() {         
        $.ajax({
            url: 'views/articulo/articulo_view.php',
            type: 'POST',           
            data: {evento: 'crear_articulo'},
            success:function(data){
                $("#formulario").html(data);
            }
        });     
    }); 

    $("#btnPublicarArticulo").click(function() {         
        $.ajax({
            url: 'views/articulo/articulo_view.php',
            type: 'POST',           
            data: {evento: 'publicar_articulo'},
            success:function(data){
                $("#formulario").html(data);
            }
        });     
    }); 

    $("#btnActualizarArticulo").click(function() {         
        $.ajax({
            url: 'views/articulo/articulo_view.php',
            type: 'POST',           
            data: {evento: 'lista_articulo'},
            success:function(data){
                $("#formulario").html(data);
            }
        });     
    }); 

    $("#btnEliminarArticulo").click(function() {         
        $.ajax({
            url: 'views/articulo/articulo_view.php',
            type: 'POST',           
            data: {evento: 'eliminar_articulo'},
            success:function(data){
                $("#formulario").html(data);
            }
        });     
    });    

    /**********************************************************************************
    ****************** Código para las opciones de las Categorias *********************
    **********************************************************************************/

    function cargarTablaCategorias() {        

        fila = '';
        $("#tablaCategorias tbody").empty();

        $.ajax({
            type: 'POST',  
            url: 'controller/categoria_controller.php',          
            data: {evento:'listar_categorias'},
            success: function(data){

                datos = $.parseJSON(data);
                for (var i in datos) {
                    fila = "<tr>";                    
                    fila += '<td class="text-center"><a href="#" data-id="' + datos[i].id_categoria + '" data-name="'+ datos[i].nombre_categoria +'">' + datos[i].id_categoria + "</a></td>";
                    fila += "<td>" + datos[i].nombre_categoria + "</td>";
                    fila += "</tr>";

                    $("#tablaCategorias tbody").prepend(fila);
                };
            },
            error: function(error) {
                alert(error);
            }
        });

    }

    $("#btnCrearCategoria").click(function() { 
        $.ajax({
            url: 'views/categoria/categoria_view.php',
            type: 'POST',           
            data: {evento: 'crear_categoria'},
            success:function(data){
                $("#formulario").html(data);
                cargarTablaCategorias();
            }
        });     
    });

    $("#btnActualizarCategoria").click(function() { 
        $.ajax({
            url: 'views/categoria/categoria_view.php',
            type: 'POST',           
            data: {evento: 'actualizar_categoria'},
            success:function(data){
                $("#formulario").html(data);
                cargarTablaCategorias();
            }
        });     
    });

    $("#btnEliminarCategoria").click(function() { 
        $.ajax({
            url: 'views/categoria/categoria_view.php',
            type: 'POST',           
            data: {evento: 'eliminar_categoria'},
            success:function(data){
                $("#formulario").html(data);
                cargarTablaCategorias();
            }
        });     
    });

    /******************************************************************************
    *********************** Acceder a la Configuración ****************************
    ******************************************************************************/

    $("#btnConfiguracion").click(function() {        
        $.ajax({
            url: 'views/configuracion/configuracion_view.php',
            type: 'POST',           
            data: {evento: 'configuracion'},
            success:function(data){
                $("#formulario").html(data);                
            }
        });     
    });



});