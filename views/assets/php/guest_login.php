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
    return  $_SESSION['guestLogin'];
}