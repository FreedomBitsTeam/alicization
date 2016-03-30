<?php @session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
<?php
	if (isset($_GET['cmd'])) {
    //==========================================================================
    include('packcage.php');
    //==========================================================================
    // Нулевая серия запросов 																	 [предустановки]
    //==========================================================================
    $db = ConnectDB();
    //==========================================================================
    // Первая серия запросов 																			 [анализируем]
    //==========================================================================
    $_GET['cmd'] = rawurldecode($_GET['cmd']);
    $words  = explode(" ", mb_convert_case(trim(preg_replace("/[^0-9A-ZА-ЯЁ\s{2,}]+/ui"," ",(string)$_GET['cmd'])), MB_CASE_LOWER, "utf8"));
    $allcmd = "";
    $allnum = "";
    for ($i = 0; $i < count($words); $i++) {
    	$sql = "SELECT * FROM (SELECT word, type, LEVENSHTEIN_RATIO(word, '" . $words[$i] . "') AS KOL FROM keywords) a WHERE (ABS(ASCII(SUBSTRING(a.word, 1, 1))-ASCII(SUBSTRING('" . $words[$i] . "', 1, 1))) < 80) AND a.KOL >= 40 ORDER BY a.KOL DESC LIMIT 1";
    	$res = $db->query($sql);
    	$row = mysqli_fetch_array($res);
    	$allcmd .= $row['word'].' ';
    	$allnum .= $row['type'].';';
    } 
    //==========================================================================
    // Вторая серия запросов																					[отвечаем]
    //==========================================================================
    $sql = "SELECT * FROM (SELECT id, keywords, doit, answer, SIMILARITY_RATIO('" . $allnum . "', keywords) AS KOL FROM commands) a WHERE a.KOL >= 40 ORDER BY a.KOL DESC LIMIT 1";
    $res = $db->query($sql);
    $row = mysqli_fetch_array($res);
    $answer = $row['answer'];
    if ($row['doit'] != "null") {					// Если необходимо, работаем с модулем
    	if (@include($PATH_TO['doit'].$row['doit'])) {					 // Подключаем
    		$answer .= " ".@Module($allnum, (string)$_GET['cmd']); // Выполняем
    	}
    }
    //==========================================================================
    // Выводим результаты
    //==========================================================================
    if (isset($_SESSION['name'])) {
    	$answer = str_replace($MESSAGE['user'], $_SESSION['name'], $answer); 
    }
    $notion = "";
    if ($SYSTEM['debug']) {	
    	$notion = $MESSAGE['debug'] . ' "' . substr($allcmd, 0, strlen($allcmd)-1) . '"<br>'; 
    }
    if (strlen($row['answer']) > 2)
    	echo '<br><br><br><div class="sys msg">' . $notion . $answer . '<div class="msg-left"></div></div><br><br><br><br>';
    else
    	echo '<br><br><br><div class="sys msg">' . $notion . $MESSAGE['answer'] . '<div class="msg-left"></div></div><br><br><br><br>';
	}
?>

</body>	
</html>