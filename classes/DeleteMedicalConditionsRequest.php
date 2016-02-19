<?php

class DeleteMedicalConditionRequest
{
    private $MedicalConditions;

    public function __construct($MedicalConditions)
    {
        $this->MedicalConditions = $MedicalConditions;
    }
}
?>
