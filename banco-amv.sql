-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 05-Jul-2023 às 23:57
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `banco-amv`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `acessos`
--

CREATE TABLE `acessos` (
  `id` int(11) NOT NULL,
  `cliente_id` int(11) DEFAULT NULL,
  `data_login` timestamp NULL DEFAULT NULL,
  `data_logout` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `acessos`
--

INSERT INTO `acessos` (`id`, `cliente_id`, `data_login`, `data_logout`, `created_at`, `updated_at`) VALUES
(1, 1, '2023-07-04 21:35:57', NULL, '2023-07-04 21:35:57', '2023-07-04 21:35:57'),
(2, 1, '2023-07-04 21:37:01', NULL, '2023-07-04 21:37:01', '2023-07-04 21:37:01'),
(3, 1, '2023-07-04 22:25:14', NULL, '2023-07-04 22:25:14', '2023-07-04 22:25:14'),
(4, 1, '2023-07-04 22:39:30', NULL, '2023-07-04 22:39:30', '2023-07-04 22:39:30'),
(5, 3, '2023-07-04 23:43:08', NULL, '2023-07-04 23:43:08', '2023-07-04 23:43:08'),
(6, 1, '2023-07-05 21:33:10', NULL, '2023-07-05 21:33:10', '2023-07-05 21:33:10'),
(7, 1, '2023-07-05 21:42:08', NULL, '2023-07-05 21:42:08', '2023-07-05 21:42:08');

-- --------------------------------------------------------

--
-- Estrutura da tabela `chaves_pix`
--

CREATE TABLE `chaves_pix` (
  `id` int(11) NOT NULL,
  `cliente_id` int(11) DEFAULT NULL,
  `Chave` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `senha` varchar(255) DEFAULT NULL,
  `numero_Conta` varchar(255) DEFAULT NULL,
  `saldo` decimal(10,2) DEFAULT NULL,
  `limite` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`id`, `nome`, `username`, `senha`, `numero_Conta`, `saldo`, `limite`, `created_at`, `updated_at`) VALUES
(1, 'Marcos Vinicius', 'marv', '$2y$10$CGnL/Q7d1sN1mgrgzO7BIe4jzdPf26noE.0ljOLmhbWo2PNNmDla2', '38378757', '0.00', '789.92', '2023-07-04 21:35:51', '2023-07-05 21:55:59'),
(2, 'teste ste', 'teste1', '$2y$10$cllGRqbsTXY1c2aXzWesGuOJDSNA.htPv0ZvpSp6U7Rjdc4bSjLAS', '43492502', '3732.00', '1000.00', '2023-07-04 21:36:53', '2023-07-05 21:36:25'),
(3, 'teste DOIS', 'eh isso ai', '$2y$10$t4H010.gqdA7wnRPl5FUQewAZFno0D23R/8PfJ8ioDxdlzQUznj9u', '32426907', '0.00', '684.88', '2023-07-04 23:42:55', '2023-07-05 00:29:03');

-- --------------------------------------------------------

--
-- Estrutura da tabela `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_08_19_000000_create_failed_jobs_table', 1),
(2, '2019_12_14_000001_create_personal_access_tokens_table', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `transacoes`
--

CREATE TABLE `transacoes` (
  `id` int(11) NOT NULL,
  `cliente_id` int(11) DEFAULT NULL,
  `Descricao` varchar(255) DEFAULT NULL,
  `Tipo` varchar(255) DEFAULT NULL,
  `Valor` decimal(10,2) DEFAULT NULL,
  `Data` date DEFAULT NULL,
  `Destinatário` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `transacoes`
--

INSERT INTO `transacoes` (`id`, `cliente_id`, `Descricao`, `Tipo`, `Valor`, `Data`, `Destinatário`) VALUES
(1, 1, 'Pagamento por: Transferência', 'Transferência', '200.00', '2023-07-04', 'teste ste'),
(2, 1, 'Pagamento por: Transferência', 'Transferência', '1222.00', '2023-07-04', 'Marcos Vinicius'),
(3, 1, 'Pagamento por: Transferência', 'Transferência', '100.00', '2023-07-04', 'teste ste'),
(4, 3, 'Pagamento por: Transferência', 'Transferência', '120.00', '2023-07-04', 'teste ste'),
(10, 3, 'Transferência direto da conta bancária', 'Transferência', '2.00', '2023-07-04', 'Marcos Vinicius'),
(11, 1, 'Transferência direto da conta bancária', 'Transferência', '1200.00', '2023-07-05', 'teste ste'),
(12, 1, 'Transferência direto da conta bancária', 'Transferência', '12.00', '2023-07-05', 'Marcos Vinicius'),
(13, 1, 'Transferência direto da conta bancária', 'Transferência', '12.00', '2023-07-05', 'Marcos Vinicius'),
(14, 1, 'Transferência direto da conta bancária', 'Transferência', '12.00', '2023-07-05', 'teste ste'),
(15, 1, 'Transferência direto da conta bancária', 'Transferência', '1700.00', '2023-07-05', 'teste ste'),
(16, 1, 'Transferência direto da conta bancária', 'Transferência', '122.00', '2023-07-05', 'teste ste'),
(17, 1, 'Transferência direto da conta bancária', 'Transferência', '10.00', '2023-07-05', 'teste ste'),
(18, 1, 'Transferência direto da conta bancária', 'Transferência', '10.00', '2023-07-05', 'teste ste');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `acessos`
--
ALTER TABLE `acessos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cliente_id` (`cliente_id`);

--
-- Índices para tabela `chaves_pix`
--
ALTER TABLE `chaves_pix`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cliente_id` (`cliente_id`);

--
-- Índices para tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `transacoes`
--
ALTER TABLE `transacoes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cliente_id` (`cliente_id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `acessos`
--
ALTER TABLE `acessos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `chaves_pix`
--
ALTER TABLE `chaves_pix`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `transacoes`
--
ALTER TABLE `transacoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `acessos`
--
ALTER TABLE `acessos`
  ADD CONSTRAINT `acessos_ibfk_1` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `chaves_pix`
--
ALTER TABLE `chaves_pix`
  ADD CONSTRAINT `chaves_pix_ibfk_1` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `transacoes`
--
ALTER TABLE `transacoes`
  ADD CONSTRAINT `transacoes_ibfk_1` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
