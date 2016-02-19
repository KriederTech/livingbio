<?php
require_once(dirname(__FILE__).'/../properties/constants.php');
require_once(dirname(__FILE__).'/../classes/GetUserRequest.php');
require_once(dirname(__FILE__).'/../classes/UpdateUserResponse.php');
require_once(dirname(__FILE__).'/../classes/userrequest.php');
require_once(dirname(__FILE__).'/../classes/userresponse.php');

class UserProfileDB
{
    public static function getUserProfile($userid)
    {
        $input = new GetUserRequest($userid);

        $client = new SOAPClient(LOGIN_WSDL, array('cache_wsdl' => WSDL_CACHE_NONE));
        $response = $client->GetUserProfile($input);

        $output = self::convertUserProfile($response);

        return $output;
    }

    public static function updateUserProfile($userId, $username, $usertype, $address, $city, $country, $province,
                                             $firsName, $lastName, $height, $weight, $age, $phonenumber, $email, $website, $birthdate, $gender)
    {
        $input = self::loadUserProfile('Update', $userId, $username, $usertype, $address, $city, $country, $province,
                                       $firsName, $lastName, $height, $weight, $age, $phonenumber, $email, $website, $birthdate, $gender);

        $client = new SOAPClient(LOGIN_WSDL, array('cache_wsdl' => WSDL_CACHE_NONE));
        $response = $client->updateUserProfile($input);

        $output = new UpdateUserResponse($response->response);

        return $output;
    }

    private static function loadUserProfile($type, $userId, $username, $usertype, $address, $city, $country, $province,
                                            $firsName, $lastName, $height, $weight, $age, $phonenumber, $email, $website, $birthdate, $gender)
    {
        $addressinfo = new addressinfoRequest($address, $city, $country, $province);

        $personalinfo = new personalinfoRequest($firsName, $lastName, $height, $weight, $age, $phonenumber, $email, $website, $birthdate, $gender);

        $output = null;
        if ($type == 'Update')
        {
            $output = new UserRequest($username, $usertype, null, $addressinfo, $personalinfo, $userId);
        }

        return $output;
    }

    private static function convertUserProfile($input)
    {
        $accountexpired = $input->accountinfo->accountexpired;
        $accountlocked = $input->accountinfo->accountlocked;
        $credentialsexpired = $input->accountinfo->credentialsexpired;
        $accountenabled = $input->accountinfo->accountenabled;
        $accountid = $input->accountinfo->accountid;

        $accountinfo = new accountinfoResponse($accountexpired, $accountlocked, $credentialsexpired, $accountenabled, $accountid);

        $address = $input->addressinfo->address;
        $city = $input->addressinfo->city;
        $country = $input->addressinfo->country;
        $province = $input->addressinfo->province;

        $addressinfo = new addressinfoResponse($address, $city, $country, $province);

        $firsName = $input->personalinfo->firsName;
        $lastName = $input->personalinfo->lastName;
        $height = $input->personalinfo->height;
        $weight = $input->personalinfo->weight;
        $age = $input->personalinfo->age;
        $phonenumber = $input->personalinfo->phonenumber;
        $email = $input->personalinfo->email;
        $website = $input->personalinfo->website;
        $birthdate = $input->personalinfo->birthdate;
        $gender = $input->personalinfo->gender;

        $personalinfo = new personalinfoResponse($firsName, $lastName, $height, $weight, $age, $phonenumber, $email, $website, $birthdate, $gender);

        $username = $input->username;
        $type = $input->type;
        $userId = $input->userId;

        $output = new UserResponse($username, $type, $accountinfo, $addressinfo, $personalinfo, $userId);

        return $output;
    }
}
?>
