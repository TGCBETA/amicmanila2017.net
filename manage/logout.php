<?php 
$done="login.php";
session_start(); 
session_destroy();
header('Location: '.$done);
?>