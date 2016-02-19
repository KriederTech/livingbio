<?php
require_once(dirname(__FILE__).'/../loginDB.php');

if ($argc == 2)
{
    $function = $argv[1];

    $username = 'ecgero@comcast.net';
    $password = 'XLhiggs61';

    if ($function == 'passwordAuthenticate')
    {
        $output = LoginDB::passwordAuthenticate($username, $password);
        print_r($output);
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
