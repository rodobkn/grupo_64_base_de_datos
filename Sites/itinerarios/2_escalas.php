
<br>

<div class="container">

  <div class="card">
      <div class="card-header">
          Itinerario N°<b> <?php echo "$contador_2" ?></b> <br>
      </div>

      <div class="card-body">


      <table class="table">
          <thead class="thead-dark">
          <tr>
              <th scope="col">id_viaje</th>
              <th scope="col">id Ciudad de origen</th>
              <th scope="col">id Ciudad de destino</th>
              <th scope="col">Horario</th>
              <th scope="col">Duración</th>
              <th scope="col">Precio</th>
          </tr>
          </thead>
          <tbody>
              <!-- <th scope="row">1</th> -->

              <?php

                $id_viaje_1 = $itinerario[0];
                $id_c_origen_1 = $itinerario[1];
                $id_c_destino_1 = $itinerario[2];
                $horario_1 = $itinerario[3];
                $duracion_1 = $itinerario[4];
                $precio_1 = $itinerario[5];

                $id_viaje_2 = $itinerario[6];
                $id_c_origen_2 = $itinerario[7];
                $id_c_destino_2 = $itinerario[8];
                $horario_2 = $itinerario[9];
                $duracion_2 = $itinerario[10];
                $precio_2 = $itinerario[11];

                $id_viaje_3 = $itinerario[12];
                $id_c_origen_3 = $itinerario[13];
                $id_c_destino_3 = $itinerario[14];
                $horario_3 = $itinerario[15];
                $duracion_3 = $itinerario[16];
                $precio_3 = $itinerario[17];


                echo "<tr> <td> viaje $id_viaje_1 </td> <td>  $id_c_origen_1 </td> <td>  $id_c_destino_1 </td> 
                <td> $horario_1 horas </td> <td>  $duracion_1 </td> <td>  $precio_1 </td> </tr>";

                echo "<tr> <td> viaje $id_viaje_2 </td> <td>  $id_c_origen_2 </td> <td>  $id_c_destino_2 </td> 
                <td> $horario_2 horas </td> <td>  $duracion_2 </td> <td>  $precio_2 </td> </tr>";

                echo "<tr> <td> viaje $id_viaje_3 </td> <td>  $id_c_origen_3 </td> <td>  $id_c_destino_3 </td> 
                <td> $horario_3 horas </td> <td>  $duracion_3 </td> <td>  $precio_3 </td> </tr>";


                #echo "<tr> <td> <a href='destino_especifico.php?id_destino=$id_destino&fecha_viaje=$fecha_viaje&n_ciudad_origen=$nombre_ciudad_origen&n_ciudad_destino=$nombre_ciudad_destino'> viaje $id_destino </a> </td> 
                #<td>  $nombre_ciudad_origen </td> <td>  $nombre_ciudad_destino </td> <td>  $horario </td> 
                #<td>  $duracion horas </td> <td>  $medio </td> <td>  $capacidad personas </td> <td>  $precio </td> </tr>";

              ?>


          </tbody>
      </table>


      </div>
  </div>
</div>