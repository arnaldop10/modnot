<?php 

require_once '../../app/models/Comentario.php';

$comentario = new Comentario();
$evento = $_POST['evento'];

switch ($evento) {
	case 'insertar_comentario':
		$comentario->set_id_articulo($_POST['id_articulo']);
		$comentario->set_id_comentario($comentario->num_comentario() + 1);
		$comentario->set_fecha_comentario(date('Y-m-d'));
		$comentario->set_nombre_comentarista($_POST['nombre_comentarista']);
		$comentario->set_email($_POST['email']);
		$comentario->set_comentario($_POST['comentario']);
		$comentario->insertar();
		break;

	case 'mostrar_comentarios':
		if(!function_exists('json_encode')){
			require_once '../../vendor/jsonwrapper/jsonwrapper_inner.php';
			print_r(json_encode($comentario->ver_comentarios($_POST['id_articulo'])));
		}else{
			print_r(json_encode($comentario->ver_comentarios($_POST['id_articulo'])));
		}
		break;

	case 'valorar_comentario':
		$comentario->set_valoracion($_POST['valoracion']);
		$comentario->valorar_comentario($_POST['id_articulo'], $_POST['id_comentario']);
		break;
	
	default:
		# code...
		break;
}


?>