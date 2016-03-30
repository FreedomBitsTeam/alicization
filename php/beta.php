<?php

if (!isset($_SESSION['name']) && (!isset($_COOKIE['name']) || !isset($_COOKIE['email']))) {
	printf('
		<div id="overlay">
			<div class="showmessage" id="betain">
				<div class="window">
					<div class="label">Бета-тест</div>
					<div class="content">
						
						<div class="step" id="st0">
							Привет, %s<br>
							<br>Большое спасибо, что ты уделил нашему проекту время!<br>
							<br>Перед началом тестирования соблюдем все формальности :)<br>
							<br>Для начала убедись, что у тебя включен JavaScript, и тыкай кнопку<br>
							<input id="nextstep1" class="bigbtn" type="button" value="Далее">
						</div>
						
						<div class="step" id="st1">
							<br>Пожалуйста, введи свою эл. почту<br>
							<br>Если ты уже принимал участие в Бета-тесте, то сразу сможешь продолжить тестирование<br>
							<br><p class="torange">Не хочешь указывать свою почту - придумай какой-то логин</p>
							<br>
							<input id="email" class="bigtxt" type="text" placeholder="example@example.com">
							<input id="nextstep2" class="bigbtn" type="button" value="Далее">
							<span id="error1" class="tred"></span>
						</div>
						
						<div class="step" id="st2">
							
						</div>
						
						<div class="step" id="st3">
							
						</div>
						
					</div>		
				</div>
			</div>
		</div>
	', "%username%");
} else {
	if (isset($_COOKIE['name']) && isset($_COOKIE['email']) && (!isset($_SESSION['name']))) {
		$_SESSION['name'] = $_COOKIE['name'];
    $_SESSION['email'] = $_COOKIE['email'];
	}
	printf('
		<div id="overlay">
			<div class="showmessage">
				<div class="window">
					<div class="label">Бета-тест</div>
					<div class="content">
						
						<div class="step" id="st0">
							Привет, %s<br>
							<br>Большое спасибо, что ты снова уделил нашему проекту время!<br>
							<br>Ты можешь продолжить тестирование системы прямо сейчас<br>
							<br>Для начала убедись, что у тебя включен JavaScript, и тыкай кнопку<br>
							<input id="sucstep" class="bigbtn" type="button" value="Go">
						</div>
						
					</div>		
				</div>
			</div>
		</div>
	', $_SESSION['name']);
}

?>