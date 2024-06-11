<?php
if(!empty($_POST)){
// si $_POST N'est pas vide, on vérifie que toutes les données sont présentes

    if(isset($_POST["nom"], $_POST["description"], $_POST["prix"], $_POST["categorie"], $_POST["stock"], $_POST["promo"], 
    && !empty($_POST["nom"]) && !empty($_POST["descritption"])  && !empty($_POST["prix"]) && !empty($_POST["categorie"]) && !empty($_POST["stock"])&& !empty($_POST["promo"])){
        // on retire toute balise du titre
        $nom = strip_tags($_POST["nom"]);
        // on neutralise toute balise du contenu (je les gardes mais elles ne sont plus active)
        $description = htmlspecialchars($_POST["description"]);

        if(isset($_FILES["image"]) && $_FILES["image"]["error"] === 0)){
        // on met ["image"] car c'est le type du fichier c'est ce qu'on trouve dans le var-dump
        // on vérifie si le $_FILES image et image error est égal à 0 pour être sûr qu'on a une image
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
        if (!in_array($imageExtension, $allowed)) {
            $error = "Type de fichier non autorisé. Seuls les fichiers JPG, JPEG, PNG et GIF sont autorisés.";
        } else {
            // $uploadDir = '../../uploads/';
            //     $destinationPath = $uploadDir . $imageName;
            //     if (move_uploaded_file($imageTmpPath, $destinationPath)) {
            // à changer 
                    // Se connecter à la base de données
        }
         

        
        // ce sont les valeurs que l'on souhaite autorisé du fichier qui est envoyé, si c'est un pdf il nous le refusera

        
        

        

        //  on peut les enregistrer
        // on se connecte à la base de données
        require_once("../../connect.php");

        // on écrit la requête
        $sql = "INSERT INTO `produits`(`nom`, `description`, `image`, `prix`, `categorie`, `stock`, `promo`) VALUE (:nom, :description, :image, :prix, :categorie, :stock, :promo)";

        // on prépare la requête
        $query = $db->prepare($sql);

        // on injecte les valeurs
        $query->bindValue(":nom", $nom, PDO::PARAM_STR);
        $query->bindValue(":description", $description, PDO::PARAM_STR);
        $query->bindValue(":image", $image, PDO::PARAM_STR);
        $query->bindValue(":prix",  $_POST["prix"], PDO::PARAM_STR);
        $query->bindValue(":categorie", $_POST["categorie"], PDO::PARAM_STR);
        $query->bindValue(":stock", $_POST["stock"], PDO::PARAM_INT);
        $query->bindValue(":promo", $_POST["promo"], PDO::PARAM_STR);

        // on execute la requeête 
        if(!$query->execute()){
            die("une erreur est survenue");
        }

        // on récupère l'id de l'article
        $id = $db->lastInsertId();// ça nous permet de récupérer l'id du dernier insert executé
        die("Article ajouté sous le numéro $id");
    } else { 
        die("Le formulaire est incomplet");
    }
}
?>

<h1>AJOUTER UN PRODUIT</h1>
 <!-- a partir du moment où on a un type file dans un formulaire il faut mettre un attribut spécifique "enctype" sur la balise form pour pouvoir envoyer les fichiers -->
<form action="" method="post" enctype="multipart/form-data">
    <div>
        <label for="nom">Nom du produit</label>
        <input type="text" name="nom" id="nom" >
    </div>
    <div>
        <label for="description">Descritpion du produit</label>
        <textarea name="description" id="description"></textarea>
    </div>
    <div>
        <label for="image">Image du produit</label>
        <input type="file" name="image" id="image" required>
    </div>
    <div>
        <label for="prix">Prix du produit</label>
        <input type="text" name="prix" id="prix" required>
    </div>
    <div>
        <label for="categorie">Catégorie du produit</label>
        <select name="categorie" id="categorie">
            <option value="catégorie">Sélectionner une catégorie</option>
            <option value="catégorie">Jeux de société</option>
            <option value="catégorie">Activités créatives</option>
            <option value="catégorie">Jeux d'éveils</option>
            <option value="catégorie">Jeux en bois</option>
            <option value="catégorie">Jeux de construction</option>
            <option value="catégorie">Jeux d'extérieurs</option>
        </select>
    </div>
    <div>
        <label for="stock">Stock du produit</label>
        <input type="number" name="stock" id="stock" min="0" required>
    </div>
    <div>
        <label for="promo">promo</label>
        <select name="promo" id="promo">
            <option value="promo">Sélectionner</option>
            <option value="promo">Oui</option>
            <option value="promo">Non</option>
        </select>
    </div>
    <button type="submit">Envoyer</button>
</form>

<?php
