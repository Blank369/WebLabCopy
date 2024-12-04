<?php
require_once '../controller.php';

if (isAuthorized()) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        UserAction::addGood();
    }
}
else{
    header('Location: ../templates/loginForm.php');
    exit();
}

?>