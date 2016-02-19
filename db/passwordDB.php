<?php
require_once(dirname(__FILE__).'/../properties/constants.php');
require_once(dirname(__FILE__).'/../classes/ChangePasswordRequest.php');
require_once(dirname(__FILE__).'/../classes/ChangePasswordResponse.php');
require_once(dirname(__FILE__).'/../classes/ResetPasswordRequest.php');
require_once(dirname(__FILE__).'/../classes/ResetPasswordResponse.php');

class PasswordDB
{
    public static function resetPassword($username)
    {
        $input = new ResetPasswordRequest($username);

        $client = new SOAPClient(LOGIN_WSDL, array('cache_wsdl' => WSDL_CACHE_NONE));
        $response = $client->ResetPassword($input);

        $output = new ResetPasswordResponse($response->response, $response->email, $response->tmp_password);

        return $output;
    }

    public static function changePassword($username, $password, $tmp_password)
    {
        $input = new ChangePasswordRequest($username, $password, $tmp_password);

        $client = new SOAPClient(LOGIN_WSDL, array('cache_wsdl' => WSDL_CACHE_NONE));
        $response = $client->ChangePassword($input);

        $output = new ChangePasswordResponse($response->response);

        return $output;
    }
}
?>
