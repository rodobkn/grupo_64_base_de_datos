<?php session_start();?>
<?php include('../templates/header_2.html');   ?>

<body>

<?php

    $id_lugar = $_POST['id_lugar'];

    $user_id = $_SESSION['uid'];

    $fecha_de_compra = date('Y-m-d H:i:s');

  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  $query_2 = "SELECT MAX(eid) FROM entregas_museo;";
  $result_2 = $db_impar -> prepare($query_2);
  $result_2 -> execute();
  $entrega_id_maximo = $result_2 -> fetchAll();

  $id_entrega = 0;

  foreach ($entrega_id_maximo as $id_maximo) {

    $id_entrega = $id_maximo[0] + 1;

    }


 	$query = "INSERT INTO entregas_museo VALUES($id_entrega, $user_id, $id_lugar, '$fecha_de_compra');";
	$result = $db_impar -> prepare($query);
	$result -> execute();

  ?>

<br>
<br>

<b> <?php echo "$id_entrega" ?> </b>
<b> <?php echo "$user_id" ?> </b>
<b> <?php echo "$id_lugar" ?> </b>
<b> <?php echo "$fecha_de_compra" ?> </b>











<?php include('../templates/footer.html'); ?>

<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Plugin JavaScript -->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom JavaScript for this theme -->
<script src="js/scrolling-nav.js"></script>