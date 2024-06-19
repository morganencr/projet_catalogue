<?php
session_start();


require_once("../connect.php");
$sql = "SELECT * FROM produits ORDER BY categorie";

$query = $db->prepare($sql);

$query->execute();
$produits = $query-> fetchAll(PDO::FETCH_ASSOC);
include_once("navbar2.php");

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau des produits</title>
    <link rel="stylesheet" href="tableauProduits.css">
</head>
<body>
<h1>Tableau des produits</h1>
<div id="btn_ajout">
<a href="ajoutProduits.php" class="btn">Ajouter un produit</a>
</div>
<table class="product-table">
<thead>
        <td>id</td>
        <td>nom du produit</td>
        <td>Description </td>
        <td>Image</td>
        <td>Prix</td>
        <td>Catégorie</td>
        <td>Stock</td>
        <td>Promo</td>
        <td>Actions</td>
</thead>
<tbody>
    <?php
        foreach($produits as $produit){
    ?>
        <tr>
            <td><?=$produit["id"]?></td>
            <td><?=$produit["nom"]?></td>
            <td><?=$produit["description"]?></td>
            <td><?=$produit["image"]?></td>
            <td><?=$produit["prix"]?></td>
            <td><?=$produit["categorie"]?></td>
            <td><?=$produit["stock"]?></td>
            <td><?=$produit["promo"]?></td>
            <td>
                <a href="update.php?id=<?= $produit['id']?>" class="btn">Modifier</a>
                <a href="delete.php?id=<?= $produit['id']?>" class="btn_delete"><i class="delete-icone fa-solid fa-trash-can"></i></a>
            </td>
        </tr>
        <?php
        }
        ?>
</tbody>
</table>
<?php
include_once("../components/footer.php"); ?>
</body>
</html>