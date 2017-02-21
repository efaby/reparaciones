<?php
require_once (PATH_MODELOS . "/ReparacionModelo.php");
/*
 * Controlador API
 */

class APIControlador {
	
	public function APIRest() {
		header ( 'Content-Type: application/JSON' );
		$method = $_SERVER ['REQUEST_METHOD'];
		switch ($method) {			
			case 'POST' : 		
				$this->getTicket();		
				break;
			default : 
				
				$this->response(400);
				break;
		}
	}
	
	/**
	 * Respuesta al cliente
	 * 
	 * @param int $code
	 *        	Codigo de respuesta HTTP
	 * @param String $status
	 *        	indica el estado de la respuesta puede ser "success" o "error"
	 * @param String $message
	 *        	Descripcion de lo ocurrido
	 */
	function response($code = 200, $status = "", $message = "") {
		http_response_code ( $code );
		if (! empty ( $status ) && ! empty ( $message )) {
			$response = array (
					"status" => $status,
					"message" => $message 
			);
			echo json_encode ( $response, JSON_PRETTY_PRINT );
		}
	}	
	
	/**
	 *  función que segun el valor de "action" e "id":
	 * - mostrara una array con todos los registros de personas
	 * - mostrara un solo registro
	 * - mostrara un array vacio
	 *
	 */
	function getTicket() {		
		$obj = json_decode( file_get_contents('php://input') );
		$objArr = (array)$obj;
		if (empty($objArr)){
			$this->response(422,"error","Nothing to add. Check json");
		} else {
			if(isset($obj->ticket)){			
				$data = explode('-', $obj->ticket);
				$model = new ReparacionModelo();
				$historial = $model->obtenerHistorial((int)$data[1]);
				$reparacion = $model->obtenerReparacion((int)$data[1]);			
				echo json_encode ( array('reparacion' => $reparacion, 'detalle' => $historial), JSON_PRETTY_PRINT );
			} else {
				$this->response(422,"error","The property is not defined");
			}
		}
	}

	
}//end class
