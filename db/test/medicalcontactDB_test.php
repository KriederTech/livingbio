<?php
require_once(dirname(__FILE__).'/../medicalcontactDB.php');

if ($argc == 2 || $argc == 3)
{
    $function = $argv[1];

    $userId = 2;

    if ($function == 'getMedicalContacts')
    {
        $output = MedicalContactDB::getMedicalContacts($userId);
        print_r($output);
    }
    else if ($function == 'insertMedicalContact')
    {
        if ($argc == 3)
        {
            $first_name = "John";
            $last_name = "Galen";
            $doctor_type = "Doctor";
            $address1 = "123 Erewhon St.";
            $address2 = "Apt 456";
            $city = "Gotham";
            $state = "NY";
            $zipCode = "10004";
            $phone = "2222222222";

            $hospital_type = 'psychiatric';
            $hospital_name = 'Arkham Asylum';

            if ($argv[2] == 'M')
            {
                $output = MedicalContactDB::insertMedicalContact($userId, $first_name, $last_name, $doctor_type, null, null,
                                                                 $address1, $address2, $city, $state, $zipCode, $phone);
            }
            else if ($argv[2] = 'H')
            {
                $output = MedicalContactDB::insertMedicalContact($userId, null, null, null, null, null, $hospital_type, $hospital_name,
                                                                 $address1, $address2, $city, $state, $zipCode, $phone);
            }
            print_r($output);
        }
        else
        {
            echo("Need 2nd argument: M or H\n"); 
        }
    }
    else if ($function == 'updateMedicalContact')
    {
        if ($argc == 3)
        {
            $doctor_id = '1';
            $first_name = 'Rajit';
            $last_name = 'Binju';
            $doctor_type = 'Doctor';
            $address1 = '108 S Harvey Ave';
            $address2 = 'Apt 1W';
            $city = 'Oak Park';
            $state = 'IL';
            $zipCode = '60302';
            $phone = '7083580760';

            $hospital_id = '1';
            $hospital_type = 'general';
            $hospital_name = 'General Hospital';

            if ($argv[2] == 'M')
            {
                $output = MedicalContactDB::updateMedicalContact($userId, $first_name, $last_name, $doctor_type, $doctor_id, null, null, null,
                                                                 $address1, $address2, $city, $state, $zipCode, $phone);
            }
            else if ($argv[2] == 'H')
            {
                $output = MedicalContactDB::updateMedicalContact($userId, null, null, null, null, $hospital_type, $hospital_name, $hospital_id,
                                                                 $address1, $address2, $city, $state, $zipCode, $phone);
            }

            print_r($output);
        }
    }
    else if ($function == 'deleteMedicalContact')
    {
        if ($argc == 3)
        {
            $doctor_id = 5;
            $hospital_id = 3;

            if ($argv[2] == 'M')
            {
                $output = MedicalContactDB::deleteMedicalContact($userId, $doctor_id, null);
            }
            else if ($argv[2] == 'H')
            {
                $output = MedicalContactDB::deleteMedicalContact($userId, null, $hospital_id);
            }
            print_r($output);
        }
        else
        {
            echo("Need 2nd argument: M or H\n"); 
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
