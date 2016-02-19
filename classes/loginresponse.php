<?php

class LoginResponse
{
    private $userid;
    private $status;

    public function __construct($userid, $status)
    {
        $this->userid = $userid;
        $this->status = $status;
    }

    public function getUserid()
    {
        return $this->userid;
    }

    public function getStatus()
    {
        return $this->status;
    }
}
?>
