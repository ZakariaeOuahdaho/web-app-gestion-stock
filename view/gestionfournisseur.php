<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Fournisseurs</title>
    <style>
        body {
            margin: 0;
            font-family: 'Roboto', sans-serif;
            background: linear-gradient(135deg, #e6f0fc, #d4e4f8);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            overflow: hidden;
            text-align: center;
        }

        .container {
            max-width: 1200px;
            animation: fadeIn 1.2s ease;
        }

        .welcome-message {
            font-size: 32px;
            color: #005bb5;
            font-weight: 700;
            margin-bottom: 15px;
            line-height: 1.5;
        }

        .sub-message {
            font-size: 20px;
            color: #0078d7;
            font-weight: 500;
            margin-bottom: 50px;
        }

        .button-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 40px;
            justify-content: center;
        }

        .button {
            background: #0078d7;
            color: white;
            font-size: 24px;
            font-weight: bold;
            border: none;
            border-radius: 20px;
            cursor: pointer;
            width: 300px;
            height: 300px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease-in-out;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .button:hover {
            background: #005bb5;
            transform: translateY(-10px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.3);
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>
<div class="container">
    <div class="welcome-message">
        Bienvenue dans la gestion des Fournisseurs
    </div>
    <div class="sub-message">
        Veuillez choisir une des quatre rubriques
    </div>
    <div class="button-grid">
        <form action="aliments.php" method="GET">
            <button class="button" type="submit">Fournisseur d’aliments</button>
        </form>
        <form action="electromenager.php" method="GET">
            <button class="button" type="submit">Fournisseur de matériel électroménager</button>
        </form>
        <form action="vetements.php" method="GET">
            <button class="button" type="submit">Fournisseur de vêtements</button>
        </form>
        <form action="electronique.php" method="GET">
            <button class="button" type="submit">Fournisseur de matériel électronique</button>
        </form>
    </div>
</div>
</body>
</html>


