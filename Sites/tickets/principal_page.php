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
<br>
<br>

<div class="container">

  <div class="card">
      <div class="card-header">
        A continuación ingresa la <b>fecha</b> en que quieres realizar tu viaje(en formato yyyy-mm-dd).
        Asimismo, ingresa la <b>ciudad de inicio</b> de tu viaje y la <b>ciudad destino</b>.
      </div>

      <div class="card-body">           
                
        <form align="center" action="posibles_destinos.php" method="post">
        <br>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">Fecha del viaje</span>
            </div>
            <input type="text" name="fecha_viaje" class="form-control"  aria-label="Username" aria-describedby="basic-addon1" required>
        </div>


        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <label class="input-group-text" for="inputGroupSelect01">Ciudad de Inicio</label>
            </div>
            <select name="ciudad_origen" class="custom-select" id="inputGroupSelect01">

                <?php
                        foreach ($lista_de_ciudades as $ciudad) {
                            $ciudad_id = $ciudad[0];
                            $nombre_ciudad = $ciudad[2];

                            echo "<option value=" . $ciudad_id . "> $nombre_ciudad </option>";
                        }
                ?>


            </select>
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <label class="input-group-text" for="inputGroupSelect01">Ciudad de Destino</label>
            </div>
            <select name="ciudad_destino" class="custom-select" id="inputGroupSelect01">

                <?php
                        foreach ($lista_de_ciudades as $ciudad) {
                            $ciudad_id = $ciudad[0];
                            $nombre_ciudad = $ciudad[2];

                            echo "<option value=" . $ciudad_id . "> $nombre_ciudad </option>";
                        }
                ?>


            </select>
        </div>

        <br>

        <input type="submit" class="btn btn-outline-info" value="Buscar">
        </form>

        </div>
  </div>
</div>







<br>
<br>
<form align="center" action="../login_felipe/home.php" method="get">

    <input type="submit" class="btn btn-outline-info" value="Volver a home">
</form>
<br>
<br>
</body>







<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Plugin JavaScript -->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom JavaScript for this theme -->
<script src="js/scrolling-nav.js"></script>