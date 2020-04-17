<?php include('../templates/header.html');   ?>

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
  $result = $db -> prepare($query);
  $result -> execute();
  $lugares = $result -> fetchAll(); #Obtiene todos los resultados de la consulta en forma de un arreglo
  ?>

  <table>
    <tr>
      <th>Lugares</th>
    </tr>
  <?php
  foreach ($lugares as $lugar) {
    echo "<tr> <td>$lugar[0]</td>  </tr>";
  }
  ?>
  </table>



<div class="container">

  <div class="card">
      <div class="card-header">
          CONSULTA 6) A continuación se el/los nombre/s de los lugares que contienen obras de arte de todos los periodos existentes en la base de datos.   
      </div>

      <div class="card-body">
      <h5 class="card-title">La consulta pedida es la siguiente:</h5>

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