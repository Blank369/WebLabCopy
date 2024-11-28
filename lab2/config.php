<?php
// Настройки подключения
$host = 'localhost'; // Адрес сервера
$db_name = 'electronics'; // Имя базы данных
$username = 'root'; // Имя пользователя (по умолчанию 'root' в XAMPP)
$password = ''; // Пароль (по умолчанию пусто)

// Создание подключения
$conn = new mysqli($host, $username, $password, $db_name);

// Проверка соединения
if ($conn->connect_error) {
    die("Ошибка подключения: " . $conn->connect_error);
}

?>