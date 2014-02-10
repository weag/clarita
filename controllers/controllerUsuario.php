<?php  
session_start();
ob_start();//fix header redirecciones

	$controller=$_REQUEST;
	//******** LOGIN
	if($controller['accion']=="login"){

		include_once('../models/usuario.php');
		$usuario=new Usuario();
		$usuario->login($controller);
		header ("Location:../index.php");

	}elseif ($controller['accion']=="cerrar-sesion") {
		session_destroy();
		header ("Location: ../index.php");
	}elseif ($controller['accion']=="asignar-ruta") {
		header ("Location:../index.php?page=asignar-ruta");
	}elseif ($controller['accion']=="rastreo-satelital") {
		header ("Location:../index.php?page=rastreo-satelital");
	}elseif ($controller['accion']=="flota") {
		header ("Location:../index.php?page=flota");
	}

ob_end_flush(); 
?>