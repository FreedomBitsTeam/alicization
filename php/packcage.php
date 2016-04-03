<?php
	//----------------------------------------------------------------------------
	$DB = array();
	if (!include('../etc/config.php')) {
		$DB["host"] = "localhost";
		$DB["user"] = "admin";
		$DB["pswd"] = "qwerty";
		$DB["dbnm"] = "alicization";
	}
	//----------------------------------------------------------------------------
	function ConnectDB()
	{
		global $DB;
		$mysqli = new mysqli($DB["host"], 
												 $DB["user"], 
												 $DB["pswd"], 
												 $DB["dbnm"] );
		$mysqli->query("SET NAMES 'utf8'");
		return $mysqli;
	}
	//----------------------------------------------------------------------------
	function backup_database_tables($host, $user, $pass, $name, $tables) {
		$link = mysqli_connect($host,$user,$pass);
		mysqli_select_db($link, $name);
		$link->query("SET NAMES 'utf8'");
		//get all of the tables
		if($tables == '*') {
			$tables = array();
			$result = $link->query('SHOW TABLES');
			while($row = mysqli_fetch_row($result)) {
				$tables[] = $row[0]; 
			}
		} else {
			$tables = is_array($tables) ? $tables : explode(',',$tables);
		}
		//cycle through each table and format the data
		$return = "";
		foreach($tables as $table) {
			$result = $link->query('SELECT * FROM '.$table);
			$num_fields = mysqli_num_fields($result);
			$return.= 'DROP TABLE '.$table.';';
			$row2 = mysqli_fetch_row($link->query('SHOW CREATE TABLE '.$table));
			$return.= "\n\n".$row2[1].";\n\n";
			for ($i = 0; $i < $num_fields; $i++) {
				while($row = mysqli_fetch_row($result)) {
					$return.= 'INSERT INTO '.$table.' VALUES(';
					for($j=0; $j < $num_fields; $j++) {
						$row[$j] = addslashes($row[$j]);
						//$row[$j] = preg_match("\n","\\n",$row[$j]);
						if (isset($row[$j])) { $return.= '"'.$row[$j].'"' ; } 
						else { $return.= '""'; }
						if ($j<($num_fields-1)) { $return.= ','; }
					}
					$return.= ");\n";
				}
			}
			$return.="\n\n\n";
		}
		//save the file
		$filename = "../bak/".$name.' ['.date("H-i-s d.m.Y",time()+(1*60*60)).'].sql';
		$handle=fopen($filename, 'w+');
		fwrite($handle,$return);
		fclose($handle);
		return $filename;
	}
	//----------------------------------------------------------------------------
?>