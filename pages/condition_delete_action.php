<?php
require_once(dirname(__FILE__).'/../db/medicalconditionDB.php');
require_once(dirname(__FILE__).'/../properties/constants.php');
require_once(dirname(__FILE__).'/../util/authenticate.php');
require_once(dirname(__FILE__).'/../util/utils.php');

$userId = null;
if (isset($_SESSION['userid']))
{
    $userId = clean_input($_SESSION['userid']);
}

$condition_id = null;
if (isset($_REQUEST['id']))
{
    $condition_id = clean_input($_REQUEST['id']);
}

$output = MedicalConditionDB::deleteMedicalCondition($userId, $condition_id);

$response = $output->getResponse();

if ($response == 'MEDICAL CONDITIONS DELETED SUCCESSFULLY FOR THE USER ID'.$userId)
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
    header('Location: condition_edit.php?id='.$index.'&error=D');
    include('condition_edit.php');
    return;
}
?>
