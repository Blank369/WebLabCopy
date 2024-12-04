<?php
require_once '../controller.php';

if (isAuthorized()) {
    if (isset($_POST['delete_submit'])) {
        UserAction::deleteGood();

    }
}
else{
    header('Location: ../templates/loginForm.php');
    exit();
}

?>