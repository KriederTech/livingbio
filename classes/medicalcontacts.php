<?php

class MedicalContacts
{
    private $MedicalContact;
    private $HospitalContact;
    private $userId;

    public function __construct($MedicalContact, $HospitalContact, $userId)
    {
        $this->MedicalContact = $MedicalContact;
        $this->HospitalContact = $HospitalContact;
        $this->userId = $userId;
    }

    public function getMedicalContact()
    {
        return $this->MedicalContact;
    }

    public function getHospitalContact()
    {
        return $this->HospitalContact;
    }

    public function getUserId()
    {
        return $this->userId;
    }
}

class MedicalContact
{
    private $first_name;
    private $last_name;
    private $doctor_type;
    private $doctor_id;
    private $address;

    public function __construct($first_name, $last_name, $doctor_type, $doctor_id, $address)
    {
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->doctor_type = $doctor_type;
        $this->doctor_id = $doctor_id;
        $this->address = $address;
    }

    public function getFirst_name()
    {
        return $this->first_name;
    }

    public function getLast_name()
    {
        return $this->last_name;
    }

    public function getDoctor_type()
    {
        return $this->doctor_type;
    }

    public function getDoctor_id()
    {
        return $this->doctor_id;
    }

    public function getAddress()
    {
        return $this->address;
    }
}

class HospitalContact
{
    private $hospital_type;
    private $hospital_name;
    private $hospital_id;
    private $address;

    public function __construct($hospital_type, $hospital_name, $hospital_id, $address)
    {
        $this->hospital_type = $hospital_type;
        $this->hospital_name = $hospital_name;
        $this->hospital_id = $hospital_id;
        $this->address = $address;
    }

    public function getHospital_type()
    {
        return $this->hospital_type;
    }

    public function getHospital_name()
    {
        return $this->hospital_name;
    }

    public function getHospital_id()
    {
        return $this->hospital_id;
    }

    public function getAddress()
    {
        return $this->address;
    }
}

class Address
{
    private $address1;
    private $address2;
    private $city;
    private $state;
    private $zipCode;
    private $phone;

    public function __construct($address1, $address2, $city, $state, $zipCode, $phone)
    {
        $this->address1 = $address1;
        $this->address2 = $address2;
        $this->city = $city;
        $this->state = $state;
        $this->zipCode = $zipCode;
        $this->phone = $phone;
    }

    public function getAddress1()
    {
        return $this->address1;
    }

    public function getAddress2()
    {
        return $this->address2;
    }

    public function getCity()
    {
        return $this->city;
    }

    public function getState()
    {
        return $this->state;
    }

    public function getZipCode()
    {
        return $this->zipCode;
    }

    public function getPhone()
    {
        return $this->phone;
    }
}
?>
