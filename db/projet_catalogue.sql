-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : db
-- Généré le : mar. 18 juin 2024 à 14:32
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
  `prix` float NOT NULL,
  `categorie` varchar(255) NOT NULL,
  `stock` int NOT NULL,
  `promo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`id`, `nom`, `description`, `image`, `prix`, `categorie`, `stock`, `promo`) VALUES
(19, 'Balançoire', 'L&#039;effort implique la détente. Si vous voulez jouer, faire de l&#039;exercice et vous prélasser avec toute la famille, la BERG PLAYBASE est faite pour vous. Un concept multifonctionnel unique, présenté dans un objet de haute qualité et stylé qui s&#039;intègre bien dans le jardin. Le cadre de base est disponible en deux tailles différentes et les possibilités sont infinies. Découvrez par vous-même ce que vous pouvez faire avec BERG PLAYBASE. Le cadre solide et robuste a un design moderne et minimaliste et dispose d&#039;un raccord de tube breveté. L&#039;ensemble est solidement ancré dans le sol et constitue ainsi une base solide pour toutes sortes d&#039;applications. Choisissez si vous optez pour la version Large de 380 cm de large ou la version Medium de 285 cm de large. La profondeur et la hauteur des deux cadres sont les mêmes. À savoir 100 cm de profondeur et 245 cm de hauteur. Pour les côtés du cadre, vous pouvez choisir entre un escalier ou un support ou une combinaison des deux. Savez-vous déjà ce que vous voulez faire avec PLAYBASE ? En effet, vous pouvez déjà choisir parmi pas moins de 12 accessoires différents, que vous pouvez facilement assembler et démonter. De nombreux autres accessoires seront ajoutés à l&#039;avenir. Il y en a pour tous les goûts et cela peut être différent chaque jour. ', 'uploads/3d1c48badab2333527a8afe6222b83b4.jpg', 1499.99, 'Jeux d\'extérieur', 15, 'Non'),
(20, 'Tobogan', 'Toboggan très grand modèle en plastique soufflé. Glisse double vague qui offre une longueur de 2m30. La sécurité est assurée par un large pied qui offre une très bonne stabilité et par une échelle soufflée, équipée de mains courantes ergonomiques. Marches antidérapantes. Possibilité de brancher un tuyau d&amp;#039;arrosage (non fourni) au sommet de la glisse. Les pièces plastiques sont traitées Anti-UV pour une bonne résistance et une meilleure tenue des couleurs dans le temps. Max 50 kg. Sa glisse double vague saura les amuser durant de longues heures puisqu&amp;#039;elle s&amp;#039;étale sur une longueur de 2.30m : les sensations sont décuplées ! Vous n&amp;#039;aurez aucun souci à vous faire quant à la sécurité de vos enfants grâce au large pied qui offre une très bonne stabilité. De plus, l&amp;#039;échelle soufflée est équipée de mains courantes et de marches antidérapantes. Les journées ensoleillées seront encore plus agréables car vous pourrez brancher un tuyau d&amp;#039;arrosage sous la glisse pour créer une cascade d&amp;#039;eau et rafraîchir vos petits ! Ce toboggan pourra rester des années entières dans votre jardin grâce à son traitement anti-UV qui lui permet de rester résistant et de garder ses jolies couleurs au fil du temps ! Vos enfants passeront des journées entières avec leurs copains à glisser et rigoler !', 'uploads/fe75f98f6e67d0c9eff9f00e8340f038.png', 700, 'Jeux d\'extérieur', 52, 'Non'),
(21, 'Trampoline', 'Tous ces sauts ne vous lassent jamais? Aucun problème! Le BERG Favorit vous procure des années de plaisir, s&amp;#039;use à peine et nécessite peu d&amp;#039;entretien. Le BERG Favorit a été conçu avec beaucoup de soin et d&amp;#039;attention. Le résultat en vaut la peine; c&amp;#039;est un trampoline d&amp;#039;excellente qualité et très sûr.Toile de saut. Tapis de saut durable en propylène tissé très résistant. Les boucles de ces robustes trous métalliques des ressorts sont solidement fixées avec 8 séries de coutures. Grâce à la structure à mailles ouverte, le tapis de saut ne se réchauffe pas et ne brûle pas les pieds.Goldspring Solo Les trampolines de toutes les tailles de la ligne Favorit sont équipés de ces ressorts. C&amp;#039;est pourquoi on rebondit si confortablement sur ces trampolines. Le confort de saut sur ces trampolines est beaucoup plus élevé que sur la précédente ligne de BERG Talent avec ressorts GoldSpring Talent.BERG RegularSi vous ne voulez pas creuser de trou dans le jardin, il est préférable de choisir un trampoline haut. Un trampoline haut est très facile à installer et à changer de place. En outre, un trampoline haut se voit bien dans le jardin.Un trampoline rondLe cadre d&amp;#039;un trampoline rond est très solide. Quand on rebondit sur un trampoline rond, on revient toujours vers le milieu. C&amp;#039;est au milieu d&amp;#039;un trampoline rond que l&amp;#039;on rebondit le plus agréablement. La raison en est la suivante: c&amp;#039;est au milieu que les ressorts et le cadre répartissent mieux les forces du saut.', 'uploads/53fc594a3b73847464da36fb2f64d26e.png', 1799, 'Jeux d\'extérieur', 30, 'Non'),
(22, 'Trotinette', 'Scooter ou trottinette Cap Sport avec grandes roues à rayons et des pneus gonflables. Adapté à une conduite sur différentes surfaces. Roue avant de 16 pouces (40.5 cm), roue arrière de 12 pouces (30.5 cm). Il est équipé de freins en V à l&amp;#039;avant comme à l&amp;#039;arrière. Cadre et jantes en acier. Poignées au toucher doux. Large repose-pieds antidérapant. Avec une béquille latérale. Poids maximum de l’utilisateur : 100 kg. Livré à 70% assemblé : il reste à assembler la roue avant, le guidon et les câbles de frein. L&amp;#039;assemblage doit être effectué par un adulte. Instructions de montage incluses. Développe l&amp;#039;équilibre et la coordination. Le guidon est à assembler mais n&amp;#039;est pas réglable en hauteur : insérez la barre du guidon de 65 à 70 mm dans le haut de la fourche avant. Ce scooter ou trottinette tout-terrain est idéal pour les enfants qui aiment sortir et explorer. Il permet aux enfants d&amp;#039;aller dans des endroits où un scooter ordinaire ne peut pas les emmener, les gardant actifs et développant en même temps leur équilibre et leur coordination. Les roues avant et arrière pneumatiques à grande bande de roulement facilitent le travail sur tout terrain difficile qu&amp;#039;ils pourraient rencontrer lors de leur prochaine aventure.', 'uploads/97b43f827fd7c17338784ea35514d9bb.jpg', 84, 'Jeux d\'extérieur', 65, 'Non'),
(23, 'Véhicule à pédales', 'Chez BERG, nous souhaitons donner aux enfants l&amp;#039;envie de jouer à l&amp;#039;air libre. Un kart de BERG, c&amp;#039;est la garantie de plusieurs années de divertissement, en toute sécurité sur des kilomètres et des kilomètres. Chez BERG, nous disposons d&amp;#039;une vaste gamme de karts pour les jeunes et les moins jeunes, les grands et les petits. Cela va de la voiture à pédales (10 mois et plus) aux karts électriques (6 ans et plus). Les karts de BERG sont disponibles dans différentes couleurs pour garçons et filles. Nous avons pour vous le kart idéal ! Cette ligne Reppy de BERG convient aux enfants de 2,5 à 5 ans. Les Reppy BMW, Roadster, Rebel et Racer sont équipés de l&amp;#039;impressionnante caisse de résonance Race. Cette caisse de résonance possède 4 boutons différents : freinage, vrombissement, démarrage du moteur et accélération. Points forts des karts - Plus de 35 ans d&amp;#039;expérience dans le développement de karts - Utilisation de matériaux de haute qualité et adaptés aux enfants - Conforme aux exigences de sécurité les plus strictes', 'uploads/a5237556f83c5414675eac3ffc45ef6d.png', 129, 'Jeux d\'extérieur', 45, 'Non'),
(24, 'Rollers', 'Cap Sport. Coloris : rouge. Taille 33-36. Rollers en ligne, réglables par bouton poussoir. Boucles crantées à 2 têtes, fermetures sécurisées avec clip. Chaussons intérieurs réglables en taille, mousse grand confort, et languettes renforcées. 1 frein arrière à chaque pied. Châssis en alu. 4 roues en plastique (PVC) imprimé. Roues : 64 x 24 mm. Roulements 608ZB pour une glisse progressive. Rollers de classe B : destinés aux patineurs dont le poids est compris entre 20 et 60 kilos, et dont la longueur du pied n&amp;#039;excède pas 260 mm. Pour l&amp;#039;initiation et le perfectionnement. Livré dans un sac cristal de transport, dimensions Longueur 31 x largeur 11 x hauteur 26 en cm. Kit de maintenance (1 frein et 1 axe court + écrou, 1 outil embout phillips et 1 clé embout Hex).', 'uploads/0c4556ea4f9daee3532b1c2744c49559.png', 49, 'Jeux d\'extérieur', 22, 'Non'),
(25, 'Lego millenium', 'Ce nouveau modèle LEGO® Star Wars Millennium Falcon est le plus grand et le plus détaillé jamais conçu. En réalité, avec ses 7 500 pièces, c’est tout simplement l’un des plus grands modèles LEGO ! Cette fantastique version LEGO de l’inoubliable cargo Corellien de Han Solo présente les moindres détails dont rêvent tous les fans de Star Wars, quel que soit leur âge : d’innombrables détails à l’extérieur, quatre canons laser supérieurs et inférieurs, des pieds d’atterrissage, une rampe d’embarquement qui s’abaisse et un cockpit avec toit amovible pouvant accueillir 4 figurines. Chacune des plaques de la coque peut être retirée pour découvrir les innombrables détails du compartiment principal, le compartiment arrière et le poste d’artillerie. Ce superbe modèle présente également des équipages et des radars interchangeables, ce qui permet aux fans d’opter pour les aventures LEGO Star Wars classiques avec Han, Leia, Chewbacca et C-3PO ou de plonger dans l’univers de l’Episode VII et VIII avec les anciens personnages Han, Rey, Finn et BB-8 ! Inclut 4 figurines de l’équipage classique : Han Solo, Chewbacca, Princesse Leia et C-3PO. Comprend également 3 figurines de l’Épisode VII/VIII : les anciens personnages Han Solo, Rey et Finn. Figurines incluses : un droïde BB-8, ainsi qu’un mynock et 2 Porgs à construire.', 'uploads/a465fd9daf11652e5abfc2150b1032d1.png', 850, 'Jeu de construction', 12, 'Oui'),
(26, 'Monopoly faux billets', 'Il ne faut pas se fier aux apparences, car quelqu&#039;un a ajouté de faux billets et de fausses cartes Chance au jeu. Heureusement, M. Monopoly met son décodeur à la disposition des joueurs pour les aider à dénicher les faux billets tout en faisant fortune. Dans ce jeu captivant de révélations, les joueurs utilisent judicieusement leurs jetons pour défier leurs adversaires. Le joueur avec le plus d&#039;argent (vrai ou faux) à la fin de la partie gagne. Ce jeu de plateau amusant pour la famille est un super choix pour les soirées de jeu ou pour une activité d&#039;intérieur pour les enfants. Inclut plateau de jeu, décodeur en plastique, 6 pions, 22 cartes Propriété, 24 cartes Chance, 14 cartes Caisse de communauté, 12 jetons Décodeur en carton, 12 hôtels, 2 dés, liasse de billets Monopoly et les règles du jeu. Pour 2 à 6 joueurs.', 'uploads/68f191bc66dcc4fed050361c1c5861f8.png', 24, 'Jeux de société', 21, 'Oui'),
(27, 'Tarot Junior', 'Les cartes Ducale rassemblent petits et grands pour le plaisir de jouer et avec ce jeu de Tarot Premium, vos parties de Tarot ont une autre saveur. Grâce à une expertise de maître cartier inégalée et à un savoir-faire francais ancestral, la carte à jouer Ducale Origine est la promesse de moments jeux inoubliables.', 'uploads/10628bd6114c64a174806c2e74f13ab9.jpg', 13, 'Jeux de société', 27, 'Non'),
(28, 'Le nain jaune', 'Le véritable jeu du Nain Jaune dans une mallette aménagée en table de jeu qui permet de jouer partout ! Nouvelle version.', 'uploads/277dfe6c52b19d0694c8af9f422ee805.png', 19, 'Jeux de société', 19, 'Non'),
(29, 'Grande roue en bois', 'Profitez du panorama… prenez le temps de la réflexion. Voici un jeu adapté des jeux de NIM, plus connus sous le nom de jeu des bâtons. A tour de rôle, chaque joueur enlève 1,2 ou 3 personnages, à sa convenance. Pour gagner, il ne faut pas être le dernier joueur à retirer le dernier pion. Le jeu se compose d’une roue, qui sert de support aux pions, et de 16 pions ‘’personnages’’ en bois, à disposer aléatoirement sur la roue. Jeu de stratégie et de réflexion en bois FSC™. Pour les enfants à partir de 5 ans. A partir de 2 joueurs.', 'uploads/97879f9221d0f4fc5d9af05b0ca5723b.png', 19, 'Jeu en bois', 29, 'Non'),
(30, 'Qui est-ce ?', '	Comment être le meilleur aux devinettes avec Qui Est-Ce ? Avec le célèbre jeu de déduction Qui Est-Ce ? Tu dois découvrir qui est le personnage mystère choisi par ton adversaire. En posant des questions qui ne se répondent que par OUI ou NON, chaque joueur tente de deviner en premier qui se cache derrière le personnage mystère pour gagner la partie ! Les joueurs peuvent aussi s&#039;affronter dans une série de parties. C&#039;est alors le premier joueur à remporter 5 parties qui remporte la partie.', 'uploads/f30a7bee8268afd1c683d1481f8ef19a.png', 29, 'Jeux de société', 45, 'Non'),
(31, 'Puissance 4', '4 pions alignés, c’est gagné ! Puissance 4 est un jeu de stratégie où 2 joueurs s&#039;affrontent pour contrôler la grille ! Les joueurs peuvent choisir les pions rouges ou jaunes. Ils les font glisser dans la grille en commençant au centre ou sur les côtés pour empiler leurs pions à la verticale, à l&#039;horizontale ou en diagonale. On peut user de stratégie pour bloquer son adversaire, tout en essayant d&#039;être le premier joueur à aligner 4 pions pour gagner. À la recherche d&#039;un jeu d&#039;intérieur amusant ou d&#039;un jeu classique pour enfants ? Puissance 4 est un excellent choix pour les après-midi entre amis, les jours de pluie ou une simple partie avec les enfants. C&#039;est un super cadeau pour les enfants, à partir de 6 ans. Hasbro Gaming et toutes les marques et logos associés sont des marques de commerce de Hasbro, Inc.', 'uploads/a16f9f0e012d1be0a873d8277646e3b7.png', 21, 'Jeux de société', 32, 'Non'),
(32, 'SOS Ouistiti', 'Tout en s’amusant, observez , élaborez des stratégies et maniez avec dextérité les baguettes pour ne pas faire tomber les singes. Préparez-vous à partager de nombreux fous rires en jouant à SOS Ouistiti ! Il faut retirer les baguettes de la couleur indiquée par le dé sans faire tomber tous les singes.', 'uploads/cdf2eb799994a83ca61dd6ac858facd2.png', 35, 'Jeux de société', 28, 'Oui'),
(33, 'Coffret Aquarellum', 'Fantastique ! Quelques gouttes de peinture et tous les enfants pourront réaliser de véritables chefs-d&#039;oeuvre. Aquarellum Junior est basé sur une technique, créée par Véronique Debroise, de sertissage sur papier vélin, qui ne laisse la peinture adhérer que sur des surfaces réservées. Le motif apparaît au fur et à mesure du passage du pinceau et peut être repeint jusqu&#039;à ce que le tableau soit parfait. Une activité idéale pour initier les enfants à l’art en comprenant le mélange des couleurs, stimuler l’imaginaire et la concentration.', 'uploads/97cc5dd1b2bf284620c0a6d8c65d06d5.jpg', 13, 'Activité créative', 28, 'Non'),
(34, 'Atelier de dessins', 'Une nouvelle plateforme optimisée pour faire ses premiers dessins à partir de formes simples. L’enfant suit le modèle par transparence et en 4 étapes il réalise de très beaux dessins !', 'uploads/cc4e629ec5ec2428052c15a6109e0d2d.jpg', 32, 'Activité créative', 35, 'Non'),
(35, 'Coffret Glitter Dots', 'Le coffret Glitter Dots - Surprise Box de Crayola est une boite avec plein de surprise Glitter Dots à l’intérieur. Découvre des cartes à décorer et un porte-clés différents selon les boites. Tous les outils sont inclus pour libérer la création et laisser parler son imagination !', 'uploads/ce815a038d9b4e3bff763becfe409b0e.png', 26, 'Activité créative', 21, 'Non'),
(36, 'Ateliers créatifs', 'Voici une boite de loisirs créatifs qui regorge d&#039;activités amusantes pour les enfants à partir de 4 ans ! Elle propose 2 techniques différentes qui permettent de réaliser 9 créations aux belles couleurs, de quoi rendre les enfants fiers de leurs activités ! 3 tableaux sont à décorer avec des stickers épais qui permettent de donner un bel effet de volume et 6 tableaux graphismes sont à colorier ou à compléter avec un feutre effaçable qui permet de recommencer à l&#039;infini !', 'uploads/73169cfc3b9e9eb33c5cb97d52a5ee49.png', 12, 'Activité créative', 25, 'Non'),
(37, 'Set de jeux décoratifs', 'Éclate toi à décorer avec ce set de 5 jeux créatifs et décoratifs ! Il comprend tout ce dont vous avez besoin pour créer un cadre capteur de soleil, un chignon de lamas, un oreiller licorne, un arc-en-ciel en céramique et une tirelire licorne en céramique. Utilise de la peinture, des paillettes, des autocollants, du feutre et du fil pour créer des objets amusants pour ta chambre.', 'uploads/05ac0c6170c6114ec0df564505fb612c.png', 8, 'Activité créative', 12, 'Non'),
(38, 'Pochette Origami', 'Avec cette pochette d&#039;origamis sur le thème des animaux tropicaux, votre enfant se lance avec succès dans l&#039;art de l&#039;origami ! Le pas à pas le guide à chaque étape de pliage pour qu&#039;il crée facilement de magnifiques origamis avec des détails en fluo. Cette activité créative et calme développe la précision de ses gestes ainsi que sa concentration, pour un résultat toujours valorisant.', 'uploads/f2106f9dfbbefe0ca49885c517acba4c.jpg', 6, 'Activité créative', 18, 'Non'),
(39, 'SES CREATIVE', 'Ça fait beaucoup d’autocollants ! Et tellement de cartes d’animaux ! Ce kit contient une grande quantité d’autocollants et cinq rouleaux de ruban adhésif, qui doivent tous être collés au bon endroit. Peux-tu compléter les 24 cartes ?', 'uploads/3e89b968c8e9a82fabda01ce7de39f56.png', 9, 'Jeux d\'éveil', 21, 'Non'),
(41, 'Toys Tour 4 en 1', 'Ce jeu de société amusant pour les enfants et les adultes n&#039;est pas une tour comme les autres. Il intègre 4 variantes à savourer en famille : 1) Jouer pour construire la tour en utilisant les dés pour savoir quel bloc prendre. 2) Utilisez les cartes d&#039;animaux au lieu du dé pour deviner et sortir les blocs. 3) Réaliser des constructions créatives 4) Créer une chaîne de dominos.', 'uploads/67ef81168584b3734259f93dc6278b45.jpg', 26, 'Jeux d\'éveil', 22, 'Non'),
(42, 'La boîte anti-ennui', 'Allez, hop, on pioche une carte de cette boîte magique et votre enfant deviendra un fleuriste passionné grâce à quelques feuilles de papier et une paire de ciseaux, volcanologue, nettoyeur de vitre, écrivain ou dessinateur talentueux. Il aura ainsi une multitude d&#039;idées pour s&#039;occuper seul ou avec vous, même quand &quot; il n&#039;y a rien à faire &quot; ! Au programme : lecture, cuisine, bricolage, rangement... Nul besoin d&#039;avoir du matériel très élaboré, vous avez sûrement déjà tout à la maison.', 'uploads/315c1d1dfbc854cf2b9a707a2fd71806.png', 29, 'Jeux d\'éveil', 32, 'Non'),
(43, 'Manette d\'apprentissage', 'Ce jouet d&#039;apprentissage sons et lumières en forme de manette de jeu est idéal pour les bébés à partir de 6 mois. Il inclut 4 boutons ABCD, un joystick et des boutons latéraux. Les piles sont fournies. La manette de jeu est de couleur rose et fait partie de la gamme Fisher Price Classic.', 'uploads/188c7c68935c489ac185cc6df0215921.png', 18, 'Jeux d\'éveil', 28, 'Non'),
(44, 'Jeu d\'éveil musical', 'Une jolie mélodie pour apaiser bébé. une image aux couleurs variées défile au rythme de la musique. se transporte facilement grâce à sa poignée et se fixe aux barreaux du lit ou du parc par une attache.', 'uploads/1b9b6739670ed88df826e277011c62fe.png', 32, 'Jeux d\'éveil', 28, 'Non'),
(45, 'Trieur de formes', 'Mon trieur de formes est une boîte pleine de joie. Ces gros blocs colorés initient bébé aux couleurs et aux formes tandis qu&#039;il les trie, les empile et les insère à travers les ouvertures du couvercle de la boîte. Et il suffit de vider la boîte pour recommencer à s&#039;amuser de plus belle ! Mon trieur de formes est équipé d&#039;une anse de transport pour être emporté facilement partout où vous allez avec bébé. Apprentissage et développement par le jeu Motricité fine : saisir les blocs, les ranger, les sortir… toutes ces tâches favorisent le renforcement de l&#039;agilité et de la coordination œil-main de bébé. Résolution de problème : bébé va exercer sa capacité à résoudre des problèmes en analysant comment trier et insérer les blocs dans les bonnes ouvertures.', 'uploads/f6c700541c74cebd01be8a49951ca635.png', 14, 'Jeux d\'éveil', 32, 'Non'),
(46, 'Tortue à tirer', 'La tortue va rapidement devenir un compagnon pour bébé. Il encourage les tout petits à se déplacer grâce à son cordon et ses roues. De longues heures de balades en perspective! La tête de la tortue bouge et le tambour tourne quand bébé fait avancer la tortue! Quand la balade est terminée la tortue se transforme en trieur de formes pour aider bébé à exercer dextérité.', 'uploads/b9f4ee084ea6373dc0e8fe2fd0f02c86.png', 26, 'Jeu en bois', 23, 'Non'),
(47, 'Boîte à outils', '	34 pièces d&#039;outils en bois（Avec manuel d&#039;instructions）, y compris des scies, clés, maillets, marteaux à griffes, tournevis cruciformes, tournevis droits, pinces et diverses pièces, les enfants peuvent reconnaître et utilisez des outils pour jouer à volonté.Il est normal que les enfants perdent ou endommagent des accessoires en jouant, ne vous inquiétez pas, contactez-nous pour un kit de remplacement gratuit.', 'uploads/d9a1122e38df16121be6b533d78b420b.png', 27, 'Jeu en bois', 34, 'Non'),
(48, 'Cheval à bascule', 'Ce superbe cheval à bascule Goki est d&#039;une structure solide. Un arceau protecteur en bois est adaptable pour les plus jeunes cavaliers. Il est aussi sobre et élégant. Il s&#039;adaptera à tous les intérieurs et charmera les visiteurs.', 'uploads/7ef689c01a1e33182775cc2235bba62f.png', 65, 'Jeu en bois', 45, 'Oui'),
(49, 'Morpion en bois de Pin', 'Le jeu de morpion Strobus en bois est un jeu intemporel, stratégique et engageant qui rassemble des êtres chers dans une compétition amicale. Fabriqué à partir de bois de pin provenant de sources responsables, ce set est non seulement durable, mais aussi un choix plus durable. La boîte en bois dispose d&#039;une fermeture coulissante, assurant un accès facile aux composants du jeu tout en les stockant en toute sécurité lorsqu&#039;ils ne sont pas utilisés. Comprend 5 balles noires et 5 balles rouges pour les deux joueurs. Livré avec un coffret cadeau en papier Kraft et un manuel d&#039;instructions.', 'uploads/5a195fa697eb2190a6c14dc4c40ac656.png', 5, 'Jeu en bois', 26, 'Non'),
(50, 'Banc à marteler ', ' Ce jouet en bois s&#039;inspire du règne animal et met en scène des animaux de la forêt. Il se compose d&#039; une planche de bois percée de trois trous. La tâche de l&#039;enfant est d&#039;utiliser un marteau pour casser les blocs colorés au centre de la boîte . Maintenant, le plaisir commence ! Les balles frapperont les cymbales et produiront des sons joyeux. Le xylophone peut être facilement retiré et apprécié comme un jouet séparé. ', 'uploads/dfd8b3d848c70c48484a4041c080a323.png', 31, 'Jeu en bois', 36, 'Non'),
(52, 'LEGO Super Mario', 'Jeu vitaminé Relevez les défis « cadeau » et lancez la Bulle de lave pour faire tomber Lemmy de la tour. Gagnez des pièces en aidant LEGO Peach sur la balançoire et en interagissant avec le Toad jaune. Le bloc ? volant offre aussi des récompenses. Peach peut « manger » le fruit rouge : sa réaction enthousiaste fait gagner des pièces supplémentaires ! Il peut aussi être offert au Toad jaune ou à un autre personnage interactif (non inclus). Instructions de montage dans l’appli LEGO Super Mario.', 'uploads/56d1df82c644bbbf9d0931883ac996bd.png', 35, 'Jeu de construction', 42, 'Non'),
(53, 'GEOMAG Construction', 'Coffret de Geomag Panels - 78 pcs : Inclut 28 barres Geomag, 20 Spheres et 30 Panels. Réalisez des constructions en 2D et 3D pour éveiller vos enfants et développer leurs sens et intellects en s&#039;amusant.Composé de plastique à base de 100% de polymères revalorisés et avec des sphères 100% recyclable et aimants 100% recyclable. Offre avec tous les modes de livraisons possibles.', 'uploads/31b9def4f77aab671d8a56244466fb1d.png', 27, 'Jeu de construction', 39, 'Non'),
(54, 'LEGO Avatar 75571', 'Ce set ravira les fans passionnés de nature et d’action de tous âges qui peuvent rejouer une célèbre scène du film Avatar. Avec les constructions détaillées, les fans développent leur imagination et leurs compétences créatives en reproduisant des scènes du film.', 'uploads/ba36ea8d215891e21bffff538f2b2176.png', 72, 'Jeu de construction', 55, 'Oui'),
(55, 'LEGO Harry Potter 76431', 'Avec ce set LEGO® Harry Potter™, recréez les cours du professeur Severus Rogue dans une salle de classe de Poudlard située dans un cachot. La salle de classe s’ouvre et regorge d’accessoires pour inciter les enfants à créer leurs propres histoires merveilleuses.', 'uploads/a08dd193f666ec2a5931aef9225abb74.png', 40, 'Jeu de construction', 48, 'Non'),
(56, 'HOGOKIDS Créations', 'Le kit de construction de boîte à musique HOGOKIDS se compose de 799 blocs de construction. C’est une décoration unique et créative avec un look réaliste et des couleurs vives. Ce jouet de construction de boîte à musique est une réplique parfaite de l’architecture japonaise, y compris un moulin à vent en rotation, des plantes en pot en fleurs, des fenêtres et des clôtures blanches classiques, un chat mignon et d’autres détails étonnants! L’ensemble de construction HOGOKIDS est fabriqué en matériau ABS de haute qualité adapté aux enfants avec des couleurs vives et une surface de bloc lisse. Les enfants peuvent profiter du plaisir de la boîte à musique DIY.', 'uploads/9a22e4d8ab854db99e9d79af23172f0c.png', 39, 'Jeu de construction', 36, 'Non');

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
(1, 'guillaume', 'online', 'guillaume@online.fr', '$argon2id$v=19$m=65536,t=4,p=1$bXYxdFMyV0ZsL0hxZDVmTg$y9Dizvw69vLI6XEJM7iHk2k/ykm3P7+wU0MuXKlFUHQ', 'admin'),
(2, 'Morgane', 'online', 'morgane@online.fr', '$argon2id$v=19$m=65536,t=4,p=1$U0V2OExVYmFOOEJCbkUzMQ$ZynH+2uaxKSdpxDLCUNlyliRxQusETccpuoR/on882o', 'admin'),
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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
