<?php
if(!empty($_POST))
{
// si $_POST N'est pas vide, on vérifie que toutes les données sont présentes

    if (isset($_POST["nom"], $_POST["description"], $_POST["prix"], $_POST["categorie"], $_POST["stock"], $_POST["promo"], $_POST["id"])
    && !empty($_POST["nom"]) && !empty($_POST["description"]) && !empty($_POST["prix"]) && !empty($_POST["categorie"]) && !empty($_POST["stock"]) && !empty($_POST["promo"]) && !empty($_POST["id"])) 
    {
        // $id = strip_tags($_POST["id"]);
        // on retire toute balise du titre
        $id = strip_tags($_POST["id"]);
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
            // on part d'une constante magique qui s'appelle __DIR__ qui correspond dans le dossier auquel je me trouve 
            $newfilename = __DIR__ ."/uploads/$newname.$imageExtension";
            if(!move_uploaded_file($_FILES["image"]["tmp_name"], $newfilename)){
                die("l'upload a échoué");
            }

                    // Se connecter à la base de données
                    require_once("../connect.php");

                    // Écrire la requête
                    $sql = "UPDATE `produits` SET nom = :nom, description = :description, image = :image, prix = :prix, categorie = :categorie, stock = :stock, promo = :promo WHERE id = :id";
                    $query = $db->prepare($sql);

                    // Lier les paramètres
                    $query->bindValue("id", $id, PDO::PARAM_INT);
                    $query->bindValue(":nom", $nom, PDO::PARAM_STR);
                    $query->bindValue(":description", $description, PDO::PARAM_STR);
                    $query->bindValue(":image", $newfilename, PDO::PARAM_STR);
                    $query->bindValue(":prix",  $_POST["prix"], PDO::PARAM_STR);
                    $query->bindValue(":categorie", $_POST["categorie"], PDO::PARAM_STR);
                    $query->bindValue(":stock", $_POST["stock"], PDO::PARAM_INT);
                    $query->bindValue(":promo", $_POST["promo"], PDO::PARAM_STR);

                        // Exécuter la requête et gérer les erreurs potentielles
                        if ($query->execute()) {
                            $id = $db->lastInsertId();
                            header("Location: ../index.php");
                            exit();
                        } else {
                            die("Une erreur est survenue lors de la modification de l'article.");
                        }
                    }
                } else {
                    die("Le téléchargement de l'image est obligatoire.");
                }
            } else {
                die("Le formulaire est incomplet.");
            }
        }
        if (isset($_GET["id"])&& !empty($_GET["id"])){
            // déja ça va vérifier si la var est défini avec isset et ensuite si il y a l'id dqns l'url
        
        require_once("../connect.php"); // ne pas oublier de connecter avec require_once
        // echo $_GET["id"];
        $id = strip_tags($_GET["id"]);
        
        $sql = "SELECT * FROM produits WHERE id = :id";
        $query = $db->prepare($sql); // on prépare la requête, on demande la $db mais il faut la connecter avec require
        // on accroche la valeur id de la requête à celle de la variable $id
        $query->bindValue(":id", $id, PDO::PARAM_INT); 
        $query->execute();
        
        $produits = $query->fetch();
        
        } else {
            header("Location: tableauProduits.php");
        }
        
?>

<h1>Modifier un produit</h1>
 <!-- a partir du moment où on a un type file dans un formulaire il faut mettre un attribut spécifique "enctype" sur la balise form pour pouvoir envoyer les fichiers -->
<form method="post" enctype="multipart/form-data">
    <div>
        <input type="hidden" name="id">
        <label for="nom">Nom du produit</label>
        <input type="text" name="nom" id="nom" value="<?=$produits["nom"]?>">
    </div>
    <div>
        <label for="description">Descritpion du produit</label>
        <textarea name="description" id="description" value="<?=$produits["description"]?>"></textarea>
    </div>
    <div>
        <label for="image">Image du produit</label>
        <input type="file" name="image" id="image" value="<?=$produits["image"]?>"required>
    </div>
    <div>
        <label for="prix">Prix du produit</label>
        <input type="text" name="prix" id="prix" value="<?=$produits["prix"]?>"required>
    </div>
    <div>
        <label for="categorie">Catégorie du produit</label>
        <select name="categorie" id="categorie" value="<?=$produits["categorie"]?>">
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
        <input type="number" name="stock" id="stock" min="0" value="<?=$produits["stock"]?>"required>
    </div>
    <div>
        <label for="promo">promo</label>
        <select name="promo" id="promo" value="<?=$produits["promo"]?>">
            <option value="promo">Sélectionner</option>
            <option value="promo">Oui</option>
            <option value="promo">Non</option>
        </select>
    </div>
    <button type="submit">Envoyer</button>

    <!-- UPDATE CRUD -->
    <?php

