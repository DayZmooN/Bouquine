-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 24, 2023 at 03:13 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bouquine`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id_admin` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `mail` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `mail`) VALUES
(1, 'Angeline', 'admin', 'anje.jiro@gmail.com'),
(2, 'Dayz', 'admin', 'dayz@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

DROP TABLE IF EXISTS `book`;
CREATE TABLE IF NOT EXISTS `book` (
  `id_book` int NOT NULL AUTO_INCREMENT,
  `ISBN` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `image` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `title` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `author` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `editor` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `collection` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `publication_date` date NOT NULL,
  `genre` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_category` int NOT NULL,
  `summary` varchar(535) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_book`),
  KEY `ID_CATEGORY` (`id_category`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=87 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`id_book`, `ISBN`, `image`, `title`, `author`, `editor`, `collection`, `publication_date`, `genre`, `id_category`, `summary`, `status`) VALUES
(1, '0261103253', 'coverlotr1.jpg', 'Le Seigneur des Anneaux : La communauté de l\'anneau', 'J.R.R Tolkien', 'Harper Collins', '', '1998-02-23', 'Fantasy, Aventure', 7, 'En ces temps-là, la Terre était peuplée de trolls, d\'orques, de balrogs... de Hobbits, également, petits êtres apparentés à l\'homme et proches des nains et des elfes. Pendant longtemps ils avaient vécu en paix. Jusqu\'à ce jour fatal où Bilbon avait dérobé l\'Anneau de Puissance aux immenses pouvoirs. Car Sauron de Mordor, celui qui avait forgé l\'Anneau, s\'était juré de le reconquérir. La lutte entre les forces du bien et les forces du mal allait commencer... ', 1),
(18, '0261102362', 'coverlotr2.jpg', 'Le Seigneur des Anneaux : Les deux tours', 'J.R.R Tolkien', 'Harper Collins', '', '1998-08-08', 'Fantasy, Aventure', 7, 'Frodon le Hobbit et ses Compagnons se sont engagés, au Grand Conseil d\'Elrond, à détruire l\'Anneau de Puissance dont Sauron de Mordor cherche à s\'emparer pour asservir tous les peuples de la terre habitée : Elfes et Nains, Hommes et Hobbits.', 1),
(19, '0063270900', 'coverlotr3.jpg', 'Le Seigneur des Anneaux : Le Retour du Roi', 'J.R.R Tolkien', 'Harper Collins', '', '1998-10-10', 'Fantasy, Aventure', 7, 'La dernière partie du Seigneur des Anneaux. Le Retour du Roi raconte la stratégie désespérée de Gandalf face au Seigneur des Anneaux, jusqu\'à la catastrophe finale et au dénouement de la grande Guerre où s\'illustrent Aragorn et ses compagnons, Gimli, Legolas,Merry et Pippin, tandis que Gollum est appelé à jouer un rôle inattendu aux côtés de Frodo et de Sam au Mordor, le seul lieu où l\'Anneau de Sauron peut être détruit.', 1),
(20, '2070300072  ', 'alcoolscover.jpg', 'Alcools suivi de Le bestiaire', 'Guillaume Apollinaire', 'Gallimard', '', '1966-00-00', 'Surréalisme', 8, 'Alcools est un recueil pluriel, polyphonique, qui explore de nombreux aspects de la poésie, allant de l\'élégie au vers libre, mélangeant le quotidien aux paysages rhénans dans une poésie qui se veut expérimentale, alliant un travail sur la forme et sur l\'esthétique à un hermétisme et un art du choc.', 0),
(21, '208129561X', 'coverandromaque.jpg', 'Andromaque', 'Jean Racine', 'FLAMMARION', 'Etonnants - Classique', '1667-11-17', 'Tragédie', 9, 'Après la guerre de Troie, au cours de laquelle Achille a tué Hector, la femme de ce dernier, Andromaque, est réduite à l\'état de prisonnière avec son fils Astyanax par Pyrrhus, fils d\'Achille. Pyrrhus tombe amoureux d\'elle alors qu\'il doit en principe épouser Hermione, la fille du roi de Sparte Ménélas et d\'Hélène.', 1),
(22, '0141036141', 'cover1984.jpg', '1984', 'George Orwell', 'Penguin', '', '1949-06-08', 'Dystopie', 7, 'Il décrit une Grande-Bretagne trente ans après une guerre nucléaire entre l\'Est et l\'Ouest censée avoir eu lieu dans les années 1950 et où s\'est instauré un régime de type totalitaire fortement inspiré à la fois de certains éléments du stalinisme et du nazisme. La liberté d\'expression n\'existe plus.', 1),
(26, '2738157203', 'coverfoliedeschats.jpg', 'La Folie des chats', 'Claude Béata', 'Odile Jacob', 'Animaux', '2022-12-10', 'Documentaire animalier', 10, 'La folie des chats Nous sommes nombreux à être fous de nos chats et cette passion peut être réciproque. Le chat est un être d\'attachement. Il nous séduit, nous fascine, mais les relations avec lui peuvent se révéler parfois déconcertantes. Il nous invite à l\'empathie et au respect de la différence.', 1),
(27, '2820337821', 'coverCM1.jpg', 'Chainsaw Man - Tome 01', 'Tatsuki Fujimoto', 'Crunchyroll Kaze', 'Shonen Up', '2020-03-11', 'Shonen, Gore, Action', 11, 'Pour rembourser ses dettes, Denji, jeune homme dans la dèche la plus totale, est exploité en tant que Devil Hunter avec son chien-démon-tronçonneuse, Pochita . Mais suite à une cruelle trahison, il voit enfin une possibilité de se tirer des bas-fonds où il croupit ! Devenu surpuissant après sa fusion avec Pochita, Denji est recruté par une organisation de Devil Hunters et part à la chasse aux démons...', 1),
(28, '2809482314', 'coverDM1.jpg', 'Demon Slayer - Tome 01', 'Koyoharu Gotouge', 'Panini Manga', 'Manga Shonen', '2019-09-18', 'Shonen, Fantasy, Historique', 11, 'Le Japon, au début du XXe siècle (ère Taisho). Un jeune vendeur de charbon nommé Tanjiro mène une vie sans histoire dans les montagnes, jusqu’au jour tragique où il découvre son village et sa famille massacrés par un démon. La seule survivante de cette tragédie est sa jeune soeur Nezuko. Hélas, au contact du démon, elle s’est métamorphosée en monstre féroce... Afin de renverser le processus et de venger sa famille, Tanjiro décide de partir en quête de vérité. Pour le jeune héros et sa soeur, c’est une longue aventure', 1),
(29, '2809496897', 'coverDV1.jpg', 'Star Wars - Tome 01 : Dark Vador', 'Greg Pak', 'Panini Comics', '100% Star Wars', '2021-06-09', 'Bande-Dessiné, Sci-Fi, Action', 13, '\"Je suis ton père\". Avec ces quatre mots, Dark Vador a complètement bouleversé l\'univers de Luke Skywalker... et le sien ! Le Seigneur Sith vient lui-même d\'apprendre l\'existence de son fils, et il compte bien se venger de ceux qui lui ont dissimulé ce secret. Une quête qui va le conduire sur la tombe de celle qu\'il a aimé lorsqu\'il était Anakin Skywalker : Padmé Amidala. Alors que le second arc narratif débute dans les softcovers STAR WARS, découvrez l\'intégralité du premier arc en cartonné.', 1),
(30, '2810202532', 'coverTMO1.jpg', 'The Midnight Order', 'Mathieu Bablet', 'Rue De Sevres', 'Label 619', '2022-11-16', 'Fantasy, Bande-Dessiné, Mystère, Magie', 13, 'Johnson et Sheridan, deux membres de l\'Ordre de Minuit, ont pour mission de traquer à travers le globe les sorcières trop puissantes, celles qui sont un danger pour le monde et pour elles-mêmes. À chaque capture c\'est la même chose : les mains des femmes sont invariablement tranchées, afin de tarir la source de leurs pouvoirs. A mesure que Sheridan se questionne sur la légitimité de ses actions au sein de l\'ordre, Johnson va faire face à une problématique cruelle : la prochaine sorcière surpuissante à traquer est sa propre sœur. ', 1),
(31, '1026823625', 'coverJokerUC.jpg', 'Joker', 'Brian Azzarello', 'Urban Comics', 'Urban Nomad', '2023-01-20', 'Comics, DC, Thriller, Sombre', 12, 'Le Joker vient tout juste d\'être libéré de l\'Asile d\'Arkham. En son absence, les fripouilles de son gang se sont partagé son territoire avant de revendre leur part pour une bouchée de pain. Mais aujourd\'hui, le patron est de retour en ville. Assoiffé de reconquête, il entraîne dans le sillage de sa sanglante parade le loyal Johnny Frost ? au même titre que le lecteur ?, qu\'il prendra un malin plaisir à divertir au cours de ce séjour dans les bas-fonds de Gotham.', 1),
(32, '2365773478', 'coverKillinJoke0.jpg', 'Batman - Tome 0 : KILLING JOKE', 'Alan Moore', 'Urban Comics', 'Dc Deluxe', '2014-03-06', 'Comics; DC', 12, 'Le Joker s\'est à nouveau échappé de l\'asile d\'Arkham. Il a cette fois pour objectif de prouver la capacité de n\'importe quel être humain de sombrer dans la folie après un traumatisme. Pour sa démonstration, il capture le commissaire GORDON et le soumet aux pires tortures que l\'on puisse imaginer, à commencer par s\'attaquer à sa chère fille, Barbara Gordon. -- Contenu : Batman ? The Killing Joke', 1),
(33, '2221260325', 'coverOublier.jpg', 'Tu as oublié mon coeur en partant', 'Léa Jeunesse', 'R jeunesse', '', '2022-03-10', 'Romance, Drame', 8, 'Le remède au chagrin d\'amour  Le livre pour tous les coeurs qui ont aimé une première fois. La rupture amoureuse en cent textes poétiques illustrés avec délicatesse par Maxime Lombard.', 1),
(34, '2070601587', 'coverMatilda.jpg', 'Matilda', ' Roald Dahl', 'Gallimard jeunesse', 'Folio Junior, numéro 744', '2016-06-16', 'Jeunesse', 14, '\"L\'autre jour, nous avons vu Mlle Legourdin attraper une fille par ses nattes et la projeter par dessus la barrière du terrain de jeu !\"Le père de Matilda Verdebois pense que sa fille n\'est qu\'une petite idiote. Sa mère passe tous ses après-midi à jouer au loto. Quant à la directrice de l\'école, Mlle Legourdin, c\'est la pire de tous : un monstrueux tyran, qui trouve que les élèves sont des cafards. Elle les enferme même dans son terrible étouffoir. Matilda, elle, est une petite fille extraordinaire à l\'esprit magique, et elle en ', 1),
(35, '2070320502', 'coverContemplation.jpg', 'Les Contemplations', 'Victor Hugo', 'Gallimard', '', '1973-01-01', 'Poésie, Romantisme', 8, 'Victor Hugo raconte d\'abord sa jeunesse (« Aurore »), ses amours (« L\'Âme en fleur »), son combat contre la misère sociale et la pauvreté (« Les Luttes et les rêves ») puis la mort et le deuil de sa fille Léopoldine (« Pauca meae »).', 1),
(38, '3701167194263', 'coverSCD1.jpg', 'Sexy Cosplay Doll - Tome 1', 'Fukuda Shinichi', 'Kana', '', '2023-11-01', 'Comédie, Romance, Seinen, Tranche de vie', 11, 'Wakana Gojo est un lycéen solitaire. Son rêve est de devenir artisan et de fabriquer les poupées traditionnelles pour le Hina Matsuri. Mais comme cette passion n\'est pas très virile, il la cache et ne se fait pas remarquer. Jusqu\'au jour où Marine Kitagawa, la fille la plus populaire du lycée, le voit se servir d\'une machine à coudre ! Contre toute attente elle lui demande de devenir son couturier pour réaliser... des tenues de cosplay !', 1),
(43, '2373499177', 'coverHorimiyaT1.jpg', 'Horimiya - Tome 1', 'Daisuke Hagiwara', 'Nobi nobi', '', '2023-01-18', 'Romance, Shojo, Tranche de vie', 11, 'D\'un côté, il y a Hori, la lycéenne à la mode et populaire à première vue, mais qui est en fait une fille très simple et qui pense avant tout à sa famille.\r\nEt de l\'autre, il y a Miyamura, le lycéen réservé qui se cache derrière ses lunettes, mais qui est en réalité un garçon chaleureux et aux nombreux piercings. Que se passe-t-il quand les deux se rencontrent par hasard sous leur véritable jour ?Découvrez la comédie romantique lycéenne pétillante et déjà culte qui va vous faire fondre !', 1),
(44, '2253082104', 'coverRJ.jpg', 'Roméo et juliette', 'William Shakespeare', 'Le livre de poche', 'Poche', '2005-08-24', 'Tragédie, Romance', 9, 'A Vérone, où les Montaigu et les Capulet se vouent une haine ancestrale, Roméo, fils de Montaigu, est amoureux de Rosaline, tandis que Capulet s\'apprête à donner une grande fête pour permettre à Juliette, sa fille, de rencontrer le comte Pâris qui l\'a demandée en mariage. Parce qu\'il croit que Rosaline s\'y trouvera, Roméo se rend au bal et pour Juliette éprouve un coup de foudre aussitôt réciproque. Sous le balcon de la jeune fille, il lui déclare le soir même son amour puis, le lendemain, prie frère Laurent de les marier et de r', 1),
(45, '229015802X', 'coverOedipe.jpg', 'Oedipe roi', 'Sophocle', 'J\'ai lu', 'Poche', '2018-01-10', 'Tragédie, Historique, Mythologie', 9, 'Averti par un oracle qu\'il tuerait son père et épouserait sa mère, Oedipe fuit les lieux de son enfance dans l\'espoir de préserver Polype et Mérope, ses parents présumés. Hélas ! Que ne lui a-t-on dit qu\'il était en réalité le fils de Laïos ! Ignorant du drame qui se joue, aveuglé par le hasard, Oedipe court à sa perte. Il tue un voyageur qui lui barre la route, libère Thèbes de l\'emprise du Sphinx et se marie, en récompense de sa bravoure, avec la reine de la cité : inéluctablement, son terrible destin s\'accomplit.', 1),
(46, '2070449963', 'covermoliere.jpg', 'Le médecin malgré lui', 'Molière', 'Folio', 'Poche', '2013-01-10', 'Comédie, Classique', 9, 'Une femme battue force son mari, bûcheron de son état, mais ayant étudié le latin, à devenir médecin, spécialiste de cas désespérés : il ne veut pas qu\'on meure sans ordonnance, et souhaite que les femmes restent muettes. C\'est que ce métier est, de tous, le meilleur : «Soit qu\'on fasse bien ou soit qu\'on fasse mal, on est toujours payé de même sorte.» «Les bévues, dit encore le médecin, ne sont point pour nous ; et c\'est toujours la faute de celui qui meurt.» Quant aux morts, «jamais on n\'en voit se plaindre du médecin qui l\'a t', 1),
(47, '2412033188', 'coverHaiku.jpg', 'Haikus', 'Detrie Muriel', 'First', 'Poche', '2018-02-22', 'Littérature étrangère, Haiku', 8, 'Le livre propose une anthologie de haïkus du Japon et du monde entier. Y seront présentés les haïkus des saisons composés par les maîtres du genre au 17e siècle (Bashô), mais également ceux de Jack Kerouac, Rainer Maria Rilke, Paul Eluard, écrivains grâce auxquels le haïku a parcouru le monde et n\'a cessé de se renouveler. Jusqu\'à se retrouver aujourd\'hui sur la toile sous la forme du Twit\'haïku, auquel tout un chacun peut s\'essayer.', 1),
(48, '2714311490', 'coverWWhitman.jpg', 'Manuel d\'amérique', 'Walt Whitman', 'Corti', 'Domaine romantique', '0000-00-00', 'Littérature étrangère, Historique, Classique, Romantique', 8, '« Walt Whitman aura été en fin de compte plus prolifique comme prosateur que comme poète. Soucieux de léguer à la postérité cet important volet de sa production littéraire, il supervisera l\'édition définitive de ses textes en prose en 1892, l\'année même de sa disparition. Il est donc clair que pour Whitman la frontière entre prose et poésie est ténue, ce qui correspond d\'ailleurs à la position qu\'il revendique:« l\'heure est venue ( ... ) de briser les barrières formelles érigées entre prose et poésie.»', 1),
(49, '2070322548', 'coverVHSatan.jpg', 'La fin de Satan', 'Victor Hugo', 'Gallimard', 'Poche', '0000-00-00', 'Épique', 8, '«Antres noirs du passé, porches de la durée Sans dates, sans rayons, sombre et démesurée, Cycles antérieurs à l\'homme, chaos, cieux, Monde terrible et plein d\'êtres mystérieux, Ô brume épouvantable ou les préadamites Apparaissent, debout dans l\'ombre sans limites, Qui pourrait vous sonder, gouffres, temps inconnus! Le penseur qui, pareil aux pauvres, va pieds nus Par respect pour Celui qu\'on ne voit pas, le mage, Fouille la profondeur et l\'origine et l\'âge, Creuse et cherche au-delà des colosses, plus loin Que les faits dont le c', 1),
(50, '2714600131', 'coverHomere.jpg', 'Homere - les hymnes homerique', 'Homère', 'Rheartis', 'Grand Format', '0000-00-00', 'Poésie, Épique, Mythologie, Historique', 8, 'Proème à une récitation homérique de type aédique ou rhapsodique à l\'occasion d\'une célébration cultuelle, l\'hymne homérique se présente comme un acte de chant adressé à une divinité ; celle-ci est louée et finalement invoquée en échange des bienfaits qui lui sont demandés.', 1),
(51, '2356741305', 'coverPocahontas.jpg', 'Pocahontas', 'Patrick Prugne', 'Daniel maghen', 'Grand Format', '2022-10-13', 'Historique', 13, 'L\'histoire de Pocahontas est une histoire vraie, entièrement documentée sur le plan historique. L\'album ne compte qu\'un seul personnage fictif : le narrateur, le Lieutenant Oliver Pitt, qui se positionne comme le témoin de l\'histoire de l\'arrivée des colons anglais sur les terres de la Virginie, sur la côte est d\'Amérique du Nord.', 1),
(52, '9782290262054', 'coverVoltaire.jpg', 'Traité sur la tolérance', 'Voltaire', 'Librio', '', '2021-09-22', 'Historique, Essaie, Scolaire', 10, 'Le 9 mars 1762, le protestant Jean Calas est roué de coups sur la place publique de Toulouse, puis exécuté. Il est accusé sans preuves d\'avoir tué son fils qui s\'était converti au catholicisme. Il nie et clame son innocence jusqu\'à son dernier souffle, sans être entendu. Mais bientôt, l\'affaire gagne la capitale... Indigné, Voltaire s\'empare de cette injustice. Devant l\'incohérence du procès, il demande la réhabilitation du père Calas.Dénonciation du fanatisme et de la superstition, ce traité publié en 1763 est un vibrant appel à', 1),
(53, '2253260169', 'coverHorizonNuit.jpg', 'L\'horizon d\'une nuit', 'Grebe Camilla', 'Le livre de poche', 'Poche', '2023-02-01', 'Thriller, Psychologie', 7, 'Dans sa grande maison aux abords de Stockholm, Maria aime sa famille recomposée avec son nouveau mari Samir, son petit Vincent, si fragile et attachant, et sa splendide belle-fille Yasmin, qui couvre ce dernier d\'amour. Mais, par une nuit d\'hiver, Yasmin disparaît près de la falaise, et aucun corps n\'est jamais retrouvé. Bientôt, tout accuse Samir. Après tout, n\'avait-il pas une relation conflictuelle avec sa fille ? Maria ne peut y croire. Pourtant, petit à petit, le doute l\'envahit. Les inspecteurs Gunnar Wijk et Ann-Britt Sven', 1),
(54, '2253258199', 'coverSilence.jpg', 'Dans son silence', 'Michaelides Alex', 'Le livre de poche', 'Poche', '2020-01-02', 'Thriller, Psychologie', 7, 'Alicia, jeune peintre britannique en vogue, vit dans une superbe maison près de Londres avec Gabriel, photographe de mode. Quand elle est retrouvée chez elle, hagarde et recouverte de sang devant le cadavre de son mari défiguré, la presse s\'enflamme. Aussitôt arrêtée, Alicia ne prononce plus le moindre mot, même au tribunal. Elle est jugée mentalement irresponsable et envoyée dans une clinique psychiatrique.', 1),
(55, '2266198300', 'coverInNomine.jpg', 'In nomine', 'Giacometti Eric', 'Pocket', 'Poche', '2010-04-08', 'Thriller, Esotérique, Policier, Historique', 7, 'XIIIe siècle, Comté de Toulouse. Raoul de Presle conduit à la mort plusieurs centaines d\'hérétiques. Hommes, femmes, enfants, tous s\'élancent dans le bûcher sans la moindre peur...\r\nXXe siècle, Paris. L\'inspecteur Marcas enquête sur son premier meurtre. Du milieu des collectionneurs de manuscrits ésotériques aux coulisses occultes de la franc-maçonnerie, tous veulent retrouver un secret perdu depuis le massacre des hérétiques.\r\nUne quête de sang qui va mener Marcas aux portes du Temple...', 1),
(56, '2266327348', 'coverTempliers.jpg', 'Le mystère des templiers', 'Ernest Dempsey', 'Pocket', 'Poche', '2023-01-12', 'Thriller, Esotérique, Policier, Historique', 7, '13 octobre 1307. Le roi Philippe Le Bel ordonne l\'arrestation de tous les Templiers du royaume. À Chinon, l\'un d\'entre eux, Sébastien Le Marc, reçoit l\'ordre de sa hiérarchie de mettre trois mystérieux coffres à l\'abri des inquisiteurs. Alors que la confusion règne dans la ville, Sébastien remarque parmi les hommes lancés à sa poursuite un membre de l\'ordre islamique des Assassins.\r\nMissouri, 2021. Alors que l\'agence archéologique avec laquelle il collabore étudie une pierre gravée de mystérieux symboles, Sean Wyatt est victime d', 1),
(57, '2290208876', 'coverGOT.jpg', 'Le trone de fer - integrale vol.1 - édition collector', 'George R. R. Martin', 'J\'ai lu', 'Poche', '0000-00-00', 'Fantasy, Science-Fiction, Épique', 7, 'Le royaume des Sept Couronnes est sur le point de connaître son plus terrible hiver : par-delà le Mur qui garde sa frontière nord, une armée de ténèbres se lève, menaçant de tout détruire sur son passage. Mais il en faut plus pour refroidir les ardeurs des rois, des reines, des chevaliers et des renégats qui se disputent le trône de fer. Tous les coups sont permis, et seuls les plus forts, ou les plus retors, s\'en sortiront indemnes...', 1),
(58, '2809449945', 'coverWitcher.jpg', 'Le monde de the Witcher', 'Collectif', 'Panini', 'Panini books', '2015-06-03', 'Fantasy, Science-Fiction, Épique', 10, 'Plongez dans le monde des chasseurs de monstres : les personnages vous entraînent dans une visite guidée de la sombre et fascinante aventure de The Witcher.\r\nCe magnifique livre illustré vous invite à la découverte de lieux magiques, des créatures funestes qui les peuplent, et des armes qui peuvent les vaincre...', 1),
(59, '2290364339', 'coverNevernight.jpg', 'Nevernight : n\'oublie jamais', 'Kristoff Jay', 'J\'ai lu', 'Poche', '2022-10-05', 'Fantasy, Sombre', 7, 'Fille d\'un renégat dont la rébellion a avorté, Mia Corvere a réchappé de justesse à l\'extermination des siens. Livrée à elle-même, elle erre dans une ville bâtie sur les ossements d\'un dieu mort, traquée par le Sénat et les anciens camarades de son père. À seize ans, elle va devenir l\'une des apprentis du groupe d\'assassins le plus dangereux de toute la République:L\'Église rouge. Dans cette institution où les trahisons et les confrontations violentes sont monnaie courante, l\'échec est puni de mort. Mais si elle survit à son initi', 0),
(60, '2492403696', 'coverDiaphane.jpg', 'La cité diaphane', 'Faure Anouck', 'Argyll', 'Grand Format', '2023-02-03', 'Fantasy, Sombre', 7, 'Merveille architecturale élancée vers le ciel, Roche-Étoile a connu la splendeur et la chute. La cité sainte de la déesse sans visage est maudite, réduite à l\'état de nécropole brumeuse depuis que les eaux de son lac et de ses puits se sont changées en poison mortel.\r\n\r\nSept ans après le drame, l\'archiviste d\'un royaume voisin se rend dans la cité défunte avec pour mission de reconstituer le récit de ses derniers jours. Mais il s\'avère bientôt que Roche-Étoile abrite encore quelques âmes, en proie à la souffrance ou à la folie, e', 1),
(61, '2354089716', 'coverLuneBrise.jpg', 'Sous la lune brisée', 'Doly Anne-Claire', 'Mnemos', 'Grand Format', '2022-05-20', 'Science-fiction, Post-apocalyptique, Thriller', 7, 'Au coeur de la tourmente insurrectionnelle.Sous les fragments jumeaux de la lune brisée, la République des Neuf Cités tente de survivre sur un continent convalescent, menacée par la corruption grandissante du pouvoir et une guerre aux frontières qui ébranlent le régime des Gardiens.Des usines métallurgiques où la gronde est plus forte chaque jour aux montagnes ocres où se massent les réfugiés, chacun devra faire face à ses choix, ses secrets et ses désirs pour échapper au chaos, et tenter de dessiner un autre avenir.', 1),
(62, '9791030703658', 'coverNeuromancien.jpg', 'Neuromancien', 'Gibson William', 'Au diable vauvert', 'Grand Format', '2020-10-01', 'Science-fiction, Cyberpunk', 7, 'Case était le meilleur Hacker sur les autoroutes de l\'information. Son cerveau étant directement relié à la matrice, il savait comme personne se frayer un chemin dans le cyberespace pour pirater des données pour le compte de riches clients. Voulant dépasser un de ses employeur, Case a été amputé de son système nerveux, le privant ainsi de l\'accès à la matrice. Complètement déprimé, le jeune homme n\'a plus aucun moyen de s\'évader de la prison qu\'est son corps, jusqu\'au jour où une mystérieuse conspiration va lui offrir une seconde', 1),
(63, '270025936X', 'coverSteampunk.jpg', 'Engrenages et sortilèges', 'Tomas Adrien', 'Rageot', '', '2019-01-23', 'Science-fiction, Steampunk', 7, 'Grise et Cyrus sont élèves  à la prestigieuse Académie des Sciences Occultes et Mécaniques de Celumbre. Une nuit, l\'apprentie mécanicienne et le jeune mage échappent de justesse à un enlèvement. Alors qu\'ils se détestent, ils doivent fuir ensemble et chercher refuge dans les Rets, sinistre quartier aux mains des voleurs et des assassins.  S\'ils veulent survivre, les deux adolescents n\'ont d\'autre choix que de faire alliance...', 1),
(64, '2843626889', 'coverSalomon.jpg', 'Les mines du roi salomon', 'Rider Haggard Henry', 'Terre de brume', 'Grand Format', '2021-01-23', 'Aventure; Historique', 7, 'Dans les années 1880, trois Anglais s\'aventurent dans des contrées inconnues de l\'Afrique du Sud, à la recherche de Neville Curtis, parti en quête des fameuses mines de diamants du roi Salomon.\r\nConduit par Allan Quatermain, le groupe d\'aventuriers doit affronter de multiples dangers avant de trouver une contrée perdue, celle des Kukuanas, dirigée par le tyran Twala et la sorcière Gagool. Mais qui est le mystérieux Umbopa qui suit l\'expédition depuis le départ ? Et comment les aventuriers sauront-ils se sortir des situations les ', 1),
(65, '2080258699', 'coverAlaska.jpg', 'La femme de l\'Alaska', 'Curwood James Olivier', 'Arthaud', 'Grand Format', '2022-04-13', 'Aventure; Historique', 7, 'Mary Standish, une mystérieuse et élégante jeune femme, embarque sur un vapeur remontant les côtes d\'Alaska vers le nord. À bord, elle rencontre Alan Holt, un éleveur de rennes qui lutte contre la corruption pour défendre son pays et protéger les Amérindiens. D\'abord intrigué par cette curieuse jeune femme aux yeux clairs, il va peu à peu être séduit par sa grande force de caractère. Mais un soir, Mary disparaît en mer... Alan Holt va tout faire pour la retrouver.Ce grand roman d\'aventure et d\'amour, écrit comme un thriller, nous', 1),
(66, '2332490000', 'coverRagnar.jpg', 'Ragnar le viking', 'Bonneau Albert', 'Edilivre', 'Grand Format', '2012-06-18', 'Historique, Aventure', 7, 'Parti naviguer depuis dix-sept lunes dans la Mer du Milieu, le Serpent d?Or du vieil Harald est enfin de retour au village de Thorstad. Comment se fait-il que le Morse de Lars le Roux et le Dragon d?Erik le Noir, qui l?accompagnaient dans ce voyage, ne soient pas dans son sillage ? Quel désastre a bien pu se produire pour que le maître des Vikings revienne seul et si gravement blessé ? Ragnar apprend, de la bouche de son père mourant, la trahison dont il a été victime de la part d?Erik le Noir, désireux de prendre sa place. Il lu', 1),
(67, '2253122920', 'coverLigneVerte.jpg', 'La ligne verte', 'Stephen King', 'Le livre de poche', 'Poche', '2008-04-23', 'Sombre, Thriller, Science-Fiction', 7, 'Paul Edgecombe, ancien gardien-chef d\'un pénitencier dans les années 1930, entreprend d\'écrire ses mémoires.\r\nIl revient sur l\'affaire John Caffey - ce grand Noir au regard absent, condamné à mort pour le viol et le meurtre de deux fillettes - qui défraya la chronique en 1932.\r\nLa Ligne verte décrit un univers étouffant et brutal, où la défiance est la règle. Personne ne sort indemne de ce bâtiment coupé du monde, où cohabitent une étrange souris apprivoisée par un Cajun pyromane, le sadique Percy Wetmore, et Caffey, prisonnier s', 1),
(68, '9782373493818', 'coverFuku1.jpg', 'Fukuneko, les chats du bonheur - Tome 1', 'Mari Matsuzawa', 'Nobi nobi', '', '2021-04-07', 'Kodomo', 11, 'Dans la ville de Fukuneko, les chats sont loin d\'être des félins ordinaires. En effet, si vous êtes chanceux, l\'un d\'eux vous choisira peut-être pour vous rendre heureux ! Dénommés les «fukuneko», ces serviteurs du dieu des chats ont le pouvoir d\'apporter le bonheur à l\'humain de leur choix.C\'est ainsi que la jeune Ako, fraîchement débarquée à la campagne, se voit adoptée par Fuku, la chatte de sa défunte arrière-grand-mère. À ses yeux seulement, l\'animal a l\'apparence d\'une fillette aux oreilles de félin...', 1),
(69, '9782373493825', 'coverFuku2.jpg', 'Fukuneko, les chats du bonheur - Tome 2', 'Mari Matsuzawa', 'Nobi Nobi', '', '2021-06-02', 'Kodomo', 11, 'En emménageant à la campagne, la jeune Ako a découvert les fukuneko, de curieux petits chats qui apportent de la chance à leur maître grâce à leur danse magique ! Elle possède d\'ailleurs son propre chat porte-bonheur, Fuku, de même que sa nouvelle amie Chika est accompagnée au quotidien par le facétieux Kosuke. Les jeunes filles font bientôt la rencontre d\'autres fukuneko, comme le chef Haku, et la candide Azuki. Cette dernière aurait d\'ailleurs bien besoin d\'un coup de main des deux humaines pour se rapprocher du beau chat blanc', 1),
(70, '9782723478380', 'coverChi1.jpg', 'Chi - une vie de chat - Tome 1', 'Kanata Konami', 'Glénat', 'KIDS', '2010-11-17', 'Kodomo, Comédie', 11, 'Tout un monde de douceur, de chamailleries et... de bêtises !Ce manga raconte l\'histoire d\'un petit chat recueilli par une famille et son évolution au sein de cette famille. Chaque épisode met en scène un moment marquant de cette vie de chat : sa première rencontre avec une auto, avec un chien, comment il va apprendre à faire ses besoins dans la litière, le bon goût des croquettes, la chaleur du soleil à travers les vitres, le confort ouaté des pantoufles de papa, etc.', 1),
(71, '9782723478458', 'coverChi2.jpg', 'Chi - une vie de chat - Tome 2', 'Kanata Konami', 'Glénat', 'KIDS', '2011-01-26', 'Kodomo, Jeunesse, Comédie', 7, 'Que faire quand on est un mignon petit chaton dans une maison qu\'on ne connaît pas ?Pleurer ? Ne rien faire ? Attendre ?Non, il y a plus drôle que ça : découvrir le monde !Du bac à sable aux crayons, du chat d\'à côté au bain, des serviettes aux légumes...la vie de chat est pleine de joies et de surprises.Et avec Chi, elle l\'est encore plus !Miaaaa...', 1),
(72, '2505076766', 'coverSCD2.jpg', 'Sexy cosplay doll - Tome 2', 'Shinichi Fukuda', 'Kana', 'Poche', '2019-12-06', 'Comédie, Romance, Seinen, Tranche de vie', 11, 'Wakana Gojô, apprenti kashirashi, accepte de créer le costume de cosplay de Marine Kitagawa, la coqueluche de sa classe.\r\nMais il n\'a que deux semaines pour y arriver !\r\nHeureusement, le sourire de Marine qui l\'attend au bout de cette épreuve, comme il l\'imagine, motivera probablement notre jeune Wakana !!', 1),
(73, '2505084726', 'coverSCD3.jpg', 'Sexy cosplay doll - Tome 3', 'Shinichi Fukuda', 'Kana', 'Poche', '2020-05-15', 'Comédie, Romance, Seinen, Tranche de vie', 11, 'Après sa première convention de cosplay avec Gojô, un changement se produit dans le coeur de Marine. Mais les événements s\'enchaînent et, de fil en aiguille, Gojô se retrouve chez elle pour regarder un anime avant de fabriquer son prochain costume !\r\nDe son côté, une mystérieuse jeune cosplayeuse, connue sous le pseudo « Juju », se rend chez Gojô... mais que lui veut-elle, exactement ?!', 1),
(74, '2505007306', 'coverPK.jpg', 'Paradise kiss - intégrale', 'Aï Yazawa', 'Kana', 'Poche', '2008-08-22', 'Comédie, Romance, Seinen, Tranche de vie', 11, 'La très sérieuse lycéenne Yukari n\'a qu\'une obsession: réussir son entrée à l\'université. Son assiduité aux études n\'a d\'égale que sa phobie excessive des gens. Aussi, quand un garçon tente de l\'aborder, puis qu\'un travesti lui barre la route, elle s\'effraie au point qu\'elle s\'évanouit! Lorsqu\'elle se réveille au « Paradise Kiss », une sorte de bar tenant lieu d\'atelier de couture, elle apprend que ses « agresseurs » sont des étudiants d\'une école de mode qui travaillent à leur création de fin d\'année.', 1),
(75, '2344044876', 'coverBerserkCoffret.jpg', 'Berserk - Coffret Tomes 01 à 06', 'Kentaro Miura', 'Glénat Manga', '', '2020-11-25', 'Seinen, Gore, Sombre, Aventure, Action', 11, 'Guts est un guerrier solitaire à l’épée démesurée. Marqué par un terrible passé, il parcourt le monde en semant la mort sur son passage. Un jour, il vient en aide à Puck, un elfe facétieux et volubile qui décide de l’accompagner dans son voyage. Traqué par des forces obscures, Guts tente de devenir maître de son destin pour regagner sa liberté et accomplir sa vengeance… ', 1),
(76, '2755696079', 'coverHPerse.jpg', 'Hadès et Perséphone t.1 : a touch of darkness', 'St. Clair Scarlett', 'Hugo roman', 'Grand Format', '2022-05-03', 'Romance, Mythologie', 7, 'Depuis qu\'elle est toute petite, les fleurs se ratatinentà son contact. Après s\'être installée à New Athens, elle espérait mener une vie discrète, dans la peau d\'une journaliste mortelle. Tout change lorsqu\'elle s\'assied dans une boîte de nuit clandestine pour jouer une partie de cartes avec un étranger hypnotique et mystérieux. Hadès, le dieu des morts, a bâti un empire du jeu dans le monde des mortels et ses paris favoris sont réputés impossibles. Mais rien ne l\'a jamais intriguéautant que la déesse qui lui offre une aubaine la', 1),
(77, '2755696303', 'coverHPerse2.jpg', 'Hadès et Perséphone t.2 : a touch of ruin', 'Scarlett St. Clair', 'Hugo roman', 'Grand Format', '2022-05-31', 'Romance, Mythologie', 7, 'La relation de Perséphone avec Hadès est devenue publique et la tempête médiatique qui en résulte perturbe sa vie normale et menace de l\'exposer en tant que déesse du printemps. Pour ajouter àses ennuis, tout le monde semble désireux d\'éloigner Perséphone du Dieu des morts en exposant son passéinfernal. Les choses ne font qu\'empirer lorsqu\'une horrible tragédie laisse le coeur de Perséphone en ruine et Hadès refuse de l\'aider. Désespérée, elle prend les choses en main et conclut des accords qui ont de graves conséquences. Confron', 1),
(78, '2755696478', 'coverHPerse3.jpg', 'Hadès et Perséphone t.3 : a touch of malice', 'St. Clair Scarlett', 'Hugo roman', 'Grand Format', '2022-07-05', 'Romance, Mythologie', 7, 'Perséphone et Hadès sont fiancés. En représailles, Déméter provoque une tempête de neige qui paralyse la Nouvelle-Grâce, et refuse de lever le blizzard si sa fille n\'annule pas ses fiançailles. Lorsque les Olympiens interviennent, Perséphone voit son avenir entre les mains des anciens dieux, qui sont divisés. Doivent-ils permettre Perséphone d\'épouser Hadès et partir en guerre contre Déméter, ou interdire leur union et prendre les armes contre le dieu des morts ? Rien n\'est sûr, sauf la promesse de la guerre.', 1),
(79, '2381222537', 'coverJaneEyre.jpg', 'Jane eyre', 'Charlotte Brontë', 'Hauteville', 'Grand Format', '2022-10-05', 'Romance, Historique', 7, 'Devenue orpheline dès son plus âge, Jane Eyre est recueillie par M. Reed, son oncle. Après la mort de ce dernier, sa tante la traite durement et l\'accuse de tous les vices. Lorsqu\'elle entre dans sa dixième année, Mme Reed, décidée à s\'en débarrasser définitivement, envoie Jane dans une pension pour jeunes filles pauvres, où l\'on va lui enseigner sévèrement, les rigueurs de la vie...', 1),
(80, '9791093835600', 'coverPnP.jpg', 'Orgueil & préjugés', 'Jane Austen', 'Hauteville', 'Poche', '2020-03-11', 'Romance, Classique, Historique', 7, 'Issue d\'une famille de la petite gentry anglaise, Elizabeth Bennet ne manque ni d\'humour ni de malice. Lors d\'un bal, elle rencontre le hautain Mr Darcy, un des hommes les plus riches d\'Angleterre mais aussi l\'un des plus orgueilleux, qu\'elle méprise aussitôt. Après avoir mal jugé le charme de la jeune femme, il tombe amoureux d\'elle et mènera une longue lutte intérieure entre ce que lui dictent son coeur et son rang. Comment réussiront-ils à vaincre leurs préjugés et à faire taire leur orgueil pour connaître l\'amour ?', 1),
(81, '2811235884', 'coverRnS.jpg', 'Raison et sentiments - édition collector', 'Jane Austen', 'Milady', 'Grand Format', '0000-00-00', 'Romance, Classique, Historique', 7, 'Elinor et Marianne Dashwood sont deux soeurs aux caractères bien différents. Privées de leur héritage à la mort de leur père, elles doivent quitter le Sussex en compagnie de leur cadette Margaret et de leur mère. Dans le Devon, elles ne tardent pas à s\'habituer à leur désormais modeste quotidien au contact de leurs nouveaux voisins. Mais lorsqu\'elles tombent amoureuses, Elinor et Marianne se retrouvent tiraillées entre ce que leur impose la raison et ce que leur dicte leur coeur.', 1),
(82, '2290257486', 'coverHighlanders.jpg', 'La fierté des highlanders - le secret des sutherland', 'Sharon Cullen', 'J\'ai lu', 'Pour elle ; aventures et passions', '0000-00-00', 'Romance, Historique', 7, '1746. Brice Sutherland s\'est uni aux autres chefs de clan pour protéger le peuple écossais contre les Tuniques rouges. Lors d\'une patrouille, il découvre au bord d\'une route une femme moribonde qu\'il ramène à Castle Dornach. Blessée, à bout de forces, l\'inconnue ne parle pas. Impossible de savoir d\'où elle vient. Nuit après nuit, son sommeil est hanté par de terrifiants cauchemars que seul Brice parvient à apaiser. Mais l\'esprit chevaleresque du Highlander est bientôt mis à rude épreuve par un brûlant désir pour cette femme diaph', 1),
(83, '2205049658', 'coverBSBD.jpg', 'Blacksad t.1 : quelquepart entre les ombres', 'Juanjo Guarnido', 'Dargaud', 'Grand Format', '2000-07-25', 'Policier, Thriller', 13, 'Attention chef-d\'oeuvre ! L\'histoire d\'un privé qui veut venger son ex-fiancée assassinée, rappelle celle des grands maîtres du polar le plus noir. Cette tragédie classique est transfigurée par un dessin sublime, d\'une maestria époustouflante !', 1),
(84, '2756035734', 'coverBDIndes.jpg', 'Les indes fourbes', 'Juanjo Guarnido', 'Delcourt', 'Grand Format', '2019-08-28', 'Action, Aventure, Historique', 13, 'Fripouille sympathique, don Pablos de Ségovie fait le récit de ses aventures picaresques dans cette Amérique qu\'on appelait encore les Indes au siècle d\'or. Tour à tour misérable et richissime, adoré et conspué, ses tribulations le mèneront des bas-fonds aux palais, des pics de la Cordillère aux méandres de l\'Amazone, jusqu\'à ce lieu mythique du Nouveau Monde : l\'Eldorado !', 1),
(85, '2205056832', 'coverBDlady.jpg', 'Long john silver t.1 : lady vivian hastings', 'Mathieu Lauffray', 'Dargaud', 'Grand Format', '2007-05-17', 'Thriller', 7, 'Tout bascule le jour où Vivian reçoit enfin des nouvelles de son mari qui lui somme de le rejoindre en Amérique du sud où Lord Hasting aurait découvert le mythique trésor de Guayanacapac ! Acculée, Lady Hastings décide de partir et fait appel, malgré les mises en garde du docteur Livesey, à une bande d\'hommes sans foi ni loi dont le chef n\'est autre que le redoutable Long John Silver. Vivian conclut un pacte de sang avec ce pirate qui lui propose de l\'embarquer jusqu\'au nouveau monde en échange d\'une partie du trésor. Le voyage s', 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id_category` int NOT NULL AUTO_INCREMENT,
  `libel_category` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `libel_slug` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_category`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id_category`, `libel_category`, `libel_slug`) VALUES
(7, 'Roman', 'roman'),
(8, 'Poésie', 'poesie'),
(9, 'Théâtre', 'theatre'),
(10, 'Documentaire', 'documentaire'),
(11, 'Manga', 'manga'),
(12, 'Comics', 'comics'),
(13, 'BD', 'bd'),
(14, 'Jeunesse', 'jeunesse'),
(15, 'Biographie', 'biographie');

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

DROP TABLE IF EXISTS `genre`;
CREATE TABLE IF NOT EXISTS `genre` (
  `id_genre` int NOT NULL AUTO_INCREMENT,
  `libel_genre` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `genre_slug` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_genre`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`id_genre`, `libel_genre`, `genre_slug`) VALUES
(1, 'Fantasy', 'fantasy'),
(2, 'Policier', 'policier'),
(3, 'Thriller', 'thriller'),
(4, 'Drame', 'drame'),
(5, 'Romance', 'romance'),
(6, 'Science-fiction', 'science-fiction'),
(7, 'Action', 'action'),
(8, 'Aventure', 'aventure'),
(9, 'Historique', 'historique'),
(10, 'Horreur', 'horreur'),
(11, 'Dystopie', 'dystopie'),
(12, 'Surréalisme', 'surrealisme'),
(13, 'Tragédie', 'tragedie'),
(14, 'Information', 'information'),
(15, 'Animalier', 'animalier'),
(16, 'Gore', 'gore'),
(17, 'Shonen', 'shonen'),
(18, 'Bande-desinné', 'bd'),
(19, 'Magie', 'magie'),
(20, 'Mystère', 'mystere'),
(21, 'Comics', 'comics'),
(22, 'DC Comics', 'dccomics'),
(23, 'Sombre', 'sombre'),
(25, 'Shojo', 'shojo'),
(26, 'Comédie', 'comedie'),
(27, 'Seinen', 'seinen'),
(28, 'Tranche de vie', 'tranche de vie'),
(29, 'Mythologie', 'mythologie'),
(30, 'Classique', 'classique'),
(31, 'Littérature étrangère', 'litterature etrangere'),
(32, 'Haiku', 'haiku'),
(33, 'Épique', 'epique'),
(34, 'Essaie', 'essaie'),
(35, 'Scolaire', 'scolaire'),
(36, 'Psychologie', 'psychologie'),
(37, 'Ésotérique', 'esoterique'),
(38, 'Post-apocalyptique', 'post-apocalyptique'),
(39, 'Cyberpunk', 'cyberpunk'),
(40, 'Steampunk', 'steampunk'),
(41, 'Kodomo', 'kodomo');

-- --------------------------------------------------------

--
-- Table structure for table `genre_book`
--

DROP TABLE IF EXISTS `genre_book`;
CREATE TABLE IF NOT EXISTS `genre_book` (
  `id_book` int NOT NULL,
  `id_genre` int NOT NULL,
  KEY `BOOK` (`id_book`),
  KEY `GENRE` (`id_genre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `genre_book`
--

INSERT INTO `genre_book` (`id_book`, `id_genre`) VALUES
(1, 1),
(1, 8),
(18, 1),
(18, 8),
(20, 12),
(19, 1),
(19, 8),
(21, 13),
(22, 11),
(26, 14),
(26, 15),
(27, 7),
(27, 16),
(27, 17),
(28, 8),
(28, 9),
(28, 17),
(29, 4),
(29, 6),
(29, 7),
(29, 8),
(30, 1),
(30, 4),
(30, 18),
(30, 19),
(29, 18),
(30, 20),
(31, 3),
(31, 21),
(31, 22),
(31, 23),
(32, 21),
(32, 22),
(32, 23),
(33, 4),
(33, 5),
(34, 20),
(35, 4),
(35, 5),
(21, 5),
(32, 7),
(31, 7),
(38, 5),
(82, 5),
(82, 9),
(81, 5),
(81, 9),
(81, 30),
(81, 31),
(80, 5),
(80, 9),
(80, 30),
(80, 31),
(79, 5),
(79, 9),
(78, 5),
(78, 29),
(77, 5),
(77, 29),
(76, 4),
(76, 5),
(76, 29),
(78, 4),
(75, 1),
(75, 7),
(75, 8),
(75, 16),
(75, 23),
(75, 27),
(74, 5),
(74, 27),
(74, 28),
(73, 5),
(73, 26),
(73, 27),
(73, 28),
(72, 5),
(72, 26),
(72, 27),
(72, 28),
(71, 26),
(71, 28),
(71, 41),
(70, 26),
(70, 28),
(70, 41),
(69, 41),
(68, 41),
(67, 2),
(67, 3),
(67, 6),
(67, 23),
(66, 7),
(66, 8),
(66, 9),
(65, 8),
(65, 9),
(64, 8),
(64, 9),
(63, 6),
(63, 40),
(62, 6),
(62, 39),
(61, 3),
(61, 6),
(61, 38),
(60, 1),
(60, 23),
(59, 1),
(59, 23),
(58, 1),
(58, 6),
(58, 23),
(58, 33),
(57, 1),
(57, 6),
(57, 7),
(57, 8),
(57, 13),
(57, 23),
(57, 33),
(56, 2),
(56, 3),
(56, 9),
(56, 37),
(55, 2),
(55, 3),
(55, 9),
(55, 37),
(54, 3),
(54, 36),
(53, 3),
(53, 36),
(52, 9),
(52, 30),
(52, 34),
(52, 35),
(51, 8),
(51, 9),
(50, 8),
(50, 9),
(50, 29),
(50, 33),
(49, 33),
(48, 9),
(48, 30),
(48, 31),
(47, 31),
(47, 32),
(46, 26),
(46, 30),
(45, 13),
(45, 30),
(45, 35),
(45, 9),
(45, 29),
(44, 4),
(44, 5),
(44, 13),
(44, 30),
(44, 31),
(38, 26),
(38, 27),
(38, 28),
(43, 5),
(43, 25),
(43, 28),
(83, 2),
(83, 3),
(84, 7),
(84, 8),
(84, 9),
(85, 7),
(85, 8),
(85, 9);

-- --------------------------------------------------------

--
-- Table structure for table `loan`
--

DROP TABLE IF EXISTS `loan`;
CREATE TABLE IF NOT EXISTS `loan` (
  `id_loan` int NOT NULL AUTO_INCREMENT,
  `id_book` int NOT NULL,
  `id_user` int NOT NULL,
  `loan_date` date NOT NULL,
  `return_date` date NOT NULL,
  PRIMARY KEY (`id_loan`),
  KEY `BOOK` (`id_book`),
  KEY `USER` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `loan`
--

INSERT INTO `loan` (`id_loan`, `id_book`, `id_user`, `loan_date`, `return_date`) VALUES
(1, 20, 7, '2023-03-23', '2023-04-08'),
(2, 80, 7, '2023-03-24', '2023-03-24'),
(3, 59, 7, '2023-03-24', '2023-03-24');

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

DROP TABLE IF EXISTS `newsletter`;
CREATE TABLE IF NOT EXISTS `newsletter` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `newsletter`
--

INSERT INTO `newsletter` (`id`, `email`) VALUES
(1, 'anje.jiro@gmail.com'),
(2, 'test@gmail.com'),
(3, 'valentingillot@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `password` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `username` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `lastname` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `mail` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `phone` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `birthdate` date NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `password`, `username`, `lastname`, `mail`, `phone`, `birthdate`) VALUES
(7, '$argon2id$v=19$m=65536,t=4,p=1$d0xxdUpsNWM0Q0NDZzBOLg$9wllTAdDgS3JaGQcc4FjqMf1QqMXndhkf5G/ObWG5Kg', 'Angéline', 'Gillot', 'anje.jiro@gmail.com', '0606060606', '1998-02-23');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `book_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `category` (`id_category`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `genre_book`
--
ALTER TABLE `genre_book`
  ADD CONSTRAINT `genre_book_ibfk_1` FOREIGN KEY (`id_book`) REFERENCES `book` (`id_book`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `genre_book_ibfk_2` FOREIGN KEY (`id_genre`) REFERENCES `genre` (`id_genre`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `loan`
--
ALTER TABLE `loan`
  ADD CONSTRAINT `loan_ibfk_1` FOREIGN KEY (`id_book`) REFERENCES `book` (`id_book`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `loan_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
