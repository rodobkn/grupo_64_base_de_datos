<?php include('../templates/header_2.html');   ?>

<body>

<?php
  require("../config/conexion.php"); #Llama a conexión, crea el objeto PDO y obtiene la variable $db


  $fecha_viaje = $_POST["fecha_viaje"];
  $ciudad_origen_id = $_POST["ciudad_origen"];
  $ciudad_destino_id = $_POST["ciudad_destino"];

  $query = "SELECT did, cidorigen, ciddestino, horario, duracion, medio, capacidad, dprecio FROM destinos 
  WHERE cidorigen=$ciudad_origen_id AND ciddestino=$ciudad_destino_id;";
  $result = $db_impar -> prepare($query);
  $result -> execute();
  $lista_de_destinos = $result -> fetchAll();

  $query_2 = "SELECT cnombre FROM ciudades WHERE cid=$ciudad_origen_id;";
  $result_2 = $db_impar -> prepare($query_2);
  $result_2 -> execute();
  $lista_nombre_ciudad_origen = $result_2 -> fetchAll();

  $query_3 = "SELECT cnombre FROM ciudades WHERE cid=$ciudad_destino_id;";
  $result_3 = $db_impar -> prepare($query_3);
  $result_3 -> execute();
  $lista_nombre_ciudad_destino = $result_3 -> fetchAll();


  foreach ($lista_nombre_ciudad_origen as $ciudad) {

    $nombre_ciudad_origen = $ciudad[0];

    }

    foreach ($lista_nombre_ciudad_destino as $ciudad) {

        $nombre_ciudad_destino = $ciudad[0];

    }





?>

<br>
<br>

<div class="container">

  <div class="card">
      <div class="card-header">
          Usted está buscando viaje para la siguiente fecha: <b> <?php echo "$fecha_viaje" ?></b> <br>
          A continuación se mostrarán todos los <b>viajes</b> que tenemos disponibles. Si quiere comprar un viaje, o simplemente más
          información, haga click sobre el viaje:
      </div>

      <div class="card-body">


      <table class="table">
          <thead class="thead-dark">
          <tr>
              <th scope="col">Viaje</th>
              <th scope="col">Ciudad de origen</th>
              <th scope="col">Ciudad de destino</th>
              <th scope="col">Horario</th>
              <th scope="col">Duración</th>
              <th scope="col">Medio</th>
              <th scope="col">Capacidad</th>
              <th scope="col">Precio</th>
          </tr>
          </thead>
          <tbody>
              <!-- <th scope="row">1</th> -->

              <?php
              foreach ($lista_de_destinos as $destino) {

                $id_destino = $destino[0];
                $id_ciudad_origen = $destino[1];
                $id_ciudad_destino = $destino[2];
                $horario = $destino[3];
                $duracion = $destino[4];
                $medio = $destino[5];
                $capacidad = $destino[6];
                $precio = $destino[7];

                echo "<tr> <td> viaje $id_destino </td> <td>  $nombre_ciudad_origen </td> <td>  $nombre_ciudad_destino </td> 
                <td>  $horario </td> <td>  $duracion </td> <td>  $medio </td> <td>  $capacidad </td> <td>  $precio </td> </tr>";


                }
              ?>


          </tbody>
      </table>


      </div>
  </div>
</div>



<?php include('../templates/footer_busqueda_tickets.html'); ?>

<?php include('../templates/footer.html'); ?>


<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Plugin JavaScript -->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom JavaScript for this theme -->
<script src="js/scrolling-nav.js"></script>