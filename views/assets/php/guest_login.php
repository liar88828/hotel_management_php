<?php

function getSessionGuest()
{
    $session = $_SESSION['guestLogin'];
    if (empty($session)) {
        header("Location: /auth/login");
    }
    return $session;
}

function checkSessionGuest()
{

    if (empty($_SESSION['guestLogin'])) {
        return false;
    } else {
        return $_SESSION['guestLogin'];
}
}