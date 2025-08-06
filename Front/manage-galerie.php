<?php
require 'db.php';

// AJOUT
if (isset($_POST['add'])) {
  $image = $_POST['image'];
  $commentaire = $_POST['commentaire'];
  $stmt = $conn->prepare("INSERT INTO galerie (image, commentaire) VALUES (?, ?)");
  $stmt->execute([$image, $commentaire]);
}

// SUPPRESSION
if (isset($_GET['delete'])) {
  $id = intval($_GET['delete']);
  $stmt = $conn->prepare("DELETE FROM galerie WHERE id = ?");
  $stmt->execute([$id]);
  header("Location: admin-dashboard.php?page=galerie");
  exit;
}

// MODIFICATION
if (isset($_POST['update'])) {
  $id = $_POST['id'];
  $image = $_POST['image'];
  $commentaire = $_POST['commentaire'];
  $stmt = $conn->prepare("UPDATE galerie SET image = ?, commentaire = ? WHERE id = ?");
  $stmt->execute([$image, $commentaire, $id]);
}

// RÉCUPÉRATION
$stmt = $conn->query("SELECT * FROM galerie");
$images = $stmt->fetchAll();
?>

<h2>🖼️ Gestion de la galerie</h2>

<!-- Formulaire d'ajout -->
<form method="post">
  <input type="text" name="image" placeholder="URL de l’image" required><br>
  <textarea name="commentaire" placeholder="Commentaire" required></textarea><br>
  <button type="submit" name="add">➕ Ajouter</button>
</form>

<hr>

<!-- Affichage des images existantes -->
<table border="1" cellpadding="10">
  <tr>
    <th>Image</th>
    <th>Commentaire</th>
    <th>Actions</th>
  </tr>
  <?php foreach ($images as $img): ?>
  <tr>
    <form method="post">
      <td><input type="text" name="image" value="<?= htmlspecialchars($img['image']) ?>" style="width:250px;"></td>
      <td><textarea name="commentaire"><?= htmlspecialchars($img['commentaire']) ?></textarea></td>
      <td>
        <input type="hidden" name="id" value="<?= $img['id'] ?>">
        <button type="submit" name="update">💾 Modifier</button>
        <a href="admin-dashboard.php?page=galerie&delete=<?= $img['id'] ?>" onclick="return confirm('Supprimer cette image ?')">🗑️ Supprimer</a>
      </td>
    </form>
  </tr>
  <?php endforeach; ?>
</table>
