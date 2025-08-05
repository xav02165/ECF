<?php
session_start();
require 'db.php'; // Assure-toi que ce fichier contient la connexion PDO

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $username = $_POST['username'];
  $password = $_POST['password'];

  // Recherche dans la table administrateur
  $stmt = $conn->prepare("SELECT ID_admin, Password_hash FROM administrateur WHERE Nom = ?");
  $stmt->execute([$username]);
  $admin = $stmt->fetch();

  if ($admin && $password === $admin['Password_hash']) {
 
    $_SESSION['admin'] = $admin['ID_admin'];
    header("Location: admin-dashboard.php"); // Redirige vers le panneau de contrôle
    exit();
  } else {
    echo "<p style='color:red;'>❌ Identifiants incorrects</p>";
  }
}
?>