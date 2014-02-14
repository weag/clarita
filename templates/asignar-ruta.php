<section class='container'>
      <div class="col-xs-6">

        <h3>Ubique Lugar de partida</h3>
        <div id="partida" onclick="calcRoute();"></div>
        
      </div>
      <div class="col-xs-6">

        <h3>Ubique Lugar de Llegada</h3>
        <div id="destino" onclick="calcRoute();"></div>
        
      </div>
      <div class="col-xs-12" id="outputDiv">
      </div>
      <div class="col-xs-3">
        <div class="row">
          <form action="controllers/controllerRuta.php?accion=agregar" method=post>

            <label for="">Lugar de Partida</label> <br/>
            <input type="text" name="lugar_salida" value="" id="lugar_salida" > <br/>

            <label for="">Lugar de llegada</label> <br/>
            <input type="text" name="lugar_llegada" value="" id="lugar_llegada" > <br/>

            <label for="">distancia</label> <br/>
            <input type="text" name="distancia" value="" id="distancia" > <br/>

            <label for="">tiempo</label> <br/>
            <input type="text" name="tiempo" value="" id="tiempo" > <br/>


            <label for="">Coordenadas de lugar de salida</label> <br/>
            <input type="text" name="punto_inicio" value="" id="punto_inicio" > <br/>
            <label for="">Coordenadas Lugar de llegada</label> <br/>
            <input type="text" name="punto_llegada" value="" id="punto_llegada" > <br/>



            <label for="">Fecha de salida</label> <br/>
            <input type="date" name="fecha" value="" id="a-fecha" required> <br/>

            <fieldset>
              <label for="">Carro</label><br/>
            <select name="carro" id=""><br/>
<?php  
  include_once('models/carro.php');
  $carro=new Carro();
  $lista_carros;
  $cont=1;
  foreach ($carro->listarCarrosDisponibles() as $row) {
    $lista_carros[$cont]=$row;
    $cont++;
  }
  for ($i=1; $i <=count($lista_carros) ; $i++) { 
    ?>
      <option value="<?php echo $lista_carros[$i]['id'] ?>"><?php echo $lista_carros[$i]['placa_delantera'] ?></option>
    <?php  
 }
?>
              </select>
            </fieldset>
            <fieldset>
              <label for="">Cliente</label><br/>
              <select name="cliente" id="">
<?php  
  include_once('models/usuario.php');
  $usuario=new Usuario();
  $lista_usuarios;
  $cont=1;
  foreach ($usuario->listar() as $row) {
    $lista_usuarios[$cont]=$row;
    $cont++;
  }

  for ($i=1; $i <=count($lista_usuarios) ; $i++) { 
                ?>
                  <option value="<?php echo $lista_usuarios[$i]['id_cl_user'] ?>"><?php echo $lista_usuarios[$i]['nombre'] ?></option>
                <?php  
 }
?>
              </select><br/>
            </fieldset>

            <label for="">Carga (en toneladas)</label> <br/>
            <input type="number" name="carga" value="" id="a-carga" required title="Especifique el tamaño de la carga"> <br/>

            <button class="btn btn-primary btn-center">registrar</button>
          </form>
        </div>
      </div>
      <div class="col-xs-9">
        <h3>ruta establecida</h3>
        <div id="mapa">
        </div>
      </div>
      
      <div class="col-xs-12 clear-fix">
        <table class="table table-striped custab text-center">
          <thead>
            <tr>
              <th class="text-center">N°</th>
              <th class="text-center">Fecha</th>
              <th class="text-center">carro</th>
              <th class="text-center">cliente</th>

              <th class="text-center">Lugar de salida</th>
              <th class="text-center">Lugar de Llegada</th>
              <th class="text-center">Distancia</th>
              <th class="text-center">Tiempo aproximado de viaje</th>



              <th class="text-center">Coordenadas de partida</th>
              <th class="text-center">Coordenadas de llegada</th>
              <th class="text-center">carga</th>
              <!--<th class="text-center">Acciones</th>-->
            </tr>
          </thead>
          <?php  
            include("listar-rutas.php"); 
            for ($i=1; $i <=count($listado) ; $i++) { 
          ?>

          <tr>
            <td><?php echo $i ?></td>
            <td><?php echo $listado[$i]["fecha"]  ?></td>
            <td><?php echo $listado[$i]["id_cl_carro"]  ?></td>
            <td><?php echo $listado[$i]["id_cl_user"]  ?></td>

            <td><?php echo $listado[$i]["lugar_salida"]  ?></td>
            <td><?php echo $listado[$i]["lugar_llegada"]  ?></td>
            <td><?php echo $listado[$i]["distancia"]  ?></td>
            <td><?php echo $listado[$i]["tiempo"]  ?></td>

            <td><?php echo $listado[$i]["punto_inicio"]  ?></td>
            <td><?php echo $listado[$i]["punto_llegada"]  ?></td>
            <td><?php echo $listado[$i]["carga"]  ?></td>
            <!--<td class="text-center">
              <a class='btn btn-info btn-xs'   href="controllers/controllerRuta.php?accion=editar&id=<?php echo $listado[$i]["id"] ?>" > Editar</a> 
              <a class="btn btn-danger btn-xs" href="controllers/controllerRuta.php?accion=eliminar&id=<?php echo $listado[$i]["id"] ?>" > Eliminar</a>
            </td>-->
          </tr>

          <?php 
            }
          ?>
        </table><br/>
      </div>
    </section>

    <button type="button" onclick="calculateDistances();">
      Calculate
      distances
    </button>

