<?php
session_start();
if (!isset($_SESSION['admin'])) {
  header("Location: admin-login.php");
  exit();
}
require 'db.php';
?>





<!DOCTYPE html>
<html>
<head>
  <title>Dashboard Administrateur</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      margin: 0;
      padding: 0;
    }

    .container {
      max-width: 800px;
      margin: 40px auto;
      background-color: #fff;
      padding: 30px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
      border-radius: 8px;
    }

    h1, h2 {
      text-align: center;
      color: #333;
    }

    p {
      text-align: center;
      color: #555;
    }

    form {
      text-align: center;
      margin-bottom: 30px;
    }

    input[type="password"] {
      padding: 10px;
      width: 60%;
      margin-bottom: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    button {
      padding: 10px 20px;
      background-color: #007bff;
      color: white;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    button:hover {
      background-color: #0056b3;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }

    th, td {
      padding: 12px;
      border: 1px solid #ccc;
      text-align: left;
    }

    th {
      background-color: #f0f0f0;
    }

    .success {
      background-color: #d4edda;
      color: #155724;
      padding: 10px;
      border: 1px solid #c3e6cb;
      margin-bottom: 20px;
      text-align: center;
      border-radius: 4px;
    }

    .link-button {
      display: block;
      text-align: center;
      margin-top: 30px;
    }

    .link-button a {
      text-decoration: none;
      color: #007bff;
      font-weight: bold;
    }

    .link-button a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>

<div style="position: absolute; top: 20px; right: 20px;">
  <a href="index.php" style="text-decoration: none; background: #007bff; color: white; padding: 8px 12px; border-radius: 5px;">
    ⬅️ Retour sur le site
  </a>

  </div>

  <div class="container">
    <h2>Bienvenue Administrateur</h2>
    <p>Vous êtes connecté avec succès !</p>

    <?php
    if (isset($_POST['change_pass'])) {
      $adminId = $_SESSION['admin'];
      $newHash = password_hash($_POST['new_pass'], PASSWORD_DEFAULT);

      $stmt = $conn->prepare("UPDATE administrateur SET Password_hash = ? WHERE ID_admin = ?");
      $stmt->execute([$newHash, $adminId]);
      echo "<div class='success'>🔐 Mot de passe mis à jour avec succès</div>";
    }
    ?>

    <form method="post">
      <input type="password" name="new_pass" placeholder="Nouveau mot de passe" required><br>
      <button type="submit" name="change_pass">Modifier le mot de passe</button>

    </form>

    <?php
    if (isset($_GET['delete'])) {
        $id = intval($_GET['delete']);
        $stmt = $conn->prepare("DELETE FROM prospect WHERE ID_prospect = ?");
        $stmt->execute([$id]);
        header("Location: admin-dashboard.php?deleted=1");
        exit;
    }

    $stmt = $conn->query("SELECT * FROM prospect");
    $prospects = $stmt->fetchAll(PDO::FETCH_ASSOC);
    ?>

    <?php if (isset($_GET['deleted']) && $_GET['deleted'] == 1): ?>
      <div class="success">✅ Prospect supprimé avec succès.</div>
    <?php endif; ?>

    <h1>📋 Liste des prospects</h1>
    <table>
      <tr>
        <th>Nom</th>
        <th>Email</th>
        <th>Message</th>
        <th>Action</th>
      </tr>
      <?php foreach ($prospects as $prospect): ?>
      <tr>
        <td><?= htmlspecialchars($prospect['Nom_prospect']) ?></td>
        <td><?= htmlspecialchars($prospect['Mail_prospect']) ?></td>
        <td><?= htmlspecialchars($prospect['Message']) ?></td>
        <td>
          <a href="?delete=<?= $prospect['ID_prospect'] ?>" onclick="return confirm('Supprimer ce prospect ?')">🗑️ Effacer</a>
        </td>
      </tr>
      <?php endforeach; ?>
    </table>

    <div class="link-button">
      <a href="admin-dashboard.php?page=presentation">📝 Modifier la présentation</a>
    </div><br>

    <div class="link-button">
      <a href="admin-dashboard.php?page=prestations">Gérer les prestations</a>
    </div><br>

    <div class="link-button">
      <a href="admin-dashboard.php?page=galerie">Gérer la galerie</a>
      </div>



    <?php
    $page = $_GET['page'] ?? 'home';
    if ($page === 'presentation') {
        include 'edit-presentation.php';
    }
    ?>
    <?php
    $page = $_GET['page'] ?? 'home';
    if ($page === 'prestations') {
    include 'manage-prestations.php';
    }
    ?>
    <?php
    if ($page === 'galerie') {
  include 'manage-galerie.php';
}
?>

<form action="upload.php" method="POST" enctype="multipart/form-data" style="margin-bottom: 40px;">
  <label for="image">Choisir une image :</label><br>
  <input type="file" name="image" accept="image/*" required><br><br>

  <label for="commentaire">Commentaire :</label><br>
  <textarea name="commentaire" rows="3" cols="40" required></textarea><br><br>

  <button type="submit">Envoyer</button>
</form>

  </div>
</body>
</html>


