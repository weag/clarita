<?php  
	if ( $_SESSION["form-usuario"]["template"]=="editar" ) {
		?>

<form action="controllers/controllerUsuario.php?accion=update" method=post>
	<label for="">Nombre</label><br/>
	<input type="hidden" name="u_id_cl_user" value=<?php echo $_SESSION["form-usuario"]["id_cl_user"] ?> />
	<input type="text" name="u_nombre" value="<?php echo $_SESSION["form-usuario"]["nombre"] ?> " /> <br/>
	<label for="">Email</label><br/>
	<input type="text" name="u_email" value=<?php echo $_SESSION["form-usuario"]["email"] ?> /> <br/>
	<label for="">DNI</label><br/>

	<input type="text" name="u_dni" value=<?php echo $_SESSION["form-usuario"]["dni"] ?> /> <br/>
	<label for="">Tipo de Usuario</label><br/>
	
	<input type="text" name="u_id_tipo" value=<?php echo $_SESSION["form-usuario"]["id_tipo"] ?> /> <br/>
	<label for="">Password</label><br/>
	<input type="password" name="u_password" value=<?php echo $_SESSION["form-usuario"]["password"] ?> /> <br/>
	<button>Editar</button>
</form>
		<?php
		unset($_SESSION["form-usuario"] );
	}elseif ($_SESSION["form-usuario"]["template"]=="agregar") {
		?>

<form action="controllers/controllerUsuario.php?accion=insert" method=post>
	<label for="">Nombre</label><br/>
	<input type="text" name="u_nombre" /> <br/>
	<label for="">email</label><br/>
	<input type="text" name="u_email" /> <br/>
	<label for="">dni</label><br/>
	<input type="text" name="u_dni" /> <br/>
	<label for="">Password</label><br/>
	<input type="password" name="u_password" /> <br/>
	<label for="">tipo</label><br/>
	<select name="u_tipo" id="">
		<option value="1">Administrador</option>
		<option value="2">Conductor</option>
		<option value="3">Propietario</option>
	</select>
	<button>Registrar</button>
</form>


		<?php
		unset($_SESSION["form-usuario"] );
	}
?>