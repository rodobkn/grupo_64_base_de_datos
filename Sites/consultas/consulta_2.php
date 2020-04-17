<?php include('../templates/header_2.html');   ?>

<body>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

 

 	$query = "SELECT nombre_lugar 
            FROM Plazas, Lugares, Lugares_Obras, Obras, Esculturas, Artistas_Obras, Artistas 
            WHERE Plazas.id_lugar = Lugares.id_lugar 
            AND Lugares.id_lugar = Lugares_Obras.id_lugar 
            AND Lugares_Obras.id_obra = Obras.id_obra 
            AND Obras.id_obra = Esculturas.id_obra 
            AND Obras.id_obra = Artistas_Obras.id_obra 
            AND Artistas_Obras.id_artista = Artistas.id_artista 
            AND Artistas.nombre_artista = 'Gian Lorenzo Bernini';";
	$result = $db -> prepare($query);
	$result -> execute();
	$nombres_plazas = $result -> fetchAll();
?>

<br>
<br>



<div class="container">

  <div class="card">
      <div class="card-header">
          CONSULTA 2) A continuación se mostrarán todas las plazas que contengan al menos una escultura del gran Gian Lorenzo Bernini.
      </div>

      <div class="card-body">


      <table class="table">
          <thead class="thead-dark">
          <tr>
              <th scope="col">Plazas</th>
          </tr>
          </thead>
          <tbody>
              <!-- <th scope="row">1</th> -->

    
              <?php
              foreach ($nombres_plazas as $plaza) {
                  echo "<tr> <td>$plaza[0]</td> </tr>";
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


