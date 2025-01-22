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
            background: #eef4fc;
            overflow: hidden;
        }

        .sidebar {
            width: 320px;
            height: 100%;
            background-color: #4a90e2;
            color: white;
            display: flex;
            flex-direction: column;
            align-items: center;
            box-shadow: 3px 0 15px rgba(0, 0, 0, 0.2);
            padding-top: 20px;
            position: relative;
            z-index: 2;
            overflow: hidden;
        }

        .sidebar h2 {
            font-size: 24px;
            margin-bottom: 30px;
            font-weight: 700;
            letter-spacing: 1px;
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
            background: rgba(255, 255, 255, 0.15);
            transition: all 0.3s ease;
            font-weight: 500;
            position: relative;
            z-index: 2;
        }

        .sidebar a:hover {
            background: rgba(255, 255, 255, 0.3);
            color: #eef4fc;
            transform: scale(1.05);
            box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.2);
        }

        .main-content {
            flex: 1;
            background: #eef4fc;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            color: #555;
            position: relative;
            z-index: 1;
        }

        .background-animation {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 0;
            overflow: hidden;
        }

        .bubble {
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.2);
            animation: float 10s infinite ease-in-out;
            opacity: 0.5;
        }

        .bubble:nth-child(1) {
            width: 120px;
            height: 120px;
            top: 10%;
            left: 20%;
            animation-delay: 0s;
        }

        .bubble:nth-child(2) {
            width: 150px;
            height: 150px;
            top: 40%;
            left: 70%;
            animation-delay: 2s;
        }

        .bubble:nth-child(3) {
            width: 80px;
            height: 80px;
            top: 75%;
            left: 30%;
            animation-delay: 4s;
        }

        .bubble:nth-child(4) {
            width: 100px;
            height: 100px;
            top: 85%;
            left: 80%;
            animation-delay: 6s;
        }

        @keyframes float {
            0% {
                transform: translateY(0) scale(1);
            }
            50% {
                transform: translateY(-20px) scale(1.1);
            }
            100% {
                transform: translateY(0) scale(1);
            }
        }
    </style>
</head>
<body>

<div class="sidebar">
    <h2>Gestion Produits</h2>
    <a href="ajouter_produit.php">Ajouter un produit</a>
    <a href="modifier_produit.php">Modifier un produit</a>
    <a href="supprimer_produit.php">Supprimer un produit</a>
    <a href="disponibilite_produit.php">Disponibilité du produit</a>
    <a href="gestion_fournisseur.php">Gestion des fournisseurs</a>
    <div class="background-animation">
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
    </div>
</div>
<div class="main-content">
    <p>Bienvenue dans la gestion des produits ! Sélectionnez une option dans le menu.</p>
</div>

</body>
</html>
