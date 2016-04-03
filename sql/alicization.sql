-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Апр 03 2016 г., 14:23
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=28 ;

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
(26, '28;1;', 'bith.php', 'Это секрет.<br>Но тебе скажу, только никому не говори!'),
(27, '3;46;', 'backup.php', 'Делаю резервную копию ...');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `emails`
--

INSERT INTO `emails` (`id`, `email`, `name`, `points`) VALUES
(1, 'snipghost@list.ru', 'SnipGhost', 5),
(2, 'example@example.com', 'Guest', 0),
(3, 'ihikaru@inbox.ru', 'Hikaru', 0),
(4, 'гость', 'Гость', 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=119 ;

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
(116, 45, 'пятница'),
(117, 46, 'бекап'),
(118, 46, 'слепок');

-- --------------------------------------------------------

--
-- Структура таблицы `lessons`
--

DROP TABLE IF EXISTS `lessons`;
CREATE TABLE IF NOT EXISTS `lessons` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lesson_s` varchar(255) COLLATE utf8_bin NOT NULL,
  `type` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=15 ;

--
-- Дамп данных таблицы `lessons`
--

INSERT INTO `lessons` (`id`, `lesson_s`, `type`) VALUES
(1, 'Русский язык', 1),
(2, 'Физика', 1),
(3, 'География', 1),
(4, 'Алгебра', 1),
(5, 'Физкультура', 1),
(6, 'Литература', 1),
(7, 'Геометрия', 1),
(8, 'Обществознание', 1),
(9, 'История', 1),
(10, 'Английский язык', 1),
(11, 'Биология', 1),
(12, 'Химия', 1),
(13, 'ОБЖ', 1),
(14, 'Информатика', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `requests`
--

DROP TABLE IF EXISTS `requests`;
CREATE TABLE IF NOT EXISTS `requests` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT 'guest',
  `text` varchar(1023) COLLATE utf8_bin NOT NULL,
  `num` varchar(63) COLLATE utf8_bin NOT NULL,
  `com` varchar(63) COLLATE utf8_bin NOT NULL,
  `success` tinyint(1) NOT NULL DEFAULT '0',
  `system` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

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
(0, '---', 1, 1),
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
  `room` int(11) NOT NULL DEFAULT '0',
  `type` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=37 ;

--
-- Дамп данных таблицы `schedules`
--

INSERT INTO `schedules` (`id`, `nday`, `nles`, `class`, `group`, `lesson`, `teacher`, `room`, `type`) VALUES
(1, 5, 3, 1, 1, 1, 1, 1, 1),
(2, 5, 3, 1, 2, 1, 2, 2, 1),
(3, 1, 1, 1, 1, 2, 3, 0, 1),
(4, 1, 2, 1, 1, 3, 4, 0, 1),
(5, 1, 3, 1, 1, 4, 5, 0, 1),
(6, 1, 4, 1, 1, 4, 5, 0, 1),
(7, 1, 5, 1, 1, 5, 6, 0, 1),
(8, 1, 6, 1, 1, 6, 7, 0, 1),
(9, 1, 7, 1, 1, 6, 7, 0, 1),
(10, 2, 1, 1, 1, 7, 5, 0, 1),
(11, 2, 2, 1, 1, 8, 8, 0, 1),
(12, 2, 3, 1, 1, 2, 3, 0, 1),
(13, 2, 4, 1, 1, 2, 3, 0, 1),
(14, 2, 5, 1, 1, 9, 9, 0, 1),
(15, 2, 6, 1, 1, 10, 10, 0, 1),
(16, 3, 1, 1, 1, 11, 11, 0, 1),
(17, 3, 2, 1, 1, 12, 12, 0, 1),
(18, 3, 3, 1, 1, 10, 10, 0, 1),
(19, 3, 4, 1, 1, 5, 6, 0, 1),
(20, 3, 5, 1, 1, 4, 4, 0, 1),
(21, 3, 6, 1, 1, 13, 13, 0, 1),
(22, 3, 7, 1, 1, 4, 5, 0, 1),
(23, 3, 8, 1, 1, 4, 5, 0, 1),
(24, 4, 1, 1, 1, 2, 3, 0, 1),
(25, 4, 2, 1, 1, 7, 5, 0, 1),
(26, 4, 3, 1, 1, 5, 6, 0, 1),
(27, 4, 4, 1, 1, 8, 8, 0, 1),
(28, 4, 5, 1, 1, 2, 3, 0, 1),
(29, 4, 6, 1, 1, 10, 10, 0, 1),
(30, 4, 7, 1, 1, 1, 1, 0, 1),
(31, 4, 8, 1, 1, 2, 3, 0, 1),
(32, 5, 1, 1, 1, 14, 14, 0, 1),
(33, 5, 2, 1, 1, 9, 9, 0, 1),
(34, 5, 4, 1, 1, 6, 7, 0, 1),
(35, 5, 5, 1, 1, 4, 5, 0, 1),
(36, 5, 6, 1, 1, 4, 5, 0, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `teachers`
--

DROP TABLE IF EXISTS `teachers`;
CREATE TABLE IF NOT EXISTS `teachers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `teacher_s` varchar(255) COLLATE utf8_bin NOT NULL,
  `type` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=15 ;

--
-- Дамп данных таблицы `teachers`
--

INSERT INTO `teachers` (`id`, `teacher_s`, `type`) VALUES
(1, 'Шмелькова Людмила Александровна', 1),
(2, 'Волкова Татьяна Васильевна', 1),
(3, 'Барат Артем Александрович', 1),
(4, 'Мецегора Татьяна Григорьевна', 1),
(5, 'Згонник Любовь Ивановна', 1),
(6, 'Мокрушин Сергей Анатольевич', 1),
(7, 'Боровик Марина Викторовна', 1),
(8, 'Борисова Марина Валерьевна', 1),
(9, 'Еремеева Марина Викторовна', 1),
(10, 'Харькова Ольга Павловна', 1),
(11, 'Мойчук Сергей Иванович', 1),
(12, 'Гольденштейн Любовь Вячеславовна ', 1),
(13, 'Чепракова Ольга Викторовна', 1),
(14, 'Кабицына Ольга Евгеньевна', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
