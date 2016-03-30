<?php 
  @session_start();
	if (isset($_GET['email'], $_GET['uname']))
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
    $email = rawurldecode($_GET['email']);
    $uname = rawurldecode($_GET['uname']);
    $email = preg_replace("/[^0-9A-ZА-ЯЁ@.]+/ui","",(string)$email);
    $uname = preg_replace("/[^0-9A-ZА-ЯЁ@.()[]]+/ui","",(string)$uname);
    $sql = $QUERY[4][1] . $email . $QUERY[4][2] . $uname . $QUERY[4][3];
    $res = $db->query($sql);
    if ($res) {
    	$_SESSION['name'] = $uname;
    	$_SESSION['email'] = $email;
    	setcookie("name", $uname, time()+604800, '/', $_SERVER['SERVER_NAME']);
    	setcookie("email", $email, time()+604800, '/', $_SERVER['SERVER_NAME']);
    	echo '<br>Вы успешно добавлены, '.$uname.'<br><br>';
    	require('src/beta-button.html');
    } else {
    	echo '<p class="tred">'.$MESSAGE['error'].'</p>';
    }
    //==========================================================================
	}
?>