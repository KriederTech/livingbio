<?php

class MedicalConditions
{
    private $MedicalCondition;
    private $userId;

    public function __construct($MedicalCondition, $userId)
    {
        $this->MedicalCondition = $MedicalCondition;
        $this->userId = $userId;
    }

    public function getMedicalCondition()
    {
        return $this->MedicalCondition;
    }

    public function getUserId()
    {
        return $this->userId;
    }
}

class MedicalCondition
{
    private $condition;
    private $status;
    private $onset;
    private $details;
    private $id;

    public function __construct($condition, $status, $onset, $details, $id)
    {
        $this->condition = $condition;
        $this->status = $status;
        $this->onset = $onset;
        $this->details = $details;
        $this->id = $id;
    }

    public function getCondition()
    {
        return $this->condition;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function getOnset()
    {
        return $this->onset;
    }

    public function getDetails()
    {
        return $this->details;
    }

    public function getId()
    {
        return $this->id;
    }
}
?>
