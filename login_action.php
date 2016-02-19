<?php
require_once(dirname(__FILE__).'/properties/constants.php');
require_once(dirname(__FILE__).'/db/loginDB.php');
require_once(dirname(__FILE__).'/util/session.php');
require_once(dirname(__FILE__).'/util/utils.php');

session_start();
$username = null;
if (isset($_REQUEST['username']))
{
    $username = clean_input($_REQUEST['username']);
    $_SESSION['username'] = $username;
}

$password = null;
if (isset($_REQUEST['password']))
{
    $password = clean_input($_REQUEST['password']);
    $_SESSION['password'] = $password;
}

$response = LoginDB::passwordAuthenticate($username, $password);
$userid = $response->getUserid();
$status = $response->getStatus();
$usersessionid = mt_rand();

if ($status == "A")
{
    login($userid, $usersessionid);

    header('Location: pages/home.php');
    include('pages/home.php');
    return;
}
else if ($status == "T")
{
    header('Location: change_password.php');
    include('change_password.php');
    return;
}
else
{
    logout();

    header('Location: index.php?error=2');
    include('index.php');
    return;
}

?>
