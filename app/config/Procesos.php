<?php 

interface iProcesos {

	public function insertar();
	public function actualizar($id);
	public function eliminar($id);
	public function buscar($id);

}
