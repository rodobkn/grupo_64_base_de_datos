<?php 
$precio_1 = $itinerario[5];

$precio_total = $precio_1;
?>


<br>

<div class="container">

  <div class="card">
      <div class="card-header">
          Itinerario N°<b> <?php echo "$contador_2" ?></b> <br>
          Precio Total: <b> <?php echo "$precio_total" ?></b> <br>
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

                $query = "SELECT cnombre FROM ciudades WHERE cid=$id_c_origen_1;";
                $result = $db_impar -> prepare($query);
                $result -> execute();
                $lista_c_origen_1 = $result -> fetchAll();

                foreach ($lista_c_origen_1 as $nombre) {

                    $nombre_c_origen_1 = $nombre[0];
                    
                    }

                $query_2 = "SELECT cnombre FROM ciudades WHERE cid=$id_c_destino_1;";
                $result_2 = $db_impar -> prepare($query_2);
                $result_2 -> execute();
                $lista_c_destino_1 = $result_2 -> fetchAll();

                foreach ($lista_c_destino_1 as $nombre) {

                    $nombre_c_destino_1 = $nombre[0];
                    
                    }


                echo "<tr> <td> <a href='../tickets/destino_especifico.php?id_destino=$id_viaje_1&fecha_viaje=$fecha_viaje&n_ciudad_origen=$nombre_c_origen_1&n_ciudad_destino=$nombre_c_destino_1'> viaje $id_viaje_1 </a> </td> 
                <td>  $nombre_c_origen_1 </td> <td>  $nombre_c_destino_1 </td> 
                <td> $horario_1 horas </td> <td>  $duracion_1 </td> <td>  $precio_1 </td> </tr>";



                #echo "<tr> <td> <a href='destino_especifico.php?id_destino=$id_destino&fecha_viaje=$fecha_viaje&n_ciudad_origen=$nombre_ciudad_origen&n_ciudad_destino=$nombre_ciudad_destino'> viaje $id_destino </a> </td> 
                #<td>  $nombre_ciudad_origen </td> <td>  $nombre_ciudad_destino </td> <td>  $horario </td> 
                #<td>  $duracion horas </td> <td>  $medio </td> <td>  $capacidad personas </td> <td>  $precio </td> </tr>";

              ?>


          </tbody>
      </table>


      </div>
  </div>
</div>