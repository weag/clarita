<section class='container'>
      <div class="col-xs-6">
      	<h2>Carros</h2>
		<table class="table table-striped custab text-center">
			<thead>
				<tr>
					<th>N°</th>
					<th>Marca</th>
					<th>Modelo</th>
					<th>Placa delantera</th>
					<th>Placa lateral</th>
					<th>Accion</th>
				</tr>
			</thead>
			<!--Php-->
			<?php  
				include_once("listar-carros.php");	
				for ($i=1; $i <=count($lista_carros) ; $i++) { 
			?>

			<tr>
				<td><?php echo $i ?></td>
				<td><?php echo $lista_carros[$i]["marca"]  ?></td>
				<td><?php echo $lista_carros[$i]["modelo"]  ?></td>
				<td><?php echo $lista_carros[$i]["placa_delantera"]  ?></td>
				<td><?php echo $lista_carros[$i]["placa_lateral"]  ?></td>
				<td><a href="controllers/controllerPosicion.php?accion=rastrear&id_carro=<?php echo  $lista_carros[$i]['id']  ?>" >Ver Posición</a></td>
			</tr>

			<?php 
				}
			?>
			<!--/Php-->

		</table>

      </div>
      <div class="col-xs-6">
      	<?php  
			include_once("mapa.php");	
		?>
      </div>
</section>


