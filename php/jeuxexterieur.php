<?php
session_start();
// on va chercher les articles dans la base
// on se connecte à la base de donnée
require_once("connect.php");

// on écrit la requête
$sql = "SELECT * FROM produits WHERE categorie ='Jeux d\'extérieur'";
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
        <h2>JEUX D'EXTÉRIEUR</h2>
        <p>Les jeux d'extérieur pour enfants encouragent l'activité physique et l'exploration de la nature. Ils incluent balançoires, 
            toboggans, ballons et jeux de groupe, favorisant la coordination, la socialisation et la santé générale tout en offrant 
            des heures de divertissement en plein air.</p>
        </div>
        <div class="image-intro">
            <img id="img-intro"src="components/img/jeuxexterieur.jpg">
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
                <?php foreach($produits as $produit):?>
                    
                    <article><a href="produit.php?id=<?=$produit["id"]?>">
                    <?php 
                // Ajouter "admin" au chemin de l'image
                        $imagePath = $produit['image'];
                        $class = 'admin/' . $imagePath;
                        ?>
                        <img id="img-article" src="<?= htmlspecialchars($class)?>" alt="photo <?=strip_tags($produit["nom"])?>">
                        <h3><?=strip_tags($produit["nom"])?></h3>
                        <p><?=strip_tags($produit["prix"])?>€</p>
                        <form method="POST" action="panier.php">
                            <input type="hidden" name="product_id" value="<?= $produit['id'] ?>">
                            <input type="hidden" name="product_name" value="<?= htmlspecialchars($produit['nom']) ?>">
                            <input type="hidden" name="product_price" value="<?= htmlspecialchars($produit['prix']) ?>">
                            <button type="submit" name="add_to_cart">Ajouter au panier</button>
                        </form>
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

        function updateTriToggleText() {
            console.log("fonction appelée");
            if (window.innerWidth < 909) {
                if (triContent.classList.contains("show")) {
                    triToggle.innerHTML = 'Triez vos sélections -';
                } else {
                    triToggle.innerHTML = 'Triez vos sélections +';
                }
            } else if (!triContent.classList.contains("show")) {
                if (triContent.classList.contains("show")) {
                    triToggle.innerHTML = 'Triez vos sélections -';
                } else {
                    triToggle.innerHTML = 'Triez vos sélections :';
                }
            }
        }

        triToggle.addEventListener("click", function() {
            triContent.classList.toggle("show");
            updateTriToggleText();
        });

        window.addEventListener("resize", updateTriToggleText);

        updateTriToggleText();
    });
</script>
<?php
include_once("components/footer.php");
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>