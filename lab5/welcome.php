<?php
require_once 'head.php';
require_once 'carousel.html';
if (isset($_SESSION['auth'])) {
    require_once 'filterTable.php';
}
require_once 'footer.html';
?>