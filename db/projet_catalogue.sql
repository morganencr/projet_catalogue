-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : db
-- Généré le : mer. 12 juin 2024 à 09:35
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
  `description` varchar(255) NOT NULL,
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
(1, 'ours', 'un petit ours', '/var/www/html/ajout/uploads/bb1d121584d865457f15b0e844f9594e.jpg', '25$', 'catégorie', 14, 'promo'),
(2, 'ours', 'un petit ours', '/var/www/html/ajout/uploads/861bdb15098a2d3c5cae6798cd8999c5.jpg', '25$', 'catégorie', 14, 'promo'),
(3, 'ours', 'un petit ours', '/var/www/html/ajout/uploads/88997d0dae40e6ff72c78ac685ba25f1.jpg', '25$', 'catégorie', 14, 'promo'),
(4, 'ours', 'un petit ours', '/var/www/html/ajout/uploads/6b75454e42ae7bbe4081a29bdccd6787.jpg', '25$', 'catégorie', 14, 'promo'),
(5, 'jeu créatif', 'description', '/var/www/html/ajout/uploads/844a837ae72fd604c8790644304fd1d1.png', '25$', 'catégorie', 13, 'promo'),
(6, 'playmobil', 'tt', '/var/www/html/ajout/uploads/24d30ee137a2a74980b81c80580ea1cb.jpg', '30$', 'Activité créative', 34, 'Non'),
(7, 'titeuf', 'bd', '/var/www/html/admin/uploads/17ade83f2a2f923edf34e94a05bd4588.jpg', '25€', 'Jeux de société', 15, 'Oui'),
(8, 'monopoly', 'ffff', '/var/www/html/admin/uploads/669c42f131e61ad2d4b377f2c19d1767.jpg', '40€', 'Jeux de société', 26, 'Non');

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
