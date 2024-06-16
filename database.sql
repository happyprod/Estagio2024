-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 16-Jun-2024 às 23:08
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `concertpulse`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(35) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `picture_background` text NOT NULL,
  `registered` datetime NOT NULL,
  `method` varchar(35) NOT NULL,
  `verified` varchar(35) NOT NULL,
  `location` text NOT NULL,
  `type` text NOT NULL,
  `identity` int(35) NOT NULL,
  `url` text NOT NULL,
  `about` text NOT NULL,
  `number` text NOT NULL,
  `facebook` text NOT NULL,
  `twitter` text NOT NULL,
  `instagram` text NOT NULL,
  `id_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `accounts`
--

INSERT INTO `accounts` (`id`, `name`, `email`, `password`, `picture`, `picture_background`, `registered`, `method`, `verified`, `location`, `type`, `identity`, `url`, `about`, `number`, `facebook`, `twitter`, `instagram`, `id_name`) VALUES
(5, 'asjdasnka', 'asjdasnka@gmail.com', '', 'FotoPerfil.jpg', '', '2024-03-11 17:30:49', 'form', 'false', 'asd', 'singer', 1, '', '', '', '', '', '', ''),
(6, 'asdnkja', 'asdnkja@gmail.com', 'ajksndk@asjkdna', 'img\\fotos\\450f755a089a2c83e790c7337d54c728.jpeg', '', '2024-03-11 17:34:26', 'form', 'true', 'aklsfd', 'dj', 1, '', '', '', '', '', '', ''),
(10, 'happy', 'amldk@gmail.com', 'asd', 'img\\fotos\\servicos_img1.jpg', '', '2024-04-05 14:53:15', 'login', 'false', 'Sintra', 'Baterist', 5, '', '', '', '', '', '', 'happy'),
(11, 'Ruben Costa', 'ruben.escola.2006@gmail.com', '', 'https://lh3.googleusercontent.com/a/ACg8ocI84I3098-o2aoK5zMBBGTswW-2MLBIFs8_HzoX_ZKOb2doOrXn=s96-c', '', '2024-04-06 13:55:40', 'google', 'false', 'Cacem', 'Gastronomic', 1, '', '', '', '', '', '', 'fghbjkl'),
(19, 'Rben Costa', 'beatsrubencosta@gmail.com', '', 'FotoPerfil.jpg', 'foto_capa.jpg', '2024-05-04 17:45:18', 'google', 'false', 'New Jersey', 'Promotor de Festivais', 2, '19', ' kdjasc \n\njkhasksdjhacjkhasksdjhac ', '913352194', 'www.facebook.com', 'www.google.com', 'www.instagram.com', 'rei'),
(20, 'ola', 'ola@gmail.com', '123', './img/foto/default.jpg', '', '2024-05-07 02:39:21', 'form', '', '', '', 2, '', '', '', '', '', '', 'ola'),
(21, 'soufixe', 'soufixe@gmail.com', '123', './img/foto/default.jpg', '', '2024-05-07 02:40:24', 'form', '', '', '', 3, '', '', '', '', '', '', 'soufixe'),
(22, 'Simao', 'sougiro@gmail.com', '123', './img/foto/default.jpg', '', '2024-05-07 11:09:38', 'form', '', '', '', 1, '', '', '', '', '', '', 'sougiro'),
(23, 'simao', 'simao@gmail.com', '123', './img/foto/default.jpg', '', '2024-05-07 11:44:28', 'form', '', '', '', 1, '', '', '', '', '', '', ''),
(24, 'Ruben Costa', 'rubencostagaming@gmail.com', '', 'https://lh3.googleusercontent.com/a/ACg8ocKKSxuf4l-kffxxnUCxjOsVJUf7DmMFiYcKMl8FZMe-JHgKBQ=s96-c', '', '2024-05-08 17:54:09', 'google', 'false', '', '', 2, '24', '', '', '', '', '', ''),
(25, 'goncalinho', 'goncalinho@gmail.com', '123', './img/foto/default.jpg', '', '2024-05-21 14:08:44', 'form', '', '', '', 1, '', '', '', '', '', '', ''),
(26, 'ruben', 'costa@gmail.com', 'asd', '', '', '0000-00-00 00:00:00', '', '', 'asdf', '4', 0, '', '', '', '', '', '', ''),
(27, 'ruben', 'happy@gmail.com', '123', '', '', '0000-00-00 00:00:00', '', '', 'asdasd', '2', 0, '', '', '', '', '', '', ''),
(28, 'nome', 'email@gmail.com', 'palavra-passe', '', '', '0000-00-00 00:00:00', '', '', 'localização', '', 2, '', '', '', '', '', '', 'identificacao'),
(29, 'Ruben', 'happy2@gmail.com', 'bananinha', '', '', '0000-00-00 00:00:00', '', '', 'LDLC Arena, Avenue Simone Veil, Décines-Charpieu, França', '', 0, '', '', '', '', '', '', 'happy2'),
(30, 'Gonçalinho', 'goncalinhopan@pan.pt', 'goncalinho', '', '', '0000-00-00 00:00:00', '', '', 'Avanca, Portugal', '', 0, '', '', '', '', '', '', 'goncalinho'),
(31, 'nome', 'user@gmail.pcm', 'palavra-passe', '', '', '0000-00-00 00:00:00', '', '', 'Seychelles', '', 0, '', '', '', '', '', '', 'nome de user'),
(32, '', '', '', '', '', '0000-00-00 00:00:00', '', '', '', '', 0, '', '', '', '', '', '', ''),
(33, '', 's@gmail.com', '', '', '', '0000-00-00 00:00:00', '', '', '', '', 5, '', '', '', '', '', '', ''),
(34, 'ganggang', 'ksd@gmail.com', '123', '', '', '0000-00-00 00:00:00', '', '', 'SDF Building, GP Block, Sector V, Bidhannagar, Calcutá, Bengala Ocidental, Índia', '', 4, '', '', '', '', '', '', 'cao'),
(35, 'ggggggggg', 'asd@gmail.com', '1234567', '', '', '0000-00-00 00:00:00', '', '', 'Buceta, Santa Cruz de La Sierra, Bolívia', '', 3, '', '', '', '', '', '', 'goncalinho2'),
(36, '                                ', 'olateste2@gmail.com', 'ola', '', '', '0000-00-00 00:00:00', '', '', 'Mamas Joint Road, MCC B Block, MCC, Davanagere, Karnataka, Índia', '', 5, '', '', '', '', '', '', '                                                                                                                           '),
(58, 'prod', 'happyzao@gmail.com', 'palavrapasse', '', '', '0000-00-00 00:00:00', '', '', 'Galveias, Portugal', '', 3, '', '', '', '', '', '', 'happyksd');

-- --------------------------------------------------------

--
-- Estrutura da tabela `artists`
--

CREATE TABLE `artists` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `shows` int(11) NOT NULL,
  `follows` int(11) NOT NULL,
  `singer` varchar(255) NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `artists`
--

INSERT INTO `artists` (`id`, `name`, `image_url`, `location`, `shows`, `follows`, `singer`, `rating`) VALUES
(1, 'Post Malone', './img/fotos/0cf31654ec0d43146262e3784904779a.jpg', 'Old York', 123, 2000, 'Singer', 392),
(2, 'Drake', 'https://example.com/drake.jpg', 'Toronto', 150, 2500, 'Rapper', 450),
(3, 'Ariana Grande', 'https://example.com/ariana-grande.jpg', 'Los Angeles', 100, 3000, 'Singer', 500),
(4, 'Post Malone', 'https://example.com/post-malone.jpg', 'New York', 192, 2000, 'Singer', 392),
(5, 'Drake', 'https://example.com/drake.jpg', 'Toronto', 150, 2500, 'Rapper', 450),
(6, 'Ariana Grande', 'https://example.com/ariana-grande.jpg', 'Los Angeles', 100, 3000, 'Singer', 500);

-- --------------------------------------------------------

--
-- Estrutura da tabela `follows`
--

CREATE TABLE `follows` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_followed` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `follows`
--

INSERT INTO `follows` (`id`, `id_user`, `id_followed`) VALUES
(1, 19, 6),
(2, 6, 19);

-- --------------------------------------------------------

