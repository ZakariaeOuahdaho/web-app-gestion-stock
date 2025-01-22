<?php
session_start();
include '../conf/database.php';
$sql = "SELECT * FROM produits";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/modifydeladd.css">
  <title>Gestion des Stocks</title>
</head>
<body>
<div class="container">
  <div class="header">
    <h1>Gestion des Stocks</h1>
    <a href="add_product.php" class="add-btn">Ajouter un Produit</a>
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
        <a href="../utilities/edit_product.php?id=<?php echo $row['id']; ?>" class="btn btn-edit">Modifier</a>
        <a href="../utilities/delete_product.php?id=<?php echo $row['id']; ?>" class="btn btn-delete"
           onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce produit ?');">Supprimer</a>
      </div>
    </div>
  <?php endwhile; ?>
</div>
</body>
</html>
