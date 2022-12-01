-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2022 at 01:49 AM
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
-- Table structure for table `lista_favoritos`
--

CREATE TABLE `lista_favoritos` (
  `id` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lista_favoritos`
--

INSERT INTO `lista_favoritos` (`id`, `id_produto`, `id_usuario`) VALUES
(9, 4, 4),
(10, 9, 4),
(13, 38, 4);

-- --------------------------------------------------------

--
-- Table structure for table `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `autor` varchar(100) NOT NULL,
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

INSERT INTO `produtos` (`id`, `nome`, `autor`, `descricao`, `valor`, `data_cadastro`, `imagem`, `estoque`, `categoria`) VALUES
(1, 'One Piece Vol. 100', 'Eichiiro Oda', 'Com todas as estrelas reunidas no topo da fortaleza, Luffy e os Piratas da Nova Geração desafiam Kaido e Big Mom! Será que há alguma chance de vitória contra essa aliança formada entre os dois mais poderosos piratas dos mares?! O que o futuro reserva para essa batalha extrema que está fazendo toda Onigashima tremer?!\r\n', '79.00', '2022-11-18 19:25:26', 'upload/op100.jpg', 2, 'destaque'),
(2, 'One Piece Vol. 101', 'Eichiiro Oda', 'Desc', '70.00', '2022-11-18 19:34:10', 'upload/op101.jpg', 3, 'destaque'),
(4, 'One Piece Vol. 98\r\n', 'Eichiiro Oda', 'desc2', '50.00', '2022-11-18 20:07:11', 'upload/op98.jpg', 4, 'destaque'),
(8, 'Berserk Vol. 1', '', 'O misterioso Guts, o \"Espadachim Negro\", carrega em sua mão mecânica uma enorme espada, e em seu pescoço uma estranha marca que atrai forças demoníacas. Em sua busca por vingança contra um antigo inimigo, nem tudo sai a seu favor, e ele recebe ajuda de uma fantástica criatura.', '34.90', '2022-11-22 11:54:23', 'upload/637ce29fe1f9b.jpg', 4, 'lancamento'),
(9, 'Boku no Hero Vol. 29', '', 'Tudo ao redor do gigante está destruído! \"Devo ir até meu mestre\", e peraí, até o Shigaraki?! Nem pensar! Se ele chegar na cidade, não vai sobrar nada de pé! E os estudantes da U.A. também estão em perigo! O que está acontecendo no Hospital Jaku?! Mas que saco, paaaraaaaa!! ”Plus Ultra”!!', '29.90', '2022-11-22 12:23:24', 'upload/637ce96c533e2.jpg', 2, 'lancamento'),
(10, 'Boku no Hero Vol. 30', '', 'Ei, ei, por que as coisas ficaram assim?! O vilão colossal tá avançando cada vez mais, e ele não para de destruir tudo! Tenho que reportar a situação... Todos estão lutando com toda sua força! Tenho que proteger todas as pessoas que puder! Eu preciso passar pra frente o sentimento dos meus amigos que caíram! ”Plus Ultra”!!\r\n', '29.90', '2022-11-22 12:26:57', 'upload/637cea41216d6.jpg', 1, 'lancamento'),
(37, 'One Piece Vol. 99', 'Eichiiro Oda', '59', '59.90', '2022-11-22 14:01:53', 'upload/637d0081e40a5.jpg', 4, 'destaque'),
(38, 'Haikyu - Volume 2', '', 'Shoyo Hinata quer provar que no vôlei você não precisa ser alto para voar!Desde que viu o lendário jogador conhecido como \"o Pequeno Gigante\" competir nas finais nacionais de voleibol, Shoyo Hinata almeja ser o melhor jogador de voleibol de todos os tempos! Quem disse que você precisa ser alto para jogar vôlei quando pode pular mais alto do que qualquer outra pessoa?Depois de provar ser a melhor combinação em sua partida de treino contra Kei Tsukishima, Kageyama e Hinata finalmente podem entrar no clube! O verdadeiro poder de Hinata - para cronometrar perfeitamente seus picos com os olhos fechados - é despertado, e nada pode parar esta dupla louca setter-spiker. Agora suas habilidades estão prestes a ser postas à prova em um jogo prático contra um dos ex-companheiros de equipe de Kageyama do ensino médio, Tohru Oikawa.', '40.00', '2022-11-28 19:31:31', 'upload/638536c3c0c06.jpg', 3, 'lancamento'),
(40, 'Bleach, Vol. 19', 'Tite Kubo', 'Part-time student, full-time Soul Reaper, Ichigo is one of the chosen few guardians of the afterlife.\r\nIchigo Kurosaki never asked for the ability to see ghosts--he was born with the gift. When his family is attacked by a Hollow--a malevolent lost soul--Ichigo becomes a Soul Reaper, dedicating his life to protecting the innocent and helping the tortured spirits themselves find peace. Find out why Tite Kubo\'s Bleach has become an international manga smash-hit!\r\n\r\nThe long-awaited showdown between Ichigo and Byakuya Kuchiki has finally begun. Has Ichigo succeeded in mastering bankai, the highest level of power that a Soul Reaper can attain, to face Byakuya as an equal?', '39.90', '2022-11-29 17:50:14', 'upload/6386708638f65.png', 9, 'destaque'),
(42, 'One-Punch Man 01', 'One', 'Com apenas um soco!! Saitama se tornou forte a ponto de derrotar criaturas monstruosas com um único soco.\r\nE o que não falta são monstros para serem derrotados na Cidade Z, onde eles surgem a todo momento, seja das profundezas da Terra ou dos confins do espaço, como resultado de uma experiência maluca ou de uma mutação genética.\r\nO problema é justamente que ele os derrota com um golpe só!\r\nobjetivo agora é encontrar a emoção de um verdadeiro desafio! A lenda do mais poderoso e pacato herói começa aqui!!', '22.90', '2022-11-29 18:04:02', 'upload/638673c288dc7.png', 5, 'destaque');

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
(4, 'Administrador', 'admin@admin.com', '$2y$10$phnDfZaOtr06Mn7rIH3zT.mF1S72zzMD5Yv9K75nmiFunzaZPL1Xm', '2022-11-16 11:15:36', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'Usuário', 'user@user.com', '$2y$10$jQXWFiSfF3x9.TNWxiQCveQWnMuXZNpfXVDs.q50h8SXQJUXVHt3y', '2022-11-16 11:19:16', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'Deku', 'deku@email.com', '$2y$10$p.rO3J4EHF9sDCP9KweeBeaCcjBAZ0oBQeFfHXxmDqJWr.r2o0JnC', '2022-11-16 14:11:14', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'João Victor Nunes de Moura', 'ddtank987minecraft@outlook.com', '$2y$10$ziWPAPaRX3d6iRKS2lZLwuw6FBm1//sVgcNcmv6gzoLYm7NAWZ/Nq', '2022-11-22 21:59:41', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 'testasd', 'admin@gymworkout.com', '$2y$10$UzbNakfOM4dSQMMV48waK.oJ/pw8Ch/Az3FceHRwXeUXhdnSxZ1ly', '2022-11-30 18:54:58', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

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
-- Indexes for table `lista_favoritos`
--
ALTER TABLE `lista_favoritos`
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
-- AUTO_INCREMENT for table `lista_favoritos`
--
ALTER TABLE `lista_favoritos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
