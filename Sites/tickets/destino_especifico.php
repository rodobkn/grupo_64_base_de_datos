<?php include('../templates/header_2.html');   ?>

<body>

<?php

  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  $id_destino = $_GET['id_destino'];
  $fecha_viaje = $_GET['fecha_viaje'];
  $nombre_ciudad_origen = $_GET['n_ciudad_origen'];
  $nombre_ciudad_destino = $_GET['n_ciudad_destino'];


  ?>
<br>
<br>

<b> <?php echo "$id_destino " ?></b>
<b> <?php echo "$fecha_viaje " ?></b>
<b> <?php echo "$nombre_ciudad_origen " ?></b>
<b> <?php echo "$nombre_ciudad_destino " ?></b>










<?php include('../templates/footer.html'); ?>

<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Plugin JavaScript -->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom JavaScript for this theme -->
<script src="js/scrolling-nav.js"></script>