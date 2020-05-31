<?php
session_start();
session_destroy();
// cerrando sesión y dirigiendo al index
header("Location: ../index.php");

?>
