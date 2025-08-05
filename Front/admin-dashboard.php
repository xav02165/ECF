


<?php
session_start();
if (!isset($_SESSION['admin'])) {
  header("Location: admin-login.php");
  exit();
}
?>

<h2>Bienvenue Administrateur</h2>
<p>Vous êtes connecté avec succès !</p>

<form method="post">
  <input type="password" name="new_pass" placeholder="Nouveau mot de passe" required><br>
  <button type="submit" name="change_pass">Modifier le mot de passe</button>
</form>

<?php
require 'db.php';

if (isset($_POST['change_pass'])) {
  $adminId = $_SESSION['admin'];
  $newHash = password_hash($_POST['new_pass'], PASSWORD_DEFAULT);

  $stmt = $conn->prepare("UPDATE administrateur SET Password_hash = ? WHERE ID_admin = ?");
  $stmt->execute([$newHash, $adminId]);
  echo "<p style='color:green;'>🔐 Mot de passe mis à jour avec succès</p>";
}
?>

