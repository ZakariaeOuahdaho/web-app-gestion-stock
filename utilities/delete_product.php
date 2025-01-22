<?php
session_start();
include '../conf/database.php';

if (isset($_GET['id'])) {
  $id = (int)$_GET['id'];
  $sql = "DELETE FROM produits WHERE id = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("i", $id);

  if ($stmt->execute()) {
    header('Location: stock.php?success=2');
  } else {
    header('Location: stock.php?error=2');
  }
  exit();
}
?>
