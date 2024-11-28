<?php
require_once '../controller.php';

if (!isAuthorized()) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        UserAction::SignIn();
    }
}
else{
    header('Location: welcome.php');
    exit();
}

?>