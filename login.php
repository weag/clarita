<?php
	include("funciones.php");
	include ("conexion.php");
	
	$usuario = $_POST['txtUsuario'];
	$clave   = $_POST['txtPassword'];
	
	$sql = "select * from usuario where nombre_usuario='$usuario'";
		
	$resultado = $dblink->query($sql);
	$registro = $resultado->fetch();
	
		
	if ($registro[clave_usurio] == md5($clave))
	{
		session_name("admin_tesis");
		session_start();
		$_SESSION['nombre_usurio'] = $registro[nombre_usurio];
		$_SESSION['clave_usurio'] = $registro[clave_usurio];
		$_SESSION['tipo_usurio'] = $registro[tipo_usurio];
		
		header("location:header.php");
		
	}else {
		$f= new Funciones();
		$f->mensaje("Error de Identificacion de usuario", "El usuario o la contraseña son incorrectas", "index.php",5);
	}
?>