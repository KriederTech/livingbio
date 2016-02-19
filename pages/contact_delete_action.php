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

$doctor_id = null;
if (isset($_REQUEST['id']))
{
    $doctor_id = clean_input($_REQUEST['id']);
}

$output = MedicalContactDB::deleteMedicalContact($userId, $doctor_id, null);

$response = $output->getResponse();

if ($response == 'Success')
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
    header('Location: contact_edit.php?id='.$index.'&error=D');
    include('contact_edit.php');
    return;
}
?>
