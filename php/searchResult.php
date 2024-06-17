<?php
session_start();
require_once("connect.php");
$_SESSION["error"] = [];

if(isset($_GET['searchbar'])){
    $searchQuery = htmlspecialchars($_GET['searchbar']);

    $sql = "SELECT * FROM produits WHERE nom LIKE :searchQuery";
    $query = $db->prepare($sql);
    $query->bindValue(':searchQuery', '%'.$searchQuery.'%', PDO::PARAM_STR);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_ASSOC);
} 
if(!$results){
    $_SESSION["error"][]="Aucun résultat trouvé pour votre recherche.";
}

include_once("components/navbar.php");
?>
<link rel="stylesheet" href="pagejeux.css">
<section>
<div class="main-container">
        <div class="sort-container">
            <div class="conteneur-tri">
                <h5>Triez vos sélections :</h5>
                <div class="div-price">
                    <label for="price">Prix</label>
                    <input type="range" name="price" id="price" min="0" max="2000">
                </div>
                <div class="div-color">
                    <div>Couleur:</div>
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

        <div class="article-container">
            <section class="catalogue-produits">
            <?php
                if(isset($_SESSION["error"])){
                    foreach($_SESSION["error"] as $message){
                        ?>
                        <p><?= $message ?></p>
                        <?php
                    }
                    unset($_SESSION["error"]);
                }
                
                foreach($results as $result):?>
                    
                    <article><a href="produit.php?id=<?=$result["id"]?>">
                    <?php 
                // Ajouter "admin" au chemin de l'image
                        $imagePath = $result['image'];
                        $class = 'admin/' . $imagePath;
                        ?>
                        <img id="img-article" src="<?= htmlspecialchars($class)?>" alt="photo <?=strip_tags($result["nom"])?>">
                        <h3><?=strip_tags($result["nom"])?></h3>
                        <p><?=strip_tags($result["prix"])?>€</p>
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