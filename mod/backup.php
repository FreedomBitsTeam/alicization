<?php
	
	function Module($num, $cmd) {
		global $DB;
		return '<br><a download href="php/'.backup_database_tables($DB["host"], $DB["user"], $DB["pswd"], $DB["dbnm"], '*').'">DataBase SQL-dump</a>';
	}
	
?>