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
    <img src="img/presentation.jpg" alt="Photo coach" class="responsive-img" />
    <div>
      <h2>Coaching Musculation</h2>
      <p>Spécialiste en renforcement physique et préparation de compétiteurs. Programmes sur-mesure et suivi intensif.</p>
    </div>
  </section>

  <section id="services" class="container grid">
    <div><h3>Coaching personnalisé</h3><p>Plans adaptés à ton niveau et à tes objectifs.</p></div>
    <div><h3>Préparation compétition</h3><p>Séchage, posing, mental... un vrai accompagnement complet.</p></div>
    <div><h3>Suivi en ligne</h3><p>Check-ins hebdo, messagerie et conseils nutritifs à distance.</p></div>
  </section>

  <section id="galerie" class="container grid gallery">
    <figure><img src="img/realisation1.jpg" alt="Photo 1"><figcaption>Transformation 12 semaines</figcaption></figure>
    <figure><img src="img/realisation2.jpg" alt="Photo 2"><figcaption>Compétition régionale</figcaption></figure>
    <figure><img src="img/realisation3.jpg" alt="Photo 3"><figcaption>Travail postural</figcaption></figure>
    <figure><img src="img/realisation4.jpg" alt="Photo 4"><figcaption>Client avant/après</figcaption></figure>
    <figure><img src="img/realisation5.jpg" alt="Photo 5"><figcaption>Renforcement explosif</figcaption></figure>
    <figure><img src="img/realisation6.jpg" alt="Photo 6"><figcaption>Backstage compétition</figcaption></figure>
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
</body>
</html>
