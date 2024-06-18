<?php
session_start();
// on va chercher les articles dans la base
// on se connecte à la base de donnée
require_once("connect.php");

// on écrit la requête
$sql = "SELECT * FROM produits WHERE categorie ='Jeux d\'éveil'";
// Préparation de la requête
$query = $db->prepare($sql);
// Exécution de la requête
$query->execute();
// on récupère les données 
$produits = $query->fetchALL(); // après un fecthALL il y a une boucle donc on doit rajouter un foreach
include_once("components/navbar.php");
?>
<link rel="stylesheet" href="pagejeux.css">

<section id="section">
    <a id="accueil" href="index.php">Accueil</a>
    <div class="intro-container">
        <div class="texte-description">
        <h2>JEUX D'ÉVEIL</h2>
        <p>Les jeux d'éveil pour enfants stimulent les sens et favorisent le développement cognitif et moteur. 
            Adaptés aux tout-petits, ils incluent des activités tactiles, auditives et visuelles, aidant à la découverte du monde et à l'apprentissage 
            des premières compétences essentielles.</p>
        </div>    
        <div class="image-intro">
            <img id="img-intro"src="components/img/jeuxeveils.jpg">
        </div>
    </div>
    <div class="main-container">
        <div class="sort-container">
          <div class="conteneur-tri">
            <h5 id="tri-toggle">Triez vos sélections :</h5>
            <div id="tri-content" class="tri-content">
                <div class="div-price">
                    <label for="price">Prix</label>
                    <input type="range" name="price" id="price" min="0" max="100">
                </div>
                <div class="div-color">
                    <div>Couleur :</div>
                    <div class="checkbox">
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
          </div>
        </div>

        <div class="article-container">
            <section class="catalogue-produits">
                <?php foreach($produits as $produit): ?>
                    <article><a href="produit.php?id=<?=$produit["id"]?>">
                    <?php 
                // Ajouter "admin" au chemin de l'image
                        $imagePath = $produit['image'];
                        $class = 'admin/' . $imagePath;
                        ?>
                        <img id="img-article" src="<?= htmlspecialchars($class)?>" alt="photo article">
                        <h3><?=strip_tags($produit["nom"])?></h3>
                        <p><?=strip_tags($produit["prix"])?>€</p>
                        <button>Ajouter au panier</button>
                </a></article>
                <?php endforeach;?>
            </section>
        </div>
    </div>
</section>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const triToggle = document.getElementById("tri-toggle");
        const triContent = document.getElementById("tri-content");

        triToggle.addEventListener("click", function() {
            triContent.classList.toggle("show");
        });
    });
</script>
<?php
include_once("components/footer.php");
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>