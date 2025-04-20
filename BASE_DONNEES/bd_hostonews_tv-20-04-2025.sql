-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : dim. 20 avr. 2025 à 14:58
-- Version du serveur : 9.1.0
-- Version de PHP : 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bd_hostonews_tv`
--

-- --------------------------------------------------------

--
-- Structure de la table `banniere`
--

DROP TABLE IF EXISTS `banniere`;
CREATE TABLE IF NOT EXISTS `banniere` (
  `id` int NOT NULL AUTO_INCREMENT,
  `images_grd` varchar(255) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `ptte_descript` varchar(255) NOT NULL,
  `grde_descript` longtext NOT NULL,
  `date_poster` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_pays` varchar(255) NOT NULL COMMENT 'à prendre dans la table images qui sera créer',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `banniere`
--

INSERT INTO `banniere` (`id`, `images_grd`, `titre`, `ptte_descript`, `grde_descript`, `date_poster`, `id_pays`) VALUES
(31, '6758dfe236811-emissionS674c52a90177d-1.png', 'HotoAwards', 'la Cérémonie de remise de prix des meilleurs Etablissement de la santé', 'la Cérémonie de remise de prix des meilleurs Etablissement de la santéla Cérémonie de remise de prix des meilleurs Etablissement de la santéla Cérémonie de remise de prix des meilleurs Etablissement de la santéla Cérémonie de remise de prix des meilleurs Etablissement de la santé', '2024-12-11 01:42:10', ''),
(32, '6758e0800af32-7.png', 'Le champion de la santé ', 'Evernement de concours des champions de la santé ', 'Evernement de concours des champions de la santé Evernement de concours des champions de la santé Evernement de concours des champions de la santé Evernement de concours des champions de la santé Evernement de concours des champions de la santé Evernement de concours des champions de la santé Evernement de concours des champions de la santé ', '2024-12-11 01:44:48', ''),
(33, '6758e0c09cdfb-9.png', 'le mag de la snaté', 'le mag de la snatéle mag de la snaté', 'le mag de la snatéle mag de la snatéle mag de la snatéle mag de la snatéle mag de la snatéle mag de la snatéle mag de la snatéle mag de la snatéle mag de la snatéle mag de la snatéle mag de la snatéle mag de la snatéle mag de la snatéle mag de la snatéle mag de la snatéle mag de la snatéle mag de la snatéle mag de la snatéle mag de la snatéle mag de la snatéle mag de la snatéle mag de la snatéle mag de la snatéle mag de la snatéle mag de la snatéle mag de la snatéle mag de la snatéle mag de la snatéle mag de la snatéle mag de la snatéle mag de la snatéle mag de la snatéle mag de la snatéle mag de la snatéle mag de la snatéle mag de la snatéle mag de la snatéle mag de la snatéle mag de la snatéle mag de la snatéle mag de la snatéle mag de la snatéle mag de la snatéle mag de la snatéle mag de la snatéle mag de la snatéle mag de la snatéle mag de la snatéle mag de la snatéle mag de la snaté', '2024-12-11 01:45:55', ''),
(34, '6758e1ef9d889-2.png', 'La noutrition', 'comment se nourrir correctement', 'comment se nourrir correctementcomment se nourrir correctementcomment se nourrir correctementcomment se nourrir correctementcomment se nourrir correctement', '2024-12-11 01:50:55', '');

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

DROP TABLE IF EXISTS `commentaires`;
CREATE TABLE IF NOT EXISTS `commentaires` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom_prenom` varchar(100) NOT NULL DEFAULT 'paul logan',
  `photo` varchar(50) NOT NULL DEFAULT 'images_par_defaut.png',
  `utilisateur_id` int NOT NULL,
  `id_direct` int DEFAULT NULL,
  `commentaire` text NOT NULL,
  `date_creation` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=253 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `commentaires`
--

INSERT INTO `commentaires` (`id`, `nom_prenom`, `photo`, `utilisateur_id`, `id_direct`, `commentaire`, `date_creation`) VALUES
(247, 'Anonyme', 'default4.png', 124, NULL, 'lll', '2024-12-11 02:31:57'),
(248, 'Anonyme', 'default4.png', 124, NULL, 'llllllllllll', '2024-12-11 02:32:35'),
(249, 'Anonyme', 'default4.png', 124, 32, 'qqqqqqqqqq', '2024-12-11 02:37:43'),
(250, 'Anonyme', 'default4.png', 124, NULL, 'wwwwwwww', '2024-12-11 02:47:48'),
(251, 'SFEQRG TERE', 'default4.png', 124, NULL, 'wwwwwwww', '2024-12-11 10:13:12'),
(252, 'SFEQRG TERE', 'default4.png', 124, NULL, 'vvvvvvvvvv', '2024-12-11 10:13:17');

-- --------------------------------------------------------

--
-- Structure de la table `contact_form`
--

DROP TABLE IF EXISTS `contact_form`;
CREATE TABLE IF NOT EXISTS `contact_form` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `submitted_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `contact_form`
--

