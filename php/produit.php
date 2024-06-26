<?php
session_start();
// on vérifie si on a un id mais on va inverser la condition pour éviter de mettre un else, donc on dit si l'id n'est pas vérifié ou s'il est vide
// on se connecte à la base de donnée

require_once("connect.php");
if(!isset($_GET["id"]) || empty($_GET["id"])){
    //  je n'ai pas d'id
    // on peut faire soit un message d'erruer soit une redirection vers une autre page
    header("Location: index.php");
    exit;
}

// On écrit la requête
$sql="SELECT * FROM `produits` WHERE `id` = :id";
//  je récupère l'id GRÂCE A LA SUPERGLOBAL
$id = $_GET["id"];
// on prépare la requete 
$query = $db->prepare($sql);

// on injecte les paramètres
$query->bindValue("id", $id, PDO::PARAM_INT);

// on éxecute la requête
$query->execute();

// on va chercher l' article 
$produit = $query->fetch();

// on vérifie si article est vide
if(!$produit){
    // dans ce cas la erreur 404
    http_response_code(404);
    echo "Article inexistant";
    exit;
}

include_once("components/navbar.php");

?>
<link rel="stylesheet" href="produit.css">

<section>
    <a href="index.php">Accueil </a>
    <article> 
        <div class="img-container">
            <?php
        // Ajouter "admin" au chemin de l'image
            $imagePath = $produit['image'];
            $class = 'admin/' . $imagePath;
            ?>
            <img id="img-article" src="<?= htmlspecialchars($class)?>" alt="photo <?=strip_tags($produit["nom"])?>">
        </div>
        <div class="info-container">
            <div class="contenu-info">
                <h1><?=strip_tags($produit["nom"])?></h1> 
                <p><?=strip_tags($produit["prix"])?>€</p>
                <div class="options">
                <form method="POST" action="panier.php">
                        <input type="hidden" name="product_id" value="<?= $produit['id'] ?>">
                        <input type="hidden" name="product_name" value="<?= htmlspecialchars($produit['nom']) ?>">
                        <input type="hidden" name="product_price" value="<?= htmlspecialchars($produit['prix']) ?>">
                        <button>Retrait en magasin</button>
                        <button type="submit" name="add_to_cart">Ajouter au panier</button>
                </form>
                </div>
                <p class="stock">Il nous en reste <?=strip_tags($produit["stock"])?>  en magasin.</p>
                
            </div>
        </div>
    </article>    
    <div class="container-description">
        <p>Description du produit:</p>
        <?=strip_tags($produit["description"])?>
    </div>
    
</section>
<div id="nav-icones">
    <ul class="carousel">
      <li><i class="fa-regular fa-credit-card fa-2x"></i>&nbsp;Paiement 100% sécurisé</li>
      <li><i class="fa-solid fa-shop fa-2x"></i>Retrait en magasin gratuit</li>
      <li><i class="kdo fa-solid fa-gift fa-2x"></i>Emballage cadeau gratuit</li>
    </ul>
  </div>
<?php
// on inclut le footer 
include_once("components/footer.php");
?>


