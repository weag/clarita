      <div class="row">
        <div class="col-xs-8">
          <h1 class="h1-main">Transportes "Clarita"</h1>
          <img src="images/carro.png" alt="">
        </div>
<?php  
  if ( !verificar() ){
    ?>
        <div class="col-xs-4">
          <h4 class="modal-title">Iniciar Sesión</h4><br>
          <form class="form-signin" action="controllers/controllerUsuario.php?accion=login" method="post">
            <input class="form-control" type="text" name="l-email" required placeholder="Correo Electrónico" autofocus><br>
            <input class="form-control" type="password" name="l-password" required placeholder="Contraseña"><br>
            <button class="btn btn-default">Cerrar</button>
            <button class="btn btn-primary">Iniciar</button><br>
            <a href="#registrar">Registrar Ahora</a><br>
            <a href="#olvidoclave">¿Olvidó su contraseña?</a><br>
          </form>
        </div>
  <?php 
  }
?>
      </div>

      <!-- Example row of columns -->
      <div class="row">
        <div class="col-lg-4">
          <h2>Servicios</h2>
          <p align="justify">Empresa de Transportes Clarita le brinda el servicio de carga,
            para que usted traslade su producto con Seguridad y Confianza.</p>
          <p><a class="btn btn-primary" href="servicios.php?id=3" role="button">Ver más &raquo;</a></p>
        </div>
        <div class="col-lg-4">
          
          <h2>Rutas</h2>
          
          <p align="justify">Empresa de Transportes Clarita, recorre todo el Perú para que 
            usted pueda enviar su carga sin problema alguno. </p>
          <p><a class="btn btn-primary" href="rutas.php?id=4" role="button">Ver más &raquo;</a></p>
       </div>
        <div class="col-lg-4">
          <h2>Rastreo Satelital</h2>
          <p align="justify">Le brindamos el servicio de rastreo de su carga, para que usted 
            pueda saber en que lugar se ubica y pueda saber la hora en llegar a su destino.</p>
          <p><a class="btn btn-primary" href="rastreo?id=5" role="button">Ver más &raquo;</a></p>
        </div>
      </div>
