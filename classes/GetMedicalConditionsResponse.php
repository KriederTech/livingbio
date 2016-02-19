<?php

class GetMedicalConditionsResponse
{
    private $MedicalConditions;

    public function __construct($MedicalConditions)
    {
        $this->MedicalConditions = $MedicalConditions;
    }

    public function getMedicalConditions()
    {
        return $this->MedicalConditions;
    }
}
?>
