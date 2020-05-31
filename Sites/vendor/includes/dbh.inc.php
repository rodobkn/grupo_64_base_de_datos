<?php

$servername = "grupo87@codd.ing.puc.cl";
$dBUsername = "grupo87";
$dBPassword = "sarahfelipe";
$dBName = "grupo87e3";

$conn = pg_connect($servername, $dBUsername, $dBPassword, $dBName);

if(!$conn){
    die("Connexion failed: "pg_connect_error());
}