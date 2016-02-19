<?php
require_once(dirname(__FILE__).'/../properties/constants.php');
require_once(dirname(__FILE__).'/../classes/GetMedicalRecords.php');
require_once(dirname(__FILE__).'/../classes/GetMedicalRecordsResponse.php');
require_once(dirname(__FILE__).'/../classes/InsertMedicalRecordRequest.php');
require_once(dirname(__FILE__).'/../classes/InsertMedicalRecordResponse.php');
require_once(dirname(__FILE__).'/../classes/medicalrecords.php');

class MedicalRecordDB
{
    public static function getMedicalRecords($userid)
    {
        $input = new getMedicalRecords($userid);

        $client = new SOAPClient(LOGIN_WSDL, array('cache_wsdl' => WSDL_CACHE_NONE));
        $response = $client->GetMedicalRecords($input);

        $output = self::convertMedicalRecord($response);

        return $output;
    }

    public static function insertMedicalRecord($userId, $doc_file, $doc_tmpfile, $doc_name, $doc_caption)
    {
        $document = base64_encode(file_get_contents($doc_tmpfile));
        $doc_id = basename($doc_file);
        $doc_date = date('Y-m-d H:i:s');

        $input = self::loadMedicalRecord('Insert', $userId, $document, $doc_id, $doc_name, $doc_date, $doc_caption);

        $client = new SOAPClient(LOGIN_WSDL, array('cache_wsdl' => WSDL_CACHE_NONE));
        $response = $client->InsertMedicalRecord($input);

        $output = new InsertMedicalRecordResponse($response->response);

        return $output;
    }

    private static function loadMedicalRecord($type, $userId, $document, $doc_id, $doc_name, $doc_date, $doc_caption)
    {
        $record = new MedicalRecord($document, $doc_id, $doc_name, $doc_date, $doc_caption);

        $medicalrecord = array($record);

        $medicalrecords = new MedicalRecords($medicalrecord, $userId);

        $output = null;
        if ($type == 'Insert')
        {
            $output = new InsertMedicalRecordRequest($medicalrecords);
        }

        return $output;
    }

    private static function convertMedicalRecord($input)
    {
        $medicalrecord_array = $input->MedicalRecords->MedicalRecord;
        $userId = $input->MedicalRecords->userId;

        $medicalrecord = array();
        $cnt = count($medicalrecord_array);

        for ($i = 0; $i < $cnt; $i++)
        {
            if ($cnt == 1)
            {
                $document = $medicalrecord_array->document;
                $doc_id = $medicalrecord_array->doc_id;
                $doc_name = $medicalrecord_array->doc_name;
                $doc_date = $medicalrecord_array->doc_date;
                $doc_caption = $medicalrecord_array->doc_caption;
            }
            else
            {
                $document = $medicalrecord_array[$i]->document;
                $doc_id = $medicalrecord_array[$i]->doc_id;
                $doc_name = $medicalrecord_array[$i]->doc_name;
                $doc_date = $medicalrecord_array[$i]->doc_date;
                $doc_caption = $medicalrecord_array[$i]->doc_caption;
            }

            $record = new MedicalRecord($document, $doc_id, $doc_name, $doc_date, $doc_caption);

            array_push($medicalrecord, $record);
        }

        $medicalrecords = new MedicalRecords($medicalrecord, $userId);

        $output = new GetMedicalRecordsResponse($medicalrecords);

        return $output;
    }
}
?>
