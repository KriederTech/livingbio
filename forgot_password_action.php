<?php
require_once(dirname(__FILE__).'/properties/constants.php');
require_once(dirname(__FILE__).'/db/passwordDB.php');
require_once(dirname(__FILE__).'/util/utils.php');

$username = null;
if (isset($_REQUEST['username']))
{
    $username = clean_input($_REQUEST['username']);
}

$output = PasswordDB::resetPassword($username);
$response = $output->getResponse();
$email = $output->getEmail();
$tmp_password = $output->getTmpPassword();

if ($response == "Success")
{
    $to = $email;
    $subject = 'DrIDMe password reset';
    $body = 'Dear DrIDMe user,'."\r\n\r\n".
            'Your password has been reset.'."\r\n\r\n".
            'Temporary password: '.$tmp_password."\r\n\r\n".
            'Next time you login please use the temporary password. You will be prompted to create a new password at that time.'."\r\n\r\n".
            'Sincerely,'."\r\n".
            'DrIDMe staff';
    $headers = 'From: admin@emailxl.com'."\r\n".
               'Reply-To: admin@emaixl.com'."\r\n".
               'X-Mailer: PHP/'.phpversion();
   

    mail($to, $subject, $body, $headers);

    header('Location: forgot_password.php?message='.$email);
    include('forgot_password.php');
    return;
}
else
{
    header('Location: forgot_password.php?message');
    include('forgot_password.php');
    return;
}

?>
