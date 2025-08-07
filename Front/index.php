<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DXProCoaching</title>

  
  <link rel="stylesheet" href="reset.css"> 
  <link rel="stylesheet" href="style.css"> 
</head>
<body>

  <!-- ===== HEADER & NAVIGATION ===== -->
  <header>
    <nav class="container">
      <!-- Logo du site -->
      <div class="logo">DXProCoaching</div>

      <!-- Menu responsive (hamburger) -->
      <input type="checkbox" id="menu-toggle" />
      <label for="menu-toggle" class="menu-icon">&#9776;</label>

      <!-- Menu de navigation -->
      <ul class="menu">
        <li><a href="#presentation">Présentation</a></li>
        <li><a href="#services">Services</a></li>
        <li><a href="#galerie">Galerie</a></li>
        <li><a href="#contact">Contact</a></li>
      </ul>

      <!-- Bouton Admin -->
      <a href="#" class="admin-button" title="Accès Admin" onclick="showAdminLogin()">
        <i class="fas fa-dumbbell"></i> Admin
      </a>
    </nav>

    <!-- ===== FORMULAIRE DE CONNEXION ADMIN ===== -->
    <div id="admin-login-container" class="full-page-login" style="display: none;">
      <form class="admin-login-form" action="../admin/admin-login.php" method="post">
        <h2>Accès Administrateur</h2>
        <input type="text" placeholder="Identifiant" name="username" required />
        <input type="password" placeholder="Mot de passe" name="password" required />
        <button type="submit">Connexion</button>
      </form>
    </div>
  </header>

  <!-- ===== SECTION PRÉSENTATION ===== -->
  <?php
  include '../admin/db.php';
  $stmt = $conn->query("SELECT * FROM presentation LIMIT 1");
  $presentation = $stmt->fetch();
  ?>
  <section id="presentation" class="container">
    <img src="<?= htmlspecialchars($presentation['image']) ?>" alt="Photo coach" class="responsive-img" />
    <div>
      <h2><?= htmlspecialchars($presentation['titre']) ?></h2>
      <p><?= nl2br(htmlspecialchars($presentation['texte'])) ?></p>
    </div>
  </section>

  <!-- ===== SECTION SERVICES ===== -->
  <section id="services" class="services-grid">
    <?php
    require '../admin/db.php';
    $stmt = $conn->query("SELECT * FROM prestations");
    while ($p = $stmt->fetch()) {
      echo '<div class="service-box">';
      echo '<h3>' . htmlspecialchars($p['titre']) . '</h3>';
      echo '<p>' . nl2br(htmlspecialchars($p['description'])) . '</p>';
      echo '</div>';
    }
    ?>
  </section>

  <!-- ===== SECTION GALERIE ===== -->
  <section id="galerie" class="container grid gallery">
    <?php
    require '../admin/db.php';
    $stmt = $conn->query("SELECT * FROM galerie");
    while ($g = $stmt->fetch()) {
      echo '<figure>';
      echo '<img src="' . htmlspecialchars($g['image']) . '" height="200px" width="200px" alt="Image galerie">';
      echo '<figcaption>' . htmlspecialchars($g['commentaire']) . '</figcaption>';
      echo '</figure>';
    }
    ?>
  </section>

  <!-- ===== SECTION CONTACT ===== -->
  <div class="centrage">
    <section id="contact" class="container">
      <h2>Contact</h2>

      <!-- Formulaire de contact -->
      <form>
        <input type="text" placeholder="Nom" required />
        <input type="email" placeholder="Email" required />
        <textarea placeholder="Message" required></textarea>
        <button type="submit">Envoyer</button>
      </form>

      <!-- Coordonnées -->
      <p>📍 123 Rue du Muscle, Lille<br>📞 06 12 34 56 78</p>
    </section>
  </div>

  <!-- ===== PIED DE PAGE ===== -->
  <footer class="container">
    <p><a href="#">Mentions légales</a></p>
    <div class="social">
      <a href="#">Instagram</a> | <a href="#">Facebook</a>
    </div>
    <p>&copy; DXProCoaching 2025</p>
  </footer>

  <!-- ===== SCRIPTS ===== -->
  <script src="script.js"></script>

</body>
</html>
