
<script type="text/javascript">
  
  function informacion (coordenadas) {
    $("#latitude").html(coordenadas.Lat);
    $("#longitude").html(coordenadas.Lng);
  }
  var coordenadas = { Lat: 0, Lng: 0 };
    
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
      
      var map = new google.maps.Map(document.getElementById('mapageo'), mapOptions);
      
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
       /************************* Enviar ubicación *****************************************************/
        $.ajax({ 
            url: 'controllers/controllerPosicion.php',
            data: 'accion=geolocalizar&id_carro=1'+'&Lat='+coordenadas.Lat+'&Lng='+coordenadas.Lng, 
            dataType: 'json', 
            success: function(data){
              alert( data.mensaje );
            }
          })
    }
    
    function errores (error) {
      alert('Ha ocurrido un error al obtener la información');
    }
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(localizacion,errores);
    } else {
      alert("Tu navegador no soporta la 'Geolocalización'");
    }
</script>
  <section class="container margin-tb">
    <div class="col-xs-12">
      <section id="mapageo"></section>
    </div>
  </section>

  <section id="informacion">
    <h2>La posición actual del vehículo es:</h2>
    <h3>Latitud: <span id="latitude"></span></h3>
    <h3>Longitud: <span id="longitude"></span></h3>
  </section>
  
