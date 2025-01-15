<?php
session_start();
include("database.php");

// Si l'utilisateur est déjà connecté, rediriger vers le dashboard
if(isset($_SESSION['user_id'])) {
    header("Location: ../admin/dashboard.php");
    exit();
}

$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = $_POST['password'];
    
    if(empty($username) || empty($password)) {
        $error = "Tous les champs sont obligatoires";
    } else {
        // Vérifier les identifiants
        $query = "SELECT id, username, password, role FROM users WHERE username = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if($result->num_rows == 1) {
            $user = $result->fetch_assoc();
            // Vérifier le mot de passe
            if(password_verify($password, $user['password'])) {
                // Créer la session
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['role'] = $user['role'];
                
                // Rediriger vers le dashboard
                header("Location: ../admin/dashboard.php");
                exit();
            } else {
                $error = "Nom d'utilisateur ou mot de passe incorrect";
            }
        } else {
            $error = "Nom d'utilisateur ou mot de passe incorrect";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - Gestion de Stock</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/login.css">
</head>
<body>
    <div class="login-container">
        <div class="login-box">
            <h2>Connexion</h2>
            <?php if(!empty($error)): ?>
                <div class="alert alert-danger">
                    <?php echo $error; ?>
                </div>
            <?php endif; ?>
            
            <form method="POST" action="">
                <div class="form-group">
                    <label for="username">Nom d'utilisateur</label>
                    <input type="text" id="username" name="username" required>
                </div>
                
                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input type="password" id="password" name="password" required>
                </div>
                
                <button type="submit" class="login-btn">Se connecter</button>
            </form>
        </div>
    </div>
</body>
</html>