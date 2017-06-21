-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 21-Jun-2017 às 15:17
-- Versão do servidor: 10.1.13-MariaDB
-- PHP Version: 7.0.6

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

CREATE TABLE `tclasses` (
  `id_class` int(11) NOT NULL,
  `id_degree` int(11) NOT NULL,
  `code` varchar(16) NOT NULL,
  `fullName` varchar(140) NOT NULL,
  `credits` int(11) NOT NULL,
  `hours` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tclasses`
--

INSERT INTO `tclasses` (`id_class`, `id_degree`, `code`, `fullName`, `credits`, `hours`, `active`) VALUES
(1, 3, '41022', 'Tecnologias da Internet IV', 4, 108, 1),
(3, 2, 'asdasd', 'asdsda', 7, 5, 1),
(4, 2, 'asdasdasdsdad', 'asdasdasdasd', 6, 6, 1),
(5, 4, 'sadsadadsadsdads', 'asdasdasd', 13, 12, 1),
(6, 3, 'INF-AC', 'Arquitetura de Computadores', 4, 48, 1),
(7, 3, 'INF-ICC II', 'Introdução à Ciência dos Computadores', 6, 48, 1),
(8, 3, 'INF-P I', 'Programação I', 6, 48, 1),
(9, 3, 'INF-RC1', 'Redes e Comunicações I', 4, 48, 1),
(10, 3, 'INF-M I', 'Matemática I', 6, 48, 1),
(11, 3, 'INF-TI I', 'Tecnologias da Internet I', 4, 48, 1),
(12, 3, 'INF-TI II', 'Tecnologias da Internet II', 4, 48, 1),
(13, 3, 'INF-RC II', 'Redes e Comunicações II', 4, 48, 1),
(14, 3, 'INF-AED', 'Algoritmos e Estruturas de Dados', 6, 48, 1),
(15, 3, 'INF-P II', 'Programação II', 6, 48, 1),
(16, 3, 'INF-M II', 'Matemática II', 6, 48, 1),
(17, 3, 'INF-ED', 'Estatística Descritiva', 4, 48, 1),
(18, 3, 'INF-AR I', 'Administração de Redes I', 4, 48, 1),
(19, 3, 'INF-BD', 'Bases de Dados', 4, 48, 1),
(20, 3, 'INF-P III', 'Programação III', 6, 48, 1),
(21, 3, 'INF-SM I', 'Sistemas Multimédia I', 6, 48, 1),
(22, 3, 'INF-TI III', 'Tecnologias de Internet III', 4, 48, 1),
(23, 3, 'INF-TPMS', 'Teoria das Probabilidades e Modelos de Simulação', 6, 48, 1),
(24, 3, 'INF-AR II', 'Administração de Redes II', 4, 48, 1),
(25, 3, 'INF-SGBD', 'Sistemas de Gestão de Bases de Dados', 6, 48, 1),
(26, 3, 'INF-P IV', 'Programação IV', 6, 48, 1),
(27, 3, 'INF-SM II', 'Sistemas Multimédia II', 6, 48, 1),
(28, 3, 'INF-TI IV', 'Tecnologias de Internet IV', 4, 48, 1),
(29, 3, 'INF-CF', 'Cálculo Financeiro', 4, 48, 1),
(30, 3, 'INF-DI', 'Direito da Informática', 4, 48, 1),
(31, 3, 'INF-ATSIE', 'Arquitetura Técnica de Sistemas de Informação Empresarial', 6, 48, 1),
(32, 3, 'INF-C', 'Criptografia', 6, 48, 1),
(33, 3, 'INF-GE', 'Gestão Empresarial', 4, 48, 1),
(34, 3, 'INF-HCT', 'História da Ciência e das Técnicas', 4, 48, 1),
(35, 3, 'INF-P V', 'Programação V', 6, 48, 1),
(36, 3, 'INF-MSC', 'Modelos de Simulação Computacionais', 6, 48, 1),
(37, 3, 'INF-SI', 'Segurança Informática', 4, 48, 1),
(38, 3, 'INF-PG', 'Projeto Global (Anual)', 20, 96, 1),
(39, 4, 'MUL-AFC', 'Arquitectura e Funcionamento dos Computadores', 4, 48, 1),
(40, 4, 'MUL-MDI', 'Multimédia Digital Interactiva', 6, 48, 1),
(41, 4, 'MUL-PC', 'Programação de Computadores', 6, 48, 1),
(42, 4, 'MUL-RI I', 'Redes e Internet I', 4, 48, 1),
(43, 4, 'MUL-MQ', 'Métodos Quantitativos', 6, 48, 1),
(44, 4, 'MUL-WM I', 'Web e Multimédia I', 4, 48, 1),
(45, 4, 'MUL-WM II', 'Web e Multimédia II', 4, 48, 1),
(46, 4, 'MUL-RI II', 'Redes e Internet II', 4, 48, 1),
(47, 4, 'MUL-TAG I', 'Técnicas de Animação Gráfica I', 6, 48, 1),
(48, 4, 'MUL-PC II', 'Programação de Computadores II', 6, 48, 1),
(49, 4, 'MUL-MQ II', 'Métodos Quantitativos II', 6, 48, 1),
(50, 4, 'MUL-ED', 'Estatística Descritiva', 4, 48, 1),
(51, 4, 'MUL-TAG II', 'Técnicas de Animação Gráfica II', 6, 48, 1),
(52, 4, 'MUL-BD', 'Bases de Dados', 4, 48, 1),
(53, 4, 'MUL-PC III I', 'Programação de Computadores III', 6, 48, 1),
(54, 4, 'MUL-DAW', 'Desenvolvimento de Aplicações Web', 6, 48, 1),
(55, 4, 'MUL-TIAVI I', 'Tecnologias de Imagem, Audio e Video na Internet I', 4, 48, 1),
(56, 4, 'MUL-NBPE', 'Noções Básicas de Probabilidades e Estatística', 4, 48, 1),
(57, 4, 'MUL-MS', 'Multimédia Scriptwriting', 4, 48, 1),
(58, 4, 'MUL-SGBD', 'Sistemas de Gestão de Bases de Dados', 6, 48, 1),
(59, 4, 'MUL-ADM', 'Aplicações para Dispositivos Móveis', 6, 48, 1),
(60, 4, 'MUL-TML', 'Tecnologias Multimédia para E-Learning', 6, 48, 1),
(61, 4, 'MUL-TIAVI II', 'Tecnologias de Imagem, Audio e Video na Internet II', 4, 48, 1),
(62, 4, 'MUL-CF', 'Cálculo Financeiro', 4, 48, 1),
(63, 4, 'MUL-DI', 'Direito da Informática', 4, 48, 1),
(64, 4, 'MUL-DP', 'Desktop Publishing', 6, 48, 1),
(65, 4, 'MUL-C', 'Criptografia', 6, 48, 1),
(66, 4, 'MUL-GE', 'Gestão Empresarial', 4, 48, 1),
(67, 4, 'MUL-PG', 'Projeto Global (Anual)', 20, 96, 1),
(68, 4, 'MUL-HCT', 'História da Ciência e das Técnicas', 4, 48, 1),
(69, 4, 'MUL-EMI', 'Edições Multimédia Interactivas', 6, 48, 1),
(70, 4, 'MUL-TS', 'Técnicas de Simulação', 6, 48, 1),
(71, 4, 'MUL-GCO', 'Gestão de Conteúdos On-Line', 4, 48, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tclassinscription`
--

CREATE TABLE `tclassinscription` (
  `id_class_inscription` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_class` int(11) NOT NULL,
  `inscription_year` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tclassinscription`
--

INSERT INTO `tclassinscription` (`id_class_inscription`, `id_user`, `id_class`, `inscription_year`) VALUES
(1, 9, 3, '2017-06-14'),
(2, 3, 5, '2017-06-21'),
(3, 14, 6, '2016-10-03'),
(4, 14, 6, '2017-10-03'),
(5, 10, 7, '2016-10-03'),
(6, 10, 7, '2017-10-03'),
(7, 11, 8, '2016-10-03'),
(8, 11, 8, '2017-10-03'),
(9, 19, 9, '2016-10-03'),
(10, 19, 9, '2017-10-03'),
(11, 12, 10, '2016-10-03'),
(12, 12, 10, '2017-10-03'),
(13, 13, 11, '2016-10-03'),
(14, 13, 11, '2017-10-03'),
(15, 20, 12, '2016-10-03'),
(16, 20, 12, '2017-10-03'),
(17, 16, 13, '2017-10-03'),
(18, 16, 13, '2016-10-03'),
(19, 11, 14, '2017-10-03'),
(20, 11, 14, '2016-10-03'),
(21, 11, 15, '2017-10-03'),
(22, 11, 15, '2016-10-03'),
(23, 12, 16, '2017-10-03'),
(24, 12, 16, '2016-10-03'),
(25, 12, 17, '2017-10-03'),
(26, 12, 17, '2016-10-03'),
(27, 16, 18, '2017-10-03'),
(28, 16, 18, '2016-10-03'),
(29, 16, 19, '2016-10-03'),
(30, 16, 19, '2017-10-03'),
(31, 11, 20, '2016-10-03'),
(32, 11, 20, '2017-10-03'),
(33, 10, 21, '2017-10-03'),
(34, 10, 21, '2016-10-03'),
(35, 11, 22, '2017-10-03'),
(36, 11, 22, '2016-10-03'),
(37, 12, 23, '2017-10-03'),
(38, 12, 23, '2016-10-03'),
(39, 16, 24, '2017-10-03'),
(40, 16, 24, '2016-10-03'),
(41, 16, 25, '2017-10-03'),
(42, 16, 25, '2016-10-03'),
(43, 29, 26, '2017-10-03'),
(44, 29, 26, '2016-10-03'),
(45, 17, 27, '2016-10-03'),
(46, 17, 27, '2017-10-03'),
(47, 13, 28, '2016-10-03'),
(48, 13, 28, '2017-10-03'),
(49, 18, 29, '2017-10-03'),
(50, 18, 29, '2016-10-03'),
(51, 18, 30, '2016-10-03'),
(52, 18, 30, '2017-10-03'),
(53, 16, 31, '2016-10-03'),
(54, 16, 31, '2017-10-03'),
(55, 19, 32, '2017-10-03'),
(56, 19, 32, '2016-10-03'),
(57, 18, 33, '2017-10-03'),
(58, 18, 33, '2016-10-03'),
(59, 14, 34, '2017-10-03'),
(60, 14, 34, '2016-10-03'),
(61, 11, 35, '2017-10-03'),
(62, 11, 35, '2016-10-03'),
(63, 12, 36, '2017-10-03'),
(64, 12, 36, '2016-10-03'),
(65, 19, 37, '2017-10-03'),
(66, 19, 37, '2016-10-03'),
(67, 17, 38, '2016-10-03'),
(68, 17, 38, '2017-10-03'),
(69, 23, 6, '2016-10-03'),
(70, 24, 6, '2016-10-03'),
(71, 25, 6, '2016-10-03'),
(72, 23, 7, '2016-10-03'),
(73, 24, 7, '2016-10-03'),
(74, 25, 7, '2016-10-03'),
(75, 23, 8, '2016-10-03'),
(76, 24, 8, '2016-10-03'),
(77, 25, 8, '2016-10-03'),
(78, 23, 9, '2016-10-03'),
(79, 24, 9, '2016-10-03'),
(80, 25, 9, '2016-10-03'),
(81, 23, 10, '2016-10-03'),
(82, 24, 10, '2016-10-03'),
(83, 25, 10, '2016-10-03'),
(84, 23, 11, '2016-10-03'),
(85, 24, 11, '2016-10-03'),
(86, 25, 11, '2016-10-03'),
(87, 23, 12, '2016-10-03'),
(88, 24, 12, '2016-10-03'),
(89, 25, 12, '2016-10-03'),
(90, 23, 13, '2016-10-03'),
(91, 24, 13, '2016-10-03'),
(92, 25, 13, '2016-10-03'),
(93, 23, 14, '2016-10-03'),
(94, 24, 14, '2016-10-03'),
(95, 25, 14, '2016-10-03'),
(96, 23, 15, '2016-10-03'),
(97, 24, 15, '2016-10-03'),
(98, 25, 15, '2016-10-03'),
(99, 23, 16, '2016-10-03'),
(100, 24, 16, '2016-10-03'),
(101, 25, 16, '2016-10-03'),
(102, 23, 17, '2016-10-03'),
(103, 24, 17, '2016-10-03'),
(104, 25, 17, '2016-10-03'),
(105, 23, 18, '2017-10-03'),
(106, 24, 18, '2017-10-03'),
(107, 25, 18, '2017-10-03'),
(108, 23, 19, '2017-10-03'),
(109, 24, 19, '2017-10-03'),
(110, 25, 19, '2017-10-03'),
(111, 23, 20, '2017-10-03'),
(112, 24, 20, '2017-10-03'),
(113, 25, 20, '2017-10-03'),
(114, 23, 21, '2017-10-03'),
(115, 24, 21, '2017-10-03'),
(116, 25, 21, '2017-10-03'),
(117, 23, 22, '2017-10-03'),
(118, 24, 22, '2017-10-03'),
(119, 25, 22, '2017-10-03'),
(120, 23, 23, '2017-10-03'),
(121, 24, 23, '2017-10-03'),
(122, 25, 23, '2017-10-03'),
(123, 23, 24, '2017-10-03'),
(124, 24, 24, '2017-10-03'),
(125, 25, 24, '2017-10-03'),
(126, 23, 25, '2017-10-03'),
(127, 24, 25, '2017-10-03'),
(128, 25, 25, '2017-10-03'),
(129, 23, 26, '2017-10-03'),
(130, 24, 26, '2017-10-03'),
(131, 25, 26, '2017-10-03'),
(132, 23, 27, '2017-10-03'),
(133, 24, 27, '2017-10-03'),
(134, 25, 27, '2017-10-03'),
(135, 23, 28, '2017-10-03'),
(136, 24, 28, '2017-10-03'),
(137, 25, 28, '2017-10-03'),
(138, 23, 29, '2017-10-03'),
(139, 24, 29, '2017-10-03'),
(140, 25, 29, '2017-10-03');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tdegreelevels`
--

CREATE TABLE `tdegreelevels` (
  `id_degree_level` int(11) NOT NULL,
  `designation` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

CREATE TABLE `tdegrees` (
  `id_degree` int(11) NOT NULL COMMENT 'id do curso',
  `code` varchar(12) NOT NULL COMMENT 'código do curso',
  `fullName` varchar(140) NOT NULL COMMENT 'designação completa do curso',
  `id_degree_level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

CREATE TABLE `troles` (
  `id_role` int(11) NOT NULL COMMENT 'id de tipo de utilizador',
  `role` varchar(64) NOT NULL COMMENT 'designação do tipo de utilizador',
  `active` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'estado do tipo de utilizador'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

CREATE TABLE `tsummarys` (
  `id_summary` int(11) NOT NULL,
  `id_class` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `summary` varchar(255) NOT NULL,
  `class_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tsummarys`
--

INSERT INTO `tsummarys` (`id_summary`, `id_class`, `id_user`, `summary`, `class_date`) VALUES
(3, 1, 9, 'esta aula foi muito boa', '2001-06-03'),
(4, 5, 9, 'ola e adeus aula curta', '2017-06-16'),
(5, 5, 3, 'aula rapida', '2017-06-10'),
(6, 5, 3, 'aula fantastica', '2017-05-01'),
(9, 6, 14, 'Aenean fermentum mauris dolor, in feugiat tellus blandit sed. Mauris vulputate egestas congue. Etiam et.', '2016-11-01'),
(10, 7, 10, 'Duis maximus enim non venenatis viverra. Integer cursus magna lectus. Suspendisse suscipit mauris dolor, ut.', '2016-11-01'),
(11, 8, 11, 'Cras condimentum rhoncus semper. Nullam vitae accumsan risus. Vestibulum tincidunt massa sit amet nulla luctus.', '2016-11-01'),
(12, 9, 19, 'Donec condimentum imperdiet auctor. Aliquam dignissim erat sit amet ex lobortis, vel pretium diam blandit.', '2016-11-01'),
(13, 10, 12, 'Suspendisse ac lobortis sapien. Pellentesque vel sagittis nunc, in imperdiet massa. Etiam eget justo aliquet.', '2016-11-01'),
(14, 11, 13, 'Aenean eu semper purus. Maecenas interdum felis nisl, nec elementum tortor hendrerit nec. Duis iaculis.', '2016-11-01');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tusers`
--

CREATE TABLE `tusers` (
  `id_user` int(11) NOT NULL COMMENT 'id de utilizador',
  `id_role` int(11) NOT NULL COMMENT 'chave secundaria indicando o tipo de utilizador',
  `username` varchar(32) NOT NULL COMMENT 'nome para login',
  `password` varchar(32) NOT NULL COMMENT 'palavra passe',
  `name` varchar(64) NOT NULL COMMENT 'nome',
  `picture` varchar(256) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'estado da conta'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(9, 3, 'roberto', '123', 'Roberto Carlos', 'uploads/user_default.png', 1),
(10, 3, 'jorgeM', '123', 'Jorge Mota', 'uploads/user_default.png', 1),
(11, 3, 'joãoR', '123', 'João Rebelo', 'uploads/user_default.png', 1),
(12, 3, 'gonçaloM', '123', 'Gonçalo Medeiros', 'uploads/user_default.png', 1),
(13, 3, 'joséV', '123', 'José Vasconcelos', 'uploads/user_default.png', 1),
(14, 3, 'luísaO', '123', 'Luísa Orvalho', 'uploads/user_default.png', 1),
(15, 3, 'joanaC', '123', 'Joana Carvalho', 'uploads/user_default.png', 1),
(16, 3, 'álvaroM', '123', 'Álvaro Magalhães', 'uploads/user_default.png', 1),
(17, 3, 'andréC', '123', 'André Cruz', 'uploads/user_default.png', 1),
(18, 3, 'fernandoP', '123', 'Fernando Pereira', 'uploads/user_default.png', 1),
(19, 3, 'pauloM', '123', 'Paulo Monteiro', 'uploads/user_default.png', 1),
(20, 3, 'hélderP', '123', 'Hélder Pinto', 'uploads/user_default.png', 1),
(21, 2, 'inêsS', '123', 'Inês Silva', 'uploads/user_default.png', 1),
(22, 2, 'sóniaS', '123', 'Sónia Sousa', 'uploads/user_default.png', 1),
(23, 4, 'brunoG', '123', 'Bruno Gomes', 'uploads/user_default.png', 1),
(24, 4, 'tiagoW', '123', 'Tiago Wong', 'uploads/user_default.png', 1),
(25, 4, 'joãoS', '123', 'João Serpa', 'uploads/user_default.png', 1),
(26, 4, 'miguelR', '123', 'Miguel Rocha', 'uploads/user_default.png', 1),
(27, 4, 'ricardoO', '123', 'Ricardo Oliveira', 'uploads/user_default.png', 1),
(28, 4, 'pedroM', '123', 'Pedro Macedo', 'uploads/user_default.png', 1),
(29, 3, 'joãoP', '123', 'João Pires', 'uploads/user_default.png', 1);

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
-- Indexes for table `tclassinscription`
--
ALTER TABLE `tclassinscription`
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
  ADD KEY `tSummarys_tclasses` (`id_class`),
  ADD KEY `tSummarys_tusers` (`id_user`);

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
  MODIFY `id_class` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;
--
-- AUTO_INCREMENT for table `tclassinscription`
--
ALTER TABLE `tclassinscription`
  MODIFY `id_class_inscription` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;
--
-- AUTO_INCREMENT for table `tdegreelevels`
--
ALTER TABLE `tdegreelevels`
  MODIFY `id_degree_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tdegrees`
--
ALTER TABLE `tdegrees`
  MODIFY `id_degree` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id do curso', AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `troles`
--
ALTER TABLE `troles`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id de tipo de utilizador', AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tsummarys`
--
ALTER TABLE `tsummarys`
  MODIFY `id_summary` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `tusers`
--
ALTER TABLE `tusers`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id de utilizador', AUTO_INCREMENT=30;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `tclasses`
--
ALTER TABLE `tclasses`
  ADD CONSTRAINT `FK_classDegree` FOREIGN KEY (`id_degree`) REFERENCES `tdegrees` (`id_degree`);

--
-- Limitadores para a tabela `tclassinscription`
--
ALTER TABLE `tclassinscription`
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
