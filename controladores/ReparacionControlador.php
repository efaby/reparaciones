<?php
require_once (PATH_MODELOS . "/ReparacionModelo.php");
/**
 * Controlador de Reparacion
 */
class ReparacionControlador {
	
	public function listar() {
		$model = new ReparacionModelo();
		$datos = $model->obtenerListadoReparaciones();
		$message = "";
		require_once PATH_VISTAS."/Reparacion/vista.listado.php";
	}
	
	public function editar(){
		$model = new ReparacionModelo();
		$tecnicos = $model->obtenerTecnicos();
		$message = "";
		require_once PATH_VISTAS."/Reparacion/vista.formulario.php";
	}
	
	public function buscarCliente(){
		$model = new ReparacionModelo();
		echo json_encode($model->obtenerClienteIdentificacion());
		exit();
	}
	
	public function guardar() {
		
		$equipo ['numero_serie'] = $_POST ['numero_serie'];
		$equipo ['nombre'] = $_POST ['nombre'];
		$equipo ['marca'] = $_POST ['marca'];
		$equipo ['modelo'] = $_POST ['modelo'];
		$equipo ['observaciones'] = $_POST ['observacion'];
		
		$reparacion['tecnico_id'] = $_POST['tecnico_id'];
		$reparacion['cliente_id'] = $_POST['cliente_id'];
		$reparacion['fecha_ingreso'] = $_POST['fecha'];
		$reparacion['fecha_registro'] = $historial['fecha_registro'] = date('y-m-d');		
		$reparacion['id_usuario'] = $historial['id_usuario'] = 1; //Sesion
		$reparacion['observacion'] = $historial['observaciones'] = $_POST['observaciones'];
		
		$historial['estado_id'] = 1;
		$historial['activo'] = 1;
		
		$objeto['equipo'] = $equipo;
		$objeto['reparacion'] = $reparacion;
		$objeto['historial'] = $historial;
		
		$model = new ReparacionModelo();
		try {
			$datos = $model->guardarReparacion($objeto);
		
			$_SESSION ['message'] = "Datos almacenados correctamente.";
		} catch ( Exception $e ) {
			$_SESSION ['message'] = $e->getMessage ();
		}
		header ( "Location: ../listar/" );
	}
	
	public function eliminar() {
		$model = new ReparacionModelo();
		try {
			$datos = $model->eliminarReparacion();
			$_SESSION ['message'] = "Datos eliminados correctamente.";
		} catch ( Exception $e ) {
			$_SESSION ['message'] = $e->getMessage ();
		}
		header ( "Location: ../listar/" );
	}
	
	
}
