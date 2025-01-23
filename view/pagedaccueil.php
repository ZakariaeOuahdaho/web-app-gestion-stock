<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <style>
        body {
            margin: 0;
            font-family: 'Arial', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(135deg, #0078d7, #00a1f1);
            color: white;
            overflow: hidden;
        }

        .container {
            text-align: center;
            animation: fadeIn 1s ease-in-out;
        }

        h1 {
            font-size: 3em;
            margin-bottom: 20px;
            letter-spacing: 2px;
        }

        p {
            font-size: 1.2em;
            margin-bottom: 40px;
        }

        .buttons {
            display: flex;
            justify-content: center;
            gap: 20px;
        }

        .buttons a {
            text-decoration: none;
            color: white;
            background: rgba(255, 255, 255, 0.2);
            padding: 15px 30px;
            border-radius: 25px;
            font-size: 1em;
            font-weight: bold;
            transition: all 0.4s ease;
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.2);
        }

        .buttons a:hover {
            background: white;
            color: #0078d7;
            transform: translateY(-5px) scale(1.1);
            box-shadow: 0px 8px 20px rgba(255, 255, 255, 0.4);
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: scale(0.9);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        .background-animation {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: -1;
        }

        .circle {
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.2);
            animation: float 15s infinite ease-in-out;
            opacity: 0.6;
        }

        .circle:nth-child(1) {
            width: 150px;
            height: 150px;
            top: 10%;
            left: 15%;
            animation-delay: 0s;
        }

        .circle:nth-child(2) {
            width: 200px;
            height: 200px;
            top: 40%;
            left: 70%;
            animation-delay: 3s;
        }

        .circle:nth-child(3) {
            width: 100px;
            height: 100px;
            top: 70%;
            left: 20%;
            animation-delay: 6s;
        }

        @keyframes float {
            0% {
                transform: translateY(0) scale(1);
            }
            50% {
                transform: translateY(-20px) scale(1.2);
            }
            100% {
                transform: translateY(0) scale(1);
            }
        }
    </style>
</head>
<body>
<div class="background-animation">
    <div class="circle"></div>
    <div class="circle"></div>
    <div class="circle"></div>
</div>
<div class="container">
    <h1>Bienvenue !</h1>
    <p>Veuillez vous connecter ou vous inscrire pour continuer.</p>
    <div class="buttons">
        <a href="../conf/login.php">Se connecter</a>
        <a href="../conf/register.php">S'inscrire</a>
    </div>
</div>
</body>
</html>
