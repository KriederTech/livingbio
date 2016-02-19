<?php

class GetMedicalContactsResponse
{
    private $MedicalContacts;

    public function __construct($MedicalContacts)
    {
        $this->MedicalContacts = $MedicalContacts;
    }

    public function getMedicalContacts()
    {
        return $this->MedicalContacts;
    }
}
?>
