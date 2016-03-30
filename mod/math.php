<?php
	
	function matheval($equation) 
   { 
     $equation = preg_replace("/[^0-9+\-.*\/()%]/","",$equation); 
     $equation = preg_replace("/([+-])([0-9]{1})(%)/","*(1\$1.0\$2)",$equation); 
     $equation = preg_replace("/([+-])([0-9]+)(%)/","*(1\$1.\$2)",$equation); 
     $equation = preg_replace("/([0-9]+)(%)/",".\$1",$equation); 
     if ( $equation == "" ) 
     { 
       $return = 0; 
     } 
     else 
     { 
        @eval("\$return=" . $equation . ";" );
     } 
     return $return; 
   }
	
	function Module($num, $cmd) {
		return matheval($cmd);
	}
	
?>