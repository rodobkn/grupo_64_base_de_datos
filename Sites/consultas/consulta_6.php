<?php include('../templates/header_2.html');   ?>

<body>

  <?php
  require("../config/conexion.php"); #Llama a conexión, crea el objeto PDO y obtiene la variable $db

  $query = "SELECT nombre_lugar FROM
  (SELECT nombre_lugar, COUNT(DISTINCT periodo) AS NbPeriodos FROM Lugares, Lugares_Obras, Obras
    WHERE Lugares.id_lugar = Lugares_Obras.id_lugar
    AND Lugares_Obras.id_obra = Obras.id_obra
    GROUP BY Lugares.id_lugar) AS Periodos
    WHERE Periodos.nbperiodos = (SELECT COUNT (DISTINCT periodo) FROM Obras);
    ";
  $result = $db_par -> prepare($query);
  $result -> execute();
  $lugares = $result -> fetchAll(); #Obtiene todos los resultados de la consulta en forma de un arreglo
  ?>


<br>
<br>

<div class="container">

  <div class="card">
      <div class="card-header">
          CONSULTA 6) A continuación se el/los nombre/s de los lugares que contienen obras de arte de todos los periodos existentes en la base de datos.   
      </div>

      <div class="card-body">


      <table class="table">
          <thead class="thead-dark">
          <tr>
              <th scope="col">Lugares</th>
          </tr>
          </thead>
          <tbody>
              <!-- <th scope="row">1</th> -->

              <?php
              foreach ($lugares as $lugar) {
                echo "<tr> <td>$lugar[0]</td>  </tr>";
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