--
-- Estrutura da tabela `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `id_founder` int(11) NOT NULL,
  `nome` text NOT NULL,
  `imagem` text NOT NULL,
  `sinopse` text NOT NULL,
  `descricao` text NOT NULL,
  `local` text NOT NULL,
  `data` date DEFAULT NULL,
  `Event` text NOT NULL,
  `Active_Event` tinyint(1) NOT NULL,
  `Active_Data` tinyint(1) NOT NULL,
  `Booking` text NOT NULL,
  `Active_Booking` tinyint(1) NOT NULL,
  `Active_Local` tinyint(1) NOT NULL,
  `Active_Collab` tinyint(1) NOT NULL,
  `PrivacyProjects` int(35) NOT NULL,
  `PrivacyLikes` int(35) NOT NULL,
  `PrivacyComments` int(35) NOT NULL,
  `impressions` int(35) NOT NULL,
  `likes` int(35) NOT NULL,
  `comments` int(35) NOT NULL,
  `organic` int(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `projects`
--

INSERT INTO `projects` (`id`, `id_founder`, `nome`, `imagem`, `sinopse`, `descricao`, `local`, `data`, `Event`, `Active_Event`, `Active_Data`, `Booking`, `Active_Booking`, `Active_Local`, `Active_Collab`, `PrivacyProjects`, `PrivacyLikes`, `PrivacyComments`, `impressions`, `likes`, `comments`, `organic`) VALUES
(1, 19, 'Lost Lands', 'ola.jpg', 'Thanks for the Bass in my brain <3', 'Atuar no Lost Lands é uma experiência surreal. Desde o momento em que coloco os pés no palco até o momento em que saio, é uma montanha-russa de emoções e energia. O Lost Lands tem uma energia única, uma mistura de selvageria e comunidade que é difícil de replicar em qualquer outro lugar.\n\nO palco é colossal, uma verdadeira maravilha visual. As luzes, os telões, o som estrondoso - tudo conspira para criar uma atmosfera que te envolve completamente. É como estar em outro mundo.\n\nInteragir com a multidão é uma das melhores partes. Ver milhares de pessoas reunidas, todas compartilhando a mesma paixão pela música, é incrivelmente inspirador. Eles estão lá para se divertir, para se perder na batida, e eu estou lá para levá-los nessa jornada.\n\nClaro, há sempre desafios. Manter a energia alta durante um set longo pode ser exigente, mas é aí que reside a magia da atuação ao vivo. É uma troca de energia constante entre o DJ e o público, e quando você está no Lost Lands, essa troca atinge um nível totalmente novo.\n\nNo final do dia, atuar no Lost Lands é mais do que apenas tocar algumas músicas. É uma experiência imersiva, uma celebração da música e da cultura da dance music. E quando você está no palco, fazendo parte dessa celebração, é uma sensação indescritível.', 'US', '2024-05-14', 'LostLandsOfficial', 0, 1, '', 0, 0, 0, 2, 5, 9, 0, 0, 0, 0),
(2, 19, 'Tommrowland', 'ola2.jpg', 'Live today, Love Tommorrow!Live today, Love Tommorrow!', 'INSANojjjjj', '', '2000-07-07', '', 1, 1, '', 1, 0, 1, 2, 5, 9, 0, 0, 0, 0),
(6, 0, 'Crato', '', '', 'INSANE!', 'Lisboa', '2024-05-09', 'Tommrrowland', 0, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `projects_collabs`
--

CREATE TABLE `projects_collabs` (
  `id` int(35) NOT NULL,
  `id_project` int(35) NOT NULL,
  `id_user` int(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `projects_collabs`
--

INSERT INTO `projects_collabs` (`id`, `id_project`, `id_user`) VALUES
(1, 2, 19),
(2, 2, 21),
(3, 2, 11);

-- --------------------------------------------------------

--
-- Estrutura da tabela `projects_comments`
--

CREATE TABLE `projects_comments` (
  `id` int(35) NOT NULL,
  `id_project` int(35) NOT NULL,
  `id_user_send` int(35) NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `projects_images`
--

CREATE TABLE `projects_images` (
  `id` int(11) NOT NULL,
  `id_project` int(11) NOT NULL,
  `image` text NOT NULL,
  `ordem` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `projects_images`
--

INSERT INTO `projects_images` (`id`, `id_project`, `image`, `ordem`) VALUES
(116, 2, 'I391Ef8HQciDeJ6skJHgX3zLOx6BVMo1fK9wbiE2IM9Ix5Q', 1),
(117, 2, 'PwCYF8bZAQv8AAAAAElFTkSuQmCC', 2),
(123, 1, 'ola4.jpg', 1),
(124, 1, 'I391Ef8HQciDeJ6skJHgX3zLOx6BVMo1fK9wbiE2IM9Ix5Q', 2),
(125, 1, 'ola3.jpg', 3),
(126, 1, 'ola2.jpg', 4),
(127, 1, 'I391Ef8HQciDeJ6skJHgX3zLOx6BVMo1fK9wbiE2IM9Ix5Q', 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `projects_likes`
--

CREATE TABLE `projects_likes` (
  `id` int(35) NOT NULL,
  `id_project` int(35) NOT NULL,
  `id_user_send` int(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `projects_privacy`
--

CREATE TABLE `projects_privacy` (
  `id` int(35) NOT NULL,
  `id_project` int(35) NOT NULL,
  `projects` int(35) NOT NULL,
  `likes` int(35) NOT NULL,
  `comments` int(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `projects_privacy`
--

INSERT INTO `projects_privacy` (`id`, `id_project`, `projects`, `likes`, `comments`) VALUES
(1, 2, 1, 5, 9);

-- --------------------------------------------------------

--
-- Estrutura da tabela `projects_stats`
--

CREATE TABLE `projects_stats` (
  `id_stat` int(11) NOT NULL,
  `id_projeto` int(11) DEFAULT NULL,
  `numero_impressoes` int(11) DEFAULT NULL,
  `numero_likes` int(11) DEFAULT NULL,
  `numero_comentarios` int(11) DEFAULT NULL,
  `organico` int(11) DEFAULT NULL,
  `nao_organico` int(11) DEFAULT NULL,
  `localizacoes` text DEFAULT NULL,
  `dados_demograficos` text DEFAULT NULL,
  `timestamp` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `projects_stats`
--

INSERT INTO `projects_stats` (`id_stat`, `id_projeto`, `numero_impressoes`, `numero_likes`, `numero_comentarios`, `organico`, `nao_organico`, `localizacoes`, `dados_demograficos`, `timestamp`) VALUES
(1, 1, 150, 60, 10, 80, 20, 'São Paulo, Rio de Janeiro', 'M 18-24, F 25-34', '2024-05-23 14:16:49'),
(2, 1, 200, 100, 20, 150, 50, 'São Paulo, Rio de Janeiro', 'M 18-24, F 25-34', '2024-05-23 14:24:03'),
(3, 2, 250, 120, 25, 180, 70, 'Belo Horizonte, Curitiba', 'M 25-34, F 35-44', '2024-05-23 14:24:03'),
(4, 3, 300, 150, 30, 200, 100, 'Porto Alegre, Salvador', 'M 18-24, F 18-24', '2024-05-23 14:24:03');

-- --------------------------------------------------------

--
-- Estrutura da tabela `projects_stats_snapshot`
--

CREATE TABLE `projects_stats_snapshot` (
  `id_snapshot` int(11) NOT NULL,
  `data` date DEFAULT NULL,
  `id_projeto` int(11) DEFAULT NULL,
  `impressions` int(11) DEFAULT NULL,
  `likes` int(11) DEFAULT NULL,
  `comments` int(11) DEFAULT NULL,
  `organic` int(11) DEFAULT NULL,
  `nao_organico` int(11) DEFAULT NULL,
  `localizacoes` text DEFAULT NULL,
  `dados_demograficos` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `projects_stats_snapshot`
--

INSERT INTO `projects_stats_snapshot` (`id_snapshot`, `data`, `id_projeto`, `impressions`, `likes`, `comments`, `organic`, `nao_organico`, `localizacoes`, `dados_demograficos`) VALUES
(1, '2023-05-24', 1, 50585, 56755, 3917, 92481, -92381, 'Local841', 'homens16599, mulheres21463'),
(2, '2023-05-25', 1, 23948, 67863, 2978, 26687, -26587, 'Local402', 'homens25415, mulheres6862'),
(3, '2023-05-26', 1, 55273, 14145, 2867, 50279, -50179, 'Local600', 'homens14819, mulheres8781'),
(4, '2023-05-27', 1, 83361, 33383, 1046, 44281, -44181, 'Local266', 'homens27892, mulheres7942'),
(5, '2023-05-28', 1, 10907, 64578, 8768, 93540, -93440, 'Local602', 'homens11594, mulheres23220'),
(6, '2023-05-29', 1, 66843, 80827, 8014, 90165, -90065, 'Local723', 'homens14727, mulheres6251'),
(7, '2023-05-30', 1, 65130, 33882, 8003, 59155, -59055, 'Local397', 'homens28352, mulheres28697'),
(8, '2023-05-31', 1, 3576, 32689, 9603, 66102, -66002, 'Local899', 'homens2156, mulheres4206'),
(9, '2023-06-01', 1, 74939, 89746, 3196, 30108, -30008, 'Local669', 'homens1969, mulheres5151'),
(10, '2023-06-02', 1, 21937, 5934, 9148, 32800, -32700, 'Local496', 'homens12427, mulheres5115'),
(11, '2023-06-03', 1, 37510, 19255, 2361, 67687, -67587, 'Local938', 'homens26786, mulheres27079'),
(12, '2023-06-04', 1, 38305, 46637, 7185, 76811, -76711, 'Local977', 'homens14670, mulheres28389'),
(13, '2023-06-05', 1, 99897, 33959, 9490, 5291, -5191, 'Local758', 'homens25786, mulheres28584'),
(14, '2023-06-06', 1, 92808, 9808, 6472, 80463, -80363, 'Local181', 'homens6330, mulheres4149'),
(15, '2023-06-07', 1, 16690, 73350, 9244, 78424, -78324, 'Local145', 'homens3879, mulheres1831'),
(16, '2023-06-08', 1, 97679, 76502, 6859, 71598, -71498, 'Local633', 'homens19028, mulheres22339'),
(17, '2023-06-09', 1, 89346, 12141, 6346, 12140, -12040, 'Local320', 'homens10577, mulheres19564'),
(18, '2023-06-10', 1, 92455, 29438, 9881, 6857, -6757, 'Local569', 'homens14362, mulheres9349'),
(19, '2023-06-11', 1, 13692, 53404, 6847, 38950, -38850, 'Local691', 'homens25574, mulheres29712'),
(20, '2023-06-12', 1, 82364, 68940, 3792, 24643, -24543, 'Local131', 'homens7613, mulheres21906'),
(21, '2023-06-13', 1, 80798, 45076, 3078, 88469, -88369, 'Local905', 'homens15221, mulheres4959'),
(22, '2023-06-14', 1, 31863, 88751, 2910, 92915, -92815, 'Local138', 'homens10783, mulheres22828'),
(23, '2023-06-15', 1, 97472, 27922, 9220, 88608, -88508, 'Local642', 'homens18910, mulheres19313'),
(24, '2023-06-16', 1, 95179, 60861, 8435, 40666, -40566, 'Local883', 'homens17576, mulheres1376'),
(25, '2023-06-17', 1, 10039, 89739, 1472, 37297, -37197, 'Local853', 'homens17251, mulheres12726'),
(26, '2023-06-18', 1, 58700, 59477, 1739, 73642, -73542, 'Local306', 'homens1584, mulheres3089'),
(27, '2023-06-19', 1, 51, 29384, 1249, 77132, -77032, 'Local299', 'homens18131, mulheres22444'),
(28, '2023-06-20', 1, 67171, 47529, 7099, 31582, -31482, 'Local849', 'homens12368, mulheres7882'),
(29, '2023-06-21', 1, 42896, 46799, 3373, 70951, -70851, 'Local683', 'homens3126, mulheres21168'),
(30, '2023-06-22', 1, 49636, 86847, 4578, 79832, -79732, 'Local502', 'homens6371, mulheres24003'),
(31, '2023-06-23', 1, 78965, 54340, 2404, 75536, -75436, 'Local631', 'homens18190, mulheres12554'),
(32, '2023-06-24', 1, 69177, 59904, 4211, 979, -879, 'Local200', 'homens20308, mulheres12606'),
(33, '2023-06-25', 1, 70524, 53260, 4448, 47026, -46926, 'Local971', 'homens21976, mulheres22660'),
(34, '2023-06-26', 1, 96857, 33910, 3666, 81408, -81308, 'Local694', 'homens21113, mulheres6369'),
(35, '2023-06-27', 1, 26049, 75861, 1127, 76729, -76629, 'Local819', 'homens8386, mulheres9202'),
(36, '2023-06-28', 1, 80659, 60281, 6682, 600, -500, 'Local938', 'homens17091, mulheres20922'),
(37, '2023-06-29', 1, 24012, 80146, 4865, 41848, -41748, 'Local44', 'homens6850, mulheres20671'),
(38, '2023-06-30', 1, 57256, 29645, 1117, 1168, -1068, 'Local118', 'homens26957, mulheres20959'),
(39, '2023-07-01', 1, 97033, 26445, 905, 34354, -34254, 'Local468', 'homens16881, mulheres23320'),
(40, '2023-07-02', 1, 17052, 21722, 8663, 46799, -46699, 'Local666', 'homens28838, mulheres54'),
(41, '2023-07-03', 1, 85624, 8672, 5605, 40624, -40524, 'Local40', 'homens14877, mulheres7803'),
(42, '2023-07-04', 1, 50733, 27757, 7119, 25515, -25415, 'Local664', 'homens24070, mulheres15614'),
(43, '2023-07-05', 1, 210, 33091, 682, 14115, -14015, 'Local163', 'homens5053, mulheres1338'),
(44, '2023-07-06', 1, 3788, 10551, 7362, 33641, -33541, 'Local127', 'homens11830, mulheres26409'),
(45, '2023-07-07', 1, 99764, 30211, 3314, 9112, -9012, 'Local170', 'homens10699, mulheres25257'),
(46, '2023-07-08', 1, 52211, 61696, 9369, 68139, -68039, 'Local878', 'homens12849, mulheres1527'),
(47, '2023-07-09', 1, 86029, 34940, 3049, 5322, -5222, 'Local120', 'homens23822, mulheres21690'),
(48, '2023-07-10', 1, 73077, 5475, 7745, 48285, -48185, 'Local938', 'homens8724, mulheres10091'),
(49, '2023-07-11', 1, 52665, 45327, 283, 23704, -23604, 'Local936', 'homens28921, mulheres27338'),
(50, '2023-07-12', 1, 14701, 95102, 6581, 81333, -81233, 'Local582', 'homens209, mulheres26161'),
(51, '2023-07-13', 1, 47842, 62117, 6897, 88154, -88054, 'Local401', 'homens7374, mulheres15705'),
(52, '2023-07-14', 1, 28717, 83635, 2451, 59692, -59592, 'Local202', 'homens21717, mulheres17964'),
(53, '2023-07-15', 1, 56102, 51175, 3018, 42493, -42393, 'Local777', 'homens2186, mulheres4846'),
(54, '2023-07-16', 1, 14899, 9854, 6459, 63608, -63508, 'Local593', 'homens14863, mulheres19667'),
(55, '2023-07-17', 1, 35919, 83783, 6655, 44966, -44866, 'Local816', 'homens5346, mulheres2679'),
(56, '2023-07-18', 1, 66033, 93329, 5932, 86681, -86581, 'Local904', 'homens26739, mulheres3047'),
(57, '2023-07-19', 1, 38251, 70855, 3230, 66186, -66086, 'Local867', 'homens8907, mulheres9976'),
(58, '2023-07-20', 1, 58028, 2610, 6012, 47764, -47664, 'Local154', 'homens12873, mulheres19140'),
(59, '2023-07-21', 1, 48972, 14613, 1788, 63621, -63521, 'Local21', 'homens29421, mulheres2919'),
(60, '2023-07-22', 1, 10213, 28796, 2134, 42720, -42620, 'Local322', 'homens7925, mulheres25740'),
(61, '2023-07-23', 1, 61727, 78873, 4587, 9583, -9483, 'Local188', 'homens1233, mulheres5927'),
(62, '2023-07-24', 1, 38699, 4433, 8141, 83368, -83268, 'Local678', 'homens5237, mulheres156'),
(63, '2023-07-25', 1, 95862, 13662, 2201, 25436, -25336, 'Local427', 'homens22458, mulheres21714'),
(64, '2023-07-26', 1, 91314, 9247, 7113, 55755, -55655, 'Local464', 'homens26096, mulheres6140'),
(65, '2023-07-27', 1, 4808, 56026, 2976, 43982, -43882, 'Local429', 'homens28845, mulheres18185'),
(66, '2023-07-28', 1, 73572, 51043, 8967, 26843, -26743, 'Local398', 'homens10530, mulheres9104'),
(67, '2023-07-29', 1, 70754, 62193, 5651, 94197, -94097, 'Local706', 'homens4699, mulheres16230'),
(68, '2023-07-30', 1, 24558, 47082, 2211, 45465, -45365, 'Local370', 'homens20698, mulheres22910'),
(69, '2023-07-31', 1, 45170, 56256, 7495, 50104, -50004, 'Local209', 'homens8823, mulheres14104'),
(70, '2023-08-01', 1, 52937, 42760, 624, 89250, -89150, 'Local747', 'homens7934, mulheres1847'),
(71, '2023-08-02', 1, 71983, 12014, 4370, 41872, -41772, 'Local732', 'homens1470, mulheres40'),
(72, '2023-08-03', 1, 91565, 76805, 1427, 79991, -79891, 'Local889', 'homens15715, mulheres28213'),
(73, '2023-08-04', 1, 52811, 41524, 6086, 55289, -55189, 'Local717', 'homens21149, mulheres25603'),
(74, '2023-08-05', 1, 50644, 57914, 4423, 66658, -66558, 'Local231', 'homens19965, mulheres21099'),
(75, '2023-08-06', 1, 79370, 30690, 342, 62782, -62682, 'Local428', 'homens26293, mulheres5398'),
(76, '2023-08-07', 1, 29207, 69367, 2362, 92738, -92638, 'Local926', 'homens2358, mulheres11843'),
(77, '2023-08-08', 1, 70001, 1029, 4746, 29934, -29834, 'Local644', 'homens24097, mulheres12394'),
(78, '2023-08-09', 1, 5163, 82182, 1596, 80752, -80652, 'Local152', 'homens21133, mulheres22149'),
(79, '2023-08-10', 1, 61386, 12567, 9257, 15165, -15065, 'Local787', 'homens5269, mulheres26056'),
(80, '2023-08-11', 1, 37481, 62118, 9099, 14818, -14718, 'Local220', 'homens17814, mulheres5447'),
(81, '2023-08-12', 1, 58381, 93778, 2299, 5588, -5488, 'Local471', 'homens11785, mulheres8019'),
(82, '2023-08-13', 1, 78805, 58279, 9777, 55871, -55771, 'Local548', 'homens27412, mulheres17235'),
(83, '2023-08-14', 1, 51151, 87925, 3264, 52881, -52781, 'Local17', 'homens27190, mulheres25342'),
(84, '2023-08-15', 1, 28110, 94231, 3427, 96142, -96042, 'Local428', 'homens12223, mulheres20018'),
(85, '2023-08-16', 1, 59276, 83391, 2287, 71433, -71333, 'Local638', 'homens23476, mulheres17695'),
(86, '2023-08-17', 1, 11665, 3957, 1594, 80294, -80194, 'Local293', 'homens7731, mulheres27338'),
(87, '2023-08-18', 1, 38025, 56107, 5655, 27080, -26980, 'Local385', 'homens24546, mulheres5599'),
(88, '2023-08-19', 1, 46301, 26526, 7398, 79560, -79460, 'Local517', 'homens29416, mulheres12052'),
(89, '2023-08-20', 1, 16553, 71229, 109, 70495, -70395, 'Local177', 'homens13315, mulheres7924'),
(90, '2023-08-21', 1, 95501, 42564, 1959, 78985, -78885, 'Local180', 'homens27822, mulheres4848'),
(91, '2023-08-22', 1, 72013, 22900, 4308, 74329, -74229, 'Local440', 'homens13543, mulheres20301'),
(92, '2023-08-23', 1, 26307, 9019, 534, 7727, -7627, 'Local612', 'homens13919, mulheres19923'),
(93, '2023-08-24', 1, 84725, 97207, 6191, 41784, -41684, 'Local255', 'homens13764, mulheres28246'),
(94, '2023-08-25', 1, 9243, 37362, 4432, 62041, -61941, 'Local227', 'homens8209, mulheres22547'),
(95, '2023-08-26', 1, 59679, 49069, 8388, 85840, -85740, 'Local468', 'homens9375, mulheres4862'),
(96, '2023-08-27', 1, 19477, 40800, 5401, 33719, -33619, 'Local456', 'homens25573, mulheres7039'),
(97, '2023-08-28', 1, 72561, 50022, 4331, 67809, -67709, 'Local862', 'homens16570, mulheres25494'),
(98, '2023-08-29', 1, 63347, 88783, 9101, 14241, -14141, 'Local225', 'homens15903, mulheres25308'),
(99, '2023-08-30', 1, 51844, 87784, 6201, 74177, -74077, 'Local26', 'homens1241, mulheres10227'),
(100, '2023-08-31', 1, 87555, 66910, 7994, 78909, -78809, 'Local217', 'homens11770, mulheres11194'),
(101, '2023-09-01', 1, 5003, 88620, 7802, 89645, -89545, 'Local905', 'homens15564, mulheres15679'),
(102, '2023-09-02', 1, 78108, 53390, 6753, 92548, -92448, 'Local595', 'homens195, mulheres24947'),
(103, '2023-09-03', 1, 59081, 54459, 6764, 84010, -83910, 'Local315', 'homens542, mulheres8834'),
(104, '2023-09-04', 1, 62787, 38583, 2311, 70975, -70875, 'Local44', 'homens9615, mulheres5715'),
(105, '2023-09-05', 1, 3231, 66507, 8328, 71846, -71746, 'Local662', 'homens23742, mulheres15870'),
(106, '2023-09-06', 1, 87922, 62282, 7875, 37983, -37883, 'Local598', 'homens19458, mulheres25905'),
(107, '2023-09-07', 1, 24972, 33796, 5196, 1014, -914, 'Local906', 'homens24890, mulheres20814'),
(108, '2023-09-08', 1, 42389, 37822, 8983, 55089, -54989, 'Local884', 'homens11585, mulheres2823'),
(109, '2023-09-09', 1, 52230, 86370, 5257, 40413, -40313, 'Local890', 'homens19954, mulheres17769'),
(110, '2023-09-10', 1, 27906, 63065, 3953, 64021, -63921, 'Local689', 'homens24967, mulheres262'),
(111, '2023-09-11', 1, 2833, 21904, 6864, 54367, -54267, 'Local859', 'homens9080, mulheres9129'),
(112, '2023-09-12', 1, 30457, 7689, 1995, 95302, -95202, 'Local876', 'homens18462, mulheres16027'),
(113, '2023-09-13', 1, 99391, 50308, 7162, 87870, -87770, 'Local81', 'homens6682, mulheres11626'),
(114, '2023-09-14', 1, 43029, 23008, 3140, 50524, -50424, 'Local610', 'homens19900, mulheres9820'),
(115, '2023-09-15', 1, 36976, 98364, 9738, 6990, -6890, 'Local685', 'homens17468, mulheres7646'),
(116, '2023-09-16', 1, 17740, 52035, 451, 58643, -58543, 'Local290', 'homens23142, mulheres20768'),
(117, '2023-09-17', 1, 75959, 38095, 8115, 94716, -94616, 'Local165', 'homens17640, mulheres26832'),
(118, '2023-09-18', 1, 90938, 99148, 7685, 88153, -88053, 'Local900', 'homens4300, mulheres20634'),
(119, '2023-09-19', 1, 352, 81363, 5194, 91403, -91303, 'Local77', 'homens5117, mulheres26462'),
(120, '2023-09-20', 1, 84489, 29389, 2142, 69739, -69639, 'Local640', 'homens16406, mulheres26525'),
(121, '2023-09-21', 1, 75234, 93872, 1262, 60815, -60715, 'Local21', 'homens24183, mulheres4987'),
(122, '2023-09-22', 1, 74398, 89490, 6638, 39247, -39147, 'Local520', 'homens3161, mulheres4443'),
(123, '2023-09-23', 1, 7263, 62212, 5022, 45863, -45763, 'Local676', 'homens26595, mulheres13748'),
(124, '2023-09-24', 1, 88777, 759, 1609, 99571, -99471, 'Local707', 'homens1942, mulheres13799'),
(125, '2023-09-25', 1, 67353, 92952, 7340, 16019, -15919, 'Local613', 'homens5900, mulheres16027'),
(126, '2023-09-26', 1, 8894, 41144, 4724, 55614, -55514, 'Local161', 'homens8774, mulheres16058'),
(127, '2023-09-27', 1, 96939, 58424, 3737, 80508, -80408, 'Local130', 'homens13572, mulheres15397'),
(128, '2023-09-28', 1, 11346, 30410, 9171, 33347, -33247, 'Local104', 'homens11918, mulheres22092'),
(129, '2023-09-29', 1, 83907, 32165, 2623, 36596, -36496, 'Local549', 'homens16943, mulheres14373'),
(130, '2023-09-30', 1, 45977, 6963, 9129, 25568, -25468, 'Local37', 'homens28711, mulheres13802'),
(131, '2023-10-01', 1, 99434, 79051, 406, 43912, -43812, 'Local198', 'homens296, mulheres27754'),
(132, '2023-10-02', 1, 36514, 64084, 6648, 65699, -65599, 'Local737', 'homens20186, mulheres15042'),
(133, '2023-10-03', 1, 16632, 10976, 1867, 23975, -23875, 'Local826', 'homens24967, mulheres8090'),
(134, '2023-10-04', 1, 43070, 53532, 9798, 37118, -37018, 'Local608', 'homens23835, mulheres24459'),
(135, '2023-10-05', 1, 42991, 6442, 1233, 40451, -40351, 'Local921', 'homens3556, mulheres13474'),
(136, '2023-10-06', 1, 8930, 7854, 9759, 62395, -62295, 'Local568', 'homens1897, mulheres7554'),
(137, '2023-10-07', 1, 27952, 93068, 3754, 18267, -18167, 'Local185', 'homens15360, mulheres22817'),
(138, '2023-10-08', 1, 47425, 40845, 7902, 95442, -95342, 'Local112', 'homens25181, mulheres17685'),
(139, '2023-10-09', 1, 57095, 69388, 1712, 83430, -83330, 'Local328', 'homens14518, mulheres600'),
(140, '2023-10-10', 1, 8901, 76605, 4787, 14916, -14816, 'Local55', 'homens7795, mulheres8128'),
(141, '2023-10-11', 1, 33545, 99817, 2472, 21073, -20973, 'Local548', 'homens8943, mulheres23320'),
(142, '2023-10-12', 1, 10703, 68830, 8898, 70952, -70852, 'Local918', 'homens7491, mulheres26030'),
(143, '2023-10-13', 1, 46083, 48433, 3855, 87899, -87799, 'Local743', 'homens26032, mulheres14560'),
(144, '2023-10-14', 1, 41784, 48976, 9023, 62338, -62238, 'Local571', 'homens7257, mulheres3353'),
(145, '2023-10-15', 1, 57494, 87083, 7140, 72880, -72780, 'Local488', 'homens23009, mulheres12826'),
(146, '2023-10-16', 1, 10085, 408, 5791, 96519, -96419, 'Local732', 'homens2370, mulheres22527'),
(147, '2023-10-17', 1, 18299, 86670, 3977, 39415, -39315, 'Local692', 'homens10317, mulheres12974'),
(148, '2023-10-18', 1, 47181, 17608, 1984, 23481, -23381, 'Local105', 'homens22341, mulheres3191'),
(149, '2023-10-19', 1, 48533, 81578, 8079, 43493, -43393, 'Local836', 'homens28855, mulheres3637'),
(150, '2023-10-20', 1, 45747, 46754, 9300, 78649, -78549, 'Local408', 'homens14128, mulheres12894'),
(151, '2023-10-21', 1, 90314, 37489, 4598, 77668, -77568, 'Local921', 'homens7519, mulheres15296'),
(152, '2023-10-22', 1, 9768, 25344, 2326, 95627, -95527, 'Local907', 'homens5587, mulheres8409'),
(153, '2023-10-23', 1, 20169, 46823, 23, 25967, -25867, 'Local296', 'homens4748, mulheres25372'),
(154, '2023-10-24', 1, 63463, 25480, 5259, 23144, -23044, 'Local127', 'homens1833, mulheres28181'),
(155, '2023-10-25', 1, 72743, 51901, 2743, 19450, -19350, 'Local973', 'homens21641, mulheres27855'),
(156, '2023-10-26', 1, 90102, 78781, 1672, 17499, -17399, 'Local518', 'homens23687, mulheres1694'),
(157, '2023-10-27', 1, 83493, 51674, 5700, 23095, -22995, 'Local151', 'homens19458, mulheres21362'),
(158, '2023-10-28', 1, 10509, 1275, 910, 53495, -53395, 'Local706', 'homens14865, mulheres8133'),
(159, '2023-10-29', 1, 81875, 80868, 4260, 44815, -44715, 'Local112', 'homens18402, mulheres13033'),
(160, '2023-10-30', 1, 31365, 44832, 4352, 430, -330, 'Local634', 'homens25907, mulheres20063'),
(161, '2023-10-31', 1, 99945, 52339, 261, 56150, -56050, 'Local916', 'homens27557, mulheres5129'),
(162, '2023-11-01', 1, 45163, 31359, 8255, 75821, -75721, 'Local622', 'homens18481, mulheres10647'),
(163, '2023-11-02', 1, 2989, 39201, 1025, 50370, -50270, 'Local36', 'homens14845, mulheres14446'),
(164, '2023-11-03', 1, 95761, 27389, 2710, 29979, -29879, 'Local464', 'homens12204, mulheres26697'),
(165, '2023-11-04', 1, 73374, 14528, 1953, 88432, -88332, 'Local970', 'homens28351, mulheres7330'),
(166, '2023-11-05', 1, 23501, 10222, 456, 30723, -30623, 'Local337', 'homens26909, mulheres17768'),
(167, '2023-11-06', 1, 80589, 78420, 4307, 3380, -3280, 'Local154', 'homens3419, mulheres21289'),
(168, '2023-11-07', 1, 40181, 55555, 5157, 25781, -25681, 'Local521', 'homens9894, mulheres29733'),
(169, '2023-11-08', 1, 90590, 35642, 3609, 65215, -65115, 'Local734', 'homens14175, mulheres16711'),
(170, '2023-11-09', 1, 94187, 25545, 3736, 582, -482, 'Local627', 'homens11817, mulheres8380'),
(171, '2023-11-10', 1, 48284, 8513, 4642, 8271, -8171, 'Local18', 'homens5386, mulheres9891'),
(172, '2023-11-11', 1, 11660, 46843, 9518, 71115, -71015, 'Local398', 'homens24135, mulheres28686'),
(173, '2023-11-12', 1, 32625, 69114, 9273, 68500, -68400, 'Local941', 'homens4610, mulheres9793'),
(174, '2023-11-13', 1, 10041, 64833, 6260, 19403, -19303, 'Local175', 'homens16597, mulheres6154'),
(175, '2023-11-14', 1, 34651, 41553, 7146, 52676, -52576, 'Local644', 'homens24720, mulheres24066'),
(176, '2023-11-15', 1, 40956, 40972, 8391, 43132, -43032, 'Local358', 'homens15410, mulheres4195'),
(177, '2023-11-16', 1, 37914, 835, 6431, 3105, -3005, 'Local161', 'homens24927, mulheres20487'),
(178, '2023-11-17', 1, 23086, 24947, 1554, 97743, -97643, 'Local952', 'homens19319, mulheres15091'),
(179, '2023-11-18', 1, 27631, 12332, 6097, 696, -596, 'Local910', 'homens2017, mulheres17282'),
(180, '2023-11-19', 1, 69885, 2332, 481, 12650, -12550, 'Local64', 'homens4954, mulheres17489'),
(181, '2023-11-20', 1, 76088, 6023, 7041, 28891, -28791, 'Local972', 'homens3996, mulheres16033'),
(182, '2023-11-21', 1, 60829, 68895, 6477, 94821, -94721, 'Local828', 'homens7923, mulheres16114'),
(183, '2023-11-22', 1, 99373, 40283, 3356, 39449, -39349, 'Local967', 'homens16577, mulheres17046'),
(184, '2023-11-23', 1, 61241, 95753, 6459, 62170, -62070, 'Local705', 'homens21346, mulheres16340'),
(185, '2023-11-24', 1, 38257, 26132, 287, 2465, -2365, 'Local981', 'homens1372, mulheres6829'),
(186, '2023-11-25', 1, 35936, 73211, 5458, 86931, -86831, 'Local253', 'homens11124, mulheres27348'),
(187, '2023-11-26', 1, 95277, 76696, 1065, 14613, -14513, 'Local355', 'homens1076, mulheres21431'),
(188, '2023-11-27', 1, 26962, 20197, 1058, 59937, -59837, 'Local967', 'homens23826, mulheres9154'),
(189, '2023-11-28', 1, 86391, 6158, 375, 38850, -38750, 'Local890', 'homens4430, mulheres19563'),
(190, '2023-11-29', 1, 7902, 86622, 3638, 60190, -60090, 'Local621', 'homens29887, mulheres20478'),
(191, '2023-11-30', 1, 29464, 67993, 2417, 9642, -9542, 'Local761', 'homens3219, mulheres23927'),
(192, '2023-12-01', 1, 31643, 10222, 5623, 92574, -92474, 'Local112', 'homens1743, mulheres7015'),
(193, '2023-12-02', 1, 25666, 55140, 3850, 67478, -67378, 'Local323', 'homens22652, mulheres25392'),
(194, '2023-12-03', 1, 97064, 97292, 8825, 74948, -74848, 'Local417', 'homens14063, mulheres29410'),
(195, '2023-12-04', 1, 71330, 7160, 9704, 57264, -57164, 'Local576', 'homens22906, mulheres26276'),
(196, '2023-12-05', 1, 41538, 63387, 7612, 22340, -22240, 'Local457', 'homens28810, mulheres22702'),
(197, '2023-12-06', 1, 58380, 53411, 436, 99012, -98912, 'Local503', 'homens12564, mulheres21005'),
(198, '2023-12-07', 1, 61149, 55543, 9887, 25753, -25653, 'Local585', 'homens10341, mulheres20977'),
(199, '2023-12-08', 1, 66582, 69983, 6072, 991, -891, 'Local532', 'homens21220, mulheres16145'),
(200, '2023-12-09', 1, 43096, 87802, 176, 72521, -72421, 'Local569', 'homens7229, mulheres9205'),
(201, '2023-12-10', 1, 45604, 92313, 2615, 99150, -99050, 'Local690', 'homens17708, mulheres25735'),
(202, '2023-12-11', 1, 84186, 16736, 3621, 16866, -16766, 'Local775', 'homens11901, mulheres21490'),
(203, '2023-12-12', 1, 97163, 27620, 7281, 65588, -65488, 'Local803', 'homens28400, mulheres28552'),
(204, '2023-12-13', 1, 61504, 45561, 148, 21166, -21066, 'Local851', 'homens27658, mulheres2547'),
(205, '2023-12-14', 1, 94220, 77658, 7653, 30626, -30526, 'Local722', 'homens2576, mulheres9726'),
(206, '2023-12-15', 1, 16267, 83955, 8573, 42875, -42775, 'Local929', 'homens17561, mulheres16970'),
(207, '2023-12-16', 1, 21884, 2959, 4315, 74422, -74322, 'Local780', 'homens16477, mulheres13895'),
(208, '2023-12-17', 1, 66241, 53391, 8556, 97397, -97297, 'Local826', 'homens18596, mulheres7130'),
(209, '2023-12-18', 1, 38631, 73284, 4789, 11864, -11764, 'Local609', 'homens17334, mulheres5599'),
(210, '2023-12-19', 1, 96994, 72420, 1658, 65538, -65438, 'Local395', 'homens23113, mulheres5132'),
(211, '2023-12-20', 1, 97955, 75706, 7361, 30851, -30751, 'Local273', 'homens29083, mulheres11981'),
(212, '2023-12-21', 1, 9377, 33846, 4664, 76699, -76599, 'Local538', 'homens12742, mulheres3448'),
(213, '2023-12-22', 1, 15497, 34250, 6936, 76747, -76647, 'Local642', 'homens18295, mulheres17785'),
(214, '2023-12-23', 1, 55733, 41373, 2971, 52292, -52192, 'Local608', 'homens28622, mulheres7528'),
(215, '2023-12-24', 1, 57436, 17575, 8429, 66933, -66833, 'Local154', 'homens19014, mulheres25734'),
(216, '2023-12-25', 1, 37133, 56836, 4602, 89382, -89282, 'Local416', 'homens16412, mulheres26377'),
(217, '2023-12-26', 1, 23462, 55269, 9873, 40671, -40571, 'Local488', 'homens17413, mulheres11694'),
(218, '2023-12-27', 1, 972, 21016, 668, 6310, -6210, 'Local796', 'homens18992, mulheres4750'),
(219, '2023-12-28', 1, 74678, 73879, 2179, 89285, -89185, 'Local649', 'homens1707, mulheres13027'),
(220, '2023-12-29', 1, 44704, 87848, 6910, 72304, -72204, 'Local457', 'homens15515, mulheres9925'),
(221, '2023-12-30', 1, 93815, 26235, 7521, 77762, -77662, 'Local72', 'homens10603, mulheres6445'),
(222, '2023-12-31', 1, 25941, 70328, 35, 67455, -67355, 'Local262', 'homens10033, mulheres28210'),
(223, '2024-01-01', 1, 39679, 35803, 9824, 36103, -36003, 'Local485', 'homens7328, mulheres2483'),
(224, '2024-01-02', 1, 27641, 49570, 9408, 34771, -34671, 'Local17', 'homens14650, mulheres8762'),
(225, '2024-01-03', 1, 70839, 36014, 5201, 50957, -50857, 'Local898', 'homens25123, mulheres16603'),
(226, '2024-01-04', 1, 3213, 89844, 1830, 27576, -27476, 'Local387', 'homens21679, mulheres3595'),
(227, '2024-01-05', 1, 70920, 9112, 2710, 20810, -20710, 'Local819', 'homens1152, mulheres14557'),
(228, '2024-01-06', 1, 86581, 24824, 1287, 56510, -56410, 'Local565', 'homens9154, mulheres17013'),
(229, '2024-01-07', 1, 93630, 41947, 1618, 55453, -55353, 'Local800', 'homens7354, mulheres10599'),
(230, '2024-01-08', 1, 1765, 63855, 8288, 58452, -58352, 'Local820', 'homens26626, mulheres10779'),
(231, '2024-01-09', 1, 39950, 38973, 5259, 86738, -86638, 'Local676', 'homens15702, mulheres29710'),
(232, '2024-01-10', 1, 70670, 63844, 673, 87056, -86956, 'Local989', 'homens15577, mulheres17642'),
(233, '2024-01-11', 1, 11692, 5860, 2518, 5968, -5868, 'Local643', 'homens21154, mulheres26611'),
(234, '2024-01-12', 1, 62572, 45173, 8200, 12785, -12685, 'Local173', 'homens3496, mulheres20347'),
(235, '2024-01-13', 1, 45391, 64042, 6972, 49810, -49710, 'Local517', 'homens9130, mulheres15533'),
(236, '2024-01-14', 1, 9209, 57033, 6244, 57058, -56958, 'Local187', 'homens15714, mulheres4585'),
(237, '2024-01-15', 1, 454, 78935, 2975, 29759, -29659, 'Local682', 'homens17380, mulheres11313'),
(238, '2024-01-16', 1, 88587, 25685, 2103, 14320, -14220, 'Local917', 'homens17911, mulheres18108'),
(239, '2024-01-17', 1, 98672, 46404, 9877, 45427, -45327, 'Local211', 'homens7728, mulheres21570'),
(240, '2024-01-18', 1, 56289, 64307, 850, 90117, -90017, 'Local453', 'homens4986, mulheres1745'),
(241, '2024-01-19', 1, 10972, 45554, 114, 1072, -972, 'Local367', 'homens440, mulheres27329'),
(242, '2024-01-20', 1, 49446, 55056, 829, 90065, -89965, 'Local958', 'homens20467, mulheres5684'),
(243, '2024-01-21', 1, 93060, 31496, 9724, 28624, -28524, 'Local972', 'homens12532, mulheres6001'),
(244, '2024-01-22', 1, 54256, 57140, 6078, 32716, -32616, 'Local46', 'homens8018, mulheres6100'),
(245, '2024-01-23', 1, 41343, 63995, 9685, 71959, -71859, 'Local78', 'homens11748, mulheres7543'),
(246, '2024-01-24', 1, 14536, 92731, 6383, 81474, -81374, 'Local129', 'homens15748, mulheres11034'),
(247, '2024-01-25', 1, 42436, 6957, 4429, 37711, -37611, 'Local852', 'homens6236, mulheres7761'),
(248, '2024-01-26', 1, 28698, 72755, 3012, 67911, -67811, 'Local224', 'homens14271, mulheres18658'),
(249, '2024-01-27', 1, 97243, 76859, 4206, 80802, -80702, 'Local162', 'homens19492, mulheres22680'),
(250, '2024-01-28', 1, 70273, 1793, 756, 53389, -53289, 'Local124', 'homens18700, mulheres10739'),
(251, '2024-01-29', 1, 4714, 53445, 449, 96496, -96396, 'Local486', 'homens5390, mulheres26606'),
(252, '2024-01-30', 1, 40471, 36160, 4345, 59096, -58996, 'Local583', 'homens11756, mulheres17519'),
(253, '2024-01-31', 1, 11359, 25499, 455, 34745, -34645, 'Local687', 'homens26672, mulheres29352'),
(254, '2024-02-01', 1, 24667, 31508, 904, 38562, -38462, 'Local636', 'homens1312, mulheres15546'),
(255, '2024-02-02', 1, 49458, 54096, 187, 46587, -46487, 'Local208', 'homens20854, mulheres15176'),
(256, '2024-02-03', 1, 64266, 58449, 8468, 59639, -59539, 'Local548', 'homens9879, mulheres22974'),
(257, '2024-02-04', 1, 58121, 79218, 6435, 75028, -74928, 'Local68', 'homens15121, mulheres16660'),
(258, '2024-02-05', 1, 75304, 15947, 5971, 20156, -20056, 'Local909', 'homens25287, mulheres8765'),
(259, '2024-02-06', 1, 80519, 214, 7762, 79348, -79248, 'Local784', 'homens12473, mulheres22226'),
(260, '2024-02-07', 1, 25875, 89341, 3821, 92451, -92351, 'Local829', 'homens4203, mulheres471'),
(261, '2024-02-08', 1, 42634, 40773, 2407, 80865, -80765, 'Local351', 'homens17697, mulheres29038'),
(262, '2024-02-09', 1, 62075, 70744, 8763, 75075, -74975, 'Local823', 'homens7044, mulheres17135'),
(263, '2024-02-10', 1, 38586, 87666, 1082, 26891, -26791, 'Local205', 'homens12400, mulheres22735'),
(264, '2024-02-11', 1, 99357, 8532, 1357, 54007, -53907, 'Local981', 'homens22481, mulheres18796'),
(265, '2024-02-12', 1, 62915, 24947, 3584, 20996, -20896, 'Local204', 'homens16746, mulheres12968'),
(266, '2024-02-13', 1, 57232, 38678, 7732, 85901, -85801, 'Local850', 'homens4261, mulheres12188'),
(267, '2024-02-14', 1, 90844, 28812, 8617, 67345, -67245, 'Local322', 'homens8333, mulheres17078'),
(268, '2024-02-15', 1, 71301, 40839, 7658, 98387, -98287, 'Local428', 'homens16918, mulheres19427'),
(269, '2024-02-16', 1, 40035, 76314, 6215, 23747, -23647, 'Local854', 'homens11014, mulheres5403'),
(270, '2024-02-17', 1, 22818, 71835, 9759, 17899, -17799, 'Local778', 'homens8924, mulheres9593'),
(271, '2024-02-18', 1, 71934, 72614, 5118, 57758, -57658, 'Local751', 'homens21916, mulheres17517'),
(272, '2024-02-19', 1, 13390, 97059, 4597, 44261, -44161, 'Local656', 'homens24043, mulheres29451'),
(273, '2024-02-20', 1, 68280, 13420, 5695, 90949, -90849, 'Local128', 'homens25908, mulheres13666'),
(274, '2024-02-21', 1, 42035, 3931, 9717, 32473, -32373, 'Local266', 'homens23647, mulheres2823'),
(275, '2024-02-22', 1, 47060, 89455, 7456, 90649, -90549, 'Local690', 'homens1972, mulheres8529'),
(276, '2024-02-23', 1, 41690, 85845, 6733, 61056, -60956, 'Local387', 'homens17598, mulheres12251'),
(277, '2024-02-24', 1, 70600, 78329, 1482, 89779, -89679, 'Local687', 'homens27144, mulheres9313'),
(278, '2024-02-25', 1, 67700, 398, 3947, 28515, -28415, 'Local238', 'homens5618, mulheres14599'),
(279, '2024-02-26', 1, 24250, 63982, 7235, 39491, -39391, 'Local852', 'homens13034, mulheres7096'),
(280, '2024-02-27', 1, 68700, 97139, 9595, 49016, -48916, 'Local450', 'homens7473, mulheres26863'),
(281, '2024-02-28', 1, 66316, 95038, 6854, 92436, -92336, 'Local294', 'homens15994, mulheres8867'),
(282, '2024-02-29', 1, 55881, 15243, 9531, 82931, -82831, 'Local720', 'homens1390, mulheres15733'),
(283, '2024-03-01', 1, 84691, 48356, 9423, 4757, -4657, 'Local888', 'homens1640, mulheres6962'),
(284, '2024-03-02', 1, 35097, 98114, 4841, 75073, -74973, 'Local618', 'homens659, mulheres18684'),
(285, '2024-03-03', 1, 89001, 46905, 5896, 68625, -68525, 'Local683', 'homens4610, mulheres19857'),
(286, '2024-03-04', 1, 53945, 50434, 854, 53702, -53602, 'Local639', 'homens23662, mulheres18398'),
(287, '2024-03-05', 1, 52598, 59170, 5528, 62724, -62624, 'Local616', 'homens16252, mulheres329'),
(288, '2024-03-06', 1, 41867, 43652, 9819, 85909, -85809, 'Local993', 'homens6328, mulheres28828'),
(289, '2024-03-07', 1, 98157, 62684, 1705, 39801, -39701, 'Local126', 'homens25754, mulheres24674'),
(290, '2024-03-08', 1, 64082, 76058, 5005, 24660, -24560, 'Local961', 'homens13848, mulheres27643'),
(291, '2024-03-09', 1, 67141, 47434, 9185, 53027, -52927, 'Local734', 'homens23310, mulheres6191'),
(292, '2024-03-10', 1, 57543, 47801, 3608, 54433, -54333, 'Local526', 'homens13396, mulheres28418'),
(293, '2024-03-11', 1, 54148, 94013, 303, 34690, -34590, 'Local961', 'homens4962, mulheres4254'),
(294, '2024-03-12', 1, 29854, 13494, 8412, 80289, -80189, 'Local45', 'homens26610, mulheres21132'),
(295, '2024-03-13', 1, 38311, 38526, 8752, 79959, -79859, 'Local752', 'homens12392, mulheres6247'),
(296, '2024-03-14', 1, 92755, 35909, 3766, 12840, -12740, 'Local165', 'homens3889, mulheres26220'),
(297, '2024-03-15', 1, 80111, 53703, 2572, 52113, -52013, 'Local201', 'homens8147, mulheres29860'),
(298, '2024-03-16', 1, 4356, 73751, 5454, 69791, -69691, 'Local449', 'homens7913, mulheres18136'),
(299, '2024-03-17', 1, 21095, 13092, 411, 20067, -19967, 'Local748', 'homens9187, mulheres27243'),
(300, '2024-03-18', 1, 76972, 14259, 8936, 91123, -91023, 'Local15', 'homens5510, mulheres5782'),
(301, '2024-03-19', 1, 49424, 51545, 2920, 17294, -17194, 'Local169', 'homens14880, mulheres10325'),
(302, '2024-03-20', 1, 6123, 84828, 5371, 40145, -40045, 'Local63', 'homens23563, mulheres16573'),
(303, '2024-03-21', 1, 65507, 61587, 2091, 70916, -70816, 'Local268', 'homens7021, mulheres13004'),
(304, '2024-03-22', 1, 87939, 66174, 8949, 61648, -61548, 'Local911', 'homens20181, mulheres17252'),
(305, '2024-03-23', 1, 99072, 22976, 747, 36403, -36303, 'Local335', 'homens12581, mulheres12424'),
(306, '2024-03-24', 1, 49841, 14698, 6177, 47508, -47408, 'Local116', 'homens24867, mulheres9633'),
(307, '2024-03-25', 1, 27179, 30592, 9164, 96532, -96432, 'Local190', 'homens14937, mulheres13830'),
(308, '2024-03-26', 1, 65265, 97227, 1161, 67722, -67622, 'Local855', 'homens13442, mulheres10152'),
(309, '2024-03-27', 1, 54623, 21644, 8904, 71157, -71057, 'Local889', 'homens4728, mulheres17718'),
(310, '2024-03-28', 1, 36180, 50836, 7212, 3760, -3660, 'Local433', 'homens13338, mulheres14309'),
(311, '2024-03-29', 1, 11242, 6975, 3558, 81772, -81672, 'Local904', 'homens8062, mulheres12522'),
(312, '2024-03-30', 1, 12803, 83781, 2463, 83205, -83105, 'Local217', 'homens13769, mulheres11806'),
(313, '2024-03-31', 1, 78812, 37114, 5230, 96463, -96363, 'Local492', 'homens16421, mulheres23303'),
(314, '2024-04-01', 1, 13164, 7296, 3909, 93089, -92989, 'Local907', 'homens6772, mulheres23348'),
(315, '2024-04-02', 1, 11559, 47918, 7597, 43412, -43312, 'Local515', 'homens17927, mulheres20963'),
(316, '2024-04-03', 1, 50224, 44192, 1746, 29435, -29335, 'Local468', 'homens1428, mulheres2930'),
(317, '2024-04-04', 1, 89477, 24711, 2368, 42955, -42855, 'Local751', 'homens7938, mulheres79'),
(318, '2024-04-05', 1, 37842, 43488, 6239, 40390, -40290, 'Local638', 'homens19184, mulheres16293'),
(319, '2024-04-06', 1, 60170, 85168, 526, 23039, -22939, 'Local200', 'homens23130, mulheres14144'),
(320, '2024-04-07', 1, 26523, 16943, 3976, 40289, -40189, 'Local701', 'homens22806, mulheres12734'),
(321, '2024-04-08', 1, 29413, 38165, 1939, 37746, -37646, 'Local797', 'homens25875, mulheres1191'),
(322, '2024-04-09', 1, 8362, 36393, 9333, 4077, -3977, 'Local998', 'homens54, mulheres25697'),
(323, '2024-04-10', 1, 80855, 39516, 3848, 44911, -44811, 'Local45', 'homens23264, mulheres8178'),
(324, '2024-04-11', 1, 46894, 21810, 6552, 82564, -82464, 'Local801', 'homens29048, mulheres19252'),
(325, '2024-04-12', 1, 62001, 72113, 7322, 18332, -18232, 'Local550', 'homens3175, mulheres22243'),
(326, '2024-04-13', 1, 61269, 82911, 4588, 41328, -41228, 'Local206', 'homens21814, mulheres2440'),
(327, '2024-04-14', 1, 6301, 71900, 1754, 17075, -16975, 'Local787', 'homens11896, mulheres2797'),
(328, '2024-04-15', 1, 63580, 98276, 1833, 27861, -27761, 'Local986', 'homens20762, mulheres19072'),
(329, '2024-04-16', 1, 39788, 42495, 2636, 66345, -66245, 'Local325', 'homens9489, mulheres15472'),
(330, '2024-04-17', 1, 88517, 76198, 8193, 89218, -89118, 'Local10', 'homens1722, mulheres21415'),
(331, '2024-04-18', 1, 45413, 58575, 4214, 34466, -34366, 'Local879', 'homens20427, mulheres23109'),
(332, '2024-04-19', 1, 14750, 65970, 3283, 89174, -89074, 'Local244', 'homens12711, mulheres7791'),
(333, '2024-04-20', 1, 32239, 66247, 8368, 98702, -98602, 'Local714', 'homens25844, mulheres12196'),
(334, '2024-04-21', 1, 9463, 7967, 8425, 51707, -51607, 'Local350', 'homens14009, mulheres7770'),
(335, '2024-04-22', 1, 57628, 47291, 9251, 41841, -41741, 'Local121', 'homens29378, mulheres9486'),
(336, '2024-04-23', 1, 51834, 52895, 7781, 37028, -36928, 'Local77', 'homens357, mulheres27334'),
(337, '2024-04-24', 1, 65602, 94016, 563, 34106, -34006, 'Local189', 'homens13622, mulheres9511'),
(338, '2024-04-25', 1, 47675, 55650, 3884, 74741, -74641, 'Local717', 'homens16202, mulheres20946'),
(339, '2024-04-26', 1, 40374, 82243, 5464, 99933, -99833, 'Local40', 'homens8516, mulheres22542'),
(340, '2024-04-27', 1, 87141, 31192, 7440, 27515, -27415, 'Local624', 'homens2124, mulheres22201'),
(341, '2024-04-28', 1, 67564, 72813, 126, 48359, -48259, 'Local213', 'homens19203, mulheres25056'),
(342, '2024-04-29', 1, 82842, 20627, 6163, 64629, -64529, 'Local876', 'homens16971, mulheres5979'),
(343, '2024-04-30', 1, 59662, 43800, 5384, 56326, -56226, 'Local391', 'homens15574, mulheres14880'),
(344, '2024-05-01', 1, 57527, 68230, 1262, 66634, -66534, 'Local828', 'homens23395, mulheres29690'),
(345, '2024-05-02', 1, 83492, 68060, 3501, 44915, -44815, 'Local654', 'homens8666, mulheres3864'),
(346, '2024-05-03', 1, 45075, 55343, 8702, 67825, -67725, 'Local293', 'homens28380, mulheres23886'),
(347, '2024-05-04', 1, 77352, 73031, 297, 57759, -57659, 'Local767', 'homens7987, mulheres21031'),
(348, '2024-05-05', 1, 85010, 12710, 5246, 52023, -51923, 'Local894', 'homens23636, mulheres6038'),
(349, '2024-05-06', 1, 20359, 45020, 8608, 70635, -70535, 'Local725', 'homens28432, mulheres13589'),
(350, '2024-05-07', 1, 51031, 94682, 3287, 21088, -20988, 'Local98', 'homens14499, mulheres1350'),
(351, '2024-05-08', 1, 41125, 60603, 2088, 26604, -26504, 'Local9', 'homens28211, mulheres10785'),
(352, '2024-05-09', 1, 84129, 9079, 308, 74032, -73932, 'Local933', 'homens19094, mulheres7621'),
(353, '2024-05-10', 1, 54365, 15685, 8945, 1802, -1702, 'Local167', 'homens26381, mulheres9895'),
(354, '2024-05-11', 1, 42881, 41609, 8134, 86591, -86491, 'Local571', 'homens7486, mulheres5931'),
(355, '2024-05-12', 1, 51806, 9242, 2595, 35454, -35354, 'Local508', 'homens22268, mulheres12036'),
(356, '2024-05-13', 1, 16198, 63918, 4087, 69418, -69318, 'Local653', 'homens8963, mulheres15702'),
(357, '2024-05-14', 1, 1579, 52763, 6803, 23529, -23429, 'Local814', 'homens19414, mulheres11843'),
(358, '2024-05-15', 1, 85573, 84433, 2608, 98656, -98556, 'Local461', 'homens25290, mulheres1594'),
(359, '2024-05-16', 1, 59729, 84503, 4760, 52143, -52043, 'Local568', 'homens15471, mulheres12467'),
(360, '2024-05-17', 1, 78496, 69946, 2734, 24056, -23956, 'Local634', 'homens5328, mulheres13379'),
(361, '2024-05-18', 1, 35219, 30444, 6807, 14887, -14787, 'Local688', 'homens10714, mulheres2092'),
(362, '2024-05-19', 1, 92145, 75223, 1272, 3237, -3137, 'Local642', 'homens15820, mulheres1690'),
(363, '2024-05-20', 1, 82763, 30586, 3984, 44619, -44519, 'Local126', 'homens18474, mulheres18526'),
(364, '2024-05-21', 1, 53650, 20356, 2358, 45794, -45694, 'Local713', 'homens10165, mulheres11965'),
(365, '2024-05-22', 1, 78603, 29722, 1869, 96994, -96894, 'Local289', 'homens14873, mulheres12457'),
(366, '2024-05-23', 1, 89135, 91089, 427, 90082, -89982, 'Local707', 'homens24383, mulheres24845'),
(367, '2024-05-24', 1, 73485, 81080, 4084, 55218, -55118, 'Local215', 'homens17717, mulheres25063');

-- --------------------------------------------------------

--
-- Estrutura da tabela `rating`
--

CREATE TABLE `rating` (
  `id` int(35) NOT NULL,
  `id_send` int(35) NOT NULL,
  `id_receive` int(35) NOT NULL,
  `stars` int(35) NOT NULL,
  `date` date DEFAULT NULL,
  `comentario` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `rating`
--

INSERT INTO `rating` (`id`, `id_send`, `id_receive`, `stars`, `date`, `comentario`) VALUES
(1, 5, 19, 4, '2024-05-24', 'Grande artista'),
(2, 5, 19, 2, '1900-01-12', 'incrivel'),
(6, 19, 19, 4, '2024-05-10', 'Hi! I need more information asdniasdnasdnasd asjd askdj asjk dasjk dasjk djkas dkjas dkjasd akjd sdksja dasjkd ask Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias eius esse labore mollitia temporibus ducimus enim tempora nesciunt odit, libero voluptatem cupiditate repellat non dolor consequuntur maiores quam molestiae dolorum?\n\nHi! I need more information asdniasdnasdnasd asjd askdj asjk dasjk dasjk djkas dkjas dkjasd akjd sdksja dasjkd ask Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias eius esse labore mollitia temporibus ducimus enim tempora nesciunt odit, libero voluptatem cupiditate repellat non dolor consequuntur maiores quam molestiae dolorum?\n\nHi! I need more information asdniasdnasdnasd asjd askdj asjk dasjk dasjk djkas dkjas dkjasd akjd sdksja dasjkd ask Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias eius esse labore mollitia temporibus ducimus enim tempora nesciunt odit, libero voluptatem cupiditate repellat non dolor consequuntur maiores quam molestiae dolorum?\n\nHi! I need more information asdniasdnasdnasd asjd askdj asjk dasjk dasjk djkas dkjas dkjasd akjd sdksja dasjkd ask Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias eius esse labore mollitia temporibus ducimus enim tempora nesciunt odit, libero voluptatem cupiditate repellat non dolor consequuntur maiores quam molestiae dolorum?\n\nHi! I need more information asdniasdnasdnasd asjd askdj asjk dasjk dasjk djkas dkjas dkjasd akjd sdksja dasjkd ask Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias eius esse labore mollitia temporibus ducimus enim tempora nesciunt odit, libero voluptatem cupiditate repellat non dolor consequuntur maiores quam molestiae dolorum?\n\nHi! I need more information asdniasdnasdnasd asjd askdj asjk dasjk dasjk djkas dkjas dkjasd akjd sdksja dasjkd ask Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias eius esse labore mollitia temporibus ducimus enim tempora nesciunt odit, libero voluptatem cupiditate repellat non dolor consequuntur maiores quam molestiae dolorum?\n\nHi! I need more information asdniasdnasdnasd asjd askdj asjk dasjk dasjk djkas dkjas dkjasd akjd sdksja dasjkd ask Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias eius esse labore mollitia temporibus ducimus enim tempora nesciunt odit, libero voluptatem cupiditate repellat non dolor consequuntur maiores quam molestiae dolorum?\n\nHi! I need more information asdniasdnasdnasd asjd askdj asjk dasjk dasjk djkas dkjas dkjasd akjd sdksja dasjkd ask Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias eius esse labore mollitia temporibus ducimus enim tempora nesciunt odit, libero voluptatem cupiditate repellat non dolor consequuntur maiores quam molestiae dolorum?\n\nHi! I need more information asdniasdnasdnasd asjd askdj asjk dasjk dasjk djkas dkjas dkjasd akjd sdksja dasjkd ask Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias eius esse labore mollitia temporibus ducimus enim tempora nesciunt odit, libero voluptatem cupiditate repellat non dolor consequuntur maiores quam molestiae dolorum?\n\n'),
(7, 19, 19, 1, '2024-05-10', 'brutal'),
(8, 19, 19, 4, '2024-05-10', 'brutal'),
(9, 19, 19, 4, '2024-05-10', 'brutal');

-- --------------------------------------------------------

--
-- Estrutura da tabela `saved`
--

CREATE TABLE `saved` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_saved` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `saved`
--

