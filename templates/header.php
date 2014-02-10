<!DOCTYPE html>
<html lang="es-PE">
  <head>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="css/normalize.css"/>
    <link rel="stylesheet" href="css/styles.css"/>
    <link rel="shortcut icon" href="images/trailer1.ico"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
    <title>Transportes Clarita S.R.L</title>

    <!-- Bootstrap core CSS -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/nav.css" rel="stylesheet">

    <script type="text/javascript"
      src="http://maps.googleapis.com/maps/api/js?sensor=false">
    </script>

    <script type="text/javascript"
      src="http://code.jquery.com/jquery-2.0.3.min.js">
    </script>

  <!--script type="text/css">
  </script-->

  </head>
  <body>

    <div class="container">
      <div class="masthead">
        <ul class="nav nav-justified">
          <li <?php if($_GET["id"]==1 or $_GET["id"]==null){?> class="active" <?php } ?>><a href="index.php?id=1">Inicio</a></li>
          <li <?php if($_GET["id"]==2){?> class="active" <?php } ?>><a href="empresa.php?id=2">Empresa</a></li>
          <li <?php if($_GET["id"]==3){?> class="active" <?php } ?>><a href="servicios.php?id=3">Servicios</a></li>
          <li <?php if($_GET["id"]==4){?> class="active" <?php } ?>><a href="rutas.php?id=4">Rutas</a></li>
          <li <?php if($_GET["id"]==5){?> class="active" <?php } ?>><a href="rastreo.php?id=5">Rastreo Satelital</a></li>
          <li <?php if($_GET["id"]==6){?> class="active" <?php } ?>><a href="contactenos.php?id=6">Contactenos</a></li>
          <!--li><a href="#" data-toggle="modal" data-target="#myModal">Login</a></li-->
        </ul>
      </div>