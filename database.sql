-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2022 at 10:47 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `loja_manga`
--

-- --------------------------------------------------------

--
-- Table structure for table `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `id_produto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categorias`
--

INSERT INTO `categorias` (`id`, `nome`, `id_produto`) VALUES
(2, 'destaque', 1),
(3, 'destaque', 2);

-- --------------------------------------------------------

--
-- Table structure for table `compras`
--

CREATE TABLE `compras` (
  `id` int(11) NOT NULL,
  `cliente_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  `codigo` varchar(10) NOT NULL,
  `total` int(11) NOT NULL,
  `cadastro` datetime NOT NULL,
  `atualizacao` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `compras_produtos`
--

CREATE TABLE `compras_produtos` (
  `id` int(11) NOT NULL,
  `produto_id` int(11) NOT NULL,
  `compra_id` int(11) NOT NULL,
  `quantidade` int(10) NOT NULL,
  `valor_unitario` decimal(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `descricao` longtext NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `data_cadastro` datetime NOT NULL,
  `imagem` varchar(140) NOT NULL,
  `estoque` int(11) NOT NULL,
  `categoria` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `descricao`, `valor`, `data_cadastro`, `imagem`, `estoque`, `categoria`) VALUES
(1, 'One Piece Vol. 100', 'Com todas as estrelas reunidas no topo da fortaleza, Luffy e os Piratas da Nova Geração desafiam Kaido e Big Mom! Será que há alguma chance de vitória contra essa aliança formada entre os dois mais poderosos piratas dos mares?! O que o futuro reserva para essa batalha extrema que está fazendo toda Onigashima tremer?!\r\n', '79.00', '2022-11-18 19:25:26', 'op100.jpg', 2, 'destaque'),
(2, 'One Piece Vol. 101', 'Desc', '70.00', '2022-11-18 19:34:10', 'op101.jpg', 3, 'destaque'),
(3, 'One Piece Vol. 99\r\n', 'desc', '60.00', '2022-11-18 20:06:22', 'op99.jpg', 5, 'destaque'),
(4, 'One Piece Vol. 98\r\n', 'desc2', '50.00', '2022-11-18 20:07:11', 'op98.jpg', 4, 'destaque');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `id_compra` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(256) NOT NULL,
  `data_cadastro` datetime NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT 0,
  `telefone` varchar(11) DEFAULT NULL,
  `endereco1` varchar(100) DEFAULT NULL,
  `endereco2` varchar(100) DEFAULT NULL,
  `cidade` varchar(100) DEFAULT NULL,
  `bairro` varchar(100) DEFAULT NULL,
  `estado` varchar(100) DEFAULT NULL,
  `cep` varchar(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `data_cadastro`, `admin`, `telefone`, `endereco1`, `endereco2`, `cidade`, `bairro`, `estado`, `cep`) VALUES
(1, 'Administrador', 'admin@admin.com', '$2y$10$phnDfZaOtr06Mn7rIH3zT.mF1S72zzMD5Yv9K75nmiFunzaZPL1Xm', '2022-11-16 11:15:36', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'Usuário', 'user@user.com', '$2y$10$jQXWFiSfF3x9.TNWxiQCveQWnMuXZNpfXVDs.q50h8SXQJUXVHt3y', '2022-11-16 11:19:16', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'jotave', 'jotave@email.com', '$2y$10$p.rO3J4EHF9sDCP9KweeBeaCcjBAZ0oBQeFfHXxmDqJWr.r2o0JnC', '2022-11-16 14:11:14', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `compras_produtos`
--
ALTER TABLE `compras_produtos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `compras`
--
ALTER TABLE `compras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `compras_produtos`
--
ALTER TABLE `compras_produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
