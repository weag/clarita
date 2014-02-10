<?php  
	if ( isset( $_SESSION["rastreo"] ) ) {
		?>

<div>
	<h3>Datos:</h3>
	Lat:<p id="lat"><?php echo $_SESSION["rastreo"]['data']['lat'] ?> </p>
	Lng:<p id="lng"><?php echo $_SESSION["rastreo"]['data']['lng'] ?>  </p>
</div>
<div id="mapa"></div>		

<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
<script src="js/functions.js"></script>
<script>
	var mapa= crearMapa( $("#lat").text(),$("#lng").text(),'mapa');
	var myLatLng = new google.maps.LatLng($("#lat").text(),$("#lng").text());
	var marcador=crearMarker(myLatLng,mapa);
</script>



		<?php
		unset( $_SESSION["rastreo"] );
	}
?>