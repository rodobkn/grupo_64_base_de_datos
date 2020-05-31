<?php
    session_start();
?>
<?php include('header_2.html')?>

<?php require('../includes/conexion.php');?>

<body id="page-top"> 

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="#page-top">Pagina de perfil</a>
    </div>
  </nav>
</body>
<br>
<br>
<div class="container">
    <div class="card">
        <div class="card-header">
            Información personal
        </div>

        <div class="card-body">
        
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">Atributo</th>
                <th scope="col">Dato</th>
            </tr>
            </thead>
            <tbody>

            <?php

            $id = $_SESSION['uid'];

            $output_entradas =[];

            #<!--ENTRADAS MUSEOS: el usuario puede ver sus propias entradas--> 

            #Tabla entregas_museo (eid, uid, id_lugar, fecha_compra)
            $query_entrada=
            "SELECT E.fecha_compra,
                    E.id_lugar
            FROM entregas_museo E
            WHERE E.uid='$id'; ";

            $result_entrada = $db_impar -> prepare($query_entrada);
            $result_entrada -> execute();
            $info_entrada = $result_entrada -> fetchAll();

            #Info museos
            $query_museo="SELECT L.nombre_lugar, 
                    M.hora_apertura,
                    M.hora_cierre,
                    L.id_lugar
            FROM Lugares L JOIN Museos M ON L.id_lugar=M.id_lugar;";

            $result_museo = $db_par -> prepare($query_museo);
            $result_museo -> execute();
            $info_museo = $result_museo -> fetchAll();

            #<!--RESERVAS ALOJAMIENTO-->

            $query_hotel=
            "SELECT R.fechainicio, 
                   R.fechatermino, 
                    H.hdireccion
            FROM reservas R
                JOIN hoteles H ON H.hid=R.hid
            WHERE R.uid='$id';";

            $result_hotel = $db_impar -> prepare($query_hotel);
            $result_hotel -> execute();
            $info_hotel = $result_hotel -> fetchAll();

            #<!---TICKETS DE TRANSPORTE-->
            $query_ticket=
            "SELECT T.asiento,
                   T.fechaviaje, 
                    T.fechacompra, 
                    CD.cnombre,
                    CO.cnombre
            FROM tickets T
                JOIN destinos D ON D.did=T.did
                JOIN ciudades CD ON CD.cid=D.ciddestino
                JOIN ciudades CO ON CO.cid=D.cidorigen
            WHERE T.uid='$id';";

            $result_ticket = $db_impar -> prepare($query_ticket);
            $result_ticket -> execute();
            $info_ticket = $result_ticket -> fetchAll();

            ?>


                <?php
                    $id = $_SESSION['uid'];
                    $nombre= $_SESSION['unombre'];
                    $user = $_SESSION['username'];
                    $mail= $_SESSION['correo'];
                    $direction = $_SESSION['direccion'];
                    $pass = $_SESSION['pass'];
                   
                    echo "<tr> <td>ID </td> <td> $id </td> </tr>";
                    echo "<tr> <td>Nombre</td> <td>$nombre</tr>";
                    echo "<tr> <td>Nombre usuario</td> <td>$user</td> </tr>";
                    echo "<tr> <td>Correo</td> <td>$mail</td> </tr>";
                    echo "<tr> <td>Direccion</td> <td>$direction</td> </tr>";
                    echo "<tr> <td>Contraseña</td> <td>$pass</td> </tr>";
                ?>
            <tbody>
        </table>

        </div>
	</div>
</div>
<br>
<br>
<div class="container">

	<div class="card">
		<div class="card-header">
			Tus entradas a los museos
		</div>

		<div class="card-body">

		<table class="table">
			<thead class="thead-dark">
			<tr>
                <th scope="col">Fecha de Compra</th>
                <th scope="col">Nombre del Museo</th>
                <th scope="col">Horario de Apertura</th>
                <th scope="col">Horario de Cierra</th>
			</tr>
			</thead>
			<tbody>
				<!-- <th scope="row">1</th> -->

				
                <?php
                #foreach($info_museo as $museo){
                    #echo "<tr> <td>$museo[3]</td> <td>$museo[0]</td> <td>$museo[1]</td> <td>$museo[2]</td> </tr>";
                #}

				foreach ($info_entrada as $entrada) {
                    $fecha_compra = $entrada[0];
                    $fecha_compra = date('Y-m-d');
                    

                    foreach($info_museo as $museo){
                        if ($entrada[1]==$museo[3]){
                            echo "<tr> <td>$fecha_compra</td> <td>$museo[0]</td> <td>$museo[1]</td> <td>$museo[2]</td> </tr>";
                        }
                    } 
                }
                #foreach ($info_entrada as $entrada) {
                    #foreach($info_museo as $museo){
                        #if ($entrada[1]==$museo[3]){
                            #array_push($output_entradas, $entrada[0],$museo[0],$museo[1], $museo[2]);
                        #}
                    #}
                #}
                #echo "<tr> <td>$output_entradas[0]</td> <td>$output_entradas[1]</td> <td>$output_entradas[2]</td> <td>$output_entradas[3]</td> </tr>";
                #echo lent($info_entrada);
                ?>


			</tbody>
		</table>


		</div>
        <div class="card-header">
			Tus reservas de alojamiento
		</div>

		<div class="card-body">

		<table class="table">
			<thead class="thead-dark">
			<tr>
				<th scope="col">Fecha de Inicio</th>
                <th scope="col">Fecha de termino</th>
                <th scope="col">Direccion del hotel</th>
			</tr>
			</thead>
			<tbody>
				<!-- <th scope="row">1</th> -->

				
				<?php
				foreach ($info_hotel as $hotel) {
                    echo "<tr> <td>$hotel[0]</td> <td>$hotel[1]</td> <td>$hotel[2]</td> </tr>";
				}
				?>


			</tbody>
		</table>


		</div>
        <div class="card-header">
			Tus tickets de transporte
		</div>

		<div class="card-body">

		<table class="table">
			<thead class="thead-dark">
			<tr>
				<th scope="col">Numero de Asiento</th>
                <th scope="col">Fecha de Compra del Ticket</th>
                <th scope="col">Fecha de viaje</th>
                <th scope="col">Ciudad de Origen</th>
                <th scope="col">Ciudad de Destino</th>

			</tr>
			</thead>
			<tbody>
				<!-- <th scope="row">1</th> -->

				
				<?php
				foreach ($info_ticket as $ticket) {
                    echo "<tr> <td>$ticket[0]</td> <td>$ticket[1]</td> <td>$ticket[2]</td> <td>$ticket[3]</td> <td>$ticket[4]</td></tr>";
				}
				?>


			</tbody>
		</table>


		</div>
	</div>
</div>

<br>
<br>
<form align="center" action="home.php" method="get">
    <input type="submit" class="btn btn-outline-info" value="Volver a Home">
</form>
<br>
<form align="center" action="dar_baja.php" method="get">
    <input type="submit" class="btn btn-outline-info" value="Dar de baja">
</form>
<br>
</body>

</html>