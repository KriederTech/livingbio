<?php

class InsertMedicalRecordRequest
{
    public $MedicalRecords;

    public function __construct($MedicalRecords)
    {
        $this->MedicalRecords = $MedicalRecords;
    }
}
?>
