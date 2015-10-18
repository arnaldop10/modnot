<?php
/*
* Clase para conexion con la BD
*/

require_once '../../app/config/Config.php';

Class Conexion {

	private $conex;

	public function conectar_bd () {

		$this->conex = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

		$this->conex->set_charset(DB_CHARSET);

		if ($this->conex->connect_errno) {
			print_r("Fallo al conectar a Mysql: ". $this->conex->connect_error);
		} else {
			return $this->conex;	
		}
	}

	public function desconectar_bd() {
		$this->conex->close();
	}


}

?>