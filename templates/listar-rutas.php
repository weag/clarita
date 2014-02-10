<?php  
	include_once('models/ruta.php');
	$ruta=new Ruta();
	$listado;
	$cont=1;
	foreach ($ruta->listar() as $row) {
		$listado[$cont]=$row;
		$cont++;
	}

?>