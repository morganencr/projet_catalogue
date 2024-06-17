<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
function isAdmin() {
    return isset($_SESSION["user"]) && $_SESSION["user"]["role"] === 'admin';
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../index.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=Lilita+One&display=swap" rel="stylesheet">

    <title>TOYS LAND</title>
</head>
<body>
    <nav >
        <div id="navbar-items">
            <div id="logo-site">
                <a href="../index.php"><img src="./components/img/logo.site.png"></a>
                <h1>TOYS LAND</h1>
            </div>
            <div id="logos-navbar">
                <?php if(isAdmin()):?>
                <a href="admin/tableauProduits.php"><i id="connexion" class="fa-solid fa-gear fa-2x"></i></a>
                <?php endif; ?>
            
                <?php if(!isset($_SESSION["user"])): ?>
                <a href="../connexion.php"><i id="connexion" class="fa-solid fa-user fa-2x"></i></a>
                <?php else : ?>
                <a href="déconnexion.php"><i id = "connexion" class="fa-solid fa-right-from-bracket fa-2x"></i></a>
                <?php endif; ?>
                <a href="#"><i id="panier" class="fa-solid fa-cart-shopping fa-2x"></i></a>
            </div>
            <div class="burger-menu" id="burger-menu">☰</div>
        </div>
        <form action="searchResult.php" method="get">
            <div id="searchbar">
                <input type="search" placeholder="Recherchez un produit" name="searchbar" id="searchbar">
                <button><i class="fa-solid fa-magnifying-glass fa-2x"></i></button>
            </div>
        </form>
        <ul class="categories"id="categories">
            <li><a href="jeuxdesociete.php">Jeux de société</a></li>
            <li><a href="activites-creatives.php">Activités créatives</a></li>
            <li><a href="jeuxeveils.php">Jeux d'éveils</a></li>
            <li><a href="jeuxbois.php">Jeux en bois</a></li>
            <li><a href="jeuxconstruction.php">Jeux de construction</a></li>
            <li><a href="jeuxexterieur.php">Jeux d'extérieurs</a></li>
            <li><a style="color:red; font-weight:bold;" href="promos.php">Promos</a></li>
        </ul>
    </nav>
    <script>
            // Fonction pour fermer le menu burger
    function fermerMenuBurger() {
        var burgerMenu = document.getElementById('burger-menu');
        burgerMenu.classList.remove('active');
    }
            // fonction pour fermer le menu déroulant des catégories
    function fermerMenuCategories() {
        var categoriesMenu = document.getElementById('categories');
        categoriesMenu.classList.remove('active');
    }

    // écouter l'événement de redimensionnement de la fenêtre
    window.addEventListener('resize', function() {
        // fermer le menu déroulant des catégories quand la taille de l'écran change
        fermerMenuBurger();
        fermerMenuCategories();
    });
        document.getElementById('burger-menu').addEventListener('click', function() {
            var burgerMenu = document.getElementById('burger-menu');
            burgerMenu.classList.toggle('active');

            var categoriesMenu = document.getElementById('categories');
            categoriesMenu.classList.toggle('active');
        });
    </script>
</body>
</html>