INSERT INTO `saved` (`id`, `id_user`, `id_saved`) VALUES
(30, 11, 6),
(32, 9, 10),
(33, 12, 6),
(35, 23, 11);

-- --------------------------------------------------------

--
-- Estrutura da tabela `shows`
--

CREATE TABLE `shows` (
  `id` int(11) NOT NULL,
  `id_promotor` int(11) NOT NULL,
  `localizacao` text NOT NULL,
  `sinopse` text NOT NULL,
  `descricao` text NOT NULL,
  `cartaz` text NOT NULL,
  `titulo` text NOT NULL,
  `preco` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `shows`
--

INSERT INTO `shows` (`id`, `id_promotor`, `localizacao`, `sinopse`, `descricao`, `cartaz`, `titulo`, `preco`) VALUES
(19, 19, 'Pontinha', 'sou fixe', 'ashgdjasgdjasd dakdhuklas df sdaufidas luifgsludfg uisdaglufdsgaufiasgd lfudsa gfiudasg fliusadfgiusadg fuisadif sduifglasudifglasdf gasdulfdsgafuilasgdf usadg fliasdg flasudglfuasdilfisa.', '19.jpeg', 'Daniel', 99.99),
(20, 19, 'Zambujeira do Mar', 'amres vivas', 'kdasndjkasnjkdna dnasjkd bkjadbajkbdhjsavjhs asndmf nmskdasndjkasnjkdna dnasjkd bkjadbajkbdhjsavjhs asndmf nmskdasndjkasnjkdna dnasjkd bkjadbajkbdhjsavjhs asndmf nmskdasndjkasnjkdna dnasjkd bkjadbajkbdhjsavjhs asndmf nmskdasndjkasnjkdna dnasjkd bkjadbajkbdhjsavjhs asndmf nmskdasndjkasnjkdna dnasjkd bkjadbajkbdhjsavjhs asndmf nmskdasndjkasnjkdna dnasjkd bkjadbajkbdhjsavjhs asndmf nmskdasndjkasnjkdna dnasjkd bkjadbajkbdhjsavjhs asndmf nmskdasndjkasnjkdna dnasjkd bkjadbajkbdhjsavjhs asndmf nmskdasndjkasnjkdna dnasjkd bkjadbajkbdhjsavjhs asndmf nmskdasndjkasnjkdna dnasjkd bkjadbajkbdhjsavjhs asndmf nmskdasndjkasnjkdna dnasjkd bkjadbajkbdhjsavjhs asndmf nmskdasndjkasnjkdna dnasjkd bkjadbajkbdhjsavjhs asndmf nmskdasndjkasnjkdna dnasjkd bkjadbajkbdhjsavjhs asndmf nms', '20.jpg', 'Meo sudoeste', 120),
(21, 19, 'Ericeira', 'asyduvfglasuihçoashxhv oi\r\nasddv\r\n\r\n', 'assssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss\r\nassssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssassssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssassssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssassssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssassssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssassssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss', '21.png', 'Show Ericeira', 50),
(22, 19, 'Ericeira', 'asyduvfglasuihçoashxhv oi\r\nasddv\r\n\r\n', 'assssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss\r\nassssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssassssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssassssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssassssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssassssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssassssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss', '22.png', 'Show Ericeira', 50),
(23, 19, 'Ovar', 'Evento Yazaki Ovar Ovar Yazaki Evento', 'Evento Yazaki Ovar Ovar Yazaki Evento FULL', '23.png', 'Full Yazaki Event', 875);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`) VALUES
(1, 'happy', 'prod', 'happyprod@gmail.com');

-- --------------------------------------------------------

--
-- Estrutura da tabela `verify_accounts`
--

CREATE TABLE `verify_accounts` (
  `id` int(35) NOT NULL,
  `first_name` varchar(35) NOT NULL,
  `last_name` varchar(35) NOT NULL,
  `birthday` date NOT NULL,
  `address` varchar(35) NOT NULL,
  `address_2` varchar(35) NOT NULL,
  `city` varchar(35) NOT NULL,
  `state` varchar(35) NOT NULL,
  `zip` varchar(10) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `verified` varchar(10) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `artists`
--
ALTER TABLE `artists`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `follows`
--
ALTER TABLE `follows`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `projects_collabs`
--
ALTER TABLE `projects_collabs`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `projects_comments`
--
ALTER TABLE `projects_comments`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `projects_images`
--
ALTER TABLE `projects_images`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `projects_likes`
--
ALTER TABLE `projects_likes`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `projects_privacy`
--
ALTER TABLE `projects_privacy`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `projects_stats`
--
ALTER TABLE `projects_stats`
  ADD PRIMARY KEY (`id_stat`);

--
-- Índices para tabela `projects_stats_snapshot`
--
ALTER TABLE `projects_stats_snapshot`
  ADD PRIMARY KEY (`id_snapshot`);

--
-- Índices para tabela `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `saved`
--
ALTER TABLE `saved`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `shows`
--
ALTER TABLE `shows`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Índices para tabela `verify_accounts`
--
ALTER TABLE `verify_accounts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT de tabela `artists`
--
ALTER TABLE `artists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `follows`
--
ALTER TABLE `follows`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `projects_collabs`
--
ALTER TABLE `projects_collabs`
  MODIFY `id` int(35) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `projects_comments`
--
ALTER TABLE `projects_comments`
  MODIFY `id` int(35) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `projects_images`
--
ALTER TABLE `projects_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT de tabela `projects_likes`
--
ALTER TABLE `projects_likes`
  MODIFY `id` int(35) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `projects_privacy`
--
ALTER TABLE `projects_privacy`
  MODIFY `id` int(35) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `projects_stats`
--
ALTER TABLE `projects_stats`
  MODIFY `id_stat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `projects_stats_snapshot`
--
ALTER TABLE `projects_stats_snapshot`
  MODIFY `id_snapshot` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=368;

--
-- AUTO_INCREMENT de tabela `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(35) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `saved`
--
ALTER TABLE `saved`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de tabela `shows`
--
ALTER TABLE `shows`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `verify_accounts`
--
ALTER TABLE `verify_accounts`
  MODIFY `id` int(35) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
