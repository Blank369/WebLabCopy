<?php
require_once '../controller.php';
//echo "<pre>"; print_r($_POST); echo "</pre>";
if (isAuthorized()) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
       // echo "<pre>"; print_r($_FILES); echo "</pre>";
        //addPic($_FILES['input_pic']);
        UserAction::addGood();
    }
}
else{
    header('Location: ../templates/loginForm.php');
    exit();
}


?>