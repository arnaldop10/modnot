var page = $("#page").val();
var art_per_page = 2;
var url = location.pathname;
var directorio = url.split("/");
var archivo = directorio.pop();
var ruta = '';

if (archivo == 'noticias.html') {
	ruta = '../../app/views/view_lista_articulos.php';	
} 

if (archivo == 'index.html' || archivo == '') {
	ruta = '../../app/views/view_articulos_index.php';
}

if (page == '') {
	page = 0;
	$("#sig").css('disabled');
	$("#noticias").load(ruta, {"page":page});
};

$("#ant").click(function() {
	page = page + art_per_page;	
	$("#noticias").load(ruta, {"page":page});
});

$("#sig").click(function() {
	if (page >= art_per_page) {
		page = page - art_per_page;	
		$("#noticias").load(ruta, {"page":page});
	};
});

$("#noticias").on('click', '#dt_noticia', function() {
	var id = $(this).data('id');
	document.location.href = "noticia.html?id=" + id;
});

$("#noticias").on('click', '#titulo_noticia', function() {
	var id = $(this).data('id');
	document.location.href = "noticia.html?id=" + id;
});



