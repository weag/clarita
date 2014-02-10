<?php 
session_start();
ob_start();//fix header redirecciones
	$controller=$_REQUEST;
	if($controller['accion']=="geolocalizar"){
		include_once('../models/posicion.php');
		$posicion=new Posicion();
		$posicion->setPosition( $controller );
	}elseif ($controller['accion']=="rastrear") {
		include_once('../models/posicion.php');
		$posicion=new Posicion();
		$posicion->rastrear( $controller );
		header ("Location:../index.php?page=rastreo-satelital");
	}
?>