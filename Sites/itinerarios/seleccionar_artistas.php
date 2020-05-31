<?php include('../templates/header_2.html');   ?>

<body>

<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

    
    $query = "SELECT nombre_artista FROM Artistas;";
	$result = $db_par -> prepare($query);
	$result -> execute();
	$artistas = $result -> fetchAll();


  ?>
<br>
<br>


<form align="center" action="artistas_seleccionados_y_form.php" method="post">

    <p>Selecciona la cantidad de artistas que quieras:</p>



    <?php
    foreach ($artistas as $artista) {
        $variable = $artista[0];

        echo "<input type='checkbox' value='$variable' name='artistas[]'> $variable <br/>";
    }
    ?>

    <input type="submit" class="btn btn-outline-dark" value="Continuar">

</form>



<?php include('../templates/footer.html'); ?>



<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Plugin JavaScript -->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom JavaScript for this theme -->
<script src="js/scrolling-nav.js"></script>