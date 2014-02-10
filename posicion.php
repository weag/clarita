<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
	<title>Posicionamiento de su Vehículo.</title>
	<meta charset="UTF-8" />
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300' rel='stylesheet' type='text/css' />
	<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js'></script>
	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
	<style>
	#mapa { position: relative;height: 700px; width: 800px; }
	</style>
	<script type="text/javascript">
	
	function informacion (coordenadas) {
		$("#latitude").html(coordenadas.Lat);
		$("#longitude").html(coordenadas.Lng);
	}
	
	function initialize() {
		
		var coordenadas = {
			Lat: 0,
			Lng: 0
		};
		
		function localizacion (posicion) {
			coordenadas = {
				Lat: posicion.coords.latitude,
				Lng: posicion.coords.longitude
			}
			
			informacion(coordenadas);
			
			var mapOptions = {
				zoom: 17,
				center: new google.maps.LatLng(coordenadas.Lat, coordenadas.Lng),
				disableDefaultUI: true,
				mapTypeId: google.maps.MapTypeId.ROADMAP
			}
			
			var map = new google.maps.Map(document.getElementById('mapa'), mapOptions);
			
			var infowindow = new google.maps.InfoWindow({
				map: map,
				position: new google.maps.LatLng(coordenadas.Lat, coordenadas.Lng ),
				content: 'Vehículo Transportes Clarita'
            });

		     var marker = new google.maps.Marker({
		          position: new google.maps.LatLng( coordenadas.Lat-0.0001, coordenadas.Lng-0.00003 ),
		          map: map,
		          icon: 'images/carro2.png'
		      });
		}
		
		function errores (error) {
			alert('Ha ocurrido un error al obtener la información');
		}
		
		if (navigator.geolocation) {
			navigator.geolocation.getCurrentPosition(localizacion,errores);
		} else {
			alert("Tu navegador no soporta la 'Geolocalización'");
		}		
	}
	</script>
</head>
<body onload="initialize()">
	<header>
		<img src="images/banner222.fw.png" alt="Transportes Clarita" title="Transportes Clarita"/>
		<h1>Posicionamiento de su Vehículo.</h1>
	</header>
	<section id="informacion">
		<h2>La posición actual del vehículo es:</h2>
		<h3>Latitud: <span id="latitude"></span></h3>
		<h3>Longitud: <span id="longitude"></span></h3>
	</section>
	<section id="mapa"></section>
</body>
</html>