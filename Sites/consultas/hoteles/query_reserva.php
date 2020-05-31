<?php session_start();?>
<?php include('../../templates/header_3.html');   ?>

<body>

<?php

    $fecha_1 = $_POST['fecha_1'];
    $fecha_2 = $_POST['fecha_2'];

    $user_id = $_SESSION['uid'];

    $array_recibido = $_SESSION['array'];
    $id_hotel = $array_recibido[0];
    $id_reserva = $array_recibido[1];

  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../../config/conexion.php");


 	$query = "INSERT INTO reservas VALUES($id_reserva, '$fecha_1', '$fecha_2', $user_id, $id_hotel);";
	$result = $db_impar -> prepare($query);
	$result -> execute();

  ?>

<br>
<br>


<div class="container">
    <div class="card">
        <div class="card-header">
            Reserva exitosa!
        </div>
    </div>
</div>



<?php include('../../templates/footer_2.html'); ?>


<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Plugin JavaScript -->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom JavaScript for this theme -->
<script src="js/scrolling-nav.js"></script>