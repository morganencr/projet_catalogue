<?php
include_once("components/navbar.php");
?>
<a href="index.php">Accueil</a>

<h2>JEUX D'EXTÉRIEUR</h2>
<div id="zone-description">
    <p>Les jeux d'extérieur pour enfants encouragent l'activité physique et l'exploration de la nature. Ils incluent balançoires, 
        toboggans, ballons et jeux de groupe, favorisant la coordination, la socialisation et la santé générale tout en offrant 
        des heures de divertissement en plein air.</p>
    <img src="components/img/jeuxexterieur.jpg">
</div>

<div class="main-container">
    <div class="sort-container">
        <div class="conteneur-tri">
            <div class="div-price">
                <label for="price">Prix</label>
                <input type="range" name="price" id="price" min="0" max="100">
            </div>
            <div class="div-color">
                <label for="bleu">bleu</label>
                <input type="checkbox" name="bleu" id="bleu">
                <label for="rouge">rouge</label>
                <input type="checkbox" name="rouge" id="rouge">
                <label for="vert">vert</label>
                <input type="checkbox" name="vert" id="vert">
                <label for="jaune">jaune</label>
                <input type="checkbox" name="jaune" id="jaune">
                <label for="noir">noir</label>
                <input type="checkbox" name="noir" id="noir">

            </div>
        </div>
    </div>

    <div class="article-container">
        <section class="catalogue-produits">
                <article>
                    <img src="" alt="">
                    <h3></h3>
                    <p></p>
                </article>
        </dsection>
    </div>

</div>
<?php
include_once("components/footer.php");
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>