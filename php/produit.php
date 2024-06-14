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
    <a href="index.php">Accueil</a>
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
                <p><?=strip_tags($produit["prix"])?></p>
                <button>Retrait en magasin</button>
                <button>Ajouter au panier</button>
                <p>Il nous en reste <?=strip_tags($produit["stock"])?>  en magasin.</p>
            </div>
        </div>
    </article>    
    <div class="container-description">
        <p>Description du produit:</p>
        <?=strip_tags($produit["description"])?>
    </div>  
        
        
        
       
  
    <!--on voudrait avoir ça plusieurs fois donc on met la section avant le foreach et après le endforeach -->
</section>
  
<?php
// on inclut le footer 
include_once("components/footer.php");
?>