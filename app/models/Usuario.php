<?php 

require_once '../../app/config/Conexion.php';
require_once '../../app/config/Procesos.php';

class Usuario implements iProcesos {

	private $id_usuario;
	private $nombre_usuario;
	private $login;
	private $clave;
	private $email;
	private $pregunta_secreta = '';
	private $respuesta_secreta = '';
	private $conex;

	public function Usuario() {
		$this->conex = new Conexion();
	}

	public function set_id_usuario($id_usuario) {
		$this->id_usuario = $id_usuario;
	}

	public function set_nombre_usuario($nombre_usuario) {
		$this->nombre_usuario = $nombre_usuario;		
	}

	public function set_login($login) {
		$this->login = $login;
	}

	public function set_clave($clave) {
		$this->clave = sha1($clave);
		//$this->clave = hash('sha512', $clave);
	}

	public function set_email($email) {
		if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$this->email = $email;
		} else {
			print_r("Error, email invalido");
		}
	}

	public function set_pregunta_secreta($pregunta_secreta) {
		if (!empty($pregunta_secreta)) {
			$this->pregunta_secreta = $pregunta_secreta;
		}	
	}

	public function set_respuesta_secreta($respuesta_secreta) {
		if (!empty($respuesta_secreta)) {
			$this->respuesta_secreta = $respuesta_secreta;
		}		
	}

	public function get_id_usuario() {
		return $this->id_usuario;
	}

	public function get_nombre_usuario() {
		return $this->nombre_usuario;
	}

	public function get_login() {
		return $this->login;
	}

	public function get_clave() {
		return $this->clave;
	}

	public function get_email() {
		return $this->email;
	}

	public function get_pregunta_secreta() {
		return $this->pregunta_secreta;
	}

	public function get_respuesta_secreta() {
		return $this->respuesta_secreta;
	}

	public function insertar() {
		$query  = "insert into usuarios(id_usuario, nombre_usuario, login, clave, email, pregunta_secreta, respuesta_secreta) ";
		$query .= "values('{$this->get_id_usuario()}', 
						  '{$this->get_nombre_usuario()}', 
						  '{$this->get_login()}', 
						  '{$this->get_clave()}',						  
						  '{$this->get_email()}',						  
						  '{$this->get_pregunta_secreta()}', 
						  '{$this->get_respuesta_secreta()}');";

		$consulta = $this->conex->conectar_bd();
		if(!$consulta->query($query)){
			print_r("Fallo la inserción del usuario " . $consulta->errno . " Mensaje: " . $consulta->error);
		}
		$this->conex->desconectar_bd();
	}

	public function actualizar($id_usuario) {
		$query  = "update usuarios set nombre_usuario = '{$this->get_nombre_usuario()}',
									   login = '{$this->get_login()}',
									   email = '{$this->get_email()}' ";
		$query .= "where id_usuario = '{$id_usuario}';";
		$consulta = $this->conex->conectar_bd();		
		if ($consulta->query($query)) {
			return print_r("Usuario actualizado con exito");
		} else {
			return print_r("Fallo la actualización del usuario " . $consulta->errno . " .Mensaje: " . $consulta->error);
		}
		$this->conex->desconectar_bd();
	}

	public function eliminar($id_usuario) {
		$query = "delete from usuarios where id_usuario = '{$id_usuario}';";
		$consulta = $this->conex->conectar_bd();		
		if ($consulta->query($query)) {
			return print_r("Usuario Eliminado con exito");
		} else {
			return print_r("Fallo la eliminación del usuario " . $consulta->errno . " .Mensaje: " . $consulta->error);
		}
		$this->conex->desconectar_bd();
	}

	public function buscar($id_usuario) {
		$query  = "select nombre_usuario, login, clave, email, pregunta_secreta, respuesta_secreta ";
		$query .= "from usuarios ";
		$query .= "where id_usuario = '{$id_usuario}' ";
		$consulta = $this->conex->conectar_bd();
		$resultado = $consulta->query($query);
		if ($resultado) {
			return $resultado->fetch_assoc();
		} else {
			print_r("Error en la Consulta: " . $consulta.error);
		}
		$this->conex->desconectar_bd();
	}

	public function lista_usuarios() {
		$query = "select id_usuario, nombre_usuario, login, email from usuarios";
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

	public function validar_sesion() {
		//$login = $this->get_login();
		//$clave = $this->get_clave();
		if ($this->get_login()) {
			if ($this->get_clave()) {
				$query = "select nombre_usuario, clave from usuarios where login = '{$this->get_login()}' ";
				$consulta = $this->conex->conectar_bd();
				$resultado = $consulta->query($query);

				if ($resultado->num_rows > 0) {
					$campo = $resultado->fetch_assoc();
					if ($campo['clave'] == $this->get_clave()) {
						$this->set_nombre_usuario($campo['nombre_usuario']);
						return true;
					} else {
						return false;
					}
				} else {
					return false;
				}

			} else {
				print_r("La Clave no debe estar en blanco");				
			}
		} else {
			print_r("El login de usuario no debe estar en blanco");			
		}	
	}

	public function cambiar_pregunta_secreta($id_usuario, $nueva_pregunta, $nueva_respuesta) {
		$consulta = $this->conex->conectar_bd();
		$query  = "update usuarios set pregunta_secreta = '{$nueva_pregunta}', respuesta_secreta = '{$nueva_respuesta}' ";
		$query .= "where id_usuario = '{$id_usuario}' ";
		$resultado = $consulta->query($query);

		if ($consulta->query($query)) {
			return print_r("Información actualizada con exito");
		} else {
			return print_r("Fallo la actualización " . $consulta->errno . " .Mensaje: " . $consulta->error);
		}
		$this->conex->desconectar_bd();
	}

	public function cambiar_clave($id_usuario, $clave_actual, $nueva_clave) {
		$consulta = $this->conex->conectar_bd();
		$query = "select clave from usuarios where id_usuario = '{$id_usuario}' ";
		$resultado = $consulta->query($query);
		$clave_usuario = $resultado->fetch_assoc();

		if ($clave_usuario['clave'] == sha1($clave_actual)) {

			$query = "update usuarios set clave = '" . sha1($nueva_clave) ."' where id_usuario = '$id_usuario' ";
			$resultado = $consulta->query($query);
			if ($resultado) {
				return print_r("Clave cambiada exitosamente");
			} else {
				print_r("Error en la Consulta: " . $consulta.error);
			}
		} else {
			return print_r("La Clave introducida no coincide con su Clave Actual.");
		}
		$this->conex->desconectar_bd();
	}

}


?>