<?php 
session_start();
$evento = $_POST['evento'];

switch ($evento) {
	case 'crear_categoria':
		$vista = file_get_contents($evento . '.html');
		print_r($vista);
		break;
	
	case 'actualizar_categoria':
		$vista = file_get_contents($evento . '.html');
		print_r($vista);
		break;

	case 'eliminar_categoria':
		$vista = file_get_contents($evento . '.html');
		print_r($vista);
		break;

	case 'buscar_categoria':
		$vista = file_get_contents($evento . '.html');
		print_r($vista);
		break;

	default:
		# code...
		break;
}




?>