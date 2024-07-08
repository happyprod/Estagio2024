-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 08-Jul-2024 às 06:55
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
  `password` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `picture_background` text NOT NULL,
  `registered` datetime NOT NULL,
  `location` text NOT NULL,
  `identity` int(35) NOT NULL,
  `about` text NOT NULL,
  `number` text NOT NULL,
  `Instagram` text NOT NULL,
  `Active_Instagram` tinyint(1) NOT NULL,
  `Youtube` text NOT NULL,
  `Active_Youtube` tinyint(1) NOT NULL,
  `Tiktok` text NOT NULL,
  `Active_Tiktok` tinyint(1) NOT NULL,
  `Blog` text NOT NULL,
  `Active_Blog` tinyint(1) NOT NULL,
  `id_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `accounts`
--

INSERT INTO `accounts` (`id`, `name`, `email`, `password`, `picture`, `picture_background`, `registered`, `location`, `identity`, `about`, `number`, `Instagram`, `Active_Instagram`, `Youtube`, `Active_Youtube`, `Tiktok`, `Active_Tiktok`, `Blog`, `Active_Blog`, `id_name`) VALUES
(5, 'asjdasnka', 'asjdasnka@gmail.com', '', 'FotoPerfil.jpg', '', '2024-03-11 17:30:49', 'asd', 1, '', '', '', 0, '', 0, '', 0, '', 0, 'Rita'),
(6, 'asdnkja', 'asdnkja@gmail.com', 'ajksndk@asjkdna', '450f755a089a2c83e790c7337d54c728.jpeg', '', '2024-03-11 17:34:26', 'aklsfd', 1, '', '', '', 0, '', 0, '', 0, '', 0, 'joaninha'),
(10, 'happy', 'amldk@gmail.com', 'asd', 'img\\fotos\\servicos_img1.jpg', '', '2024-04-05 14:53:15', 'Sintra', 1, '', '', '', 0, '', 0, '', 0, '', 0, 'happy'),
(11, 'Ruben Costa', 'ruben.escola.2006@gmail.com', '', 'https://lh3.googleusercontent.com/a/ACg8ocI84I3098-o2aoK5zMBBGTswW-2MLBIFs8_HzoX_ZKOb2doOrXn=s96-c', '', '2024-04-06 13:55:40', 'Cacem', 1, '', '', '', 0, '', 0, '', 0, '', 0, 'Francisco'),
(19, 'Martin garrix', 'martingarrix@gmail.com', '123', '668415159af58.jpeg', '668415159bc8a.gif', '2024-05-04 17:45:18', 'New Jersey, Estados Unidos', 2, 'Hi! I need more information asdniasdnasdnasd asjd askdj asjk dasjk dasjk djkas dkjas dkjasd akjd sdksja dasjkd ask Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias eius esse labore mollitia temporibus ducimus enim tempora nesciunt odit, libero voluptatem cupiditate repellat non dolor consequuntur maiores quam molestiae dolorum?\n\nHi! I need more information asdniasdnasdnasd asjd askdj asjk dasjk dasjk djkas dkjas dkjasd akjd sdksja dasjkd ask Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias eius esse labore mollitia temporibus ducimus enim tempora nesciunt odit, libero voluptatem cupiditate repellat non dolor consequuntur maiores quam molestiae dolorum?\n\nHi! I need more information asdniasdnasdnasd asjd askdj asjk dasjk dasjk djkas dkjas dkjasd akjd sdksja dasjkd ask Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias eius esse labore mollitia temporibus ducimus enim tempora nesciunt odit, libero voluptatem cupiditate repellat non dolor consequuntur maiores quam molestiae dolorum?\n\nHi! I need more information asdniasdnasdnasd asjd askdj asjk dasjk dasjk djkas dkjas dkjasd akjd sdksja dasjkd ask Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias eius esse labore mollitia temporibus ducimus enim tempora nesciunt odit, libero voluptatem cupiditate repellat non dolor consequuntur maiores quam molestiae dolorum?\n\nHi! I need more information asdniasdnasdnasd asjd askdj asjk dasjk dasjk djkas dkjas dkjasd akjd sdksja dasjkd ask Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias eius esse labore mollitia temporibus ducimus enim tempora nesciunt odit, libero voluptatem cupiditate repellat non dolor consequuntur maiores quam molestiae dolorum?\n\nHi! I need more information asdniasdnasdnasd asjd askdj asjk dasjk dasjk djkas dkjas dkjasd akjd sdksja dasjkd ask Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias eius esse labore mollitia temporibus ducimus enim tempora nesciunt odit, libero voluptatem cupiditate repellat non dolor consequuntur maiores quam molestiae dolorum?\n\nHi! I need more information asdniasdnasdnasd asjd askdj asjk dasjk dasjk djkas dkjas dkjasd akjd sdksja dasjkd ask Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias eius esse labore mollitia temporibus ducimus enim tempora nesciunt odit, libero voluptatem cupiditate repellat non dolor consequuntur maiores quam molestiae dolorum?\n\nHi! I need more information asdniasdnasdnasd asjd askdj asjk dasjk dasjk djkas dkjas dkjasd akjd sdksja dasjkd ask Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias eius esse labore mollitia temporibus ducimus enim tempora nesciunt odit, libero voluptatem cupiditate repellat non dolor consequuntur maiores quam molestiae dolorum?\n\nHi! I need more information asdniasdnasdnasd asjd askdj asjk dasjk dasjk djkas dkjas dkjasd akjd sdksja dasjkd ask Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias eius esse labore mollitia temporibus ducimus enim tempora nesciunt odit, libero voluptatem cupiditate repellat non dolor consequuntur maiores quam molestiae dolorum?\n                       ', '123123123', 'martingarrix', 0, 'martingarrix', 0, 'goncalo.s_', 1, 'www.fernandinhadswaippie.pt', 0, 'Ruben'),
(20, 'ola', 'ola@gmail.com', '123', './img/foto/default.jpg', '', '2024-05-07 02:39:21', '', 2, '', '', '', 0, '', 0, '', 0, '', 0, 'Rodrigo'),
(21, 'soufixe', 'soufixe@gmail.com', '123', './img/foto/default.jpg', '', '2024-05-07 02:40:24', '', 3, '', '', '', 0, '', 0, '', 0, '', 0, 'Ana202'),
(22, 'Simao', 'sougiro@gmail.com', '123', 'default.jpg', '', '2024-05-07 11:09:38', '', 1, '', '', '', 0, '', 0, '', 0, '', 0, 'ze04'),
(23, 'simao', 'simao@gmail.com', '123', 'default.jpg', '', '2024-05-07 11:44:28', '', 1, '', '', '', 0, '', 0, '', 0, '', 0, 'kshmr'),
(24, 'a', 'asdasda@gmail.com', '123', '668263bb23675.png', '668263b156f58.gif', '2024-05-08 17:54:09', '', 2, '', '913352194', '', 0, '', 0, '', 0, '', 0, 'ggBacon'),
(25, 'goncalinho', 'goncalinho@gmail.com', '123', './img/foto/default.jpg', '', '2024-05-21 14:08:44', '', 1, '', '', '', 0, '', 0, '', 0, '', 0, 'Dimitri'),
(26, 'ruben', 'costa@gmail.com', 'asd', '', '', '0000-00-00 00:00:00', 'asdf', 0, '', '', '', 0, '', 0, '', 0, '', 0, 'Hardwell'),
(27, 'ruben', 'happy@gmail.com', '123', '', '', '0000-00-00 00:00:00', 'asdasd', 0, '', '', '', 0, '', 0, '', 0, '', 0, 'Steve'),
(28, 'nome', 'email@gmail.com', 'palavra-passe', '', '', '0000-00-00 00:00:00', 'localização', 1, '', '', '', 0, '', 0, '', 0, '', 0, 'roberto'),
(29, 'Ruben', 'happy2@gmail.com', 'bananinha', '', '', '0000-00-00 00:00:00', 'LDLC Arena, Avenue Simone Veil, Décines-Charpieu, França', 0, '', '', '', 0, '', 0, '', 0, '', 0, 'happy'),
(30, 'Gonçalinho', 'goncalinhopan@pan.pt', 'goncalinho', '', '', '0000-00-00 00:00:00', 'Avanca, Portugal', 0, '', '', '', 0, '', 0, '', 0, '', 0, 'goncalinho'),
(31, 'nome', 'user@gmail.pcm', 'palavra-passe', '', '', '0000-00-00 00:00:00', 'Seychelles', 1, '', '', '', 0, '', 0, '', 0, '', 0, 'miguel'),
(32, '', '', '', '', '', '0000-00-00 00:00:00', '', 0, '', '', '', 0, '', 0, '', 0, '', 0, 'Frozen'),
(33, '', 's@gmail.com', '', '', '', '0000-00-00 00:00:00', '', 5, '', '', '', 0, '', 0, '', 0, '', 0, 'Martin'),
(34, 'ganggang', 'ksd@gmail.com', '123', '', '', '0000-00-00 00:00:00', 'SDF Building, GP Block, Sector V, Bidhannagar, Calcutá, Bengala Ocidental, Índia', 4, '', '', '', 0, '', 0, '', 0, '', 0, 'Jorge'),
(35, 'ggggggggg', 'asd@gmail.com', '1234567', '', '', '0000-00-00 00:00:00', 'Buceta, Santa Cruz de La Sierra, Bolívia', 3, '', '', '', 0, '', 0, '', 0, '', 0, 'Carlos'),
(36, '                                Lost Lands', 'olateste2@gmail.com', 'ola', '', '', '0000-00-00 00:00:00', 'Mamas Joint Road, MCC B Block, MCC, Davanagere, Karnataka, Índia', 5, '', '', '', 0, '', 0, '', 0, '', 0, '                                                                                                                           LostLandsOfficial'),
(58, 'prod', 'happyzao@gmail.com', 'palavrapasse', '', '', '0000-00-00 00:00:00', 'Galveias, Portugal', 3, '', '', '', 0, '', 0, '', 0, '', 0, 'happyksd'),
(59, 'asda', 'nasjkidna@gmail.com', 'asdasda.222', '', '', '0000-00-00 00:00:00', 'Åsdalsveien, Oslo, Noruega', 3, '', '', '', 0, '', 0, '', 0, '', 0, 'gasdfjkansd'),
(60, 'Gabriel', 'anao_velocista@gmail.com', 'panuco123.', '', '', '0000-00-00 00:00:00', 'RJ, Rio de Janeiro - RJ, Brasil', 3, '', '', '', 0, '', 0, '', 0, '', 0, 'anao_velocista'),
(61, 'asd', 'olaasdasd@gmail.com', '$2y$10$8SzOxQ/o.eg3ByCPMbkO4.nqlRCM', '', '', '0000-00-00 00:00:00', 'asda', 3, '', '', '', 0, '', 0, '', 0, '', 0, 'happyasdasdas'),
(62, 'ruben', 'happyzin@gmail.com', '$2y$10$jro6CDmw6wfnTTVRLaRGluTEGGsr', '', '', '0000-00-00 00:00:00', 'Ašdod, Israel', 2, '', '', '', 0, '', 0, '', 0, '', 0, 'happyprod19'),
(63, 'asd', 'lasd@gmail.com', 'olaolaola123.', '', '', '0000-00-00 00:00:00', 'Providence, Rhode Island, Estados Unidos', 2, '', '', '', 0, '', 0, '', 0, '', 0, 'asd'),
(64, 'marty', 'marty@gmail.com', 'olaolaola123.', '', '', '0000-00-00 00:00:00', 'Taiwan, Taipé, Xinyi District, 101大樓2樓連通天橋', 2, '', '', '', 0, '', 0, '', 0, '', 0, 'marty'),
(65, 'asdaskj', 'martyas@gmail.com', '$2y$10$GCC0mz862mhmS76v5AxPeuK7/rZYATw3kL6.q49gqznas344/oWNO', '', '', '0000-00-00 00:00:00', '17 Mile Drive, Pebble Beach, Califórnia, Estados Unidos', 2, '', '', '', 0, '', 0, '', 0, '', 0, 'marty2'),
(66, 'seethesmall', 'seethe@gmail.com', '$2y$10$9jlfkbtHz5zWVWw3eCJQB.pwF5/NEhptiYmD2pfcFzhicyipoIHG2', '', '', '2024-07-06 00:00:00', 'Seattle, Washington, Estados Unidos', 1, '', '', '', 0, '', 0, '', 0, '', 0, 'see'),
(67, 'sandjank', 'aksjdnjka@gmail.com', '$2y$10$ZSvRP3./jIIG.5Mvaerv8OiqWdsaDBJcpANFVAc8ZdNy1kHP.l2Fy', '', '', '2024-07-06 00:00:00', 'asda', 3, '', '', '', 0, '', 0, '', 0, '', 0, 'asdasadnjka'),
(68, 'sandjank', 'aksjdasdasnjka@gmail.com', '$2y$10$93D8OgB.HG15Dg8S77vbjuBCgnLSxBVZHegcDXJEu0StmBdgPwKJS', '', '', '2024-07-06 00:00:00', 'asda', 3, '', '', '', 0, '', 0, '', 0, '', 0, 'asdasasadnjka'),
(69, 'ASDAS', 'asdnas@gmail.com', '$2y$10$QH7kOXXW5hZSBRZqhQQu/OGSdiRYYNYbv/vxbX1Uvmz8nPF6SYuvW', '', '', '2024-07-06 00:00:00', 'ASDA Retford Supermarket, Retford, Reino Unido', 1, '', '', '', 0, '', 0, '', 0, '', 0, 'najskdnasjknjk'),
(70, 'ASDAS', 'asdnasasd@gmail.com', '$2y$10$ij7s9Bt7B0fkQMGP//kfBeNaHzuiURhUKl8Z62J5tKESTVQ7lOnaS', '', '', '2024-07-06 00:00:00', 'ASDA Retford Supermarket, Retford, Reino Unido', 1, '', '', '', 0, '', 0, '', 0, '', 0, 'najskdnasjknjks'),
(71, 'ASDAS', 'das@gmail.com', '$2y$10$vh68HElGPnxbqXST9y1yqOprPRllOIZm0U/AVAkgdlt.QoV.QAuHe', '', '', '2024-07-06 00:00:00', 'ASDA Retford Supermarket, Retford, Reino Unido', 1, '', '', '', 0, '', 0, '', 0, '', 0, 'najskdnasjknjsks'),
(72, 'dimitri', 'dimitri@gmail.com', '$2y$10$8FJQN35kRp7Tco6LgDWGqusadhtKLr2co4WWoieKSvAsHO2kVWXUW', '', '', '2024-07-06 00:00:00', 'Albânia', 2, '', '', '', 0, '', 0, '', 0, '', 0, 'dimitri2'),
(73, 'dimitri', 'dimitrii@gmail.com', '$2y$10$SDJNr/FqcEXPLtS/LaTwoeUY18n7VT/vV7wdSuemKIXs8LtP8uGwm', '', '', '2024-07-06 00:00:00', 'Albânia', 2, '', '', '', 0, '', 0, '', 0, '', 0, 'dimitri3'),
(74, 'dimitri', 'dsimitrii@gmail.com', '$2y$10$wNqsaBcMfMcYMLm6VgCjYOfNWJ5SkO9yY/8A1anf7re/B6b7Nh3t.', '', '', '2024-07-06 00:00:00', 'Albânia', 2, '', '', '', 0, '', 0, '', 0, '', 0, 'dimitri4'),
(75, 'papa', 'papa@gmail.com', '$2y$10$sENvcSAAuqgpZTo3lCjT2ez5IWBYvSRWLD69YRer54CSO7MLkqcSS', '31cca1f66220cb9c02782407d7f30793.png', '', '2024-07-06 00:00:00', 'Assam, Índia', 3, '', '', '', 0, '', 0, '', 0, '', 0, 'papa'),
(76, 'when', 'far@gmail.com', '$2y$10$Y/SQhHfehDAfD4.lITlnQeFWnYNUttOTMA1FIPsxwclGmDGEcdzCi', 'a7760e8c8753df1d63533d71784c9728.png', '6688c394e0762.png', '2024-07-06 00:00:00', 'dont have to be afraid', 3, '', '', '', 0, '', 0, '', 0, '', 0, 'far_away'),
(77, 'asmdlak', 'happypod@gmail.com', '$2y$10$YeJE3pfUxhIX6GpbIuLEu.GpmPz47.l2EPvieC/AoD9yNIkF1.aFa', '6688d1b5dddfc.png', '668b00093550a.png', '2024-07-06 00:00:00', 'Sadabad, Uttar Pradesh, Índia', 2, '', '', '', 0, '', 0, '', 0, '', 0, 'happypod'),
(78, 'rubensdas', 'asmdkla@gmail.com', '$2y$10$k6.wZnZWby2aAzm8u9vnJevGrPHzuWMK.7xJSFxs6M5w4Iv.OFHeW', '668b00ed70dbb.png', '668b00d8773fc.png', '2024-07-06 00:00:00', 'akslad', 3, 'asda', '912123123', '', 0, '', 0, '', 0, '', 0, 'beats');

-- --------------------------------------------------------

--
-- Estrutura da tabela `chat`
--

CREATE TABLE `chat` (
  `id` int(35) NOT NULL,
  `id_sender` int(35) NOT NULL,
  `id_receive` int(35) NOT NULL,
  `message` text NOT NULL,
  `viewed` int(2) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `chat`
--

INSERT INTO `chat` (`id`, `id_sender`, `id_receive`, `message`, `viewed`, `date`) VALUES
(37, 19, 24, 'boas bro', 1, '2024-07-01 03:02:25'),
(38, 19, 28, 'Boa tarde,\nPrecisava de esclerecer uma duvida', 0, '2024-07-01 10:30:15'),
(39, 19, 10, 'mm', 0, '2024-07-02 09:21:27'),
(40, 76, 73, 'crazy shit bro', 0, '2024-07-06 04:58:15'),
(41, 78, 58, 'assério', 0, '2024-07-07 14:51:14'),
(42, 77, 78, 'ola', 0, '2024-07-08 03:49:59'),
(43, 77, 78, 'td bem', 0, '2024-07-08 03:50:06'),
(44, 77, 78, '???', 0, '2024-07-08 03:50:08');

-- --------------------------------------------------------

--
-- Estrutura da tabela `contracts`
--

CREATE TABLE `contracts` (
  `id` int(35) NOT NULL,
  `id_sender` int(35) NOT NULL,
  `id_receive` int(35) NOT NULL,
  `file` text NOT NULL,
  `subject` text NOT NULL,
  `state` int(3) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `contracts`
--

INSERT INTO `contracts` (`id`, `id_sender`, `id_receive`, `file`, `subject`, `state`, `date`) VALUES
(1, 19, 24, 'preciso de um cao', 'ficha 5.pdf', 0, '2024-06-30'),
(2, 19, 24, 'asdd', 'ficha 5_1.pdf', 2, '2024-06-30'),
(3, 19, 24, 'in my soul', 'Ri2xMFZ5TXNw0tdq', 1, '2024-06-30'),
(4, 19, 24, 'in my soul', 'KhDI4aHPlEzB8CXd', 0, '2024-06-30'),
(5, 24, 19, 'WyL74fXqbPS9ADcR.pdf', 'asdakjs dasdkas dk', 2, '2024-06-30'),
(6, 24, 19, 'jgo9Y0d28uz4nQMEet5WvLam.pdf', 'hold back', 1, '2024-06-30'),
(7, 24, 19, 'QsnqYJ6c9XL5lH1IivRrGmwB.pdf', 'olaaaaasdasdasndjikasndjkias das dkjas kdja sjkd', 2, '2024-06-30'),
(8, 19, 28, 'LA7PYwQEevtIanTlq23zG6hj.pdf', 'Gostava de atuar num festival', 0, '2024-07-01'),
(9, 77, 78, 'H42oORdxVFJmKfgIjCGwsyub.pdf', 'gay', 1, '2024-07-06'),
(10, 78, 74, 'vKgnfMRNYZ18mkl49oLWEUCB.pdf', 'asdas', 0, '2024-07-06'),
(11, 78, 77, '152B3t0xSjYZgEHlWJCIkLG9.pdf', 'asd', 1, '2024-07-08');

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
(1, 5, 19),
(47, 26, 24),
(48, 19, 11),
(53, 19, 5),
(87, 19, 26),
(93, 24, 19),
(94, 24, 23),
(95, 77, 78),
(96, 78, 75),
(98, 78, 19),
(99, 78, 20),
(100, 78, 77),
(101, 77, 19);

-- --------------------------------------------------------

--
-- Estrutura da tabela `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `id_founder` int(11) NOT NULL,
  `name` text NOT NULL,
  `imagem` text NOT NULL,
  `description` text NOT NULL,
  `local` text NOT NULL,
  `date` date DEFAULT NULL,
  `Booking` text NOT NULL,
  `PrivacyProjects` int(35) NOT NULL,
  `PrivacyLikes` int(35) NOT NULL,
  `PrivacyComments` int(35) NOT NULL,
  `deleted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `projects`
--

INSERT INTO `projects` (`id`, `id_founder`, `name`, `imagem`, `description`, `local`, `date`, `Booking`, `PrivacyProjects`, `PrivacyLikes`, `PrivacyComments`, `deleted`) VALUES
(1, 19, 'Lost Landssss', 'ola.jpg', 'Atuar no Lost Lands é uma experiência surreal. Desde o momento em que coloco os pés no palco até o momento em que saio, é uma montanha-russa de emoções e energia. O Lost Lands tem uma energia única, uma mistura de selvageria e comunidade que é difícil de replicar em qualquer outro lugar.\n\nO palco é colossal, uma verdadeira maravilha visual. As luzes, os telões, o som estrondoso - tudo conspira para criar uma atmosfera que te envolve completamente. É como estar em outro mundo.\n\nInteragir com a multidão é uma das melhores partes. Ver milhares de pessoas reunidas, todas compartilhando a mesma paixão pela música, é incrivelmente inspirador. Eles estão lá para se divertir, para se perder na batida, e eu estou lá para levá-los nessa jornada.\n\nClaro, há sempre desafios. Manter a energia alta durante um set longo pode ser exigente, mas é aí que reside a magia da atuação ao vivo. É uma troca de energia constante entre o DJ e o público, e quando você está no Lost Lands, essa troca atinge um nível totalmente novo.\n\nNo final do dia, atuar no Lost Lands é mais do que apenas tocar algumas músicas. É uma experiência imersiva, uma celebração da música e da cultura da dance music. E quando você está no palco, fazendo parte dessa celebração, é uma sensação indescritível.', 'Associação Vida Nova Lar Idosos, Rua das Agras, Pardilhó, Portugal', '2024-06-16', 'ana202', 1, 4, 8, 0),
(2, 19, 'Tommrowland', 'ola2.jpg', 'Atuar no Lost Lands é uma experiência surreal. Desde o momento em que coloco os pés no palco até o momento em que saio, é uma montanha-russa de emoções e energia. O Lost Lands tem uma energia única, uma mistura de selvageria e comunidade que é difícil de replicar em qualquer outro lugar.\n\nO palco é colossal, uma verdadeira maravilha visual. As luzes, os telões, o som estrondoso - tudo conspira para criar uma atmosfera que te envolve completamente. É como estar em outro mundo.\n\nInteragir com a multidão é uma das melhores partes. Ver milhares de pessoas reunidas, todas compartilhando a mesma paixão pela música, é incrivelmente inspirador. Eles estão lá para se divertir, para se perder na batida, e eu estou lá para levá-los nessa jornada.\n\nClaro, há sempre desafios. Manter a energia alta durante um set longo pode ser exigente, mas é aí que reside a magia da atuação ao vivo. É uma troca de energia constante entre o DJ e o público, e quando você está no Lost Lands, essa troca atinge um nível totalmente novo.\n\nNo final do dia, atuar no Lost Lands é mais do que apenas tocar algumas músicas. É uma experiência imersiva, uma celebração da música e da cultura da dance music. E quando você está no palco, fazendo parte dessa celebração, é uma sensação indescritível.', 'Sydney Zoo, Great Western Highway, Eastern Creek Nova Gales do Sul, Austrália', '2000-07-07', '', 2, 6, 8, 0),
(3, 19, 'olaaa', 'ola.jpg', 'Isto é apenas um RascunhoIsto é apenas um RascunhoIsto é apenas um RascunhoIsto é apenas um RascunhoIsto é apenas um RascunhoIsto é apenas um RascunhoIsto é apenas um RascunhoIsto é apenas um RascunhoIsto é apenas um RascunhoIsto é apenas um RascunhoIsto é apenas um RascunhoIsto é apenas um RascunhoIsto é apenas um RascunhoIsto é apenas um RascunhoIsto é apenas um RascunhoIsto é apenas um RascunhoIsto é apenas um RascunhoIsto é apenas um RascunhoIsto é apenas um RascunhoIsto é apenas um RascunhoIsto é apenas um RascunhoIsto é apenas um RascunhoIsto é apenas um RascunhoIsto é apenas um RascunhoIsto é apenas um RascunhoIsto é apenas um RascunhoIsto é apenas um RascunhoIsto é apenas um RascunhoIsto é apenas um RascunhoIsto é apenas um RascunhoIsto é apenas um RascunhoIsto é apenas um RascunhoIsto é apenas um RascunhoIsto é apenas um RascunhoIsto é apenas um RascunhoIsto é apenas um RascunhoIsto é apenas um RascunhoIsto é apenas um RascunhoIsto é apenas um RascunhoIsto é apenas um RascunhoIsto é apenas um RascunhoIsto é apenas um RascunhoIsto é apenas um RascunhoIsto é apenas um RascunhoIsto é apenas um RascunhoIsto é apenas um RascunhoIsto é apenas um RascunhoIsto é apenas um RascunhoIsto é apenas um RascunhoIsto é apenas um RascunhoIsto é apenas um RascunhoIsto é apenas um RascunhoIsto é apenas um RascunhoIsto é apenas um RascunhoIsto é apenas um RascunhoIsto é apenas um RascunhoIsto é apenas um RascunhoIsto é apenas um RascunhoIsto é apenas um RascunhoIsto é apenas um RascunhoIsto é apenas um RascunhoIsto é apenas um RascunhoIsto é apenas um RascunhoIsto é apenas um RascunhoIsto é apenas um Rascunho', 'Lisboa, Portugal', '2000-02-19', '', 1, 6, 9, 0),
(42, 19, 'deixou de ser', '', 'é como é parceira', 'São Bento do Sul, SC, Brasil', '1999-09-09', '', 3, 6, 9, 0),
(43, 19, 'Rascunho', '', 'Isto é apenas um Rascunho', '', '2024-07-03', '', 3, 6, 9, 0),
(44, 24, 'Rascunho', '', 'Isto é apenas um Rascunho', '', '2000-07-03', 'ola', 3, 6, 9, 0),
(45, 76, 'Lets get it the rumble', '', 'everybody put the hands in the air!!!!!!!!!!!!!!!!!!', 'Pardilhó, Portugal', '2024-02-03', 'asd', 3, 6, 9, 0),
(46, 78, 'ola', '', 'isto é apenas uma ceninhaggg', 'Shellharbour Nova Gales do Sul, Austrália', '2024-07-03', 'ana202', 1, 5, 7, 0),
(47, 78, 'Rascunho', '', 'Isto é apenas um Rascunho', '', '2024-07-08', '', 3, 6, 9, 0),
(48, 77, 'Rascunho', '', 'Isto é apenas um Rascunho', '', '2024-07-08', 'ana202', 3, 6, 9, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `projects_collabs`
--

CREATE TABLE `projects_collabs` (
  `id` int(11) NOT NULL,
  `id_project` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `projects_collabs`
--

INSERT INTO `projects_collabs` (`id`, `id_project`, `id_user`) VALUES
(22, 1, 20),
(23, 1, 10),
(24, 1, 19),
(25, 1, 27),
(26, 1, 19),
(38, 46, 35),
(43, 48, 35),
(44, 48, 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `projects_comments`
--

CREATE TABLE `projects_comments` (
  `id` int(11) NOT NULL,
  `id_project` int(11) NOT NULL,
  `id_user_send` int(11) NOT NULL,
  `comment` text NOT NULL,
  `parent_comment_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `projects_comments`
