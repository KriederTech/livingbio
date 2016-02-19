<?php
require_once(dirname(__FILE__).'/properties/constants.php');
require_once(dirname(__FILE__).'/db/passwordDB.php');
require_once(dirname(__FILE__).'/db/loginDB.php');
require_once(dirname(__FILE__).'/util/session.php');
require_once(dirname(__FILE__).'/util/utils.php');

session_start();

$username = null;
if (isset($_SESSION['username']))
{
    $username = clean_input($_SESSION['username']);
}

$tmp_password = null;
if (isset($_SESSION['password']))
{
    $tmp_password = clean_input($_SESSION['password']);
}

$password = null;
if (isset($_REQUEST['password']))
{
    $password = clean_input($_REQUEST['password']);
}

$output = PasswordDB::changePassword($username, $password, $tmp_password);
$response = $output->getResponse();

if ($response == "Success")
{
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
    else
    {
        header('Location: change_password.php');
        include('change_password');
        return;
    }
}
else
{
    header('Location: change_password.php');
    include('change_password');
    return;
}

?>
