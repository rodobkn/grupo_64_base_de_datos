<?php session_start();?>
<?php include('../templates/header_2.html');   ?>

<body>

<?php

  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  $columnas_totales = array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35);
  $columnas_verdaderas = 0;

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

<?php

$query = "SELECT * FROM Itinarios('Roma', '{1,2,3}');";
$result = $db_par -> prepare($query);
$result -> execute();
$lista_itinerario = $result -> fetchAll();

foreach ($lista_itinerario as $itinerario) {

    $info_itinerario = $itinerario;

    $numero_columnas_itinerario = count($info_itinerario);

    foreach ($columnas_totales as $numero) {

        $info_especifica = $info_itinerario[$numero];

        if (isset($info_especifica)) {
            echo "$info_especifica";
            $columnas_verdaderas = $columnas_verdaderas + 1;
        }
        else{
            echo "N";
        }
    
        }
    
    echo "<br>";

    break;


    }

echo "$numero_columnas_itinerario <br>";
echo "$columnas_verdaderas <br>";

?>







<?php include('../templates/footer.html'); ?>



<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Plugin JavaScript -->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom JavaScript for this theme -->
<script src="js/scrolling-nav.js"></script>