<?php
require_once(dirname(__FILE__).'/../properties/constants.php');
require_once(dirname(__FILE__).'/../classes/DeleteMedicalContactRequest.php');
require_once(dirname(__FILE__).'/../classes/DeleteMedicalContactResponse.php');
require_once(dirname(__FILE__).'/../classes/GetMedicalContacts.php');
require_once(dirname(__FILE__).'/../classes/GetMedicalContactsResponse.php');
require_once(dirname(__FILE__).'/../classes/InsertMedicalContactRequest.php');
require_once(dirname(__FILE__).'/../classes/InsertMedicalContactResponse.php');
require_once(dirname(__FILE__).'/../classes/UpdateMedicalContactRequest.php');
require_once(dirname(__FILE__).'/../classes/UpdateMedicalContactResponse.php');
require_once(dirname(__FILE__).'/../classes/medicalcontacts.php');

class MedicalContactDB
{
    public static function getMedicalContacts($userid)
    {
        $input = new GetMedicalContacts($userid);

        $client = new SOAPClient(LOGIN_WSDL, array('cache_wsdl' => WSDL_CACHE_NONE));
        $response = $client->GetMedicalContacts($input);

        $output = self::convertMedicalContact($response);

        return $output;
    }

    public static function insertMedicalContact($userId,
                                                $first_name, $last_name, $doctor_type,
                                                $hospital_type, $hospital_name,
                                                $address1, $address2, $city, $state, $zipCode, $phone)
    {
        $input = self::loadMedicalContact('Insert', $userId,
                                          $first_name, $last_name, $doctor_type, ' ',
                                          $hospital_type, $hospital_name, ' ',
                                          $address1, $address2, $city, $state, $zipCode, $phone);

        $client = new SOAPClient(LOGIN_WSDL, array('cache_wsdl' => WSDL_CACHE_NONE));
        $response = $client->InsertMedicalContact($input);

        $output = new InsertMedicalContactResponse($response->response);

        return $output;
    }

    public static function updateMedicalContact($userId,
                                                $first_name, $last_name, $doctor_type, $doctor_id,
                                                $hospital_type, $hospital_name, $hospital_id,
                                                $address1, $address2, $city, $state, $zipCode, $phone)
    {
        $input = self::loadMedicalContact('Update', $userId,
                                          $first_name, $last_name, $doctor_type, $doctor_id,
                                          $hospital_type, $hospital_name, $hospital_id,
                                          $address1, $address2, $city, $state, $zipCode, $phone);

        $client = new SOAPClient(LOGIN_WSDL, array('cache_wsdl' => WSDL_CACHE_NONE));
        $response = $client->UpdateMedicalContact($input);

        $output = new UpdateMedicalContactResponse($response->response);

        return $output;
    }

    public static function deleteMedicalContact($userId, $doctor_id, $hospital_id)
    {
        $input = self::loadMedicalContact('Delete', $userId,
                                          ' ', ' ', ' ', $doctor_id,
                                          ' ', ' ', $hospital_id,
                                          ' ', ' ', ' ', ' ', ' ', ' ');

        $client = new SOAPClient(LOGIN_WSDL, array('cache_wsdl' => WSDL_CACHE_NONE));
        $response = $client->DeleteMedicalContact($input);

        $output = new DeleteMedicalContactResponse($response->response);

        return $output;
    }
    
    private static function loadMedicalContact($type, $userId,
                                               $first_name, $last_name, $doctor_type, $doctor_id,
                                               $hospital_type, $hospital_name, $hospital_id,
                                               $address1, $address2, $city, $state, $zipCode, $phone)
    {
        $address = new Address($address1, $address2, $city, $state, $zipCode, $phone);

        $medicalcontact = null;
        if ($first_name != null && $last_name != null && $doctor_type != null && $doctor_id != null)
        {
            $contact = new MedicalContact($first_name, $last_name, $doctor_type, $doctor_id, $address);

            $medicalcontact = array($contact);
        }

        $hospitalcontact = null;
        if ($hospital_type != null && $hospital_name != null && $hospital_id != null)
        {
            $contact = new HospitalContact($hospital_type, $hospital_name, $hospital_id, $address);

            $hospitalcontact = array($contact);
        }

        $medicalcontacts = new MedicalContacts($medicalcontact, $hospitalcontact, $userId);

        $output = null;
        if ($type == 'Delete')
        {
            $output = new DeleteMedicalContactRequest($medicalcontacts);
        }
        else if ($type == 'Insert')
        {
            $output =  new InsertMedicalContactRequest($medicalcontacts);
        }
        else if ($type = 'Update')
        {
            $output =  new UpdateMedicalContactRequest($medicalcontacts);
        }

        return $output;
    }

