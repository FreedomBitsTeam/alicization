<?php
  @session_start();
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
    $email = preg_replace("/[^0-9A-ZА-ЯЁ@.]+/ui","",(string)$email);
    $sql = $QUERY[3][1] . $email . $QUERY[3][2] ;
    $res = $db->query($sql);
    if ($res) {
    	$row = mysqli_fetch_array($res);
    	if ($row['name'] != "") {
    		$_SESSION['name'] = $row['name'];
    		$_SESSION['email'] = $row['email'];
    		setcookie("name", $row['name'], time()+604800, '/', $_SERVER['SERVER_NAME']);
    		setcookie("email", $row['email'], time()+604800, '/', $_SERVER['SERVER_NAME']);
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