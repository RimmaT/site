-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Ноя 20 2015 г., 18:46
-- Версия сервера: 5.5.25
-- Версия PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `scool`
--

-- --------------------------------------------------------

--
-- Структура таблицы `area`
--

CREATE TABLE IF NOT EXISTS `area` (
  `id_area` int(11) NOT NULL,
  `name_area` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_area`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `area`
--

INSERT INTO `area` (`id_area`, `name_area`) VALUES
(1, 'Дзержинский район'),
(2, 'Киевский район'),
(3, 'Коминтерновский райо'),
(4, 'Ленинский район'),
(5, 'Московский район'),
(6, 'Октябрьский район'),
(7, 'Орджоникидзевкий рай'),
(8, 'Фрунзенский район'),
(9, 'Червонозаводский рай');

-- --------------------------------------------------------

--
-- Структура таблицы `gb`
--

CREATE TABLE IF NOT EXISTS `gb` (
  `username` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `dt` date NOT NULL,
  `msg` text COLLATE utf8_unicode_ci NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_scool` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `gb`
--

INSERT INTO `gb` (`username`, `dt`, `msg`, `id`, `id_scool`) VALUES
('gre', '0000-00-00', 'bfgh', 1, 113);

-- --------------------------------------------------------

--
-- Структура таблицы `scools`
--

CREATE TABLE IF NOT EXISTS `scools` (
  `name_scool` varchar(20) CHARACTER SET utf8 NOT NULL,
  `id_area` int(11) NOT NULL,
  `site` text CHARACTER SET utf8 NOT NULL,
  `contact_information` text CHARACTER SET utf8 NOT NULL,
  `id_scool` int(10) NOT NULL AUTO_INCREMENT,
  `inform` text CHARACTER SET utf8 NOT NULL,
  `password` text CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id_scool`)
) ENGINE=InnoDB  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=133 ;

--
-- Дамп данных таблицы `scools`
--

INSERT INTO `scools` (`name_scool`, `id_area`, `site`, `contact_information`, `id_scool`, `inform`, `password`) VALUES
('jsc', 1, 'erhe@dd.hd', '', 107, '', '1234'),
('fdd', 1, 'scac', 'svfs', 108, 'sfcswe', '1'),
('klass', 1, 'erhe@dd.hd', '', 109, '', '1234'),
('aaaa', 4, 'aa@ru.ru', 'eger ', 110, 'ferf', '12345'),
('rimma', 2, 'ddw', 'dgdf ', 111, 'wdw', '12345'),
('ana', 6, '', 'dscsd', 112, '', ''),
('tana', 1, 'fthfhj', 'dhfhfh', 113, 'dhdtghdft', ''),
('', 1, 'erhe@dd.hd', '', 131, '', ''),
('gmkg', 3, 'n@fg.ru', 'gj', 132, 'hikyi', '1234');

-- --------------------------------------------------------

--
-- Структура таблицы `style`
--

CREATE TABLE IF NOT EXISTS `style` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `id_style` int(11) NOT NULL,
  `id_scool` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=60 ;

--
-- Дамп данных таблицы `style`
--

INSERT INTO `style` (`id`, `id_style`, `id_scool`) VALUES
(1, 4, 123123),
(2, 6, 123123),
(3, 7, 123123),
(4, 1, 555),
(5, 2, 555),
(6, 3, 98),
(7, 4, 6),
(8, 3, 100),
(9, 4, 100),
(10, 5, 100),
(11, 3, 101),
(12, 4, 101),
(13, 5, 101),
(14, 3, 102),
(15, 4, 102),
(16, 5, 102),
(17, 1, 110),
(18, 8, 110),
(28, 2, 113),
(29, 4, 113),
(30, 6, 113),
(49, 4, 112),
(50, 5, 112),
(57, 1, 132),
(58, 7, 132),
(59, 8, 132);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
