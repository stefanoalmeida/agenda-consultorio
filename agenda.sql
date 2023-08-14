-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 14/08/2023 às 13:57
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
  `nome` varchar(255) NOT NULL,
  `data_agendamento` date NOT NULL,
  `horario` time NOT NULL,
  `profissional` varchar(255) NOT NULL,
  `tipo_agendamento` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `agendamentos`
--

INSERT INTO `agendamentos` (`id`, `nome`, `data_agendamento`, `horario`, `profissional`, `tipo_agendamento`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Stefano Almeida', '2023-08-14', '10:40:00', 'Tatiana Franco', 'Avaliação', 'confirmado', '2023-08-13 01:15:20', '2023-08-13 01:15:20'),
(2, 'Raul Almeida', '2023-08-15', '09:30:00', 'Tatiana Franco', 'Consulta', 'canceladoi', '2023-08-12 20:17:46', '2023-08-12 20:17:46'),
(3, 'Stefano Almeida', '2023-08-16', '10:40:00', 'Tatiana Franco', 'Consulta', 'confirmado', '2023-08-12 20:19:15', '2023-08-12 20:19:15'),
(4, 'Stefano Almeida', '2023-08-16', '10:40:00', 'Tatiana Franco', 'Consulta', 'confirmado', '2023-08-12 20:20:01', '2023-08-12 20:20:01'),
(5, 'Stefano Almeida', '2023-08-16', '10:40:00', 'Tatiana Franco', 'Consulta', 'confirmado', '2023-08-12 20:23:29', '2023-08-12 20:23:29'),
(6, 'Stefano Almeida', '2023-08-16', '10:40:00', 'Tatiana Franco', 'Consulta', 'confirmado', '2023-08-12 20:24:36', '2023-08-12 20:24:36'),
(7, 'Stefano Almeida', '2023-08-16', '10:40:00', 'Tatiana Franco', 'Consulta', 'confirmado', '2023-08-12 20:25:46', '2023-08-12 20:25:46'),
(8, 'Stefano Almeida', '2023-08-16', '10:40:00', 'Tatiana Franco', 'Consulta', 'confirmado', '2023-08-12 20:25:52', '2023-08-12 20:25:52'),
(9, 'Stefano Almeida', '2023-08-16', '10:40:00', 'Tatiana Franco', 'Consulta', 'confirmado', '2023-08-12 20:25:56', '2023-08-12 20:25:56'),
(10, 'Stefano Almeida', '2023-08-16', '10:40:00', 'Tatiana Franco', 'Consulta', 'confirmado', '2023-08-12 20:27:59', '2023-08-12 20:27:59'),
(11, 'Raul Almeida', '2023-08-17', '11:40:00', 'Tatiana Franco', 'Consulta', 'confirmado', '2023-08-12 20:59:32', '2023-08-12 20:59:32'),
(12, 'Raul Almeida', '2023-08-31', '11:00:00', 'Tatiana Franco', 'Consulta', 'confirmado', '2023-08-12 20:59:47', '2023-08-12 20:59:47'),
(13, 'Stefano Almeida', '2023-08-12', '20:00:00', 'Tatiana Franco', 'Avaliação', 'Confirmado', '2023-08-12 21:50:32', '2023-08-12 21:50:32'),
(14, 'Teste', '2023-08-13', '12:40:00', 'Fabiola', 'Av.', 'Reposição', '2023-08-13 14:27:32', '2023-08-13 14:27:32');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `agendamentos`
--
ALTER TABLE `agendamentos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `agendamentos`
--
ALTER TABLE `agendamentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
