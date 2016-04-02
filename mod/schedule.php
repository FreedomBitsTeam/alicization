<?php
	
	function Module($num, $cmd) {
		global $db;
		global $SYSTEM;
		$cmd = mb_convert_case($cmd, MB_CASE_LOWER, "utf8");
		if (!(stripos($cmd, "11а") === false && stripos($cmd, "11 а") === false && stripos($cmd, "11 \"а\"") === false)) {
			$day = date("w");
			//$day = 1;
			//========================================================================
			if (!(stripos($cmd, "-пн") === false) || !(stripos($cmd, "понедельник") === false)) $day = 1;
			if (!(stripos($cmd, "-вт") === false) || !(stripos($cmd, "вторник") === false)) $day = 2;
			if (!(stripos($cmd, "-ср") === false) || !(stripos($cmd, "сред") === false)) $day = 3;
			if (!(stripos($cmd, "-чт") === false) || !(stripos($cmd, "четверг") === false)) $day = 4;
			if (!(stripos($cmd, "-пт") === false) || !(stripos($cmd, "пятниц") === false)) $day = 5;
			//========================================================================
			if (!(stripos($cmd, "позавчера") === false)) $day -= 2;
			else if (!(stripos($cmd, "вчера") === false)) $day -= 1;
			if (!(stripos($cmd, "послезавтра") === false)) $day += 2;
			else if (!(stripos($cmd, "завтра") === false)) $day += 1;
			if ($day == 6 || $day == 0 || $day == -1 || $day == 7 || $day == 8) $day = 1;
			if ($day == -2) $day = 5;
			//========================================================================
			$sql = "select * from schedules s, classes c, lessons l, teachers t, rooms r where s.class='1' and s.lesson=l.id and s.class=c.id and s.teacher=t.id and s.room=r.id and nday='".$day."' and `group`=1 order by nles";
			$res = $db->query($sql);
			$day_of_the_week_array = array( 1 => 'понедельник', 2 => 'вторник', 3 => 'среда', 4 => 'четверг', 5 => 'пятница', 6 => 'суббота', 0 => 'воскресенье' ); // Массив дней недели (для вывода)
			$table = "<br> = ".$day_of_the_week_array[$day]." = <br><table>";
			$i = 0;
			while ($row = mysqli_fetch_array($res))
			{
				$i++;
				switch ($SYSTEM['schedule']) {
					case 1:
						$table .= "<tr><td>".$i.":&nbsp;&nbsp;</td><td>".$row['lesson_s']."</td></tr>";
						break;
					case 2:
						$table .= "<tr><td>".$i.":&nbsp;&nbsp;</td><td>".$row['lesson_s']."</td><td>(".$row['teacher_s'].")</td></tr>";
						break;
					default:
						$table .= "<tr><td>".$i.":&nbsp;&nbsp;</td><td>".$row['lesson_s']."</td><td>(".$row['teacher_s'].")</td><td>".$row['room_s']."</td></tr>";		
				}
			}
			$table .= "</table>";
			return $table;
		} else {
			return "<br>Введите корректно номер и букву класса, например: 11 A";
		}
		return "";
	}
	
?>