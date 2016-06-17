<?php 	
	define('HOSTNAME_DATABASE', 'localhost');
	define('USERNAME', 'root');
	define('PASSWORD', 'sistemas');
	define('DATABASE', 'reparaciones'); 	 
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
	define('EMAIL', "no-reply@merito.online");
	define('PUBLIC_URLS', serialize(array('/index.php','index.php?action=validationUser','Registro/index.php','Registro/index.php?action=saveData','Registro/index.php?action=activarCuenta','Secure/index.php?action=closeSession','Secure/index.php?action=recoverPassword','Secure/index.php?action=recoverPass','Secure/index.php?action=resetPassword','Secure/index.php?action=resetPass', 'Register/index.php?action=loadCity', 'Register/index.php?action=saveData','.php')));
	
?>