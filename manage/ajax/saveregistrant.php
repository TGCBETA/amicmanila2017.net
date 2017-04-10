<?php

require_once("../loader.php");
	
if (!isset($_SESSION['user'])) 
{ 
	echo 'nosession'; // think about user feedback, "your session timed out" ... index.php?action=session_timeout
	exit; // <= IMPORTANT !!!
}


$id = 0;
$ispaid = 0;
$isvoid = 0;