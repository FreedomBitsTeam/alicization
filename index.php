<?php 
	@session_start(); 
	include("etc/config.php"); 
	if (isset($_GET['logout']) && isset($_SESSION['name']))
	{
		unset($_SESSION['name']);	
		unset($_SESSION['email']);	
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
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
		<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
		<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
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
					<div class="label">Чат с Алисой <?php require_once("php/tray.php"); ?></div>
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
		
		<?php require_once("php/beta.php"); ?>
		
		<div class="vinfo"><?php echo $SYSTEM['version'];?></div>
		
	</body>
</html>