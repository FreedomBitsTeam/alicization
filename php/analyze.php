<?php
	if (isset($_GET['cmd'])) {
    //==========================================================================
    include('packcage.php');
    //==========================================================================
    // Нулевая серия запросов 																	 [предустановки]
    //==========================================================================
    $db = ConnectDB();
    $db->query("SET NAMES 'utf8'");
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
    	$allcmd .= $row['word']." ";
    	$allnum .= $row['type'].";";
    } 
    //==========================================================================
    // Вторая серия запросов																					[отвечаем]
    //==========================================================================
    $sql = "SELECT * FROM (SELECT id, keywords, doit, answer, SIMILARITY_RATIO('" . $allnum . "', keywords) AS KOL FROM commands) a WHERE a.KOL >= 40 ORDER BY a.KOL DESC LIMIT 1";
    $res = $db->query($sql);
    $row = mysqli_fetch_array($res);
    $answer = $row['answer'];
    if (@include("../mod/".$row['doit'])) {
    	$answer .= " ".@Module($allnum, (string)$_GET['cmd']);
    }
    //==========================================================================
    // Выводим результаты
    //==========================================================================
    if (strlen($row['answer']) > 2)
    	echo '<br><br><br><div class="sys msg">"' . substr($allcmd, 0, strlen($allcmd)-1) . '"<br>' . $answer . '<div class="msg-left"></div></div><br><br><br><br>';
    else
    	echo '<br><br><br><div class="sys msg">"' . substr($allcmd, 0, strlen($allcmd)-1) . '"<br>' . 'К сожалению, я пока не знаю, что ответить на это' . '<div class="msg-left"></div></div><br><br><br><br>';
	}
?>