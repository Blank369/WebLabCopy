<?php

require_once 'header.php';

if (!empty($_SESSION['auth'])) {
    require_once 'filterTable.php';
}

?>