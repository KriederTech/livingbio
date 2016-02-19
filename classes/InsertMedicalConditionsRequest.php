<?php

class InsertMedicalConditionRequest
{
    private $MedicalConditions;

    public function __construct($MedicalConditions)
    {
        $this->MedicalConditions = $MedicalConditions;
    }
}
?>
