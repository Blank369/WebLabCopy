<?php

function showMes()
{
    if (isset($_SESSION['message'])) {
        echo $_SESSION['message'];
        $_SESSION['message'] = null;
    }
}