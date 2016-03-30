-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Фев 24 2016 г., 16:50
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
CREATE DATABASE IF NOT EXISTS `alicization` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `alicization`;

DELIMITER $$
--
-- Функции
--
DROP FUNCTION IF EXISTS `levenshtein`$$
CREATE DEFINER=`root`@`localhost` FUNCTION `levenshtein`(`s1` VARCHAR(63), `s2` VARCHAR(63)) RETURNS int(11)
    DETERMINISTIC
BEGIN
    DECLARE s1_len, s2_len, i, j, c, c_temp, cost INT;
    DECLARE s1_char CHAR;
    DECLARE cv0, cv1 VARBINARY(255);
    SET s1_len = CHAR_LENGTH(s1), s2_len = CHAR_LENGTH(s2), cv1 = 0x00, j = 1, i = 1, c = 0;
    IF s1 = s2 THEN
      RETURN 0;
    ELSEIF s1_len = 0 THEN
      RETURN s2_len;
    ELSEIF s2_len = 0 THEN
      RETURN s1_len;
    ELSE
      WHILE j <= s2_len DO
        SET cv1 = CONCAT(cv1, UNHEX(HEX(j))), j = j + 1;
      END WHILE;
      WHILE i <= s1_len DO
        SET s1_char = SUBSTRING(s1, i, 1), c = i, cv0 = UNHEX(HEX(i)), j = 1;
        WHILE j <= s2_len DO
          SET c = c + 1;
          IF s1_char = SUBSTRING(s2, j, 1) THEN 
            SET cost = 0; ELSE SET cost = 1;
          END IF;
          SET c_temp = CONV(HEX(SUBSTRING(cv1, j, 1)), 16, 10) + cost;
          IF c > c_temp THEN SET c = c_temp; END IF;
            SET c_temp = CONV(HEX(SUBSTRING(cv1, j+1, 1)), 16, 10) + 1;
            IF c > c_temp THEN 
              SET c = c_temp; 
            END IF;
            SET cv0 = CONCAT(cv0, UNHEX(HEX(c))), j = j + 1;
        END WHILE;
        SET cv1 = cv0, i = i + 1;
      END WHILE;
    END IF;
    RETURN c;
END$$

DROP FUNCTION IF EXISTS `levenshtein_ratio`$$
CREATE DEFINER=`root`@`localhost` FUNCTION `levenshtein_ratio`(`s1` VARCHAR(63) CHARSET utf8, `s2` VARCHAR(63) CHARSET utf8) RETURNS float
    DETERMINISTIC
    SQL SECURITY INVOKER
BEGIN
    DECLARE s1_len, s2_len, max_len INT;
    SET s1_len = LENGTH(s1), s2_len = LENGTH(s2);
    IF s1_len > s2_len THEN 
      SET max_len = s1_len; 
    ELSE 
      SET max_len = s2_len; 
    END IF;
    RETURN (1 - LEVENSHTEIN(s1, s2) / max_len) * 100;
END$$

DROP FUNCTION IF EXISTS `similarity_ratio`$$
CREATE DEFINER=`root`@`localhost` FUNCTION `similarity_ratio`(`s1` VARCHAR(63), `s2` VARCHAR(63)) RETURNS int(11)
    DETERMINISTIC
BEGIN
  	DECLARE i, j, x, y, res, s1_len, s2_len INT;
  	DECLARE word, subword VARCHAR(255);
  	SET res = 0, i = 0, x = 0, s1_len = LENGTH(s1), s2_len = LENGTH(s2);
  	WHILE i < s1_len DO
  		SET i = i + 1;
  		IF SUBSTRING(s1, i, 1) = ';' THEN
  			SET word = SUBSTRING(s1, x+1, i-x), x = i, j = 0, y = 0;
  			WHILE j < s2_len DO
  				SET j = j + 1;
  				IF SUBSTRING(s2, j, 1) = ';' THEN
  					SET subword = SUBSTRING(s2, y+1, j-y), y = j;
  					IF word = subword THEN
  						SET res = res + 1, j = s2_len + 1;
  					END IF;
  				END IF;
  			END WHILE;
  		END IF;
  	END WHILE;
  	RETURN ROUND(res * 200 / s2_len);
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Структура таблицы `classes`
--

