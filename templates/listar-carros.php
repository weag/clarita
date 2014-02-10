<?php  
	include_once('models/carro.php');
	$carro=new Carro();
	$lista_carros;
	$cont=1;
	foreach ($carro->listar() as $row) {
		$lista_carros[$cont]=$row;
		$cont++;
	}
	return $lista_carros;
?>