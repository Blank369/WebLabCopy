<?php
require_once 'head.php';
require_once 'carousel.html';
if (isset($_SESSION['auth'])) {
    require_once 'filterPage.php';
}
require_once 'footer.html';
?>