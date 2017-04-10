<?php
include(dirname(__FILE__) . "/../class/connect.php");
include(dirname(__FILE__) . "/../class/app_config.php");
require_once(dirname(__FILE__) . "/../class/utility_functions.php");
require_once(dirname(__FILE__) . "/../class/Log.php");
require_once(dirname(__FILE__) . "/../class/class.phpmailer.php");
require_once(dirname(__FILE__) . "/dompdf_config.inc.php");
require_once(dirname(__FILE__) . "/../class/Activity.php");


session_start();

$session_timeout = 20 * 60;

if (!isset($_SESSION['last_visit'])) { $_SESSION['last_visit'] = time(); } // I like brackets!

if((time() - $_SESSION['last_visit']) > $session_timeout) { 
  session_destroy(); 
  header("Location: " . $_SERVER["REQUEST_URI"]); // think about user feedback, "your session timed out" ... index.php?action=session_timeout
  exit; // <= IMPORTANT !!!
}


$_SESSION['last_visit'] = time();

/*
if($_SERVER["HTTPS"] != "on")
{
    header("Location: https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]);
    exit();
}
*/
?>
