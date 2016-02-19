<?php

class MedicalRecords
{
    public $MedicalRecord;
    public $userId;

    public function __construct($MedicalRecord, $userId)
    {
        $this->MedicalRecord = $MedicalRecord;
        $this->userId = $userId;
    }

    public function getMedicalRecord()
    {
        return $this->MedicalRecord;
    }

    public function getUserId()
    {
        return $this->userId;
    }
}
class MedicalRecord
{
    public $document;
    public $doc_id;
    public $doc_name;
    public $doc_date;
    public $doc_caption;

    public function __construct($document, $doc_id, $doc_name, $doc_date, $doc_caption)
    {
        $this->document = $document;
        $this->doc_id = $doc_id;
        $this->doc_name = $doc_name;
        $this->doc_date = $doc_date;
        $this->doc_caption = $doc_caption;
    }

    public function getDocument()
    {
        return $this->document;
    }

    public function getDoc_id()
    {
        return $this->doc_id;
    }

    public function getDoc_name()
    {
        return $this->doc_name;
    }

    public function getDoc_date()
    {
        return $this->doc_date;
    }

    public function getDoc_caption()
    {
        return $this->doc_caption;
    }
}
?>
