<?php
if(!empty($_POST)){
// si $_POST N'est pas vide, on vérifie que toutes les données sont présentes

    if(isset($_POST["titre"], $_POST["contenu"], $_FILES["image"])
    && !empty($_POST["titre"]) && !empty($_POST["contenu"]) && $_FILES["image"]["error"] === 0)
    {
         // on met ["image"] car c'est le type du fichier c'est ce qu'on trouve dans le var-dump
        // on vérifie si le $_FILES image et image error est égal à 0 pour être sûr qu'on a une image
        //  le formulaire est complet ici
        
        // on retire toute balise du titre
        $titre = strip_tags($_POST["titre"]);

        // on neutralise toute balise du contenu (je les gardes mais elles ne sont plus active)
        $contenu = htmlspecialchars($_POST["contenu"]);

        //  on peut les enregistrer
        // on se connecte à la base de données
        require_once("../../connect.php");

        // on écrit la requête
        $sql = "INSERT INTO `articles`(`title`, `content`) VALUE (:title, :content)";

        // on prépare la requête
        $query = $db->prepare($sql);

        // on injecte les valeurs
        $query->bindValue(":title", $titre, PDO::PARAM_STR);
        $query->bindValue(":content", $contenu, PDO::PARAM_STR);

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
        <textarea name="contenu" id="contenu"></textarea>
    </div>
    <div>
        <label for="image">Image du produit</label>
        <input type="file" name="image" id="image" accept="image/jpeg" required>
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
            <option value="catégorie">jeux d'éveils</option>
            <option value="catégorie">Jeux en bois</option>
            <option value="catégorie">Jeux de construction</option>
            <option value="catégorie">Jeux d'extérieurs</option>
        </select>
    </div>
    <div>
        <label for="stock">Stock du produit</label>
        <input type="number" name="stock" id="stock" required>
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
