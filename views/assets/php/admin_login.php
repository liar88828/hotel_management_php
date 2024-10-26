<?php

function getSessionAdmin()
{
    $session = $_SESSION['adminLogin'];
    if (empty($session)) {
        header("Location: /");
    }
    return $session;
}

function checkSessionAdmin()
{

    if (empty($_SESSION['adminLogin'])) {
        return false;
    } else {
        return $_SESSION['adminLogin'];
}
}