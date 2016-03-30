<?php

	function get_weather ($city, $col = 10, $day_of_the_week_array = array(1 => 'пн', 2 => 'вт', 3 => 'ср', 4 => 'чт', 5 => 'пт', 6 => 'сб', 7 => 'вс'), $time_of_day = array(0 => 'утро', 1 => 'день', 2 => 'вечер', 3 => 'ночь')) {
		if ($city == "") $city = "27612";
		$data_file = 'http://export.yandex.ru/weather-ng/forecasts/'.$city.'.xml';   // Загружаем файл прогноза погоды для выбранного города
		$xml = simplexml_load_file($data_file); // загружаем xml файл через simple_xml
		if ($xml == '') $xml = simplexml_load_file('../mod/weather/'.$city.'.xml');
		else $xml->asXml('../mod/weather/'.$city.'.xml');
		$out = array(); // Массив вывода прогноза
		$counter = 0 ; // Счетчик количества дней, для которых доступен прогноз


		foreach ( $xml->day as $day )  {

    	if ($counter == $col) {break;}

   		$get_date = explode ("-" , $day['date']) ;
			$day_of_week = date("N", mktime(0, 0, 0, $get_date[1], $get_date[2], $get_date[0])) ;

  		$out[$counter]['day'] = $get_date[2] ;
  		$out[$counter]['month'] = $get_date[1] ;
			$out[$counter]['year'] = $get_date[0] ;
			$out[$counter]['day_of_week'] = $day_of_the_week_array[$day_of_week] ;
			
			$out[$counter]['temp'] = $xml->{'fact'}->{'temperature'};
			$out[$counter]['type'] = $xml->{'fact'}->{'weather_type'};
			$out[$counter]['pressure'] = $xml->{'fact'}->{'pressure'};
			$out[$counter]['windspd'] = $xml->{'fact'}->{'wind_speed'};
			$out[$counter]['winddir'] = $xml->{'fact'}->{'wind_direction'};
			$out[$counter]['humidity'] = $xml->{'fact'}->{'humidity'};
			$out[$counter]['image'] = $xml->{'fact'}->{'image-v3'};
			
			$out[$counter]['sunrise'] = $day->{'sunrise'};
			$out[$counter]['sunset'] = $day->{'sunset'};
			$out[$counter]['moonrise'] = $day->{'moonrise'};
			$out[$counter]['moonset'] = $day->{'moonset'};

   		for ($i = 0; $i <= 3; $i++) {

   			if($day->day_part[$i]->temperature == '') {

   				$get_temp_from =  $day->day_part[$i]->temperature_from;
   				$get_temp_to =  $day->day_part[$i]->temperature_to;

    		}  else {

    			$get_temp_from = (integer)$get_temp_from-1 ;
    			$get_temp_to = (integer)$get_temp_to+1 ;

    		}

    		if ($get_temp_from > 0) { $get_temp_from = '+'.$get_temp_from ; }
    		if ($get_temp_to > 0) { $get_temp_to = '+'.$get_temp_to ; }
    		$out[$counter]['weather'][$i]['temp_from'] = $get_temp_from;
    		$out[$counter]['weather'][$i]['temp_to'] = $get_temp_to;
    		$out[$counter]['weather'][$i]['image'] = $day->day_part[$i]->{'image-v3'};
    		$out[$counter]['weather'][$i]['time_of_day'] = $time_of_day[$i];			
				$out[$counter]['weather'][$i]['winddir'] = $day->day_part[$i]->{'wind_direction'};
				$out[$counter]['weather'][$i]['windspd'] = $day->day_part[$i]->{'wind_speed'};
				$out[$counter]['weather'][$i]['pressure'] = $day->day_part[$i]->{'pressure'};
				$out[$counter]['weather'][$i]['humidity'] = $day->day_part[$i]->{'humidity'};
				
			} $counter++ ;
		}


		return $out ;
	}

?>
