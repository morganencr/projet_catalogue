<?php
include_once("components/navbar.php");
?>
<link rel="stylesheet" href="pagejeux.css">
<section id="section">
    <a href="index.php">Accueil</a>
    <div class="intro-container">
        <div class="texte-description">
        <h2>JEUX DE CONSTRUCTION</h2>
        <p>Les jeux de construction pour enfants stimulent la créativité et la pensée logique. 
            Ils incluent des blocs, briques et kits d'assemblage, permettant de créer diverses structures. Ces jeux développent 
            les compétences motrices fines, la résolution de problèmes et encouragent la patience et la concentration.</p>
        </div>    
        <div class="image-intro">
            <img id="img-intro"src="components/img/jeuxconstruction.jpg">
        </div>
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
            </section>
        </div>
    </div>
</section>
<?php
include_once("components/footer.php");
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>