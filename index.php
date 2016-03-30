<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Alpha v0.3.1</title>
		<link rel="icon" type="image/x-icon" href="img/ico/chat/favicon.ico">
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
		<script type="text/javascript" src="js/interface.js"></script>
		<script type="text/javascript" src="js/request.js"></script>
	</head>	
	<body>
		
		<div class="logo"></div>
		
		<div class="container">
			
			<div class="alice"></div>
			
			<div class="chat">
				<div class="window">
					<div class="label">Чат с Алисой</div>
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
		
	</body>
</html>