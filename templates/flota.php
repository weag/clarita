<section class="container">
	<h2 class="text-center">Flota</h2>
	<h4> <?php 
		echo $_SESSION["result"]["mensaje"];
		unset($_SESSION["result"]);
		 ?>
	</h4>
	<div class="col-xs-8">
		<table>
			<tr>
				<th>N°</th>
				<th>Marca</th>
				<th>Modelo</th>
				<th>Placa delantera</th>
				<th>Placa lateral</th>
				<th>Acciónes</th>
			</tr>
			<?php  
				include("listar-carros.php");	
				for ($i=1; $i <=count($lista_carros) ; $i++) { 
			?>

			<tr>
				<td><?php echo $i ?></td>
				<td><?php echo $lista_carros[$i]["marca"]  ?></td>
				<td><?php echo $lista_carros[$i]["modelo"]  ?></td>
				<td><?php echo $lista_carros[$i]["placa_delantera"]  ?></td>
				<td><?php echo $lista_carros[$i]["placa_lateral"]  ?></td>
				<td>
					<a href="controllers/controllerCarro.php?accion=editar&id=<?php echo $lista_carros[$i]["id"] ?>" >Editar</a>
					<a href="controllers/controllerCarro.php?accion=eliminar&id=<?php echo $lista_carros[$i]["id"] ?>" >Eliminar</a>
				</td>
			</tr>

			<?php 
				}
			?>
		</table><br/>
		<a href="controllers/controllerCarro.php?accion=agregar" class="btn btn-primary" >Agregar nuevo carro</a>
	</div>
	<div class="col-xs-4">
		<?php  
			include("form-carro.php");	
		?>
	</div>
</section>