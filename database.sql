-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 02-Jul-2024 às 12:26
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

INSERT INTO `accounts` (`id`, `name`, `email`, `password`, `picture`, `picture_background`, `registered`, `method`, `verified`, `location`, `type`, `identity`, `url`, `about`, `number`, `Instagram`, `Active_Instagram`, `Youtube`, `Active_Youtube`, `Tiktok`, `Active_Tiktok`, `Blog`, `Active_Blog`, `id_name`) VALUES
(5, 'asjdasnka', 'asjdasnka@gmail.com', '', 'FotoPerfil.jpg', '', '2024-03-11 17:30:49', 'form', 'false', 'asd', 'singer', 1, '', '', '', '', 0, '', 0, '', 0, '', 0, 'Rita'),
(6, 'asdnkja', 'asdnkja@gmail.com', 'ajksndk@asjkdna', '450f755a089a2c83e790c7337d54c728.jpeg', '', '2024-03-11 17:34:26', 'form', 'true', 'aklsfd', 'dj', 1, '', '', '', '', 0, '', 0, '', 0, '', 0, 'joaninha'),
(10, 'happy', 'amldk@gmail.com', 'asd', 'img\\fotos\\servicos_img1.jpg', '', '2024-04-05 14:53:15', 'login', 'false', 'Sintra', 'Baterist', 1, '', '', '', '', 0, '', 0, '', 0, '', 0, 'happy'),
(11, 'Ruben Costa', 'ruben.escola.2006@gmail.com', '', 'https://lh3.googleusercontent.com/a/ACg8ocI84I3098-o2aoK5zMBBGTswW-2MLBIFs8_HzoX_ZKOb2doOrXn=s96-c', '', '2024-04-06 13:55:40', 'google', 'false', 'Cacem', 'Gastronomic', 1, '', '', '', '', 0, '', 0, '', 0, '', 0, 'Francisco'),
(19, 'asdasdas', 'beatsrubencosta@gmail.com', '123', '66827b30a4e4d.png', '66827b30a5117.png', '2024-05-04 17:45:18', 'google', 'false', 'Čačak, Sérvia', 'Rapper', 2, '19', 'Hi! I need more information asdniasdnasdnasd asjd askdj asjk dasjk dasjk djkas dkjas dkjasd akjd sdksja dasjkd ask Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias eius esse labore mollitia temporibus ducimus enim tempora nesciunt odit, libero voluptatem cupiditate repellat non dolor consequuntur maiores quam molestiae dolorum?\n\nHi! I need more information asdniasdnasdnasd asjd askdj asjk dasjk dasjk djkas dkjas dkjasd akjd sdksja dasjkd ask Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias eius esse labore mollitia temporibus ducimus enim tempora nesciunt odit, libero voluptatem cupiditate repellat non dolor consequuntur maiores quam molestiae dolorum?\n\nHi! I need more information asdniasdnasdnasd asjd askdj asjk dasjk dasjk djkas dkjas dkjasd akjd sdksja dasjkd ask Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias eius esse labore mollitia temporibus ducimus enim tempora nesciunt odit, libero voluptatem cupiditate repellat non dolor consequuntur maiores quam molestiae dolorum?\n\nHi! I need more information asdniasdnasdnasd asjd askdj asjk dasjk dasjk djkas dkjas dkjasd akjd sdksja dasjkd ask Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias eius esse labore mollitia temporibus ducimus enim tempora nesciunt odit, libero voluptatem cupiditate repellat non dolor consequuntur maiores quam molestiae dolorum?\n\nHi! I need more information asdniasdnasdnasd asjd askdj asjk dasjk dasjk djkas dkjas dkjasd akjd sdksja dasjkd ask Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias eius esse labore mollitia temporibus ducimus enim tempora nesciunt odit, libero voluptatem cupiditate repellat non dolor consequuntur maiores quam molestiae dolorum?\n\nHi! I need more information asdniasdnasdnasd asjd askdj asjk dasjk dasjk djkas dkjas dkjasd akjd sdksja dasjkd ask Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias eius esse labore mollitia temporibus ducimus enim tempora nesciunt odit, libero voluptatem cupiditate repellat non dolor consequuntur maiores quam molestiae dolorum?\n\nHi! I need more information asdniasdnasdnasd asjd askdj asjk dasjk dasjk djkas dkjas dkjasd akjd sdksja dasjkd ask Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias eius esse labore mollitia temporibus ducimus enim tempora nesciunt odit, libero voluptatem cupiditate repellat non dolor consequuntur maiores quam molestiae dolorum?\n\nHi! I need more information asdniasdnasdnasd asjd askdj asjk dasjk dasjk djkas dkjas dkjasd akjd sdksja dasjkd ask Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias eius esse labore mollitia temporibus ducimus enim tempora nesciunt odit, libero voluptatem cupiditate repellat non dolor consequuntur maiores quam molestiae dolorum?\n\nHi! I need more information asdniasdnasdnasd asjd askdj asjk dasjk dasjk djkas dkjas dkjasd akjd sdksja dasjkd ask Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias eius esse labore mollitia temporibus ducimus enim tempora nesciunt odit, libero voluptatem cupiditate repellat non dolor consequuntur maiores quam molestiae dolorum?\n                      ', '123123123', 'martingarrix', 0, 'martingarrix', 0, 'goncalo.s_', 1, 'www.fernandinhadswaippie.pt', 0, 'Ruben'),
(20, 'ola', 'ola@gmail.com', '123', './img/foto/default.jpg', '', '2024-05-07 02:39:21', 'form', '', '', '', 2, '', '', '', '', 0, '', 0, '', 0, '', 0, 'Rodrigo'),
(21, 'soufixe', 'soufixe@gmail.com', '123', './img/foto/default.jpg', '', '2024-05-07 02:40:24', 'form', '', '', '', 3, '', '', '', '', 0, '', 0, '', 0, '', 0, 'Ana202'),
(22, 'Simao', 'sougiro@gmail.com', '123', 'default.jpg', '', '2024-05-07 11:09:38', 'form', '', '', '', 1, '', '', '', '', 0, '', 0, '', 0, '', 0, 'ze04'),
(23, 'simao', 'simao@gmail.com', '123', 'default.jpg', '', '2024-05-07 11:44:28', 'form', '', '', '', 1, '', '', '', '', 0, '', 0, '', 0, '', 0, 'kshmr'),
(24, 'Ruben Costa', 'rubencostagaming@gmail.com', '123', '668263bb23675.png', '668263b156f58.gif', '2024-05-08 17:54:09', 'google', 'false', '', '', 2, '24', '  ', '', '', 0, '', 0, '', 0, '', 0, 'ggBacon'),
(25, 'goncalinho', 'goncalinho@gmail.com', '123', './img/foto/default.jpg', '', '2024-05-21 14:08:44', 'form', '', '', '', 1, '', '', '', '', 0, '', 0, '', 0, '', 0, 'Dimitri'),
(26, 'ruben', 'costa@gmail.com', 'asd', '', '', '0000-00-00 00:00:00', '', '', 'asdf', '4', 0, '', '', '', '', 0, '', 0, '', 0, '', 0, 'Hardwell'),
(27, 'ruben', 'happy@gmail.com', '123', '', '', '0000-00-00 00:00:00', '', '', 'asdasd', '2', 0, '', '', '', '', 0, '', 0, '', 0, '', 0, 'Steve'),
(28, 'nome', 'email@gmail.com', 'palavra-passe', '', '', '0000-00-00 00:00:00', '', '', 'localização', '', 1, '', '', '', '', 0, '', 0, '', 0, '', 0, 'roberto'),
(29, 'Ruben', 'happy2@gmail.com', 'bananinha', '', '', '0000-00-00 00:00:00', '', '', 'LDLC Arena, Avenue Simone Veil, Décines-Charpieu, França', '', 0, '', '', '', '', 0, '', 0, '', 0, '', 0, 'happy'),
(30, 'Gonçalinho', 'goncalinhopan@pan.pt', 'goncalinho', '', '', '0000-00-00 00:00:00', '', '', 'Avanca, Portugal', '', 0, '', '', '', '', 0, '', 0, '', 0, '', 0, 'goncalinho'),
(31, 'nome', 'user@gmail.pcm', 'palavra-passe', '', '', '0000-00-00 00:00:00', '', '', 'Seychelles', '', 1, '', '', '', '', 0, '', 0, '', 0, '', 0, 'miguel'),
(32, '', '', '', '', '', '0000-00-00 00:00:00', '', '', '', '', 0, '', '', '', '', 0, '', 0, '', 0, '', 0, 'Frozen'),
(33, '', 's@gmail.com', '', '', '', '0000-00-00 00:00:00', '', '', '', '', 5, '', '', '', '', 0, '', 0, '', 0, '', 0, 'Martin'),
(34, 'ganggang', 'ksd@gmail.com', '123', '', '', '0000-00-00 00:00:00', '', '', 'SDF Building, GP Block, Sector V, Bidhannagar, Calcutá, Bengala Ocidental, Índia', '', 4, '', '', '', '', 0, '', 0, '', 0, '', 0, 'Jorge'),
(35, 'ggggggggg', 'asd@gmail.com', '1234567', '', '', '0000-00-00 00:00:00', '', '', 'Buceta, Santa Cruz de La Sierra, Bolívia', '', 3, '', '', '', '', 0, '', 0, '', 0, '', 0, 'Carlos'),
(36, '                                Lost Lands', 'olateste2@gmail.com', 'ola', '', '', '0000-00-00 00:00:00', '', '', 'Mamas Joint Road, MCC B Block, MCC, Davanagere, Karnataka, Índia', '', 5, '', '', '', '', 0, '', 0, '', 0, '', 0, '                                                                                                                           LostLandsOfficial'),
(58, 'prod', 'happyzao@gmail.com', 'palavrapasse', '', '', '0000-00-00 00:00:00', '', '', 'Galveias, Portugal', '', 3, '', '', '', '', 0, '', 0, '', 0, '', 0, 'happyksd');

