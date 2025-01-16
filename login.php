<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page de Login</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #6a11cb, #2575fc);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #fff;
            overflow: hidden;
        }
        .container {
            display: flex;
            width: 100%;
            max-width: 1200px;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.1);
            background: #fff;
            height: 600px;
        }
        .welcome-section {
            background-color: #5b6be8;
            color: #fff;
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            padding: 40px;
        }

        .welcome-section h1 {
            font-size: 3.2em;
            margin-bottom: 20px;
            font-weight: 600;
            letter-spacing: 2px;
        }

        .welcome-section p {
            font-size: 1.3em;
            margin-bottom: 20px;
        }
        .welcome-section button {
            background-color: #fff;
            color: #5b6be8;
            border: none;
            padding: 12px 30px;
            font-size: 1.1em;
            cursor: pointer;
            border-radius: 30px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15);
            transition: 0.3s;
        }
        .welcome-section button:hover {
            background-color: #ddd;
            transform: translateY(-2px);
        }
        .login-section {
            flex: 1;
            padding: 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            background-color: #f7f7f7;
        }

        .login-section h2 {
            font-size: 2.8em;
            color: #333;
            margin-bottom: 20px;
            font-weight: 700;
            letter-spacing: 1px;
        }

        .form-group {
            position: relative;
            margin-bottom: 20px;
        }

        .form-group input {
            width: 100%;
            padding: 14px 18px;
            font-size: 1.1em;
            border: 1px solid #ddd;
            border-radius: 50px;
            outline: none;
            transition: border-color 0.3s ease-in-out, box-shadow 0.3s ease;
            background-color: #f0f0f0;
        }

        .form-group input:focus {
            border-color: #5b6be8;
            box-shadow: 0 0 8px rgba(91, 107, 232, 0.5);
        }

        .form-group .icon {
            position: absolute;
            top: 50%;
            right: 15px;
            transform: translateY(-50%);
            font-size: 1.5em;
            color: #aaa;
        }
        .login-section button {
            background-color: #5b6be8;
            color: #fff;
            border: none;
            padding: 14px 30px;
            font-size: 1.2em;
            cursor: pointer;
            border-radius: 50px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s, transform 0.3s;
        }

        .login-section button:hover {
            background-color: #4a5cc2;
            transform: translateY(-2px);
        }
        .social-login {
            display: flex;
            justify-content: center;
            margin-top: 30px;
        }

        .social-login button {
            background-color: #f5f5f5;
            border: 1px solid #ccc;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 12px;
            transition: background-color 0.3s, transform 0.3s;
        }

        .social-login button:hover {
            background-color: #ddd;
            transform: translateY(-2px);
        }
        .social-login i {
            font-size: 1.3em;
            color: #333;
        }
        @media (max-width: 768px) {
            .container {
                flex-direction: column;
                height: auto;
                width: 100%;
            }
            .welcome-section, .login-section {
                flex: none;
                width: 100%;
            }
            .welcome-section h1 {
                font-size: 2.5em;
            }
            .login-section h2 {
                font-size: 2.2em;
            }
        }
    </style>
</head>
<body>
<div class="container">
    <div class="welcome-section">
        <h1>Bienvenue au système de gestion des stocks</h1>
        <p>Vous n'avez pas de compte ?</p>
        <button>S'inscrire</button>
    </div>
    <div class="login-section">
        <h2>Connexion</h2>
        <?php if (isset($error)) : ?>
            <p style="color: red;"><?= htmlspecialchars($error); ?></p>
        <?php endif; ?>
        <form method="POST" action="index.php">
            <div class="form-group">
                <input type="text" name="username" placeholder="Nom d'utilisateur" required>
                <span class="icon">&#128100;</span>
            </div>
            <div class="form-group">
                <input type="password" name="password" placeholder="Mot de passe" required>
                <span class="icon">&#128274;</span>
            </div>
            <button type="submit">Connexion</button>
        </form>
        <div class="social-login">
            <button><i class="fab fa-facebook-f"></i></button>
            <button><i class="fab fa-google"></i></button>
            <button><i class="fab fa-twitter"></i></button>
        </div>
    </div>
</div>
</body>
</html>
