<?php

class DeleteMedicalConditionResponse
{
    private $response;

    public function __construct($response)
    {
        $this->response = $response;
    }

    public function getResponse()
    {
        return $this->response;
    }
}
?>
