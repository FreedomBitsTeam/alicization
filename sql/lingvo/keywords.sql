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
-- Структура таблицы `keywords`
--

DROP TABLE IF EXISTS `keywords`;
CREATE TABLE IF NOT EXISTS `keywords` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` int(11) NOT NULL,
  `word` varchar(63) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=117 ;

--
-- Дамп данных таблицы `keywords`
--

INSERT INTO `keywords` (`id`, `type`, `word`) VALUES
(1, 2, 'привет'),
(2, 2, 'хай'),
(3, 2, 'здравствуй'),
(4, 2, 'ку'),
(5, 3, 'скажи'),
(6, 1, 'система'),
(7, 1, 'дорогая'),
(8, 3, 'уточни'),
(9, 3, 'покажи'),
(10, 3, 'выведи'),
(11, 4, 'погода'),
(12, 2, 'хеллоу'),
(13, 6, 'конфигурация'),
(14, 7, 'реши'),
(15, 1, 'алиса'),
(16, 7, 'вычисли'),
(17, 7, 'посчитай'),
(18, 1, 'ты'),
(19, 5, 'новости'),
(20, 8, 'спасибо'),
(21, 8, 'спс'),
(22, 1, 'лиса'),
(23, 8, 'благодарю'),
(24, 9, 'сегодня'),
(25, 10, 'завтра'),
(26, 11, 'вчера'),
(27, 12, 'неделя'),
(28, 13, 'месяц'),
(29, 14, 'послезавтра'),
(30, 15, 'позавчера'),
(31, 1, 'милая'),
(32, 16, 'да'),
(33, 16, 'ок'),
(34, 16, 'конечно'),
(35, 16, 'естественно'),
(36, 17, 'нет'),
(37, 18, 'я'),
(38, 18, 'мой'),
(39, 19, 'год'),
(40, 0, 'лол'),
(41, 0, 'кек'),
(42, 0, 'скр'),
(43, 0, 'ого'),
(44, 0, 'ммм'),
(45, 0, 'ух'),
(47, 0, 'такая'),
(48, 0, 'очень'),
(49, 0, 'are'),
(50, 0, 'is'),
(51, 0, 'the'),
(52, 3, 'дай'),
(53, 18, 'мне'),
(54, 0, 'ясно'),
(55, 0, 'понятно'),
(56, 32, 'аллах'),
(57, 32, 'бог'),
(58, 20, 'расписание'),
(59, 0, 'ну'),
(60, 0, 'че'),
(61, 0, 'мда'),
(62, 2, 'здаров'),
(63, 27, 'дичь'),
(64, 0, 'это'),
(65, 0, 'пожалуйста'),
(66, 0, 'плиз'),
(67, 0, 'плес'),
(68, 0, 'пример'),
(69, 0, 'уравнение'),
(70, 0, 'то'),
(71, 0, 'а'),
(72, 21, 'дела'),
(73, 0, 'на'),
(74, 23, 'красава'),
(75, 8, 'души'),
(76, 2, 'шалом'),
(77, 0, 'эй'),
(78, 35, 'убил'),
(79, 27, 'кеннеди'),
(80, 1, 'зая'),
(81, 18, 'пользователь'),
(82, 1, 'любимая'),
(83, 23, 'молодец'),
(84, 23, 'умница'),
(85, 23, 'хорошая'),
(86, 24, 'кто'),
(87, 34, 'что'),
(88, 26, 'где'),
(89, 25, 'как'),
(90, 28, 'сколько'),
(91, 29, 'когда'),
(92, 30, 'зачем'),
(93, 31, 'почему'),
(94, 6, 'конфиг'),
(95, 2, 'hello'),
(96, 2, 'hi'),
(97, 32, 'акбар'),
(98, 32, 'велик'),
(99, 24, 'who'),
(100, 24, 'how'),
(101, 33, 'телефончик'),
(102, 33, 'телеф'),
(103, 5, 'новенькое'),
(104, 5, 'новое'),
(105, 1, 'тебе'),
(106, 36, 'лет'),
(107, 37, 'слава'),
(108, 38, 'украина'),
(109, 39, 'знаешь'),
(110, 40, 'ф'),
(111, 0, 'пока'),
(112, 41, 'понедельник'),
(113, 42, 'вторник'),
(114, 43, 'среда'),
(115, 44, 'четверг'),
(116, 45, 'пятница');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
