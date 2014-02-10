Lat<p id="lat"><?php echo $_SESSION['position']['lat'] ?> </p>
Lng<p id="lng"><?php echo $_SESSION['position']['lng'] ?>  </p>
<section id="mapa" class="col-xs-12">
	
</section>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
<script src="js/functions.js"></script>
<script>
	var mapa= crearMapa( $("#lat").text(),$("#lng").text(),'mapa');
	var myLatLng = new google.maps.LatLng($("#lat").text(),$("#lng").text());
	var marcador=crearMarker(myLatLng,mapa);
</script>