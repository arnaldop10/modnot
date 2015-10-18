<?php	

	function presentacionFecha($fecha) {

		$arreglo_fecha = explode('-', $fecha);

		$dia  = $arreglo_fecha[2];
		$mes  = $arreglo_fecha[1];
		$anyo = $arreglo_fecha[0];

		switch ($mes) {
			case '01':
				$mes = 'Enero';
				break;
			
			case '02':
				$mes = 'Febrero';
				break;

			case '03':
				$mes = 'Marzo';
				break;

			case '04':
				$mes = 'Abril';
				break;

			case '05':
				$mes = 'Mayo';
				break;

			case '06':
				$mes = 'Junio';
				break;

			case '07':
				$mes = 'Julio';
				break;

			case '08':
				$mes = 'Agosto';
				break;

			case '09':
				$mes = 'Septiembre';
				break;

			case '10':
				$mes = 'Octubre';
				break;

			case '11':
				$mes = 'Noviembre';
				break;

			case '12':
				$mes = 'Diciembre';
				break;
		}

		$arreglo_fecha = $dia . ' ' . $mes . ' ' . $anyo;

		return $arreglo_fecha;
	}
   

?>