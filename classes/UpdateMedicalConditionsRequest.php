<?php

class UpdateMedicalConditionRequest
{
    private $MedicalConditions;

    public function __construct($MedicalConditions)
    {
        $this->MedicalConditions = $MedicalConditions;
    }
}
?>
