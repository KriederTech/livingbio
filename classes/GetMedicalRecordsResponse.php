<?php

class GetMedicalRecordsResponse
{
    private $MedicalRecords;

    public function __construct($MedicalRecords)
    {
        $this->MedicalRecords = $MedicalRecords;
    }

    public function getMedicalRecords()
    {
        return $this->MedicalRecords;
    }
}
?>
