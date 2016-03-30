<?php @session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
<?php
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
    $email = preg_replace("/[^0-9A-ZА-ЯЁ@.\s{2,}]+/ui","",(string)$email);
    $uname = preg_replace("/[^0-9A-ZА-ЯЁ@.()[]\s{2,}]+/ui","",(string)$uname);
    $sql = $QUERY[4][1] . $email . $QUERY[4][2] . $uname . $QUERY[4][3];
    $res = $db->query($sql);
    if ($res) {
    	$_SESSION['name'] = $uname;
    	$_SESSION['email'] = $email;
    	echo '<br>Вы успешно добавлены, '.$uname.'<br><br>';
    	require('src/beta-button.html');
    } else {
    	echo '<p class="tred">'.$MESSAGE['error'].'</p>';
    }
    //==========================================================================
	}
?>

</body>
</head>