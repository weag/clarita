<?php  
 /********** generar menu ******/
  include("controllers/controllerSession.php"); 
  if ( verificar() ) {
  	?>

	<div class="row">
		<nav class="col-lg-6" class="a">
    <?php  
      for ($i=1; $i <=count( $_SESSION['menu']  ) ; $i++) { 
        ?>
          <a class="men_usu" href="<?php echo $_SESSION['menu'][$i]['href'] ?>"><?php echo $_SESSION['menu'][$i]['titulo'] ?></a>
        <?php
      }

    ?>
		</nav>
        <div class="col-lg-4 col-lg-offset-2">
        	<span>  <?php echo $_SESSION['userData']['nombre'] ?> </span>
        	<a class="men_usu" styles="text-decoration=none" href="controllers/controllerUsuario.php?accion=cerrar-sesion">Cerrar Sesión</a>
      	</div>
    </div>
  	<?php
  }
?>
