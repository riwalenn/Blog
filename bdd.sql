-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 13 juin 2018 à 08:04
-- Version du serveur :  5.7.19
-- Version de PHP :  5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `mvc`
--

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `author` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `date_comment` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `author`, `comment`, `date_comment`) VALUES
(1, 9, 'Mathieu', 'Preum\'s', '2017-09-24 17:12:30'),
(2, 9, 'Sam', 'Quelqu\'un a un avis là-dessus ? Je ne sais pas quoi en penser.', '2017-09-24 17:21:34'),
(8, 1, 'Jojo', 'C\'est moi !', '2017-09-28 19:50:14'),
(9, 9, 'Mathieu', 'Retest\r\nEncore', '2017-10-27 11:46:50'),
(10, 9, 'Sam', 'tu testes quoi ?', '2017-10-27 15:44:14'),
(11, 3, 'Mathieu', 'Preum\'s', '2017-09-24 17:12:30'),
(12, 3, 'Sam', 'Quelqu\'un a un avis là-dessus ? Je ne sais pas quoi en penser.', '2017-09-24 17:21:34'),
(13, 3, 'Mathieu', 'encore un test ! 3 !', '2018-06-12 19:56:14'),
(14, 3, 'Sam', 'tu testes quoi ?', '2017-10-27 15:44:14'),
(19, 5, 'Mathieu', 'Preum\'s', '2017-09-24 17:12:30'),
(20, 5, 'Sam', 'Quelqu\'un a un avis là-dessus ? Je ne sais pas quoi en penser.', '2017-09-24 17:21:34'),
(21, 5, 'Mathieu', 'Retest\r\nEncore', '2017-10-27 11:46:50'),
(22, 5, 'Sam', 'tu testes quoi ?', '2017-10-27 15:44:14'),
(23, 4, 'Mathieu', 'Preum\'s', '2017-09-24 17:12:30'),
(24, 4, 'Sam', 'Quelqu\'un a un avis là-dessus ? Je ne sais pas quoi en penser.', '2017-09-24 17:21:34'),
(25, 4, 'Mathieu', 'Retest', '2018-06-12 16:39:08'),
(26, 4, 'Sam', 'tu testes quoi ?', '2017-10-27 15:44:14'),
(27, 9, 'Riwalenn', 'test édition commentaire !', '2018-06-12 17:38:59'),
(32, 9, 'Riwalenn', 'dernier test', '2018-06-12 19:59:45'),
(33, 1, 'Riwalenn', 'Ah bon ?! :)', '2018-06-12 21:57:48');

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `creation_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `creation_date`) VALUES
(1, 'Bienvenue sur mon blog !', 'Je vous souhaite à toutes et à tous la bienvenue sur mon blog qui parlera de... PHP bien sûr !', '2017-09-18 16:28:41'),
(2, 'Le PHP à la conquête du monde !', 'C\'est officiel, l\'éléPHPant a annoncé à la radio hier soir \"J\'ai l\'intention de conquérir le monde !\".\r\nIl a en outre précisé que le monde serait à sa botte en moins de temps qu\'il n\'en fallait pour dire \"éléPHPant\". Pas dur, ceci dit entre nous...', '2017-09-20 16:28:41'),
(3, 'La veille technologique : qu\'est-ce que c\'est ?', 'test', '2018-05-14 17:03:20'),
(4, 'UML qu\'est-ce que c\'est ?', 'Horum adventum praedocti speculationibus fidis rectores militum tessera data sollemni armatos omnes celeri eduxer !', '2018-04-23 18:12:00'),
(5, 'Notions d\'ergonomie en création de site', 'Horum adventum praedocti speculationibus fidis rectores militum tessera data sollemni armatos omnes celeri eduxer !', '2018-04-23 19:12:00'),
(6, 'Créer un projet web de A à Z !', 'Horum adventum praedocti speculationibus fidis rectores militum tessera data sollemni armatos omnes celeri eduxere procursu.', '2018-04-12 16:43:42'),
(7, 'La technologie pour gagner en sérénité dans les achats', 'Les 29 et 30 mars, à Paris, l\'éditeur Ivalua a consacré deux journées à des échanges et témoignages relatifs aux atouts qu\'apportent les solutions technologiques aux directions achats. Retour sur des évolutions inéluctables qui changent les métiers au quotidien.', '2018-04-23 15:55:35'),
(8, 'Futur de la Relation Client : les 6 pépites repérées par Genesys', 'Les entreprises doivent aujourd’hui recourir aux nouvelles technologies, couplées à de puissantes solutions Big Data. Ceci afin d’offrir à leurs clients un niveau d’écoute, de service et de réactivité maximum sur tous les canaux d’interaction et en temps réél...', '2018-04-23 15:59:31'),
(9, 'Quand robots et algorithmes créent du beau !', 'Pour l’exposition Artiste et Robots du Grand Palais à Paris, les créations exposées sont dues à des machines, du spam ou des algorithmes. Entre œuvres graphiques et installations d’art contemporain, tous les styles se côtoient pour des effets parfois vertigineux !', '2018-04-23 18:09:00');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
