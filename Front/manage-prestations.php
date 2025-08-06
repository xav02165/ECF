<?php
require 'db.php';

// AJOUT
if (isset($_POST['add'])) {
  $titre = $_POST['titre'];
  $desc = $_POST['description'];
  $stmt = $conn->prepare("INSERT INTO prestations (titre, description) VALUES (?, ?)");
  $stmt->execute([$titre, $desc]);
}

// SUPPRESSION
if (isset($_GET['delete'])) {
  $id = intval($_GET['delete']);
  $stmt = $conn->prepare("DELETE FROM prestations WHERE id = ?");
  $stmt->execute([$id]);
  header("Location: admin-dashboard.php?page=prestations");
  exit;
}

// MODIFICATION
if (isset($_POST['update'])) {
  $id = $_POST['id'];
  $titre = $_POST['titre'];
  $desc = $_POST['description'];
  $stmt = $conn->prepare("UPDATE prestations SET titre = ?, description = ? WHERE id = ?");
  $stmt->execute([$titre, $desc, $id]);
}

// RÉCUPÉRATION
$stmt = $conn->query("SELECT * FROM prestations");
$prestations = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<h2>🛠️ Gérer les prestations</h2>

<!-- Formulaire d'ajout -->
<form method="post">
  <input type="text" name="titre" placeholder="Titre de la prestation" required><br>
  <textarea name="description" placeholder="Description" required></textarea><br>
  <button type="submit" name="add">➕ Ajouter</button>
</form>

<hr>

<!-- Liste des prestations -->
<table border="1" cellpadding="10">
  <tr>
    <th>Titre</th>
    <th>Description</th>
    <th>Actions</th>
  </tr>
  <?php foreach ($prestations as $p): ?>
  <tr>
    <form method="post">
      <td>
        <input type="text" name="titre" value="<?= htmlspecialchars($p['titre']) ?>">
      </td>
      <td>
        <textarea name="description"><?= htmlspecialchars($p['description']) ?></textarea>
      </td>
      <td>
        <input type="hidden" name="id" value="<?= $p['id'] ?>">
        <button type="submit" name="update">💾 Modifier</button>
        <a href="admin-dashboard.php?page=prestations&delete=<?= $p['id'] ?>" onclick="return confirm('Supprimer cette prestation ?')">🗑️ Supprimer</a>
      </td>
    </form>
  </tr>
  <?php endforeach; ?>
</table>