-- --------------------------------------------------------

--
-- Estrutura da tabela `agencybooking_members`
--

CREATE TABLE `agencybooking_members` (
  `id` int(35) NOT NULL,
  `id_agency` int(35) NOT NULL,
  `id_member` int(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(39, 19, 10, 'mm', 0, '2024-07-02 09:21:27');

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
(8, 19, 28, 'LA7PYwQEevtIanTlq23zG6hj.pdf', 'Gostava de atuar num festival', 0, '2024-07-01');

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
(87, 19, 26);

-- --------------------------------------------------------

--
-- Estrutura da tabela `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `id_founder` int(11) NOT NULL,
  `nome` text NOT NULL,
  `imagem` text NOT NULL,
  `descricao` text NOT NULL,
  `local` text NOT NULL,
  `data` date DEFAULT NULL,
  `Event` text NOT NULL,
  `Booking` text NOT NULL,
  `PrivacyProjects` int(35) NOT NULL,
  `PrivacyLikes` int(35) NOT NULL,
  `PrivacyComments` int(35) NOT NULL,
  `impressions` int(35) NOT NULL,
  `likes` int(35) NOT NULL,
  `comments` int(35) NOT NULL,
  `organic` int(35) NOT NULL,
  `deleted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `projects`
--

INSERT INTO `projects` (`id`, `id_founder`, `nome`, `imagem`, `descricao`, `local`, `data`, `Event`, `Booking`, `PrivacyProjects`, `PrivacyLikes`, `PrivacyComments`, `impressions`, `likes`, `comments`, `organic`, `deleted`) VALUES
(1, 19, 'Lost Landssss', 'ola.jpg', 'Atuar no Lost Lands é uma experiência surreal. Desde o momento em que coloco os pés no palco até o momento em que saio, é uma montanha-russa de emoções e energia. O Lost Lands tem uma energia única, uma mistura de selvageria e comunidade que é difícil de replicar em qualquer outro lugar.\n\nO palco é colossal, uma verdadeira maravilha visual. As luzes, os telões, o som estrondoso - tudo conspira para criar uma atmosfera que te envolve completamente. É como estar em outro mundo.\n\nInteragir com a multidão é uma das melhores partes. Ver milhares de pessoas reunidas, todas compartilhando a mesma paixão pela música, é incrivelmente inspirador. Eles estão lá para se divertir, para se perder na batida, e eu estou lá para levá-los nessa jornada.\n\nClaro, há sempre desafios. Manter a energia alta durante um set longo pode ser exigente, mas é aí que reside a magia da atuação ao vivo. É uma troca de energia constante entre o DJ e o público, e quando você está no Lost Lands, essa troca atinge um nível totalmente novo.\n\nNo final do dia, atuar no Lost Lands é mais do que apenas tocar algumas músicas. É uma experiência imersiva, uma celebração da música e da cultura da dance music. E quando você está no palco, fazendo parte dessa celebração, é uma sensação indescritível.', 'Associação Vida Nova Lar Idosos, Rua das Agras, Pardilhó, Portugal', '2024-06-16', 'asd', 'aaaaaaaaaa', 3, 6, 9, 0, 0, 0, 0, 0),
(2, 19, 'Tommrowland', 'ola2.jpg', 'Atuar no Lost Lands é uma experiência surreal. Desde o momento em que coloco os pés no palco até o momento em que saio, é uma montanha-russa de emoções e energia. O Lost Lands tem uma energia única, uma mistura de selvageria e comunidade que é difícil de replicar em qualquer outro lugar.\n\nO palco é colossal, uma verdadeira maravilha visual. As luzes, os telões, o som estrondoso - tudo conspira para criar uma atmosfera que te envolve completamente. É como estar em outro mundo.\n\nInteragir com a multidão é uma das melhores partes. Ver milhares de pessoas reunidas, todas compartilhando a mesma paixão pela música, é incrivelmente inspirador. Eles estão lá para se divertir, para se perder na batida, e eu estou lá para levá-los nessa jornada.\n\nClaro, há sempre desafios. Manter a energia alta durante um set longo pode ser exigente, mas é aí que reside a magia da atuação ao vivo. É uma troca de energia constante entre o DJ e o público, e quando você está no Lost Lands, essa troca atinge um nível totalmente novo.\n\nNo final do dia, atuar no Lost Lands é mais do que apenas tocar algumas músicas. É uma experiência imersiva, uma celebração da música e da cultura da dance music. E quando você está no palco, fazendo parte dessa celebração, é uma sensação indescritível.', '', '2000-07-07', '', '', 1, 6, 9, 0, 0, 0, 0, 0),
(3, 19, 'olaaa', 'ola.jpg', 'Isto é apenas um Rascunho', 'Lisboa, Portugal', '0000-00-00', '', '', 1, 6, 9, 0, 0, 0, 0, 0),
(4, 19, 'Frozen', '', 'Isto é apenas um Rascunho', '', '0000-00-00', '', '', 3, 6, 9, 0, 0, 0, 0, 0),
(10, 24, 'Rascunho', '', 'Isto é apenas um Rascunho', '', '0000-00-00', '', '', 3, 6, 9, 0, 0, 0, 0, 0),
(11, 19, 'elsa202', '', 'Isto é apenas uma elsa', 'Good Games Town Hall, Lower Ground, York Street, Cidade de Sydney Nova Gales do Sul, Austrália', '0000-00-00', 'elsinha', 'gg', 2, 5, 8, 0, 0, 0, 0, 0),
(12, 19, 'Rascunho', '', 'Isto é apenas um Rascunho', '', '0000-00-00', '', '', 3, 6, 9, 0, 0, 0, 0, 1),
(13, 19, 'Rascunho', '', 'Isto é apenas um Rascunho', '', '0000-00-00', '', '', 3, 6, 9, 0, 0, 0, 0, 0),
(14, 19, 'Rascunho', '', 'Isto é apenas um Rascunho', '', '0000-00-00', '', '', 3, 6, 9, 0, 0, 0, 0, 0),
(15, 19, 'Rascunho', '', 'Isto é apenas um Rascunho', '', '0000-00-00', '', '', 3, 6, 9, 0, 0, 0, 0, 0);

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
(2, 2, 21),
(22, 1, 20),
(23, 1, 10),
(24, 1, 19),
(25, 1, 27),
(26, 1, 19),
(27, 11, 20);

-- --------------------------------------------------------

--
-- Estrutura da tabela `projects_comments`
--

CREATE TABLE `projects_comments` (
  `id` int(35) NOT NULL,
  `id_project` int(35) NOT NULL,
  `id_user_send` int(35) NOT NULL,
  `comment` text NOT NULL,
  `parent_comment_id` int(35) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `projects_comments`
--

INSERT INTO `projects_comments` (`id`, `id_project`, `id_user_send`, `comment`, `parent_comment_id`) VALUES
(1, 1, 19, 'mariana', NULL),
(2, 1, 24, 'paixao era grande', NULL),
(3, 2, 22, 'asjkdnasdasdasdaskjad kfnsnadfnsdajkfnsadjkf sdajkf sdka fsdjkf ksdjaf ksadf ksdfjsakdf', NULL),
(4, 1, 22, 'sasdasdasdasjdknask das dkjas djkas kd assasdasdasdasjdknask das dkjas djkas kd assasdasdasdasjdknask das dkjas djkas kd assasdasdasdasjdknask das dkjas djkas kd assasdasdasdasjdknask das dkjas djkas kd assasdasdasdasjdknask das dkjas djkas kd assasdasdasdasjdknask das dkjas djkas kd assasdasdasdasjdknask das dkjas djkas kd as', 1),
(5, 1, 19, 'Obrigado <3', 3),
(6, 1, 19, 'mesmo asserio', NULL),
(7, 1, 19, 'a cena é que é mesmo', NULL),
(8, 1, 19, 'yah', 7),
(9, 1, 19, 'era era, dizes tu', 2),
(10, 1, 19, 'pois...', 2),
(11, 1, 19, 'ontem comi um cao', NULL),
(12, 2, 19, 'que cena bro', NULL),
(13, 2, 19, 'mesmo', 12),
(14, 1, 19, 'e eu um pastor alemão', 11),
(19, 2, 19, 'asds', NULL),
(20, 2, 19, 'esta respondido', 19),
(21, 1, 19, 'asdasd', NULL),
(22, 2, 19, 'olaaa', NULL),
(23, 2, 19, 'olaa', 22),
(24, 2, 19, 'ola  xd', 22),
(25, 2, 19, 'doja', NULL),
(26, 1, 19, 'bem dito', 1),
(27, 1, 19, 'ronaldo', NULL),
(28, 1, 19, 'altamento', NULL),
(29, 1, 19, 'concordo', 28),
(30, 1, 19, 'yahyahyah', 1),
(31, 1, 19, 'ola', 6),
(32, 2, 19, 'muito bom', NULL);

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
(2, 3, 22),
(10, 3, 19),
(11, 2, 19),
(12, 19, 19),
(14, 26, 19),
(15, 11, 19),
(16, 12, 19),
(18, 27, 19),
(19, 28, 19),
(20, 29, 19),
(21, 21, 19),
(22, 6, 19),
(23, 31, 19),
(24, 1, 19),
(25, 32, 19);

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
(281, 3, '8AeRnPGJIm4V8AAAAASUVORK5CYII=', 1),
(282, 3, '8AikbwswNo2I0AAAAASUVORK5CYII=', 2),
(300, 4, '8AeRnPGJIm4V8AAAAASUVORK5CYII=', 1),
(301, 4, 'D+XnYiu7oGQ7gAAAABJRU5ErkJggg==', 2),
(312, 1, 'D+XnYiu7oGQ7gAAAABJRU5ErkJggg==', 1),
(313, 1, 'XtXl05DvXtS+0rxzCl+tzcvK13c1fvTpjIXtm919Or9aryls5NwAAAABJRU5ErkJggg==', 2),
(335, 11, '8AikbwswNo2I0AAAAASUVORK5CYII=', 1),
(336, 11, 'D+XnYiu7oGQ7gAAAABJRU5ErkJggg==', 2),
(337, 2, 'XtXl05DvXtS+0rxzCl+tzcvK13c1fvTpjIXtm919Or9aryls5NwAAAABJRU5ErkJggg==', 1),
(338, 2, 'wC2VDt1yN1pZgAAAABJRU5ErkJggg==', 2);

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
(20, 1, 19),
(21, 2, 19);

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
  `organic` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `projects_stats_snapshot`
--

INSERT INTO `projects_stats_snapshot` (`id_snapshot`, `data`, `id_projeto`, `impressions`, `likes`, `comments`, `organic`) VALUES
(1, '2023-06-20', 1, 797, 40, 6, 448),
(2, '2023-06-21', 1, 720, 17, 3, 488),
(3, '2023-06-22', 1, 649, 46, 1, 491),
(4, '2023-06-23', 1, 877, 40, 5, 403),
(5, '2023-06-24', 1, 890, 42, 9, 416),
(6, '2023-06-25', 1, 954, 38, 3, 409),
(7, '2023-06-26', 1, 898, 10, 8, 457),
(8, '2023-06-27', 1, 586, 29, 4, 458),
(9, '2023-06-28', 1, 502, 34, 10, 454),
(10, '2023-06-29', 1, 862, 11, 1, 485),
(11, '2023-06-30', 1, 745, 9, 9, 423),
(12, '2023-07-01', 1, 536, 31, 9, 474),
(13, '2023-07-02', 1, 614, 41, 9, 413),
(14, '2023-07-03', 1, 918, 31, 5, 466),
(15, '2023-07-04', 1, 535, 50, 1, 418),
(16, '2023-07-05', 1, 506, 23, 3, 473),
(17, '2023-07-06', 1, 585, 29, 8, 442),
(18, '2023-07-07', 1, 942, 42, 5, 461),
(19, '2023-07-08', 1, 670, 16, 6, 427),
(20, '2023-07-09', 1, 537, 14, 7, 458),
(21, '2023-07-10', 1, 605, 31, 7, 464),
(22, '2023-07-11', 1, 518, 16, 10, 452),
(23, '2023-07-12', 1, 786, 20, 10, 432),
(24, '2023-07-13', 1, 847, 35, 7, 490),
(25, '2023-07-14', 1, 952, 12, 9, 450),
(26, '2023-07-15', 1, 966, 8, 9, 477),
(27, '2023-07-16', 1, 549, 30, 5, 487),
(28, '2023-07-17', 1, 993, 5, 1, 434),
(29, '2023-07-18', 1, 963, 34, 6, 476),
(30, '2023-07-19', 1, 972, 11, 7, 412),
(31, '2023-07-20', 1, 720, 7, 3, 493),
(32, '2023-07-21', 1, 635, 49, 10, 465),
(33, '2023-07-22', 1, 516, 19, 7, 436),
(34, '2023-07-23', 1, 588, 45, 6, 411),
(35, '2023-07-24', 1, 993, 12, 7, 462),
(36, '2023-07-25', 1, 931, 50, 9, 417),
(37, '2023-07-26', 1, 588, 7, 1, 436),
(38, '2023-07-27', 1, 516, 8, 8, 486),
(39, '2023-07-28', 1, 517, 49, 3, 488),
(40, '2023-07-29', 1, 731, 44, 1, 450),
(41, '2023-07-30', 1, 905, 30, 9, 427),
(42, '2023-07-31', 1, 868, 16, 7, 497),
(43, '2023-08-01', 1, 876, 49, 10, 465),
(44, '2023-08-02', 1, 813, 18, 10, 430),
(45, '2023-08-03', 1, 667, 48, 2, 412),
(46, '2023-08-04', 1, 945, 27, 2, 438),
(47, '2023-08-05', 1, 831, 50, 3, 406),
(48, '2023-08-06', 1, 557, 47, 5, 437),
(49, '2023-08-07', 1, 942, 29, 10, 488),
(50, '2023-08-08', 1, 737, 41, 2, 446),
(51, '2023-08-09', 1, 740, 9, 6, 455),
(52, '2023-08-10', 1, 829, 41, 3, 447),
(53, '2023-08-11', 1, 603, 37, 8, 406),
(54, '2023-08-12', 1, 946, 35, 8, 462),
(55, '2023-08-13', 1, 789, 34, 7, 449),
(56, '2023-08-14', 1, 757, 20, 8, 454),
(57, '2023-08-15', 1, 936, 12, 6, 432),
(58, '2023-08-16', 1, 708, 30, 5, 427),
(59, '2023-08-17', 1, 575, 22, 6, 423),
(60, '2023-08-18', 1, 977, 35, 9, 422),
(61, '2023-08-19', 1, 707, 6, 2, 456),
(62, '2023-08-20', 1, 845, 16, 4, 499),
(63, '2023-08-21', 1, 531, 26, 3, 440),
(64, '2023-08-22', 1, 549, 8, 9, 426),
(65, '2023-08-23', 1, 510, 33, 8, 431),
(66, '2023-08-24', 1, 939, 13, 3, 496),
(67, '2023-08-25', 1, 838, 46, 4, 433),
(68, '2023-08-26', 1, 972, 7, 7, 488),
(69, '2023-08-27', 1, 576, 28, 6, 418),
(70, '2023-08-28', 1, 604, 36, 6, 460),
(71, '2023-08-29', 1, 548, 26, 10, 416),
(72, '2023-08-30', 1, 536, 12, 8, 474),
(73, '2023-08-31', 1, 539, 44, 5, 449),
(74, '2023-09-01', 1, 697, 14, 3, 487),
(75, '2023-09-02', 1, 574, 32, 5, 498),
(76, '2023-09-03', 1, 904, 33, 8, 471),
(77, '2023-09-04', 1, 795, 34, 3, 463),
(78, '2023-09-05', 1, 848, 11, 5, 409),
(79, '2023-09-06', 1, 868, 6, 8, 451),
(80, '2023-09-07', 1, 976, 5, 1, 467),
(81, '2023-09-08', 1, 738, 22, 5, 446),
(82, '2023-09-09', 1, 615, 24, 3, 481),
(83, '2023-09-10', 1, 761, 45, 9, 433),
(84, '2023-09-11', 1, 664, 9, 4, 446),
(85, '2023-09-12', 1, 642, 17, 10, 487),
(86, '2023-09-13', 1, 984, 34, 3, 481),
(87, '2023-09-14', 1, 732, 22, 7, 432),
(88, '2023-09-15', 1, 904, 9, 9, 418),
(89, '2023-09-16', 1, 518, 17, 2, 438),
(90, '2023-09-17', 1, 994, 31, 6, 457),
(91, '2023-09-18', 1, 521, 47, 2, 413),
(92, '2023-09-19', 1, 914, 16, 5, 493),
(93, '2023-09-20', 1, 558, 16, 7, 410),
(94, '2023-09-21', 1, 509, 24, 10, 464),
(95, '2023-09-22', 1, 671, 33, 1, 494),
(96, '2023-09-23', 1, 751, 50, 2, 420),
(97, '2023-09-24', 1, 633, 27, 9, 423),
(98, '2023-09-25', 1, 968, 50, 6, 436),
(99, '2023-09-26', 1, 992, 47, 5, 474),
(100, '2023-09-27', 1, 961, 24, 5, 405),
(101, '2023-09-28', 1, 596, 9, 7, 458),
(102, '2023-09-29', 1, 996, 8, 6, 483),
(103, '2023-09-30', 1, 618, 5, 8, 473),
(104, '2023-10-01', 1, 573, 25, 10, 497),
(105, '2023-10-02', 1, 647, 31, 3, 425),
(106, '2023-10-03', 1, 867, 25, 1, 425),
(107, '2023-10-04', 1, 781, 46, 4, 444),
(108, '2023-10-05', 1, 710, 40, 10, 468),
(109, '2023-10-06', 1, 698, 7, 4, 406),
(110, '2023-10-07', 1, 583, 40, 6, 434),
(111, '2023-10-08', 1, 893, 19, 6, 416),
(112, '2023-10-09', 1, 935, 9, 10, 429),
(113, '2023-10-10', 1, 694, 45, 8, 444),
(114, '2023-10-11', 1, 973, 27, 5, 430),
(115, '2023-10-12', 1, 568, 48, 9, 418),
(116, '2023-10-13', 1, 778, 44, 9, 437),
(117, '2023-10-14', 1, 700, 30, 9, 460),
(118, '2023-10-15', 1, 628, 20, 1, 464),
(119, '2023-10-16', 1, 704, 7, 9, 482),
(120, '2023-10-17', 1, 882, 19, 9, 406),
(121, '2023-10-18', 1, 715, 8, 3, 468),
(122, '2023-10-19', 1, 523, 34, 5, 481),
(123, '2023-10-20', 1, 806, 26, 9, 488),
(124, '2023-10-21', 1, 760, 21, 6, 454),
(125, '2023-10-22', 1, 822, 13, 9, 465),
(126, '2023-10-23', 1, 850, 23, 4, 451),
(127, '2023-10-24', 1, 700, 10, 10, 414),
(128, '2023-10-25', 1, 662, 32, 9, 467),
(129, '2023-10-26', 1, 567, 29, 10, 401),
(130, '2023-10-27', 1, 757, 34, 8, 425),
(131, '2023-10-28', 1, 937, 8, 8, 424),
(132, '2023-10-29', 1, 970, 50, 3, 443),
(133, '2023-10-30', 1, 531, 42, 8, 468),
(134, '2023-10-31', 1, 836, 33, 5, 468),
(135, '2023-11-01', 1, 674, 41, 1, 472),
(136, '2023-11-02', 1, 839, 44, 5, 467),
(137, '2023-11-03', 1, 949, 27, 10, 403),
(138, '2023-11-04', 1, 684, 29, 10, 429),
(139, '2023-11-05', 1, 916, 10, 5, 438),
(140, '2023-11-06', 1, 501, 6, 8, 422),
(141, '2023-11-07', 1, 757, 32, 7, 456),
(142, '2023-11-08', 1, 707, 25, 8, 469),
(143, '2023-11-09', 1, 825, 21, 7, 496),
(144, '2023-11-10', 1, 766, 8, 6, 410),
(145, '2023-11-11', 1, 724, 35, 2, 463),
(146, '2023-11-12', 1, 533, 35, 1, 409),
(147, '2023-11-13', 1, 999, 18, 4, 446),
(148, '2023-11-14', 1, 886, 20, 7, 493),
(149, '2023-11-15', 1, 634, 21, 8, 474),
(150, '2023-11-16', 1, 838, 50, 1, 482),
(151, '2023-11-17', 1, 949, 28, 7, 456),
(152, '2023-11-18', 1, 517, 16, 1, 470),
(153, '2023-11-19', 1, 551, 39, 7, 481),
(154, '2023-11-20', 1, 532, 15, 8, 452),
(155, '2023-11-21', 1, 558, 28, 2, 483),
(156, '2023-11-22', 1, 974, 47, 7, 401),
(157, '2023-11-23', 1, 833, 33, 7, 464),
(158, '2023-11-24', 1, 581, 28, 7, 453),
(159, '2023-11-25', 1, 924, 36, 5, 435),
(160, '2023-11-26', 1, 531, 30, 3, 405),
(161, '2023-11-27', 1, 843, 28, 9, 416),
(162, '2023-11-28', 1, 534, 21, 10, 455),
(163, '2023-11-29', 1, 964, 45, 2, 496),
(164, '2023-11-30', 1, 514, 23, 10, 406),
(165, '2023-12-01', 1, 985, 42, 6, 434),
(166, '2023-12-02', 1, 960, 30, 6, 426),
(167, '2023-12-03', 1, 787, 19, 1, 486),
(168, '2023-12-04', 1, 561, 21, 6, 428),
(169, '2023-12-05', 1, 732, 15, 1, 409),
(170, '2023-12-06', 1, 940, 14, 10, 401),
(171, '2023-12-07', 1, 856, 49, 10, 464),
(172, '2023-12-08', 1, 659, 44, 6, 487),
(173, '2023-12-09', 1, 758, 27, 8, 451),
(174, '2023-12-10', 1, 918, 41, 3, 415),
(175, '2023-12-11', 1, 924, 12, 4, 472),
(176, '2023-12-12', 1, 868, 18, 1, 422),
(177, '2023-12-13', 1, 650, 23, 6, 484),
(178, '2023-12-14', 1, 582, 9, 1, 490),
(179, '2023-12-15', 1, 644, 13, 10, 425),
(180, '2023-12-16', 1, 708, 15, 8, 477),
(181, '2023-12-17', 1, 654, 18, 10, 488),
(182, '2023-12-18', 1, 596, 10, 9, 478),
(183, '2023-12-19', 1, 953, 29, 5, 438),
(184, '2023-12-20', 1, 674, 32, 6, 490),
(185, '2023-12-21', 1, 563, 8, 4, 445),
(186, '2023-12-22', 1, 668, 5, 3, 444),
(187, '2023-12-23', 1, 590, 26, 6, 500),
(188, '2023-12-24', 1, 749, 5, 3, 462),
(189, '2023-12-25', 1, 576, 47, 5, 433),
(190, '2023-12-26', 1, 653, 43, 7, 437),
(191, '2023-12-27', 1, 816, 12, 5, 489),
(192, '2023-12-28', 1, 746, 49, 8, 471),
(193, '2023-12-29', 1, 790, 14, 6, 453),
(194, '2023-12-30', 1, 597, 46, 8, 490),
(195, '2023-12-31', 1, 922, 11, 3, 469),
(196, '2024-01-01', 1, 664, 31, 3, 420),
(197, '2024-01-02', 1, 546, 7, 9, 400),
(198, '2024-01-03', 1, 546, 30, 2, 400),
(199, '2024-01-04', 1, 550, 19, 1, 474),
(200, '2024-01-05', 1, 554, 9, 5, 445),
(201, '2024-01-06', 1, 818, 26, 5, 500),
(202, '2024-01-07', 1, 926, 20, 5, 496),
(203, '2024-01-08', 1, 654, 24, 10, 487),
(204, '2024-01-09', 1, 591, 49, 3, 456),
(205, '2024-01-10', 1, 916, 25, 1, 477),
(206, '2024-01-11', 1, 963, 13, 2, 459),
(207, '2024-01-12', 1, 783, 36, 8, 454),
(208, '2024-01-13', 1, 647, 18, 3, 421),
(209, '2024-01-14', 1, 812, 21, 10, 444),
(210, '2024-01-15', 1, 755, 43, 8, 430),
(211, '2024-01-16', 1, 976, 31, 7, 482),
(212, '2024-01-17', 1, 666, 27, 7, 474),
(213, '2024-01-18', 1, 711, 27, 7, 463),
(214, '2024-01-19', 1, 810, 35, 4, 499),
(215, '2024-01-20', 1, 935, 48, 2, 438),
(216, '2024-01-21', 1, 885, 6, 4, 423),
(217, '2024-01-22', 1, 625, 6, 3, 450),
(218, '2024-01-23', 1, 887, 7, 6, 410),
(219, '2024-01-24', 1, 902, 39, 8, 434),
(220, '2024-01-25', 1, 949, 16, 4, 402),
(221, '2024-01-26', 1, 817, 9, 7, 431),
(222, '2024-01-27', 1, 630, 16, 3, 448),
(223, '2024-01-28', 1, 991, 16, 2, 462),
(224, '2024-01-29', 1, 659, 48, 5, 443),
(225, '2024-01-30', 1, 801, 33, 5, 448),
(226, '2024-01-31', 1, 753, 9, 3, 476),
(227, '2024-02-01', 1, 502, 16, 4, 467),
(228, '2024-02-02', 1, 898, 23, 4, 409),
(229, '2024-02-03', 1, 737, 44, 8, 420),
(230, '2024-02-04', 1, 992, 26, 7, 433),
(231, '2024-02-05', 1, 916, 16, 8, 444),
(232, '2024-02-06', 1, 709, 21, 10, 428),
(233, '2024-02-07', 1, 598, 31, 5, 404),
(234, '2024-02-08', 1, 786, 25, 2, 460),
(235, '2024-02-09', 1, 658, 28, 8, 459),
(236, '2024-02-10', 1, 605, 33, 8, 474),
(237, '2024-02-11', 1, 845, 12, 10, 486),
(238, '2024-02-12', 1, 730, 30, 1, 426),
(239, '2024-02-13', 1, 516, 37, 10, 417),
(240, '2024-02-14', 1, 561, 39, 6, 467),
(241, '2024-02-15', 1, 988, 32, 2, 439),
(242, '2024-02-16', 1, 898, 47, 7, 494),
(243, '2024-02-17', 1, 814, 19, 8, 482),
(244, '2024-02-18', 1, 652, 40, 4, 446),
(245, '2024-02-19', 1, 954, 13, 5, 461),
(246, '2024-02-20', 1, 656, 50, 1, 427),
(247, '2024-02-21', 1, 701, 7, 9, 464),
(248, '2024-02-22', 1, 546, 10, 3, 493),
(249, '2024-02-23', 1, 771, 48, 1, 467),
(250, '2024-02-24', 1, 626, 11, 4, 487),
(251, '2024-02-25', 1, 792, 21, 2, 499),
(252, '2024-02-26', 1, 584, 24, 9, 402),
(253, '2024-02-27', 1, 816, 16, 2, 497),
(254, '2024-02-28', 1, 562, 49, 7, 480),
(255, '2024-02-29', 1, 559, 28, 1, 493),
(256, '2024-03-01', 1, 959, 50, 3, 453),
(257, '2024-03-02', 1, 786, 36, 1, 442),
(258, '2024-03-03', 1, 933, 26, 2, 440),
(259, '2024-03-04', 1, 693, 25, 1, 451),
(260, '2024-03-05', 1, 519, 50, 10, 420),
(261, '2024-03-06', 1, 970, 49, 1, 413),
(262, '2024-03-07', 1, 841, 11, 9, 497),
(263, '2024-03-08', 1, 975, 5, 8, 460),
(264, '2024-03-09', 1, 771, 49, 8, 448),
(265, '2024-03-10', 1, 761, 26, 9, 458),
(266, '2024-03-11', 1, 551, 41, 1, 451),
(267, '2024-03-12', 1, 802, 50, 8, 451),
(268, '2024-03-13', 1, 592, 49, 10, 428),
(269, '2024-03-14', 1, 769, 14, 9, 469),
(270, '2024-03-15', 1, 541, 35, 5, 470),
(271, '2024-03-16', 1, 899, 19, 10, 435),
(272, '2024-03-17', 1, 685, 33, 2, 495),
(273, '2024-03-18', 1, 959, 30, 9, 408),
(274, '2024-03-19', 1, 936, 40, 9, 410),
(275, '2024-03-20', 1, 671, 21, 4, 472),
(276, '2024-03-21', 1, 845, 26, 10, 432),
(277, '2024-03-22', 1, 689, 49, 4, 421),
(278, '2024-03-23', 1, 572, 40, 3, 401),
(279, '2024-03-24', 1, 952, 45, 5, 479),
(280, '2024-03-25', 1, 508, 23, 4, 423),
(281, '2024-03-26', 1, 504, 40, 6, 471),
(282, '2024-03-27', 1, 738, 15, 8, 485),
(283, '2024-03-28', 1, 715, 35, 2, 466),
(284, '2024-03-29', 1, 846, 22, 7, 491),
(285, '2024-03-30', 1, 982, 48, 2, 478),
(286, '2024-03-31', 1, 841, 9, 1, 423),
(287, '2024-04-01', 1, 682, 25, 4, 467),
(288, '2024-04-02', 1, 932, 25, 7, 436),
(289, '2024-04-03', 1, 825, 7, 7, 491),
(290, '2024-04-04', 1, 898, 39, 5, 451),
(291, '2024-04-05', 1, 892, 38, 6, 479),
(292, '2024-04-06', 1, 740, 29, 10, 414),
(293, '2024-04-07', 1, 870, 18, 3, 425),
(294, '2024-04-08', 1, 591, 49, 9, 423),
(295, '2024-04-09', 1, 943, 25, 10, 400),
(296, '2024-04-10', 1, 837, 42, 3, 456),
(297, '2024-04-11', 1, 581, 18, 5, 465),
(298, '2024-04-12', 1, 550, 46, 1, 462),
(299, '2024-04-13', 1, 652, 9, 5, 441),
(300, '2024-04-14', 1, 945, 21, 4, 449),
(301, '2024-04-15', 1, 731, 17, 7, 465),
(302, '2024-04-16', 1, 751, 15, 7, 433),
(303, '2024-04-17', 1, 851, 23, 7, 479),
(304, '2024-04-18', 1, 569, 16, 6, 490),
(305, '2024-04-19', 1, 866, 28, 7, 448),
(306, '2024-04-20', 1, 513, 47, 8, 402),
(307, '2024-04-21', 1, 942, 37, 2, 444),
(308, '2024-04-22', 1, 770, 13, 3, 439),
(309, '2024-04-23', 1, 512, 13, 5, 423),
(310, '2024-04-24', 1, 696, 45, 1, 486),
(311, '2024-04-25', 1, 916, 27, 8, 465),
(312, '2024-04-26', 1, 570, 39, 5, 440),
(313, '2024-04-27', 1, 588, 47, 9, 407),
(314, '2024-04-28', 1, 736, 35, 7, 423),
(315, '2024-04-29', 1, 993, 50, 8, 464),
(316, '2024-04-30', 1, 948, 30, 6, 472),
(317, '2024-05-01', 1, 775, 38, 8, 432),
(318, '2024-05-02', 1, 725, 47, 5, 493),
(319, '2024-05-03', 1, 631, 24, 3, 404),
(320, '2024-05-04', 1, 963, 14, 5, 466),
(321, '2024-05-05', 1, 571, 36, 3, 452),
(322, '2024-05-06', 1, 622, 37, 4, 470),
(323, '2024-05-07', 1, 982, 7, 4, 455),
(324, '2024-05-08', 1, 739, 17, 5, 487),
(325, '2024-05-09', 1, 920, 50, 5, 459),
(326, '2024-05-10', 1, 883, 44, 7, 423),
(327, '2024-05-11', 1, 739, 5, 6, 430),
(328, '2024-05-12', 1, 506, 36, 6, 436),
(329, '2024-05-13', 1, 556, 5, 6, 404),
(330, '2024-05-14', 1, 681, 44, 4, 487),
(331, '2024-05-15', 1, 861, 23, 1, 430),
(332, '2024-05-16', 1, 993, 50, 10, 401),
(333, '2024-05-17', 1, 946, 17, 10, 472),
(334, '2024-05-18', 1, 931, 21, 7, 440),
(335, '2024-05-19', 1, 836, 49, 2, 455),
(336, '2024-05-20', 1, 569, 46, 2, 460),
(337, '2024-05-21', 1, 863, 23, 4, 470),
(338, '2024-05-22', 1, 734, 27, 7, 499),
(339, '2024-05-23', 1, 744, 9, 8, 424),
(340, '2024-05-24', 1, 826, 50, 9, 402),
(341, '2024-05-25', 1, 564, 23, 5, 476),
(342, '2024-05-26', 1, 506, 23, 8, 474),
(343, '2024-05-27', 1, 569, 35, 4, 493),
(344, '2024-05-28', 1, 955, 32, 10, 445),
(345, '2024-05-29', 1, 828, 36, 5, 432),
(346, '2024-05-30', 1, 628, 10, 6, 416),
(347, '2024-05-31', 1, 529, 13, 10, 437),
(348, '2024-06-01', 1, 957, 17, 6, 449),
(349, '2024-06-02', 1, 517, 6, 8, 410),
(350, '2024-06-03', 1, 571, 34, 4, 498),
(351, '2024-06-04', 1, 896, 31, 10, 429),
(352, '2024-06-05', 1, 954, 7, 9, 444),
(353, '2024-06-06', 1, 511, 34, 2, 470),
(354, '2024-06-07', 1, 684, 22, 4, 476),
(355, '2024-06-08', 1, 974, 29, 6, 496),
(356, '2024-06-09', 1, 530, 33, 10, 443),
(357, '2024-06-10', 1, 653, 46, 4, 463),
(358, '2024-06-11', 1, 667, 29, 7, 482),
(359, '2024-06-12', 1, 922, 17, 7, 412),
(360, '2024-06-13', 1, 865, 9, 10, 435),
(361, '2024-06-14', 1, 958, 16, 7, 408),
(362, '2024-06-15', 1, 915, 22, 8, 449),
(363, '2024-06-16', 1, 522, 47, 1, 456),
(364, '2024-06-17', 1, 623, 8, 10, 475),
(365, '2024-06-18', 1, 732, 37, 4, 475);

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
(6, 19, 19, 4, '2024-05-10', '                                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis voluptas debitis dolorum labore reiciendis alias ipsa fuga unde repellendus autem consequuntur at itaque, reprehenderit, impedit ducimus mollitia? Tenetur, molestias quaerat.\n\nLorem ipsum dolor sit, amet consectetur adipisicing elit. Necessitatibus voluptatibus minima vel iure, dignissimos alias. Quia id blanditiis eum, aliquam consectetur praesentium ea repellat laudantium. Modi cum provident voluptate temporibus. \n\nLorem ipsum dolor, sit amet consectetur adipisicing elit. Iusto, voluptate? Sint, quia. Quis, quas est! Minus dolorum error, maiores inventore in, sint fuga hic temporibus impedit doloremque ex quas aperiam.\n\nLorem ipsum dolor sit amet consectetur adipisicing elit. Minima vel doloremque illo nesciunt, provident natus eos alias, debitis dolor tenetur vero ducimus facere ea enim, harum consequuntur iste possimus aliquid.\n\nLorem ipsum dolor sit amet consectetur adipisicing elit. Odit debitis cumque tempore sunt cupiditate impedit tenetur facere deleniti, eligendi possimus temporibus ullam magnam natus sapiente ut excepturi obcaecati quo autem.\n\nLorem ipsum dolor sit amet consectetur, adipisicing elit. Placeat consequatur ipsa ex? At provident voluptates perspiciatis aliquid, accusamus et deserunt velit reiciendis aperiam. At itaque similique, deleniti odio dolores explicabo.\n'),
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
-- Índices para tabela `agencybooking_members`
--
ALTER TABLE `agencybooking_members`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `artists`
--
ALTER TABLE `artists`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `contracts`
--
ALTER TABLE `contracts`
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
-- Índices para tabela `projects_comments_likes`
--
ALTER TABLE `projects_comments_likes`
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
-- AUTO_INCREMENT de tabela `agencybooking_members`
--
ALTER TABLE `agencybooking_members`
  MODIFY `id` int(35) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `artists`
--
ALTER TABLE `artists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(35) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de tabela `contracts`
--
ALTER TABLE `contracts`
  MODIFY `id` int(35) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `follows`
--
ALTER TABLE `follows`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT de tabela `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `projects_collabs`
--
ALTER TABLE `projects_collabs`
  MODIFY `id` int(35) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de tabela `projects_comments`
--
ALTER TABLE `projects_comments`
  MODIFY `id` int(35) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de tabela `projects_comments_likes`
--
ALTER TABLE `projects_comments_likes`
  MODIFY `id` int(35) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de tabela `projects_images`
--
ALTER TABLE `projects_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=339;

--
-- AUTO_INCREMENT de tabela `projects_likes`
--
ALTER TABLE `projects_likes`
  MODIFY `id` int(35) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

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
  MODIFY `id_snapshot` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=366;

--
-- AUTO_INCREMENT de tabela `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(35) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `saved`
--
ALTER TABLE `saved`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

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