--

INSERT INTO `projects_comments` (`id`, `id_project`, `id_user_send`, `comment`, `parent_comment_id`) VALUES
(1, 1, 78, 'toptop', NULL),
(2, 2, 78, 'gg', NULL),
(3, 2, 78, 'asd', NULL),
(4, 46, 78, 'a', NULL),
(5, 46, 78, 's', NULL),
(6, 2, 78, 'c', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `projects_comments_likes`
--

CREATE TABLE `projects_comments_likes` (
  `id` int(35) NOT NULL,
  `comment_id` int(35) NOT NULL,
  `id_user_send` int(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `projects_comments_likes`
--

INSERT INTO `projects_comments_likes` (`id`, `comment_id`, `id_user_send`) VALUES
(32, 1, 78);

-- --------------------------------------------------------

--
-- Estrutura da tabela `projects_images`
--

CREATE TABLE `projects_images` (
  `id` int(11) NOT NULL,
  `id_project` int(11) NOT NULL,
  `image` text NOT NULL,
  `order` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `projects_images`
--

INSERT INTO `projects_images` (`id`, `id_project`, `image`, `order`) VALUES
(281, 3, '8AeRnPGJIm4V8AAAAASUVORK5CYII=', 1),
(282, 3, '8AikbwswNo2I0AAAAASUVORK5CYII=', 2),
(339, 1, 'XtXl05DvXtS+0rxzCl+tzcvK13c1fvTpjIXtm919Or9aryls5NwAAAABJRU5ErkJggg==', 1),
(341, 2, 'wC2VDt1yN1pZgAAAABJRU5ErkJggg==', 1),
(342, 2, 'XtXl05DvXtS+0rxzCl+tzcvK13c1fvTpjIXtm919Or9aryls5NwAAAABJRU5ErkJggg==', 2),
(383, 46, 'D0r8vQe8UEO1AAAAAElFTkSuQmCC', 1),
(384, 46, 'AAAAAElFTkSuQmCC', 2),
(385, 47, '4131b92e4a9c7779.png', 1),
(386, 48, '242d8410b3e40d42.png', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `projects_likes`
--

CREATE TABLE `projects_likes` (
  `id` int(35) NOT NULL,
  `id_project` int(35) NOT NULL,
  `id_user_send` int(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `projects_likes`
--

INSERT INTO `projects_likes` (`id`, `id_project`, `id_user_send`) VALUES
(21, 2, 19),
(23, 1, 24),
(24, 2, 24),
(25, 3, 24),
(26, 1, 19),
(27, 42, 19),
(29, 3, 19),
(30, 1, 76),
(31, 45, 76),
(38, 45, 78),
(88, 2, 78),
(94, 46, 78),
(96, 1, 78);

-- --------------------------------------------------------

--
-- Estrutura da tabela `projects_stats_snapshot`
--

CREATE TABLE `projects_stats_snapshot` (
  `id_snapshot` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `id_project` int(11) DEFAULT NULL,
  `likes` int(11) DEFAULT NULL,
  `comments` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `projects_stats_snapshot`
--

INSERT INTO `projects_stats_snapshot` (`id_snapshot`, `date`, `id_project`, `likes`, `comments`) VALUES
(1, '2024-07-08', 2, 3, 0),
(2, '2024-07-08', 1, 4, 0),
(3, '2024-07-08', 3, 2, 0),
(4, '2024-07-08', 42, 1, 0),
(5, '2024-07-08', 45, 2, 0),
(6, '2024-07-08', 46, 1, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `rating`
--

CREATE TABLE `rating` (
  `id` int(35) NOT NULL,
  `id_send` int(11) NOT NULL,
  `id_receive` int(11) NOT NULL,
  `stars` int(35) NOT NULL,
  `date` date DEFAULT NULL,
  `comment` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `rating`
--

INSERT INTO `rating` (`id`, `id_send`, `id_receive`, `stars`, `date`, `comment`) VALUES
(1, 5, 19, 4, '2024-05-24', 'Grande artista'),
(2, 5, 19, 2, '1900-01-12', 'incrivel'),
(6, 5, 19, 4, '2024-05-10', '                                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis voluptas debitis dolorum labore reiciendis alias ipsa fuga unde repellendus autem consequuntur at itaque, reprehenderit, impedit ducimus mollitia? Tenetur, molestias quaerat.\n\nLorem ipsum dolor sit, amet consectetur adipisicing elit. Necessitatibus voluptatibus minima vel iure, dignissimos alias. Quia id blanditiis eum, aliquam consectetur praesentium ea repellat laudantium. Modi cum provident voluptate temporibus. \n\nLorem ipsum dolor, sit amet consectetur adipisicing elit. Iusto, voluptate? Sint, quia. Quis, quas est! Minus dolorum error, maiores inventore in, sint fuga hic temporibus impedit doloremque ex quas aperiam.\n\nLorem ipsum dolor sit amet consectetur adipisicing elit. Minima vel doloremque illo nesciunt, provident natus eos alias, debitis dolor tenetur vero ducimus facere ea enim, harum consequuntur iste possimus aliquid.\n\nLorem ipsum dolor sit amet consectetur adipisicing elit. Odit debitis cumque tempore sunt cupiditate impedit tenetur facere deleniti, eligendi possimus temporibus ullam magnam natus sapiente ut excepturi obcaecati quo autem.\n\nLorem ipsum dolor sit amet consectetur, adipisicing elit. Placeat consequatur ipsa ex? At provident voluptates perspiciatis aliquid, accusamus et deserunt velit reiciendis aperiam. At itaque similique, deleniti odio dolores explicabo.\n'),
(7, 5, 19, 1, '2024-05-10', 'brutal'),
(8, 5, 19, 4, '2024-05-10', 'brutal'),
(9, 5, 19, 4, '2024-05-10', 'brutal'),
(20, 78, 77, 4, '2024-07-08', 'drown'),
(21, 77, 78, 2, '2024-07-08', 'merdas');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_sender_chat` (`id_sender`),
  ADD KEY `fk_id_receive_chat` (`id_receive`);

--
-- Índices para tabela `contracts`
--
ALTER TABLE `contracts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_sender` (`id_sender`),
  ADD KEY `fk_id_receive` (`id_receive`);

--
-- Índices para tabela `follows`
--
ALTER TABLE `follows`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_user_follows` (`id_user`),
  ADD KEY `fk_id_followed_follows` (`id_followed`);

--
-- Índices para tabela `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_founder` (`id_founder`);

--
-- Índices para tabela `projects_collabs`
--
ALTER TABLE `projects_collabs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_project` (`id_project`),
  ADD KEY `fk_id_user` (`id_user`);

--
-- Índices para tabela `projects_comments`
--
ALTER TABLE `projects_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_user_send` (`id_user_send`),
  ADD KEY `fk_id_project2` (`id_project`),
  ADD KEY `fk_parent_comment_id` (`parent_comment_id`);

--
-- Índices para tabela `projects_comments_likes`
--
ALTER TABLE `projects_comments_likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_comment_likes` (`comment_id`),
  ADD KEY `fk_id_user_send2` (`id_user_send`);

--
-- Índices para tabela `projects_images`
--
ALTER TABLE `projects_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_project_images` (`id_project`);

--
-- Índices para tabela `projects_likes`
--
ALTER TABLE `projects_likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_project_likes` (`id_project`),
  ADD KEY `fk_id_user_send_likes` (`id_user_send`);

--
-- Índices para tabela `projects_stats_snapshot`
--
ALTER TABLE `projects_stats_snapshot`
  ADD PRIMARY KEY (`id_snapshot`),
  ADD KEY `fk_id_project3` (`id_project`);

--
-- Índices para tabela `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_send` (`id_send`),
  ADD KEY `fk_id_receive2` (`id_receive`) USING BTREE;

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT de tabela `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(35) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT de tabela `contracts`
--
ALTER TABLE `contracts`
  MODIFY `id` int(35) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `follows`
--
ALTER TABLE `follows`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT de tabela `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT de tabela `projects_collabs`
--
ALTER TABLE `projects_collabs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT de tabela `projects_comments`
--
ALTER TABLE `projects_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `projects_comments_likes`
--
ALTER TABLE `projects_comments_likes`
  MODIFY `id` int(35) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de tabela `projects_images`
--
ALTER TABLE `projects_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=387;

--
-- AUTO_INCREMENT de tabela `projects_likes`
--
ALTER TABLE `projects_likes`
  MODIFY `id` int(35) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT de tabela `projects_stats_snapshot`
--
ALTER TABLE `projects_stats_snapshot`
  MODIFY `id_snapshot` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT de tabela `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(35) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `chat`
--
ALTER TABLE `chat`
  ADD CONSTRAINT `fk_id_receive_chat` FOREIGN KEY (`id_receive`) REFERENCES `accounts` (`id`),
  ADD CONSTRAINT `fk_id_sender_chat` FOREIGN KEY (`id_sender`) REFERENCES `accounts` (`id`);

--
-- Limitadores para a tabela `contracts`
--
ALTER TABLE `contracts`
  ADD CONSTRAINT `fk_id_receive` FOREIGN KEY (`id_receive`) REFERENCES `accounts` (`id`),
  ADD CONSTRAINT `fk_id_sender` FOREIGN KEY (`id_sender`) REFERENCES `accounts` (`id`);

--
-- Limitadores para a tabela `follows`
--
ALTER TABLE `follows`
  ADD CONSTRAINT `fk_id_followed_follows` FOREIGN KEY (`id_followed`) REFERENCES `accounts` (`id`),
  ADD CONSTRAINT `fk_id_user_follows` FOREIGN KEY (`id_user`) REFERENCES `accounts` (`id`);

--
-- Limitadores para a tabela `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `fk_id_founder` FOREIGN KEY (`id_founder`) REFERENCES `accounts` (`id`);

--
-- Limitadores para a tabela `projects_collabs`
--
ALTER TABLE `projects_collabs`
  ADD CONSTRAINT `fk_id_project` FOREIGN KEY (`id_project`) REFERENCES `projects` (`id`),
  ADD CONSTRAINT `fk_id_user` FOREIGN KEY (`id_user`) REFERENCES `accounts` (`id`);

--
-- Limitadores para a tabela `projects_comments`
--
ALTER TABLE `projects_comments`
  ADD CONSTRAINT `fk_id_project2` FOREIGN KEY (`id_project`) REFERENCES `projects` (`id`),
  ADD CONSTRAINT `fk_id_user_send` FOREIGN KEY (`id_user_send`) REFERENCES `accounts` (`id`),
  ADD CONSTRAINT `fk_parent_comment_id` FOREIGN KEY (`parent_comment_id`) REFERENCES `projects_comments` (`id`);

--
-- Limitadores para a tabela `projects_comments_likes`
--
ALTER TABLE `projects_comments_likes`
  ADD CONSTRAINT `fk_id_comment_likes` FOREIGN KEY (`comment_id`) REFERENCES `projects_comments` (`id`),
  ADD CONSTRAINT `fk_id_user_send2` FOREIGN KEY (`id_user_send`) REFERENCES `accounts` (`id`);

--
-- Limitadores para a tabela `projects_images`
--
ALTER TABLE `projects_images`
  ADD CONSTRAINT `fk_id_project_images` FOREIGN KEY (`id_project`) REFERENCES `projects` (`id`);

--
-- Limitadores para a tabela `projects_likes`
--
ALTER TABLE `projects_likes`
  ADD CONSTRAINT `fk_id_project_likes` FOREIGN KEY (`id_project`) REFERENCES `projects` (`id`),
  ADD CONSTRAINT `fk_id_user_send_likes` FOREIGN KEY (`id_user_send`) REFERENCES `accounts` (`id`);

--
-- Limitadores para a tabela `projects_stats_snapshot`
--
ALTER TABLE `projects_stats_snapshot`
  ADD CONSTRAINT `fk_id_project3` FOREIGN KEY (`id_project`) REFERENCES `projects` (`id`);

--
-- Limitadores para a tabela `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `fk_id_receivee` FOREIGN KEY (`id_receive`) REFERENCES `accounts` (`id`),
  ADD CONSTRAINT `fk_id_send` FOREIGN KEY (`id_send`) REFERENCES `accounts` (`id`);

DELIMITER $$
--
-- Eventos
--
CREATE DEFINER=`root`@`localhost` EVENT `insert_stats_event` ON SCHEDULE EVERY 1 DAY STARTS '2024-07-07 00:00:00' ON COMPLETION NOT PRESERVE ENABLE DO BEGIN
  INSERT INTO projects_stats_snapshot (date, id_project, likes, comments)
  SELECT CURDATE(), p.id_project, 
         IFNULL(l.likes, 0) AS likes, 
         IFNULL(c.comments, 0) AS comments
  FROM (SELECT DISTINCT id_project FROM projects_comments
        UNION
        SELECT DISTINCT id_project FROM projects_likes) p
  LEFT JOIN (SELECT id_project, COUNT(*) AS likes FROM projects_likes GROUP BY id_project) l
  ON p.id_project = l.id_project
  LEFT JOIN (SELECT id_project, COUNT(*) AS comments FROM projects_comments GROUP BY id_project) c
  ON p.id_project = c.id_project;
END$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
