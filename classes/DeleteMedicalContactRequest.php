<?php

class DeleteMedicalContactRequest
{
    private $MedicalContacts;

    public function __construct($MedicalContacts)
    {
        $this->MedicalContacts = $MedicalContacts;
    }
}
?>
