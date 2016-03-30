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
    //==========================================================================
    // Ищем в базе полученный e-mail																		 [Поиск]
    //==========================================================================
    $email = rawurldecode($_GET['cmd']);
    $email = preg_replace("/[^0-9A-ZА-ЯЁ@.\s{2,}]+/ui","",(string)$email);
    $sql = $QUERY[3][1] . $email . $QUERY[3][2] ;
    $res = $db->query($sql);
    if ($res) {
    	$row = mysqli_fetch_array($res);
    	if ($row['name'] != "") {
    		@session_start();
    		$_SESSION['name'] = $row['name'];
    		$_SESSION['email'] = $row['email'];
    		echo '<br>Ваше имя:<br><p id="usernameget">'.$row['name'].'</p>';
    		echo '<br><br><br>';
    		require('src/beta-button.html');
    	} else {
    		require('src/beta-step2.html');
    	}
    }
    //==========================================================================
	}
?>

</body>
</head>