    private static function convertMedicalContact($input)
    {
        $medicalcontact_array = $input->MedicalContacts->MedicalContact;
        $hospitalcontact_array = $input->MedicalContacts->HospitalContact;
        $userId = $input->MedicalContacts->userId;

        $medicalcontact = array();
        $cnt_med = count($medicalcontact_array);

        for ($i = 0; $i < $cnt_med; $i++)
        {
            if ($cnt_med == 1)
            {
                $first_name = $medicalcontact_array->first_name;
                $last_name = $medicalcontact_array->last_name;
                $doctor_type = $medicalcontact_array->doctor_type;
                $doctor_id = $medicalcontact_array->doctor_id;

                $address1 = $medicalcontact_array->address->address1;
                $address2 = $medicalcontact_array->address->address2;
                $city = $medicalcontact_array->address->city;
                $state = $medicalcontact_array->address->state;
                $zipCode = $medicalcontact_array->address->zipCode;
                $phone = $medicalcontact_array->address->phone;
            }
            else
            {
                $first_name = $medicalcontact_array[$i]->first_name;
                $last_name = $medicalcontact_array[$i]->last_name;
                $doctor_type = $medicalcontact_array[$i]->doctor_type;
                $doctor_id = $medicalcontact_array[$i]->doctor_id;

                $address1 = $medicalcontact_array[$i]->address->address1;
                $address2 = $medicalcontact_array[$i]->address->address2;
                $city = $medicalcontact_array[$i]->address->city;
                $state = $medicalcontact_array[$i]->address->state;
                $zipCode = $medicalcontact_array[$i]->address->zipCode;
                $phone = $medicalcontact_array[$i]->address->phone;
            }

            $address = new Address($address1, $address2, $city, $state, $zipCode, $phone);

            $contact = new MedicalContact($first_name, $last_name, $doctor_type, $doctor_id, $address);

            array_push($medicalcontact, $contact);
        }

        $hospitalcontact = array();
        $cnt_hos = count($hospitalcontact_array);

        for ($i = 0; $i < $cnt_hos; $i++)
        {
            if ($cnt_hos == 1)
            {
                $hospital_type = $hospitalcontact_array->hospital_type;
                $hospital_name = $hospitalcontact_array->hospital_name;
                $hospital_id = $hospitalcontact_array->hospital_id;

                $address1 = $hospitalcontact_array->address->address1;
                $address2 = $hospitalcontact_array->address->address2;
                $city = $hospitalcontact_array->address->city;
                $state = $hospitalcontact_array->address->state;
                $zipCode = $hospitalcontact_array->address->zipCode;
                $phone = $hospitalcontact_array->address->phone;
            }
            else
            {
                $hospital_type = $hospitalcontact_array[$i]->hospital_type;
                $hospital_name = $hospitalcontact_array[$i]->hospital_name;
                $hospital_id = $hospitalcontact_array[$i]->hospital_id;

                $address1 = $hospitalcontact_array[$i]->address->address1;
                $address2 = $hospitalcontact_array[$i]->address->address2;
                $city = $hospitalcontact_array[$i]->address->city;
                $state = $hospitalcontact_array[$i]->address->state;
                $zipCode = $hospitalcontact_array[$i]->address->zipCode;
                $phone = $hospitalcontact_array[$i]->address->phone;
            }

            $address = new Address($address1, $address2, $city, $state, $zipCode, $phone);

            $contact = new HospitalContact($hospital_type, $hospital_name, $hospital_id, $address);

            array_push($hospitalcontact, $contact);
        }

        $medicalcontacts = new MedicalContacts($medicalcontact, $hospitalcontact, $userId);

        $output = new GetMedicalContactsResponse($medicalcontacts);

        return $output;
    }
}
?>
