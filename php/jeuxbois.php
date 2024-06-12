<?php
include_once("components/navbar.php");
?>
<a href="index.php">Accueil</a>

<h2>JEUX EN BOIS</h2>
<div id="zone-description">
    <p>Les jeux en bois pour enfants sont durables et écologiques. Ils favorisent le développement des compétences motrices et cognitives à travers des activités ludiques et éducatives. Leur design intemporel et naturel stimule l'imagination tout en offrant une alternative sûre et esthétique aux jouets en plastique.</p>
    <img src="components/img/jeuxbois.png">
</div>
<div class="main-container">
    <div class="sort-container">
        <div class="conteneur-tri">

            <label for="price">Prix</label>
            <input type="range" name="price" id="price" min="0" max="100">
        </div>
    </div>

    <div class="article-container">
        <div class="catalogue-produits">
            <section>
                <article>
                    <img src="" alt="">
                    <h3></h3>
                    <p></p>
                </article>
            </section>
        </div>
    </div>

</div>

    
</div>

<?php
include_once("components/footer.php");
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>