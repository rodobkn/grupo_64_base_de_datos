
<?php

  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");



    $query = "INSERT INTO tickets VALUES($id_del_ticket_nuevo, $id_destino, $id_usuario, $numero_de_asiento,'$fecha_de_compra', '$fecha_de_viaje');";
	$result = $db_impar -> prepare($query);
	$result -> execute();

  ?>

<br>
<br>

<div class="container">
    <div class="card">
        <div class="card-header">
            Compra de Ticket exitosa!
        </div>
    </div>
</div>


