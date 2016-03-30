<?php
	//--------------------------------------------------------
	// GLOBAL CONSTANTS
	//--------------------------------------------------------
	$STD_HOST = "localhost";
	$STD_USER = "admin";
	$STD_PASS = "qwerty";
	$STD_DBNM = "alicization";
	//--------------------------------------------------------
	function connectDB()
	{
  	$mysqli = new mysqli($GLOBALS['STD_HOST'], 
  											 $GLOBALS['STD_USER'], 
  											 $GLOBALS['STD_PASS'], 
  											 $GLOBALS['STD_DBNM']);
  	return $mysqli;
  }
	//--------------------------------------------------------
?>