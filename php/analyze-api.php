<?php
	if (isset($_GET['cmd'])) {
    include('packcage.php');
    $db = new mysqli("localhost", "admin", "qwerty", "alicization");
    $db->select_db("alicization");
    $db->query("SET NAMES 'utf8'");
    $words = explode(" ", mb_convert_case(mb_ereg_replace("/[^a-zA-ZА-Яа-я0-9\s]/", "", $_GET['cmd']), MB_CASE_LOWER, "utf8"));
    $allcmd = "";
    $allnum = "";
    for ($i = 0; $i < count($words); $i++) {
    	$sql = "select * from (SELECT word, id, type, LEVENSHTEIN_RATIO(word, '" . $words[$i] . "') AS KOL FROM keywords) a WHERE (ABS(ASCII(SUBSTRING(a.word, 1, 1))-ASCII(SUBSTRING('" . $words[$i] . "', 1, 1))) < 80) AND a.KOL > 30 ORDER BY a.KOL DESC LIMIT 3 ";
    	//$sql = "SELECT * FROM keywords WHERE (ABS(ASCII(SUBSTRING(word, 1, 1))-ASCII(SUBSTRING('".$words[$i]."', 1, 1))) < 80) AND LEVENSHTEIN_RATIO(word, '" . $words[$i] . "') > 30 ORDER BY LEVENSHTEIN_RATIO(word, '" . $words[$i] . "') DESC LIMIT 3";
    	$res = $db->query($sql);
    	if (count($res)) {
    		$end_result = "";
    		$j = 0; $color = "blue";
    		while($row = mysqli_fetch_array($res)) {
    			$j++; 
    			if ($j == 1) { 
    				$color = "green"; 
    				$allcmd .= $row['word'].", ";
    				$allnum .= $row['id'].":";
    			} else { 
    				$color = "blue"; 
    			}
					$result         = $row['id'];
					$bold           = '<span class="word ' . $color . '">' . $row['word'] . '</span>';
					$end_result    .= '<li><div class="id">' . $result . '</div><div class="id">' . $row['KOL'] . '%</div> ' . $bold . '</li>';
				}
				if ($end_result != "") echo $end_result;
				else echo '<li><div class="id">#</div>' . 'Я не знаю этого слова: <span class="word red">' . $words[$i] . '</span></li>';
    	} else {
    		echo '<li><div class="id">#</div>' . 'Я не знаю этого слова: <span class="word red">' . $words[$i] . '</span></li>';
    	}
    } echo '<li style="border-top: 1px solid black;">Итого:</li><li><div class="endres">' . substr($allcmd, 0, strlen($allcmd)-2) . ' [' . substr($allnum, 0, strlen($allnum)-1) . ']</div></li>';
	}
?>