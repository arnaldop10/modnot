<?php 
session_start();

require_once '../../app/models/Usuario.php';

$usuario = new Usuario();
$evento = $_POST['evento'];

	switch ($evento) {
		case 'validar_usuario':
			$usuario->set_login($_POST['login']);
			$usuario->set_clave($_POST['password']);
			if ($usuario->validar_sesion()) {
	 			$_SESSION['usuario'] = $usuario->get_nombre_usuario();
	 			$_SESSION['login'] = $usuario->get_login();
			 	header("Location: ../index_modulo.php");
			 } else {
			 	print_r("Error al iniciar sesion");			 	
			 }
			break;
		
		case 'insertar_usuario':
			$usuario->set_id_usuario($_POST['id_usuario']);
			$usuario->set_nombre_usuario($_POST['nombre_usuario']);
			$usuario->set_login($_POST['login']);
			$usuario->set_clave($_POST['clave']);
			$usuario->set_email($_POST['email']);
			$usuario->set_pregunta_secreta($_POST['pregunta_secreta']);
			$usuario->set_respuesta_secreta($_POST['respuesta_secreta']);
			$usuario->insertar();			
			break;

		case 'actualizar_usuario':			
			$usuario->set_nombre_usuario($_POST['nombre_usuario']);
			$usuario->set_login($_POST['login']);			
			$usuario->set_email($_POST['email']);
			$usuario->actualizar($_POST['id_usuario']);
			break;

		case 'eliminar_usuario':			
			print_r($usuario->eliminar($_POST['id_usuario']));
			break;

		case 'buscar_usuario':
			if(!function_exists('json_encode')){
				require_once '../../vendor/jsonwrapper/jsonwrapper_inner.php';
				print_r(json_encode($usuario->buscar($_POST['id_usuario'])));
			}else{
				print_r(json_encode($usuario->buscar($_POST['id_usuario'])));
			}
			break;

		case 'cambiar_pregunta_secreta':
			print_r($usuario->cambiar_pregunta_secreta($_POST['id_usuario'], $_POST['nueva_pregunta'], $_POST['nueva_respuesta']));
			break;

		case 'lista_usuarios':
			if(!function_exists('json_encode')){
				require_once '../../vendor/jsonwrapper/jsonwrapper_inner.php';			
				print_r(json_encode($usuario->lista_usuarios()));
			}else{
				print_r(json_encode($usuario->lista_usuarios()));
			}
			break;

		case 'cambiar_clave':
			print_r($usuario->cambiar_clave($_POST['id_usuario'], $_POST['clave_actual'], $_POST['nueva_clave']));
			break;

		default:
			# code...
			break;
	}

?>