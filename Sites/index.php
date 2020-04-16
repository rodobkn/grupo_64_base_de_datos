<?php include('templates/header.html');   ?>

<body>
  <h1 align="center">Bases de datos para colecciones de arte! </h1>
  <p style="text-align:center;">Aquí podrás encontrar información sobre las más famosas obras de arte!.</p>

  <br>

  <h3 align="center"> Se muestra todos los nombres distintos de las obras de arte</h3>

  <form align="center" action="consultas/consulta_1" method="post">

    <input type="submit" value="Consultar">
    
  </form>
  
  <br>
  <br>
  <br>

  <h3 align="center"> Se muestra todos los nombres de las plazas que contengan al menos una escultura de "Gian Lorenzo Bernini"</h3>

  <form align="center" action="consultas/consulta_2.php" method="post">

    <input type="submit" value="Consultar">
  </form>
  
  <br>
  <br>
  <br>

  <h3 align="center"> Buscar museos que tengan obras del renacimiento por país.</h3>

  <form align="center" action="consultas/consulta_3.php" method="post">
    País:
    <input type="text" name="pais">
    <br/><br/>
    <input type="submit" value="Buscar">
  </form>
  <br>
  <br>
  <br>

  <h3 align="center">A continuación se podrá consultar a los artistas con el numero de obras que tienen respectivamente</h3>

  <form align="center" action="consultas/consulta_4.php" method="post">

    <input type="submit" value="Consultar">
  </form>

  <br>
  <br>
  <br>

  <h3 align="center"> Si quiere buscar iglesias en un horario de funcionamiento que usted indique, ésta es la consulta. <br>
  Además se muestran junto a sus frescos.</h3>
  

  <form align="center" action="consultas/consulta_5.php" method="post">
    Ciudad:
    <input type="text" name="ciudad">
    Horario de apertura:
    <input type="text" name="horario_1">
    Horario de salida:
    <input type="text" name="horario_2">
    <br/><br/>
    <input type="submit" value="Buscar">
  </form>


  <br>
  <br>
  <br>

  <h3 align="center">A continuación se podrá consultar el lugar que contiene obras de todos los periodos 
  que existen en la base de datos.</h3>

  <form align="center" action="consultas/consulta_6.php" method="post">

    <input type="submit" value="Consultar">
  </form>



  <br>
  <br>
  <br>
  <br>
</body>
</html>
