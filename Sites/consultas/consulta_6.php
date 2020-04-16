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

<?php include('../templates/footer.html'); ?>