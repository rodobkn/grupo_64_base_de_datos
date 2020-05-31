<?php include('../templates/header.html');   ?>

<body>

<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

 	$query = "SELECT DISTINCT cnombre FROM ciudad";
	$result = $db -> prepare($query);
	$result -> execute();
	$ciudades = $result -> fetchAll();
  ?>

<label for="ciudad-select">Choissisez un destino:</label>

<select name="ciudades" id="ciudad-select">
    <option value="">--Please choose an option--</option>

 <?php
	foreach ($ciudades as $c) {
    <option value="$c[0]">c[0]</option>
}
?>

</select>

<?php include('../templates/footer.html'); ?>