<?php session_start();?>
<?php include('../templates/header_2.html');   ?>

<body>

<?php

  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  $fecha_viaje = $_POST["fecha_viaje"];
  $ciudad_origen_nombre = $_POST["ciudad_origen"];

  $array_id_artistas = $_SESSION['array_3'];
  $array_nombre_artistas = $_SESSION['array_4'];


  ?>

<br>
<br>

<b> <?php echo "$fecha_viaje" ?></b> <br>
<b> <?php echo "$ciudad_origen_nombre" ?></b> <br>

<?php

foreach ($array_nombre_artistas as $nombre_artista) {

    echo "$nombre_artista <br>";

    }


?>

<br>
<br>

<?php

foreach ($array_id_artistas as $id_artista) {

    echo "$id_artista <br>";

    }


?>








<?php include('../templates/footer.html'); ?>



<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Plugin JavaScript -->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom JavaScript for this theme -->
<script src="js/scrolling-nav.js"></script>