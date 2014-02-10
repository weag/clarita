<?php 
session_start();
ob_start();//fix header redirecciones
	$controller=$_REQUEST;
	if($controller['accion']=="geolocalizar"){
		include_once('../models/carro.php');
		$carro=new Carro();
		$carro->setPosition( $controller );
	}elseif ( $controller['accion']=="editar" ) {
		include_once('../models/carro.php');
		$carro=new Carro();
		$_SESSION["form-carro"]=$carro->editar( $controller );
		$_SESSION["form-carro"]["template"]="editar";
		header ("Location:../index.php?page=flota");
	}elseif ( $controller['accion']=="update" ) {
		include_once('../models/carro.php');
		$carro=new Carro();
		$_SESSION["result"]=$carro->update( $controller );
		header ("Location:../index.php?page=flota");
	}elseif ( $controller['accion']=="insert" ) {
		include_once('../models/carro.php');
		$carro=new Carro();
		$_SESSION["result"]=$carro->insert( $controller );
		header ("Location:../index.php?page=flota");
	}elseif ( $controller['accion']=="eliminar" ) {
		include_once('../models/carro.php');
		$carro=new Carro();
		$_SESSION["result"]=$carro->eliminar( $controller );
		header ("Location:../index.php?page=flota");
	}elseif ( $controller['accion']=="agregar" ) {
		$_SESSION["form-carro"]["template"]="agregar";
		header ("Location:../index.php?page=flota");
	}
?>