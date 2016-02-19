<?php
require_once(dirname(__FILE__).'/../properties/constants.php');

function login($userid, $usersessionid)
{
    logout();  // paranoia
    session_cache_limiter('nocache');
    session_start();
    $_SESSION[AUTHENTICATED] = $usersessionid;
    $_SESSION[LAST_ACTIVITY] = time();
    $_SESSION[EXPIRE_TIME] = 15 * 60;
    $_SESSION[USERID] = $userid;
    return;

}  // login

function isLoggedIn()
{
    session_cache_limiter('nocache');
    if (!isset($_SESSION))  // Get rid of annoying notice
    {
        session_start();
    }

    $flag = isset($_SESSION[AUTHENTICATED]);

    if ($flag)
    {
        if ($_SESSION[LAST_ACTIVITY] < (time() - $_SESSION[EXPIRE_TIME]))
        {
            $flag = false;
        }
        else
        {
            $_SESSION[LAST_ACTIVITY] = time();
        }
    }

    return $flag;
}  // isLoggedIn

function logout()
{
    session_start();
    $_SESSION[AUTHENTICATED] = NULL;
    $_SESSION[LAST_ACTIVITY] = NULL;
    $_SESSION[EXPIRE_TIME] = NULL;
    $_SESSION[USERID] = NULL;
    session_unset();
    session_destroy();
    session_regenerate_id(TRUE);
    return;
}  // logout 
?>
