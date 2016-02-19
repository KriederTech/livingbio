<?php
require_once(dirname(__FILE__).'/../db/medicalcontactDB.php');
require_once(dirname(__FILE__).'/../properties/constants.php');
require_once(dirname(__FILE__).'/../util/authenticate.php');
require_once(dirname(__FILE__).'/../util/utils.php');

$userId = null;
if (isset($_SESSION['userid']))
{
    $userId = clean_input($_SESSION['userid']);
}

$fields = array('first_name', 'last_name', 'doctor_type', 'address1', 'address2', 'city', 'state', 'zipCode', 'phone');

foreach ($fields as $field)
{
    $$field = null;
    if (isset($_REQUEST[$field]))
    {
        $$field = clean_input($_REQUEST[$field]);
        $_SESSION['add'][$field] = $$field;
    }
}

$error = '000000000';
if ($first_name == '')               $error[0] = 1;
else if (!ctype_alpha($first_name))  $error[0] = 2;
if ($last_name == '')                $error[1] = 1;
else if (!ctype_alpha($last_name))   $error[1] = 2;
//if ($doctor_type == '')              $error[2] = 1;
//else if (!ctype_alpha($doctor_type)) $error[2] = 2;
if ($doctor_type != '' && !ctype_alpha($doctor_type)) $error[2] = 2;
if ($address1 == '')                 $error[3] = 1;
else if (!ctype_print($address1))    $error[3] = 2;
//if ($address2 == '')                 $error[4] = 1;
//else if (!ctype_print($address2))    $error[4] = 2;
if ($address2 != '' && !ctype_print($address2))      $error[4] = 2;
if ($city == '')                     $error[5] = 1;
else if (!ctype_alspace($city))      $error[5] = 2;
if ($state == '')                    $error[6] = 1;
else if (!ctype_alspace($state))     $error[6] = 2;
if ($zipCode == '')                  $error[7] = 1;
else if (!ctype_digit($zipCode))     $error[7] = 2;
if ($phone == '')                    $error[8] = 1;
else if (!ctype_digit($phone))       $error[8] = 2;

if ($error == '000000000')
{
    $output = MedicalContactDB::insertMedicalContact($userId, $first_name, $last_name, $doctor_type, null, null,
                                                     $address1, $address2, $city, $state, $zipCode, $phone);
    $response = $output->getResponse();

    if ($response == 'SUCCESS INSERTED MEDICAL CONTACT RECORDS FOR THE USER '.$userId)
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
        header('Location: contact_add.php?error=A');
        include('contact_add.php');
        return;
    }
}
else
{
    header('Location: contact_add.php?error='.$error);
    include('contact_add.php');
    return;
}
?>
