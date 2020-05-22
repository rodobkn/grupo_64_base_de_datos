<?php include('../../templates/header_2.html');   ?>

<body>

<?php


  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../../config/conexion.php");


 	$query = "SELECT hid, hnombre, hprecio, cnombre FROM hoteles JOIN ciudades ON hoteles.cid=ciudades.cid;";
	$result = $db_impar -> prepare($query);
    $result -> execute();
    $informacion_hoteles = $result -> fetchAll();
    

  ?>


<br>
<br>


<div class="container">

  <div class="card">
      <div class="card-header">
          A continuación se mostrarán todos los hoteles que tenemos disponibles. Si quiere hacer una <b>reserva</b> o simplemente más información
          acerca de un hotel, haga <b>click</b> sobre este:
      </div>

      <div class="card-body">


      <table class="table">
          <thead class="thead-dark">
          <tr>
              <th scope="col">Nombre del hotel</th>
              <th scope="col">Ciudad del hotel</th>
              <th scope="col">Precio por noche</th>
          </tr>
          </thead>
          <tbody>
              <!-- <th scope="row">1</th> -->

              <?php
              foreach ($informacion_hoteles as $informacion) {

                $variable_hotel_id = $informacion[0];
                $variable_hotel_nombre = $informacion[1];
                $variable_hotel_precio = $informacion[2];
                $variable_hotel_ciudad = $informacion[3];


                echo "<tr> <td> <a href='hotel_especifico.php?nombre_hotel=$variable_hotel_nombre&id=$variable_hotel_id&ciudad=$variable_hotel_ciudad'> $variable_hotel_nombre </a> </td>
                <td>  $variable_hotel_ciudad </td> <td>  $variable_hotel_precio </td> </tr>";

                }
              ?>


          </tbody>
      </table>


      </div>
  </div>
</div>

<?php include('../../templates/footer.html'); ?>


<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Plugin JavaScript -->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom JavaScript for this theme -->
<script src="js/scrolling-nav.js"></script>
