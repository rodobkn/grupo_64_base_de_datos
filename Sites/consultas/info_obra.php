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

    $query_3 = "SELECT Lugares.id_lugar, nombre_lugar, ciudad, pais FROM Obras, Lugares_Obras, Lugares, Lugares_ciudades, Ciudades, Ciudades_contacto_paises WHERE 
    Obras.id_obra = Lugares_Obras.id_obra AND Lugares_Obras.id_lugar=Lugares.id_lugar AND Lugares.id_lugar=Lugares_Ciudades.id_lugar AND 
    Lugares_Ciudades.id_ciudad = Ciudades.id_ciudad AND Ciudades.id_ciudad=Ciudades_contacto_paises.id_ciudad AND Obras.id_obra=$id_obra;";
	$result_3 = $db_par -> prepare($query_3);
	$result_3 -> execute();
    $caracteristicas_lugar = $result_3 -> fetchAll();

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

<br>
<br>

<div class="container">

  <div class="card">
      <div class="card-header">
          A continuación se mostrará el <b>lugar</b> en donde se encuentra la obra <b> <?php echo "$nombre_obra" ?> </b>:
      </div>

      <div class="card-body">


      <table class="table">
          <thead class="thead-dark">
          <tr>
              <th scope="col">Nombre del Lugar</th>
              <th scope="col">Ciudad</th>
              <th scope="col">País</th>

          </tr>
          </thead>
          <tbody>
              <!-- <th scope="row">1</th> -->

              <?php
              foreach ($caracteristicas_lugar as $caracteristica_lugar) {
                
                $variable_id = $caracteristica_lugar[0];
                $variable_nombre_lugar = $caracteristica_lugar[1];
                $variable_ciudad = $caracteristica_lugar[2];
                $variable_pais = $caracteristica_lugar[3];

                echo "<tr> <td> <a href='info_lugar.php?nombre_lugar=$variable_nombre_lugar&id_lugar=$variable_id'> $variable_nombre_lugar </a> </td> <td>$variable_ciudad</td> <td>$variable_pais</td> </tr>";


                }
              ?>


          </tbody>
      </table>


      </div>
  </div>
</div>



<br>
<br>
<form align="center" action="../login_felipe/home.php" method="get">

    <input type="submit" class="btn btn-outline-info" value="Volver a home">
</form>
<br>
<br>
</body>


<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Plugin JavaScript -->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom JavaScript for this theme -->
<script src="js/scrolling-nav.js"></script>

