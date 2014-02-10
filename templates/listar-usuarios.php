<?php  
	include_once('models/usuario.php');
	$usuario=new Usuario();
	$listado;
	$cont=1;
	foreach ($usuario->listar() as $row) {
		$listado[$cont]=$row;
		$cont++;
	}

?>