<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gestionstock";

try {
  $conn = new mysqli($servername, $username, $password, $dbname, 3306);
  if ($conn->connect_error) {
    throw new Exception("Connexion à la base de données a échoué: " . $conn->connect_error);
  }
} catch (Exception $e) {
  $error = $e->getMessage();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = $conn->real_escape_string($_POST['username']);
  $password = $_POST['password'];

  $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
  $stmt->bind_param("s", $email);
  $stmt->execute();
  $result = $stmt->get_result();
  $user = $result->fetch_assoc();
  if ($user) {
    if($password == $user['password']) {
      $_SESSION['user_id'] = $user['id'];
      $_SESSION['email'] = $user['email'];
      header('Location: ../view/home.php');
      exit();
    } else {
      $error = 'Mot de passe incorrect';
    }
  } else {
    $error = 'Email non trouvé';
  }
  $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/login_style.css">
  <title>Page de Login</title>
</head>
<body>
<div class="container">
  <div class="welcome-section">
    <h1>Bienvenue au système de gestion des stocks</h1>
    <p>Vous n'avez pas de compte ?</p>
    <a href="register.php"><button type="button">S'inscrire</button></a>
  </div>
  <div class="login-section">
    <h2>Connexion</h2>
    <?php if (isset($error)) : ?>
      <p style="color: red;"><?= htmlspecialchars($error); ?></p>
    <?php endif; ?>
    <form method="POST" action="">
      <div class="form-group">
        <input type="text" name="username" placeholder="Email" required>
        <span class="icon">&#128100;</span>
      </div>
      <div class="form-group">
        <input type="password" name="password" placeholder="Mot de passe" required>
        <span class="icon">&#128274;</span>
      </div>
      <button type="submit">Connexion</button>
    </form>
  </div>
</div>
