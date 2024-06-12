<?php
session_start();
$_SESSION["error"] = [];

if(isset($_SESSION["user"])){
    header("Location: index.php");
    exit;
}

// les conditions pour se connecter:
if(!empty($_POST)){
    // Le formulaire a été envoyé 
    // On vérifie que TOUS les champs requis sont remplis
    if(isset($_POST["email"], $_POST["pass"]) && !empty($_POST["email"]) && !empty($_POST["pass"])
    ){
    // d'abord on vérifie que l'email est un email:
        if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
            $_SESSION["error"][]="Ce n'est pas un email";
        } else {

    // si c'est un email:
    // On va se connecter à la db 
    require_once("connect.php");

    //on vérifie que l'user est dans la bdd avec cet email
    $sql = "SELECT * FROM `users` WHERE `email` = :email";

    $query = $db->prepare($sql);
    $query->bindValue(":email", $_POST["email"], PDO::PARAM_STR);
    $query->execute();

    // après un SELECT on fait un fecth:
    $user = $query->fetch();

    if(!$user){
        $_SESSION["error"][]="l'utilisateur et/ou le mdp est incorrect";
    } else {

    // Ici il y a un utilisateur existant, ça veut dire qu'on peut vérifier son mdp:
    // on va utliser une fonction: password_verify ça va demander 2 paramètres : le mdp tapé dans le formulaire et le hashe dans la base de donné
    // Donc avec password_verify on peut vérifier si le mdp correspond
    if(!password_verify($_POST["pass"], $user["password"])){
        $_SESSION["error"][]="l'utilisateur et/ou le mdp est incorrect";
    } else {
    // ici l'utilisateur et le mot de passe sont corrects
        // on va donc pouvoir ouvrir la session ou "connecter l'utilisateur"
        // on initialise une superglobal($_SESSION) qui reste tjrs disponible tant qu'on ne ferme pas le navigateur; Elle ne sert pas qu'à connecter les utilisateurs, elle sert également pour stocker toute information qu'on souhaite passé d'une page à une autre
        // CA PEUT S'UTILISER POUR UN PANIER, POUR DES MESSAGES
        // NE PAS CONFONDRE SESSION UTILISATEUR ET SESSION PHP, session PHP C4EST POUR STOCKER LES INFORMATION DE L'UTILISATEUR 
        //  on stocke dans $_SESSiON les informations de l'utilisateur
        $_SESSION["user"]= [
            "id" =>  $user["id"],
            "prenom" => $user['firstname'],
            "email" => $user['email'],
        ];
    header("Location: index.php");
    exit;
    }
}
}
    } else {
        $_SESSION["error"][]="le formulaire est incomplet";
    }
}
include_once("components/navbar.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login-signup.css">
    <title>connexion</title>
</head>
<body>
    <h1>Connexion</h1>
<?php
if(isset($_SESSION["error"])){
    foreach($_SESSION["error"] as $message){
        ?>
        <p><?= $message ?></p>
        <?php
    }
    unset($_SESSION["error"]);
}
?>
<form class="formulaire-connexion" method="post">
    <div id="container">
    <div>
        <label for="email">Email</label>
        <input type="email" name="email" id="email" required>
    </div>
    <div>
        <label for="pass">Mot de passe</label>
    <input type="password" name="pass" id="pass" required>
    </div>
    <div id="bouton">
    <button type="submit">Me connecter</button>
    </div>
    </div>
</form>
<div id="inscription"><a href="inscription.php">Cliquez ici si vous n'êtes pas enregistré</a></div>
</body>
</html>

<?php
include_once("components/footer.php");