-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 15/08/2023 às 04:17
-- Versão do servidor: 10.4.27-MariaDB
-- Versão do PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `agenda`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `agendamentos`
--

CREATE TABLE `agendamentos` (
  `id` int(11) NOT NULL,
  `id_profissional` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `data_agendamento` date NOT NULL,
  `horario` time NOT NULL,
  `sala` varchar(255) NOT NULL,
  `tipo_agendamento` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `agendamentos`
--

INSERT INTO `agendamentos` (`id`, `id_profissional`, `nome`, `data_agendamento`, `horario`, `sala`, `tipo_agendamento`, `status`, `created_at`, `updated_at`) VALUES
(17, 2, 'Raul Almeida', '2023-08-14', '16:30:00', 'Sala 01', 'Avaliação', 'Confirmado', '2023-08-14 17:27:10', '2023-08-15 00:34:22'),
(19, 2, 'Helena Giovanelli', '2023-08-15', '11:40:00', 'Sala 03', 'Reposição', 'Confirmado', '2023-08-14 17:47:45', '2023-08-15 00:49:40'),
(20, 2, 'Gustavo Giovanelli', '2023-08-15', '10:40:00', 'Sala 04', 'Avaliação', 'Confirmado', '2023-08-14 17:55:43', '2023-08-15 00:49:53'),
(21, 5, 'Eliana Franco', '2023-08-14', '15:40:00', 'Sala 02', 'Avaliação', 'Presença', '2023-08-14 23:54:43', '2023-08-15 00:34:29'),
(22, 4, 'Luiza Meleiro', '2023-08-16', '10:40:00', 'Sala 03', 'Reposição', 'Confirmado', '2023-08-15 00:35:23', '2023-08-15 00:35:23'),
(23, 5, 'Maria Clara', '2023-08-14', '11:20:00', 'Sala 01', 'Avaliação', 'Confirmado', '2023-08-15 01:01:26', '2023-08-15 01:01:26');

-- --------------------------------------------------------

--
-- Estrutura para tabela `profissionais`
--

CREATE TABLE `profissionais` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `especialidade` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `profissionais`
--

INSERT INTO `profissionais` (`id`, `nome`, `especialidade`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Tatiana Franco', 'Fonoaudióloga', 'Ativo', '2023-08-14 17:17:48', '2023-08-14 17:17:48'),
(3, 'Fabiola Passos', 'Psicóloga', 'Ativo', '2023-08-14 17:18:00', '2023-08-14 17:18:00'),
(4, 'Thamires Iengo', 'Psicóloga', 'Inativo', '2023-08-14 18:22:56', '2023-08-14 18:22:56'),
(5, 'Renata Ruano', 'Fonoaudióloga', 'Ativo', '2023-08-14 23:53:41', '2023-08-14 23:53:41');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `agendamentos`
--
ALTER TABLE `agendamentos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_profissional` (`id_profissional`);

--
-- Índices de tabela `profissionais`
--
ALTER TABLE `profissionais`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `agendamentos`
--
ALTER TABLE `agendamentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de tabela `profissionais`
--
ALTER TABLE `profissionais`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `agendamentos`
--
ALTER TABLE `agendamentos`
  ADD CONSTRAINT `agendamentos_ibfk_1` FOREIGN KEY (`id_profissional`) REFERENCES `profissionais` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
