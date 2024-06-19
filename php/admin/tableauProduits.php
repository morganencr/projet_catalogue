<?php
session_start();


require_once("../connect.php");
$sql = "SELECT * FROM produits ORDER BY categorie";

$query = $db->prepare($sql);

$query->execute();
$produits = $query-> fetchAll(PDO::FETCH_ASSOC);
include_once("navbar2.php");

?>

<h1>Tableau des produits</h1>
<a href="ajoutProduits.php" >Ajouter un produit</a>
<table>
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
                <a href="update.php?id=<?= $produit['id']?>">Modifier</a>
                <a href="delete.php?id=<?= $produit['id']?>"><i class="fa-solid fa-trash-can"></i></a>
            </td>
        </tr>
        <?php
        }
        ?>
</tbody>
</table>
<?php
include_once("../components/footer.php");