<?php
require 'db.php';

// Vérifie si un fichier a été envoyé
if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
  $tmpName = $_FILES['image']['tmp_name'];
  $filename = basename($_FILES['image']['name']);
  $targetDir = 'uploads/';
  $targetPath = $targetDir . $filename;

  // Crée le dossier s’il n’existe pas
  if (!is_dir($targetDir)) {
    mkdir($targetDir, 0755, true);
  }

  // Déplace le fichier
  move_uploaded_file($tmpName, $targetPath);

  // Sauvegarde dans la BDD
  $commentaire = $_POST['commentaire'];
  $stmt = $conn->prepare("INSERT INTO galerie (image, commentaire) VALUES (?, ?)");
  $stmt->execute([$targetPath, $commentaire]);

  // Redirection
  header("Location: index.php#galerie");
  exit;
}
?>
