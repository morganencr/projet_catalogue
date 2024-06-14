<?php
session_start();
// on va chercher les articles dans la base
// on se connecte à la base de donnée
require_once("connect.php");

// on écrit la requête
$sql = "SELECT * FROM produits WHERE promo ='Oui'";
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
        <h2>PROMOS</h2>
        <p></p>
        </div>
        <div class="image-intro">
            <img id="img-intro"src="components/img/promo3.png">
        </div>
    </div>

    <div class="main-container">
        <div class="sort-container">
            <div class="conteneur-tri">
                <div class="div-price">
                    <label for="price">Prix</label>
                    <input type="range" name="price" id="price" min="0" max="2000">
                </div>
                <div class="div-color">
                    <div>Couleur:</div>
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
                <?php foreach($produits as $produit):?>
                    
                    <article><a href="produit.php?id=<?=$produit["id"]?>">
                    <?php 
                // Ajouter "admin" au chemin de l'image
                        $imagePath = $produit['image'];
                        $class = 'admin/' . $imagePath;
                        ?>
                        <img id="img-article" src="<?= htmlspecialchars($class)?>" alt="photo <?=strip_tags($produit["nom"])?>">
                        <h3><?=strip_tags($produit["nom"])?></h3>
                        <p><?=strip_tags($produit["prix"])?></p>
                        <button>Ajouter au panier</button>
                </a></article>
                <?php endforeach;?>
            </section>
        </div>
    </div>
</section>
<?php
include_once("components/footer.php");
?>