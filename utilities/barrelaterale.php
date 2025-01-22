<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Produits</title>
    <style>
        body {
            margin: 0;
            font-family: 'Roboto', sans-serif;
            display: flex;
            height: 100vh;
            background: #f3f4f6;
        }

        .sidebar {
            width: 300px;
            height: 100%;
            background-color: #0078d7;
            color: white;
            display: flex;
            flex-direction: column;
            align-items: center;
            box-shadow: 3px 0 15px rgba(0, 0, 0, 0.2);
            padding-top: 20px;
        }

        .sidebar h2 {
            font-size: 24px;
            margin-bottom: 30px;
            letter-spacing: 2px;
            font-weight: 700;
        }

        .sidebar a {
            text-decoration: none;
            color: white;
            font-size: 16px;
            padding: 12px 20px;
            width: 80%;
            text-align: center;
            margin: 10px 0;
            border-radius: 8px;
            background: rgba(255, 255, 255, 0.1);
            transition: all 0.3s ease;
            font-weight: 500;
        }

        .sidebar a:hover {
            background: rgba(255, 255, 255, 0.3);
            transform: scale(1.02);
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }

        .main-content {
            flex: 1;
            padding: 20px;
            background: #f9fafb;
        }

        .sidebar, .main-content {
            animation: fadeIn 1s ease;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }
    </style>
</head>
<body>
<div class="sidebar">
    <h2>Gestion Produits</h2>
    <a href="#ajouter-produit">Ajouter un produit</a>
    <a href="#modifier-produit">Modifier un produit</a>
    <a href="#supprimer-produit">Supprimer un produit</a>
    <a href="#disponibilite-produit">Disponibilité</a>
    <a href="#gestion-fournisseur">Gestion fournisseur</a>
</div>
<div class="main-content"></div>
</body>
</html>
