<section class="container">
	<h2 class="text-center">Usuarios</h2>
	<h4> <?php 
		echo $_SESSION["result"]["mensaje"];
		unset($_SESSION["result"]);
		 ?>
	</h4>
	<div class="col-xs-8">
		

		<table class="table table-striped custab">
		    <thead>
		        <tr>
		            <th>N°</th>
					<th>Nombre</th>
					<th>Email</th>
					<th>DNI</th>
					<th>Tipo</th>
					<th>Acciónes</th>
		        </tr>
		    </thead>


					<?php  
						include("listar-usuarios.php");	
						for ($i=1; $i <=count($listado) ; $i++) { 
					?>

					<tr>
						<td><?php echo $i ?></td>
						<td><?php echo $listado[$i]["nombre"]  ?></td>
						<td><?php echo $listado[$i]["email"]  ?></td>
						<td><?php echo $listado[$i]["dni"]  ?></td>
						<td><?php echo $listado[$i]["id_tipo"]  ?></td>
						<td class="text-center">
							<a class='btn btn-info btn-xs'   href="controllers/controllerUsuario.php?accion=editar&id=<?php echo $listado[$i]["id"] ?>" ><span class="glyphicon glyphicon-edit"></span> Editar</a> 
							<a class="btn btn-danger btn-xs" href="controllers/controllerUsuario.php?accion=eliminar&id=<?php echo $listado[$i]["id"] ?>" ><span class="glyphicon glyphicon-remove"></span> Eliminar</a>
						</td>

					</tr>

					<?php 
						}
					?>

		    </table>


		<a href="controllers/controllerUsuario.php?accion=agregar" class="btn btn-primary" >Agregar nuevo usuario</a>

	</div>
	<div class="col-xs-4">
		<?php  
			include("form-usuario.php");	
		?>
	</div>
</section>