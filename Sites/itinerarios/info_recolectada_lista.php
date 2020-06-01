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

<div class="container">
    <div class="card">
        <div class="card-header">
            Usted está buscando viaje para la siguiente fecha: <b> <?php echo "$fecha_viaje" ?></b>
        </div>
    </div>
</div>

<?php

$array_procedimiento_almacenado = "{";

$contador = 0;

foreach ($array_id_artistas as $id_artista) {

    if ($contador == 0){

        $array_procedimiento_almacenado .= "$id_artista";
    }
    else{

        $array_procedimiento_almacenado .= ",$id_artista";

    }

    $contador = $contador + 1;

    }


$array_procedimiento_almacenado .= "}";

$query = "SELECT * FROM Itinerarios('$ciudad_origen_nombre', '$array_procedimiento_almacenado');";
$result = $db_par -> prepare($query);
$result -> execute();
$lista_itinerario_0_escalas = $result -> fetchAll();

$query_2 = "SELECT * FROM Itinerarios_1_escala('$ciudad_origen_nombre', '$array_procedimiento_almacenado');";
$result_2 = $db_par -> prepare($query_2);
$result_2 -> execute();
$lista_itinerario_1_escala = $result_2 -> fetchAll();

$query_3 = "SELECT * FROM Itinerarios_2_escalas('$ciudad_origen_nombre', '$array_procedimiento_almacenado');";
$result_3 = $db_par -> prepare($query_3);
$result_3 -> execute();
$lista_itinerario_2_escalas = $result_3 -> fetchAll();



$contador_2 = 0;

echo "<br/>";

echo "<h2 style='text-align:center'>Itinerarios con 0 escalas</h2>";

foreach ($lista_itinerario_0_escalas as $itinerario) {

    $contador_2 = $contador_2 + 1;

    include('0_escalas.php');

    }

$contador_2 = 0;

echo "<br/>";

echo "<h2 style='text-align:center'>Itinerarios con 1 escala</h2>";

foreach ($lista_itinerario_1_escala as $itinerario) {

    $contador_2 = $contador_2 + 1;

    include('1_escala.php');

    }

$contador_2 = 0;

echo "<br/>";

echo "<h2 style='text-align:center'>Itinerarios con 2 escalas</h2>";

foreach ($lista_itinerario_2_escalas as $itinerario) {

    $contador_2 = $contador_2 + 1;

    include('2_escalas.php');

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