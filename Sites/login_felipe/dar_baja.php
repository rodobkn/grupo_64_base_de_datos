<?php
session_start();
require('conexion.php');

$id = $_SESSION['uid'];
$nombre= $_SESSION['unombre'];
$user = $_SESSION['username'];
$mail= $_SESSION['correo'];
$direction = $_SESSION['direccion'];
$pass = $_SESSION['pass'];

$query = "INSERT INTO usuariosbaja(uid, unombre, username, correo, udireccion, upassword)
VALUES ($id, '$nombre', '$user', '$mail', '$direction', '$pass');";
$result = $db_impar -> prepare($query);
$result -> execute();

session_destroy();
// cerrando sesión y dirigiendo al index
header("Location: aviso_baja.php");

?>
