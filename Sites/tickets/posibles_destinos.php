<?php include('../templates/header_2.html');   ?>

<body>

<?php
  require("../config/conexion.php"); #Llama a conexión, crea el objeto PDO y obtiene la variable $db


  $fecha_viaje = $_POST["fecha_viaje"];
  $ciudad_origen = $_POST["ciudad_origen"];
  $ciudad_destino = $_POST["ciudad_destino"];


?>

<br>
<br>

<b> <?php echo "$fecha_viaje " ?></b>
<b> <?php echo "$ciudad_origen " ?></b>
<b> <?php echo "$ciudad_destino " ?></b>












<?php include('../templates/footer.html'); ?>


<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Plugin JavaScript -->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom JavaScript for this theme -->
<script src="js/scrolling-nav.js"></script>