<?php include('../templates/header_2.html');   ?>

<body>

<?php

    $nombre_artista = $_GET['nombre'];

  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");


 	$query = "SELECT * FROM Artistas WHERE nombre_artista=$nombre_artista;";
	$result = $db_par -> prepare($query);
	$result -> execute();
	$caracteristicas_artista = $result -> fetchAll();
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










<?php include('../templates/footer.html'); ?>

<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Plugin JavaScript -->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom JavaScript for this theme -->
<script src="js/scrolling-nav.js"></script>