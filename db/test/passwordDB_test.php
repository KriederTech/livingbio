<?php
require_once(dirname(__FILE__).'/../passwordDB.php');

if ($argc == 2 || $argc == 3)
{
    $function = $argv[1];

    $username = 'ecgero@comcast.net';

    if ($function == 'resetPassword')
    {
        $output = PasswordDB::resetPassword($username);
        $email = $output->getEmail();
        echo($email."\n");
    }
    else if ($function == 'changePassword')
    {
        if ($argc == 3)
        {
            $password = 'XLhiggs61';
            $tmp_password = $argv[2];

            $output = PasswordDB::changePassword($username, $password, $tmp_password);
        }
        else
        {
            echo("ChangePassword requires 3 parameters\n");
        }
    }
    else
    {
        echo("Unknown function\n");
    }
}
else
{
    echo("test.php <Function>\n");
}
?>
