<?php  
	if ( $_SESSION["form-usuario"]["template"]=="editar" ) {
		?>

<form action="controllers/controllerCarro.php?accion=update" method=post>
	<label for="">Nombre</label><br/>
	<input type="hidden" name="u_id" value=<?php echo $_SESSION["form-usuario"]["id"] ?> />
	<input type="text" name="u_marca" value=<?php echo $_SESSION["form-usuario"]["marca"] ?> /> <br/>
	<label for="">Email</label><br/>
	<input type="text" name="u_modelo" value=<?php echo $_SESSION["form-usuario"]["modelo"] ?> /> <br/>
	<label for="">DNI</label><br/>
	<input type="text" name="u_placa_delantera" value=<?php echo $_SESSION["form-usuario"]["placa_delantera"] ?> /> <br/>
	<label for="">Tipo de Usuario</label><br/>
	<input type="text" name="u_placa_lateral" value=<?php echo $_SESSION["form-usuario"]["placa_lateral"] ?> /> <br/>
	<button>Editar</button>
</form>


		<?php
		unset($_SESSION["form-usuario"] );
	}elseif ($_SESSION["form-usuario"]["template"]=="agregar") {
		?>

<form action="controllers/controllerCarro.php?accion=insert" method=post>
	<label for="">Nombre</label><br/>
	<input type="text" name="u_nombre" /> <br/>
	<label for="">email</label><br/>
	<input type="text" name="u_email" /> <br/>
	<label for="">dni</label><br/>
	<input type="text" name="u_dni" /> <br/>
	<label for="">tipo</label><br/>
	<input type="text" name="u_tipo" /> <br/>
	<button>Agregar</button>
</form>


		<?php
		unset($_SESSION["form-usuario"] );
	}
?>