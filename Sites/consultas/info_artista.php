<?php include('../templates/header_2.html');   ?>

<body>

<?php

    $nombre_artista = $_GET['nombre'];

  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");


 	$query = "SELECT * FROM Artistas WHERE nombre_artista='$nombre_artista';";
	$result = $db_par -> prepare($query);
	$result -> execute();
    $caracteristicas_artista = $result -> fetchAll();
    


    $query_2 = "SELECT Obras.id_obra, Obras.nombre_obra FROM Artistas, Artistas_Obras, Obras WHERE Artistas.id_artista = Artistas_Obras.id_artista 
    AND Artistas_Obras.id_obra=Obras.id_obra AND Artistas.nombre_artista ='$nombre_artista';";
    $result_2 = $db_par -> prepare($query_2);
    $result_2 -> execute();
    $obras_artista = $result_2 -> fetchAll();

    $numero_tuplas = 0;



  ?>


<br>
<br>


<div class="container">

  <div class="card">
      <div class="card-header">
          A continuación se mostrará informacion del artista <b> <?php echo "$nombre_artista" ?> </b>:
      </div>

      <div class="card-body">


      <table class="table">
          <thead class="thead-dark">
          <tr>
              <th scope="col">Descripción</th>
              <th scope="col">Fecha nacimiento</th>
              <th scope="col">Fecha fallecimiento</th>
          </tr>
          </thead>
          <tbody>
              <!-- <th scope="row">1</th> -->

              <?php
              foreach ($caracteristicas_artista as $caracteristica) {
                echo "<tr> <td>$caracteristica[2]</td> <td>$caracteristica[3]</td> <td>$caracteristica[4]</td></tr>";
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
          A continuación se mostrarán todas las <b>obras</b> de <b> <?php echo "$nombre_artista" ?> </b>: 

      </div>

      <div class="card-body">


      <table class="table">
          <thead class="thead-dark">
          <tr>
              <th scope="col">Nombre de la Obra</th>

          </tr>
          </thead>
          <tbody>
              <!-- <th scope="row">1</th> -->

              <?php
              foreach ($obras_artista as $obra) {

                $numero_tuplas = $numero_tuplas + 1;
                $variable_id = $obra[0];
                $variable_nombre = $obra[1];

                echo "<tr> <td> <a href='info_obra.php?nombre_obra=$variable_nombre&id=$variable_id'> $variable_nombre </a> </td> </tr>";

                }
              ?>


          </tbody>
      </table>


      </div>
  </div>
</div>

<p>Tiene <b><?php echo "$numero_tuplas" ?></b> de obras.</p>







<?php include('../templates/footer_tabla_artistas.html'); ?>

<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Plugin JavaScript -->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom JavaScript for this theme -->
<script src="js/scrolling-nav.js"></script>