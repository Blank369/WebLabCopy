<?php

if (!($_SESSION['auth'])) {
    header('Location: authorizationForm.php');
    exit();
}

$image = htmlspecialchars($_GET['image']);

$path = 'pic/goods/' . $image;

if (file_exists($path)) {
    header('Content-Type: image/webp'); // Или другой тип в зависимости от вашего изображения
    readfile($path);
    exit();
} else {
    // Если файл не найден
    http_response_code(404);
    echo 'Изображение не найдено.';
}

?>