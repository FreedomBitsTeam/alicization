DROP TABLE classes;

CREATE TABLE `classes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `class_s` varchar(8) COLLATE utf8_bin NOT NULL,
  `type` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO classes VALUES("1","11 А","1");



DROP TABLE commands;

CREATE TABLE `commands` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `keywords` varchar(63) COLLATE utf8_bin NOT NULL,
  `doit` varchar(255) COLLATE utf8_bin NOT NULL,
  `answer` varchar(255) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO commands VALUES("1","24;1;","null","Я - Алиса, единая информационная школьная система, твой виртуальный помощник :)");
INSERT INTO commands VALUES("2","25;21;","null","Все хорошо, сервер исправен");
INSERT INTO commands VALUES("3","34;5;","version.php","Моя последняя версия:");
INSERT INTO commands VALUES("4","1;2;","null","Привет, пользователь! Чем могу помочь?");
INSERT INTO commands VALUES("5","25;1;","la.php","Загруженность сервера на данный момент:");
INSERT INTO commands VALUES("6","3;20;","schedule.php","Ваше расписание:");
INSERT INTO commands VALUES("7","7;","highmath.php","Ответ:");
INSERT INTO commands VALUES("8","20;","schedule.php","Ваше расписание:");
INSERT INTO commands VALUES("10","3;4;","weather.php","Погода сейчас:");
INSERT INTO commands VALUES("11","0;8;","null","Не за что, обращайся:)");
INSERT INTO commands VALUES("12","1;8;","null","Не за что, пользователь :*");
INSERT INTO commands VALUES("13","3;6;","info.php","Основная конфигурация системы:");
INSERT INTO commands VALUES("14","6;","info.php","Основная конфигурация системы:");
INSERT INTO commands VALUES("15","2;","null","Привет, пользователь, чем могу помочь?");
INSERT INTO commands VALUES("16","34;1;","null","Я - Алиса, единая информационная школьная система, твой виртуальный помощник :)");
INSERT INTO commands VALUES("17","34;4;","weather.php","Погода сейчас:");
INSERT INTO commands VALUES("18","32;","null","Я предпочитаю не затрагивать тему религии.");
INSERT INTO commands VALUES("19","24;35;27;","null","Спроси это у учителя истории ;)");
INSERT INTO commands VALUES("20","1;23;","null","Спасибо, я стараюсь для Вас :)");
INSERT INTO commands VALUES("21","28;1;36;","bith.php","Это секрет.<br>Но тебе скажу, только никому не говори!");
INSERT INTO commands VALUES("22","3;33;","null","Я не пользуюсь телефоном.<br>Держи мой IPv4: 81.88.216.249:80");
INSERT INTO commands VALUES("23","1;0;","null","Хммм ...");
INSERT INTO commands VALUES("24","0;","null","Хммм ...");
INSERT INTO commands VALUES("25","37;38;","null","Слава<br>Союзу Советских Социалистических Республик!");
INSERT INTO commands VALUES("26","28;1;","bith.php","Это секрет.<br>Но тебе скажу, только никому не говори!");
INSERT INTO commands VALUES("27","3;46;","backup.php","Делаю резервную копию ...");



DROP TABLE emails;

CREATE TABLE `emails` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_bin NOT NULL,
  `name` varchar(255) COLLATE utf8_bin NOT NULL,
  `points` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO emails VALUES("1","snipghost@list.ru","SnipGhost","5");
INSERT INTO emails VALUES("2","example@example.com","Guest","0");
INSERT INTO emails VALUES("3","ihikaru@inbox.ru","Hikaru","0");
INSERT INTO emails VALUES("4","гость","Гость","0");



DROP TABLE keywords;

CREATE TABLE `keywords` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` int(11) NOT NULL,
  `word` varchar(63) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=119 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO keywords VALUES("1","2","привет");
