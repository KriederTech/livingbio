<?php

class ResetPasswordRequest
{
    private $username;

    public function __construct($username)
    {
        $this->username = $username;
    }
}
?>
