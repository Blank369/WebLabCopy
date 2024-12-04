<?php

function sanitizeHTML($str) : string
{
    $str = stripslashes($str);
    $str = strip_tags($str);
    $str = htmlentities($str);

    return $str;
}

function sanitizeMySQL($str, $pdo) : string
{
    $str = $pdo->quote($str);
    $str = sanitizeHTML($str);

    return $str;
}

?>