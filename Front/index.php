<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DXProCoaching</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="reset.css">
</head>
<body>
  <header>
    <nav class="container">
      <div class="logo">DXProCoaching</div>

      <input type="checkbox" id="menu-toggle" />
      <label for="menu-toggle" class="menu-icon">&#9776;</label>
      <ul class="menu">
        <li><a href="#presentation">Présentation</a></li>
        <li><a href="#services">Services</a></li>
        <li><a href="#galerie">Galerie</a></li>
        <li><a href="#contact">Contact</a></li>
      </ul>
      <a href="#" class="admin-button" title="Accès Admin" onclick="showAdminLogin()">
  <i class="fas fa-dumbbell"></i> Admin
</a>

    </nav>

   <!-- Panneau de connexion -->
<div id="admin-login-container" class="full-page-login" style="display: none;">
  <form class="admin-login-form" action="admin-login.php" method="post">
    <h2>Accès Administrateur</h2>
    <input type="text" placeholder="Identifiant" name="username" required />
    <input type="password" placeholder="Mot de passe" name="password" required />
    <button type="submit">Connexion</button>
  </form>
</div>


  </header>

<?php
include 'db.php';
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

  <section id="services" class="services-grid">
  <?php
  require 'db.php'; // ton fichier de connexion PDO
  $stmt = $conn->query("SELECT * FROM prestations");
  while ($p = $stmt->fetch()) {
    echo '<div class="service-box">';
    echo '<h3>' . htmlspecialchars($p['titre']) . '</h3>';
    echo '<p>' . nl2br(htmlspecialchars($p['description'])) . '</p>';
    echo '</div>';
  }
  ?>
</section>





  <section id="galerie" class="container grid gallery">
    <figure><img src="image/bilan.jpg" height="200px" width="200px" alt="Photo 1"><figcaption>Analyse des progrès physiques après 12 semaines.</figcaption></figure>
    <figure><img src="image/competition.jpg" height="200px" width="200px" alt="Photo 2"><figcaption>Championnat de France.</figcaption></figure>
    <figure><img src="image/decharge.jpg" height="200px" width="200px" alt="Photo 3"><figcaption>Diétetique calibrées.</figcaption></figure>
    <figure><img src="image/lecoach.jpg" height="200px" width="200px" alt="Photo 4"><figcaption>Compétition : intensité et dépassement de soi.</figcaption></figure>
    <figure><img src="image/competitionaffiche.jpg" height="200px" width="200px" alt="Photo 5"><figcaption>Fédération naturelle.</figcaption></figure>
    <figure><img src="image/nutrition.jpg" height="200px" width="200px" alt="Photo 6"><figcaption>Conseil et suivi diététique.</figcaption></figure>
  </section>


<div class="centrage">
  <section id="contact" class="container">
    <h2>Contact</h2>

    
    <form>
      <input type="text" placeholder="Nom" required />
      <input type="email" placeholder="Email" required />
      <textarea placeholder="Message" required></textarea>
      <button type="submit">Envoyer</button>
    </form>
    

    <p>📍 123 Rue du Muscle, Lille<br>📞 06 12 34 56 78</p>
  </section>
</div>

  <footer class="container">
    <p><a href="#">Mentions légales</a></p>
    <div class="social">
      <a href="#">Instagram</a> | <a href="#">Facebook</a>
    </div>
    <p>&copy; DXProCoaching 2025</p>
  </footer>

  </section>
</div>

<script src="script.js"></script>

</body>
</html>
