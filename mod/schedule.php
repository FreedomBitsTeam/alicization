<?php
	
	function Module($num, $cmd) {
		global $db;
		if (!(stripos($cmd, "11А") === false)) {
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