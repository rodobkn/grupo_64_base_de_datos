<?php include('../../templates/header_2.html');   ?>

<body>

<?php

session_start();

    $id_usuario = $_POST['id_usuario'];
    $fecha_1 = $_POST['fecha_1'];
    $fecha_2 = $_POST['fecha_2'];


    $array_recibido = $_SESSION['array'];
    $id_hotel = $array_recibido[0];
    $id_reserva = $array_recibido[1];


  ?>

<br>
<br>

<b> <?php echo "$id_usuario " ?></b>
<b> <?php echo "$fecha_1 " ?></b>
<b> <?php echo "$fecha_2 " ?></b>
<b> <?php echo "$id_hotel " ?></b>
<b> <?php echo "$id_reserva " ?></b>


<?php include('../../templates/footer.html'); ?>


<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Plugin JavaScript -->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom JavaScript for this theme -->
<script src="js/scrolling-nav.js"></script>