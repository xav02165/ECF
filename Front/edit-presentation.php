<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $titre = $_POST['titre'];
  $texte = $_POST['texte'];
  $image = $_POST['image']; // ou gérer un upload

  $stmt = $conn->prepare("UPDATE presentation SET titre = ?, texte = ?, image = ? WHERE id = 1");
  $stmt->execute([$titre, $texte, $image]);

  $_SESSION['updated'] = true;
  header("Location: edit-presentation.php");
  exit;
}

$stmt = $conn->query("SELECT * FROM presentation LIMIT 1");
$presentation = $stmt->fetch();
?>

<?php if (isset($_SESSION['updated'])): ?>
  <div style="background-color: #d4edda; padding: 10px;">✅ Présentation mise à jour.</div>
  <?php unset($_SESSION['updated']); ?>
<?php endif; ?>

<form method="POST">
  <label>Titre</label><br>
  <input type="text" name="titre" value="<?= htmlspecialchars($presentation['titre']) ?>"><br><br>

  <label>Texte</label><br>
  <textarea name="texte" rows="5"><?= htmlspecialchars($presentation['texte']) ?></textarea><br><br>

  <label>URL de l’image</label><br>
  <input type="text" name="image" value="<?= htmlspecialchars($presentation['image']) ?>"><br><br>

  <button type="submit">💾 Sauvegarder</button>
</form>

