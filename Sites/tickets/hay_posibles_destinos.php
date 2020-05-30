<div class="container">

  <div class="card">
      <div class="card-header">
          Usted está buscando viaje para la siguiente fecha: <b> <?php echo "$fecha_viaje" ?></b> <br>
          A continuación se mostrarán todos los <b>viajes</b> que tenemos disponibles. Si quiere comprar un viaje, o simplemente más
          información, haga click sobre el viaje:
      </div>

      <div class="card-body">


      <table class="table">
          <thead class="thead-dark">
          <tr>
              <th scope="col">Viaje</th>
              <th scope="col">Ciudad de origen</th>
              <th scope="col">Ciudad de destino</th>
              <th scope="col">Horario</th>
              <th scope="col">Duración</th>
              <th scope="col">Medio</th>
              <th scope="col">Capacidad</th>
              <th scope="col">Precio</th>
          </tr>
          </thead>
          <tbody>
              <!-- <th scope="row">1</th> -->

              <?php
              foreach ($lista_de_destinos as $destino) {

                $id_destino = $destino[0];
                $id_ciudad_origen = $destino[1];
                $id_ciudad_destino = $destino[2];
                $horario = $destino[3];
                $duracion = $destino[4];
                $medio = $destino[5];
                $capacidad = $destino[6];
                $precio = $destino[7];

                echo "<tr> <td> viaje $id_destino </td> <td>  $nombre_ciudad_origen </td> <td>  $nombre_ciudad_destino </td> 
                <td>  $horario </td> <td>  $duracion horas </td> <td>  $medio </td> <td>  $capacidad personas </td> <td>  $precio </td> </tr>";


                }
              ?>


          </tbody>
      </table>


      </div>
  </div>
</div>