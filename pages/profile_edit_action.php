<?php
require_once(dirname(__FILE__).'/../db/userprofileDB.php');
require_once(dirname(__FILE__).'/../properties/constants.php');
require_once(dirname(__FILE__).'/../util/authenticate.php');
require_once(dirname(__FILE__).'/../util/utils.php');

$userId = null;
if (isset($_SESSION['userid']))
{
    $userId = clean_input($_SESSION['userid']);
}

$fields = array('username', 'usertype', 'address', 'city', 'country', 'province', 'firstName', 'lastName',
                'height', 'weight', 'age', 'phonenumber', 'email', 'website', 'birthdate', 'gender');

foreach ($fields as $field)
{
    $$field = null;
    if (isset($_REQUEST[$field]))
    {
        $$field = clean_input($_REQUEST[$field]);
        $_SESSION[$field] = $$field;
    }
}

$error = '0000000000';
if ($firstName == '')                $error[0] = 1;
else if (!ctype_alpha($firstName))   $error[0] = 2;
if ($lastName == '')                 $error[1] = 1;
else if (!ctype_alpha($lastName))    $error[1] = 2;
//if ($gender == '')                   $error[2] = 1;
//if ($birthdate == '')                $error[3] = 1;
//else if (!ctype_print($birthdate))   $error[3] = 2;
if ($birthdate !='' && !ctype_print($birthdate))        $error[3] = 2;
if ($address == '')                  $error[4] = 1;
else if (!ctype_print($address))     $error[4] = 2;
if ($city == '')                     $error[5] = 1;
else if (!ctype_alspace($city))      $error[5] = 2;
if ($province == '')                 $error[6] = 1;
else if (!ctype_alspace($province))  $error[6] = 2;
if ($country == '')                  $error[7] = 1;
else if (!ctype_alspace($country))   $error[7] = 2;
if ($phonenumber == '')              $error[8] = 1;
else if (!ctype_digit($phonenumber)) $error[8] = 2;
if ($email == '')                    $error[9] = 1;
else if (!ctype_print($email))       $error[9] = 2;

if ($error == '0000000000')
{
    $output = UserProfileDB::updateUserProfile($userId, $username, $usertype, $address, $city, $country, $province,
                                               $firstName, $lastName, $height, $weight, $age, $phonenumber, $email, $website, $birthdate, $gender);
    $response = $output->getResponse();

    if ($response == 'UPDATE SUCCESS')
    {
?>
        <script>
        opener.location.reload();
        self.close();
        </script>
<?php
    }
    else
    {
        header('Location: profile_edit.php?error='.$error);
        include('profile_edit.php');
        return;
    }
}
else
{
    header('Location: profile_edit.php?error='.$error);
    include('profile_edit.php');
    return;
}
?>
