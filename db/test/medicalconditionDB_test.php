<?php
require_once(dirname(__FILE__).'/../medicalconditionDB.php');

if ($argc == 2 || $argc == 3)
{
    $function = $argv[1];

    $userId = 2;

    if ($function == 'getMedicalConditions')
    {
        $output = MedicalConditionDB::getMedicalConditions($userId);
        print_r($output);
    }
    else if ($function == 'insertMedicalCondition')
    {
        $condition = 'Hypertension';
        $status = 'Lorem ipsum dolor sit amet.';
        $onset = '1492-01-01';
        $details = 'Lorem ipsum dolor sit amet.';

        $output = MedicalConditionDB::insertMedicalCondition($userId, $condition, $status, $onset, $details);
        print_r($output);
    }
    else if ($function == 'updateMedicalCondition')
    {
        $condition = 'BLAH';
        $status = 'BLAH';
        $onset = '1066-01-01';
        $details = 'BLAH';
        $id = 3;

        $output = MedicalConditionDB::updateMedicalCondition($userId, $condition, $status, $onset, $details, $id);
        print_r($output);
    }
    else if ($function == 'deleteMedicalCondition')
    {
        $id = 3;

        $output = MedicalConditionDB::deleteMedicalCondition($userId, $id);
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
