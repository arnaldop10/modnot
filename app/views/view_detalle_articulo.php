<?php 

include_once '../../app/models/Articulo.php';

$articulo = new Articulo();
$dt_articulo = $articulo->detalle_articulo($_POST['id_articulo']);
$vista_articulo = file_get_contents('../../public/templates/articulo3.html');

	foreach ($dt_articulo as $key => $value) {		
		$vista_articulo = str_replace('{'.$key.'}', htmlspecialchars_decode($value), $vista_articulo);
	}

print $vista_articulo;

?>