<?php	

require_once '../../app/config/Conexion.php';
require_once '../../app/config/Procesos.php';

class Articulo implements iProcesos {

	private $id_articulo;
	private $fecha_redaccion;
	private $titulo;
	private $contenido;
	private $autor;
	private $estatus;
	private $fecha_publicacion;
	private $categoria;
	private $imagen;
	private $conex;

	public function Articulo() {
		$this->conex = new Conexion();
	}

	public function set_fecha_redaccion($fecha_redaccion) {
		if (!empty($fecha_redaccion)) {
			$this->fecha_redaccion = $fecha_redaccion;			
		} else {
			print_r("La fecha no puede estar vacia");
		}
	}

	public function set_titulo($titulo) {
		if (is_string($titulo)) {
			$this->titulo = $titulo;	
		}		
	}

	public function set_contenido($contenido) {
		$this->contenido = $contenido;
	}

	public function set_autor($autor) {
		$this->autor = $autor;
	}

	public function set_estatus($estatus) {
		$this->estatus = $estatus;
	}

	public function set_fecha_publicacion($fecha_publicacion) {
		$this->fecha_publicacion = $fecha_publicacion;
	}

	public function set_categoria($categoria) {
			$this->categoria = $categoria;
	}

	public function set_imagen($imagen) {
		$this->imagen = $imagen;
	}

	public function get_fecha_redaccion() {
		return $this->fecha_redaccion;
	}

	public function get_titulo() {
		return $this->titulo;
	}

	public function get_contenido() {
		return $this->contenido;
	}

	public function get_autor() {
		return $this->autor;
	}

	public function get_estatus() {
		return $this->estatus;
	}

	public function get_fecha_publicacion() {
		return $this->fecha_publicacion;
	}

	public function get_categoria() {
		return $this->categoria;
	}

	public function get_imagen() {
		return $this->imagen;
	}

	public function insertar() {

		$query  = "insert into articulos (fecha_redaccion, titulo, contenido, autor, estatus, fecha_publicacion, categoria, imagen) ";
		$query .= "values('{$this->get_fecha_redaccion()}', 
						  '{$this->get_titulo()}',
						  '{$this->get_contenido()}',
						  '{$this->get_autor()}',
						  '{$this->get_estatus()}',
						  '{$this->get_fecha_publicacion()}',
						  '{$this->get_categoria()}',
						  '{$this->get_imagen()}'						  
						  );";
 		
