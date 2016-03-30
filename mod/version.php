<?php
	
	function Module($num, $cmd) {
		global $SYSTEM;
		return $SYSTEM['version']." ".$SYSTEM['postfix']." (".$SYSTEM['name'].")";
	}
	
?>