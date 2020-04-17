<?php include('../templates/header_2.html');   ?>

<body>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  #Se obtiene el valor del input del usuario
  $pais = $_POST["pais"];


  #Se construye la consulta como un string
 	$query = "SELECT DISTINCT nombre_lugar FROM Ciudades_contacto_paises, Lugares_ciudades, Lugares, Museos, Lugares_Obras, Obras 
   WHERE Ciudades_contacto_paises.id_ciudad = Lugares_ciudades.id_ciudad AND LOWER(Ciudades_contacto_paises.pais) LIKE LOWER('%$pais%') 
   AND Lugares_ciudades.id_lugar = Lugares.id_lugar 
   AND Lugares.id_lugar = Museos.id_lugar 
   AND Museos.id_lugar = Lugares_Obras.id_lugar 
   AND Lugares_Obras.id_obra = Obras.id_obra AND LOWER(Obras.periodo) = 'renacimiento';
   ";

  #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
	$result = $db -> prepare($query);
	$result -> execute();
	$lista_museos = $result -> fetchAll();
  ?>



<div class="container">

  <div class="card">
      <div class="card-header">
          CONSULTA 3) A continuación se mostrarán todos los museos del pais <?php echo"$pais" ?> que tengan obras del renacimiento.
      </div>

      <div class="card-body">
      <h5 class="card-title">La consulta pedida es la siguiente:</h5>

      <table class="table">
          <thead class="thead-dark">
          <tr>
              <th scope="col">Museos</th>
          </tr>
          </thead>
          <tbody>
              <!-- <th scope="row">1</th> -->

              <?php
              foreach ($lista_museos as $museo) {
                  echo "<tr> <td>$museo[0]</td> </tr>";
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
