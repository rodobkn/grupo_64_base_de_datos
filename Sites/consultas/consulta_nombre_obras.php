<?php include('../templates/header.html');   ?>

<body>

<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");


 	$query = "SELECT DISTINCT lower(nombre_obra) FROM Obras;";
	$result = $db -> prepare($query);
	$result -> execute();
	$obras = $result -> fetchAll();
  ?>

	<table>
    <tr>
      <th>Nombres obras de arte.</th>
    </tr>
  <?php
	foreach ($obras as $obra) {
  		echo "<tr> <td>$obra[0]</td> </tr>";
	}
  ?>
	</table>

<?php include('../templates/footer.html'); ?>
