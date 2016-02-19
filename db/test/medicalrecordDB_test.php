<?php
require_once(dirname(__FILE__).'/../medicalrecordDB.php');

if ($argc == 2)
{
    $function = $argv[1];

    $userid = 2;

    if ($function == 'getMedicalRecords')
    {
        $output = MedicalRecordDB::getMedicalRecords($userid);
        print_r($output);
    }
    else if ($function == 'insertMedicalRecord')
    {
        $doc_file = "/var/www/piglet/ecgtest/DrIDMe4/pages/img/add.png";
        $doc_name = "Name of Document";
        $doc_caption = "Caption";

        $output = MedicalRecordDB::insertMedicalRecord($userid, $doc_file, $doc_name, $doc_caption);
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
