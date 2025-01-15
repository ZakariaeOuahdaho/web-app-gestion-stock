<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gestionstock";
$conn = new mysqli($servername, $username, $password, $dbname,3306);
if ($conn->connect_error) {
  echo "conexion a la base de donnée a échoué  " . $conn->connect_error;}
?>
