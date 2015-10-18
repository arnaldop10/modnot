<?php 

require_once '../../app/config/Conexion.php';

Class Configuracion {

	private $nombre_inst_emp;
	private $ruta_circulares;
	private $ruta_descargas;
	private $responder_comentarios;
	private $ocultar_comentarios;
	private $ruta_imagenes;
	private $noticiasxpaginas;
	private $conex;

	public function Configuracion() {
		$this->conex = new Conexion();
	}

	public function set_nombre_inst_emp($nombre_inst_emp) {
		$this->nombre_inst_emp = $nombre_inst_emp;
	}

	public function set_ruta_circulares($ruta_circulares) {
		$this->ruta_circulares = $ruta_circulares;
	}

	public function set_ruta_descargas($ruta_descargas) {
		$this->ruta_descargas = $ruta_descargas;
	}

	public function set_responder_comentarios($responder_comentarios) {
		$this->responder_comentarios = $responder_comentarios;
	}
	
	public function set_ocultar_comentarios($ocultar_comentarios) {
		$this->ocultar_comentarios = $ocultar_comentarios;
	}

	public function set_ruta_imagenes($ruta_imagenes) {
		$this->ruta_imagenes = $ruta_imagenes;
	}

	public function set_noticiasxpaginas($noticiasxpaginas) {
		$this->noticiasxpaginas = $noticiasxpaginas;
	}

	public function get_nombre_inst_emp() {
		return $this->nombre_inst_emp;
	}

	public function get_ruta_circulares() {
		return $this->ruta_circulares;
	}

	public function get_ruta_descargas() {
		return $this->ruta_descargas;
	}

	public function get_responder_comentarios() {
		return $this->responder_comentarios;
	}
	
	public function get_ocultar_comentarios() {
		return $this->ocultar_comentarios;
	}

	public function get_ruta_imagenes() {
		return $this->ruta_imagenes;
	}
	
	public function get_noticiasxpaginas() {
		return $this->noticiasxpaginas;
	}

	public function insertar() {
		$query  = "insert into configuracion(nombre_inst_emp, ruta_circulares, ruta_descargas, responder_comentarios, ocultar_comentarios, ruta_imagenes, noticiasxpaginas) ";
		$query .= "values (
							'{$this->get_nombre_inst_emp()}',
							'{$this->get_ruta_circulares()}',
							'{$this->get_ruta_descargas()}',
							'{$this->get_responder_comentarios()}',
							'{$this->get_ocultar_comentarios()}',
							'{$this->get_ruta_imagenes()}',
							'{$this->get_noticiasxpaginas()}'
						  )";
		$consulta = $this->conex->conectar_bd();
		if ($consulta->query($query)) {
			return print_r("Configuracion Registrada con exito");			
		} else {
			return print_r("Fallo la inserción de la Configuracion " . $consulta->errno . " .Mensaje: " . $consulta->error);
		}
		$this->conex->desconectar_bd();
	}

	public function actualizar() {
		$query  = "update configuracion set ";
		$query .= "nombre_inst_emp = '{$this->get_nombre_inst_emp()}', ";
		$query .= "ruta_circulares = '{$this->get_ruta_circulares()}', ";
		$query .= "ruta_descargas = '{$this->get_ruta_descargas()}', ";
		$query .= "responder_comentarios = '{$this->get_responder_comentarios()}', ";
		$query .= "ocultar_comentarios = '{$this->get_ocultar_comentarios()}', ";
		$query .= "ruta_imagenes = '{$this->get_ruta_imagenes()}', ";
		$query .= "noticiasxpaginas = '{$this->get_noticiasxpaginas()}' ";
		$consulta = $this->conex->conectar_bd();		
		if ($consulta->query($query)) {
			return print_r("Configuracion actualizada con exito");			
		} else {
			return print_r("Fallo la actualización de la Configuracion " . $consulta->errno . " .Mensaje: " . $consulta->error);
		}
		$this->conex->desconectar_bd();
	}

	public function get_configuracion()	{
		$query  = "select nombre_inst_emp, 
						  ruta_circulares, 
						  ruta_descargas, 
						  responder_comentarios, 
						  ocultar_comentarios,
						  ruta_imagenes,
						  noticiasxpaginas ";
		$query .= "from configuracion ";
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


?>