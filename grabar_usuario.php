<?php
	
	$cod_usuario = $_POST['txt_cod'];
	$nombre_usuario = $_POST['txt_nom'];
	$apellido_usuario = $_POST['txt_ape'];
	$dni_usuario = $_POST['txt_dni'];
	$email_usuario = $_POST['txt_ema'];
	$clave_usuario = $_POST['txt_cod'];
	$tipo_usuario = $_POST['txt_cod'];

	$accion = $_POST['accion'];

	include('conexion.php');

	if($accion=='nuevo')
	{
		$sql="insert into usuario (nombre_usuario, apellido_usuario, dni_usuario, email_usuario, 
			clave_usuario, tipo_usuario) values ('$nombre_usuario', '$apellido_usuario', '$dni_usuario', 
			'$email_usuario', md5('$clave_usuario'),'$tipo_usuario')";
	}else{

		$sql=update usuario set nombre_usuario='$nombre_usuario', apellido_usuario='$apellido_usuario', 
		dni_usuario='$dni_usuario', email_usuario='$email_usuario', clave_usuario='md5('12345')', tipo_usuario='$tipo_usuario'
		 where cod_usuario='$cod_usuario';
	}

	$dblink->query( $sql );
	header("location:usuarios_listado.php");

?>