 		$consulta = $this->conex->conectar_bd();
		if(!$consulta->query($query)){
			return print_r("Fallo la inserción del registro " . $consulta->errno . " Mensaje: " . $consulta->error);
		} else {
			return print_r("Articulo registrado con éxito");
		}
		$this->conex->desconectar_bd();		

	}

	public function actualizar($id_articulo) {
		$query  = "update articulos set titulo = '{$this->get_titulo()}',
										contenido = '{$this->get_contenido()}',
										autor = '{$this->get_autor()}',
										categoria = '{$this->get_categoria()}',
										imagen = '{$this->get_imagen()}' ";
		$query .= "where id_articulo = '{$id_articulo}'";

		$consulta = $this->conex->conectar_bd();
		
		if ($consulta->query($query)) {
			print_r("Articulo actualizado con exito");
		} else {
			print_r("Fallo la actualización del articulo " . $consulta->errno . " .Mensaje: " . $consulta->error);
		}
		$this->conex->desconectar_bd();
	}

	public function eliminar($id_articulo) {				
		if ($this->cambiar_estatus($id_articulo)) {
			return print_r("Articulo Eliminado con exito");
		} else {
			return print_r("Fallo la eliminación del articulo " . $consulta->errno . " .Mensaje: " . $consulta->error);
		}		
	}

	public function buscar($id_articulo) {
		$query  = "Select fecha_redaccion, titulo, contenido, autor, categoria, estatus, imagen, fecha_publicacion from articulos ";
		$query .= "where id_articulo = '{$id_articulo}' ";
		$consulta = $this->conex->conectar_bd();
		$resultado = $consulta->query($query);
		if ($resultado) {
			return $resultado->fetch_assoc();
		} else {
			print_r("Error en la Consulta: " . $consulta.error);
		}
		$this->conex->desconectar_bd();
	}

	public function cambiar_estatus($id_articulo) {
		$query  = "Update articulos set estatus = '{$this->get_estatus()}' ";
		$query .= " where id_articulo = '{$id_articulo}'";
		$consulta = $this->conex->conectar_bd();
		if ($consulta->query($query)) {
			return true;
		} else {
			return false;
		}
		$this->conex->desconectar_bd();
	}

	public function publicar_articulo($id_articulo) {
		$query  = "Update articulos set fecha_publicacion = '{$this->get_fecha_publicacion()}' ";
		$query .= "where id_articulo = '{$id_articulo}';";
		$consulta = $this->conex->conectar_bd();
		if ($consulta->query($query)) {
			if ($this->cambiar_estatus($id_articulo)) {
				return print_r("Articulo Publicado con exito");
			}
		} else {
			return print_r("Fallo la Publicación del Articulo " . $consulta->errno . " .Mensaje: " . $consulta->error);
		}
		$this->conex->desconectar_bd();
		$this->cambiar_estatus($id_articulo);
	}

	public function lista_articulos() {
		$query  = "Select id_articulo, titulo, contenido, nombre_usuario, fecha_redaccion, nombre_categoria, estatus, fecha_publicacion, imagen ";
		$query .= "from articulos ";
		$query .= "join usuarios ";
		$query .= "on(login = autor) ";
		$query .= "join categorias ";
		$query .= "on(id_categoria = categoria) ";
		$query .= "where estatus <> 'eliminado' ";
		$query .= "order by fecha_redaccion asc ";
		$consulta = $this->conex->conectar_bd();
		$resultado = $consulta->query($query);
		if ($resultado) {
			if(function_exists('json_encode')){
				return $resultado->fetch_all(MYSQLI_ASSOC);
			}else{
				$datos = array();
				while($fila = $resultado->fetch_assoc()){
					$datos[] = $fila;
				}
				return $datos;
			}
		} else {
			return print_r("Error en la Consulta: " . $consulta.error);
		}
		$this->conex->desconectar_bd();
	}

	public function lista_articulos_no_publicados() {
		$query  = "Select id_articulo, titulo, contenido, nombre_usuario, fecha_redaccion, nombre_categoria ";
		$query .= "from articulos ";
		$query .= "join usuarios ";
		$query .= "on(login = autor) ";
		$query .= "join categorias ";
		$query .= "on(id_categoria = categoria) ";
		$query .= "where estatus = 'editado' ";
		$query .= "order by fecha_redaccion asc ";
		$consulta = $this->conex->conectar_bd();
		$resultado = $consulta->query($query);
		if ($resultado) {
			if(function_exists('json_encode')){
				return $resultado->fetch_all(MYSQLI_ASSOC);
			}else{
				$datos = array();
				while($fila = $resultado->fetch_assoc()){
					$datos[] = $fila;
				}
				return $datos;
			}
		} else {
			return print_r("Error en la Consulta: " . $consulta.error);
		}
		$this->conex->desconectar_bd();
	}

	public function lista_articulos_publicados() {
		$query  = "Select id_articulo, titulo, contenido, nombre_usuario as autor, fecha_publicacion, nombre_categoria as categoria, imagen ";
		$query .= "from articulos ";
		$query .= "join usuarios ";
		$query .= "on(login = autor) ";
		$query .= "join categorias ";
		$query .= "on(id_categoria = categoria) ";
		$query .= "where estatus = 'publicado' ";
		$query .= "order by fecha_publicacion asc ";
		$consulta = $this->conex->conectar_bd();
		$resultado = $consulta->query($query);
		if ($resultado) {
			if(function_exists('json_encode')){
				return $resultado->fetch_all(MYSQLI_ASSOC);
			}else{
				$datos = array();
				while($fila = $resultado->fetch_assoc()){
					$datos[] = $fila;
				}
				return $datos;
			}
		} else {
			return print_r("Error en la Consulta: " . $consulta.error);
		}
		$this->conex->desconectar_bd();
	}

	public function actualizar_imagen($id_articulo) {
		$query  = "update articulos set imagen = '{$this->get_imagen()}' ";
		$query .= "where id_articulo = '{$id_articulo}' ";
		$consulta = $this->conex->conectar_bd();
		if ($consulta->query($query)) {			
			return true;	
		} else {
			return false;
		}
		$this->conex->desconectar_bd();
	}

	public function detalle_articulo($id_articulo) {
		$query  = "Select id_articulo, titulo, contenido, nombre_usuario as autor, fecha_publicacion, nombre_categoria as categoria, imagen ";
		$query .= "from articulos ";
		$query .= "join usuarios ";
		$query .= "on(login = autor) ";
		$query .= "join categorias ";
		$query .= "on(id_categoria = categoria) ";
		$query .= "where estatus = 'publicado' ";
		$query .= "and id_articulo = '{$id_articulo}' ";
		$query .= "order by fecha_publicacion asc ";
		$consulta = $this->conex->conectar_bd();
		$resultado = $consulta->query($query);
		if ($resultado) {
			return $resultado->fetch_assoc();
		} else {
			return print_r("Error en la Consulta: " . $consulta.error);
		}
		$this->conex->desconectar_bd();
	}


}