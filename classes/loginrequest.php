<?php

class LoginRequest
{
    private $userid;
    private $password;

    public function __construct($userid, $password)
    {
        $this->userid = $userid;
        $this->password = $password;
    }
}
?>
