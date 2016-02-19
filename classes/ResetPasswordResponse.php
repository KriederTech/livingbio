<?php

class ResetPasswordResponse
{
    private $response;
    private $email;
    private $tmp_password;

    public function __construct($response, $email, $tmp_password)
    {
        $this->response = $response;
        $this->email = $email;
        $this->tmp_password = $tmp_password;
    }

    public function getResponse()
    {
        return $this->response;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getTmpPassword()
    {
        return $this->tmp_password;
    }
}
?>
