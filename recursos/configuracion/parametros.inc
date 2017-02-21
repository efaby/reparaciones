<?php 	
	define('HOSTNAME_DATABASE', 'localhost');
	define('USERNAME', 'root');
	define('PASSWORD', '123456');
	define('DATABASE', 'reparacion'); 	 
	define('URL_BASE', '/reparaciones/');
	define('PATH_MODELOS', PATH_ROOT."/modelos");
	define('PATH_CONTROLADORES', PATH_ROOT."/controladores");
	define('PATH_VISTAS', PATH_ROOT."/vistas");
	define('PATH_BASE', "/reparaciones");
	define('PATH_CSS', PATH_BASE."/recursos/web/css");
	define('PATH_JS', PATH_BASE."/recursos/web/js");
	define('PATH_IMAGES', PATH_BASE."/recursos/web/images");
	define('PATH_TEMPLATE', PATH_ROOT."/recursos/plantilla");	
	
	define('PATH_IMAGES_USER',  "../../assets/images/users/");
	define('PATH_FILES_USER',  "../../files/");	
	
	define('PATH_FILES', PATH_ROOT."/web/files/");
	define('PATH_FILES_IMAGE', PATH_ROOT."/web/assets/images/users/");
	define('PATH_HELPERS', PATH_ROOT."/helpers");	
	define('PUBLIC_URLS', serialize(array('Seguridadmostrar','APIAPIRest','Seguridadvalidar','Seguridaderror404','Seguridaderror403','Seguridaderror500')));
	
?>