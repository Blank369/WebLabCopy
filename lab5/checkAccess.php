<?php
function isAuthorized() : bool
{
    return isset($_SESSION['auth']);
}
?>