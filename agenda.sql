-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 14-Ago-2023 às 21:01
-- Versão do servidor: 10.4.19-MariaDB
-- versão do PHP: 7.3.28

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
-- Estrutura da tabela `agendamentos`
--

CREATE TABLE `agendamentos` (
  `id` int(11) NOT NULL,
  `id_profissional` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `data_agendamento` date NOT NULL,
  `horario` time NOT NULL,
  `tipo_agendamento` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `agendamentos`
--

INSERT INTO `agendamentos` (`id`, `id_profissional`, `nome`, `data_agendamento`, `horario`, `tipo_agendamento`, `status`, `created_at`, `updated_at`) VALUES
(17, 2, 'Raul Almeida', '2023-08-14', '16:30:00', 'Avaliação', 'Confirmado', '2023-08-14 17:27:10', '2023-08-14 17:27:10'),
(18, 3, 'Marcia Cardoso', '2023-08-14', '17:30:00', 'Sessão', 'Confirmado', '2023-08-14 17:37:50', '2023-08-14 17:37:50'),
(19, 2, 'Helena Giovanelli', '2023-08-15', '11:40:00', 'Reposição', 'Confirmado', '2023-08-14 17:47:45', '2023-08-14 17:47:45'),
(20, 2, 'Gustavo Giovanelli', '2023-08-15', '10:40:00', 'Avaliação', 'Confirmado', '2023-08-14 17:55:43', '2023-08-14 17:55:43');

-- --------------------------------------------------------

--
-- Estrutura da tabela `profissionais`
--

CREATE TABLE `profissionais` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `especialidade` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `profissionais`
--

INSERT INTO `profissionais` (`id`, `nome`, `especialidade`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Tatiana Franco', 'Fonoaudióloga', 'Ativo', '2023-08-14 17:17:48', '2023-08-14 17:17:48'),
(3, 'Fabiola Passos', 'Psicóloga', 'Ativo', '2023-08-14 17:18:00', '2023-08-14 17:18:00'),
(4, 'Thamires Iengo', 'Psicóloga', 'Inativo', '2023-08-14 18:22:56', '2023-08-14 18:22:56');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `agendamentos`
--
ALTER TABLE `agendamentos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_profissional` (`id_profissional`);

--
-- Índices para tabela `profissionais`
--
ALTER TABLE `profissionais`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `agendamentos`
--
ALTER TABLE `agendamentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de tabela `profissionais`
--
ALTER TABLE `profissionais`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `agendamentos`
--
ALTER TABLE `agendamentos`
  ADD CONSTRAINT `agendamentos_ibfk_1` FOREIGN KEY (`id_profissional`) REFERENCES `profissionais` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
