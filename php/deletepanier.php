<?php
session_start();
require_once("connect.php");

if (isset($_GET['id'])) {
    $product_id = $_GET['id'];

    // Suppression du produit du panier de l'utilisateur connecté
    if (isset($_SESSION['user']['id'])) {
        $user_id = $_SESSION['user']['id'];

        $sql = "DELETE FROM panier WHERE id = :id";
        $query = $db->prepare($sql);
        $query->bindValue(":user_id", $user_id, PDO::PARAM_INT);
        $query->bindValue(":product_id", $product_id, PDO::PARAM_INT);
        $query->execute();

        header("Location: panier.php"); // Redirection vers la page du panier après la suppression
        exit;
    }

    // Suppression du produit du panier de la session (utilisateur non connecté)
    if (isset($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $key => $item) {
            if ($item['id'] == $product_id) {
                unset($_SESSION['cart'][$key]);
                break;
            }
        }

        header("Location: panier.php"); // Redirection vers la page du panier après la suppression
        exit;
    }
}

// Si aucun ID de produit n'est spécifié, rediriger vers la page du panier
header("Location: panier.php");
exit;
?>