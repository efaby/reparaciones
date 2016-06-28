<?php
require_once(PATH_MODELOS."/BaseModelo.php");

/**
 * Modelo para modulo de Reparacion
 *
 */

class ReparacionModelo {


	public function obtenerListadoReparaciones(){
		$model = new BaseModelo();		
		$sql = "select c.identificacion, concat(c.nombres, ' ', c.apellidos) as cliente, e.nombre, concat(t.nombres, ' ' , t.apellidos) as tecnico, r.fecha_ingreso, r.observacion, es.nombre as estado, es.id as estado_id, r.id 
				from cliente as c
				inner join reparacion as r on r.cliente_id = c.id
				inner join usuario as t on r.tecnico_id =  t.id
				inner join equipo as e on r.equipo_id =  e.id
				inner join historial as h on h.reparacion_id = r.id and h.activo = 1
				inner join estado as es on h.estado_id = es.id
				where r.eliminado = 0";		

		$result = $model->ejecutarSql($sql);
		return $model->obtenerCampos($result);
	}
	
	public function obtenerClienteIdentificacion()
	{
		$cliente = $_GET['id'];
		$model = new BaseModelo();
		if($cliente > 0){
			$sql = "select * from cliente where identificacion = ".$cliente;
			$result = $model->ejecutarSql($sql);
			$resultArray = $model->obtenerCampos($result);
			$resultArray = $resultArray[0];
	
		} else {
			$resultArray = Array ( 'id' => 0);
		}
		
		return $resultArray;
	}
	
	public function obtenerTecnicos()
	{		
		$model = new BaseModelo();
		$sql = "select * from usuario where tipo_usuario_id = 2 and eliminado = 0";
		$result = $model->ejecutarSql($sql);
		return $model->obtenerCampos($result);
	}
	
	public function guardarReparacion($objeto)
	{
		$model = new BaseModelo();
		$equipo_id = $model->guardarDatos($objeto['equipo'], 'equipo');		
		$objeto['reparacion']['equipo_id'] = $equipo_id;
		$reparacion_id = $model->guardarDatos($objeto['reparacion'], 'reparacion');
		$objeto['historial']['reparacion_id'] = $reparacion_id;
		return $model->guardarDatos($objeto['historial'], 'historial');
	}
	
	public function eliminarReparacion(){
		$reparacion = $_GET['id'];
		$sql = "update reparacion set eliminado = 1 where id = ".$reparacion;
		$model = new BaseModelo();
		$result = $model->ejecutarSql($sql);
	}

}
