<?php 

require_once '../../app/models/Configuracion.php';

$configuracion = new Configuracion();
$evento = $_POST['evento'];

switch ($evento) {
	case 'insertar_configuracion':
		$configuracion->set_nombre_inst_emp($_POST['nombre_inst_emp']);
		$configuracion->set_ruta_circulares($_POST['ruta_circulares']);
		$configuracion->set_ruta_descargas($_POST['ruta_descargas']);
		$configuracion->set_responder_comentarios($_POST['responder_comentarios']);
		$configuracion->set_ocultar_comentarios($_POST['ocultar_comentarios']);
		$configuracion->set_ruta_imagenes($_POST['ruta_imagenes']);
		$configuracion->set_noticiasxpaginas($_POST['noticiasxpaginas']);
		$configuracion->insertar();
		break;

	case 'actualizar_configuracion':
		$configuracion->set_nombre_inst_emp($_POST['nombre_inst_emp']);
		$configuracion->set_ruta_circulares($_POST['ruta_circulares']);
		$configuracion->set_ruta_descargas($_POST['ruta_descargas']);
		$configuracion->set_responder_comentarios($_POST['responder_comentarios']);
		$configuracion->set_ocultar_comentarios($_POST['ocultar_comentarios']);
		$configuracion->set_ruta_imagenes($_POST['ruta_imagenes']);
		$configuracion->set_noticiasxpaginas($_POST['noticiasxpaginas']);
		print($configuracion->actualizar());
		break;
	
	case 'cargar_configuracion':
		print_r(json_encode($configuracion->get_configuracion()));
		break;
}



?>