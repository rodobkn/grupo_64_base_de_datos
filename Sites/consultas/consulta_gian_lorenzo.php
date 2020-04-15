<?php include('../templates/header.html');   ?>

<body>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

 

 	$query = "SELECT nombre_lugar 
            FROM Plazas, Lugares, Lugares_Obras, Obras, Esculturas, Artistas_Obras, Artistas 
            WHERE Plazas.id_lugar = Lugares.id_lugar 
            AND Lugares.id_lugar = Lugares_Obras.id_lugar 
            AND Lugares_Obras.id_obra = Obras.id_obra 
            AND Obras.id_obra = Esculturas.id_obra 
            AND Obras.id_obra = Artistas_Obras.id_obra 
            AND Artistas_Obras.id_artista = Artistas.id_artista 
            AND Artistas.nombre_artista = 'Gian Lorenzo Bernini';";
	$result = $db -> prepare($query);
	$result -> execute();
	$nombres_plazas = $result -> fetchAll();
  ?>

	<table>
    <tr>
      <th>Nombres de la plaza</th>
    </tr>
  <?php
	foreach ($nombres_plazas as $plaza) {
  		echo "<tr> <td>$plaza[0]</td> </tr>";
	}
  ?>
	</table>

<?php include('../templates/footer.html'); ?>
