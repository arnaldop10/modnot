<?php 

include_once '../../app/models/Articulo.php';
include_once '../../app/config/Funciones.php';

$article_per_page = 2;
$page = $_POST['page'];

$articulo = new Articulo();
$articulos_index = array();
$ls_articulos = $articulo->lista_articulos_publicados();
$vista_articulo = file_get_contents('../../public/templates/template_noticias.html');

for ($i=0; $i < count($ls_articulos); $i++) { 		
	$vista_articulo_index = $vista_articulo;
	foreach ($ls_articulos[$i] as $key => $value) {
		if ($key == 'contenido') {			
			$vista_articulo_index = str_replace('{'.$key.'}', htmlspecialchars_decode(substr($value, 0, 250). '...'), $vista_articulo_index);
		} else {
			if ($key == 'fecha_publicacion') {
				$vista_articulo_index = str_replace('{'.$key.'}', htmlspecialchars_decode(presentacionFecha($value)), $vista_articulo_index);
			} else {
				$vista_articulo_index = str_replace('{'.$key.'}', htmlspecialchars_decode($value), $vista_articulo_index);
			}
		}
	}
		$articulos_index[] = $vista_articulo_index;
}

$articulos_publicados = array_reverse($articulos_index);

print implode("", array_slice($articulos_publicados, $page, $article_per_page));
?>