INSERT INTO keywords VALUES("2","2","хай");
INSERT INTO keywords VALUES("3","2","здравствуй");
INSERT INTO keywords VALUES("4","2","ку");
INSERT INTO keywords VALUES("5","3","скажи");
INSERT INTO keywords VALUES("6","1","система");
INSERT INTO keywords VALUES("7","1","дорогая");
INSERT INTO keywords VALUES("8","3","уточни");
INSERT INTO keywords VALUES("9","3","покажи");
INSERT INTO keywords VALUES("10","3","выведи");
INSERT INTO keywords VALUES("11","4","погода");
INSERT INTO keywords VALUES("12","2","хеллоу");
INSERT INTO keywords VALUES("13","6","конфигурация");
INSERT INTO keywords VALUES("14","7","реши");
INSERT INTO keywords VALUES("15","1","алиса");
INSERT INTO keywords VALUES("16","7","вычисли");
INSERT INTO keywords VALUES("17","7","посчитай");
INSERT INTO keywords VALUES("18","1","ты");
INSERT INTO keywords VALUES("19","5","новости");
INSERT INTO keywords VALUES("20","8","спасибо");
INSERT INTO keywords VALUES("21","8","спс");
INSERT INTO keywords VALUES("22","1","лиса");
INSERT INTO keywords VALUES("23","8","благодарю");
INSERT INTO keywords VALUES("24","9","сегодня");
INSERT INTO keywords VALUES("25","10","завтра");
INSERT INTO keywords VALUES("26","11","вчера");
INSERT INTO keywords VALUES("27","12","неделя");
INSERT INTO keywords VALUES("28","13","месяц");
INSERT INTO keywords VALUES("29","14","послезавтра");
INSERT INTO keywords VALUES("30","15","позавчера");
INSERT INTO keywords VALUES("31","1","милая");
INSERT INTO keywords VALUES("32","16","да");
INSERT INTO keywords VALUES("33","16","ок");
INSERT INTO keywords VALUES("34","16","конечно");
INSERT INTO keywords VALUES("35","16","естественно");
INSERT INTO keywords VALUES("36","17","нет");
INSERT INTO keywords VALUES("37","18","я");
INSERT INTO keywords VALUES("38","18","мой");
INSERT INTO keywords VALUES("39","19","год");
INSERT INTO keywords VALUES("40","0","лол");
INSERT INTO keywords VALUES("41","0","кек");
INSERT INTO keywords VALUES("42","0","скр");
INSERT INTO keywords VALUES("43","0","ого");
INSERT INTO keywords VALUES("44","0","ммм");
INSERT INTO keywords VALUES("45","0","ух");
INSERT INTO keywords VALUES("47","0","такая");
INSERT INTO keywords VALUES("48","0","очень");
INSERT INTO keywords VALUES("49","0","are");
INSERT INTO keywords VALUES("50","0","is");
INSERT INTO keywords VALUES("51","0","the");
INSERT INTO keywords VALUES("52","3","дай");
INSERT INTO keywords VALUES("53","18","мне");
INSERT INTO keywords VALUES("54","0","ясно");
INSERT INTO keywords VALUES("55","0","понятно");
INSERT INTO keywords VALUES("56","32","аллах");
INSERT INTO keywords VALUES("57","32","бог");
INSERT INTO keywords VALUES("58","20","расписание");
INSERT INTO keywords VALUES("59","0","ну");
INSERT INTO keywords VALUES("60","0","че");
INSERT INTO keywords VALUES("61","0","мда");
INSERT INTO keywords VALUES("62","2","здаров");
INSERT INTO keywords VALUES("63","27","дичь");
INSERT INTO keywords VALUES("64","0","это");
INSERT INTO keywords VALUES("65","0","пожалуйста");
INSERT INTO keywords VALUES("66","0","плиз");
INSERT INTO keywords VALUES("67","0","плес");
INSERT INTO keywords VALUES("68","0","пример");
INSERT INTO keywords VALUES("69","0","уравнение");
INSERT INTO keywords VALUES("70","0","то");
INSERT INTO keywords VALUES("71","0","а");
INSERT INTO keywords VALUES("72","21","дела");
INSERT INTO keywords VALUES("73","0","на");
INSERT INTO keywords VALUES("74","23","красава");
INSERT INTO keywords VALUES("75","8","души");
INSERT INTO keywords VALUES("76","2","шалом");
INSERT INTO keywords VALUES("77","0","эй");
INSERT INTO keywords VALUES("78","35","убил");
INSERT INTO keywords VALUES("79","27","кеннеди");
INSERT INTO keywords VALUES("80","1","зая");
INSERT INTO keywords VALUES("81","18","пользователь");
INSERT INTO keywords VALUES("82","1","любимая");
INSERT INTO keywords VALUES("83","23","молодец");
INSERT INTO keywords VALUES("84","23","умница");
INSERT INTO keywords VALUES("85","23","хорошая");
INSERT INTO keywords VALUES("86","24","кто");
INSERT INTO keywords VALUES("87","34","что");
INSERT INTO keywords VALUES("88","26","где");
INSERT INTO keywords VALUES("89","25","как");
INSERT INTO keywords VALUES("90","28","сколько");
INSERT INTO keywords VALUES("91","29","когда");
INSERT INTO keywords VALUES("92","30","зачем");
INSERT INTO keywords VALUES("93","31","почему");
INSERT INTO keywords VALUES("94","6","конфиг");
INSERT INTO keywords VALUES("95","2","hello");
INSERT INTO keywords VALUES("96","2","hi");
INSERT INTO keywords VALUES("97","32","акбар");
INSERT INTO keywords VALUES("98","32","велик");
INSERT INTO keywords VALUES("99","24","who");
INSERT INTO keywords VALUES("100","24","how");
INSERT INTO keywords VALUES("101","33","телефончик");
INSERT INTO keywords VALUES("102","33","телеф");
INSERT INTO keywords VALUES("103","5","новенькое");
INSERT INTO keywords VALUES("104","5","новое");
INSERT INTO keywords VALUES("105","1","тебе");
INSERT INTO keywords VALUES("106","36","лет");
INSERT INTO keywords VALUES("107","37","слава");
INSERT INTO keywords VALUES("108","38","украина");
INSERT INTO keywords VALUES("109","39","знаешь");
INSERT INTO keywords VALUES("110","40","ф");
INSERT INTO keywords VALUES("111","0","пока");
INSERT INTO keywords VALUES("112","41","понедельник");
INSERT INTO keywords VALUES("113","42","вторник");
INSERT INTO keywords VALUES("114","43","среда");
INSERT INTO keywords VALUES("115","44","четверг");
INSERT INTO keywords VALUES("116","45","пятница");
INSERT INTO keywords VALUES("117","46","бекап");
INSERT INTO keywords VALUES("118","46","слепок");



