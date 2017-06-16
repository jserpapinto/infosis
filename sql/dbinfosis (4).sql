-- phpMyAdmin SQL Dump
-- version 4.4.15.8
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 16-Jun-2017 às 22:19
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
-- Estrutura da tabela `tclasses`
--

CREATE TABLE IF NOT EXISTS `tclasses` (
  `id_class` int(11) NOT NULL,
  `id_degree` int(11) NOT NULL,
  `code` varchar(16) NOT NULL,
  `fullName` varchar(140) NOT NULL,
  `credits` int(11) NOT NULL,
  `hours` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tclasses`
--

INSERT INTO `tclasses` (`id_class`, `id_degree`, `code`, `fullName`, `credits`, `hours`, `active`) VALUES
(1, 3, '41022', 'Tecnologias da Internet IV', 4, 108, 1),
(3, 2, 'asdasd', 'asdsda', 7, 5, 1),
(4, 2, 'asdasdasdsdad', 'asdasdasdasd', 6, 6, 1),
(5, 4, 'sadsadadsadsdads', 'asdasdasd', 13, 12, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tClassInscription`
--

CREATE TABLE IF NOT EXISTS `tClassInscription` (
  `id_class_inscription` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_class` int(11) NOT NULL,
  `inscription_year` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tClassInscription`
--

INSERT INTO `tClassInscription` (`id_class_inscription`, `id_user`, `id_class`, `inscription_year`) VALUES
(1, 9, 3, '2017-06-14'),
(2, 3, 5, '2017-06-21');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tdegreelevels`
--

CREATE TABLE IF NOT EXISTS `tdegreelevels` (
  `id_degree_level` int(11) NOT NULL,
  `designation` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tdegreelevels`
--

INSERT INTO `tdegreelevels` (`id_degree_level`, `designation`) VALUES
(1, 'CTESP'),
(2, 'Licenciatura'),
(3, 'Pós-Graduação');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tdegrees`
--

CREATE TABLE IF NOT EXISTS `tdegrees` (
  `id_degree` int(11) NOT NULL COMMENT 'id do curso',
  `code` varchar(12) NOT NULL COMMENT 'código do curso',
  `fullName` varchar(140) NOT NULL COMMENT 'designação completa do curso',
  `id_degree_level` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tdegrees`
--

INSERT INTO `tdegrees` (`id_degree`, `code`, `fullName`, `id_degree_level`) VALUES
(1, 'CTESP - DPM', 'Desenvolvimento de Produtos Multimédia', 1),
(2, 'CTESP - RSI', 'Redes e Sistemas Informáticos', 1),
(3, 'LI', 'Informática', 2),
(4, 'LEM', 'Engenharia Multimédia', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `troles`
--

CREATE TABLE IF NOT EXISTS `troles` (
  `id_role` int(11) NOT NULL COMMENT 'id de tipo de utilizador',
  `role` varchar(64) NOT NULL COMMENT 'designação do tipo de utilizador',
  `active` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'estado do tipo de utilizador'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `troles`
--

INSERT INTO `troles` (`id_role`, `role`, `active`) VALUES
(1, 'Admin', 1),
(2, 'Secretaria', 1),
(3, 'Professor', 1),
(4, 'Aluno', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tsummarys`
--

CREATE TABLE IF NOT EXISTS `tsummarys` (
  `id_summary` int(11) NOT NULL,
  `id_class` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `summary` varchar(255) NOT NULL,
  `class_date` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tsummarys`
--

INSERT INTO `tsummarys` (`id_summary`, `id_class`, `id_user`, `summary`, `class_date`) VALUES
(3, 1, 9, 'esta aula foi uma valente merda', '2001-06-03'),
(4, 5, 9, 'ola e adeus aula curta', '2017-06-16'),
(5, 5, 3, 'aula rapida', '2017-06-10'),
(6, 5, 3, 'aula fantastica', '2017-05-01');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tusers`
--

CREATE TABLE IF NOT EXISTS `tusers` (
  `id_user` int(11) NOT NULL COMMENT 'id de utilizador',
  `id_role` int(11) NOT NULL COMMENT 'chave secundaria indicando o tipo de utilizador',
  `username` varchar(32) NOT NULL COMMENT 'nome para login',
  `password` varchar(32) NOT NULL COMMENT 'palavra passe',
  `name` varchar(64) NOT NULL COMMENT 'nome',
  `picture` varchar(256) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'estado da conta'
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tusers`
--

INSERT INTO `tusers` (`id_user`, `id_role`, `username`, `password`, `name`, `picture`, `active`) VALUES
(1, 1, 'admin', 'admin', 'Administrador', 'uploads/admin/594036236e0b2.png', 1),
(2, 2, 'secretaria', 'istec', 'Secretaria', 'uploads/user_default.png', 1),
(3, 3, 'professor', 'istec', 'Professor', 'uploads/user_default.png', 1),
(4, 4, 'aluno', 'istec', 'Aluno', 'uploads/user_default.png', 1),
(5, 4, 'LIPTon', 'istec', 'Tiago', 'uploads/user_default.png', 1),
(7, 4, 'Tomcat', 'istec', 'Bruno', 'uploads/user_default.png', 1),
(9, 3, 'roberto', '123', 'Roberto Carlos', '', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tclasses`
--
ALTER TABLE `tclasses`
  ADD PRIMARY KEY (`id_class`),
  ADD KEY `class_degree` (`id_degree`);

--
-- Indexes for table `tClassInscription`
--
ALTER TABLE `tClassInscription`
  ADD PRIMARY KEY (`id_class_inscription`),
  ADD KEY `tclassInscriptionProfessor_tuser` (`id_user`),
  ADD KEY `tclassInscriptionProfessor_tclass` (`id_class`);

--
-- Indexes for table `tdegreelevels`
--
ALTER TABLE `tdegreelevels`
  ADD PRIMARY KEY (`id_degree_level`);

--
-- Indexes for table `tdegrees`
--
ALTER TABLE `tdegrees`
  ADD PRIMARY KEY (`id_degree`),
  ADD KEY `degrees_degreeLevels` (`id_degree_level`);

--
-- Indexes for table `troles`
--
ALTER TABLE `troles`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `tsummarys`
--
ALTER TABLE `tsummarys`
  ADD PRIMARY KEY (`id_summary`),
  ADD KEY `tsummarys_tclasses` (`id_class`),
  ADD KEY `tsummarys_tusers` (`id_user`);

--
-- Indexes for table `tusers`
--
ALTER TABLE `tusers`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `users_roles` (`id_role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tclasses`
--
ALTER TABLE `tclasses`
  MODIFY `id_class` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tClassInscription`
--
ALTER TABLE `tClassInscription`
  MODIFY `id_class_inscription` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tdegreelevels`
--
ALTER TABLE `tdegreelevels`
  MODIFY `id_degree_level` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tdegrees`
--
ALTER TABLE `tdegrees`
  MODIFY `id_degree` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id do curso',AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `troles`
--
ALTER TABLE `troles`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id de tipo de utilizador',AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tsummarys`
--
ALTER TABLE `tsummarys`
  MODIFY `id_summary` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tusers`
--
ALTER TABLE `tusers`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id de utilizador',AUTO_INCREMENT=10;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `tclasses`
--
ALTER TABLE `tclasses`
  ADD CONSTRAINT `FK_classDegree` FOREIGN KEY (`id_degree`) REFERENCES `tdegrees` (`id_degree`);

--
-- Limitadores para a tabela `tClassInscription`
--
ALTER TABLE `tClassInscription`
  ADD CONSTRAINT `FK_classInscriptionProfessor_class` FOREIGN KEY (`id_class`) REFERENCES `tclasses` (`id_class`),
  ADD CONSTRAINT `FK_classInscriptionProfessor_user` FOREIGN KEY (`id_user`) REFERENCES `tusers` (`id_user`);

--
-- Limitadores para a tabela `tdegrees`
--
ALTER TABLE `tdegrees`
  ADD CONSTRAINT `fk_degrees_degreeLevels` FOREIGN KEY (`id_degree_level`) REFERENCES `tdegreelevels` (`id_degree_level`);

--
-- Limitadores para a tabela `tsummarys`
--
ALTER TABLE `tsummarys`
  ADD CONSTRAINT `FK_summary_class` FOREIGN KEY (`id_class`) REFERENCES `tclasses` (`id_class`),
  ADD CONSTRAINT `FK_summary_user` FOREIGN KEY (`id_user`) REFERENCES `tusers` (`id_user`);

--
-- Limitadores para a tabela `tusers`
--
ALTER TABLE `tusers`
  ADD CONSTRAINT `tusers_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `troles` (`id_role`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
