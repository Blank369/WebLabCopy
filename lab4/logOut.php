<?php
	include 'sessionStart.php';
	session_destroy(); // Уничтожаем сессию
	header("Location: header.php"); // Перенаправляем на форму входа
	exit();
?>