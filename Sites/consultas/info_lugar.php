<?php include('../templates/header_2.html');   ?>

<body>

<?php

    $nombre_lugar = $_GET['nombre_lugar'];
    $id_lugar = $_GET['id_lugar'];

  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

    $numero_tuplas_museos = 0;
    $numero_tuplas_iglesias = 0;
    $numero_tuplas_plazas = 0;

    $tipo_del_lugar = "no se sabe aun";


 	$query = "SELECT Museos.* FROM Lugares, Museos WHERE Lugares.id_lugar=Museos.id_lugar AND Lugares.id_lugar=$id_lugar;";
	$result = $db_par -> prepare($query);
	$result -> execute();
    $caracteristicas_museo = $result -> fetchAll();

    $query_2 = "SELECT Iglesias.* FROM Lugares, Iglesias WHERE Lugares.id_lugar=Iglesias.id_lugar AND Lugares.id_lugar=$id_lugar;";
    $result_2 = $db_par -> prepare($query_2);
    $result_2 -> execute();
    $caracteristicas_iglesia = $result_2 -> fetchAll();

    $query_3 = "SELECT Plazas.* FROM Lugares, Plazas WHERE Lugares.id_lugar=Plazas.id_lugar AND Lugares.id_lugar=$id_lugar;";
	$result_3 = $db_par -> prepare($query_3);
	$result_3 -> execute();
    $caracteristicas_plazas = $result_3 -> fetchAll();


    $query_4 = " SELECT ciudad, Ciudades_contacto_paises.pais FROM Lugares, Lugares_ciudades, Ciudades, Ciudades_contacto_paises 
    WHERE Lugares.id_lugar=Lugares_ciudades.id_lugar AND Lugares_ciudades.id_ciudad = Ciudades.id_ciudad 
    AND Ciudades.id_ciudad = Ciudades_contacto_paises.id_ciudad AND Lugares.id_lugar=$id_lugar;";

	$result_4 = $db_par -> prepare($query_4);
	$result_4 -> execute();
    $ciudad_y_pais_del_lugar = $result_4 -> fetchAll();

    $query_5 = "SELECT Obras.id_obra, nombre_obra, fecha_1, fecha_2, nombre_artista FROM Lugares_Obras, Obras, Artistas_Obras, Artistas 
    WHERE Lugares_Obras.id_obra = Obras.id_obra AND Obras.id_obra=Artistas_Obras.id_obra AND Artistas_Obras.id_artista=Artistas.id_artista
    AND id_lugar=$id_lugar;";
	$result_5 = $db_par -> prepare($query_5);
	$result_5 -> execute();
    $obras_del_lugar = $result_5 -> fetchAll();

    $query_6 = "SELECT DISTINCT nombre_artista FROM Lugares_Obras, Obras, Artistas_Obras, Artistas WHERE Lugares_Obras.id_obra = Obras.id_obra 
    AND Obras.id_obra=Artistas_Obras.id_obra AND Artistas_Obras.id_artista=Artistas.id_artista AND id_lugar=$id_lugar;";
	$result_6 = $db_par -> prepare($query_6);
	$result_6 -> execute();
    $artistas_del_lugar = $result_6 -> fetchAll();



    foreach ($caracteristicas_museo as $caracteristica) {

        $numero_tuplas_museos = $numero_tuplas_museos + 1;
        }

    foreach ($caracteristicas_iglesia as $caracteristica) {

        $numero_tuplas_iglesias = $numero_tuplas_iglesias + 1;
        }

    foreach ($caracteristicas_plazas as $caracteristica) {

        $numero_tuplas_plazas = $numero_tuplas_plazas + 1;
        }


  ?>

<br>
<br>

<?php

    if ($numero_tuplas_museos == 1) {
        $tipo_del_lugar="Museo";
        include('info_museo.php');
    } elseif ($numero_tuplas_iglesias == 1) {
        $tipo_del_lugar="Iglesia";
        include('info_iglesia.php');
    } else {
        $tipo_del_lugar="Plaza";
        include('info_plaza.php');
    }


?>

<br>
<br>

<div class="container">

  <div class="card">
      <div class="card-header">
          A continuación se mostrará la <b>ciudad</b> y <b>país</b> donde se encuentra <b> <?php echo "$nombre_lugar" ?> </b>:
      </div>

      <div class="card-body">


      <table class="table">
          <thead class="thead-dark">
          <tr>
              <th scope="col">Ciudad</th>
              <th scope="col">País</th>

          </tr>
          </thead>
          <tbody>
              <!-- <th scope="row">1</th> -->

              <?php
              foreach ($ciudad_y_pais_del_lugar as $informacion) {
                echo "<tr> <td>$informacion[0]</td> <td>$informacion[1]</td> </tr>";
                }
              ?>


          </tbody>
      </table>


      </div>
  </div>
</div>


<br>
<br>

<div class="container">

  <div class="card">
      <div class="card-header">
          A continuación se mostrarán todas las <b>obras</b>, que están a su disposición en el lugar <b> <?php echo "$nombre_lugar" ?> </b>:
      </div>

      <div class="card-body">


      <table class="table">
          <thead class="thead-dark">
          <tr>
              <th scope="col">Nombre de la obra</th>
              <th scope="col">Fecha de inicio de la obra</th>
              <th scope="col">Fecha de culminación de la obra</th>

          </tr>
          </thead>
          <tbody>
              <!-- <th scope="row">1</th> -->

              <?php
              foreach ($obras_del_lugar as $informacion) {

                $variable_id_obra = $informacion[0];
                $variable_nombre_obra = $informacion[1];
                $variable_fecha_inicio = $informacion[2];
                $variable_fecha_culminacion = $informacion[3];


                echo "<tr> <td> <a href='info_obra.php?nombre_obra=$variable_nombre_obra&id=$variable_id_obra'> $variable_nombre_obra </a> </td> 
                <td>$variable_fecha_inicio</td> <td>$variable_fecha_culminacion</td> </tr>";

                }
              ?>


          </tbody>
      </table>


      </div>
  </div>
</div>

<br>
<br>

<div class="container">

  <div class="card">
      <div class="card-header">
          A continuación se mostrará los nombres de los <b>artistas</b>, que tienen obras almacenadas en <b> <?php echo "$nombre_lugar" ?> </b>:
      </div>

      <div class="card-body">


      <table class="table">
          <thead class="thead-dark">
          <tr>
              <th scope="col">Nombre del Artista</th>

          </tr>
          </thead>
          <tbody>
              <!-- <th scope="row">1</th> -->

              <?php
              foreach ($artistas_del_lugar as $artista) {
                $variable_nombre_artista = $artista[0]

                echo "<tr> <td> <a href='info_artista.php?nombre=$variable_nombre_artista'> $variable_nombre_artista </a> </td> </tr>";

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