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
      <img src="components/img/jeuxboisbaniere.png" height="500px" class="d-block w-100" alt="Description of Image 3">
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

<h1>J'EN PROFITE</h1>
<div id="photos-promo">
</div>
<button>Voir nos offres du moment</button>

<h1>NOS MEILLEURES VENTES</h1>
<div id="photos-ventes">
</div>
<button>Voir nos meilleures ventes</button>
<?php
include_once("components/footer.php");
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
