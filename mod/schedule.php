<?php
	
	function Module($num, $cmd) {
		global $db;
		$cmd = mb_convert_case($cmd, MB_CASE_LOWER, "utf8");
		if (!(stripos($cmd, "11а") === false && stripos($cmd, "11 а") === false && stripos($cmd, "11 \"а\"") === false)) {
			$sql = "select * from schedules s,classes c, lessons l, teachers t, rooms r where s.class='1' and s.lesson=l.id and s.class=c.id and s.teacher=t.id and s.room=r.id order by nday, nles";
			$res = $db->query($sql);
			$table = "<br><table>";
			while ($row = mysqli_fetch_array($res))
			{
				$table .= "<tr><td>".$row['lesson_s']."</td><td>(".$row['teacher_s'].")</td><td>".$row['room_s']."</td></tr>";
			}
			$table .= "</table>";
			return $table;
		} else {
			return "<br>У меня нет данных по этому классу, извините";
		}
		return "";
	}
	
?>