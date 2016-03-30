<?php
	
	function Module($num, $cmd) {
		global $SYSTEM;
		global $PATH_TO;
		return "<pre>".
		       "SYSTEM['name']    = ".$SYSTEM['name']."<br>".
		       "SYSTEM['version'] = ".$SYSTEM['version']."<br>".
		       "SYSTEM['postfix'] = ".$SYSTEM['postfix']."<br>".
		       "<br>".
		       "SYSTEM['autht']   = ".(($SYSTEM['autht'])?'true':'false')."<br>".
		       "SYSTEM['quest']   = ".(($SYSTEM['quest'])?'true':'false')."<br>".
		       "SYSTEM['tlink']   = ".(($SYSTEM['tlink'])?'true':'false')."<br>".
		       "<br>".
		       "SYSTEM['debug']   = ".(($SYSTEM['debug'])?'true':'false')."<br>".
		       "SYSTEM['extlib']  = ".(($SYSTEM['extlib'])?'true':'false')."<br>".
		       "SYSTEM['savedat'] = ".(($SYSTEM['savedat'])?'true':'false')."<br>".
		       "SYSTEM['autoedu'] = ".(($SYSTEM['autoedu'])?'true':'false')."<br>".
		       "<br>".
		       "SYSTEM['metrika'] = ".(($SYSTEM['metrika'])?'true':'false')."<br>".
		       "SYSTEM['mwidget'] = ".(($SYSTEM['mwidget'])?'true':'false')."<br>".
		       "<br>".
		       "PATH_TO['doit']   = ".$PATH_TO['doit']."<br>".
		       "</pre>";
	}
	
?>