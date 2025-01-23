<?php
session_start();
require_once '../conf/database.php';


$totalProducts = $conn->query("SELECT COUNT(*) as total FROM produits")->fetch_assoc()['total'];
$totalValue = $conn->query("SELECT SUM(quantite * prix_unitaire) as total FROM produits")->fetch_assoc()['total'];
$lowStock = $conn->query("SELECT COUNT(*) as total FROM produits WHERE quantite <= 20")->fetch_assoc()['total'];
$outOfStock = $conn->query("SELECT COUNT(*) as total FROM produits WHERE quantite = 0")->fetch_assoc()['total'];


$topExpensive = $conn->query("SELECT * FROM produits ORDER BY prix_unitaire DESC LIMIT 5");


$topQuantity = $conn->query("SELECT * FROM produits ORDER BY quantite DESC LIMIT 5");
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard - Gestion des Stocks</title>
  <link rel="stylesheet" href="../css/stock_pagestyle.css">
  <style>
    .dashboard-container {
      padding: 20px;
    }

    .stats-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 20px;
      margin-bottom: 30px;
    }

    .stat-card {
      background: white;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 2px 4px rgba(0,0,0,0.1);
      text-align: center;
    }

    .stat-card h3 {
      color: #666;
      margin-bottom: 10px;
      font-size: 16px;
    }

    .stat-value {
      font-size: 24px;
      font-weight: bold;
      color: #4a90e2;
    }

    .tables-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
      gap: 20px;
    }

    .table-card {
      background: white;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }

    .table-card h3 {
      color: #333;
      margin-bottom: 15px;
      padding-bottom: 10px;
      border-bottom: 2px solid #4a90e2;
    }

    .dashboard-table {
      width: 100%;
      border-collapse: collapse;
    }

    .dashboard-table th,
    .dashboard-table td {
      padding: 10px;
      text-align: left;
      border-bottom: 1px solid #eee;
    }

    .dashboard-table th {
      background-color: #f8f9fa;
      font-weight: bold;
    }

    .price {
      color: #2ecc71;
      font-weight: bold;
    }

    .quantity {
      font-weight: bold;
    }
  </style>
</head>
<body>
<div class="sidebar">
  <h2>Gestion Produits</h2>
  <a href="../view/pagedaccueil.php">Retour au Home</a>
  <a href="../view/stock_page.php">Gestion Stock</a>
  <a href="dashboard.php">Dashboard</a>
  <a href="../view/gestionfournisseur.php">Gestion des fournisseurs</a>
  <a href="../conf/logout.php">Log out</a>
  <div class="background-animation">
    <div class="bubble"></div>
    <div class="bubble"></div>
    <div class="bubble"></div>
    <div class="bubble"></div>
  </div>
</div>

<div class="main-content">
  <div class="dashboard-container">
    <h1>Dashboard</h1>


    <div class="stats-grid">
      <div class="stat-card">
        <h3>Total des Produits</h3>
        <div class="stat-value"><?php echo $totalProducts; ?></div>
      </div>

      <div class="stat-card">
        <h3>Valeur Totale du Stock</h3>
        <div class="stat-value"><?php echo number_format($totalValue, 2); ?> MAD</div>
      </div>

      <div class="stat-card">
        <h3>Produits en Stock Faible</h3>
        <div class="stat-value"><?php echo $lowStock; ?></div>
      </div>

      <div class="stat-card">
        <h3>Produits en Rupture</h3>
        <div class="stat-value"><?php echo $outOfStock; ?></div>
      </div>
    </div>

    <div class="tables-grid">
      <div class="table-card">
        <h3>Top 5 - Prix les plus élevés</h3>
        <table class="dashboard-table">
          <thead>
          <tr>
            <th>Produit</th>
            <th>Prix</th>
            <th>Quantité</th>
          </tr>
          </thead>
          <tbody>
          <?php while($product = $topExpensive->fetch_assoc()): ?>
            <tr>
              <td><?php echo htmlspecialchars($product['nom']); ?></td>
              <td class="price"><?php echo number_format($product['prix_unitaire'], 2); ?> MAD</td>
              <td class="quantity"><?php echo $product['quantite']; ?></td>
            </tr>
          <?php endwhile; ?>
          </tbody>
        </table>
      </div>

      <div class="table-card">
        <h3>Top 5 - Quantités les plus importantes</h3>
        <table class="dashboard-table">
          <thead>
          <tr>
            <th>Produit</th>
            <th>Quantité</th>
            <th>Prix</th>
          </tr>
          </thead>
          <tbody>
          <?php while($product = $topQuantity->fetch_assoc()): ?>
            <tr>
              <td><?php echo htmlspecialchars($product['nom']); ?></td>
              <td class="quantity"><?php echo $product['quantite']; ?></td>
              <td class="price"><?php echo number_format($product['prix_unitaire'], 2); ?> MAD</td>
            </tr>
          <?php endwhile; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
</body>
</html>
