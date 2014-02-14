<?php  
	if ( $_SESSION["form-carro"]["template"]=="editar" ) {
		?>

<form action="controllers/controllerCarro.php?accion=update" method=post>
	<label for="">Marca</label><br/>
	<input type="hidden" name="u_id" value=<?php echo $_SESSION["form-carro"]["id"] ?> />
	<input type="text" name="u_marca" value=<?php echo $_SESSION["form-carro"]["marca"] ?> /> <br/>
	<label for="">Modelo</label><br/>
	<input type="text" name="u_modelo" value=<?php echo $_SESSION["form-carro"]["modelo"] ?> /> <br/>
	<label for="">Placa Delantera</label><br/>
	<input type="text" name="u_placa_delantera" value=<?php echo $_SESSION["form-carro"]["placa_delantera"] ?> /> <br/>
	<label for="">Placa Latera</label><br/>
	<input type="text" name="u_placa_lateral" value=<?php echo $_SESSION["form-carro"]["placa_lateral"] ?> /> <br/>
	<label for="">Ubicacion</label><br/>
	<input type="text" name="u_ubicacion" value=<?php echo $_SESSION["form-carro"]["ubicacion"] ?> /> <br/>
	
	<button>Editar</button>
</form>


		<?php
		unset($_SESSION["form-carro"] );
	}elseif ($_SESSION["form-carro"]["template"]=="agregar") {
		?>

<form action="controllers/controllerCarro.php?accion=insert" method=post>
	<label for="">Marca</label><br/>
	<input type="text" name="u_marca" /> <br/>
	<label for="">Modelo</label><br/>
	<input type="text" name="u_modelo" /> <br/>
	<label for="">Placa Delantera</label><br/>
	<input type="text" name="u_placa_delantera" /> <br/>
	<label for="">Placa Laterak</label><br/>
	<input type="text" name="u_placa_lateral" /> <br/>
	<label for="">Ubicacion</label><br/>
	<input type="text" name="u_ubicacion" /> <br/>
	<button>Agregar</button>
</form>


		<?php
		unset($_SESSION["form-carro"] );
	}
?>