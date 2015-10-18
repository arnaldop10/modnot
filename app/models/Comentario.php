<?php 

require_once '../../app/config/Conexion.php';

class Comentario {

	private $id_articulo;
	private $id_comentario;
	private $fecha_comentario;
	private $nombre_comentarista;
	private $email;
	private $comentario;
	private $valoracion;
	private $conex;

	public function Comentario() {
		$this->conex = new Conexion();
	}

	public function set_id_articulo($id_articulo) {
		$this->id_articulo = $id_articulo;
	}

	public function set_id_comentario($id_comentario) {
		$this->id_comentario = $id_comentario;
	}

	public function set_fecha_comentario($fecha_comentario) {
		$this->fecha_comentario = $fecha_comentario;
	}

	public function set_nombre_comentarista($nombre_comentarista) {
		$this->nombre_comentarista = $nombre_comentarista;
	}

	public function set_email($email) {
		if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$this->email = $email;
		} else {
			print_r("Error, email invalido");
		}
	}

	public function set_comentario($comentario) {
		$this->comentario = $comentario;
	}

	public function set_valoracion($valoracion) {
		$this->valoracion = $valoracion;
	}

	public function get_id_articulo() {
		return $this->id_articulo;
	}

	public function get_id_comentario() {
		return $this->id_comentario;
	}

	public function get_fecha_comentario() {
		return $this->fecha_comentario;
	}	

	public function get_nombre_comentarista() {
		return $this->nombre_comentarista;
	}

	public function get_email() {
		return $this->email;
	}

	public function get_comentario() {
		return $this->comentario;
	}

	public function get_valoracion() {
		return $this->valoracion;
	}

	public function insertar() {
		$query = "insert into comentarios (id_articulo, id_comentario, fecha_comentario, nombre_comentarista, email, comentario) ";
		$query .= "values('{$this->get_id_articulo()}',
						  '{$this->get_id_comentario()}',
						  '{$this->get_fecha_comentario()}',
						  '{$this->get_nombre_comentarista()}',
						  '{$this->get_email()}',
						  '{$this->get_comentario()}')";
		$consulta = $this->conex->conectar_bd();
		if(!$consulta->query($query)){
			print_r("Fallo la inserción del registro " . $consulta->errno . " Mensaje: " . $consulta->error);
		}
		$this->conex->desconectar_bd();		
	}

	public function ver_comentarios($id_articulo) {
		$query  = "select id_comentario, fecha_comentario, nombre_comentarista, comentario, valoracion ";
		$query .= "from comentarios where id_articulo = '{$id_articulo}' ";
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

	public function valorar_comentario($id_articulo, $id_comentario) {
		$query  = "update comentarios set valoracion = '{$this->get_valoracion()}' ";
		$query .= "where id_articulo = '{$id_articulo}' and id_comentario = '{$id_comentario}';";
		$consulta = $this->conex->conectar_bd();
		if(!$consulta->query($query)){
			return "Fallo la actualizacion del registro " . $consulta->errno . " Mensaje: " . $consulta->error;
		}
		$this->conex->desconectar_bd();
	}	

	public function num_comentario() {
		$query = "Select comentario from comentarios where id_articulo = '{$this->get_id_articulo()}' ";
		$consulta = $this->conex->conectar_bd();
		$resultado = $consulta->query($query);
		if ($resultado) {
			return $resultado->num_row();
		} else {
			print_r("Error en la Consulta: " . $consulta.error);
		}
		$this->conex->desconectar_bd();	
	}
}


?>