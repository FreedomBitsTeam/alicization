-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Мар 28 2016 г., 11:34
-- Версия сервера: 5.6.16
-- Версия PHP: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `alicization`
--

-- --------------------------------------------------------

--
-- Структура таблицы `commands`
--

DROP TABLE IF EXISTS `commands`;
CREATE TABLE IF NOT EXISTS `commands` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `keywords` varchar(63) COLLATE utf8_bin NOT NULL,
  `doit` varchar(255) COLLATE utf8_bin NOT NULL,
  `answer` varchar(255) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=15 ;

--
-- Дамп данных таблицы `commands`
--

INSERT INTO `commands` (`id`, `keywords`, `doit`, `answer`) VALUES
(1, '0;2;38;', 'null', 'Я - Алиса, единая информационная школьная система, твой виртуальный помощник :)'),
(2, '0;4;88;', 'null', 'Все хорошо, сервер исправен'),
(3, '0;4;89;', 'version.php', 'Моя последняя версия:'),
(4, '1;2;', 'null', 'Привет, пользователь! Чем могу помочь?'),
(5, '0;2;4;', 'la.php', 'Загруженность сервера на данный момент:'),
(6, '16;75;0;', 'schedule.php', 'Ваше расписание:'),
(7, '700;', 'highmath.php', 'Ответ:'),
(8, '16;', 'schedule.php', 'Ваше расписание:'),
(10, '6;75;', 'weather.php', 'Погода сейчас:'),
(11, '707;', 'null', 'Не за что, обращайся:)'),
(12, '2;707;', 'null', 'Не за что, пользователь :*'),
(13, '75;888;', 'info.php', 'Основная конфигурация системы:'),
(14, '888;', 'info.php', 'Основная конфигурация системы:');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
