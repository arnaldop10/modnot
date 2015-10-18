(function($) {  
    $.get = function(key)   {  
        key = key.replace(/[\[]/, '\\[');  
        key = key.replace(/[\]]/, '\\]');  
        var pattern = "[\\?&]" + key + "=([^&#]*)";  
        var regex = new RegExp(pattern);  
        var url = unescape(window.location.href);  
        var results = regex.exec(url);  
        if (results === null) {  
            return null;  
        } else {  
            return results[1];  
        }  
    }  
})(jQuery);  

var idArt = $.get('id');

$.ajax({
	url: '../../app/views/view_detalle_articulo.php',
	type: 'POST',	
	data: {id_articulo: idArt},
	success: function(data){
		$("#dt_noticia").html(data);
	}
});
