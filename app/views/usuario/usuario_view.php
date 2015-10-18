<?php 
session_start();
$evento = $_POST['evento'];

switch ($evento) {
	case 'crear_usuario':
		$vista = file_get_contents($evento . '.html');
		print_r($vista);
		break;
	
	case 'actualizar_usuario':
		$vista = file_get_contents($evento . '.html');
		print_r($vista);
		break;

	case 'eliminar_usuario':
		$vista = file_get_contents($evento . '.html');
		print_r($vista);
		break;

	case 'lista_usuarios':
		$vista = file_get_contents($evento . '.html');
		print_r($vista);
		break;

	case 'cambiar_clave':
		$vista = file_get_contents($evento . '.html');
		print_r($vista);
		break;

	case 'cambiar_pregunta':
		$vista = file_get_contents($evento . '.html');
		print_r($vista);
		break;

	default:
		# code...
		break;
}




?>