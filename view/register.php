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
  $nom = $conn->real_escape_string($_POST['nom']);
  $prenom = $conn->real_escape_string($_POST['prenom']);
  $email = $conn->real_escape_string($_POST['email']);
  $password = $_POST['password'];
  $confirm_password = $_POST['confirm_password'];
  $role = 'user';
  $errors = [];

  $check_email = $conn->prepare("SELECT id FROM user WHERE email = ?");
  $check_email->bind_param("s", $email);
  $check_email->execute();
  $result = $check_email->get_result();

  if ($result->num_rows > 0) {
    $errors[] = "Cet email est déjà utilisé";
  }
  if ($password !== $confirm_password) {
    $errors[] = "Les mots de passe ne correspondent pas";
  }

  if (empty($errors)) {
    $stmt = $conn->prepare("INSERT INTO users (nom, prenom, email, password, role) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $nom, $prenom, $email, $password, $role);

    if ($stmt->execute()) {
      $_SESSION['success_message'] = "Inscription réussie ! Vous pouvez maintenant vous connecter.";
      header('Location: index.php');
      exit();
    } else {
      $errors[] = "Erreur lors de l'inscription";
    }
    $stmt->close();
  }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/register.css">
  <title>Register</title>

</head>
<body>
<div class="register-container">
  <div class="register-form">
    <h2 style="text-align: center; margin-bottom: 20px;">Inscription</h2>

    <?php if (!empty($errors)): ?>
      <div class="error">
        <?php foreach ($errors as $error): ?>
          <p><?php echo htmlspecialchars($error); ?></p>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>

    <form method="POST" action="">
      <div class="form-group">
        <label for="nom">Nom</label>
        <input type="text" id="nom" name="nom" required
               value="<?php echo isset($_POST['nom']) ? htmlspecialchars($_POST['nom']) : ''; ?>">
      </div>

      <div class="form-group">
        <label for="prenom">Prénom</label>
        <input type="text" id="prenom" name="prenom" required
               value="<?php echo isset($_POST['prenom']) ? htmlspecialchars($_POST['prenom']) : ''; ?>">
      </div>

      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" required
               value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>">
      </div>

      <div class="form-group">
        <label for="password">Mot de passe</label>
        <input type="password" id="password" name="password" required>
      </div>

      <div class="form-group">
        <label for="confirm_password">Confirmer le mot de passe</label>
        <input type="password" id="confirm_password" name="confirm_password" required>
      </div>

      <button type="submit" class="register-btn">S'inscrire</button>
    </form>

    <div class="login-link">
      Déjà inscrit ? <a href="index.php">Connectez-vous ici</a>
    </div>
  </div>
</div>
</body>
</html>
