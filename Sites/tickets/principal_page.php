<?php include('../templates/header_2.html');   ?>

<body>

<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");


 	$query = "SELECT cid, pid, cnombre FROM ciudades;";
	$result = $db_impar -> prepare($query);
	$result -> execute();
	$lista_de_ciudades = $result -> fetchAll();
  ?>


<div class="container">

  <div class="card">
      <div class="card-header">
        <h3>A continuación ingresa la fecha en que quieres realizar tu viaje(en formato YYYY-MM-DD). <br>
            Asimismo, ingresa la ciudad de inicio de tu viaje y la ciudad destino.
        </h3>
      </div>

      <div class="card-body">           
                
        <form align="center" action="posibles_destinos.php" method="post">
        <br>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">Fecha del viaje</span>
            </div>
            <input type="text" name="fecha_viaje" class="form-control"  aria-label="Username" aria-describedby="basic-addon1">
        </div>

        <br>

        <label> Ciudad de Inicio </label> <br> <br>
        <select name="ciudad_origen" class="selectpicker">

            <?php
                    foreach ($lista_de_ciudades as $ciudad) {
                        $ciudad_id = $ciudad[0];
                        $nombre_ciudad = $ciudad[2];

                        echo "<option value=" . $ciudad_id . "> $nombre_ciudad </option>";
                    }
            ?>


        </select>

        <br>

        <label> Ciudad de Destino </label> <br> <br>
        <select name="ciudad_destino" class="selectpicker">

            <?php
                    foreach ($lista_de_ciudades as $ciudad) {
                        $ciudad_id = $ciudad[0];
                        $nombre_ciudad = $ciudad[2];

                        echo "<option value=" . $ciudad_id . "> $nombre_ciudad </option>";
                    }
            ?>


        </select>


        <br>

        <input type="submit" class="btn btn-outline-info" value="Buscar">
        </form>

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