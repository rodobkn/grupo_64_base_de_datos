<?php include('templates/header.html');   ?>

<body>
  <h1 align="center">Bases de datos para colecciones de arte! </h1>
  <p style="text-align:center;">Aquí podrás encontrar información sobre las más famosas obras de arte!.</p>

  <br>

  <h3 align="center"> Se muestra todos los nombres distintos de las obras de arte</h3>

  <form align="center" action="consultas/consulta_nombre_obras.php" method="post">

    <input type="submit" value="Consultar">
    
  </form>
  
  <br>
  <br>
  <br>

  <h3 align="center"> Se muestra todos los nombres de las plazas que contengan al menos una escultura de "Gian Lorenzo Bernini"</h3>

  <form align="center" action="consultas/consulta_gian_lorenzo.php" method="post">

    <input type="submit" value="Consultar">
  </form>
  
  <br>
  <br>
  <br>

  <h3 align="center"> ¿Quieres conocer los Pokemones más altos que: ?</h3>

  <form align="center" action="consultas/consulta_altura.php" method="post">
    Altura Mínima:
    <input type="text" name="altura">
    <br/><br/>
    <input type="submit" value="Buscar">
  </form>
  <br>
  <br>
  <br>

  <h3 align="center">¿Quieres buscar todos los pokemones por tipo?</h3>

  <?php
  #Primero obtenemos todos los tipos de pokemones
  require("config/conexion.php");
  $result = $db -> prepare("SELECT DISTINCT tipo FROM ejercicio_ayudantia;");
  $result -> execute();
  $dataCollected = $result -> fetchAll();
  ?>

  <form align="center" action="consultas/consulta_tipo.php" method="post">
    Seleccinar un tipo:
    <select name="tipo">
      <?php
      #Para cada tipo agregamos el tag <option value=value_of_param> visible_value </option>
      foreach ($dataCollected as $d) {
        echo "<option value=$d[0]>$d[0]</option>";
      }
      ?>
    </select>
    <br><br>
    <input type="submit" value="Buscar por tipo">
  </form>

  <br>
  <br>
  <br>
  <br>
</body>
</html>