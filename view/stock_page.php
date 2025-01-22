<?php
session_start();
include '../conf/database.php';
$sql = "SELECT * FROM produits";
$result = $conn->query($sql);
?>


