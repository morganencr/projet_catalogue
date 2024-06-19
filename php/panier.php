<?php
session_start();
require_once("connect.php");

if (isset($_POST['add_to_cart'])) {
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_quantity = 1;

    // Vérifier si l'utilisateur est connecté
    if (isset($_SESSION['user']['id'])) {
        $user_id = $_SESSION['user']["id"];

        // Vérifier si le produit est déjà dans le panier de l'utilisateur
        $sql = "SELECT * FROM panier WHERE user_id = :user_id AND product_id = :product_id";
        $query = $db->prepare($sql);
        $query->bindValue(":user_id", $user_id, PDO::PARAM_INT);
        $query->bindValue(":product_id", $product_id, PDO::PARAM_INT);
        $query->execute();
        $panier = $query->fetch();

        if ($panier) {
            // Mettre à jour la quantité
            $sql = "UPDATE panier SET quantity = quantity + :quantity WHERE user_id = :user_id AND product_id = :product_id";
        } else {
            // Insérer un nouvel enregistrement
            $sql = "INSERT INTO panier (user_id, product_id, quantity) VALUES (:user_id, :product_id, :quantity)";
        }

        $query = $db->prepare($sql);
        $query->bindValue(":user_id", $user_id, PDO::PARAM_INT);
        $query->bindValue(":product_id", $product_id, PDO::PARAM_INT);
        $query->bindValue(":quantity", $product_quantity, PDO::PARAM_INT);
        $query->execute();

    } else {
        // Utilisateur non connecté, gérer avec les sessions
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        $is_found = false;
        foreach ($_SESSION['cart'] as &$item) {
            if ($item['id'] == $product_id) {
                $item['quantity'] += 1;
                $is_found = true;
                break;
            }
        }

        if (!$is_found) {
            $_SESSION['cart'][] = [
                'id' => $product_id,
                'name' => $product_name,
                'price' => $product_price,
                'quantity' => $product_quantity
            ];
        }
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="panier.css">
    <title>Votre Panier</title>
</head>
<body>
<?php include_once("components/navbar.php"); ?>

<section class="panier">
    <h1>Votre panier</h1>
    <table>
        <thead>
            <tr>
                <th id="produit">Produit</th>
                <th id="prix">Prix</th>
                <th id="quantite">Quantité</th>
                <th id="total">Total</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $total = 0;

            if (isset($_SESSION['user']['id'])) {
                // Si l'utilisateur est connecté, récupérer le panier de la base de données
                $user_id = $_SESSION['user']['id'];
                // p.nom : Sélectionne la colonne nom (nom) dans la table produits.
                // p.prix : Sélectionne la colonne prix (prix) dans la table produits.
                // pan.quantity : Sélectionne la colonne quantity (quantité) dans la table panier.
                $sql = "SELECT p.nom, p.prix, pan.quantity 
                        FROM produits p 
                        JOIN panier pan ON p.id = pan.product_id
                        WHERE pan.user_id = :user_id";
                // JOIN panier pan ON p.id = pan.product_id: Effectue une jointure entre la table produits (alias p) et la table panier (alias pan) où la colonne id de la table produits correspond à la colonne product_id de la table panier.
                $query = $db->prepare($sql);
                $query->bindValue(":user_id", $user_id, PDO::PARAM_INT);
                $query->execute();
                $panier = $query->fetchAll();

                // Afficher les produits du panier de la base de données
                foreach ($panier as $item) {
                    $item_total = $item['prix'] * $item['quantity'];
                    $total += $item_total; ?>
                    <tr>
                        <td><?=$item['nom']?></td>
                        <td><?=$item['prix']?>€</td>
                        <td><?=$item['quantity']?></td>
                        <td><?=$item_total?>€</td>
                        <td><a href=""><i class="fa-solid fa-trash"></i></a></td>
                    </tr>
                          <?php
                }
            } else {
                // Si l'utilisateur n'est pas connecté, récupérer le panier de la session
                if (isset($_SESSION['cart'])) {
                    foreach ($_SESSION['cart'] as $item) {
                        $item_total = $item['price'] * $item['quantity'];
                        $total += $item_total; ?>
                            <tr>
                                <td><?=$item['name']?></td>
                                <td><?=$item['price']?>€</td>
                                <td><?=$item['quantity']?></td>
                                <td><?=$item_total?>€</td>
                                <td><a href="deletepanier.php?id=<?=$item['id']?>"><i class="fa-solid fa-trash"></i></a></td>
                              </tr>
                              <?php
                    }
                }
            }
           ?>
        </tbody>
    </table>
    <h2>Total : <?= $total ?>€</h2> <!-- Afficher le total du panier -->
</section>

<?php include_once("components/footer.php"); // Inclure le pied de page ?>
</body>
</html>