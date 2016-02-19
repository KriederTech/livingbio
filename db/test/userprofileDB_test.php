<?php
require_once(dirname(__FILE__).'/../userprofileDB.php');

if ($argc == 2)
{
    $function = $argv[1];

    $userid = 4;

    if ($function == 'getUserProfile')
    {
        $output = UserProfileDB::getUserProfile($userid);
        print_r($output);
    }
    else if ($function == 'updateUserProfile')
    {
        $userid = 6;
        $username = 'jdoe@emailxl.com';
        $usertype = 'user';

        $address = "123 Erewhon St";
        $city = "Chicago";
        $country = "USA";
        $province = "Illinois";

        $firsName = "John";
        $lastName = "Doe";
        $height = "6";
        $weight = "200";
        $gender = "Male";
        $birthdate = "1980-01-01";
        $age = "";
        $phonenumber = "5555555555";
        $email = "jdoe@emailxl.com";
        $website = "";

        $output = UserProfileDB::updateUserProfile($userid, $username, $usertype, $address, $city, $country, $province,
                                                   $firsName, $lastName, $height, $weight, $gender, $birthdate, $age, $phonenumber, $email, $website);
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
