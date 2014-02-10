
function eliminarMarkers (lista) {
  for(i in lista){
    lista[i].setMap(null);
  }
}
function calcRoute() {
  var request = {
      origin:coordenadasPartida,
      destination: coordenadasIda ,
      unitSystem:google.maps.UnitSystem.METRIC,
      travelMode: google.maps.TravelMode.DRIVING
  };
  directionsService.route(request, function(response, status) {
    if (status == google.maps.DirectionsStatus.OK) {
      directionsDisplay.setDirections(response);
    }
  });
}


//funcion que nos crea un mapa, los parametros lat y lng son las coordanadas y div es el contenedor en cual queremos ver el mapa
function crearMapa (lat,lng,div) {
  var mapOptions = {
    zoom:5,
    center: new google.maps.LatLng(lat,lng)
  }
  var mapCreado = new google.maps.Map(document.getElementById(div), mapOptions);
  return mapCreado;
}
function crearMarker(coordenadas,mapa) {
  var marker = new google.maps.Marker({
    position: coordenadas,
    map: mapa
  });
  return marker;
}