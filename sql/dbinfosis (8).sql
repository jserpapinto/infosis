-- phpMyAdmin SQL Dump
-- version 4.4.15.8
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 21-Jun-2017 às 20:50
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
-- Estrutura da tabela `tAttendancies`
--

DROP TABLE IF EXISTS `tAttendancies`;
CREATE TABLE IF NOT EXISTS `tAttendancies` (
  `id_attendacie` int(11) NOT NULL,
  `id_summary` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `attendancy` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tClasses`
--

DROP TABLE IF EXISTS `tClasses`;
CREATE TABLE IF NOT EXISTS `tClasses` (
  `id_class` int(11) NOT NULL,
  `id_degree` int(11) NOT NULL,
  `semester` int(11) NOT NULL,
  `code` varchar(16) NOT NULL,
  `fullName` varchar(140) NOT NULL,
  `credits` int(11) NOT NULL,
  `hours` int(11) NOT NULL,
  `aulas` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tClasses`
--

INSERT INTO `tClasses` (`id_class`, `id_degree`, `semester`, `code`, `fullName`, `credits`, `hours`, `aulas`, `active`) VALUES
(1, 3, 0, '41022', 'Tecnologias da Internet IV', 4, 108, 0, 1),
(3, 2, 0, 'asdasd', 'asdsda', 7, 5, 0, 1),
(4, 2, 0, 'asdasdasdsdad', 'asdasdasdasd', 6, 6, 0, 1),
(5, 4, 0, 'sadsadadsadsdads', 'asdasdasd', 13, 12, 0, 1),
(6, 3, 0, 'INF-AC', 'Arquitetura de Computadores', 4, 48, 0, 1),
(7, 3, 0, 'INF-ICC II', 'Introdução à Ciência dos Computadores', 6, 48, 0, 1),
(8, 3, 0, 'INF-P I', 'Programação I', 6, 48, 0, 1),
(9, 3, 0, 'INF-RC1', 'Redes e Comunicações I', 4, 48, 0, 1),
(10, 3, 0, 'INF-M I', 'Matemática I', 6, 48, 0, 1),
(11, 3, 0, 'INF-TI I', 'Tecnologias da Internet I', 4, 48, 0, 1),
(12, 3, 0, 'INF-TI II', 'Tecnologias da Internet II', 4, 48, 0, 1),
(13, 3, 0, 'INF-RC II', 'Redes e Comunicações II', 4, 48, 0, 1),
(14, 3, 0, 'INF-AED', 'Algoritmos e Estruturas de Dados', 6, 48, 0, 1),
(15, 3, 0, 'INF-P II', 'Programação II', 6, 48, 0, 1),
(16, 3, 0, 'INF-M II', 'Matemática II', 6, 48, 0, 1),
(17, 3, 0, 'INF-ED', 'Estatística Descritiva', 4, 48, 0, 1),
(18, 3, 0, 'INF-AR I', 'Administração de Redes I', 4, 48, 0, 1),
(19, 3, 0, 'INF-BD', 'Bases de Dados', 4, 48, 0, 1),
(20, 3, 0, 'INF-P III', 'Programação III', 6, 48, 0, 1),
(21, 3, 0, 'INF-SM I', 'Sistemas Multimédia I', 6, 48, 0, 1),
(22, 3, 0, 'INF-TI III', 'Tecnologias de Internet III', 4, 48, 0, 1),
(23, 3, 0, 'INF-TPMS', 'Teoria das Probabilidades e Modelos de Simulação', 6, 48, 0, 1),
(24, 3, 0, 'INF-AR II', 'Administração de Redes II', 4, 48, 0, 1),
(25, 3, 0, 'INF-SGBD', 'Sistemas de Gestão de Bases de Dados', 6, 48, 0, 1),
(26, 3, 0, 'INF-P IV', 'Programação IV', 6, 48, 0, 1),
(27, 3, 0, 'INF-SM II', 'Sistemas Multimédia II', 6, 48, 0, 1),
(28, 3, 0, 'INF-TI IV', 'Tecnologias de Internet IV', 4, 48, 0, 1),
(29, 3, 0, 'INF-CF', 'Cálculo Financeiro', 4, 48, 0, 1),
(30, 3, 0, 'INF-DI', 'Direito da Informática', 4, 48, 0, 1),
(31, 3, 0, 'INF-ATSIE', 'Arquitetura Técnica de Sistemas de Informação Empresarial', 6, 48, 0, 1),
(32, 3, 0, 'INF-C', 'Criptografia', 6, 48, 0, 1),
(33, 3, 0, 'INF-GE', 'Gestão Empresarial', 4, 48, 0, 1),
(34, 3, 0, 'INF-HCT', 'História da Ciência e das Técnicas', 4, 48, 0, 1),
(35, 3, 0, 'INF-P V', 'Programação V', 6, 48, 0, 1),
(36, 3, 0, 'INF-MSC', 'Modelos de Simulação Computacionais', 6, 48, 0, 1),
(37, 3, 0, 'INF-SI', 'Segurança Informática', 4, 48, 0, 1),
(38, 3, 0, 'INF-PG', 'Projeto Global (Anual)', 20, 96, 0, 1),
(39, 4, 0, 'MUL-AFC', 'Arquitectura e Funcionamento dos Computadores', 4, 48, 0, 1),
(40, 4, 0, 'MUL-MDI', 'Multimédia Digital Interactiva', 6, 48, 0, 1),
(41, 4, 0, 'MUL-PC', 'Programação de Computadores', 6, 48, 0, 1),
(42, 4, 0, 'MUL-RI I', 'Redes e Internet I', 4, 48, 0, 1),
(43, 4, 0, 'MUL-MQ', 'Métodos Quantitativos', 6, 48, 0, 1),
(44, 4, 0, 'MUL-WM I', 'Web e Multimédia I', 4, 48, 0, 1),
(45, 4, 0, 'MUL-WM II', 'Web e Multimédia II', 4, 48, 0, 1),
(46, 4, 0, 'MUL-RI II', 'Redes e Internet II', 4, 48, 0, 1),
(47, 4, 0, 'MUL-TAG I', 'Técnicas de Animação Gráfica I', 6, 48, 0, 1),
(48, 4, 0, 'MUL-PC II', 'Programação de Computadores II', 6, 48, 0, 1),
(49, 4, 0, 'MUL-MQ II', 'Métodos Quantitativos II', 6, 48, 0, 1),
(50, 4, 0, 'MUL-ED', 'Estatística Descritiva', 4, 48, 0, 1),
(51, 4, 0, 'MUL-TAG II', 'Técnicas de Animação Gráfica II', 6, 48, 0, 1),
(52, 4, 0, 'MUL-BD', 'Bases de Dados', 4, 48, 0, 1),
(53, 4, 0, 'MUL-PC III I', 'Programação de Computadores III', 6, 48, 0, 1),
(54, 4, 0, 'MUL-DAW', 'Desenvolvimento de Aplicações Web', 6, 48, 0, 1),
(55, 4, 0, 'MUL-TIAVI I', 'Tecnologias de Imagem, Audio e Video na Internet I', 4, 48, 0, 1),
(56, 4, 0, 'MUL-NBPE', 'Noções Básicas de Probabilidades e Estatística', 4, 48, 0, 1),
(57, 4, 0, 'MUL-MS', 'Multimédia Scriptwriting', 4, 48, 0, 1),
(58, 4, 0, 'MUL-SGBD', 'Sistemas de Gestão de Bases de Dados', 6, 48, 0, 1),
(59, 4, 0, 'MUL-ADM', 'Aplicações para Dispositivos Móveis', 6, 48, 0, 1),
(60, 4, 0, 'MUL-TML', 'Tecnologias Multimédia para E-Learning', 6, 48, 0, 1),
(61, 4, 0, 'MUL-TIAVI II', 'Tecnologias de Imagem, Audio e Video na Internet II', 4, 48, 0, 1),
(62, 4, 0, 'MUL-CF', 'Cálculo Financeiro', 4, 48, 0, 1),
(63, 4, 0, 'MUL-DI', 'Direito da Informática', 4, 48, 0, 1),
(64, 4, 0, 'MUL-DP', 'Desktop Publishing', 6, 48, 0, 1),
(65, 4, 0, 'MUL-C', 'Criptografia', 6, 48, 0, 1),
(66, 4, 0, 'MUL-GE', 'Gestão Empresarial', 4, 48, 0, 1),
(67, 4, 0, 'MUL-PG', 'Projeto Global (Anual)', 20, 96, 0, 1),
(68, 4, 0, 'MUL-HCT', 'História da Ciência e das Técnicas', 4, 48, 0, 1),
(69, 4, 0, 'MUL-EMI', 'Edições Multimédia Interactivas', 6, 48, 0, 1),
(70, 4, 0, 'MUL-TS', 'Técnicas de Simulação', 6, 48, 0, 1),
(71, 4, 0, 'MUL-GCO', 'Gestão de Conteúdos On-Line', 4, 48, 0, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tClassInscriptions`
--

DROP TABLE IF EXISTS `tClassInscriptions`;
CREATE TABLE IF NOT EXISTS `tClassInscriptions` (
  `id_class_inscription` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_class` int(11) NOT NULL,
  `id_year` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=141 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tClassInscriptions`
--

INSERT INTO `tClassInscriptions` (`id_class_inscription`, `id_user`, `id_class`, `id_year`) VALUES
(1, 9, 3, 1),
(2, 3, 5, 1),
(3, 14, 6, 1),
(4, 14, 6, 1),
(5, 10, 7, 1),
(6, 10, 7, 1),
(7, 11, 8, 1),
(8, 11, 8, 1),
(9, 19, 9, 1),
(10, 19, 9, 1),
(11, 12, 10, 1),
(12, 12, 10, 1),
(13, 13, 11, 1),
(14, 13, 11, 1),
(15, 20, 12, 1),
(16, 20, 12, 1),
(17, 16, 13, 1),
(18, 16, 13, 1),
(19, 11, 14, 1),
(20, 11, 14, 1),
(21, 11, 15, 1),
(22, 11, 15, 1),
(23, 12, 16, 1),
(24, 12, 16, 1),
(25, 12, 17, 1),
(26, 12, 17, 1),
(27, 16, 18, 1),
(28, 16, 18, 1),
(29, 16, 19, 1),
(30, 16, 19, 1),
(31, 11, 20, 1),
(32, 11, 20, 1),
(33, 10, 21, 1),
(34, 10, 21, 1),
(35, 11, 22, 1),
(36, 11, 22, 1),
(37, 12, 23, 1),
(38, 12, 23, 1),
(39, 16, 24, 1),
(40, 16, 24, 1),
(41, 16, 25, 1),
(42, 16, 25, 1),
(43, 29, 26, 1),
(44, 29, 26, 1),
(45, 17, 27, 1),
(46, 17, 27, 1),
(47, 13, 28, 1),
(48, 13, 28, 1),
(49, 18, 29, 1),
(50, 18, 29, 1),
(51, 18, 30, 1),
(52, 18, 30, 1),
(53, 16, 31, 1),
(54, 16, 31, 1),
(55, 19, 32, 1),
(56, 19, 32, 1),
(57, 18, 33, 1),
(58, 18, 33, 1),
(59, 14, 34, 1),
(60, 14, 34, 1),
(61, 11, 35, 1),
(62, 11, 35, 1),
(63, 12, 36, 1),
(64, 12, 36, 1),
(65, 19, 37, 1),
(66, 19, 37, 1),
(67, 17, 38, 1),
(68, 17, 38, 1),
(69, 23, 6, 1),
(70, 24, 6, 1),
(71, 25, 6, 1),
(72, 23, 7, 1),
(73, 24, 7, 1),
(74, 25, 7, 1),
(75, 23, 8, 1),
(76, 24, 8, 1),
(77, 25, 8, 1),
(78, 23, 9, 1),
(79, 24, 9, 1),
(80, 25, 9, 1),
(81, 23, 10, 1),
(82, 24, 10, 1),
(83, 25, 10, 1),
(84, 23, 11, 1),
(85, 24, 11, 1),
(86, 25, 11, 1),
(87, 23, 12, 1),
(88, 24, 12, 1),
(89, 25, 12, 1),
(90, 23, 13, 1),
(91, 24, 13, 1),
(92, 25, 13, 1),
(93, 23, 14, 1),
(94, 24, 14, 1),
(95, 25, 14, 1),
(96, 23, 15, 1),
(97, 24, 15, 1),
(98, 25, 15, 1),
(99, 23, 16, 1),
(100, 24, 16, 1),
(101, 25, 16, 1),
(102, 23, 17, 1),
(103, 24, 17, 1),
(104, 25, 17, 1),
(105, 23, 18, 1),
(106, 24, 18, 1),
(107, 25, 18, 1),
(108, 23, 19, 1),
(109, 24, 19, 1),
(110, 25, 19, 1),
(111, 23, 20, 1),
(112, 24, 20, 1),
(113, 25, 20, 1),
(114, 23, 21, 1),
(115, 24, 21, 1),
(116, 25, 21, 1),
(117, 23, 22, 1),
(118, 24, 22, 1),
(119, 25, 22, 1),
(120, 23, 23, 1),
(121, 24, 23, 1),
(122, 25, 23, 1),
(123, 23, 24, 1),
(124, 24, 24, 1),
(125, 25, 24, 1),
(126, 23, 25, 1),
(127, 24, 25, 1),
(128, 25, 25, 1),
(129, 23, 26, 1),
(130, 24, 26, 1),
(131, 25, 26, 1),
(132, 23, 27, 1),
(133, 24, 27, 1),
(134, 25, 27, 1),
(135, 23, 28, 1),
(136, 24, 28, 1),
(137, 25, 28, 1),
(138, 23, 29, 1),
(139, 24, 29, 1),
(140, 25, 29, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tDegreeLevels`
--

DROP TABLE IF EXISTS `tDegreeLevels`;
CREATE TABLE IF NOT EXISTS `tDegreeLevels` (
  `id_degree_level` int(11) NOT NULL,
  `designation` varchar(100) NOT NULL,
  `semesters` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tDegreeLevels`
--

INSERT INTO `tDegreeLevels` (`id_degree_level`, `designation`, `semesters`) VALUES
(1, 'CTESP', 4),
(2, 'Licenciatura', 6),
(3, 'Pós-Graduação', 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tDegrees`
--

DROP TABLE IF EXISTS `tDegrees`;
CREATE TABLE IF NOT EXISTS `tDegrees` (
  `id_degree` int(11) NOT NULL COMMENT 'id do curso',
  `code` varchar(12) NOT NULL COMMENT 'código do curso',
  `fullName` varchar(140) NOT NULL COMMENT 'designação completa do curso',
  `id_degree_level` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

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

DROP TABLE IF EXISTS `tRoles`;
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
-- Estrutura da tabela `tSummarys`
--

DROP TABLE IF EXISTS `tSummarys`;
CREATE TABLE IF NOT EXISTS `tSummarys` (
  `id_summary` int(11) NOT NULL,
  `id_class` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `n_aula` int(11) NOT NULL,
  `summary_date` date NOT NULL,
  `summary` varchar(255) NOT NULL,
  `id_year` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tSummarys`
--

INSERT INTO `tSummarys` (`id_summary`, `id_class`, `id_user`, `n_aula`, `summary_date`, `summary`, `id_year`) VALUES
(3, 1, 9, 0, '0000-00-00', 'esta aula foi muito boa', 1),
(4, 5, 9, 0, '0000-00-00', 'ola e adeus aula curta', 1),
(5, 5, 3, 0, '0000-00-00', 'aula rapida', 1),
(6, 5, 3, 0, '0000-00-00', 'aula fantastica', 1),
(9, 6, 14, 0, '0000-00-00', 'Aenean fermentum mauris dolor, in feugiat tellus blandit sed. Mauris vulputate egestas congue. Etiam et.', 1),
(10, 7, 10, 0, '0000-00-00', 'ai ai', 1),
(11, 8, 11, 0, '0000-00-00', 'Cras condimentum rhoncus semper. Nullam vitae accumsan risus. Vestibulum tincidunt massa sit amet nulla luctus.', 1),
(12, 9, 19, 0, '0000-00-00', 'Donec condimentum imperdiet auctor. Aliquam dignissim erat sit amet ex lobortis, vel pretium diam blandit.', 1),
(13, 10, 12, 0, '0000-00-00', 'Suspendisse ac lobortis sapien. Pellentesque vel sagittis nunc, in imperdiet massa. Etiam eget justo aliquet.', 1),
(14, 11, 13, 0, '0000-00-00', 'Aenean eu semper purus. Maecenas interdum felis nisl, nec elementum tortor hendrerit nec. Duis iaculis.', 1),
(24, 33, 18, 0, '0000-00-00', 'bela merda', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tUsers`
--

DROP TABLE IF EXISTS `tUsers`;
CREATE TABLE IF NOT EXISTS `tUsers` (
  `id_user` int(11) NOT NULL COMMENT 'id de utilizador',
  `id_role` int(11) NOT NULL COMMENT 'chave secundaria indicando o tipo de utilizador',
  `username` varchar(32) NOT NULL COMMENT 'nome para login',
  `password` varchar(32) NOT NULL COMMENT 'palavra passe',
  `name` varchar(64) NOT NULL COMMENT 'nome',
  `picture` varchar(256) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'estado da conta'
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tUsers`
--

INSERT INTO `tUsers` (`id_user`, `id_role`, `username`, `password`, `name`, `picture`, `active`) VALUES
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

-- --------------------------------------------------------

--
-- Estrutura da tabela `tYears`
--

DROP TABLE IF EXISTS `tYears`;
CREATE TABLE IF NOT EXISTS `tYears` (
  `id_year` int(11) NOT NULL,
  `beginning` date NOT NULL,
  `ending` date DEFAULT NULL,
  `current` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tYears`
--

INSERT INTO `tYears` (`id_year`, `beginning`, `ending`, `current`) VALUES
(1, '2016-09-01', '2017-07-29', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tAttendancies`
--
ALTER TABLE `tAttendancies`
  ADD PRIMARY KEY (`id_attendacie`),
  ADD KEY `tAttendancy_tSummary` (`id_summary`),
  ADD KEY `tAttendancy_tUser` (`id_user`);

--
-- Indexes for table `tClasses`
--
ALTER TABLE `tClasses`
  ADD PRIMARY KEY (`id_class`),
  ADD KEY `class_degree` (`id_degree`);

--
-- Indexes for table `tClassInscriptions`
--
ALTER TABLE `tClassInscriptions`
  ADD PRIMARY KEY (`id_class_inscription`),
  ADD KEY `tclassInscription_tuser` (`id_user`) USING BTREE,
  ADD KEY `tclassInscription_tclass` (`id_class`) USING BTREE,
  ADD KEY `tClassInscription_tYear` (`id_year`) USING BTREE;

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
-- Indexes for table `tSummarys`
--
ALTER TABLE `tSummarys`
  ADD PRIMARY KEY (`id_summary`),
  ADD KEY `tSummarys_tclasses` (`id_class`),
  ADD KEY `tSummarys_tusers` (`id_user`),
  ADD KEY `tSummary_tYear` (`id_year`) USING BTREE;

--
-- Indexes for table `tUsers`
--
ALTER TABLE `tUsers`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `users_roles` (`id_role`);

--
-- Indexes for table `tYears`
--
ALTER TABLE `tYears`
  ADD PRIMARY KEY (`id_year`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tAttendancies`
--
ALTER TABLE `tAttendancies`
  MODIFY `id_attendacie` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tClasses`
--
ALTER TABLE `tClasses`
  MODIFY `id_class` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=72;
--
-- AUTO_INCREMENT for table `tClassInscriptions`
--
ALTER TABLE `tClassInscriptions`
  MODIFY `id_class_inscription` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=141;
--
-- AUTO_INCREMENT for table `tDegreeLevels`
--
ALTER TABLE `tDegreeLevels`
  MODIFY `id_degree_level` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tDegrees`
--
ALTER TABLE `tDegrees`
  MODIFY `id_degree` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id do curso',AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tRoles`
--
ALTER TABLE `tRoles`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id de tipo de utilizador',AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tSummarys`
--
ALTER TABLE `tSummarys`
  MODIFY `id_summary` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `tUsers`
--
ALTER TABLE `tUsers`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id de utilizador',AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `tYears`
--
ALTER TABLE `tYears`
  MODIFY `id_year` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `tAttendancies`
--
ALTER TABLE `tAttendancies`
  ADD CONSTRAINT `FK_tAttendancies_tSummary` FOREIGN KEY (`id_summary`) REFERENCES `tSummarys` (`id_summary`),
  ADD CONSTRAINT `FK_tAttendancies_tUser` FOREIGN KEY (`id_user`) REFERENCES `tUsers` (`id_user`);

--
-- Limitadores para a tabela `tClasses`
--
ALTER TABLE `tClasses`
  ADD CONSTRAINT `FK_classDegree` FOREIGN KEY (`id_degree`) REFERENCES `tDegrees` (`id_degree`);

--
-- Limitadores para a tabela `tClassInscriptions`
--
ALTER TABLE `tClassInscriptions`
  ADD CONSTRAINT `FK_classInscription_class` FOREIGN KEY (`id_class`) REFERENCES `tClasses` (`id_class`),
  ADD CONSTRAINT `FK_classInscription_user` FOREIGN KEY (`id_user`) REFERENCES `tUsers` (`id_user`),
  ADD CONSTRAINT `FK_tClassInscriptions_tYear` FOREIGN KEY (`id_year`) REFERENCES `tYears` (`id_year`);

--
-- Limitadores para a tabela `tDegrees`
--
ALTER TABLE `tDegrees`
  ADD CONSTRAINT `fk_degrees_degreeLevels` FOREIGN KEY (`id_degree_level`) REFERENCES `tDegreeLevels` (`id_degree_level`);

--
-- Limitadores para a tabela `tSummarys`
--
ALTER TABLE `tSummarys`
  ADD CONSTRAINT `FK_summary_class` FOREIGN KEY (`id_class`) REFERENCES `tClasses` (`id_class`),
  ADD CONSTRAINT `FK_summary_user` FOREIGN KEY (`id_user`) REFERENCES `tUsers` (`id_user`),
  ADD CONSTRAINT `FK_tSummarys_tYear` FOREIGN KEY (`id_year`) REFERENCES `tYears` (`id_year`);

--
-- Limitadores para a tabela `tUsers`
--
ALTER TABLE `tUsers`
  ADD CONSTRAINT `tUsers_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `tRoles` (`id_role`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
