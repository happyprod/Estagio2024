-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 08-Jul-2024 às 16:56
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
  `mainEmail` text NOT NULL,
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

INSERT INTO `accounts` (`id`, `name`, `email`, `mainEmail`, `password`, `picture`, `picture_background`, `registered`, `location`, `identity`, `about`, `number`, `Instagram`, `Active_Instagram`, `Youtube`, `Active_Youtube`, `Tiktok`, `Active_Tiktok`, `Blog`, `Active_Blog`, `id_name`) VALUES
(79, 'Martijn Garritsen', 'martin@gmail.com', 'martingarrix@gmail.com', '$2y$10$M2.ypVCeR/y9pSzUFgOAnuDs1ECqcGr0oTeThm2/nWHdUwzNzagYi', '668bba906544e.jpeg', '668bba9065a28.gif', '2024-07-08 00:00:00', 'Holanda', 2, 'Olá, sou o Martin Garrix, um DJ e produtor musical nascido em 14 de maio de 1996, em Amstelveen, na Holanda. Desde pequeno, a música sempre foi minha paixão e, aos oito anos, já estava fascinado pela produção musical. Aos 17 anos, lancei minha primeira grande faixa, \"Animals\", que rapidamente se tornou um sucesso mundial, catapultando minha carreira para o estrelato.\n\nTrabalhar com outros artistas incríveis como Usher, Dua Lipa, e Tiësto foi uma grande honra e uma experiência inesquecível. Sempre procuro inovar e trazer algo novo para minhas produções e performances ao vivo.\n\nAlém da música, sou um grande defensor de causas sociais e ambientais, sempre buscando maneiras de usar minha influência para fazer o bem. Acredito que a música tem o poder de unir as pessoas e trazer felicidade, e é isso que me motiva todos os dias.\n\nEstou constantemente em turnê pelo mundo, levando minha música para fãs de todos os cantos, e trabalhando em novas músicas que espero que vocês gostem tanto quanto eu. Obrigado por fazerem parte dessa jornada incrível comigo!', '912123123', 'martingarrix', 1, 'martingarrix', 1, 'martingarrix', 1, 'www.martingarrix.com', 1, 'martingarrix'),
(80, 'Robbert Van', 'hardwell@gmail.com', 'hardwell@gmail.com', '$2y$10$arvIg4IS9G9NWT4W692PcOClAPCci1VFRRgr6oi7C71XFoMELRHNa', '668bc22e2d729.jpeg', '668bc22e2db44.jpeg', '2024-07-08 00:00:00', 'Breda, Países Baixos', 2, 'Olá, sou o Hardwell, um DJ e produtor musical nascido como Robbert van de Corput em 7 de janeiro de 1988, em Breda, na Holanda. Desde muito jovem, fui apaixonado pela música eletrônica e comecei a tocar aos 12 anos, inspirado por artistas como Tiësto. Aos 14 anos, já estava produzindo minhas próprias faixas e aos 18, comecei a ganhar reconhecimento no cenário musical.\n\nEm 2013 e 2014, fui eleito o DJ número 1 do mundo pela DJ Mag, um marco importante na minha carreira. Durante esses anos, lancei hits que marcaram a música eletrônica, como \"Spaceman\" e \"Apollo\". Além de minhas produções solo, tive a oportunidade de colaborar com grandes nomes da música, incluindo Armin van Buuren, Tiësto e Jason Derulo.\n\nCriar e compartilhar música sempre foi minha paixão, mas também sou dedicado a ajudar novos talentos a emergirem na indústria. Foi por isso que fundei a gravadora Revealed Recordings, que se tornou uma plataforma importante para jovens produtores mostrarem seu trabalho.\n\nAlém dos meus sucessos musicais, gosto de retribuir à comunidade e apoiar causas sociais, como a educação musical para jovens. Recentemente, fiz uma pausa nas turnês para focar mais em mim mesmo e em novas direções criativas.\n\nEstou sempre buscando evoluir e trazer algo novo para a música eletrônica. Agradeço a todos os meus fãs pelo apoio contínuo e por fazerem parte dessa incrível jornada musical comigo.', '911983328', 'hardwell', 1, 'hardwell', 1, 'hardwell', 1, 'www.hardwell.com', 1, 'hardwell'),
(81, 'Austin Post', 'postmalone@gmail.com', 'postmalone@gmail.com', '$2y$10$b1lNdv1.afKUxxo2PGFiE.C5lbFryWA/7Xac3BJRoasefJe37.v5C', '668bc62439b8b.jpeg', '668bc6243a32c.gif', '2024-07-08 00:00:00', 'Syracuse, NY, Estados Unidos', 2, 'Olá, sou o Post Malone, nasci como Austin Richard Post em 4 de julho de 1995, em Syracuse, Nova York. Cresci no Texas e desde pequeno fui fascinado pela música. Meu interesse começou com o heavy metal, mas ao longo dos anos, me envolvi com diversos gêneros musicais, do rap ao country.\n\nMinha carreira começou a decolar em 2015 com o lançamento de \"White Iverson\", que rapidamente se tornou um sucesso viral. A partir daí, lancei meu primeiro álbum, \"Stoney\", em 2016, que incluía hits como \"Congratulations\". Este álbum marcou o início de uma série de sucessos que culminaram em discos como \"Beerbongs & Bentleys\" e \"Hollywood\'s Bleeding\", que consolidaram minha posição como um dos artistas mais influentes da música contemporânea.\n\nColaborar com artistas como Swae Lee, Ozzy Osbourne e Travis Scott foi uma experiência incrível que ampliou meus horizontes musicais. Eu gosto de misturar estilos e trazer algo único em cada faixa, sempre tentando inovar e surpreender meus fãs.\n\nAlém da música, sou apaixonado por tatuagens e meu corpo é uma verdadeira tela onde expresso minha arte e minhas experiências de vida. Também gosto de videogames, moda e carros.\n\nEstou sempre buscando novas formas de me expressar e conectar com meus fãs. Agradeço a todos pelo apoio contínuo e por estarem comigo nessa jornada. A música é a minha vida, e estou empolgado para ver o que o futuro nos reserva.', '939829478', 'postmalone', 1, 'postmalone', 1, 'postmalone', 1, 'www.postmalone.com', 1, 'postmalone'),
(82, 'Rob Light', 'roblight@gmail.com', 'roblight@gmail.com', '$2y$10$LblgcdfFkED7ad29oy2u9ONZk9qwsfxkovU6PyzJ164KtBrhwFoM6', '668bcdd1e247c.png', '668bcdd1e4230.jpeg', '2024-07-08 00:00:00', 'Califórnia, Estados Unidos', 3, 'Olá, sou Rob Light, chefe da divisão de música na Creative Artists Agency (CAA). Desde que comecei minha carreira na CAA na década de 1980, tenho trabalhado arduamente para me tornar um dos agentes de booking mais influentes na indústria da música.\n\nMinha Jornada\nMinha trajetória na CAA começou há várias décadas, e ao longo dos anos, tive a oportunidade de representar uma vasta gama de artistas, desde talentos emergentes até ícones estabelecidos da música. Meu papel envolve não apenas a negociação de contratos, mas também a criação de estratégias de carreira que ajudam os artistas a alcançar seus objetivos e a se conectar com seus fãs.\n\nConquistas e Filosofia\nDurante minha carreira, tenho me orgulhado de fechar alguns dos maiores negócios da indústria, sempre com o objetivo de beneficiar ao máximo os artistas que represento. Acredito que a chave para o sucesso está na construção de relacionamentos sólidos e de confiança, tanto com os artistas quanto com os promotores e parceiros da indústria.\n\nVisão para o Futuro\nEstou constantemente buscando novas oportunidades e tendências na música, procurando formas inovadoras de ajudar os artistas a prosperar em um mercado em constante mudança. Meu compromisso é continuar a apoiar e guiar os talentos musicais, garantindo que eles tenham os recursos e o suporte necessários para atingir o sucesso em todas as etapas de suas carreiras.', '928293123', 'roblight', 1, '', 0, '', 0, 'https://www.caa.com/', 1, 'roblight'),
(83, 'Marc Geiger', 'marcgeiger@gmail.com', 'marcgeiger@gmail.com', '$2y$10$m0qgrGClyabNg/yTQEqlE.PPyUKukTCEV44iNecLsB648TgXkUgAm', '668bcf53101e6.jpeg', '668bcf5310654.jpeg', '2024-07-08 00:00:00', 'New Jersey, Estados Unidos', 3, 'Oi, sou o Marc Geiger, agente veterano de booking na William Morris Endeavor (WME). Minha carreira na indústria da música tem sido longa e diversificada. Além de ser um dos co-fundadores do Lollapalooza, um dos festivais de música mais icônicos do mundo, tenho a honra de trabalhar com artistas de diferentes gêneros musicais, ajudando-os a alcançar novos patamares em suas carreiras. Meu objetivo sempre foi proporcionar as melhores oportunidades para meus clientes, seja fechando grandes turnês, negociando contratos importantes ou explorando novas formas de engajamento com os fãs. Acredito que a música é uma força poderosa que pode unir pessoas e criar experiências inesquecíveis, e estou comprometido em ajudar meus artistas a deixar sua marca no mundo.', '938739123', 'marcgeiger', 1, '', 0, '', 0, '', 0, 'marcgeiger'),
(84, 'David Zedeck', 'davidzedeck@gmail.com', 'davidzedeck@gmail.com', '$2y$10$6.cbHgqDZcxuKkv3tJs4OuLM16olwnF5OBFaajXo/l7gJBuN.6TvC', '668bd258124ad.jpeg', '668bd25812de8.jpeg', '2024-07-08 00:00:00', 'Califórnia, Estados Unidos', 3, 'Eu sou David Zedeck, um agente na UTA, especializado em representar músicos de renome mundial. Com uma combinação única de visão estratégica e conhecimento profundo da indústria, trabalho incansavelmente para garantir que meus clientes atinjam seus objetivos de carreira e expandam seu impacto globalmente.', '968738920', 'davidzedeck', 1, '', 0, '', 0, '', 0, 'davidzedeck'),
(85, 'Michael Rapino', 'michaelrapino@gmail.com', 'michaelrapino@gmail.com', '$2y$10$3s02MTOJ1L9jPb5xGs3hcu4ElTCXexFRDRMevtxpWI3H6gvKUvK4u', '668bd3a27d79f.jpeg', '668bd3a27da4f.jpeg', '2024-07-08 00:00:00', 'Canadá', 1, 'Sou Michael Rapino, o CEO da Live Nation Entertainment, líder global em entretenimento ao vivo. Com uma equipe dedicada em mais de 40 países, trabalhamos para criar experiências inesquecíveis para milhões de fãs ao redor do mundo. Nosso compromisso é conectar artistas excepcionais com seus públicos, transformando cada evento em um momento memorável.', '928249829', 'michaelrapino', 1, '', 0, '', 0, '', 0, 'michaelrapino'),
(86, 'Harvey Goldsmith', 'harveygoldsmith@gmail.com', 'harveygoldsmith@gmail.com', '$2y$10$LOTOeD75ZPGSpRs0el1GPeBmJhrisl/3w7eQwXdN40J34y29c7z8a', '668bd53eac47a.jpeg', '668bd53eacf4c.jpeg', '2024-07-08 00:00:00', 'Londres, Reino Unido', 1, 'Meu nome é Harvey Goldsmith e sou fundador da Harvey Goldsmith Productions. Com décadas de experiência, trago paixão e expertise para cada evento que organizo. Meu objetivo é não apenas produzir shows de classe mundial, mas também proporcionar uma plataforma para que artistas brilhem e fãs se conectem profundamente com sua música.', '938407814', 'harveygoldsmith', 1, '', 0, '', 0, '', 0, 'harveygoldsmith'),
(87, 'Don Law', 'donlaw@gmail.com', 'donlaw@gmail.com', '$2y$10$yjV1wTmHel8zRV0pHjH.YuO20vLrp3LWYPKr3gNdlfMIv7.5woNHm', '668bd86c6c2ed.jpeg', '668bd86c6d3d8.jpeg', '2024-07-08 00:00:00', 'Inglaterra, Reino Unido', 1, 'Sou Don Law, presidente da Live Nation New England. Ao longo dos anos, construí uma reputação sólida como promotor de eventos de sucesso em toda a região. Trabalho lado a lado com artistas e suas equipes para criar experiências únicas que ressoem com o público local. Minha paixão é trazer as melhores performances ao palco e garantir que cada evento seja um triunfo para todos os envolvidos.', '967829018', 'donlaw', 1, '', 0, '', 0, '', 0, 'donlaw');

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
(45, 81, 79, 'Boa tarde, gostaria de saber se estarias interessado em participar como ad-libber num evento?', 1, '2024-07-08 12:14:53'),
(46, 79, 81, 'boa tarde, claro que sim', 1, '2024-07-08 12:15:12'),
(47, 79, 81, 'qual será a data que me intenciona convidar?', 1, '2024-07-08 12:16:25'),
(48, 81, 79, 'Vou atuar no dia 8 de agosto na costa da caparica, se quiser pode ser nessa data', 1, '2024-07-08 12:18:25'),
(49, 79, 81, 'perfeito, e em temos de contrato', 1, '2024-07-08 12:18:44'),
(50, 81, 79, 'o meu agenciador irá tratar disso o mais breve possivel!', 1, '2024-07-08 12:19:16'),
(51, 79, 81, 'ok', 1, '2024-07-08 12:19:24');

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
(12, 79, 80, 'GogPcOzeSjW18ARvCMHx52uN.pdf', 'Fazer presença num evento', 1, '2024-07-08'),
(13, 81, 79, 'znYGDV3aghw1k9cJSQA4peXi.pdf', 'Participar como add-libber', 1, '2024-07-08');

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
(102, 80, 79),
(103, 79, 80),
(104, 79, 81),
(105, 81, 79),
(106, 81, 82),
(107, 82, 79),
(111, 82, 80),
(112, 82, 81),
(113, 83, 79),
(114, 83, 82),
(115, 84, 82),
(116, 85, 79),
(118, 86, 84),
(120, 86, 83),
(121, 87, 86);

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
(49, 79, 'Tomorrowland', '', 'Foi tão bom estar de volta no Tomorrowland.\nEspero que tenham gostado do meu set!', 'Boom, Bélgica', '2022-08-01', '', 1, 4, 7, 0),
(50, 81, 'Rock in rio', '', 'Lisboa é de malucos...\nObrigado por participar no melhor festival que já estive!', 'Lisboa, Portugal', '2024-07-08', '', 1, 4, 7, 0);

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
(45, 50, 80),
(46, 50, 79);

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
(1, 49, 81, 'Insane bro <3', NULL),
(2, 50, 79, 'Parabéns!', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `projects_comments_likes`
--

CREATE TABLE `projects_comments_likes` (
  `id` int(35) NOT NULL,
  `comment_id` int(35) NOT NULL,
  `id_user_send` int(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(2, 49, '9k=', 1),
(3, 49, 'Z', 2),
(12, 50, '2Q==', 1);

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
(1, 49, 81),
(2, 50, 81),
(3, 49, 81),
(4, 50, 79),
(5, 49, 83),
(6, 50, 83),
(7, 49, 84),
(8, 50, 84);

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
(1, 80, 79, 5, '2024-07-08', 'Excelente artista não só como trabalhador mas também como pessoa!'),
(2, 81, 79, 4, '2024-07-08', 'Pessoa incrível, porém chega atrasado aos compromissos.');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT de tabela `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(35) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT de tabela `contracts`
--
ALTER TABLE `contracts`
  MODIFY `id` int(35) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `follows`
--
ALTER TABLE `follows`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT de tabela `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de tabela `projects_collabs`
--
ALTER TABLE `projects_collabs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT de tabela `projects_comments`
--
ALTER TABLE `projects_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `projects_comments_likes`
--
ALTER TABLE `projects_comments_likes`
  MODIFY `id` int(35) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `projects_images`
--
ALTER TABLE `projects_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `projects_likes`
--
ALTER TABLE `projects_likes`
  MODIFY `id` int(35) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `projects_stats_snapshot`
--
ALTER TABLE `projects_stats_snapshot`
  MODIFY `id_snapshot` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(35) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
