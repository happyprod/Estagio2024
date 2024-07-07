-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 07-Jul-2024 às 23:26
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
(22, 1, 20),
(23, 1, 10),
(24, 1, 19),
(25, 1, 27),
(26, 1, 19),
(27, 11, 20),
(32, 2, 21),
(33, 42, 11),
(34, 45, 23),
(36, 46, 23);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `projects_collabs`
--
ALTER TABLE `projects_collabs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `projects_collabs`
--
ALTER TABLE `projects_collabs`
  MODIFY `id` int(35) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
