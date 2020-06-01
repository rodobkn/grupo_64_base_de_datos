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

$query = "SELECT * FROM Itinarios('$ciudad_origen_nombre', '$array_procedimiento_almacenado');";
$result = $db_par -> prepare($query);
$result -> execute();
$lista_itinerario = $result -> fetchAll();

foreach ($lista_itinerario as $itinerario) {

    $info_itinerario = $itinerario;

    foreach ($columnas_totales as $numero) {

        $info_especifica = $info_itinerario[$numero];

        if (isset($info_especifica)) {
            $columnas_verdaderas = $columnas_verdaderas + 1;
        }
        else{
        }
    
        }
    
    break;
    }

if ($columnas_verdaderas == 18) {
    $tipo_de_tabla=1;

} elseif ($columnas_verdaderas == 12) {
    $tipo_de_tabla=2;

} elseif ($columnas_verdaderas == 6) {
    $tipo_de_tabla=3;

} else {
    echo "NO HAY POSIBLES TICKETS <br>";
}


if ($tipo_de_tabla == 1) {

    $contador_2 = 0;

    foreach ($lista_itinerario as $itinerario) {

        $contador_2 = $contador_2 + 1;

        include('2_escalas.php');
    
        }

} elseif ($tipo_de_tabla == 2) {
    include('1_escala.php');

} elseif ($tipo_de_tabla == 3) {
    include('0_escalas.php');
} else{

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