INSERT INTO `contact_form` (`id`, `name`, `email`, `subject`, `message`, `submitted_at`) VALUES
(1, 'zzzzzzzz', 'zzzzzzzzz@gmail.com', 'zzzzzzzzz@gmail.com', 'zzzzzzzzz@gmail.comzzzzzzzzz@gmail.comzzzzzzzzz@gmail.comzzzzzzzzz@gmail.comzzzzzzzzz@gmail.com', '2024-12-11 10:24:53'),
(2, 'zzzzzzzz', 'zzzzzzzzz@gmail.com', 'zzzzzzzzz@gmail.com', 'zzzzzzzzz@gmail.comzzzzzzzzz@gmail.comzzzzzzzzz@gmail.comzzzzzzzzz@gmail.comzzzzzzzzz@gmail.com', '2024-12-11 10:27:11'),
(3, 'SFEQRG TERE', 'cyber10email@gmail.com', 'qqqqqqqqqqq ', 'zaedzrz rezrzer', '2024-12-11 10:33:26'),
(4, 'aaaaaaaa', 'zaazeaz@gmail.com', 'zaazeaz@gmail.comzaazeaz@gmail.comzaazeaz@gmail.com', 'zaazeaz@gmail.comzaazeaz@gmail.comzaazeaz@gmail.comzaazeaz@gmail.comzaazeaz@gmail.comzaazeaz@gmail.com', '2024-12-11 10:35:06');

-- --------------------------------------------------------

--
-- Structure de la table `derniere_news`
--

DROP TABLE IF EXISTS `derniere_news`;
CREATE TABLE IF NOT EXISTS `derniere_news` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `category` varchar(100) NOT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `video_url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `derniere_news`
--

INSERT INTO `derniere_news` (`id`, `title`, `description`, `category`, `image_url`, `video_url`, `created_at`) VALUES
(9, 'vvvvvvvvvvv', 'DescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescription', 'À la une', 'https://images.pexels.com/photos/298825/pexels-photo-298825.jpeg?auto=compress&cs=tinysrgb&w=600', 'https://www.pexels.com/fr-fr/video/deux-petites-filles-se-tenant-la-main-jouant-en-rond-3682356/', '2024-12-11 01:22:13'),
(10, 'vvvvvvvvvvv', 'DescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescription', 'Conseils Pratiques', 'https://images.pexels.com/photos/298825/pexels-photo-298825.jpeg?auto=compress&cs=tinysrgb&w=600', 'https://www.pexels.com/fr-fr/video/deux-petites-filles-se-tenant-la-main-jouant-en-rond-3682356/', '2024-12-11 01:22:36'),
(11, 'vvvvvvvvvvv', 'DescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescriptionDescription', 'Prévention', 'https://images.pexels.com/photos/298825/pexels-photo-298825.jpeg?auto=compress&cs=tinysrgb&w=600', 'https://www.pexels.com/fr-fr/video/deux-petites-filles-se-tenant-la-main-jouant-en-rond-3682356/', '2024-12-11 01:22:43');

-- --------------------------------------------------------

--
-- Structure de la table `direct`
--

DROP TABLE IF EXISTS `direct`;
CREATE TABLE IF NOT EXISTS `direct` (
  `id` int NOT NULL AUTO_INCREMENT,
  `baniere` varchar(255) NOT NULL,
  `urls` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `date_publier` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `commentaire` longtext NOT NULL,
  `reaction` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `direct`
--

INSERT INTO `direct` (`id`, `baniere`, `urls`, `date_publier`, `commentaire`, `reaction`) VALUES
(1, '6758e89dd0818-images6.png', 'https://www.youtube.com/embed/HG0q8bBkxho?si=DlHyhr2yDBhPp3nd', '2024-12-11 02:19:09', '', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `emissions`
--

DROP TABLE IF EXISTS `emissions`;
CREATE TABLE IF NOT EXISTS `emissions` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `url_emission` longtext NOT NULL,
  `le_status` varchar(255) DEFAULT 'avant-première',
  `ptt_description` text,
  `grd_description` text,
  `episode` int DEFAULT NULL,
  `image1` text,
  `image2` text,
  `categorie` varchar(100) DEFAULT NULL,
  `datePublication` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Videos` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=97 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `emissions`
