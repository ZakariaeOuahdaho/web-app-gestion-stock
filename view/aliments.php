<?php
session_start();
require_once '../conf/database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $reference = $conn->real_escape_string($_POST['reference']);
  $nom = $conn->real_escape_string($_POST['nom']);
  $quantite = (int)$_POST['quantite'];
  $prix_unitaire = (float)$_POST['prix_unitaire'];

  $sql = "INSERT INTO commandes_fournisseurs (reference, nom, quantite, prix_unitaire, categorie) VALUES (?, ?, ?, ?, 'aliments')";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("ssid", $reference, $nom, $quantite, $prix_unitaire);

  if ($stmt->execute()) {
    header('Location: aliments.php');
    exit();
  }
}

$sql = "SELECT * FROM commandes_fournisseurs WHERE categorie = 'aliments'";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/stock_pagestyle.css">
  <title>Commandes Fournisseurs - Aliments</title>
</head>
<body>
<div class="sidebar">
  <h2>Gestion Fournisseurs</h2>
  <a href="../view/pagedaccueil.php">Retour au Home</a>
  <a href="gestionfournisseur.php">Retour aux catégories</a>
  <a href="../conf/logout.php">Log out</a>
  <div class="background-animation">
    <div class="bubble"></div>
    <div class="bubble"></div>
    <div class="bubble"></div>
    <div class="bubble"></div>
  </div>
</div>

<div class="main-content">
  <div class="container">
    <div class="header">
      <h1>Commandes Fournisseurs - Aliments</h1>
      <a href="#add-form" class="add-btn">Commander un produit</a>
    </div>

    <div class="table-header">
      <div class="col col-product">Produit</div>
      <div class="col col-quantity">Quantité commandée</div>
      <div class="col col-price">Prix unitaire</div>
      <div class="col col-status">Statut</div>
      <div class="col col-actions">Actions</div>
    </div>

    <?php while($row = $result->fetch_assoc()): ?>
      <div class="product-row">
        <div class="col col-product">
          <div class="product-name">Commande n° <?php echo htmlspecialchars($row['reference']); ?></div>
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
          if($row['statut'] == 'en_attente') {
            $status_class = 'rupture-stock';
            $status_text = 'En attente';
          } elseif($row['statut'] == 'confirme') {
            $status_class = 'faible-stock';
            $status_text = 'Confirmé';
          } else {
            $status_class = 'en-stock';
            $status_text = 'Livré';
          }
          ?>
          <span class="status-badge <?php echo $status_class; ?>">
                        <?php echo $status_text; ?>
                    </span>
        </div>

        <div class="col col-actions">
          <a href="../utilities/edit_product.php?id=<?php echo $row['id']; ?>" class="btn btn-edit">Modifier</a>
          <a href="../utilities/delete_product.php?id=<?php echo $row['id']; ?>" class="btn btn-delete">Annuler</a>
        </div>
      </div>
    <?php endwhile; ?>
  </div>
</div>

<div id="add-form" class="form-container">
  <div class="form-content">
    <a href="#" class="close-btn">&times;</a>
    <h2>Commander un produit</h2>
    <form method="POST" action="">
      <div class="form-group">
        <label>Référence commande</label>
        <input type="text" name="reference" required>
      </div>
      <div class="form-group">
        <label>Nom du produit</label>
        <input type="text" name="nom" required>
      </div>
      <div class="form-group">
        <label>Quantité à commander</label>
        <input type="number" name="quantite" required>
      </div>
      <div class="form-group">
        <label>Prix unitaire (MAD)</label>
        <input type="number" name="prix_unitaire" step="0.01" required>
      </div>
      <button type="submit" class="submit-btn">Commander</button>
    </form>
  </div>
</div>
</body>
</html>
