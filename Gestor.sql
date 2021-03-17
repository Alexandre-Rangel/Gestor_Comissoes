
CREATE DATABASE IF NOT EXISTS `Gestor` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `Gestor`;

-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Tempo de geração: 17-Mar-2021 às 02:45
-- Versão do servidor: 8.0.23
-- versão do PHP: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `Gestor`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `adms`
--

CREATE TABLE `adms` (
  `id` int UNSIGNED NOT NULL,
  `login` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nome` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `adms`
--

INSERT INTO `adms` (`id`, `login`, `password`, `nome`, `created_at`, `updated_at`) VALUES
(1, 'Usuario', '$2y$10$XJV9rzko4X0Hbs161umIC.FuIhIDwE9BJaKrvbaeiu2EPoU4yUqL.', '', '2021-03-15 13:40:55', '2021-03-15 13:40:55');

-- --------------------------------------------------------

--
-- Estrutura da tabela `comissoes`
--

CREATE TABLE `comissoes` (
  `id` int UNSIGNED NOT NULL,
  `descricao` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `comissoes`
--

INSERT INTO `comissoes` (`id`, `descricao`, `valor`, `created_at`, `updated_at`) VALUES
(1, 'Produto', '10.00', '2021-03-15 11:48:09', '2021-03-17 00:29:22'),
(2, 'Servico', '25.00', '2021-03-15 15:32:25', '2021-03-16 15:33:53');

-- --------------------------------------------------------

--
-- Estrutura da tabela `mercadorias`
--

CREATE TABLE `mercadorias` (
  `id` int UNSIGNED NOT NULL,
  `descricao` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `id_categoria` int UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `mercadorias`
--

INSERT INTO `mercadorias` (`id`, `descricao`, `valor`, `id_categoria`, `created_at`, `updated_at`) VALUES
(8, 'Trabalho Manual 1', '250.00', 2, '2021-03-17 00:26:56', '2021-03-17 00:26:56'),
(9, 'Trabalho Manual 2', '125.00', 2, '2021-03-17 00:27:08', '2021-03-17 00:27:08'),
(10, 'Trabalho Manual 3', '180.00', 2, '2021-03-17 00:27:20', '2021-03-17 00:27:20'),
(11, 'Produto 1', '540.00', 1, '2021-03-17 00:27:31', '2021-03-17 00:27:31'),
(12, 'Produto 2', '125.00', 1, '2021-03-17 00:27:42', '2021-03-17 00:27:42'),
(13, 'Produto 3', '140.00', 1, '2021-03-17 00:27:51', '2021-03-17 00:27:51');

-- --------------------------------------------------------

--
-- Estrutura da tabela `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2021_03_15_141137_comissoes', 1),
(2, '2021_03_15_141147_vendedores', 1),
(3, '2021_03_15_141157_mercadorias', 1),
(4, '2021_03_15_141168_vendas', 1),
(5, '2021_03_15_141824_adms', 1),
(6, '2020_03_15_141168_vendas', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `vendas`
--

CREATE TABLE `vendas` (
  `id` int UNSIGNED NOT NULL,
  `dt_venda` datetime NOT NULL,
  `id_vendedor` int UNSIGNED NOT NULL,
  `id_mercadoria` int UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `vendas`
--

INSERT INTO `vendas` (`id`, `dt_venda`, `id_vendedor`, `id_mercadoria`, `created_at`, `updated_at`) VALUES
(12, '2021-03-01 00:00:00', 1, 8, '2021-03-17 00:59:52', '2021-03-17 00:59:52'),
(13, '2021-03-02 00:00:00', 1, 9, '2021-03-17 01:01:31', '2021-03-17 01:01:31'),
(14, '2021-03-03 00:00:00', 4, 9, '2021-03-17 01:01:38', '2021-03-17 01:01:38'),
(15, '2021-03-08 00:00:00', 1, 12, '2021-03-17 01:02:36', '2021-03-17 01:02:36'),
(16, '2021-03-04 00:00:00', 4, 12, '2021-03-17 01:02:45', '2021-03-17 01:02:45'),
(17, '2021-03-06 00:00:00', 1, 13, '2021-03-17 01:04:28', '2021-03-17 01:04:28');

-- --------------------------------------------------------

--
-- Estrutura da tabela `vendedores`
--

CREATE TABLE `vendedores` (
  `id` int UNSIGNED NOT NULL,
  `nome` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dt_entrada` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `vendedores`
--

INSERT INTO `vendedores` (`id`, `nome`, `telefone`, `dt_entrada`, `created_at`, `updated_at`) VALUES
(1, 'Alexandre', '47996379307', '2021-03-15', '2021-03-15 14:44:43', '2021-03-15 14:44:43'),
(4, 'Joao', '32442572', '2021-03-01', '2021-03-17 00:26:12', '2021-03-17 00:26:12');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `adms`
--
ALTER TABLE `adms`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `adms_login_unique` (`login`);

--
-- Índices para tabela `comissoes`
--
ALTER TABLE `comissoes`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `mercadorias`
--
ALTER TABLE `mercadorias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mercadorias_id_categoria_foreign` (`id_categoria`);

--
-- Índices para tabela `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `vendas`
--
ALTER TABLE `vendas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vendas_id_vendedor_foreign` (`id_vendedor`),
  ADD KEY `vendas_id_mercadoria_foreign` (`id_mercadoria`);

--
-- Índices para tabela `vendedores`
--
ALTER TABLE `vendedores`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `adms`
--
ALTER TABLE `adms`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `comissoes`
--
ALTER TABLE `comissoes`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `mercadorias`
--
ALTER TABLE `mercadorias`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `vendas`
--
ALTER TABLE `vendas`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de tabela `vendedores`
--
ALTER TABLE `vendedores`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `mercadorias`
--
ALTER TABLE `mercadorias`
  ADD CONSTRAINT `mercadorias_id_categoria_foreign` FOREIGN KEY (`id_categoria`) REFERENCES `comissoes` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `vendas`
--
ALTER TABLE `vendas`
  ADD CONSTRAINT `vendas_id_mercadoria_foreign` FOREIGN KEY (`id_mercadoria`) REFERENCES `mercadorias` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `vendas_id_vendedor_foreign` FOREIGN KEY (`id_vendedor`) REFERENCES `vendedores` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
