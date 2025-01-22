<?php
session_start();
include '../conf/database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $reference = $conn->real_escape_string($_POST['reference']);
  $nom = $conn->real_escape_string($_POST['nom']);
  $quantite = (int)$_POST['quantite'];
  $prix_unitaire = (float)$_POST['prix_unitaire'];

  $sql = "INSERT INTO produits (reference, nom, quantite, prix_unitaire) VALUES (?, ?, ?, ?)";

  $stmt = $conn->prepare($sql);
  $stmt->bind_param("ssid", $reference, $nom, $quantite, $prix_unitaire);

  if ($stmt->execute()) {
    header('Location: stock.php?success=1');
  } else {
    header('Location: stock.php?error=1');
  }
  exit();
}

?>
