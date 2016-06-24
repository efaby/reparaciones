<?php
/**
 * Clase que se usa para la conexion ala base de datos
 */
class BaseModelo
{
	private $username = USERNAME;
	private $password = PASSWORD;	
	private $database = DATABASE;
	private $host = HOSTNAME_DATABASE;
	private $conexion;	

	private function abrirConexion()
	{
		$this->conexion=mysql_connect($this->host,$this->username,$this->password);
		mysql_set_charset('utf8', $this->conexion);
		mysql_select_db($this->database,$this->conexion);
	}

	private function cerrarConexion()
	{
		mysql_close();
	}

	public function ejecutarSql($sql,$obtenerId = false)
	{
		$this->abrirConexion();
		$result=mysql_query($sql,$this->conexion);
		
		if($obtenerId){
        	$result = mysql_insert_id($this->conexion);
		}
        $this->cerrarConexion();
		return $result;
	}
	
	public function obtenerCampos($resultado){
		$resultArray = array();
		while ($row = mysql_fetch_assoc($resultado))
		{
			$resultArray[] = $row;
		}
		return $resultArray;
	}
	
	public function obtenerCatalogo($tabla){
		$sql = "Select * from ".$tabla;
		$result = $this->ejecutarSql($sql);
		return $this->obtenerCampos($result);
	}
	
	public function guardarDatos($objeto,$tabla){
		$id = $objeto["id"];
		unset($objeto["id"]);		
		$values = "";
		$keys = "";
		foreach ($objeto as $key => $value){
			if($id == 0){
				$values .= ($values == '')?"'".$value."'":" ,'".$value."'";
				$keys .= ($keys == '')?$key:' ,'.$key;
			} else {
				$values .= ($values == '')? $key ." = '".$value."'":" ,".$key ." = '".$value."'";				
			}
		}		
		
		if($id == 0){
			$sql = ' Insert into '.$tabla. ' ('.$keys.') values ('.$values.')';
		} else {
			$sql = 'Update '.$tabla. ' set '.$values.' where id = '.$id;
		}

		return $this->ejecutarSql($sql,true);
	}
	
	
	
}
