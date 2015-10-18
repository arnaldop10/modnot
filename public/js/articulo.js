    //Función para cargar las categorias en el select del formulario de articulos.

	function cargarCategoria() {

    	var lsCategorias=$("#categoria");            
    	/* VACIAMOS EL SELECT Y PONEMOS UNA OPCION QUE DIGA CARGANDO... */
    	lsCategorias.find('option').remove().end().append('<option value="0">Seleccione...</option>').val('');

    	$.ajax({
    		type: 'POST',  
    		url: 'controller/categoria_controller.php',
    		data: {evento:'listar_categorias'},
    		success: function(data){
    			var campo = $.parseJSON(data);
    			if (campo) {
    				for (var i in campo) {
    					lsCategorias.append('<option value="' + campo[i].id_categoria + '">' + campo[i].nombre_categoria + '</option>');
    				};                   
    			}    
    		},
    		error: function(error) {
    			alert(error);
    		}
    	});

    };

    //Al presionar el boton guardar, se envia la información al controlador para su posterior almacenamiento.

    $("#btnGuardar").click(function() {
       /* var data_contenido = CKEDITOR.instances.contenido1.getData();
        $("#contenido").val(data_contenido);        */
        var titulo = $("#titulo").val();        
        var form = $('form')[0];
        var datos = new FormData(form);
        
        /*if (titulo != '') {*/
            $.ajax({
                url: 'controller/articulo_controller.php',
                //url: 'config/UploadImage.php',
                type: 'POST',                
                data: datos,
                cache: false,
                contentType: false,
                processData: false,
                success:function(msg){
                    //$("#mensaje").html(msg);
                    $("input").val("");
                    $("select").prop('selectedIndex',0);
                    $("textarea").text("");
                    //$("#contenido1").text("");
                  //  CKEDITOR.instances.contenido1.setData("");
                    //$("#mensaje").fadeOut(3000);
                    alert(msg);
                }
            });
        //};  
    }); 

    //Al presionar el boton de actualizar, se envia la información modificada a la base de datos.

    $("#btnActualizar").click(function() {        
        var data_contenido = CKEDITOR.instances.contenido1.getData();
        $("#contenido").val(data_contenido);
        var form = $('form')[0];
        var datos = new FormData(form);
        
        /*if (titulo != '') {*/
            $.ajax({
                url: 'controller/articulo_controller.php',
                type: 'POST',                
                data: datos,
                cache: false,
                contentType: false,
                processData: false,
                success:function(msg){
                    //$("#mensaje").html(msg);
                    $("input").val("");
                    $("select").prop('selectedIndex',0);
                    //$("#contenido1").text("");
                    CKEDITOR.instances.contenido1.setData("");
                    //$("#mensaje").fadeOut(3000);
                    alert(msg);
                }
            });
      /*  };*/      
    });

    //Al presionar el boton de Eliminar, se envia la información modificada a la base de datos.

    $("#tablaEliminarArticulos").on('click', 'button', function() {
        var idArt = $(this).data('id');
        if (idArt != 0) {
            if (confirm("¿Esta seguro de eliminar este articulo?")) {
                $.ajax({
                    url: 'controller/articulo_controller.php',
                    type: 'POST',            
                    data: {evento: 'eliminar_articulo', id_articulo: idArt},
                    success: function(msg){
                        alert(msg);
                        //$("#mensaje").html(msg);
                        cargarArticulosEliminar();
                        //$("#mensaje").fadeOut(3000);
                    }
                });
            };
        };
    });

    //Función para cargar en una tabla los articulos editados para su posterior publicación.

    function cargarArticulosNoPublicados() {
        fila = '';
        $("#tablaNoPublicados tbody").empty();        
        $.ajax({
            type: 'POST',
            url: 'controller/articulo_controller.php',
            data: {evento:'listar_articulos_no_publicados'},
            success: function(data){                
                datos = $.parseJSON(data);
                for (var i in datos) {
                    fila = "<tr>";                    
                    fila += '<td class="text-center">' + datos[i].titulo + "</a></td>";
                    fila += "<td>" + datos[i].contenido.substring(0,100) + '...' + "</td>";
                    fila += "<td>" + datos[i].nombre_usuario + "</td>";
                    fila += "<td>" + datos[i].fecha_redaccion + "</td>";
                    fila += "<td>" + datos[i].nombre_categoria + "</td>";
                    fila += "<td><button name='btnPublicar' class='btn btn-success' data-id='" + datos[i].id_articulo + "'><i class='fa fa-cloud-upload'></i> Publicar</button></td>";
                    fila += "</tr>";
                    $("#tablaNoPublicados tbody").prepend(fila);
                };
            },
            error: function(error) {
                alert(error);
            }
        });
    };

    //Al hacer clic en el boton de Publicar, el estatus se modifica y el articulo es visible para los usuarios

    $("#tablaNoPublicados").on('click', 'button', function() {
        var idArt = $(this).data('id');
        if (idArt != 0) {
            $.ajax({
                url: 'controller/articulo_controller.php',
                type: 'POST',            
                data: {evento: 'publicar_articulo', id_articulo: idArt},
                success: function(msg){
                    alert(msg);
                    cargarArticulosNoPublicados();                    
                }
            });            
        };
    });

    //Al hacer clic en el boton editar se busca el detalle del articulo y se envia a un formulario para su edición

    $("#tablaListaArticulos").on('click', 'button', function() {
        var idArt = $(this).data('id');        
        if (idArt != 0) {            
            $.post('controller/articulo_controller.php', {evento: 'buscar_articulo', id_articulo: idArt}, function(data) {
                var datos = $.parseJSON(data);
                if (datos) {
                    $("#formulario").empty();
                    $.ajax({
                        url: 'views/articulo/articulo_view.php',
                        type: 'POST',           
                        data: {evento: 'actualizar_articulo'},
                        success:function(view){
                            $("#formulario").html(view);
                            $("#id_articulo").val(idArt);
                            $("#titulo").val(datos.titulo);
                            $("#contenido1").html(datos.contenido);                            
                            $("#categoria").val(datos.categoria);
                            //CKEDITOR.instances.contenido1.setData(datos.contenido);                            
                        }
                    });
                };
            });
        }; 
    });

    //Función que carga los articulos en una tabla para habilitar su actualización.

    function cargarListaArticulos() {
        fila = '';
        $("#tablaListaArticulos tbody").empty();        
        $.ajax({
            type: 'POST',
            url: 'controller/articulo_controller.php',
            data: {evento:'lista_articulos'},
            success: function(data){                
                datos = $.parseJSON(data);
                for (var i in datos) {
                    fila = "<tr>";                    
                    fila += '<td>' + datos[i].titulo + "</a></td>";
                    fila += "<td>" + datos[i].contenido.substring(0,100) + '...' + "</td>";
                    fila += "<td class='text-center'>" + datos[i].nombre_usuario + "</td>";
                    fila += "<td>" + datos[i].fecha_redaccion + "</td>";
                    fila += "<td>" + datos[i].nombre_categoria + "</td>";
                    fila += "<td>" + datos[i].estatus + "</td>";
                    fila += "<td>" + datos[i].fecha_publicacion + "</td>";
                    fila += '<td><img src="'+ datos[i].imagen + '" alt="'+ datos[i].imagen +'" width="100"></td>';
                    fila += "<td><button name='btnUpdate' class='btn btn-info' data-id='" + datos[i].id_articulo + "'><i class='fa fa-edit'></i> Actualizar</button></td>";
                    fila += "</tr>";
                    $("#tablaListaArticulos tbody").prepend(fila);
                };
            },
            error: function(error) {
                alert(error);
            }
        });
    };

    //Función para cargar los Articulos a Eliminar

    function cargarArticulosEliminar() {
        fila = '';
        $("#tablaEliminarArticulos tbody").empty();        
        $.ajax({
            type: 'POST',
            url: 'controller/articulo_controller.php',
            data: {evento:'lista_articulos'},
            success: function(data){                
                datos = $.parseJSON(data);
                for (var i in datos) {
                    fila = "<tr>";                    
                    fila += '<td>' + datos[i].titulo + "</a></td>";
                    fila += "<td>" + datos[i].contenido.substring(0,100) + '...' + "</td>";
                    fila += "<td class='text-center'>" + datos[i].nombre_usuario + "</td>";
                    fila += "<td>" + datos[i].fecha_redaccion + "</td>";
                    fila += "<td>" + datos[i].nombre_categoria + "</td>";
                    fila += "<td>" + datos[i].estatus + "</td>";
                    fila += "<td>" + datos[i].fecha_publicacion + "</td>";
                    fila += "<td><button name='btnDelete' class='btn btn-danger' data-id='" + datos[i].id_articulo + "'><i class='fa fa-remove'></i> Eliminar</button></td>";
                    fila += "</tr>";
                    $("#tablaEliminarArticulos tbody").prepend(fila);
                };
            },
            error: function(error) {
                alert(error);
            }
        });
    }

    //Función para visualizar la imagen antes de ser enviada al servidor.   
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#preimg').attr('width', 400);
                $('#preimg').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }    

    $("#imagen").change(function() {
        readURL(this);
    });
    
    //Se cargan las tablas de los Articulos

    cargarCategoria();
    cargarArticulosNoPublicados();
    cargarListaArticulos();
    cargarArticulosEliminar();