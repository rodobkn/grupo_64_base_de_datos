<?php session_start();?>
<?php include('../templates/header_2.html');   ?>

<body>

<?php

  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  $asientos_ocupados = [];
  $numero_personas = 0;

  $id_destino = $_GET['id_destino'];
  $fecha_viaje = $_GET['fecha_viaje'];
  $nombre_ciudad_origen = $_GET['n_ciudad_origen'];
  $nombre_ciudad_destino = $_GET['n_ciudad_destino'];

  $query = "SELECT did, cidorigen, ciddestino, horario, duracion, medio, capacidad, dprecio FROM destinos WHERE did=$id_destino;";
  $result = $db_impar -> prepare($query);
  $result -> execute();
  $informacion_del_destino = $result -> fetchAll();

  $query_2 = "SELECT tid, did, uid, asiento, fechacompra, fechaviaje FROM tickets WHERE did=$id_destino AND fechaviaje='$fecha_viaje';";
  $result_2 = $db_impar -> prepare($query_2);
  $result_2 -> execute();
  $tickets_con_misma_fecha_y_destino = $result_2 -> fetchAll();

  foreach ($tickets_con_misma_fecha_y_destino as $ticket) {

    array_push($asientos_ocupados, $ticket[3]);
    $numero_personas = $numero_personas + 1;

    }

    foreach ($informacion_del_destino as $informacion) {

        $capacidad_maxima = $informacion[6];
    
        }
    
    $capacidad_disponible = $capacidad_maxima - $numero_personas;

    $fecha_de_compra = date('Y/m/d');

    $array_a_mandar_2 = array($id_destino, $fecha_de_compra, $fecha_viaje, $asientos_ocupados);
    $_SESSION['array_2'] = $array_a_mandar_2;


  ?>
<br>
<br>

<div class="container">

  <div class="card">
      <div class="card-header">
        Usted está buscando viaje para la siguiente fecha: <b> <?php echo "$fecha_viaje" ?></b> <br>
        Cantidad de asientos disponibles: <b> <?php echo "$capacidad_disponible" ?></b> <br>
        A continuación se mostrará toda la <b>información</b> del <b>viaje</b> en la fecha indicada anteriormente:
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
              foreach ($informacion_del_destino as $destino) {

                $id_destino = $destino[0];
                $id_ciudad_origen = $destino[1];
                $id_ciudad_destino = $destino[2];
                $horario = $destino[3];
                $duracion = $destino[4];
                $medio = $destino[5];
                $capacidad = $destino[6];
                $precio = $destino[7];

                echo "<tr> <td> viaje $id_destino </td> 
                <td>  $nombre_ciudad_origen </td> <td>  $nombre_ciudad_destino </td> <td>  $horario </td> 
                <td>  $duracion horas </td> <td>  $medio </td> <td>" . $numero_personas . "/" . $capacidad . " personas </td> <td>  $precio </td> </tr>";

                }
              ?>


          </tbody>
      </table>


      </div>
  </div>
</div>

<br>
<br>

<div class="container">

  <div class="card">
      <div class="card-header">
        A continuación se mostrarán los <b>números de los asientos ocupados</b> del viaje para la fecha  <b> <?php echo "$fecha_viaje" ?></b>:
      </div>

      <div class="card-body">


      <table class="table">
          <thead class="thead-dark">
          <tr>
                <th scope="col">Asiento Ocupado</th>
          </tr>
          </thead>
          <tbody>
              <!-- <th scope="row">1</th> -->

              <?php
              foreach ($asientos_ocupados as $asiento) {

                echo "<tr> <td> $asiento </td> </tr>";

                }
              ?>


          </tbody>
      </table>


      </div>
  </div>
</div>

<br>
<br>

<div class="container">

  <div class="card">
      <div class="card-header">
        <h3>Compra del Ticket</h3> <br>
        A continuación se permite comprar un <b>ticket</b> para este viaje con la fecha <b><?php echo "$fecha_viaje" ?></b>.
        Recuerde que debe introducir un número de asiento que <b>NO</b> este usado, de lo contrario no se podrá comprar el ticket.
      </div>

      <div class="card-body">           
                
        <form align="center" action="posible_compra_ticket.php" method="post">
        <br>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">Usuario_id</span>
            </div>
            <input type="text" name="id_usuario" class="form-control"  aria-label="Username" aria-describedby="basic-addon1">
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">Número de asiento</span>
            </div>
            <input type="text" name="numero_de_asiento" class="form-control"  aria-label="Username" aria-describedby="basic-addon1">
        </div>


        <br>

        <input type="submit" class="btn btn-outline-info" value="Comprar Ticket">
        </form>

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