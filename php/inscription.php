<?php
session_start();
$_SESSION["error"] = [];
// Si on est connecté on ne veut pas voir inscription puisqu'on est déja connecté donc on va rediriger vers la page de profil
// on FAIT LA MEME CHOSE SUR LA PAGE connexion.php
// if(isset($_SESSION["user"])){
//     header("Location: index.php");
//     exit;
// }
if(!empty($_POST)){
    // var_dump($_POST);
    // à partir d'ici je sais que le formulaire a été envoyé
    // on vérifie donc que tous les champs requis sont remplis:
        //  ce qui compte dans la superglobal POST c'est ce qu'on a écrit dans le HTML AU NIVEAU DES NAME
    if(isset($_POST["firstname"], $_POST["name"],$_POST["email"], $_POST["pass"])
    && !empty($_POST["firstname"]) && !empty($_POST["name"]) && !empty($_POST["email"]) && !empty($_POST["pass"])
    ){
        $name = strip_tags($_POST["name"]);
        $firstname = strip_tags($_POST["firstname"]);
     
        // on verifie si l'email est vraiment un email AVEC UNE FONCTION QUI S'APPELLE filter_var() avec 2 paramètres, le 2ème est pour valider que c'est un email. finalement on vérifie si ce n'est pas un email on lui envoi un die
        if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
            $_SESSION["error"][] = "L'adresse email est incorrecte"; 

        }
        // on va hasher le mdp pour ne pas pouvoir le récupérer dans la db
        $pass = password_hash($_POST["pass"], PASSWORD_ARGON2ID);

        //on se connecte à la bdd:
        require_once("connect.php");

        $sql = "INSERT INTO `users` (`firstname`, `name`, `email`, `password`) VALUE (:firstname, :name, :email, '$pass')";

        // mtn on prépare la requête 
        $query = $db->prepare($sql);
        // Pour connecter les variables PHP a leur variable SQL :
        $query->bindValue(":firstname", $firstname, PDO:: PARAM_STR);
        $query->bindValue(":name", $name, PDO:: PARAM_STR);
        $query->bindValue(":email", $_POST["email"], PDO:: PARAM_STR);

        $query->execute();

        // on récupère l'id du nouvel utilisateur
        $id = $db->lastInsertId();

        //  on stocke dans $_SESSiON les informations de l'utilisateur
        $_SESSION["user"] = [
            "id"=>$id,
            "firstname" => $firstname,
            "name"=> $name,
            "email"=>$_POST["email"],
        ];
        // une fois que l'on a fait ça, on est connecté on peut donc redirigé vers la page d'acceuil'(par ex)
        header("Location: index.php");
    } else {
        $_SESSION["error"]=["Le formulaire est incomplet"];
    }
}
include_once("components/navbar.php");

?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login-signup.css">
    <title>inscription</title>
</head>
<body>
<h1>Inscription</h1>
<?php
// pour faire passer des informations des erreur directement au dessus du formulaire grâce à la basile p
if(isset($_SESSION["error"])){
    foreach($_SESSION["error"] as $message){
        ?>
        <p><?= $message ?></p>
        <?php
    }
    // par contre après io faut supprimer la session sinon le message reste tt le temps:
    unset($_SESSION["error"]);
    // Cette boucle là est standard on l'affiche partout où on veut afficher un message 
}
?>
<form id ="formulaire-inscription"method="post">
    <!-- j'enlève l'action du formulaire car je vais le traiter dans le même fichier -->
     <div id="container-inscription">
        <div id="colonne1">
    <div>
        <label for="firstname">Prénom</label>
        <input type="text" name="firstname" id="firstname" >
    </div>
    <div>
        <label for="pass">Mot de passe</label>
        <input type="password" name="pass" id="pass">
    </div>
    </div>
    <div id="colonne2">
    <div>
        <label for="name">Nom</label>
        <input type="text" name="name" id="name" >
    </div>
    <div>
        <label for="email">Email</label>
        <input type="email" name="email" id="email">
    </div>
    </div>
    </div>
    <div id="bouton-inscription">
    <button type="submit">M'inscrire</button>
    </div>
</form>
</body>
</html>
<?php
include_once("components/footer.php");