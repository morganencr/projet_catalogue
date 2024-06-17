<?php
include_once("components/navbar.php");
?>
<div id="myCarousel" class="carousel slide mb-6" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" class="active" aria-current="true" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item">
      <img src="components/img/imgplaymobilbaniere.jpg" height="500px" class="d-block w-100" alt="Description of Image 1">
      <div class="container">
        <div class="carousel-caption text-start">
          <h1>Laissez vos enfants créer leurs propres aventures avec Playmobil</h1>
          <p class="opacity-75">Consultez notre pack exclusif Playmobil</p>
          <p><a class="btn btn-lg btn-primary" href="#">En savoir plus</a></p>
        </div>
      </div>
    </div>
    <div class="carousel-item active">
      <img src="components/img/legobaniere.jpg" height="500px" class="d-block w-100" alt="Description of Image 2">
      <div class="container">
        <div class="carousel-caption">
          <h1>Laissez libre cours à leur imagination avec nos jeux de construction</h1>
          <p>Consultez notre meilleure vente LEGO</p>
          <p><a class="btn btn-lg btn-primary" href="#">En savoir plus</a></p>
        </div>
      </div>
    </div>
    <div class="carousel-item">
      <img src="components/img/jeuxboisbaniere.jpg" height="500px" class="d-block w-100" alt="Description of Image 3">
      <div class="container">
        <div class="carousel-caption text-end">
          <h1>Éveillez leurs sens avec nos jeux d'éveils en bois</h1>
          <p>Consultez notre jeu favori</p>
          <p><a class="btn btn-lg btn-primary" href="#">En savoir plus</a></p>
        </div>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
  <div id="nav-icones">
    <ul>
      <li><i class="fa-regular fa-credit-card fa-2x"></i>&nbsp;Paiement 100% sécurisé</li>
      <li><i class="fa-solid fa-shop fa-2x"></i>Retrait en magasin gratuit</li>
      <li><i class="kdo fa-solid fa-gift fa-2x"></i>Emballage cadeau gratuit</li>
    </ul>
  </div>

<section>
  <div class="container-promos">
    <h1>J'EN PROFITE</h1>
    <div id="photos-promo">
      <a href="promos.php"><img src="components/img/promo1.png" alt="photo promos"></a>
      <a href="promos.php"><img src="components/img/promo2.png" alt="photo promos"></a>
      <a href="promos.php"><img src="components/img/promo3.png" alt="photo promos"></a>
      <a href="promos.php"><img src="components/img/promo4.png" alt="photo promos"></a>
    </div>
  </div>
  <a id="btn-offre" href="promos.php"><button >Voir nos offres du moment</button></a>

  <div id="container-ventes">
  <h1>NOS MEILLEURES VENTES</h1>
  <div id="photos-ventes">
    <div class="row1">
    <div id="activitescreatives">
    <a href="activites-creatives.php"><img src="components/img/vente1.jpg" alt="photo meilleures ventes"></a>
    <p>Magic Sand - 35€</p>
    </div>
    <div id="jeuxsociete">
    <a href="jeuxdesociete.php"><img src="components/img/vente2.png" alt="photo meilleures ventes"></a>
    <p>Chass'Taupes - 25€</p>
    </div>
    <div id="jeuxbois">
    <a href="jeuxbois.php"><img src="components/img/vente3.png" alt="photo meilleures ventes"></a>
    <p>Boîte à outils - 28.99€</p>
    </div>
    </div>
    <div class="row2">
    <div id="jeuxext1">
    <a href="jeuxexterieur.php"><img src="components/img/vente4.png" alt="photo meilleures ventes"></a>
    <p>Toboggan - 700€</p>
    </div>
    <div id="jeuxext2">
    <a href="jeuxexterieur.php"><img src="components/img/vente5.jpg" alt="photo meilleures ventes"></a>
    <p>Balançoire - 1500€</p>
    </div>
    <div id="jeuxconstruction">
    <a href="jeuxconstruction.php"><img src="components/img/vente6.jpg" alt="photo meilleures ventes"></a>
    <p>Super Mario LEGO - 55€</p>
    </div>
    </div>
  </div>
  </div>
  <div id="div-btn-ventes">
  <button id="btn-ventes">Voir nos meilleures ventes</button>
  </div>
</section>
<?php
include_once("components/footer.php");
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
