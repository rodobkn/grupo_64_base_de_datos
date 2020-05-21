<?php include('../templates/header_2.html');   ?>

<body>

<?php

    $nombre_lugar = $_GET['nombre_lugar'];
    $id_lugar = $_GET['id_lugar'];

  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

    $numero_tuplas_museos = 0;
    $numero_tuplas_iglesias = 0;
    $numero_tuplas_plazas = 0;

    $tipo_del_lugar = "no se sabe aun";


 	$query = "SELECT Museos.* FROM Lugares, Museos WHERE Lugares.id_lugar=Museos.id_lugar AND Lugares.id_lugar=$id_lugar;";
	$result = $db_par -> prepare($query);
	$result -> execute();
    $caracteristicas_museo = $result -> fetchAll();

    $query_2 = "SELECT Iglesias.* FROM Lugares, Iglesias WHERE Lugares.id_lugar=Iglesias.id_lugar AND Lugares.id_lugar=$id_lugar;";
    $result_2 = $db_par -> prepare($query_2);
    $result_2 -> execute();
    $caracteristicas_iglesia = $result_2 -> fetchAll();

    $query_3 = "SELECT Plazas.* FROM Lugares, Plazas WHERE Lugares.id_lugar=Plazas.id_lugar AND Lugares.id_lugar=$id_lugar;";
	$result_3 = $db_par -> prepare($query_3);
	$result_3 -> execute();
    $caracteristicas_plazas = $result_3 -> fetchAll();

    foreach ($caracteristicas_museo as $caracteristica) {

        $numero_tuplas_museos = $numero_tuplas_museos + 1;
        }

    foreach ($caracteristicas_iglesia as $caracteristica) {

        $numero_tuplas_iglesias = $numero_tuplas_iglesias + 1;
        }

    foreach ($caracteristicas_plazas as $caracteristica) {

        $numero_tuplas_plazas = $numero_tuplas_plazas + 1;
        }


  ?>


<?php

    if ($numero_tuplas_museos == 1) {
        $tipo_del_lugar="Museo";
        include('info_museo.php');
    } elseif ($numero_tuplas_iglesias == 1) {
        $tipo_del_lugar="Iglesia";
        include('info_iglesia.php');
    } else {
        $tipo_del_lugar="Plaza";
        include('info_plaza.php');
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