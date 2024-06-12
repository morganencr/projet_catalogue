<?php

if (isset($_GET["id"])&& !empty($_GET["id"])){
    

  require_once("../connect.php");

// echo $_GET["id"];
$id = strip_tags($_GET["id"]);
$sql = "SELECT * FROM produits WHERE id = :id";
$query = $db->prepare($sql); // on prépare la requête, on demande la $db mais il faut la connecter avec require
// on accroche la valeur id de la requête à celle de la variable $id
$query->bindValue(":id", $id, PDO::PARAM_INT);
$query->execute();

$produits= $query->fetch();

if (!$produits){
    header("Location: index.php");
} else {
    $sql = "DELETE FROM produits WHERE id=:id";
    
    $query = $db->prepare($sql);
} 
$query->bindValue(":id", $id, PDO::PARAM_INT);

$query -> execute();
header("Location: tableauProduits.php");  
} else {
    header("Location: index.php");
}
