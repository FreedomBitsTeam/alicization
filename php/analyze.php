<?php @session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
<?php
  if (!isset($_GET['cmd'])) $_GET['cmd'] = "N";
  $mbstrlen = mb_strlen($_GET['cmd'], "utf-8");
	if ($mbstrlen >= 3 && $mbstrlen <= 50) {
    //==========================================================================
    include('packcage.php');
    //==========================================================================
    // Нулевая серия запросов 																	 [предустановки]
    //==========================================================================
    $db = ConnectDB();
    //==========================================================================
    // Первая серия запросов 																			 [анализируем]
    //==========================================================================
    $_GET['cmd'] = (string)(rawurldecode($_GET['cmd']));
    //--------------------------------------------------------------------------
    // Преобразуем вводимую строку, удаляем опасные символы
    //--------------------------------------------------------------------------
    $words = explode(" ", mb_convert_case(trim(preg_replace(
             "/[^A-ZА-ЯЁ ]+/ui","",$_GET['cmd'])),MB_CASE_LOWER,"utf8"));
    //--------------------------------------------------------------------------
    $allcmd = "";
    $allnum = "";
    for ($i = 0; $i < count($words); $i++) {
      if ($words[$i] != "" && $words[$i] != " " && $words[$i] != "  ") {
    		$sql = $QUERY[1][1] .$words[$i]. $QUERY[1][2] .$words[$i]. $QUERY[1][3];
    		$res = $db->query($sql);
    		$row = mysqli_fetch_array($res);
    		if ($row['type'] != '0') {
    			$allcmd .= $row['word'].' ';
    			$allnum .= $row['type'].';';
    		}
    	}
    } 
    if ($allnum == "") $allnum = "0;";
    //==========================================================================
    // Вторая серия запросов																					[отвечаем]
    //==========================================================================
    $sql = $QUERY[2][1] . $allnum . $QUERY[2][2];
    $res = $db->query($sql);
    $row = mysqli_fetch_array($res);
    $answer = $row['answer'];
    if ($row['doit'] != "null") {					// Если необходимо, работаем с модулем
    	if (@include($PATH_TO['doit'].$row['doit'])) {					 // Подключаем
    		$answer .= " ".@Module($allnum, (string)$_GET['cmd']); // Выполняем
    	}
    }        
    //==========================================================================
    // Сохраняем телеметрию
    //==========================================================================
    if ($SYSTEM['savedat']) {
    	$userlogin = "anon"; $succ = 0;
    	if (isset($_SESSION['name'])) $userlogin = $_SESSION['name'];
    	if (strlen($row['answer']) > 2) $succ = 1;
    	$syst = $_SERVER["HTTP_USER_AGENT"];
    	$_GET['cmd'] = mb_convert_case(trim(preg_replace(
                   $SYSTEM['v-chars']," ",$_GET['cmd'])),MB_CASE_LOWER,"utf8");
    	$sql = $QUERY[5][1].$userlogin."', '".$_GET['cmd']."', '".$allnum."', '".
    	       $row['id']."', '".$succ."', '".$syst.$QUERY[5][2];
    	$db->query($sql);
    }
    //==========================================================================
    // Выводим результаты
    //==========================================================================
    if (isset($_SESSION['name'])) {
    	$answer = str_replace($MESSAGE['user'], $_SESSION['name'], $answer); 
    }
    $notion = "";
    if ($SYSTEM['debug']) {	
    	$notion = $MESSAGE['debug'];
    	$notion .= ' "' . substr($allcmd, 0, strlen($allcmd)-1) . '"<br>'; 
    }
    echo '<div class="sys msg">' . $notion;
    if (strlen($row['answer']) > 2)
    	echo $answer;
    else
    	echo $MESSAGE['answer'] . $MESSAGE['typein'];
    echo '<div class="msg-left"></div></div><div style="clear: both;">';
    //==========================================================================
	} else {
		include('packcage.php');
		echo '<div class="sys msg">' . $MESSAGE['badreq'];
		echo '<br>В запросе: ' . $mbstrlen . '<br>';
		echo '<div class="msg-left"></div></div><div style="clear: both;">';
	}
?>

</body>	
</html>