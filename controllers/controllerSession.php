<?php  
session_start();
	function verificar(){
		if (isset($_SESSION['usuario']) ) {
			
			return true;
		}else{
			return false;
		}
	}
	function getMenu(){
		include_once('models/usuario.php');
		$usuario=new Usuario();
		return $usuario->getMenu();
	}
?>