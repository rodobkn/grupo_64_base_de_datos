<?php include('../templates/header.html');   ?>

<body>

<?php
  require("../config/conexion.php"); #Llama a conexión, crea el objeto PDO y obtiene la variable $db


  $ciudad = $_POST["ciudad"];
  $hora_1 = $_POST["horario_1"];
  $hora_2 = $_POST["horario_2"];

  $query = "SELECT nombre_lugar, nombre_obra FROM Iglesias, Lugares, Lugares_ciudades, Ciudades, Lugares_Obras, Frescos, Obras 
  WHERE Lugares.id_lugar = Iglesias.id_lugar AND hora_apertura >= '$hora_1' AND hora_cierre <= '$hora_2' 
  AND Iglesias.id_lugar = Lugares_ciudades.id_lugar 
  AND Lugares_ciudades.id_ciudad = Ciudades.id_ciudad AND LOWER(Ciudades.ciudad) LIKE LOWER('%$ciudad%') 
  AND Iglesias.id_lugar = Lugares_Obras.id_lugar
   AND Lugares_Obras.id_obra = Frescos.id_obra 
  AND Frescos.id_obra = Obras.id_obra
   GROUP BY nombre_lugar,nombre_obra;";
  $result = $db -> prepare($query);
  $result -> execute();
  $iglesia_fresco = $result -> fetchAll(); #Obtiene todos los resultados de la consulta en forma de un arreglo

?>




<div class="container">

  <div class="card">
      <div class="card-header">
          CONSULTA 5) A continuación se mostrarán todas las iglesias ubicadas en <?php echo"$ciudad , que están abiertas desde las $hora_1 hasta las $hora_2" ?>, con sus frescos respectivos.   
      </div>

      <div class="card-body">
      <h5 class="card-title">La consulta pedida es la siguiente:</h5>

      <table class="table">
          <thead class="thead-dark">
          <tr>
              <th scope="col">Iglesia</th>
              <th scope="col">Fresco asociado</th>
          </tr>
          </thead>
          <tbody>
              <!-- <th scope="row">1</th> -->

              <?php
              foreach ($iglesia_fresco as $fila) {
                echo "<tr> <td>$fila[0]</td> <td>$fila[1]</td> <td>$fila[2]</td></tr>";
                }
              ?>


          </tbody>
      </table>


      </div>
  </div>
</div>





  <?php include('../templates/footer.html'); ?>


<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Plugin JavaScript -->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom JavaScript for this theme -->
<script src="js/scrolling-nav.js"></script>

</body>