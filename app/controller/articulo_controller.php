<?php 
session_start();		

require_once '../../app/models/Articulo.php';

$articulo = new Articulo();
$evento = $_POST['evento'];
$ruta="../../public/img/noticias/";//ruta carpeta donde queremos copiar las imágenes
$ruta_bd="../public/img/noticias/";//ruta a almacenar en la base de datos

switch ($evento) {
	case 'insertar_articulo':		
		if (isset($_FILES['imagen'])) {			
			$uploadfile_temporal=$_FILES['imagen']['tmp_name'];
			$uploadfile_nombre=$ruta.$_FILES['imagen']['name'];
			$uploadimagen=$ruta_bd.$_FILES['imagen']['name'];

			if (is_uploaded_file($uploadfile_temporal)) {
			    move_uploaded_file($uploadfile_temporal,$uploadfile_nombre);
			} else {
				echo "error";
			}
		}

		$articulo->set_fecha_redaccion(date('Y-m-d'));
		$articulo->set_titulo($_POST['titulo']);
		$articulo->set_contenido(htmlentities($_POST['contenido']));
		$articulo->set_autor($_SESSION['login']);
		$articulo->set_estatus("editado");
		$articulo->set_fecha_publicacion("0000-00-00");
		$articulo->set_categoria($_POST['categoria']);
		$articulo->set_imagen($uploadimagen);
		$articulo->insertar();
		break;
	
	case 'actualizar_articulo':		
		if (isset($_FILES['imagen'])) {			
			$uploadfile_temporal=$_FILES['imagen']['tmp_name'];
			$uploadfile_nombre=$ruta.$_FILES['imagen']['name'];
			$uploadimagen=$ruta_bd.$_FILES['imagen']['name'];
			if (is_uploaded_file($uploadfile_temporal)) {
			    move_uploaded_file($uploadfile_temporal,$uploadfile_nombre);
			} else {
				echo "error";
			}
		}

		$articulo->set_titulo($_POST['titulo']);
		$articulo->set_contenido(htmlentities($_POST['contenido']));
		$articulo->set_autor($_SESSION['login']);
		$articulo->set_categoria($_POST['categoria']);
		$articulo->set_imagen($uploadimagen);
		$articulo->actualizar($_POST['id_articulo']);
		break;

	case 'eliminar_articulo':
		$articulo->set_estatus("eliminado");
		print_r($articulo->eliminar($_POST['id_articulo']));
		break;

	case 'buscar_articulo':
		if(!function_exists('json_encode')){
			require_once '../../vendor/jsonwrapper/jsonwrapper_inner.php';
			print_r(json_encode($articulo->buscar($_POST['id_articulo'])));
		}else{
			print_r(json_encode($articulo->buscar($_POST['id_articulo'])));			
		}
		break;

	case 'publicar_articulo':
		$articulo->set_estatus("publicado");
		$articulo->set_fecha_publicacion(date('Y-m-d'));
		print_r($articulo->publicar_articulo($_POST['id_articulo']));
		break;

	case 'listar_articulos_publicados':
		if(!function_exists('json_encode')){
			require_once '../../vendor/jsonwrapper/jsonwrapper_inner.php';
			print_r(json_encode($articulo->lista_articulos_publicados()));
		}else{
			print_r(json_encode($articulo->lista_articulos_publicados()));
		}
		break;

	case 'listar_articulos_no_publicados':	
		$lista = $articulo->lista_articulos_no_publicados();
		if(!function_exists('json_encode')){
			require_once '../../vendor/jsonwrapper/jsonwrapper_inner.php';
			print_r(json_encode($lista));
		}else{
			print_r(json_encode($lista));
		}		
		break;

	case 'lista_articulos':		
		if(!function_exists('json_encode')){
			require_once '../../vendor/jsonwrapper/jsonwrapper_inner.php';
			print_r(json_encode($articulo->lista_articulos()));
		}else{
			print_r(json_encode($articulo->lista_articulos()));
		}		
		break;
}

?>