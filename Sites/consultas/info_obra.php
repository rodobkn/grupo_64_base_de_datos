<?php include('../templates/header_2.html');   ?>

<body>

<?php

    $nombre_obra = $_GET['nombre_obra'];
    $id_obra = $_GET['id'];

  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");


 	$query = "select nombre_obra, periodo, fecha_1, fecha_2 FROM Obras Where id_obra=$id_obra;";
	$result = $db_par -> prepare($query);
	$result -> execute();
    $caracteristicas_obra = $result -> fetchAll();
    


    $query_2 = "SELECT nombre_artista FROM Artistas, Artistas_Obras, Obras 
    WHERE Artistas.id_artista=Artistas_Obras.id_artista AND Artistas_Obras.id_obra=Obras.id_obra AND Artistas_Obras.id_obra=$id_obra;";
    $result_2 = $db_par -> prepare($query_2);
    $result_2 -> execute();
    $artistas_creadores_de_la_obra = $result_2 -> fetchAll();


  ?>


<br>
<br>


<div class="container">

  <div class="card">
      <div class="card-header">
          A continuación se mostrará informacion de la obra <b> <?php echo "$nombre_obra" ?> </b>:
      </div>

      <div class="card-body">


      <table class="table">
          <thead class="thead-dark">
          <tr>
              <th scope="col">Nombre de la obra</th>
              <th scope="col">Periodo</th>
              <th scope="col">Fecha de inicio</th>
              <th scope="col">Fecha de culminación</th>
          </tr>
          </thead>
          <tbody>
              <!-- <th scope="row">1</th> -->

              <?php
              foreach ($caracteristicas_obra as $caracteristica) {
                echo "<tr> <td>$caracteristica[0]</td> <td>$caracteristica[1]</td> <td>$caracteristica[2]</td> <td>$caracteristica[3]</td></tr>";
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
          A continuación se mostrarán los/las/el/la artista/s creador/creadores de la obra <b> <?php echo "$nombre_obra" ?> </b>:
      </div>

      <div class="card-body">


      <table class="table">
          <thead class="thead-dark">
          <tr>
              <th scope="col">Nombre del Artista</th>

          </tr>
          </thead>
          <tbody>
              <!-- <th scope="row">1</th> -->

              <?php
              foreach ($artistas_creadores_de_la_obra as $artista) {
                
                $variable_nombre = $artista[0];

                echo "<tr> <td> <a href='info_artista.php?nombre=$variable_nombre'> $variable_nombre </a> </td> </tr>";

                }
              ?>


          </tbody>
      </table>


      </div>
  </div>
</div>



<?php include('../templates/footer.html'); ?>

<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Plugin JavaScript -->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom JavaScript for this theme -->
<script src="js/scrolling-nav.js"></script>

