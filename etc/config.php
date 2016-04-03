<?php
	
	//==========================================================================================================
	
	$DB['host'] = 'localhost';     // host, default: localhost
	$DB['user'] = 'admin';         // user, default: admin
	$DB['pswd'] = 'qwerty';        // password for user, default: qwerty
	$DB['dbnm'] = 'alicization';   // database name, default: alicization
	
	//==========================================================================================================
	
	$SYSTEM['name']    = 'Beta';   // system version name
	$SYSTEM['version'] = '0.5.9';  // system version number
	$SYSTEM['postfix'] = 'S-MPS';  // system assembly code
	
	$SYSTEM['autht']   = true;     // require login On/Off
	$SYSTEM['quest']   = true;     // education book On/Off
	$SYSTEM['tlink']   = true;     // test page button On/Off	
	
	$SYSTEM['debug']   = false;    // system debugging On/Off
	$SYSTEM['extlib']  = true;     // load libraries from the external point On/Off
	$SYSTEM['savedat'] = true;     // save users requests On/Off
	$SYSTEM['autoedu'] = false;    // auto display education book On/Off
	
	$SYSTEM['metrika'] = true;     // yandex metrika core On/Off
	$SYSTEM['mwidget'] = false;    // yandex metrika widget On/Off
	
	//==========================================================================================================
	
	$SYSTEM['schedule'] = 1;       // schedule detail levels (1 - min, 3 - max)
	$SYSTEM['birthday'] = '2015-07-24'; // system birthday date (format: yyyy-mm-dd)
	
	$SYSTEM['v-chars']  = "/[^0-9A-ZА-ЯЁ,.()\"'\+\/\-!?\=]+/ui"; // valid chars for requests
	
	//==========================================================================================================
	
	$PATH_TO['doit'] = '../mod/';  // path to DOIT directory
	
	//==========================================================================================================
	
	$PATH_TO['jq'][0] = 'lib/jquery.min.js';
	$PATH_TO['jq'][1] = 'http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js';
	
	$PATH_TO['ui-js'][0]  = 'lib/jquery-ui.min.js';
	$PATH_TO['ui-js'][1]  = 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js';	
	$PATH_TO['ui-css'][0] = 'lib/jquery-ui.css';
	$PATH_TO['ui-css'][1] = 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css';
	
	//==========================================================================================================
	
	// Text messages from system
	$MESSAGE['answer'] = 'К сожалению, я пока не знаю, что ответить на это, разработчики не научили меня :(';
	$MESSAGE['typein'] = '<br><br>Введите "инфо" для отображения обучения.';
	$MESSAGE['badreq'] = 'Некорректный запрос!<br>Запрос должен быть более 3 и менее 50 символов длиной.';
	$MESSAGE['debug']  = 'Понято как:';
	$MESSAGE['error']  = 'Произошел сбой! Пожалуйста, обновите страницу :(';
	$MESSAGE['user']   = 'пользователь';
	
	// Analyzer, level 1, file: php/analyze.php
	$QUERY[1][1] = "SELECT * FROM (SELECT word, type, LEVENSHTEIN_RATIO(word, '";
	$QUERY[1][2] = "') AS KOL FROM keywords) a WHERE (ABS(ASCII(SUBSTRING(a.word, 1, 1))-ASCII(SUBSTRING('";
	$QUERY[1][3] = "', 1, 1))) < 80) AND a.KOL >= 40 ORDER BY a.KOL DESC LIMIT 1";
	
	// Analyzer, level 2, file: php/analyze.php
	$QUERY[2][1] = "SELECT * FROM (SELECT id, keywords, doit, answer, SIMILARITY_RATIO('";
	$QUERY[2][2] = "', keywords) AS KOL FROM commands) a WHERE a.KOL >= 40 ORDER BY a.KOL DESC LIMIT 1";
	
	// Beta email check, file: php/chemail.php
	$QUERY[3][1] = "SELECT * FROM emails WHERE email='";
	$QUERY[3][2] = "' LIMIT 1";
	
	// Beta email insert, file: php/inemail.php
	$QUERY[4][1] = "INSERT INTO emails (`email`, `name`, `points`) VALUES ('";
	$QUERY[4][2] = "', '";
	$QUERY[4][3] = "', '0')";
	
	// Analyzer, telemetry, file: php/analyze.php
	$QUERY[5][1] = "INSERT INTO `requests` (`id`, `user`, `text`, `num`, `com`, `success`, `system`, `time`) VALUES (NULL, '";
	$QUERY[5][2] = "', CURRENT_TIMESTAMP)";
	
	//==========================================================================================================
	
?>