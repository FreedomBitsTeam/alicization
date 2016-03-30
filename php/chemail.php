<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
<?php
	if (isset($_GET['cmd']))
	{
		//==========================================================================
    include('packcage.php');
    //==========================================================================
    // Нулевая серия запросов 																	 [предустановки]
    //==========================================================================
    $db = ConnectDB();
    $db->query("SET NAMES 'utf8'");
    //==========================================================================
    // Ищем в базе полученный e-mail																		 [Поиск]
    //==========================================================================
    $email = rawurldecode($_GET['cmd']);
    $email = preg_replace("/[^0-9A-Z@.\s{2,}]+/ui","",(string)$email);
    $sql = "SELECT * FROM emails WHERE email='".$email."' LIMIT 1";
    $res = $db->query($sql);
    if ($res) {
    	$row = mysqli_fetch_array($res);
    	if ($row['name'] != "") {
    		@session_start();
    		$_SESSION['name'] = $row['name'];
    		$_SESSION['email'] = $row['email'];
    		echo "<br>Ваше имя:<br>".$row['name']."<br><br><br>";
    		echo '<input id="sucstep" class="bigbtn" type="button" value="Go" OnClick="ClickNext(this);">';
    	} else {
    		printf('<br><br>Введи свое имя:<br><br>
								<input id="username" class="bigtxt" type="text" placeholder="Царь Петр I" style="text-align: center;">
								<br><br>
								<input id="nextstep3" class="bigbtn" type="button" value="Далее" OnClick="ClickNext(this);">
							');
    	}
    }
    //==========================================================================
	}
?>

</body>
</head>