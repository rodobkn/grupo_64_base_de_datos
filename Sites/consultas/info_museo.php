<div class="container">

  <div class="card">
      <div class="card-header">
          A continuación se mostrará la información del lugar <b> <?php echo "$nombre_lugar" ?> </b>, que es del tipo 
          <b><?php echo "$tipo_del_lugar" ?></b>:
      </div>

      <div class="card-body">


      <table class="table">
          <thead class="thead-dark">
          <tr>
              <th scope="col">Precio</th>
              <th scope="col">Hora apertura</th>
              <th scope="col">Hora cierre</th>

          </tr>
          </thead>
          <tbody>
              <!-- <th scope="row">1</th> -->

              <?php
              foreach ($caracteristicas_museo as $caracteristica) {
                

                echo "<tr> <td> $caracteristica[1] </td> <td> $caracteristica[2] </td> <td> $caracteristica[3] </td> </tr>";

                }
              ?>


          </tbody>
      </table>


      </div>
  </div>
</div>