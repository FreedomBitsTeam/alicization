<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Alpha v0.1.3</title>
		<link rel="stylesheet" type="text/css" href="css/style-api.css">
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
		<script type="text/javascript" src="js/request-api.js"></script>
</head>
<body>
	
	<form method="POST" action="" class="container">
		<input type="text" name="cmd" id="data" class="field"/>
		<input type="submit" value="Отправить" class="send" id="send" /><br/>
	</form>

	<center>
 		<span id="string">Результаты анализа известных слов для запроса: "<span class="command"></span>"</span>
 	</center>
 	
	<div class="container">
		
		<ul id="results" class="update">
			
		</ul>
		
	</div>

</body>
</html>