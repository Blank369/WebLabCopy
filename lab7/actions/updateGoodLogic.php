<?php
require_once '../controller.php';

if (isAuthorized()) {
    if (isset($_POST['update_submit'])) {
        UserAction::updateGood();

    }
}
else{
    header('Location: ../templates/loginForm.php');
    exit();
}

?>