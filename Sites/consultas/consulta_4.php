<?php include('../templates/header.html');   ?>

<body>

  <?php
  require("../config/conexion.php"); #Llama a conexión, crea el objeto PDO y obtiene la variable $db

  $query = "SELECT artistas.nombre_artista, COUNT(*) FROM artistas, artistas_obras 
  WHERE artistas.id_artista = artistas_obras.id_artista GROUP BY artistas.id_artista;";
  $result = $db -> prepare($query);
  $result -> execute();
  $artistas_num_obras = $result -> fetchAll(); #Obtiene todos los resultados de la consulta en forma de un arreglo
  ?>



<div class="container">

  <div class="card">
      <div class="card-header">
          CONSULTA 4) A continuación se mostrarán todos los artistas disponibles en la base de datos, con la cantidad de obras pertenecientes a cada uno.
      </div>

      <div class="card-body">
      <h5 class="card-title">La consulta pedida es la siguiente:</h5>

      <table class="table">
          <thead class="thead-dark">
          <tr>
              <th scope="col">Artistas</th>
              <th scope="col">Número de obras</th>
          </tr>
          </thead>
          <tbody>
              <!-- <th scope="row">1</th> -->

              <?php
              foreach ($artistas_num_obras as $fila) {
                echo "<tr> <td>$fila[0]</td> <td>$fila[1]</td>  </tr>";
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

</body>
