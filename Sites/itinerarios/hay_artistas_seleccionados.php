<?php $array_id_artistas = [];?>
<?php $array_nombre_artistas = [];?>

<div class="container">

	<div class="card">
		<div class="card-header">
			A continuación se mostrarán todos los artistas que seleccionaste:
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
				foreach ($artistas as $key => $value) {
                    $id_artista = $value;
                    array_push($array_id_artistas, $id_artista);

                    $query = "SELECT nombre_artista FROM artistas WHERE id_artista=$id_artista;";
                    $result = $db_par -> prepare($query);
                    $result -> execute();
                    $lista_nombre_artista = $result -> fetchAll();

                    foreach ($lista_nombre_artista as $artista){

                        $nombre_artista = $artista[0];
                    }


                    array_push($array_nombre_artistas, $nombre_artista);

					echo "<tr> <td>  $nombre_artista  </td> </tr>";
				}
				?>


			</tbody>
		</table>


		</div>
	</div>
</div>

<?php $_SESSION['array_3'] = $array_id_artistas; ?>
<?php $_SESSION['array_4'] = $array_nombre_artistas; ?>

<br>
<br>

<div class="container">

  <div class="card">
      <div class="card-header">
        A continuación ingresa la <b>fecha</b> en que quieres realizar tu viaje(en formato yyyy-mm-dd).
        Asimismo, ingresa la <b>ciudad de inicio</b> de tu itinerario.
      </div>

      <div class="card-body">           
                
        <form align="center" action="info_recolectada_lista.php" method="post">
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

                            echo "<option value=" . $nombre_ciudad . "> $nombre_ciudad </option>";
                        }
                ?>


            </select>
        </div>

        <br>

        <input type="submit" class="btn btn-outline-info" value="Buscar posibles itinerarios">
        </form>

        </div>
  </div>
</div>
