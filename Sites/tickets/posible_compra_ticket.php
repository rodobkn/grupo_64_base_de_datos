<?php session_start();?>
<?php include('../templates/header_2.html');   ?>

<body>

<?php

  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  $id_usuario = $_POST['id_usuario'];
  $numero_de_asiento = $_POST['numero_de_asiento'];


  $array_recibido = $_SESSION['array_2'];

  $id_destino = $array_recibido[0];
  $fecha_de_compra = $array_recibido[1];
  $fecha_de_viaje = $array_recibido[2];
  $asientos_ocupados = $array_recibido[3];  #este es una lista que contiene a los numeros de asientos ocupados

  $query = "SELECT MAX(tid) FROM tickets;";
  $result = $db_impar -> prepare($query);
  $result -> execute();
  $maximo_tid = $result -> fetchAll();

  foreach ($maximo_tid as $id_maximo) {

    $id_del_ticket_nuevo = $id_maximo[0] + 1;

    }


  ?>


<br>
<br>

<?php

    if (in_array($numero_de_asiento, $asientos_ocupados)) {
        include('asiento_repetido.php');
    }  
    else {
        include('asiento_disponible.php');
    }


?>







<?php include('../templates/footer_busqueda_tickets.html'); ?>

<?php include('../templates/footer.html'); ?>

<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Plugin JavaScript -->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom JavaScript for this theme -->
<script src="js/scrolling-nav.js"></script>