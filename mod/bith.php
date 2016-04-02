<?php
	
	function Module($num, $cmd) {
		global $SYSTEM;
		$dateofbith = new DateTime($SYSTEM['birthday']);
		$currentday = new DateTime("now");
		$interval = $dateofbith->diff($currentday);
		return "<br>Мне всего ".$interval->format('%a дней.');
	}
	
?>