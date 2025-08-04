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
    </nav>
  </header>

  <section id="presentation" class="container">
    <img src="image/profil.jpg" alt="Photo coach" class="responsive-img" />
    <div>
      <h2>Coaching Musculation</h2>
      <p>Spécialiste en renforcement physique et préparation de compétiteurs. Profites de plus de 30ans d'experiences!.</p>
    </div>
  </section>

<div class="overlay-container">
  <section class="ta-section">

  <section id="services" class="container grid">
    <div><h3>Coaching personnalisé</h3><p>Plans adaptés à ton niveau et à tes objectifs.</p></div>
    <div><h3>Préparation compétition</h3><p>Séchage, posing, mental... un vrai accompagnement complet.</p></div>
    <div><h3>Suivi en ligne</h3><p>Check-ins hebdo, messagerie et conseils nutritifs à distance.</p></div>
  </section>

  <section id="galerie" class="container grid gallery">
    <figure><img src="image/bilan.jpg" height="200px" width="200px" alt="Photo 1"><figcaption>Transformation 12 semaines</figcaption></figure>
    <figure><img src="image/competition.jpg" height="200px" width="200px" alt="Photo 2"><figcaption>Compétition nationale</figcaption></figure>
    <figure><img src="image/decharge.jpg" height="200px" width="200px" alt="Photo 3"><figcaption>Travail postural</figcaption></figure>
    <figure><img src="image/lecoach.jpg" height="200px" width="200px" alt="Photo 4"><figcaption>Client avant/après</figcaption></figure>
    <figure><img src="image/competitionaffiche.jpg" height="200px" width="200px" alt="Photo 5"><figcaption>Féderation naturelle</figcaption></figure>
    <figure><img src="image/nutrition.jpg" height="200px" width="200px" alt="Photo 6"><figcaption>Nutrition</figcaption></figure>
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

</body>
</html>
