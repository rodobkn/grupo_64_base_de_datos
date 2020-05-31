<?php include('../templates/header_2.html');   ?>

<body>

<?php


  require("../config/conexion.php"); #Llama a conexión, crea el objeto PDO y obtiene la variable $db


  $fecha_viaje = $_POST["fecha_viaje"];
  $ciudad_origen_id = $_POST["ciudad_origen"];
  $ciudad_destino_id = $_POST["ciudad_destino"];

  $query = "SELECT did, cidorigen, ciddestino, horario, duracion, medio, capacidad, dprecio FROM destinos 
  WHERE cidorigen=$ciudad_origen_id AND ciddestino=$ciudad_destino_id;";
  $result = $db_impar -> prepare($query);
  $result -> execute();
  $lista_de_destinos = $result -> fetchAll();

  $query_2 = "SELECT cnombre FROM ciudades WHERE cid=$ciudad_origen_id;";
  $result_2 = $db_impar -> prepare($query_2);
  $result_2 -> execute();
  $lista_nombre_ciudad_origen = $result_2 -> fetchAll();

  $query_3 = "SELECT cnombre FROM ciudades WHERE cid=$ciudad_destino_id;";
  $result_3 = $db_impar -> prepare($query_3);
  $result_3 -> execute();
  $lista_nombre_ciudad_destino = $result_3 -> fetchAll();


  foreach ($lista_nombre_ciudad_origen as $ciudad) {

    $nombre_ciudad_origen = $ciudad[0];

    }

    foreach ($lista_nombre_ciudad_destino as $ciudad) {

        $nombre_ciudad_destino = $ciudad[0];

    }

    $numero_de_destinos = count($lista_de_destinos);




?>

<br>
<br>

<?php

    if ($numero_de_destinos == 0) {
        include('no_hay_posibles_destinos.php');
    }  
    else {
        include('hay_posibles_destinos.php');
    }


?>



<?php include('../templates/footer_busqueda_tickets.html'); ?>

<br>
<br>
<form align="center" action="../login_felipe/home.php" method="get">

    <input type="submit" class="btn btn-outline-info" value="Volver a home">
</form>
<br>
<br>
</body>

</html>

<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Plugin JavaScript -->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom JavaScript for this theme -->
<script src="js/scrolling-nav.js"></script>