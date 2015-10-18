<?php 

require_once '../../app/models/Categoria.php';

$categoria = new Categoria();
$evento = $_POST['evento'];

switch ($evento) {
	case 'insertar_categoria':
		$categoria->set_nombre_categoria($_POST['nombre_categoria']);
		if ($categoria->insertar()) {
			print_r("Categoria registrada exitosamente!!!");
		}
		break;

	case 'actualizar_categoria':
		$categoria->set_nombre_categoria($_POST['nombre_categoria']);
		print_r($categoria->actualizar($_POST['id_categoria']));
		break;

	case 'eliminar_categoria':
		print_r($categoria->eliminar($_POST['id_categoria']));
		break;

	case 'buscar_categoria':
		if(!function_exists('json_encode')){
			require_once '../../vendor/jsonwrapper/jsonwrapper_inner.php';
			print_r(json_encode($categoria->buscar($_POST['id_categoria'])));
		}else{
			print_r(json_encode($categoria->buscar($_POST['id_categoria'])));
		}
		break;

	case 'listar_categorias':
		if(!function_exists('json_encode')){
			require_once '../../vendor/jsonwrapper/jsonwrapper_inner.php';
			print_r(json_encode($categoria->listar_categorias()));
		}else{
			print_r(json_encode($categoria->listar_categorias()));
		}
		break;
	
	default:
		# code...
		break;
}


?>