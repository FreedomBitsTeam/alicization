<?php
	//--------------------------------------------------------
	if (!include('../etc/config.php')) {
		$DB["host"] = "localhost";
		$DB["user"] = "admin";
		$DB["pswd"] = "qwerty";
		$DB["dbnm"] = "alicization";
	}
	//--------------------------------------------------------
	function ConnectDB()
	{
		global $DB;
		$mysqli = new mysqli($DB["host"], 
												 $DB["user"], 
												 $DB["pswd"], 
												 $DB["dbnm"] );
		return $mysqli;
	}
	//--------------------------------------------------------
?>