-- phpMyAdmin SQL Dump
-- version 3.4.5deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 08-11-2011 a las 17:45:03
-- Versión del servidor: 5.1.58
-- Versión de PHP: 5.3.6-13ubuntu3.2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `electionape`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ea_answers`
--

CREATE TABLE IF NOT EXISTS `ea_answers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `answer` varchar(255) NOT NULL,
  `question_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=181 ;

--
-- Volcado de datos para la tabla `ea_answers`
--

INSERT INTO `ea_answers` (`id`, `answer`, `question_id`) VALUES
(177, 'si', 138),
(178, 'no', 138),
(179, 'si', 140),
(180, 'no', 140);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ea_candidates`
--

CREATE TABLE IF NOT EXISTS `ea_candidates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `election_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `imagepath` varchar(255) DEFAULT NULL,
  `imageurl` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=46 ;

--
-- Volcado de datos para la tabla `ea_candidates`
--

INSERT INTO `ea_candidates` (`id`, `election_id`, `name`, `slug`, `imagepath`, `imageurl`) VALUES
(2, 21, 'Sebastián Piñera', 'sebastian-pinera', 'http://www.votainteligente.cl/medianaranja/images/pinera.jpg', ''),
(1, 21, 'Jorge Arrate', 'jorge-arrate', 'http://www.votainteligente.cl/medianaranja/images/arrate.jpg', ''),
(40, 21, 'Pato Aparato', 'pato-aparato', 'http://cdn.buzznet.com/assets/users16/nagual2012/default/pato-aparato-duck-tales-pato--large-msg-12293439043.jpg', ''),
(41, 21, 'Mowgli de la selva', 'mowgli-de-la-selva', 'http://upload.wikimedia.org/wikipedia/commons/5/5e/Mowgli-1895-illustration.png', ''),
(28, 21, 'Mickey Mouse', 'mickey-mouse', 'http://3.bp.blogspot.com/-ENXaCTVkQ6Q/TiXU0nvlxnI/AAAAAAAAIqc/LhA6MFHqS9Q/s1600/mickey-mouse-10.jpg', ''),
(39, 21, 'Marvin el Marciano', 'marvin-el-marciano', 'http://upload.wikimedia.org/wikipedia/en/3/31/Marvinthemartain.jpg', ''),
(44, 28, 'perico los palotes', 'perico-los-palotes', 'communitycentre.png', ''),
(45, 28, 'lf Ááéñ~colita de chancho', 'lf-aaen-colita-de-chancho', 'bench.png', 'http://lapompeya.eurofull.com/postales/CHANCHO-FINAL.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ea_candidate_links`
--

CREATE TABLE IF NOT EXISTS `ea_candidate_links` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `candidate_profile_id` int(11) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=57 ;

--
-- Volcado de datos para la tabla `ea_candidate_links`
--

INSERT INTO `ea_candidate_links` (`id`, `candidate_profile_id`, `description`, `link`) VALUES
(1, 1, 'Página principal', 'http://www.arrate.cl'),
(39, 26, 'numero 37', 'sdasd'),
(40, 26, 'otro lonk', 'asdasdasrrr'),
(56, 2, 'Lonk', 'http://www.flims.cl'),
(38, 19, 'viaje dos en lan', 'www.lan.com/cgi-bin/compra/paso2.cgi?fecha1_dia=07&fecha1_anomes=2011-12&fecha2_dia=11&fecha2_anomes=2011-12&otras_ciudades=&num_segmentos_interfaz=2&tipo_paso1=caja&rand_check=1178.4693808294833&from_city2=ARI&to_city2=SCL&ida_vuelta=ida_vuelta&vu'),
(23, 19, 'Página oficial', 'http://www.mickeypresidente.com'),
(36, 26, 'Página del partido de marvin', 'http://www.partidodemarvin.com'),
(37, 19, 'viaje', 'http://www.despegar.cl/search/flights/RoundTrip/SCL/ARI/2011-12-07/2011-12-11/1/0/0'),
(35, 26, 'Página oficial', 'http://www.marvinpresidente.com'),
(42, 27, 'toonopedia', 'http://www.toonopedia.com/'),
(46, 28, 'Wikipedia', 'http://en.wikipedia.org/wiki/Mowgli'),
(47, 28, 'The jungle book', 'http://en.wikipedia.org/wiki/The_Jungle_Book'),
(48, 28, 'The law of the jungle', 'http://en.wikipedia.org/wiki/The_Law_of_the_Jungle'),
(49, 1, 'Socialistas Allendistas', 'http://www.socialistasallendistas.cl');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ea_candidate_parties`
--

CREATE TABLE IF NOT EXISTS `ea_candidate_parties` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `candidate_profile_id` int(11) NOT NULL,
  `starting_year` varchar(255) DEFAULT NULL,
  `ending_year` varchar(255) DEFAULT NULL,
  `party` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=44 ;

--
-- Volcado de datos para la tabla `ea_candidate_parties`
--

INSERT INTO `ea_candidate_parties` (`id`, `candidate_profile_id`, `starting_year`, `ending_year`, `party`) VALUES
(1, 1, '1963', '2009', 'Partido Socialista'),
(39, 27, '2000', 'Actualidad', 'Probando un elemento agregado dinamicamente'),
(3, 1, '2000', '2011', 'Partido Porcino Popular'),
(36, 26, '1910', '1988', 'partido patistico conservador y revolucionario'),
(25, 19, '1989', '2000', 'PAZ'),
(24, 19, '1910', '1992', 'Partido roedorae'),
(38, 27, '1990', '2000', 'Nuevamente desconocido'),
(43, 27, '1990', '2011', 'Partido de fútbol'),
(41, 2, '1990', '2011', 'RN'),
(42, 27, '2007', '2008', 'Partido amigable Valdiviano');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ea_candidate_political_experiences`
--

CREATE TABLE IF NOT EXISTS `ea_candidate_political_experiences` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `candidate_profile_id` int(11) DEFAULT NULL,
  `starting_year` varchar(255) DEFAULT NULL,
  `ending_year` varchar(255) DEFAULT NULL,
  `position` varchar(255) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Volcado de datos para la tabla `ea_candidate_political_experiences`
--

INSERT INTO `ea_candidate_political_experiences` (`id`, `candidate_profile_id`, `starting_year`, `ending_year`, `position`, `type`) VALUES
(1, 1, '1975', '1977', 'Secretario de relaciones internacionales del Partido Socialista', 0),
(2, 1, '1972', '1973', 'Ministro de minería interina', 1),
(32, 27, '1995', '1997', 'Secreatario general', 1),
(31, 27, '1987', '1988', 'Jefe de relaciones internacionales', 0),
(30, 26, '1920', '1988', 'Presidente del partido', 0),
(18, 19, '1920', '1988', 'Presidente del partido', 0),
(19, 19, '1922', '1997', 'Jefe de comunicaciones del gobieron', 1),
(36, 28, '1910', '2011', 'Personaje', 1),
(35, 28, '1900', '1910', 'Personaje ficticio', 0),
(34, 28, '1898', '1900', 'Niño', 1),
(33, 2, '1990', '1994', 'Senador', 1),
(37, 1, '1977', '1989', 'Encargado de comunicaciones', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ea_candidate_profiles`
--

CREATE TABLE IF NOT EXISTS `ea_candidate_profiles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `candidate_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `birth` date DEFAULT NULL,
  `profession` varchar(255) DEFAULT NULL,
  `sons` int(11) DEFAULT NULL,
  `civil_status` varchar(255) NOT NULL,
  `religion` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `facebook_description` varchar(255) NOT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `highschool` varchar(255) DEFAULT NULL,
  `current_party` varchar(255) NOT NULL,
  `current_party_starting_year` int(11) NOT NULL,
  `assets` text,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Volcado de datos para la tabla `ea_candidate_profiles`
--

INSERT INTO `ea_candidate_profiles` (`id`, `candidate_id`, `name`, `birth`, `profession`, `sons`, `civil_status`, `religion`, `twitter`, `facebook_description`, `facebook`, `highschool`, `current_party`, `current_party_starting_year`, `assets`, `created`, `modified`) VALUES
(1, 1, 'Perfil de Jorge Arrate', '1900-05-01', 'Abogado', 2, 'Casado con Diamela Eltit', '--', 'jarrate', 'Jorge arrate en Facebook', 'http://www.facebook.com/jarrate', 'Saint Paul/Mackay/Instituto Nacional', 'Socialistas allendistas', 2009, 'Esperando respuesta', '2011-07-26 13:04:11', '2011-09-12 11:24:56'),
(2, 2, 'Perfil de Sebastián Piñera', '2011-07-26', 'asdfasdf', 0, 'asdfasdf', 'sdfasdf', 'asdasd', '', 'asdasd', 'asdasdasd', '', 0, 'dfgsdfgsdfg', '2011-07-26 17:20:08', '2011-08-31 12:14:23'),
(28, 41, 'Perfil de Mowgli de la selva', '2011-08-08', 'niño', 0, 'Soltero y es un niño', 'Indu', 'www.twitter.com/mowgli', '', 'www.facebook.com/mowgli', 'No va a la escuela', '', 0, 'No tiene nada', '2011-08-08 18:32:20', '2011-08-08 18:32:20'),
(31, 44, 'Perfil de perico los palotes', '2011-08-29', 'asdasd', 0, 'asdasd', 'asdasd', 'asdasd', '', 'asdasd', 'asdasd', 'asdasd', 0, 'asdasd', '2011-08-29 12:29:58', '2011-08-30 14:48:40'),
(32, 45, 'Perfil de lf Ááéñ~colita de chancho', '2011-08-29', 'fghdfgh', 0, 'dfghdfgh', 'fghdfghd', 'dfghdfgh', '', 'dfghdfgh', 'dfghdfgh', 'dfghdfgh', 0, 'fghdfgh', '2011-08-29 12:36:14', '2011-08-30 14:49:27'),
(19, 28, 'Perfil de Mickey Mouse', '2011-08-05', 'Ratón', 1200, 'Casado con Minnie Mouse', 'Católico apostólico y romano', 'www.twitter.com/mickey_mouse', '', 'www.facebook.com/mickey_mouse', 'The entrance high', '', 0, '', '2011-08-05 12:50:29', '2011-08-08 14:48:59'),
(26, 39, 'Perfil de Marvin el Marciano', '2011-08-05', 'Marciano', 0, 'Solterisimo 1313', 'Iglesia maradoniana', 'www.twitter.com/marvin_martian', '', 'www.facebook.com/marvin_martian', 'The mars high', '', 0, '', '2011-08-05 15:48:27', '2011-08-08 15:16:53'),
(27, 40, 'Perfil de Pato Aparato', '2011-08-08', 'contador', 0, 'Desconocido (su identidad secreta no ha sido revelada aún)', 'Sintoligista', 'pato_aparato', 'Pato en Facebook', 'http://www.facebook.com/pato_aparato', 'Patolandia high', '', 0, 'Posee 1 traje especial que lo convierte en pato aparato y nada más', '2011-08-08 15:26:53', '2011-09-12 10:34:11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ea_candidate_university_studies`
--

CREATE TABLE IF NOT EXISTS `ea_candidate_university_studies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `candidate_profile_id` int(11) DEFAULT NULL,
  `career` varchar(255) DEFAULT NULL,
  `university` varchar(255) DEFAULT NULL,
  `ending_year` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Volcado de datos para la tabla `ea_candidate_university_studies`
--

INSERT INTO `ea_candidate_university_studies` (`id`, `candidate_profile_id`, `career`, `university`, `ending_year`) VALUES
(1, 1, 'Derecho', 'Universidad de Chile', '1964'),
(2, 1, 'PhD (c) en economía/Master of arts en economía', 'Hardvard', '1967'),
(18, 19, 'Msc en Actuación', 'Universidad Estatal de Patolandia', '1983'),
(17, 19, 'Ingenieria', 'Universidad Estatal de Patolandia', '1928'),
(32, 2, 'Ingenieria comercial', 'Universidad Católica', '1980'),
(30, 27, 'Ingenieria Mecánica', 'Universidad Estatal de Patolandia', '1980'),
(29, 26, 'Ingenieria', 'Universidad Estatal de Marte', '1980'),
(33, 28, 'Sobrevivencia', 'Universidad Nacional de La Selva', '1899');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ea_candidate_work_experiences`
--

CREATE TABLE IF NOT EXISTS `ea_candidate_work_experiences` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `candidate_profile_id` int(11) NOT NULL,
  `starting_year` varchar(255) NOT NULL,
  `ending_year` varchar(255) DEFAULT NULL,
  `position` varchar(255) DEFAULT NULL,
  `company` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Volcado de datos para la tabla `ea_candidate_work_experiences`
--

INSERT INTO `ea_candidate_work_experiences` (`id`, `candidate_profile_id`, `starting_year`, `ending_year`, `position`, `company`) VALUES
(1, 1, '0', '1970', 'Director', 'Empresa editora ZigZag'),
(20, 2, '1999', '2011', 'Dueño', 'LAN'),
(14, 19, '1982', '1983', 'Actor', 'Disney Pictures'),
(15, 19, '1954', '1989', 'Director de cine', 'Disney Pictures'),
(16, 26, '1982', '1983', 'Actor', 'Disney Pictures'),
(17, 26, '1954', '1968', 'Director de cine', 'Disney Pictures'),
(21, 27, '1982', '2011', 'Pato', 'La Vida');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ea_categories`
--

CREATE TABLE IF NOT EXISTS `ea_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `election_id` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `sort` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Volcado de datos para la tabla `ea_categories`
--

INSERT INTO `ea_categories` (`id`, `election_id`, `slug`, `name`, `sort`) VALUES
(15, 21, 'la-religion', 'La Religión', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ea_elections`
--

CREATE TABLE IF NOT EXISTS `ea_elections` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Volcado de datos para la tabla `ea_elections`
--

INSERT INTO `ea_elections` (`id`, `user_id`, `name`, `slug`, `start_date`, `end_date`) VALUES
(21, 1, 'elecciones 2008', 'elecciones_2008', '2011-09-09', '2011-09-09'),
(28, 1, 'la florida', 'la_florida', '2011-09-09', '2011-09-09'),
(29, 1, 'municipales Conchali 2013', 'municipales_conchali_2013', '2011-10-24', '2011-10-24');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ea_facebook_details`
--

CREATE TABLE IF NOT EXISTS `ea_facebook_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `election_id` int(11) DEFAULT NULL,
  `app_id` varchar(255) DEFAULT NULL,
  `secret` varchar(255) DEFAULT NULL,
  `app_url` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ea_people`
--

CREATE TABLE IF NOT EXISTS `ea_people` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idfacebook` varchar(255) DEFAULT NULL,
  `session_key` varchar(255) NOT NULL,
  `candidate_id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `confirmsCandidate` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Volcado de datos para la tabla `ea_people`
--

INSERT INTO `ea_people` (`id`, `idfacebook`, `session_key`, `candidate_id`, `date`, `confirmsCandidate`) VALUES
(9, NULL, '', 39, '2011-09-20 16:53:26', NULL),
(10, NULL, '', 39, '2011-09-20 16:54:15', NULL),
(11, NULL, '', 39, '2011-09-20 16:58:23', NULL),
(12, NULL, '', 39, '2011-09-20 17:03:32', NULL),
(13, NULL, '', 39, '2011-09-20 17:05:13', NULL),
(14, NULL, '', 39, '2011-09-20 17:05:42', NULL),
(15, NULL, '', 39, '2011-09-20 17:06:16', 1),
(16, NULL, '', 39, '2011-09-20 17:17:09', NULL),
(17, NULL, '', 39, '2011-09-20 17:18:27', 0),
(18, NULL, '', 39, '2011-09-20 17:20:50', NULL),
(19, NULL, '', 39, '2011-09-20 17:51:35', NULL),
(20, NULL, '', 39, '2011-09-20 17:52:09', NULL),
(21, NULL, '', 39, '2011-09-20 17:52:31', NULL),
(22, NULL, '', 39, '2011-09-20 17:55:18', NULL),
(23, NULL, '', 39, '2011-09-20 17:58:55', NULL),
(24, NULL, '', 39, '2011-09-20 18:00:14', NULL),
(25, NULL, '', 39, '2011-09-28 11:06:41', NULL),
(26, NULL, '', 39, '2011-09-28 11:08:17', NULL),
(27, NULL, '', 39, '2011-09-28 11:09:33', 1),
(28, NULL, '', 28, '2011-09-28 17:09:48', 1),
(29, NULL, '', 28, '2011-10-03 16:35:03', NULL),
(30, NULL, '', 28, '2011-10-03 16:49:52', NULL),
(31, NULL, '', 28, '2011-10-03 16:50:28', NULL),
(32, NULL, '', 28, '2011-10-03 16:51:24', 0),
(33, NULL, '', 28, '2011-10-03 16:52:48', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ea_person_answers`
--

CREATE TABLE IF NOT EXISTS `ea_person_answers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `result_id` int(11) NOT NULL,
  `answer_id` int(11) NOT NULL,
  `importance` float NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=312 ;

--
-- Volcado de datos para la tabla `ea_person_answers`
--

INSERT INTO `ea_person_answers` (`id`, `result_id`, `answer_id`, `importance`, `created`) VALUES
(262, 64, 177, 0.1, '2011-09-20 16:53:26'),
(263, 64, 179, 0.1, '2011-09-20 16:53:26'),
(264, 65, 177, 0.1, '2011-09-20 16:54:15'),
(265, 65, 180, 0.1, '2011-09-20 16:54:15'),
(266, 66, 177, 0.1, '2011-09-20 16:58:23'),
(267, 66, 180, 0.1, '2011-09-20 16:58:23'),
(268, 67, 178, 0.1, '2011-09-20 17:03:32'),
(269, 67, 179, 0.1, '2011-09-20 17:03:32'),
(270, 68, 177, 0.1, '2011-09-20 17:05:13'),
(271, 68, 180, 0.1, '2011-09-20 17:05:13'),
(272, 69, 177, 0.1, '2011-09-20 17:05:42'),
(273, 69, 180, 0.1, '2011-09-20 17:05:42'),
(274, 70, 177, 0.1, '2011-09-20 17:06:16'),
(275, 70, 180, 0.1, '2011-09-20 17:06:16'),
(276, 71, 177, 0.1, '2011-09-20 17:17:09'),
(277, 71, 180, 0.1, '2011-09-20 17:17:09'),
(278, 72, 178, 0.1, '2011-09-20 17:18:27'),
(279, 72, 179, 0.1, '2011-09-20 17:18:27'),
(280, 73, 178, 0.1, '2011-09-20 17:20:50'),
(281, 73, 179, 0.1, '2011-09-20 17:20:50'),
(282, 74, 177, 0.1, '2011-09-20 17:51:35'),
(283, 74, 180, 0.1, '2011-09-20 17:51:35'),
(284, 75, 177, 0.1, '2011-09-20 17:52:09'),
(285, 75, 180, 0.1, '2011-09-20 17:52:09'),
(286, 76, 177, 0.1, '2011-09-20 17:52:31'),
(287, 76, 180, 0.1, '2011-09-20 17:52:31'),
(288, 77, 177, 0.1, '2011-09-20 17:55:18'),
(289, 77, 180, 0.1, '2011-09-20 17:55:18'),
(290, 78, 177, 0.1, '2011-09-20 17:58:55'),
(291, 78, 180, 0.1, '2011-09-20 17:58:55'),
(292, 79, 177, 0.1, '2011-09-20 18:00:14'),
(293, 79, 180, 0.1, '2011-09-20 18:00:14'),
(294, 80, 178, 0.1, '2011-09-28 11:06:41'),
(295, 80, 180, 0.1, '2011-09-28 11:06:41'),
(296, 81, 178, 0.1, '2011-09-28 11:08:17'),
(297, 81, 180, 0.1, '2011-09-28 11:08:17'),
(298, 82, 178, 0.1, '2011-09-28 11:09:33'),
(299, 82, 180, 0.1, '2011-09-28 11:09:33'),
(300, 83, 177, 0.1, '2011-09-28 17:09:48'),
(301, 83, 180, 0.1, '2011-09-28 17:09:48'),
(302, 84, 178, 0.1, '2011-10-03 16:35:03'),
(303, 84, 179, 0.1, '2011-10-03 16:35:03'),
(304, 85, 178, 0.1, '2011-10-03 16:49:52'),
(305, 85, 179, 0.1, '2011-10-03 16:49:52'),
(306, 86, 177, 0.1, '2011-10-03 16:50:28'),
(307, 86, 180, 0.1, '2011-10-03 16:50:28'),
(308, 87, 177, 0.1, '2011-10-03 16:51:24'),
(309, 87, 180, 0.1, '2011-10-03 16:51:24'),
(310, 88, 177, 0.1, '2011-10-03 16:52:48'),
(311, 88, 180, 0.1, '2011-10-03 16:52:48');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ea_questions`
--

CREATE TABLE IF NOT EXISTS `ea_questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` varchar(255) NOT NULL,
  `explanation` text NOT NULL,
  `short_description` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `sour` tinyint(1) NOT NULL,
  `public` tinyint(1) NOT NULL,
  `included_in_media_naranja` tinyint(1) NOT NULL,
  `order` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=141 ;

--
-- Volcado de datos para la tabla `ea_questions`
--

INSERT INTO `ea_questions` (`id`, `question`, `explanation`, `short_description`, `category_id`, `sour`, `public`, `included_in_media_naranja`, `order`) VALUES
(138, 'estas de acuerdo con la religión', 'la religión es blablabla', 'la religion', 15, 0, 1, 1, 1),
(140, 'te gustan las papas fritas??', 'adsfsdfsdfasdf', 'papas fritas', 15, 1, 1, 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ea_results`
--

CREATE TABLE IF NOT EXISTS `ea_results` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `person_id` int(11) NOT NULL,
  `candidate_id` int(11) NOT NULL,
  `result` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=89 ;

--
-- Volcado de datos para la tabla `ea_results`
--

INSERT INTO `ea_results` (`id`, `person_id`, `candidate_id`, `result`) VALUES
(64, 9, 39, 0),
(65, 10, 39, 0),
(66, 11, 39, 0),
(67, 12, 39, 0),
(68, 13, 39, 0),
(69, 14, 39, 0),
(70, 15, 39, 0),
(71, 16, 39, 0),
(72, 17, 39, 0),
(73, 18, 39, 0),
(74, 19, 39, 0),
(75, 20, 39, 0),
(76, 21, 39, 0),
(77, 22, 39, 0),
(78, 23, 39, 0),
(79, 24, 39, 0),
(80, 25, 39, 0),
(81, 26, 39, 0),
(82, 27, 39, 0),
(83, 28, 28, 0),
(84, 29, 28, 0),
(85, 30, 28, 0),
(86, 31, 28, 0),
(87, 32, 28, 0),
(88, 33, 28, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ea_result_details`
--

CREATE TABLE IF NOT EXISTS `ea_result_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `result_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `result` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=526 ;

--
-- Volcado de datos para la tabla `ea_result_details`
--

INSERT INTO `ea_result_details` (`id`, `result_id`, `category_id`, `result`) VALUES
(501, 64, 15, 0),
(502, 65, 15, 0),
(503, 66, 15, 0),
(504, 67, 15, 0),
(505, 68, 15, 0),
(506, 69, 15, 0),
(507, 70, 15, 0),
(508, 71, 15, 0),
(509, 72, 15, 0),
(510, 73, 15, 0),
(511, 74, 15, 0),
(512, 75, 15, 0),
(513, 76, 15, 0),
(514, 77, 15, 0),
(515, 78, 15, 0),
(516, 79, 15, 0),
(517, 80, 15, 0),
(518, 81, 15, 0),
(519, 82, 15, 0),
(520, 83, 15, 0),
(521, 84, 15, 0),
(522, 85, 15, 0),
(523, 86, 15, 0),
(524, 87, 15, 0),
(525, 88, 15, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ea_schema_migrations`
--

CREATE TABLE IF NOT EXISTS `ea_schema_migrations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `version` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `ea_schema_migrations`
--

INSERT INTO `ea_schema_migrations` (`id`, `version`, `type`, `created`) VALUES
(1, 1, 'migrations', '2011-09-09 12:38:49');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ea_source_of_answers`
--

CREATE TABLE IF NOT EXISTS `ea_source_of_answers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `weight_id` int(11) NOT NULL,
  `sentence` text,
  `media_name` varchar(1024) DEFAULT NULL,
  `link` varchar(2048) DEFAULT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ea_users`
--

CREATE TABLE IF NOT EXISTS `ea_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `admin` tinyint(1) NOT NULL,
  `name` varchar(255) NOT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `twitter_oauth_token` varchar(255) DEFAULT NULL,
  `facebook_id` varchar(255) DEFAULT NULL,
  `facebook_name` varchar(255) DEFAULT NULL,
  `facebook_access_token` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `ea_users`
--

INSERT INTO `ea_users` (`id`, `username`, `password`, `admin`, `name`, `twitter`, `twitter_oauth_token`, `facebook_id`, `facebook_name`, `facebook_access_token`) VALUES
(1, 'lfalvarez', '', 0, 'Luis Felipe Álvarez', 'lfalvarez', '0mcXCixZCcivUtdW8XX4Do6l3RyzcQfxtwaDwZdW3Q', '560973905', 'Luis Felipe Álvarez Burgos', 'AAAC8UxlZBbKsBAL5BAeja4Vxj0lqBpKAv7XmreNT0XTNVEcblZCEPPI6YuwtibcpkZBl6g1ZCtH6L84T40rKUc3OekO3enpkBm7BgBMbEQZDZD');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ea_weights`
--

CREATE TABLE IF NOT EXISTS `ea_weights` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question_id` int(11) NOT NULL,
  `candidate_id` int(11) NOT NULL,
  `answer_id` int(11) NOT NULL,
  `weighting` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=279 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
