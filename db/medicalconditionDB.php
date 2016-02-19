<?php
require_once(dirname(__FILE__).'/../properties/constants.php');
require_once(dirname(__FILE__).'/../classes/DeleteMedicalConditionsRequest.php');
require_once(dirname(__FILE__).'/../classes/DeleteMedicalConditionsResponse.php');
require_once(dirname(__FILE__).'/../classes/GetMedicalConditionsRequest.php');
require_once(dirname(__FILE__).'/../classes/GetMedicalConditionsResponse.php');
require_once(dirname(__FILE__).'/../classes/InsertMedicalConditionsRequest.php');
require_once(dirname(__FILE__).'/../classes/InsertMedicalConditionsResponse.php');
require_once(dirname(__FILE__).'/../classes/UpdateMedicalConditionsRequest.php');
require_once(dirname(__FILE__).'/../classes/UpdateMedicalConditionsResponse.php');
require_once(dirname(__FILE__).'/../classes/medicalconditions.php');

class MedicalConditionDB
{
    public static function getMedicalConditions($userid)
    {
        $input = new GetMedicalConditionsRequest($userid);

        $client = new SOAPClient(LOGIN_WSDL, array('cache_wsdl' => WSDL_CACHE_NONE));
        $response = $client->GetMedicalConditions($input);

        $output = self::convertMedicalCondition($response);

        return $output;
    }

    public static function insertMedicalCondition($userId, $condition, $status, $onset, $details)
    {
        $input = self::loadMedicalCondition('Insert', $userId, $condition, $status, $onset, $details, ' ');

        $client = new SOAPClient(LOGIN_WSDL, array('cache_wsdl' => WSDL_CACHE_NONE));
        $response = $client->InsertMedicalCondition($input);

        $output = new InsertMedicalConditionResponse($response->response);

        return $output;
    }

    public static function updateMedicalCondition($userId, $condition, $status, $onset, $details, $id)
    {
        $input = self::loadMedicalCondition('Update', $userId, $condition, $status, $onset, $details, $id);

        $client = new SOAPClient(LOGIN_WSDL, array('cache_wsdl' => WSDL_CACHE_NONE));
        $response = $client->UpdateMedicalCondition($input);

        $output = new UpdateMedicalConditionResponse($response->response);

        return $output;
    }

    public static function deleteMedicalCondition($userId, $id)
    {
        $input = self::loadMedicalCondition('Delete', $userId, ' ', ' ', ' ', ' ', $id);

        $client = new SOAPClient(LOGIN_WSDL, array('cache_wsdl' => WSDL_CACHE_NONE));
        $response = $client->DeleteMedicalCondition($input);

        $output = new DeleteMedicalConditionResponse($response->response);

        return $output;
    }
    
    private static function loadMedicalCondition($type, $userId, $condition, $status, $onset, $details, $id)
    {
        $medicalcondition = null;
        if ($condition != null && $status != null && $onset != null && $details != null && $id != null)
        {
            $condition_struct = new MedicalCondition($condition, $status, $onset, $details, $id);

            $medicalcondition = array($condition_struct);
        }

        $medicalconditions = new MedicalConditions($medicalcondition, $userId);

        $output = null;
        if ($type == 'Delete')
        {
            $output = new DeleteMedicalConditionRequest($medicalconditions);
        }
        else if ($type == 'Insert')
        {
            $output = new InsertMedicalConditionRequest($medicalconditions);
        }
        else if ($type == 'Update')
        {
            $output = new UpdateMedicalConditionRequest($medicalconditions);
        }

        return $output;
    }

    private static function convertMedicalCondition($input)
    {
        $medicalcondition_array = $input->MedicalConditions->MedicalCondition;
        $userId = $input->MedicalConditions->userId;

        $medicalcondition = array();
        $cnt = count($medicalcondition_array);

        for ($i = 0; $i < $cnt; $i++)
        {
            if ($cnt == 1)
            {
                $condition = $medicalcondition_array->condition;
                $status = $medicalcondition_array->status;
                $onset = $medicalcondition_array->onset;
                $details = $medicalcondition_array->details;
                $id = $medicalcondition_array->id;
            }
            else
            {
                $condition = $medicalcondition_array[$i]->condition;
                $status = $medicalcondition_array[$i]->status;
                $onset = $medicalcondition_array[$i]->onset;
                $details = $medicalcondition_array[$i]->details;
                $id = $medicalcondition_array[$i]->id;
            }

            $condition_struct = new MedicalCondition($condition, $status, $onset, $details, $id);

            array_push($medicalcondition, $condition_struct);
        }

        $medicalconditions = new MedicalConditions($medicalcondition, $userId);

        $output = new GetMedicalConditionsResponse($medicalconditions);

        return $output;
    }
}
?>
