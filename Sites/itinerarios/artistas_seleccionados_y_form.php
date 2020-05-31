<?php include('../templates/header_2.html');   ?>

<body>

<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

    
    #$query = "SELECT nombre_artista FROM Artistas;";
	#$result = $db_par -> prepare($query);
	#$result -> execute();
	#$artistas = $result -> fetchAll();


  ?>
<br>
<br>

<?php 

if (isset($_POST['artistas'])) {

    $artistas = $_POST['artistas'];
    include('hay_artistas_seleccionados.php');
}
else{
    include('no_hay_artista_seleccionado.php');
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