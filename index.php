<?php
define("PATH_ROOT", __DIR__);

require_once(PATH_ROOT . "/recursos/configuracion/parametros.inc");
$redirect = "display";
session_start();
if(isset($_GET['action'])){
	$redirect = $_GET['action'];
	$url .= "?action=".$redirect;
}

/*

$patron = "web/";
$limit = 4;
if(mb_stristr($_SERVER["SCRIPT_NAME"],"/views/")){
	$patron = "web/views/";
	$limit = 10;
}
$url = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],$patron)+$limit); 
$urls = unserialize(PUBLIC_URLS);

if(isset($_GET['action'])){
	$redirect = $_GET['action'];	
	$url .= "?action=".$redirect;
} else {
	if(!strrpos($_SERVER["SCRIPT_NAME"],"views/")){
		$url = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"web/")+3);
	}	
}
if (isset($_SESSION['SESSION_USER'])){

	if((!in_array($url, $_SESSION['SESSION_USER']['urls']))){
		$app = 'Secure';
		$redirect = "error403";
	} else {	
		if($url == '/index.php'){
			$app = 'Secure';
			$redirect = "welcome";
		}
	}	
} else {
	if(!in_array($url, $urls)){
		header("location: /web/index.php");
		exit();
	}
} 
*/

if(!isset($app)){
	$app = 'Seguridad';
}	



require_once(PATH_CONTROLADORES."/".$app."Controlador.php");
$controllerName = $app."Controlador";
$controller = new $controllerName();
$controller->$redirect();

?>