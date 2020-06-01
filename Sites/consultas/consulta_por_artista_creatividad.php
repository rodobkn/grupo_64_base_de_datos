<?php include('../templates/header_2.html');   ?>

<body>

<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");
  $nombre_artista = $_POST["nombre_artista"];


 	$query = "SELECT nombre_artista FROM Artistas WHERE LOWER(nombre_artista) LIKE LOWER('%$nombre_artista%');";
	$result = $db_par -> prepare($query);
	$result -> execute();
	$artistas = $result -> fetchAll();
  ?>


<br>
<br>

<div class="container">

	<div class="card">
		<div class="card-header">
			A continuación se mostrará/n los artistas indicado/s en tu búsqueda. Si quiere más información acerca de un artista, 
			simplemente haga click sobre su nombre.
		</div>

		<div class="card-body">

		<table class="table">
			<thead class="thead-dark">
			<tr>
				<th scope="col">Nombre del artista</th>
			</tr>
			</thead>
			<tbody>
				<!-- <th scope="row">1</th> -->

				
				<?php
				foreach ($artistas as $artista) {
                    $variable = $artista[0];

					echo "<tr> <td> <a href='info_artista.php?nombre=$variable'> $variable </a> </td> </tr>";
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