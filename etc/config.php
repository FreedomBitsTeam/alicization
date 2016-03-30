﻿<?php
	
	//==========================================================================================================
	
	$DB['host'] = 'localhost';     // host, default: localhost
	$DB['user'] = 'admin';         // user, default: admin
	$DB['pswd'] = 'qwerty';        // password for user, default: qwerty
	$DB['dbnm'] = 'alicization';   // database name, default: alicization
	
	$SYSTEM['name']    = 'Beta';   // system version name
	$SYSTEM['version'] = '0.5.5';  // system version number
	$SYSTEM['postfix'] = 'S-LTS';  // system assembly code
	
	$SYSTEM['debug']   =  false;   // system debugging On/Off
	$SYSTEM['extlib']  =  true;    // load libraries from the external point
	
	$PATH_TO['doit'] = '../mod/';  // path to DOIT directory
	
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
	
	// File: php/chemail.php
	$QUERY[3][1] = "SELECT * FROM emails WHERE email='";
	$QUERY[3][2] = "' LIMIT 1";
	
	// File: php/inemail.php
	$QUERY[4][1] = "INSERT INTO emails (`email`, `name`, `points`) VALUES ('";
	$QUERY[4][2] = "', '";
	$QUERY[4][3] = "', '0')";
	
	//==========================================================================================================
	
?>