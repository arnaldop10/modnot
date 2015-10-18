<?php 

require_once '../../app/config/Conexion.php';
require_once '../../app/config/Procesos.php';

class Categoria implements iProcesos {

	private $id_categoria;
	private $nombre_categoria;
	private $conex;

	public function Categoria() {
		$this->conex = new Conexion();
	}

	public function set_id_categoria($id_categoria) {
		$this->id_categoria = $id_categoria;			
	}

	public function set_nombre_categoria($nombre_categoria) {
		if (!empty($nombre_categoria)) {			
			$this->nombre_categoria = $nombre_categoria;
		}
	}

	public function get_id_categoria() {
		return $this->id_categoria;
	}

	public function get_nombre_categoria() {
		return $this->nombre_categoria;
	}

	public function insertar() {
		$query = "insert into categorias(nombre_categoria) values ('{$this->get_nombre_categoria()}')";
		$consulta = $this->conex->conectar_bd();
		if(!$consulta->query($query)){
			print_r("Fallo la inserción del registro " . $consulta->errno . " Mensaje: " . $consulta->error);
		}
		$this->conex->desconectar_bd();	
	}

	public function actualizar($id_categoria) {
		$query  = "update categorias set nombre_categoria = '{$this->get_nombre_categoria()}' ";
		$query .= "where id_categoria = '{$id_categoria}' ";
		$consulta = $this->conex->conectar_bd();		
		if ($consulta->query($query)) {
			return print_r("Categoria actualizado con exito");			
		} else {
			return print_r("Fallo la actualización de la Categoria " . $consulta->errno . " .Mensaje: " . $consulta->error);
		}
		$this->conex->desconectar_bd();
	}

	public function eliminar($id_categoria) {
		$query = "delete from categorias where id_categoria = '{$id_categoria}' ";
		$consulta = $this->conex->conectar_bd();		
		if ($consulta->query($query)) {
			return "Categoria Eliminada con exito";
		} else {
			return "Fallo la eliminación de la Categoria " . $consulta->errno . " .Mensaje: " . $consulta->error;
		}
		$this->conex->desconectar_bd();
	}

	public function buscar($id_categoria) {
		$query = "Select nombre_categoria from categorias where id_categoria = '{$id_categoria}' ";
		$consulta = $this->conex->conectar_bd();
		$resultado = $consulta->query($query);
		if ($resultado) {
			return $resultado->fetch_assoc();
		} else {
			print_r("Error en la Consulta: " . $consulta.error);
		}
		$this->conex->desconectar_bd();
	}

	public function listar_categorias() {
		$query = "select id_categoria, nombre_categoria from categorias order by 1 asc";
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

}



?>