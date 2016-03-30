<?php

	$username = "тестировщик";
	if (isset($_COOKIE['name'])) $username = $_COOKIE['name'];
	if (isset($_SESSION['name'])) $username = $_SESSION['name'];
	printf('
		<div class="window" id="drag1">
			<p class="label tgreen">Обучение<label class="trayb tred" data-title="Закрыть" onClick="CloseWin(\'#drag1\');">[X]</label></p>
			<div class="content noselect">
				<div class="page" id="page1">
					<p class="torange">Привет, <span id="usercaption">%s!</spam></p>
					<br>
					<p class="torange">Это программа научит тебя пользоваться системой и поможет провести мини тестирование.</p>
					<br><br>
					<input class="trig_page next_page" type="button" value=">>" onClick="NextPage();">
				</div>
				<div class="page" id="page2">
					<p class="torange">Как тебе эта панелька? А ее можно перетаскивать на любое удобное место!</p>
					<br>
					<p class="tblue">Перетащить эту, и другие такие окошки, можно за их заголовок вверху :)</p>
					<br><br>
					<input class="trig_page last_page" type="button" value="<<" onClick="LastPage();">
					<input class="trig_page next_page" type="button" value=">>" onClick="NextPage();">
				</div>
				<div class="page" id="page3">
					<p class="torange ">Итак, что же это такое?</p>
					<br>
					<p class="tblue">Это <span class="tred">Алиса</span>, виртуальный помощник и наша единая информационная система.</p>
					<br><br>
					<input class="trig_page last_page" type="button" value="<<" onClick="LastPage();">
					<input class="trig_page next_page" type="button" value=">>" onClick="NextPage();">
				</div>
				<div class="page" id="page4">
					<p class="torange">Благодаря этой системе вы сможете узнавать какую-то необходимую информацию.</p>
					<br>
					<p class="tblue">То есть сделать это вы можете в обычном диалоге, просто задав ей вопрос.</p>
					<br><br>
					<input class="trig_page last_page" type="button" value="<<" onClick="LastPage();">
					<input class="trig_page next_page" type="button" value=">>" onClick="NextPage();">
				</div>
				<div class="page" id="page5">
					<p class="torange">Причем отметим, что наша система умеет понимать неточно вводимые данные.</p>
					<br>
					<p class="tblue">Это значит, что при вводе слова "превет" система пытается понять это, как слово "привет".</p>
					<br><br>
					<input class="trig_page last_page" type="button" value="<<" onClick="LastPage();">
					<input class="trig_page next_page" type="button" value=">>" onClick="NextPage();">
				</div>
				<div class="page" id="page6">
					<p class="torange">На данный момент в ней всего несколько тестовых модулей, и она знает очень мало слов.</p>
					<br>
					<p class="tblue">Сейчас доступны модули:<br><span class="tred">приветствие</span>, <span class="tred">расписание</span> и <span class="tred">математический модуль</span>.</p>
					<br><br>
					<input class="trig_page last_page" type="button" value="<<" onClick="LastPage();">
					<input class="trig_page next_page" type="button" value=">>" onClick="NextPage();">
				</div>
				<div class="page" id="page7">
					<p class="tgreen">Приветствие</p>
					<br>
					<p class="tblue">Вы можете поздороваться с Алиской короткой командой <span class="tred">"привет, Алиса"</span> или же просто <span class="tred">"привет"</span>, но Алиса любит, когда обращаются к ней ласково :)</p>
					<br><br>
					<input class="trig_page last_page" type="button" value="<<" onClick="LastPage();">
					<input class="trig_page next_page" type="button" value=">>" onClick="NextPage();">
				</div>
				<div class="page" id="page8">
					<p class="tgreen">Расписание</p>
					<br>
					<p class="tblue">Вы можете спросить у Алисы расписание командой <span class="tred">"Скажи расписание 11 Ф"</span> или <span class="tred">"Расписание 11ф"</span>, но расписание пока доступно только для 11 Ф класса.</p>
					<br><br>
					<input class="trig_page last_page" type="button" value="<<" onClick="LastPage();">
					<input class="trig_page next_page" type="button" value=">>" onClick="NextPage();">
				</div>
				<div class="page" id="page9">
					<p class="tgreen">Математический модуль</p>
					<br>
					<p class="tblue">Если у вас нет под рукой калькулятора, то можно попросить Алису решить какой-то пример командой <span class="tred">"Реши 2*(2+3)"</span> или же просто <span class="tred">"Вычисли 2+2"</span>, она неплохо умеет считать.</p>
					<br><br>
					<input class="trig_page last_page" type="button" value="<<" onClick="LastPage();">
					<input class="trig_page next_page" type="button" value=">>" onClick="NextPage();">
				</div>
				<div class="page" id="page10">
					<p class="torange">Также вы можете посетить страницу нашего тестового анализатора вводимых слов и посмотреть, как Алиса распознает слова. Для этого нажмите на кнопочку <span class="tgreen">[T]</span> на основной форме.</p>
					<br><br>
					<input class="trig_page last_page" type="button" value="<<" onClick="LastPage();">
					<input class="trig_page next_page" type="button" value=">>" onClick="NextPage();">
				</div>
				<div class="page" id="page11">
					<p class="tblue">На данный момент это все, что есть в бета-версии, но наши разработчики уже готовят внедрение новых функций! Узнайте больше о проекте <span class="tgreen">Алисизация</span> на:<br><br><a href="http://alicization.tk/" target="_blank"><center><span class="tred" style="text-decoration: underline;">сайте проекта</span></center></a></p>
					<br><br>
					<input class="trig_page last_page" type="button" value="<<" onClick="LastPage();">
				</div>
			</div>
 		</div>
 	', $username);

?>