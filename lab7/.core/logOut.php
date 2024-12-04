<?php
	require_once 'sessionStart.php';
	session_destroy(); 
	header("Location: ../templates/welcome.php");
	exit();
?>