if($_POST){
    if(isset($_POST["id"]) && !empty($_POST["id"])
    && isset($_POST["statut_recherche"]) && !empty($_POST["statut_recherche"])
    && isset($_POST["nom_entreprise"]) && !empty($_POST["nom_entreprise"])
    && isset($_POST["envoi_candidature"]) && !empty($_POST["envoi_candidature"])
    && isset($_POST["relances"]) && !empty($_POST["relances"])
    && isset($_POST["type_candidature"]) && !empty($_POST["type_candidature"])
    && isset($_POST["methode_postulation"]) && !empty($_POST["methode_postulation"])
    && isset($_POST["poste"]) && !empty($_POST["poste"])
    && isset($_POST["type_contrat"]) && !empty($_POST["type_contrat"])
    && isset($_POST["mail"]) && !empty($_POST["mail"])
    && isset($_POST["commentaires"]) && !empty($_POST["commentaires"])
    ){
        require_once("connect.php");

        $id = strip_tags($_POST["id"]);
        $statut_recherche = strip_tags($_POST["statut_recherche"]);
        $nom_entreprise = strip_tags($_POST["nom_entreprise"]);
        $envoi_candidature = strip_tags($_POST["envoi_candidature"]);
        $relances = strip_tags($_POST["relances"]);
        $type_candidature = strip_tags($_POST["type_candidature"]);
        $methode_postulation = strip_tags($_POST["methode_postulation"]);
        $poste = strip_tags($_POST["poste"]);
        $type_contrat = strip_tags($_POST["type_contrat"]);
        $mail = strip_tags($_POST["mail"]);
        $commentaires = strip_tags($_POST["commentaires"]);
        
        $sql = "UPDATE candidatures SET statut_recherche = :statut_recherche, nom_entreprise = :nom_entreprise, envoi_candidature = :envoi_candidature,
        relances = :relances, type_candidature = :type_candidature, methode_postulation = :methode_postulation, poste = :poste,
        type_contrat = :type_contrat, mail = :mail, commentaires = :commentaires WHERE id = :id";

        $query = $db->prepare($sql);

        $query->bindValue(":id", $id);
        $query->bindValue(":statut_recherche", $statut_recherche);
        $query->bindValue(":nom_entreprise", $nom_entreprise);
        $query->bindValue(":envoi_candidature", $envoi_candidature);
        $query->bindValue(":relances", $relances);
        $query->bindValue(":type_candidature", $type_candidature);
        $query->bindValue(":methode_postulation", $methode_postulation);
        $query->bindValue(":poste", $poste);
        $query->bindValue(":type_contrat", $type_contrat);
        $query->bindValue(":mail", $mail);
        $query->bindValue(":commentaires", $commentaires);

        $query->execute();
        header("Location: index.php");
        
    }else {
        echo "Remplissez le formulaire";
    }
}
if(isset($_GET["id"]) && !empty($_GET["id"])){



    require_once("connect.php");
    
    //on affiche pas le nombre de l'id car sinon il y a un conflit au niveau de la redirection car il doit afficher plusieurs choses
    // echo $_GET["id"];
    $id = strip_tags($_GET["id"]);
    $sql = "SELECT * FROM candidatures WHERE id = :id";
    $query = $db->prepare($sql);
    //on accroche la valeur id de la requête à celle de la variable $id
    $query->bindValue(":id", $id, PDO::PARAM_INT);
    
    $query->execute();
    
    $candidatures = $query->fetch();
    
    //!$user = le ! c'est pour vérifier si l'utilisateur existe,le ! = c'est vide
    if(!$candidatures){
        header("Location: index.php");
    }else{
        require_once("disconnect.php");
    }
    
    // print_r($user);
    }else{
        header("Location: index.php");
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modification</title>
</head>
<body>
    <h1>Modifier la candidature</h1>
    <form method="post">
        <label for="statut_recherche">Statut de la recherche</label>
        <select id="statut_recherche" name="statut_recherche" required>
        <option value="A postulé" <?= $candidatures["statut_recherche"] == 'A postulé' ? 'selected' : '' ?>>A postulé</option>
        <option value="Ne correspond pas" <?= $candidatures["statut_recherche"] == 'Ne correspond pas' ? 'selected' : '' ?>>Ne correspond pas</option>
        <option value="Entretien" <?= $candidatures["statut_recherche"] == 'Entretien' ? 'selected' : '' ?>>Entretien</option>
        <option value="Refus" <?= $candidatures["statut_recherche"] == 'Refus' ? 'selected' : '' ?>>Refus</option>
        <option value="Embauche" <?= $candidatures["statut_recherche"] == 'Embauche' ? 'selected' : '' ?>>Embauche</option>
        <option value="Pas de réponse" <?= $candidatures["statut_recherche"] == 'Pas de réponse' ? 'selected' : '' ?>>Pas de réponse</option>
        <option value="Relancé" <?= $candidatures["statut_recherche"] == 'Relancé' ? 'selected' : '' ?>>Relancé</option>
        </select><br>
        
        <label for="nom_entreprise">Nom de l'entreprise :</label>
    <input type="text" id="nom_entreprise" name="nom_entreprise" value="<?= $candidatures["nom_entreprise"]?>" required><br>

    <label for="envoi_candidature">Date d'envoi de la candidature :</label>
    <input type="date" id="envoi_candidature" name="envoi_candidature" value="<?= $candidatures["envoi_candidature"]?>" required><br>

    <label for="relances">Date de relance :</label>
    <input type="date" id="relances" name="relances" value="<?= $candidatures["relances"]?>" required><br>

    <label for="type_candidature">Type de candidature :</label>
    <select id="type_candidature" name="type_candidature" value="<?= $candidatures["type_candidature"]?>" required>
        <option value="Spontanée">Spontanée</option>
        <option value="Réponse à une offre">Réponse à une offre</option>
        <option value="Recommandation">Recommandation</option>
        <option value="Sollicitation directe">Sollicitation directe</option>
    </select><br>
    
    
    <label for="methode_postulation">Méthode de postulation :</label>
    <select id="methode_postulation" name="methode_postulation" required>
        <option value="En personne" <?= $candidatures["methode_postulation"] == 'En personne' ? 'selected' : '' ?>>En personne</option>
        <option value="E-mail" <?= $candidatures["methode_postulation"] == 'E-mail' ? 'selected' : '' ?>>E-mail</option>
        <option value="LinkedIn" <?= $candidatures["methode_postulation"] == 'LinkedIn' ? 'selected' : '' ?>>LinkedIn</option>
        <option value="Sollicitation directe" <?= $candidatures["methode_postulation"] == 'Sollicitation directe' ? 'selected' : '' ?>>Sollicitation directe</option>
        <option value="Jobdating" <?= $candidatures["methode_postulation"] == 'Jobdating' ? 'selected' : '' ?>>Jobdating</option>
        <option value="Recommandation" <?= $candidatures["methode_postulation"] == 'Recommandation' ? 'selected' : '' ?>>Recommandation</option>
        <option value="Website" <?= $candidatures["methode_postulation"] == 'Website' ? 'selected' : '' ?>>Website</option>
    </select><br>


    <label for="poste">Intitulé du poste :</label>
    <input type="text" id="poste" name="poste" value="<?= $candidatures["poste"]?>" required><br>

    <label for="type_contrat">Type de contrat :</label>
    <select id="type_contrat" name="type_contrat" required>
        <option value="Stage" <?= $candidatures["type_contrat"] == 'Stage' ? 'selected' : '' ?>>Stage</option>
        <option value="CDD" <?= $candidatures["type_contrat"] == 'CDD' ? 'selected' : '' ?>>CDD</option>
        <option value="CDI" <?= $candidatures["type_contrat"] == 'CDI' ? 'selected' : '' ?>>CDI</option>
        <option value="Apprentissage" <?= $candidatures["type_contrat"] == 'Apprentissage' ? 'selected' : '' ?>>Apprentissage</option>
        <option value="Freelance" <?= $candidatures["type_contrat"] == 'Freelance' ? 'selected' : '' ?>>Freelance</option>
    </select><br>

    <label for="mail">Adresse e-mail de contact :</label>
    <input type="email" id="mail" name="mail" value="<?= $candidatures["mail"]?>" required><br>

    <label for="commentaires">Commentaires :</label>
    <input id="commentaires" name="commentaires" value="<?= $candidatures["commentaires"]?>" required><br>

    <input type="hidden" name="id" value="<?= $candidatures["id"]?>" required>
    
    <input type="submit" name="modify" value="Modifier">

    </form>
    
    <a href="index.php">Retour</a>
    <!-- <?php print_r($_POST);?> -->

</body>
</html>
<!-- FIN UPDATE -->