DROP TABLE lessons;

CREATE TABLE `lessons` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lesson_s` varchar(255) COLLATE utf8_bin NOT NULL,
  `type` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO lessons VALUES("1","Русский язык","1");
INSERT INTO lessons VALUES("2","Физика","1");
INSERT INTO lessons VALUES("3","География","1");
INSERT INTO lessons VALUES("4","Алгебра","1");
INSERT INTO lessons VALUES("5","Физкультура","1");
INSERT INTO lessons VALUES("6","Литература","1");
INSERT INTO lessons VALUES("7","Геометрия","1");
INSERT INTO lessons VALUES("8","Обществознание","1");
INSERT INTO lessons VALUES("9","История","1");
INSERT INTO lessons VALUES("10","Английский язык","1");
INSERT INTO lessons VALUES("11","Биология","1");
INSERT INTO lessons VALUES("12","Химия","1");
INSERT INTO lessons VALUES("13","ОБЖ","1");
INSERT INTO lessons VALUES("14","Информатика","1");



DROP TABLE requests;

CREATE TABLE `requests` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT 'guest',
  `text` varchar(1023) COLLATE utf8_bin NOT NULL,
  `num` varchar(63) COLLATE utf8_bin NOT NULL,
  `com` varchar(63) COLLATE utf8_bin NOT NULL,
  `success` tinyint(1) NOT NULL DEFAULT '0',
  `system` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO requests VALUES("1","SnipGhost","что новенького?","34;5;","3","1","Mozilla/5.0 (Windows NT 6.1; WOW64; rv:45.0) Gecko/20100101 Firefox/45.0","2016-04-03 15:26:26");



DROP TABLE rooms;

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `room_s` varchar(255) COLLATE utf8_bin NOT NULL,
  `part` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO rooms VALUES("0","---","1","1");
INSERT INTO rooms VALUES("1","325","1","1");
INSERT INTO rooms VALUES("2","324","1","1");



DROP TABLE schedules;

CREATE TABLE `schedules` (
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
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO schedules VALUES("1","5","3","1","1","1","1","1","1");
INSERT INTO schedules VALUES("2","5","3","1","2","1","2","2","1");
INSERT INTO schedules VALUES("3","1","1","1","1","2","3","0","1");
INSERT INTO schedules VALUES("4","1","2","1","1","3","4","0","1");
INSERT INTO schedules VALUES("5","1","3","1","1","4","5","0","1");
INSERT INTO schedules VALUES("6","1","4","1","1","4","5","0","1");
INSERT INTO schedules VALUES("7","1","5","1","1","5","6","0","1");
INSERT INTO schedules VALUES("8","1","6","1","1","6","7","0","1");
INSERT INTO schedules VALUES("9","1","7","1","1","6","7","0","1");
INSERT INTO schedules VALUES("10","2","1","1","1","7","5","0","1");
INSERT INTO schedules VALUES("11","2","2","1","1","8","8","0","1");
INSERT INTO schedules VALUES("12","2","3","1","1","2","3","0","1");
INSERT INTO schedules VALUES("13","2","4","1","1","2","3","0","1");
INSERT INTO schedules VALUES("14","2","5","1","1","9","9","0","1");
INSERT INTO schedules VALUES("15","2","6","1","1","10","10","0","1");
INSERT INTO schedules VALUES("16","3","1","1","1","11","11","0","1");
INSERT INTO schedules VALUES("17","3","2","1","1","12","12","0","1");
INSERT INTO schedules VALUES("18","3","3","1","1","10","10","0","1");
INSERT INTO schedules VALUES("19","3","4","1","1","5","6","0","1");
INSERT INTO schedules VALUES("20","3","5","1","1","4","4","0","1");
INSERT INTO schedules VALUES("21","3","6","1","1","13","13","0","1");
INSERT INTO schedules VALUES("22","3","7","1","1","4","5","0","1");
INSERT INTO schedules VALUES("23","3","8","1","1","4","5","0","1");
INSERT INTO schedules VALUES("24","4","1","1","1","2","3","0","1");
INSERT INTO schedules VALUES("25","4","2","1","1","7","5","0","1");
INSERT INTO schedules VALUES("26","4","3","1","1","5","6","0","1");
INSERT INTO schedules VALUES("27","4","4","1","1","8","8","0","1");
INSERT INTO schedules VALUES("28","4","5","1","1","2","3","0","1");
INSERT INTO schedules VALUES("29","4","6","1","1","10","10","0","1");
INSERT INTO schedules VALUES("30","4","7","1","1","1","1","0","1");
INSERT INTO schedules VALUES("31","4","8","1","1","2","3","0","1");
INSERT INTO schedules VALUES("32","5","1","1","1","14","14","0","1");
INSERT INTO schedules VALUES("33","5","2","1","1","9","9","0","1");
INSERT INTO schedules VALUES("34","5","4","1","1","6","7","0","1");
INSERT INTO schedules VALUES("35","5","5","1","1","4","5","0","1");
INSERT INTO schedules VALUES("36","5","6","1","1","4","5","0","1");



DROP TABLE teachers;

CREATE TABLE `teachers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `teacher_s` varchar(255) COLLATE utf8_bin NOT NULL,
  `type` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO teachers VALUES("1","Шмелькова Людмила Александровна","1");
INSERT INTO teachers VALUES("2","Волкова Татьяна Васильевна","1");
INSERT INTO teachers VALUES("3","Барат Артем Александрович","1");
INSERT INTO teachers VALUES("4","Мецегора Татьяна Григорьевна","1");
INSERT INTO teachers VALUES("5","Згонник Любовь Ивановна","1");
INSERT INTO teachers VALUES("6","Мокрушин Сергей Анатольевич","1");
INSERT INTO teachers VALUES("7","Боровик Марина Викторовна","1");
INSERT INTO teachers VALUES("8","Борисова Марина Валерьевна","1");
INSERT INTO teachers VALUES("9","Еремеева Марина Викторовна","1");
INSERT INTO teachers VALUES("10","Харькова Ольга Павловна","1");
INSERT INTO teachers VALUES("11","Мойчук Сергей Иванович","1");
INSERT INTO teachers VALUES("12","Гольденштейн Любовь Вячеславовна ","1");
INSERT INTO teachers VALUES("13","Чепракова Ольга Викторовна","1");
INSERT INTO teachers VALUES("14","Кабицына Ольга Евгеньевна","1");



