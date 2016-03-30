<?php 
	@session_start(); 
	include("etc/config.php"); 
	if (isset($_GET['logout']) && isset($_SESSION['name'])) {
		unset($_SESSION['name']);	
		unset($_SESSION['email']);	
		setcookie("name", NULL, time()-10, '/', $_SERVER['SERVER_NAME']);
    setcookie("email", NULL, time()-10, '/', $_SERVER['SERVER_NAME']);
		header ('Location: ../alicization/');
		exit();
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title><?php @printf($SYSTEM['name']." ".$SYSTEM['version']); ?></title>
		<link rel="icon" type="image/x-icon" href="img/ico/chat/favicon.ico">
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="stylesheet" type="text/css" href="css/beta.css">
		<link rel="stylesheet" type="text/css" href="css/education.css">
		<link rel="stylesheet" type="text/css" href="css/colors.css">
		<link rel="stylesheet" type="text/css" href="css/weather.css">
		<?php $b = $SYSTEM['extlib']; printf('
			<link href="%s" rel="stylesheet" type="text/css"/>
			<script type="text/javascript" src="%s"></script>
			<script src="%s"></script>
			', $PATH_TO['ui-css'][$b], $PATH_TO['jq'][$b], $PATH_TO['ui-js'][$b]);
		?>
		<script type="text/javascript" src="js/interface.js"></script>
		<script type="text/javascript" src="js/request.js"></script>
		<script type="text/javascript" src="js/beta.js"></script>
	</head>	
	<body>
		<?php require_once("php/quest.php"); ?>
		<div class="logo"></div>
		<div class="container">
			
			<div class="alice"></div>
			
			<div class="chat">
				<div class="window">
					<div class="label">
						Чат с Алисой 
						<?php if ($SYSTEM['metrika']) require_once("php/metrika.php"); ?>
						<?php require_once("php/tray.php"); ?>
					</div>
					<div class="content">
						<div id="messages" class="messages">
							<div id="results"></div>
						</div>
						<form method="POST" action="" class="data-input">
							<input id="data" class="inp1" type="text" placeholder="Текст вашего сообщения"/>
							<input id="send" class="inp2" type="submit" value="Send"/>	
						</form>
					</div>
				</div>
			</div>
			
		</div>
		<?php if ($SYSTEM['autht']) require_once("php/beta.php"); ?>
		<div class="vinfo"><?php echo $SYSTEM['version']." on ".PHP_OS;?></div>
	</body>
</html>