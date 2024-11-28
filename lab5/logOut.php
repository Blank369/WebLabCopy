<?php
	require_once 'sessionStart.php';
	session_destroy(); 
	header("Location: welcome.php"); 
	exit();
?>