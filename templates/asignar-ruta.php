<section class='container'>
      <div class="col-xs-6">

        <h3>Ubique Lugar de partida</h3>
        <div id="partida" onclick="calcRoute();"></div>
        
      </div>
      <div class="col-xs-6">

        <h3>Ubique Lugar de Llegada</h3>
        <div id="destino" onclick="calcRoute();"></div>
        
      </div>
      
      <div class="col-xs-3">
        <div class="row">
          <form action="controllers/controllerRuta.php?accion=agregar" method=post>
<?php  
$todayh = getdate();
$d = $todayh[mday];
$m = $todayh[mon];
$y = $todayh[year];
?>
            <input type="hidden" name="fecha" value="<?php echo $d.'/'.$m.'/'.$y ?>" > <br/>
            <label for="">Punto de Inicio</label> <br/>
            <input type="text" name="punto_inicio" value="" id="punto_inicio" > <br/>
            <label for="">Punto de Llegada</label> <br/>
            <input type="text" name="punto_llegada" value="" id="punto_llegada" > <br/>

            <fieldset class="col-xs-6">
              <label for="">Carro</label><br/>
            <select name="carro" id=""><br/>
<?php  
  include_once('models/carro.php');
  $carro=new Carro();
  $lista_carros;
  $cont=1;
  foreach ($carro->listar() as $row) {
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
            </fieldset><br/>
            <fieldset class="col-xs-6">
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
            <button class="btn btn-primary btn-center">registrar</button>
          </form>
        </div>
      </div>
      <div class="col-xs-9">
        <h3>ruta establecida</h3>
        <div id="mapa">
        </div>
      </div>
      <div class="col-xs-11">
        <table>
          <tr>
            <th>N°</th>
            <th>Fecha</th>
            <th>carro</th>
            <th>cliente</th>
            <th>Coordenadas de partida</th>
            <th>Coordenadas de llegada</th>
          </tr>
          <?php  
            include("listar-rutas.php"); 
            for ($i=1; $i <=count($listado) ; $i++) { 
          ?>

          <tr>
            <td><?php echo $i ?></td>
            <td><?php echo $listado[$i]["fecha"]  ?></td>
            <td><?php echo $listado[$i]["id_cl_carro"]  ?></td>
            <td><?php echo $listado[$i]["id_cl_user"]  ?></td>
            <td><?php echo $listado[$i]["punto_inicio"]  ?></td>
            <td><?php echo $listado[$i]["punto_llegada"]  ?></td>
          </tr>

          <?php 
            }
          ?>
        </table><br/>
      </div>
    </section>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
<script src="js/functions.js"></script>
<script>
    var directionsDisplay;
    var directionsService = new google.maps.DirectionsService();
    var marcadoresNuevos=[];
    var mapa,partida,destino,coordenadasPartida,coordenadasIda,ruta={} ;
    var coordenadasTermnal= {
      lat:-5.710094,
      lng:-78.802894
    };

function initialize() {
  directionsDisplay = new google.maps.DirectionsRenderer();
  partida = crearMapa( coordenadasTermnal.lat,coordenadasTermnal.lng,'partida');
  mapa    = crearMapa( coordenadasTermnal.lat,coordenadasTermnal.lng,'mapa');
  destino = crearMapa( coordenadasTermnal.lat,coordenadasTermnal.lng,'destino');

  google.maps.event.addListener(partida, "click", function(event){
    coordenadasPartida = event.latLng;
    ruta.corPartida=coordenadasPartida;
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
    var marcador=crearMarker(coordenadasIda,destino);
    marcadoresNuevos.push(marcador);
    //eliminarMarkers(marcadoresNuevos);
    marcador.setMap(destino);
    destino.panTo(coordenadasIda);

    $('#punto_llegada').val( ruta.corLlegada );
  });


  directionsDisplay.setMap(mapa);

  
}
google.maps.event.addDomListener(window, 'load', initialize);


  

    </script>