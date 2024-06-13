-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : db
-- Généré le : jeu. 13 juin 2024 à 14:12
-- Version du serveur : 8.0.37
-- Version de PHP : 8.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projet_catalogue`
--

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

CREATE TABLE `produits` (
  `id` int NOT NULL,
  `nom` varchar(255) NOT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `image` varchar(255) NOT NULL,
  `prix` varchar(255) NOT NULL,
  `categorie` varchar(255) NOT NULL,
  `stock` int NOT NULL,
  `promo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`id`, `nom`, `description`, `image`, `prix`, `categorie`, `stock`, `promo`) VALUES
(19, 'Balançoire', 'L&#039;effort implique la détente. Si vous voulez jouer, faire de l&#039;exercice et vous prélasser avec toute la famille, la BERG PLAYBASE est faite pour vous. Un concept multifonctionnel unique, présenté dans un objet de haute qualité et stylé qui s&#039;intègre bien dans le jardin. Le cadre de base est disponible en deux tailles différentes et les possibilités sont infinies. Découvrez par vous-même ce que vous pouvez faire avec BERG PLAYBASE. Le cadre solide et robuste a un design moderne et minimaliste et dispose d&#039;un raccord de tube breveté. L&#039;ensemble est solidement ancré dans le sol et constitue ainsi une base solide pour toutes sortes d&#039;applications. Choisissez si vous optez pour la version Large de 380 cm de large ou la version Medium de 285 cm de large. La profondeur et la hauteur des deux cadres sont les mêmes. À savoir 100 cm de profondeur et 245 cm de hauteur. Pour les côtés du cadre, vous pouvez choisir entre un escalier ou un support ou une combinaison des deux. Savez-vous déjà ce que vous voulez faire avec PLAYBASE ? En effet, vous pouvez déjà choisir parmi pas moins de 12 accessoires différents, que vous pouvez facilement assembler et démonter. De nombreux autres accessoires seront ajoutés à l&#039;avenir. Il y en a pour tous les goûts et cela peut être différent chaque jour. ', 'uploads/3d1c48badab2333527a8afe6222b83b4.jpg', '1500€', 'Jeux d\'extérieur', 15, 'Non'),
(20, 'Tobogan', 'Toboggan très grand modèle en plastique soufflé. Glisse double vague qui offre une longueur de 2m30. La sécurité est assurée par un large pied qui offre une très bonne stabilité et par une échelle soufflée, équipée de mains courantes ergonomiques. Marches antidérapantes. Possibilité de brancher un tuyau d&#039;arrosage (non fourni) au sommet de la glisse. Les pièces plastiques sont traitées Anti-UV pour une bonne résistance et une meilleure tenue des couleurs dans le temps. Max 50 kg. Sa glisse double vague saura les amuser durant de longues heures puisqu&#039;elle s&#039;étale sur une longueur de 2.30m : les sensations sont décuplées ! Vous n&#039;aurez aucun souci à vous faire quant à la sécurité de vos enfants grâce au large pied qui offre une très bonne stabilité. De plus, l&#039;échelle soufflée est équipée de mains courantes et de marches antidérapantes. Les journées ensoleillées seront encore plus agréables car vous pourrez brancher un tuyau d&#039;arrosage sous la glisse pour créer une cascade d&#039;eau et rafraîchir vos petits ! Ce toboggan pourra rester des années entières dans votre jardin grâce à son traitement anti-UV qui lui permet de rester résistant et de garder ses jolies couleurs au fil du temps ! Vos enfants passeront des journées entières avec leurs copains à glisser et rigoler !', 'uploads/e58a475d8b26397cc5ea61d55cc9b176.png', '700€', 'Jeux d\'extérieur', 52, 'Non'),
(21, 'Trampoline', 'Tous ces sauts ne vous lassent jamais? Aucun problème! Le BERG Favorit vous procure des années de plaisir, s&#039;use à peine et nécessite peu d&#039;entretien. Le BERG Favorit a été conçu avec beaucoup de soin et d&#039;attention. Le résultat en vaut la peine; c&#039;est un trampoline d&#039;excellente qualité et très sûr.Toile de saut. Tapis de saut durable en propylène tissé très résistant. Les boucles de ces robustes trous métalliques des ressorts sont solidement fixées avec 8 séries de coutures. Grâce à la structure à mailles ouverte, le tapis de saut ne se réchauffe pas et ne brûle pas les pieds.Goldspring Solo Les trampolines de toutes les tailles de la ligne Favorit sont équipés de ces ressorts. C&#039;est pourquoi on rebondit si confortablement sur ces trampolines. Le confort de saut sur ces trampolines est beaucoup plus élevé que sur la précédente ligne de BERG Talent avec ressorts GoldSpring Talent.BERG RegularSi vous ne voulez pas creuser de trou dans le jardin, il est préférable de choisir un trampoline haut. Un trampoline haut est très facile à installer et à changer de place. En outre, un trampoline haut se voit bien dans le jardin.Un trampoline rondLe cadre d&#039;un trampoline rond est très solide. Quand on rebondit sur un trampoline rond, on revient toujours vers le milieu. C&#039;est au milieu d&#039;un trampoline rond que l&#039;on rebondit le plus agréablement. La raison en est la suivante: c&#039;est au milieu que les ressorts et le cadre répartissent mieux les forces du saut.', 'uploads/20332658620832a6ca0ac37f2278cd79.jpg', '1799€', 'Jeux d\'extérieur', 30, 'Non'),
(22, 'Trotinette', 'Scooter ou trottinette Cap Sport avec grandes roues à rayons et des pneus gonflables. Adapté à une conduite sur différentes surfaces. Roue avant de 16 pouces (40.5 cm), roue arrière de 12 pouces (30.5 cm). Il est équipé de freins en V à l&#039;avant comme à l&#039;arrière. Cadre et jantes en acier. Poignées au toucher doux. Large repose-pieds antidérapant. Avec une béquille latérale. Poids maximum de l’utilisateur : 100 kg. Livré à 70% assemblé : il reste à assembler la roue avant, le guidon et les câbles de frein. L&#039;assemblage doit être effectué par un adulte. Instructions de montage incluses. Développe l&#039;équilibre et la coordination. Le guidon est à assembler mais n&#039;est pas réglable en hauteur : insérez la barre du guidon de 65 à 70 mm dans le haut de la fourche avant. Ce scooter ou trottinette tout-terrain est idéal pour les enfants qui aiment sortir et explorer. Il permet aux enfants d&#039;aller dans des endroits où un scooter ordinaire ne peut pas les emmener, les gardant actifs et développant en même temps leur équilibre et leur coordination. Les roues avant et arrière pneumatiques à grande bande de roulement facilitent le travail sur tout terrain difficile qu&#039;ils pourraient rencontrer lors de leur prochaine aventure.', 'uploads/640694be741f914777cc9c71534fbd9f.jpg', '85€', 'Jeux d\'extérieur', 65, 'Non'),
(23, 'véhicule à pédale', 'Chez BERG, nous souhaitons donner aux enfants l&#039;envie de jouer à l&#039;air libre. Un kart de BERG, c&#039;est la garantie de plusieurs années de divertissement, en toute sécurité sur des kilomètres et des kilomètres. Chez BERG, nous disposons d&#039;une vaste gamme de karts pour les jeunes et les moins jeunes, les grands et les petits. Cela va de la voiture à pédales (10 mois et plus) aux karts électriques (6 ans et plus). Les karts de BERG sont disponibles dans différentes couleurs pour garçons et filles. Nous avons pour vous le kart idéal ! Cette ligne Reppy de BERG convient aux enfants de 2,5 à 5 ans. Les Reppy BMW, Roadster, Rebel et Racer sont équipés de l&#039;impressionnante caisse de résonance Race. Cette caisse de résonance possède 4 boutons différents : freinage, vrombissement, démarrage du moteur et accélération. Points forts des karts - Plus de 35 ans d&#039;expérience dans le développement de karts - Utilisation de matériaux de haute qualité et adaptés aux enfants - Conforme aux exigences de sécurité les plus strictes', 'uploads/21a05d6c31a8b03558368a24f11791b0.jpg', '129,99 €', 'Jeux d\'extérieur', 45, 'Non'),
(24, 'rollers', 'Cap Sport. Coloris : rouge. Taille 33-36. Rollers en ligne, réglables par bouton poussoir. Boucles crantées à 2 têtes, fermetures sécurisées avec clip. Chaussons intérieurs réglables en taille, mousse grand confort, et languettes renforcées. 1 frein arrière à chaque pied. Châssis en alu. 4 roues en plastique (PVC) imprimé. Roues : 64 x 24 mm. Roulements 608ZB pour une glisse progressive. Rollers de classe B : destinés aux patineurs dont le poids est compris entre 20 et 60 kilos, et dont la longueur du pied n&#039;excède pas 260 mm. Pour l&#039;initiation et le perfectionnement. Livré dans un sac cristal de transport, dimensions Longueur 31 x largeur 11 x hauteur 26 en cm. Kit de maintenance (1 frein et 1 axe court + écrou, 1 outil embout phillips et 1 clé embout Hex).', 'uploads/59abbb44f122c0a198168a09900da593.jpg', '49.99€', 'Jeux d\'extérieur', 22, 'Non');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `firstname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'utilisateur'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `firstname`, `name`, `email`, `password`, `role`) VALUES
(1, 'gui', 'til', 'renault@email.fr', '$argon2id$v=19$m=65536,t=4,p=1$bXYxdFMyV0ZsL0hxZDVmTg$y9Dizvw69vLI6XEJM7iHk2k/ykm3P7+wU0MuXKlFUHQ', 'utilisateur'),
(2, 'gui', 'gui.ti', 'peugeot@automobile.fr', '$argon2id$v=19$m=65536,t=4,p=1$U0V2OExVYmFOOEJCbkUzMQ$ZynH+2uaxKSdpxDLCUNlyliRxQusETccpuoR/on882o', 'utilisateur'),
(3, 'zizou', 'zidane', 'zizou@zizou.fr', '$argon2id$v=19$m=65536,t=4,p=1$d0luYVRVa1FjS1ZUcTZZMg$ovW9oOEShWzb07PIfg4xCnxGf+0ROdssVKPkxewKu1I', 'utilisateur');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `produits`
--
ALTER TABLE `produits`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