--

INSERT INTO `emissions` (`id`, `titre`, `url_emission`, `le_status`, `ptt_description`, `grd_description`, `episode`, `image1`, `image2`, `categorie`, `datePublication`, `Videos`) VALUES
(85, 'TitreTitreTitre', 'https://videos.pexels.com/video-files/3678271/3678271-sd_960_506_25fps.mp4', 'le_statusle_statusle_status', 'Petite Description:\r\nPetite Description:\r\nPetite Description:\r\nPetite Description:\r\n', 'Grande Description:\r\nGrande Description:\r\nGrande Description:\r\nGrande Description:\r\nGrande Description:\r\n', 2, 'image.png', 'images6.png', 'Documentaire', '2024-12-11 01:58:20', NULL),
(86, 'TitreTitreTitre', 'https://videos.pexels.com/video-files/3678271/3678271-sd_960_506_25fps.mp4', 'le_statusle_statusle_status', 'Petite Description:\r\nPetite Description:\r\nPetite Description:\r\nPetite Description:\r\n', 'Grande Description:\r\nGrande Description:\r\nGrande Description:\r\nGrande Description:\r\nGrande Description:\r\n', 2, 'images8.png', 'images9.png', 'Documentaire', '2024-12-11 01:59:35', NULL),
(87, 'TitreTitreTitre', 'https://videos.pexels.com/video-files/3678271/3678271-sd_960_506_25fps.mp4', 'le_statusle_statusle_status', 'Petite Description:\r\nPetite Description:\r\nPetite Description:\r\nPetite Description:\r\n', 'Grande Description:\r\nGrande Description:\r\nGrande Description:\r\nGrande Description:\r\nGrande Description:\r\n', 2, 'images5.png', 'images4.png', 'Documentaire', '2024-12-11 02:00:02', NULL),
(88, 'TitreTitreTitre', 'https://videos.pexels.com/video-files/3678271/3678271-sd_960_506_25fps.mp4', 'le_statusle_statusle_status', 'Petite Description:\r\nPetite Description:\r\nPetite Description:\r\nPetite Description:\r\n', 'Grande Description:\r\nGrande Description:\r\nGrande Description:\r\nGrande Description:\r\nGrande Description:\r\n', 2, 'medium-shot-business-women-high-five.jpeg', 'L3982-144-378139820390301440-1.jpg', 'Divertissement', '2024-12-11 02:14:56', NULL),
(89, 'TitreTitreTitre', 'https://videos.pexels.com/video-files/3678271/3678271-sd_960_506_25fps.mp4', 'le_statusle_statusle_status', 'Petite Description:\r\nPetite Description:\r\nPetite Description:\r\nPetite Description:\r\n', 'Grande Description:\r\nGrande Description:\r\nGrande Description:\r\nGrande Description:\r\nGrande Description:\r\n', 2, 'two-business-partners-working-together-office-computer.jpeg', 'team-meeting-renewable-energy-project.jpeg', 'Divertissement', '2024-12-11 02:15:19', NULL),
(90, 'TitreTitreTitre', 'https://videos.pexels.com/video-files/3678271/3678271-sd_960_506_25fps.mp4', 'le_statusle_statusle_status', 'Petite Description:\r\nPetite Description:\r\nPetite Description:\r\nPetite Description:\r\n', 'Grande Description:\r\nGrande Description:\r\nGrande Description:\r\nGrande Description:\r\nGrande Description:\r\n', 2, 'two-business-partners-working-together-office-computer.jpeg', 'team-meeting-renewable-energy-project.jpeg', 'Divertissement', '2024-12-11 02:15:24', NULL),
(91, 'TitreTitreTitre', 'https://videos.pexels.com/video-files/3678271/3678271-sd_960_506_25fps.mp4', 'le_statusle_statusle_status', 'Petite Description:\r\nPetite Description:\r\nPetite Description:\r\nPetite Description:\r\n', 'Grande Description:\r\nGrande Description:\r\nGrande Description:\r\nGrande Description:\r\nGrande Description:\r\n', 2, 'two-business-partners-working-together-office-computer.jpeg', 'team-meeting-renewable-energy-project.jpeg', 'Actualités', '2024-12-11 02:15:31', NULL),
(92, 'TitreTitreTitre', 'https://videos.pexels.com/video-files/3678271/3678271-sd_960_506_25fps.mp4', 'le_statusle_statusle_status', 'Petite Description:\r\nPetite Description:\r\nPetite Description:\r\nPetite Description:\r\n', 'Grande Description:\r\nGrande Description:\r\nGrande Description:\r\nGrande Description:\r\nGrande Description:\r\n', 2, 'two-business-partners-working-together-office-computer.jpeg', 'team-meeting-renewable-energy-project.jpeg', 'Actualités', '2024-12-11 02:15:36', NULL),
(93, 'TitreTitreTitre', 'https://videos.pexels.com/video-files/3678271/3678271-sd_960_506_25fps.mp4', 'le_statusle_statusle_status', 'Petite Description:\r\nPetite Description:\r\nPetite Description:\r\nPetite Description:\r\n', 'Grande Description:\r\nGrande Description:\r\nGrande Description:\r\nGrande Description:\r\nGrande Description:\r\n', 2, 'two-business-partners-working-together-office-computer.jpeg', 'team-meeting-renewable-energy-project.jpeg', 'Actualités', '2024-12-11 02:15:39', NULL),
(94, 'TitreTitreTitre', 'https://videos.pexels.com/video-files/3678271/3678271-sd_960_506_25fps.mp4', 'le_statusle_statusle_status', 'Petite Description:\r\nPetite Description:\r\nPetite Description:\r\nPetite Description:\r\n', 'Grande Description:\r\nGrande Description:\r\nGrande Description:\r\nGrande Description:\r\nGrande Description:\r\n', 2, 'L6407S-392-378164071050003926.jpg', 'OIP.jpg', 'Sport', '2024-12-11 02:16:08', NULL),
(95, 'TitreTitreTitre', 'https://videos.pexels.com/video-files/3678271/3678271-sd_960_506_25fps.mp4', 'le_statusle_statusle_status', 'Petite Description:\r\nPetite Description:\r\nPetite Description:\r\nPetite Description:\r\n', 'Grande Description:\r\nGrande Description:\r\nGrande Description:\r\nGrande Description:\r\nGrande Description:\r\n', 2, 'L6407S-392-378164071050003926.jpg', 'OIP.jpg', 'Sport', '2024-12-11 02:16:12', NULL),
(96, 'TitreTitreTitre', 'https://videos.pexels.com/video-files/3678271/3678271-sd_960_506_25fps.mp4', 'le_statusle_statusle_status', 'Petite Description:\r\nPetite Description:\r\nPetite Description:\r\nPetite Description:\r\n', 'Grande Description:\r\nGrande Description:\r\nGrande Description:\r\nGrande Description:\r\nGrande Description:\r\n', 2, 'L6407S-392-378164071050003926.jpg', 'OIP.jpg', 'Sport', '2024-12-11 02:16:22', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `faq`
--

DROP TABLE IF EXISTS `faq`;
CREATE TABLE IF NOT EXISTS `faq` (
  `id` int NOT NULL AUTO_INCREMENT,
  `category` varchar(255) NOT NULL,
  `question` text NOT NULL,
  `answer` text NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `faq`
--

INSERT INTO `faq` (`id`, `category`, `question`, `answer`, `created_at`, `updated_at`) VALUES
(5, 'Informations générales', 'Quels sont les symptômes courants de la grippe ?', 'Les symptômes de la grippe incluent fièvre, toux, maux de tête, douleurs musculaires et fatigue. Si vous ressentez ces symptômes, consultez un professionnel de santé.', '2024-12-09 15:26:54', '2024-12-09 15:26:54'),
(6, 'Informations générales', 'Comment prévenir les infections respiratoires ?', 'Pour prévenir les infections respiratoires, lavez-vous fréquemment les mains, portez un masque si nécessaire et évitez les lieux bondés pendant les épidémies.', '2024-12-09 15:26:54', '2024-12-09 15:26:54'),
(7, 'Services de santé', 'Où trouver un centre de santé dans mon pays ?', 'Vous pouvez consulter les sites officiels de santé publique de votre pays ou utiliser des applications dédiées pour localiser les centres de santé les plus proches.', '2024-12-09 15:26:54', '2024-12-09 15:26:54'),
(8, 'Services de santé', 'Comment accéder aux services de vaccination ?', 'La vaccination est généralement disponible dans les centres de santé locaux. Contactez votre clinique ou hôpital pour connaître les disponibilités et horaires.', '2024-12-09 15:26:54', '2024-12-09 15:26:54'),
(9, 'Santé mentale', 'Comment gérer le stress au travail ?', 'Pour gérer le stress, il est essentiel de prendre des pauses régulières, de pratiquer des techniques de relaxation comme la respiration profonde, et de parler à un professionnel si nécessaire.', '2024-12-09 15:26:54', '2024-12-09 15:26:54'),
(10, 'Santé mentale', 'Quels sont les symptômes de la dépression ?', 'Les symptômes de la dépression incluent une humeur triste ou irritée, une perte d\'intérêt pour les activités quotidiennes, une fatigue excessive et des changements d\'appétit ou de sommeil.', '2024-12-09 15:26:54', '2024-12-09 15:26:54'),
(11, 'Nutrition et bien-être', 'Quel est l\'impact des aliments riches en sucre sur la santé ?', 'Une consommation excessive de sucre peut entraîner des problèmes de santé tels que le diabète de type 2, l\'obésité et des maladies cardiaques.', '2024-12-09 15:26:54', '2024-12-09 15:26:54'),
(12, 'Nutrition et bien-être', 'Combien d\'eau devrais-je boire chaque jour ?', 'Il est recommandé de boire environ 2 à 2,5 litres d\'eau par jour, mais les besoins peuvent varier en fonction de votre activité physique et de votre environnement.', '2024-12-09 15:26:54', '2024-12-09 15:26:54'),
(13, 'Médecine générale', 'Que faire en cas de blessure légère ?', 'En cas de blessure légère, nettoyez la plaie, appliquez un pansement et surveillez la guérison. Si la blessure ne guérit pas ou s\'aggrave, consultez un médecin.', '2024-12-09 15:26:54', '2024-12-09 15:26:54'),
(14, 'Médecine générale', 'Quand faut-il consulter un médecin ?', 'Il est conseillé de consulter un médecin si vous présentez des symptômes graves ou persistants, comme une douleur intense, une fièvre élevée ou des difficultés respiratoires.', '2024-12-09 15:26:54', '2024-12-09 15:26:54');

-- --------------------------------------------------------

--
-- Structure de la table `health_news`
--

DROP TABLE IF EXISTS `health_news`;
CREATE TABLE IF NOT EXISTS `health_news` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `category` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `journauxtelevises`
--

DROP TABLE IF EXISTS `journauxtelevises`;
CREATE TABLE IF NOT EXISTS `journauxtelevises` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `petiteDescription` text,
  `grandeDescription` text,
  `miniature` varchar(255) NOT NULL,
  `url_Video` varchar(255) NOT NULL,
  `datePublication` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `journauxtelevises`
--

INSERT INTO `journauxtelevises` (`id`, `titre`, `petiteDescription`, `grandeDescription`, `miniature`, `url_Video`, `datePublication`) VALUES
(18, 'bien mager', 'la nourriture que pas spirituelle', 'la nourriture que pas spirituellela nourriture que pas spirituellela nourriture que pas spirituellela nourriture que pas spirituellela nourriture que pas spirituellela nourriture que pas spirituelle', '6758e231260c9-OIP.jpg', 'https://videos.pexels.com/video-files/3120243/3120243-sd_640_360_25fps.mp4', '2024-12-11 01:52:01'),
(19, 'Hygiène ', 'Hygiène Hygiène Hygiène Hygiène ', 'Hygiène Hygiène Hygiène Hygiène Hygiène Hygiène Hygiène Hygiène Hygiène Hygiène Hygiène Hygiène Hygiène Hygiène Hygiène Hygiène Hygiène Hygiène Hygiène Hygiène Hygiène Hygiène Hygiène Hygiène Hygiène Hygiène Hygiène Hygiène Hygiène Hygiène Hygiène Hygiène Hygiène Hygiène Hygiène Hygiène Hygiène Hygiène Hygiène Hygiène Hygiène Hygiène ', '6758e262cfd7b-OIP (1).jpg', 'https://videos.pexels.com/video-files/3245641/3245641-sd_640_360_25fps.mp4', '2024-12-11 01:52:50'),
(20, 'Titre Titre Titre ', 'Petite Description :Petite Description :Petite Description :Petite Description :Petite Description :', 'Grande Description :\r\nGrande Description :\r\nGrande Description :\r\nGrande Description :\r\nGrande Description :\r\nGrande Description :\r\nGrande Description :\r\n', '6758e3297cdd6-L6407S-392-378164071050003926.jpg', 'https://videos.pexels.com/video-files/4146196/4146196-sd_640_360_25fps.mp4', '2024-12-11 01:56:09');

-- --------------------------------------------------------

--
-- Structure de la table `reactions`
--

DROP TABLE IF EXISTS `reactions`;
CREATE TABLE IF NOT EXISTS `reactions` (
  `id` int NOT NULL AUTO_INCREMENT,
  `product_id` int NOT NULL,
  `user_id` int NOT NULL,
  `reaction_type` enum('like','dislike') DEFAULT 'like',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `replay`
--

DROP TABLE IF EXISTS `replay`;
CREATE TABLE IF NOT EXISTS `replay` (
  `id` int NOT NULL AUTO_INCREMENT,
  `image_path` varchar(225) DEFAULT NULL,
  `video_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `alert_label` varchar(50) DEFAULT NULL,
  `reaction_count` int DEFAULT '0',
  `title` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `description` text,
  `recapitulatif` longtext,
  `event_date` date DEFAULT NULL,
  `token_ident` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `replay`
--

INSERT INTO `replay` (`id`, `image_path`, `video_url`, `alert_label`, `reaction_count`, `title`, `description`, `recapitulatif`, `event_date`, `token_ident`) VALUES
(29, '6758ec2f1fac7_image3.png', 'https://videos.pexels.com/video-files/3682074/3682074-sd_960_506_25fps.mp4', 'Label d\'Alerte :', 0, 'Titre ', 'Description :\r\nDescription :\r\n', 'recapitulatif :\r\nrecapitulatif :\r\nrecapitulatif :\r\nrecapitulatif :\r\nrecapitulatif :\r\nrecapitulatif :\r\nrecapitulatif :\r\n', '2024-12-20', NULL),
(30, '6758ecc37ba2e_image3.png', 'https://videos.pexels.com/video-files/3682074/3682074-sd_960_506_25fps.mp4', 'Label d\'Alerte :', 0, 'Titre ', 'Description :\r\nDescription :\r\n', 'recapitulatif :\r\nrecapitulatif :\r\nrecapitulatif :\r\nrecapitulatif :\r\nrecapitulatif :\r\nrecapitulatif :\r\nrecapitulatif :\r\n', '2024-12-20', NULL),
(31, '6758ecc92022d_image3.png', 'https://videos.pexels.com/video-files/3682074/3682074-sd_960_506_25fps.mp4', 'Label d\'Alerte :', 0, 'Titre ', 'Description :\r\nDescription :\r\n', 'recapitulatif :\r\nrecapitulatif :\r\nrecapitulatif :\r\nrecapitulatif :\r\nrecapitulatif :\r\nrecapitulatif :\r\nrecapitulatif :\r\n', '2024-12-20', NULL),
(32, '6758eccd49e8f_image3.png', 'https://videos.pexels.com/video-files/3682074/3682074-sd_960_506_25fps.mp4', 'Label d\'Alerte :', 0, 'Titre ', 'Description :\r\nDescription :\r\n', 'recapitulatif :\r\nrecapitulatif :\r\nrecapitulatif :\r\nrecapitulatif :\r\nrecapitulatif :\r\nrecapitulatif :\r\nrecapitulatif :\r\n', '2024-12-20', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `phone` varchar(200) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `verification_code` longtext,
  `date_inscript` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `token` longtext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom_prenom` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `numero` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `pays` varchar(255) DEFAULT NULL,
  `mot_de_passe` longtext,
  `verification_code` int DEFAULT NULL,
  `resset_token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `photo_profil` varchar(255) DEFAULT NULL,
  `date_inscription` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('connecte','déconnecte') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT 'déconnecte',
  `acces_token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `is_verified` int DEFAULT '0',
  `idPays` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idPays` (`idPays`)
) ENGINE=InnoDB AUTO_INCREMENT=125 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `nom_prenom`, `email`, `numero`, `pays`, `mot_de_passe`, `verification_code`, `resset_token`, `photo_profil`, `date_inscription`, `status`, `acces_token`, `is_verified`, `idPays`) VALUES
(124, 'SFEQRG TERE', 'cyber10email@gmail.com', '44444444', 'RFERFE', 'bfb6540671775537f011dbbd3572da570fc8f58a', 785948, 'c84c8d53b700d635df08ffdd678521bad694b136ac7a25d15fc928b085c75c8a467ff6d27771beda15c1bf1f9e5ccde5779c', 'default4.png', '2024-12-11 01:39:52', 'déconnecte', '9bf31c7ff062936a96d3c8bd1f8f2ff3', 1, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
