<?php
	if (isset($_GET['cmd'])) {
		//============================================
   	// Нулевая серия запросов			 [предустановки]
   	//============================================
    $db = new mysqli("localhost", "admin", "qwerty", "alicization");
    $db->query("SET NAMES 'utf8'");
    //============================================
   	// Первая серия запросов				 [анализируем]
   	//============================================
    $words  = explode(" ", mb_convert_case(mb_ereg_replace("/[^a-zA-ZА-Яа-я0-9\s]/", "", $_GET['cmd']), MB_CASE_LOWER, "utf8"));
    $allcmd = "";
    $allnum = "";
    for ($i = 0; $i < count($words); $i++) {
    	$sql = "SELECT * FROM (SELECT word, type, LEVENSHTEIN_RATIO(word, '" . $words[$i] . "') AS KOL FROM keywords) a WHERE (ABS(ASCII(SUBSTRING(a.word, 1, 1))-ASCII(SUBSTRING('" . $words[$i] . "', 1, 1))) < 80) AND a.KOL >= 40 ORDER BY a.KOL DESC LIMIT 1";
    	$res = $db->query($sql);
    	$row = mysqli_fetch_array($res);
    	$allcmd .= $row['word']." ";
    	$allnum .= $row['type'].";";
    } 
    //============================================
   	// Вторая серия запросов						[отвечаем]
   	//============================================
    $sql = "SELECT * FROM (SELECT id, keywords, doit, answer, SIMILARITY_RATIO('" . $allnum . "', keywords) AS KOL FROM commands) a WHERE a.KOL >= 50 ORDER BY a.KOL DESC LIMIT 1";
    $res = $db->query($sql);
    $row = mysqli_fetch_array($res);
    $answer = $row['answer'];
    //============================================
    // Выводим результаты
    //============================================
    if (strlen($row['answer']) > 2)
    	echo '<br><br><br><div class="sys msg">"' . substr($allcmd, 0, strlen($allcmd)-1) . '"<br>' . $answer . '<div class="msg-left"></div></div><br><br><br><br>';
    else
    	echo '<br><br><br><div class="sys msg">"' . substr($allcmd, 0, strlen($allcmd)-1) . '"<br>' . 'К сожалению, я пока не знаю, что ответить на это' . '<div class="msg-left"></div></div><br><br><br><br>';
	}
?>