<?php
require_once(dirname(__FILE__).'/../properties/constants.php');
require_once(dirname(__FILE__).'/../classes/loginrequest.php');
require_once(dirname(__FILE__).'/../classes/loginresponse.php');

class LoginDB
{
    public static function passwordAuthenticate($username, $password)
    {
        $input = new Loginrequest($username, $password);

        $client = new SOAPClient(LOGIN_WSDL, array('cache_wsdl' => WSDL_CACHE_NONE));
        $response = $client->GetLogin($input);

        $output = new Loginresponse($response->userid, $response->status);

        return $output;
    }
}
?>
