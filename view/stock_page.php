<?php
session_start();
require_once '../conf/database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $reference = $conn->real_escape_string($_POST['reference']);
  $nom = $conn->real_escape_string($_POST['nom']);
  $quantite = (int)$_POST['quantite'];
  $prix_unitaire = (float)$_POST['prix_unitaire'];

  $sql = "INSERT INTO produits (reference, nom, quantite, prix_unitaire) VALUES (?, ?, ?, ?)";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("ssid", $reference, $nom, $quantite, $prix_unitaire);

  if ($stmt->execute()) {
    header('Location: stock_page.php');
    exit();
  }
}

$sql = "SELECT * FROM produits";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/stock_pagestyle.css">
  <title>Gestion des Stocks</title>

</head>
<body>
<div class="container">
  <div class="header">
    <h1>Gestion des Stocks</h1>
    <a href="#add-form" class="add-btn">ajouter un produit</a>
  </div>

  <div class="table-header">
    <div class="col col-product">Produit</div>
    <div class="col col-quantity">Quantité</div>
    <div class="col col-price">Prix unitaire</div>
    <div class="col col-status">Statut</div>
    <div class="col col-actions">Actions</div>
  </div>

  <?php while($row = $result->fetch_assoc()): ?>
    <div class="product-row">
      <div class="col col-product">
        <div class="product-name">Produit n° <?php echo htmlspecialchars($row['reference']); ?></div>
        <div class="product-ref"><?php echo htmlspecialchars($row['nom']); ?></div>
      </div>

      <div class="col col-quantity">
        <?php echo $row['quantite']; ?> unités
      </div>

      <div class="col col-price">
        <?php echo number_format($row['prix_unitaire'], 2); ?> MAD
      </div>

      <div class="col col-status">
        <?php
        $status_class = '';
        $status_text = '';
        if($row['quantite'] > 100) {
          $status_class = 'en-stock';
          $status_text = 'En stock';
        } elseif($row['quantite'] > 20) {
          $status_class = 'faible-stock';
          $status_text = 'Faible en stock';
        } else {
          $status_class = 'rupture-stock';
          $status_text = 'En rupture';
        }
        ?>
        <span class="status-badge <?php echo $status_class; ?>">
                        <?php echo $status_text; ?>
        </span>
      </div>

      <div class="col col-actions">
        <a href="../utilities/edit_product.php?id=<?php echo $row['id']; ?>" class="btn btn-edit">modify</a>
        <a href="../utilities/delete_product.php?id=<?php echo $row['id']; ?>" class="btn btn-delete">Supprimer</a>
      </div>
    </div>
  <?php endwhile; ?>
</div>

<div id="add-form" class="form-container">
  <div class="form-content">
    <a href="#" class="close-btn">&times;</a>
    <h2>ajouter un produit </h2>
    <form method="POST" action="">
      <div class="form-group">
        <label>ID</label>
        <input type="text" name="reference" required>
      </div>
      <div class="form-group">
        <label>Nom du produit</label>
        <input type="text" name="nom" required>
      </div>
      <div class="form-group">
        <label>Quanti</label>
        <input type="number" name="quantite"  required>
      </div>
      <div class="form-group">
        <label>Prix (MAD)</label>
        <input type="number" name="prix_unitaire"  required>
      </div>
      <button type="submit" class="submit-btn">Ajouter</button>
    </form>
  </div>
</div>
</body>
</html>
