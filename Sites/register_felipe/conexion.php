<?php
  try {
    require('data.php');
    $db_par = new PDO("pgsql:dbname=$databaseName2;host=localhost;port=5432;user=$user2;password=$password2");
    $db_impar = new PDO("pgsql:dbname=$databaseName1;host=localhost;port=5432;user=$user1;password=$password1");
  } catch (Exception $e) {
    echo "No se pudo conectar a la base de datos: $e";
  }