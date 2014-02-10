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
	}elseif ($controller['accion']=="geo") {
		header ("Location:../index.php?page=geo");
	}elseif ($controller['accion']=="rastreoCliente") {
		header ("Location:../index.php?page=rastreoCliente");
	}elseif ($controller['accion']=="usuarios") {
		header ("Location:../index.php?page=usuarios");
	}elseif ( $controller['accion']=="agregar" ) {
		$_SESSION["form-usuario"]["template"]="agregar";
		header ("Location:../index.php?page=usuarios");
	}
	elseif ( $controller['accion']=="editar" ) {
		include_once('../models/usuario.php');
		$usuario=new Usuario();
		$_SESSION["form-usuario"]=$usuario->editar( $controller );
		$_SESSION["form-usuario"]["template"]="editar";
		header ("Location:../index.php?page=usuarios");
	}elseif ( $controller['accion']=="eliminar" ) {
		include_once('../models/usuario.php');
		$usuario=new Usuario();
		$_SESSION["result"]=$usuario->eliminar( $controller );
		header ("Location:../index.php?page=usuarios");
	}

ob_end_flush(); 
?>