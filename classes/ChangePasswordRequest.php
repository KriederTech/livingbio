<?php

class ChangePasswordRequest
{
    private $username;
    private $password;
    private $tmp_password;

    public function __construct($username, $password, $tmp_password)
    {
        $this->username = $username;
        $this->password = $password;
        $this->tmp_password = $tmp_password;
    }
}
?>
