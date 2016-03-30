
<?php 

	require_once 'weather.php';
	
	$city = 'Москва';
	$w_city_id = 27612;
	// Идентификатор города (в нашем случае Москва)  - можно узнать по адресу http://weather.yandex.ru/static/cities.xml

	$col = 9;
	// количество дней, на сколько нужен прогноз

	$day_of_the_week_array = array( 1 => 'понедельник', 2 => 'вторник', 3 => 'среда', 4 => 'четверг', 5 => 'пятница', 6 => 'суббота', 7 => 'воскресенье' ); // Массив дней недели (для вывода)

	$time_of_day = array( 0 => 'утро', 1 => 'день', 2 => 'вечер', 3 => 'ночь' ); // Массив времени суток (для вывода)

	$out = get_weather($w_city_id, $col, $day_of_the_week_array, $time_of_day)  ;
	
	$res = '<link rel="stylesheet" type="text/css" href="../../css/weather.css">';
	
	foreach ($out as $key => $value) {
		$res .= '<div class="weather">';
		$res .= '<div class="day-title">'.$city.' '.$value['day'] . '.' . $value['month'] . '.' . $value['year'] . ' (' . $value['day_of_week'] . ')</div>';
		if ($value['day'] == date('j') && $value['month'] == date('n')) {	
			$res .= '<div class="now-weather"><p style="padding: 2px 0 2px 0; font-weight: bold;">сегодня</p><hr>';
			$res .= '<img class="now-image" src="http://yandex.st/weather/1.1.78/i/icons/48x48/' . $value['image'] . '.png" width="48" height="48">';
			$res .= '<div class="now-text"><p> восход: '.$value['sunrise'].' закат: '.$value['sunset'].'</p><p>'.$value['temp'].'°C, '.$value['pressure'].' мм рт. ст., '.$value['humidity'].'%</p></div>';
			$res .= '</div><div style="clear:both;"></div><hr><br>';		
		} else {
			$res .= '<br>';
		}
		foreach ($value['weather'] as $key1 => $value1) {
			$res .= '<div class="day-part">';
			$res .= $value1['time_of_day'].'<br>';
			$res .= '<img src="http://yandex.st/weather/1.1.78/i/icons/48x48/' . $value1['image'] . '.png" width="48" height="48"><br>';
			$res .= $value1['temp_from'] . " ... " . $value1['temp_to'].'<br>';
			$res .= $value1['windspd'].' м/с<br>['.$value1['winddir'].']<br>';
			$res .= $value1['humidity'].'% '.'<br><br>';
			$res .= '</div>';
		} 
		$res .= '</div>';
	} 
	
	echo $res;
	
?>