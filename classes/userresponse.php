<?php

class UserResponse
{
    private $username;
    private $type;
    private $accountinfo;
    private $addressinfo;
    private $personalinfo;
    private $userId;

    public function __construct($username, $type, $accountinfo, $addressinfo, $personalinfo, $userId)
    {
        $this->username = $username;
        $this->type = $type;
        $this->accountinfo = $accountinfo;
        $this->addressinfo = $addressinfo;
        $this->personalinfo = $personalinfo;
        $this->userId = $userId;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getType()
    {
        return $this->type;
    }

    public function getAccountinfo()
    {
        return $this->accountinfo;
    }

    public function getAddressinfo()
    {
        return $this->addressinfo;
    }

    public function getPersonalinfo()
    {
        return $this->personalinfo;
    }

    public function getUserId()
    {
        return $this->userId;
    }
}

class accountinfoResponse
{
    private $accountexpired;
    private $accountlocked;
    private $credentialsexpired;
    private $accountenabled;
    private $accountid;

    public function __construct($accountexpired, $accountlocked, $credentialsexpired, $accountenabled, $accountid)
    {
        $this->accountexpired = $accountexpired;
        $this->accountlocked = $accountlocked;
        $this->credentialsexpired = $credentialsexpired;
        $this->accountenabled = $accountenabled;
        $this->accountid = $accountid;
    }

    public function getAccountexpired()
    {
        return $this->accountexpired;
    }

    public function getAccountlocked()
    {
        return $this->accountlocked;
    }

    public function getCredentialsexpired()
    {
        return $this->credentialsexpired;
    }

    public function getAccountenabled()
    {
        return $this->accountenabled;
    }

    public function getAccountid()
    {
        return $this->accountid;
    }
}

class addressinfoResponse
{
    private $address;
    private $city;
    private $country;
    private $province;

    public function __construct($address, $city, $country, $province)
    {
        $this->address = $address;
        $this->city = $city;
        $this->country = $country;
        $this->province = $province;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function getCity()
    {
        return $this->city;
    }

    public function getCountry()
    {
        return $this->country;
    }

    public function getProvince()
    {
        return $this->province;
    }
}

class personalinfoResponse
{
    private $firsName;
    private $lastName;
    private $height;
    private $weight;
    private $age;
    private $phonenumber;
    private $email;
    private $website;
    private $birthdate;
    private $gender;

    public function __construct($firsName, $lastName, $height, $weight, $age, $phonenumber, $email, $website, $birthdate, $gender)
    {
        $this->firsName = $firsName;
        $this->lastName = $lastName;
        $this->height = $height;
        $this->weight = $weight;
        $this->age = $age;
        $this->phonenumber = $phonenumber;
        $this->email = $email;
        $this->website = $website;
        $this->birthdate = $birthdate;
        $this->gender = $gender;
    }

    public function getFirsName()
    {
        return $this->firsName;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function getHeight()
    {
        return $this->height;
    }

    public function getWeight()
    {
        return $this->weight;
    }

    public function getAge()
    {
        return $this->age;
    }

    public function getPhonenumber()
    {
        return $this->phonenumber;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getWebsite()
    {
        return $this->website;
    }

    public function getBirthdate()
    {
        return $this->birthdate;
    }

    public function getGender()
    {
        return $this->gender;
    }
}
?>
