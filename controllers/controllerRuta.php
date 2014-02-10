<?php 
session_start();
ob_start();//fix header redirecciones
	$controller=$_REQUEST;
	if ( $controller['accion']=="agregar" ) {
		include_once('../models/ruta.php');
		$ruta=new Ruta();
		$ruta->agregar( $controller );
		header ("Location:../index.php?page=asignar-ruta");
	}
?>