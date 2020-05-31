<?php session_start();?>
<?php include('../../templates/header_3.html');   ?>

<body>

<?php

    $nombre_hotel = $_GET['nombre_hotel'];
    $id_hotel = $_GET['id'];
    $ciudad_hotel = $_GET['ciudad'];

  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../../config/conexion.php");


 	$query = "SELECT * FROM hoteles WHERE hid=$id_hotel;";
	$result = $db_impar -> prepare($query);
	$result -> execute();
    $info_del_hotel = $result -> fetchAll();
    


  $query_2 = "SELECT MAX(rid) FROM reservas;";
  $result_2 = $db_impar -> prepare($query_2);
  $result_2 -> execute();
  $reserva_id_maximo = $result_2 -> fetchAll();

  $id_reserva = 0;

  foreach ($reserva_id_maximo as $id_maximo) {

    $id_reserva = $id_maximo[0] + 1;

    }

    $array_a_mandar = array($id_hotel, $id_reserva);

    $_SESSION['array'] = $array_a_mandar;


  ?>

<br>
<br>


<div class="container">

  <div class="card">
      <div class="card-header">
          A continuación se mostrará toda la <b>información</b> del hotel llamado <b> <?php echo "$nombre_hotel" ?></b>,
           que está ubicado en la ciudad <?php echo "$ciudad_hotel" ?> </b>:
      </div>

      <div class="card-body">


      <table class="table">
          <thead class="thead-dark">
          <tr>
              <th scope="col">Nombre Hotel</th>
              <th scope="col">Dirección Hotel</th>
              <th scope="col">Teléfono Hotel</th>
              <th scope="col">Precio por noche</th>
          </tr>
          </thead>
          <tbody>
              <!-- <th scope="row">1</th> -->

              <?php
              foreach ($info_del_hotel as $info) {
                echo "<tr> <td>$info[1]</td> <td>$info[2]</td> <td>$info[3]</td> <td>$info[4]</td> </tr>";
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
        <h3>A continuación se permite hacer una <b>reserva</b> en el <b><?php echo "$nombre_hotel" ?></b></h3>
      </div>

      <div class="card-body">           
                
        <form align="center" action="query_reserva.php" method="post">
        <br>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">Usuario_id</span>
            </div>
            <input type="text" name="id_usuario" class="form-control"  aria-label="Username" aria-describedby="basic-addon1" required>
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">Fecha de inicio de la reserva</span>
            </div>
            <input type="text" name="fecha_1" class="form-control"  aria-label="Username" aria-describedby="basic-addon1" required>
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">Fecha de termino de la reserva</span>
            </div>
            <input type="text" name="fecha_2" class="form-control"  aria-label="Username" aria-describedby="basic-addon1" required>
        </div>

        <br>

        <input type="submit" class="btn btn-outline-info" value="Reservar">
        </form>

        </div>
  </div>
</div>




<?php include('../../templates/footer_tabla_hoteles.html'); ?>

<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Plugin JavaScript -->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom JavaScript for this theme -->
<script src="js/scrolling-nav.js"></script>