DROP TABLE IF EXISTS `classes`;
CREATE TABLE IF NOT EXISTS `classes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `class_s` varchar(8) COLLATE utf8_bin NOT NULL,
  `type` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `classes`
--

INSERT INTO `classes` (`id`, `class_s`, `type`) VALUES
(1, '11 А', 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=9 ;

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
(8, '16;', 'schedule.php', 'Ваше расписание:');

-- --------------------------------------------------------

--
-- Структура таблицы `emails`
--

DROP TABLE IF EXISTS `emails`;
CREATE TABLE IF NOT EXISTS `emails` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_bin NOT NULL,
  `name` varchar(255) COLLATE utf8_bin NOT NULL,
  `points` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=7 ;

--
-- Дамп данных таблицы `emails`
--

INSERT INTO `emails` (`id`, `email`, `name`, `points`) VALUES
(1, 'snipghost@list.ru', 'SnipGhost', 5),
(2, 'example@example.com', 'Guest', 0),
(3, 'ihikaru@inbox.ru', 'Hikaru', 0),
(4, 'sharai.nastia@yandex.ru', 'Nastya', 0),
(5, '', 'Гость', 0),
(6, 'SSD', 'SSD', 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=115 ;

--
-- Дамп данных таблицы `keywords`
--

INSERT INTO `keywords` (`id`, `type`, `word`) VALUES
(1, 1, 'hello'),
(2, 1, 'hi'),
(3, 2, 'Alice'),
(4, 700, 'вычисли'),
(5, 89, 'новенькое'),
(6, 2, 'система'),
(7, 2, 'дорогая'),
(8, 4, 'что'),
(9, 38, 'кто'),
(10, 4, 'how'),
(11, 0, 'are'),
(12, 2, 'you'),
(13, 88, 'дела'),
(14, 3, 'my'),
(15, 2, 'Алиса'),
(16, 1, 'привет'),
(17, 4, 'как'),
(18, 2, 'ты'),
(19, 89, 'новости'),
(20, 1, 'здравствуй'),
(21, 4, 'где'),
(22, 5, 'да'),
(23, 6, 'погода'),
(24, 7, 'сегодня'),
(25, 8, 'завтра'),
(26, 9, 'вчера'),
(27, 10, 'неделя'),
(28, 11, 'месяц'),
(29, 7, 'today'),
(30, 8, 'tomorrow'),
(31, 9, 'yesterday'),
(32, 10, 'week'),
(33, 11, 'month'),
(34, 12, 'нет'),
(35, 5, 'yes'),
(36, 12, 'no'),
(37, 5, 'yeah'),
(38, 4, 'what'),
(39, 12, 'fuck'),
(40, 5, 'ок'),
(41, 5, 'okay'),
(42, 13, 'наверное'),
(43, 13, 'мб'),
(44, 13, 'maybe'),
(45, 13, 'вряд ли'),
(46, 5, 'конечно'),
(47, 5, 'sure'),
(48, 2, 'милая'),
(49, 3, 'я'),
(50, 3, 'мой'),
(51, 3, 'i'),
(52, 14, 'год'),
(53, 14, 'year'),
(54, 5, 'of course'),
(55, 15, 'школа'),
(56, 15, 'school'),
(57, 16, 'расписание'),
(58, 16, 'schedule'),
(59, 17, 'урок'),
(60, 17, 'lesson'),
(61, 18, 'кабинет'),
(62, 18, 'класс'),
(63, 19, 'математика'),
(64, 19, 'алгебра'),
(65, 19, 'maths'),
(66, 20, 'русский'),
(67, 20, 'russian'),
(68, 21, 'геометрия'),
(69, 21, 'geometry'),
(70, 22, 'информатика'),
(71, 22, 'informatics'),
(72, 23, 'физра'),
(73, 23, 'физкультура'),
(74, 4, 'where'),
(75, 24, 'обж'),
(76, 25, 'английский'),
(77, 25, 'English'),
(78, 26, 'история'),
(79, 26, 'history'),
(80, 27, 'физика'),
(81, 28, 'physics'),
(82, 27, 'литература'),
(83, 28, 'литра'),
(84, 28, 'literature'),
(85, 29, 'химия'),
(86, 29, 'chemistry'),
(87, 30, 'биология'),
(88, 30, 'biology'),
(89, 31, 'география'),
(90, 31, 'geography'),
(91, 32, 'обществознание'),
(92, 32, 'society'),
(93, 32, 'общага'),
(94, 33, 'изо'),
(95, 33, 'art'),
(96, 34, 'музыка'),
(97, 34, 'music'),
(98, 35, 'труд'),
(99, 36, 'учитель'),
(100, 36, 'teacher'),
(101, 0, 'такая'),
(102, 0, 'сякая'),
(103, 38, 'who'),
(104, 37, 'дура'),
(105, 0, 'is'),
(106, 0, 'a'),
(107, 0, 'the'),
(108, 2, 'system'),
(109, 75, 'Уточни'),
(110, 75, 'Покажи'),
(111, 75, 'Скажи'),
(112, 75, 'Выведи'),
(113, 700, 'Реши'),
(114, 700, 'solve');

-- --------------------------------------------------------

--
-- Структура таблицы `lessons`
--

DROP TABLE IF EXISTS `lessons`;
CREATE TABLE IF NOT EXISTS `lessons` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lesson_s` varchar(255) COLLATE utf8_bin NOT NULL,
  `type` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `lessons`
--

INSERT INTO `lessons` (`id`, `lesson_s`, `type`) VALUES
(1, 'Русский язык', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `rooms`
--

DROP TABLE IF EXISTS `rooms`;
CREATE TABLE IF NOT EXISTS `rooms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `room_s` varchar(255) COLLATE utf8_bin NOT NULL,
  `part` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `rooms`
--

INSERT INTO `rooms` (`id`, `room_s`, `part`, `type`) VALUES
(1, '325', 1, 1),
(2, '324', 1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `schedules`
--

DROP TABLE IF EXISTS `schedules`;
CREATE TABLE IF NOT EXISTS `schedules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nday` int(11) NOT NULL,
  `nles` int(11) NOT NULL,
  `class` int(11) NOT NULL,
  `group` int(11) NOT NULL,
  `lesson` int(11) NOT NULL,
  `teacher` int(11) NOT NULL,
  `room` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `schedules`
--

INSERT INTO `schedules` (`id`, `nday`, `nles`, `class`, `group`, `lesson`, `teacher`, `room`, `type`) VALUES
(1, 1, 1, 1, 1, 1, 1, 1, 1),
(2, 1, 1, 1, 2, 1, 2, 2, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `teachers`
--

DROP TABLE IF EXISTS `teachers`;
CREATE TABLE IF NOT EXISTS `teachers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `teacher_s` varchar(255) COLLATE utf8_bin NOT NULL,
  `type` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `teachers`
--

INSERT INTO `teachers` (`id`, `teacher_s`, `type`) VALUES
(1, 'Шмелькова Людмила Александровна', 1),
(2, 'Волкова Татьяна Васильевна', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