<script src="https://maps.googleapis.com/maps/api/js?v=3.10&key=AIzaSyBP3ZaMYVz0M19TaHkskzCYq-dncj2TxjI&sensor=true&language=es"></script>
<script src="js/functions.js"></script>
<script>
    var directionsDisplay,rutakm;
    var directionsService = new google.maps.DirectionsService();
    var marcadoresNuevos=[];
    var mapa,partida,destino,coordenadasPartida,coordenadasIda,ruta={} ;
    var coordenadasTermnal= {
      lat:-5.710094,
      lng:-78.802894
    };
    var porigen,pdestino;







var map;
var geocoder;
var bounds = new google.maps.LatLngBounds();
var markersArray = [];

var origin1 ;//= new google.maps.LatLng(55.930, -3.118);
var destinationB ;//= new google.maps.LatLng(50.087, 14.421);


var destinationIcon = 'https://chart.googleapis.com/chart?chst=d_map_pin_letter&chld=D|FF0000|000000';
var originIcon = 'https://chart.googleapis.com/chart?chst=d_map_pin_letter&chld=O|FFFF00|000000';




function initialize() {
  directionsDisplay = new google.maps.DirectionsRenderer();
  partida = crearMapa( coordenadasTermnal.lat,coordenadasTermnal.lng,'partida');
  map    = crearMapa( coordenadasTermnal.lat,coordenadasTermnal.lng,'mapa');
  destino = crearMapa( coordenadasTermnal.lat,coordenadasTermnal.lng,'destino');

  geocoder = new google.maps.Geocoder();


  google.maps.event.addListener(partida, "click", function(event){
    coordenadasPartida = event.latLng;
    //alert(coordenadasPartida.toS.replace("(","").replace(")","") );
    ruta.corPartida=coordenadasPartida;

    origin1=new google.maps.LatLng( event.latLng.lat(),event.latLng.lng() );

    var marcador=crearMarker(coordenadasPartida,partida);
    marcadoresNuevos.push(marcador);
    //eliminarMarkers(marcadoresNuevos);
    marcador.setMap(partida);
    partida.panTo(coordenadasPartida);

    $('#punto_inicio').val( ruta.corPartida );
  
  });
  google.maps.event.addListener(destino, "click", function(event){
    coordenadasIda = event.latLng;
    ruta.corLlegada=coordenadasIda;

    destinationB=new google.maps.LatLng( event.latLng.lat(),event.latLng.lng() );

    var marcador=crearMarker(coordenadasIda,destino);
    marcadoresNuevos.push(marcador);
    //eliminarMarkers(marcadoresNuevos);
    marcador.setMap(destino);
    destino.panTo(coordenadasIda);

    $('#punto_llegada').val( ruta.corLlegada );
  });


  directionsDisplay.setMap(map);

}


function callback(response, status) {
  if (status != google.maps.DistanceMatrixStatus.OK) {
    alert('Error was: ' + status);
  } else {
    var origins = response.originAddresses;
    var destinations = response.destinationAddresses;
    var outputDiv = document.getElementById('outputDiv');
    outputDiv.innerHTML = '';
    deleteOverlays();

    for (var i = 0; i < origins.length; i++) {
      var results = response.rows[i].elements;
      //addMarker(origins[i], false);
      for (var j = 0; j < results.length; j++) {
        //addMarker(destinations[j], true);
        outputDiv.innerHTML += '<strong>Lugar de Partida:</strong> '+origins[i] + '<br/><strong> Lugar de Llegada :</strong> ' + destinations[j]
            + '<br/><strong> Distancia :</strong> ' + results[j].distance.text + ' <br/><strong> Tiempo aproximado de llegada </strong> '
            + results[j].duration.text + '<br>';

            $('#lugar_salida').val( origins[i] );
            $('#lugar_llegada').val( destinations[j] );
            $('#distancia').val( results[j].distance.text );
            $('#tiempo').val( results[j].duration.text );


      }
    }
  }
}

function addMarker(location, isDestination) {
  var icon;
  if (isDestination) {
    icon = destinationIcon;
  } else {
    icon = originIcon;
  }
  geocoder.geocode({'address': location}, function(results, status) {
    if (status == google.maps.GeocoderStatus.OK) {
      bounds.extend(results[0].geometry.location);
      map.fitBounds(bounds);
      var marker = new google.maps.Marker({
        map: map,
        position: results[0].geometry.location,
        icon: icon
      });
      markersArray.push(marker);
    } else {
      alert('Geocode was not successful for the following reason: '
        + status);
    }
  });
}

function deleteOverlays() {
  for (var i = 0; i < markersArray.length; i++) {
    markersArray[i].setMap(null);
  }
  markersArray = [];
}











google.maps.event.addDomListener(window, 'load', initialize);


  

    </script>