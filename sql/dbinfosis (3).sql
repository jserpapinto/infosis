-- phpMyAdmin SQL Dump
-- version 4.4.15.8
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 14-Jun-2017 às 20:33
-- Versão do servidor: 5.6.31
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbinfosis`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tClasses`
--

CREATE TABLE IF NOT EXISTS `tClasses` (
  `id_class` int(11) NOT NULL,
  `id_degree` int(11) NOT NULL,
  `code` varchar(16) NOT NULL,
  `fullName` varchar(140) NOT NULL,
  `credits` int(11) NOT NULL,
  `hours` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tClasses`
--

INSERT INTO `tClasses` (`id_class`, `id_degree`, `code`, `fullName`, `credits`, `hours`, `active`) VALUES
(1, 3, '41022', 'Tecnologias da Internet IV', 4, 108, 1),
(3, 2, 'asdasd', 'asdsda', 7, 5, 1),
(4, 2, 'asdasdasdsdad', 'asdasdasdasd', 6, 6, 1),
(5, 4, 'sadsadadsadsdads', 'asdasdasd', 13, 12, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tDegreeLevels`
--

CREATE TABLE IF NOT EXISTS `tDegreeLevels` (
  `id_degree_level` int(11) NOT NULL,
  `designation` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tDegreeLevels`
--

INSERT INTO `tDegreeLevels` (`id_degree_level`, `designation`) VALUES
(1, 'CTESP'),
(2, 'Licenciatura'),
(3, 'Pós-Graduação');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tDegrees`
--

CREATE TABLE IF NOT EXISTS `tDegrees` (
  `id_degree` int(11) NOT NULL COMMENT 'id do curso',
  `code` varchar(12) NOT NULL COMMENT 'código do curso',
  `fullName` varchar(140) NOT NULL COMMENT 'designação completa do curso',
  `id_degree_level` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tDegrees`
--

INSERT INTO `tDegrees` (`id_degree`, `code`, `fullName`, `id_degree_level`) VALUES
(1, 'CTESP - DPM', 'Desenvolvimento de Produtos Multimédia', 1),
(2, 'CTESP - RSI', 'Redes e Sistemas Informáticos', 1),
(3, 'LI', 'Informática', 2),
(4, 'LEM', 'Engenharia Multimédia', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tRoles`
--

CREATE TABLE IF NOT EXISTS `tRoles` (
  `id_role` int(11) NOT NULL COMMENT 'id de tipo de utilizador',
  `role` varchar(64) NOT NULL COMMENT 'designação do tipo de utilizador',
  `active` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'estado do tipo de utilizador'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tRoles`
--

INSERT INTO `tRoles` (`id_role`, `role`, `active`) VALUES
(1, 'Admin', 1),
(2, 'Secretaria', 1),
(3, 'Professor', 1),
(4, 'Aluno', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tUsers`
--

CREATE TABLE IF NOT EXISTS `tUsers` (
  `id_user` int(11) NOT NULL COMMENT 'id de utilizador',
  `id_role` int(11) NOT NULL COMMENT 'chave secundaria indicando o tipo de utilizador',
  `username` varchar(32) NOT NULL COMMENT 'nome para login',
  `password` varchar(32) NOT NULL COMMENT 'palavra passe',
  `name` varchar(64) NOT NULL COMMENT 'nome',
  `picture` varchar(256) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'estado da conta'
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tUsers`
--

INSERT INTO `tUsers` (`id_user`, `id_role`, `username`, `password`, `name`, `picture`, `active`) VALUES
(1, 1, 'admin', 'admin', 'Administrador', 'uploads/admin/594036236e0b2.png', 1),
(2, 2, 'secretaria', 'istec', 'Secretaria', 'uploads/user_default.png', 1),
(3, 3, 'professor', 'istec', 'Professor', 'uploads/user_default.png', 1),
(4, 4, 'aluno', 'istec', 'Aluno', 'uploads/user_default.png', 1),
(5, 4, 'LIPTon', 'istec', 'Tiago', 'uploads/user_default.png', 1),
(7, 4, 'Tomcat', 'istec', 'Bruno', 'uploads/user_default.png', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tClasses`
--
ALTER TABLE `tClasses`
  ADD PRIMARY KEY (`id_class`),
  ADD KEY `class_degree` (`id_degree`);

--
-- Indexes for table `tDegreeLevels`
--
ALTER TABLE `tDegreeLevels`
  ADD PRIMARY KEY (`id_degree_level`);

--
-- Indexes for table `tDegrees`
--
ALTER TABLE `tDegrees`
  ADD PRIMARY KEY (`id_degree`),
  ADD KEY `degrees_degreeLevels` (`id_degree_level`);

--
-- Indexes for table `tRoles`
--
ALTER TABLE `tRoles`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `tUsers`
--
ALTER TABLE `tUsers`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `users_roles` (`id_role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tClasses`
--
ALTER TABLE `tClasses`
  MODIFY `id_class` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tDegreeLevels`
--
ALTER TABLE `tDegreeLevels`
  MODIFY `id_degree_level` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tDegrees`
--
ALTER TABLE `tDegrees`
  MODIFY `id_degree` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id do curso',AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tRoles`
--
ALTER TABLE `tRoles`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id de tipo de utilizador',AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tUsers`
--
ALTER TABLE `tUsers`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id de utilizador',AUTO_INCREMENT=9;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `tDegrees`
--
ALTER TABLE `tDegrees`
  ADD CONSTRAINT `fk_degrees_degreeLevels` FOREIGN KEY (`id_degree_level`) REFERENCES `tDegreeLevels` (`id_degree_level`);

--
-- Limitadores para a tabela `tUsers`
--
ALTER TABLE `tUsers`
  ADD CONSTRAINT `tusers_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `tRoles` (`id_role`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
