<?php include('../templates/header.html');   ?>

<body>

<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");


 	$query = "SELECT DISTINCT lower(nombre_obra) FROM Obras;";
	$result = $db -> prepare($query);
	$result -> execute();
	$obras = $result -> fetchAll();
  ?>



    <div class="container">

        <div class="card">
            <div class="card-header">
                CONSULTA 1) A continuación se mostrarán las obras de arte contenida en la base de datos con distintos nombres.
            </div>

            <div class="card-body">
            <h5 class="card-title">La consulta pedida es la siguiente:</h5>

            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">Nombres de las obras de arte</th>
                </tr>
                </thead>
                <tbody>
                    <!-- <th scope="row">1</th> -->

					
					<?php
					foreach ($obras as $obra) {
						echo "<tr> <td>$obra[0]</td> </tr>";
					}
					?>


                </tbody>
            </table>


            </div>
        </div>
    </div>









<?php include('../templates/footer.html'); ?>