<section class='container'>
      <div class="col-xs-12">
      	<h2>Rastreo</h2>
		<table>
			<tr>
	            <th>N°</th>
	            <th>Fecha</th>
	            <th>carro</th>
	            <th>cliente</th>
	            <th>Coordenadas de partida</th>
	            <th>Coordenadas de llegada</th>
	            <th>Acción</th>
	         </tr>
	
			<!--Php-->
			<?php  
				include_once("listar-rutas.php");	
				for ($i=1; $i <=count( $ruta->rastreo(  $_SESSION['usuario']  ) ) ; $i++) { 
			?>

			<tr>
	            <td><?php echo $i ?></td>
	            <td><?php echo $listado[$i]["fecha"]  ?></td>
	            <td><?php echo $listado[$i]["id_cl_carro"]  ?></td>
	            <td><?php echo $listado[$i]["id_cl_user"]  ?></td>
	            <td><?php echo $listado[$i]["punto_inicio"]  ?></td>
	            <td><?php echo $listado[$i]["punto_llegada"]  ?></td>
	            <td><a href="controllers/controllerPosicion.php?accion=rastrearc&id_carro=<?php echo $listado[$i]["id_cl_carro"]   ?>" >Ver Posición</a></td>
	         </tr>

			<?php 
				}
			?>
			<!--/Php-->

		</table>

      </div>
      <div class="col-xs-12">
      	<?php  
			include_once("mapa.php");	
		?>
      </div>
</section>


