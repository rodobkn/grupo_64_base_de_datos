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

  <table>
    <tr>
      <th>Artistas</th>
      <th>Número de obras</th>
    </tr>
  <?php
  foreach ($artistas_num_obras as $fila) {
    echo "<tr> <td>$fila[0]</td> <td>$fila[1]</td>  </tr>";
  }
  ?>
  </table>

<?php include('../templates/footer.html'); ?>
