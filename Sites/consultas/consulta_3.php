<?php include('../templates/header.html');   ?>

<body>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  #Se obtiene el valor del input del usuario
  $pais = $_POST["pais"];


  #Se construye la consulta como un string
 	$query = "SELECT DISTINCT nombre_lugar FROM Ciudades_contacto_paises, Lugares_ciudades, Lugares, Museos, Lugares_Obras, Obras 
   WHERE Ciudades_contacto_paises.id_ciudad = Lugares_ciudades.id_ciudad AND LOWER(Ciudades_contacto_paises.pais) = LOWER('$pais') 
   AND Lugares_ciudades.id_lugar = Lugares.id_lugar 
   AND Lugares.id_lugar = Museos.id_lugar 
   AND Museos.id_lugar = Lugares_Obras.id_lugar 
   AND Lugares_Obras.id_obra = Obras.id_obra AND LOWER(Obras.periodo) = 'renacimiento';
   ";

  #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
	$result = $db -> prepare($query);
	$result -> execute();
	$lista_museos = $result -> fetchAll();
  ?>

  <table>
    <tr>
      <th>Museos</th>
    </tr>
  
      <?php
        foreach ($lista_museos as $museo) {
          echo "<tr> <td>$museo[0]</td> </tr>";
      }
      ?>
      
  </table>

<?php include('../templates/footer.html'); ?>
