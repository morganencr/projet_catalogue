<?php
if(!empty($_POST))
{
// si $_POST N'est pas vide, on vérifie que toutes les données sont présentes

    if (isset($_POST["nom"], $_POST["description"], $_POST["prix"], $_POST["categorie"], $_POST["stock"], $_POST["promo"]) 
    && !empty($_POST["nom"]) && !empty($_POST["description"]) && !empty($_POST["prix"]) && !empty($_POST["categorie"]) && !empty($_POST["stock"]) && !empty($_POST["promo"])) 
    {
        // on retire toute balise du titre
        $nom = strip_tags($_POST["nom"]);
        // on neutralise toute balise du contenu (je les gardes mais elles ne sont plus active)
        $description = htmlspecialchars($_POST["description"]);
        $prix = $_POST["prix"];
        $categorie = $_POST["categorie"];
        $stock = $_POST["stock"];
        $promo = $_POST["promo"];

        if (isset($_FILES["image"]) && $_FILES["image"]["error"] === UPLOAD_ERR_OK) 
        {
            // on met ["image"] car c'est le type du fichier c'est ce qu'on trouve dans le var-dump
            // on vérifie si le $_FILES image et image error est égal à UPLOad_ERR_OK pour être sûr qu'on a une image

            $imageTmpPath = $_FILES['image']['tmp_name'];
            $imageName = $_FILES['image']['name'];
            $imageSize = $_FILES['image']['size'];
            $imageType = $_FILES['image']['type'];
            // on récupère l'extension : 
            // on a une fonction  qui s'appelle pathinfo() ou lui donne le nom du fichier 
            $imageExtension = strtolower(pathinfo($imageName, PATHINFO_EXTENSION));
            $allowed = [
                "jpg" => "image/jpeg",
                "jpeg" => "image/jpeg",
                "png" => "image/png"
            ];

            if(!array_key_exists($imageExtension, $allowed) || !in_array($imageType, $allowed))
            {
            die("Type de fichier non autorisé. Seuls les fichiers JPG, JPEG, PNG et GIF sont autorisés.");
            } else {
            // on génère un nom unique : 
            // uniqid est un TIMESTAMP et md5 permet de le chiffré histoire d'avoir un string aléatoire
            $newname=md5(uniqid());
            // on génère le chemin complet vers le fichier:
            $newfilename = "uploads/$newname.$imageExtension";
            if(!move_uploaded_file($_FILES["image"]["tmp_name"], $newfilename)){
                die("l'upload a échoué");
            }

                    // Se connecter à la base de données
                    require_once("../connect.php");

                    // Écrire la requête
                    $sql = "INSERT INTO `produits`(`nom`, `description`, `image`, `prix`, `categorie`, `stock`, `promo`) VALUES (:nom, :description, :image, :prix, :categorie, :stock, :promo)";
                    $query = $db->prepare($sql);

                    // Lier les paramètres
                    $query->bindValue(":nom", $nom, PDO::PARAM_STR);
                    $query->bindValue(":description", $description, PDO::PARAM_STR);
                    $query->bindValue(":image", $newfilename, PDO::PARAM_STR);
                    $query->bindValue(":prix",  $_POST["prix"], PDO::PARAM_INT);
                    $query->bindValue(":categorie", $_POST["categorie"], PDO::PARAM_STR);
                    $query->bindValue(":stock", $_POST["stock"], PDO::PARAM_INT);
                    $query->bindValue(":promo", $_POST["promo"], PDO::PARAM_STR);

                        // Exécuter la requête et gérer les erreurs potentielles
                        if ($query->execute()) {
                            $id = $db->lastInsertId();
                            header("Location: tableauProduits.php");
                            exit();
                        } else {
                            die("Une erreur est survenue lors de l'ajout de l'article.");
                        }
                    }
                } else {
                    die("Le téléchargement de l'image est obligatoire.");
                }
            } else {
                die("Le formulaire est incomplet.");
            }
        }
?>
<?php

 include_once("navbar2.php");

 ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un produit</title>
    <link rel="stylesheet" href="addupdate.css">
</head>
<body>
<h1>Ajouter un produit</h1>
 <!-- a partir du moment où on a un type file dans un formulaire il faut mettre un attribut spécifique "enctype" sur la balise form pour pouvoir envoyer les fichiers -->
<form id="form-add" action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="nom">Nom du produit</label>
        <input type="text" name="nom" id="nom" >
    </div>
    <div class="form-group">
        <label for="description">Descritpion du produit</label>
        <textarea name="description" id="description"></textarea>
    </div>
    <div class="form-group">
        <label for="image">Image du produit</label>
        <input type="file" name="image" id="image" required>
    </div>
    <div class="form-group">
        <label for="prix">Prix du produit</label>
        <input type="text" name="prix" id="prix" required>
    </div>
    <div class="form-group">
        <label for="categorie">Catégorie du produit</label>
        <select name="categorie" id="categorie" required>
            <option value="catégorie">Sélectionner une catégorie</option>
            <option value="Jeux de société">Jeux de société</option>
            <option value="Activité créative">Activité créative</option>
            <option value="Jeux d'éveil">Jeux d'éveil</option>
            <option value="Jeu en bois">Jeu en bois</option>
            <option value="Jeu de construction">Jeu de construction</option>
            <option value="Jeux d'extérieur">Jeux d'extérieur</option>
        </select>
    </div>
    <div class="form-group">
        <label for="stock">Stock du produit</label>
        <input type="number" name="stock" id="stock" min="0" required>
    </div>
    <div class="form-group">
        <label for="promo">promo</label>
        <select name="promo" id="promo" required>
            <option value="promo">Sélectionner</option>
            <option value="Oui">Oui</option>
            <option value="Non">Non</option>
        </select>
    </div>
    <div id="btn">
    <button type="submit" class="btn">Envoyer</button>
    </div>
</form>

<?php
include_once("../components/footer.php"); ?>
</body>
</html>