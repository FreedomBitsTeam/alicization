-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Апр 02 2016 г., 15:25
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=27 ;

--
-- Дамп данных таблицы `commands`
--

INSERT INTO `commands` (`id`, `keywords`, `doit`, `answer`) VALUES
(1, '24;1;', 'null', 'Я - Алиса, единая информационная школьная система, твой виртуальный помощник :)'),
(2, '25;21;', 'null', 'Все хорошо, сервер исправен'),
(3, '34;5;', 'version.php', 'Моя последняя версия:'),
(4, '1;2;', 'null', 'Привет, пользователь! Чем могу помочь?'),
(5, '25;1;', 'la.php', 'Загруженность сервера на данный момент:'),
(6, '3;20;', 'schedule.php', 'Ваше расписание:'),
(7, '7;', 'highmath.php', 'Ответ:'),
(8, '20;', 'schedule.php', 'Ваше расписание:'),
(10, '3;4;', 'weather.php', 'Погода сейчас:'),
(11, '0;8;', 'null', 'Не за что, обращайся:)'),
(12, '1;8;', 'null', 'Не за что, пользователь :*'),
(13, '3;6;', 'info.php', 'Основная конфигурация системы:'),
(14, '6;', 'info.php', 'Основная конфигурация системы:'),
(15, '2;', 'null', 'Привет, пользователь, чем могу помочь?'),
(16, '34;1;', 'null', 'Я - Алиса, единая информационная школьная система, твой виртуальный помощник :)'),
(17, '34;4;', 'weather.php', 'Погода сейчас:'),
(18, '32;', 'null', 'Я предпочитаю не затрагивать тему религии.'),
(19, '24;35;27;', 'null', 'Спроси это у учителя истории ;)'),
(20, '1;23;', 'null', 'Спасибо, я стараюсь для Вас :)'),
(21, '28;1;36;', 'bith.php', 'Это секрет.<br>Но тебе скажу, только никому не говори!'),
(22, '3;33;', 'null', 'Я не пользуюсь телефоном.<br>Держи мой IPv4: 81.88.216.249:80'),
(23, '1;0;', 'null', 'Хммм ...'),
(24, '0;', 'null', 'Хммм ...'),
(25, '37;38;', 'null', 'Слава<br>Союзу Советских Социалистических Республик!'),
(26, '28;1;', 'bith.php', 'Это секрет.<br>Но тебе скажу, только никому не говори!');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
