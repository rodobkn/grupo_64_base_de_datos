<?php include('../templates/header.html');   ?>

<body>

<?php
  require("../config/conexion.php"); #Llama a conexión, crea el objeto PDO y obtiene la variable $db


  $ciudad = $_POST["ciudad"];
  $hora_1 = $_POST["horario_1"];
  $hora_2 = $_POST["horario_2"];

  $query = "SELECT nombre_lugar, nombre_obra FROM Iglesias, Lugares, Lugares_ciudades, Ciudades, Lugares_Obras, Frescos, Obras 
  WHERE Lugares.id_lugar = Iglesias.id_lugar AND hora_apertura >= '$hora_1' AND hora_cierre <= '$hora_2' 
  AND Iglesias.id_lugar = Lugares_ciudades.id_lugar 
  AND Lugares_ciudades.id_ciudad = Ciudades.id_ciudad AND Ciudades.ciudad = '$ciudad' 
  AND Iglesias.id_lugar = Lugares_Obras.id_lugar
   AND Lugares_Obras.id_obra = Frescos.id_obra 
  AND Frescos.id_obra = Obras.id_obra
   GROUP BY nombre_lugar,nombre_obra;
  ";
  $result = $db -> prepare($query);
  $result -> execute();
  $iglesia_fresco = $result -> fetchAll(); #Obtiene todos los resultados de la consulta en forma de un arreglo

?>

<table>
    <tr>
      <th>Nombre de la Iglesia</th>
      <th>Fresco asociado</th>
    </tr>
  
      <?php
        foreach ($iglesia_fresco as $fila) {
          echo "<tr> <td>$fila[0]</td> <td>$fila[1]</td> <td>$fila[2]</td></tr>";
      }
      ?>
      
  </table>

  <?php include('../templates/footer.html'); ?>