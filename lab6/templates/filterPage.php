<?php
require_once '../controller.php';
require_once 'head.php';
if (isAuthorized()) {
    require_once 'filterForm.php';
    require_once 'filterTable.php';
}
else{
    header('Location: loginForm.php');
    exit();
}

require_once 'footer.html';
?>
