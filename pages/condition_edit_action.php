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

$index = array_search($condition_id, $_SESSION['edit']['condition_id']);

$fields = array('condition', 'status', 'onset', 'details');

foreach ($fields as $field)
{
    $$field = null;
    if (isset($_REQUEST[$field]))
    {
        $$field = clean_input($_REQUEST[$field]);
        $_SESSION['edit'][$field][$index] = $$field;
    }
}

$error = '0000';
if ($condition == '')              $error[0] = 1;
else if (!ctype_print($condition)) $error[0] = 2;
if ($status == '')                 $error[1] = 1;
else if (!ctype_print($status))    $error[1] = 2;
if ($onset == '')                  $error[2] = 1;
else if (!ctype_print($onset))     $error[2] = 2;
if ($details == '')                $error[3] = 1;
else if (!ctype_print($details))   $error[3] = 2;

if ($error == '0000')
{
    $output = MedicalConditionDB::updateMedicalCondition($userId, $condition, $status, $onset, $details, $condition_id);

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
         header('Location: condition_edit.php?id='.$index.'&error='.$error);
         include('condition_edit.php');
         return;
    }
}
else
{
    header('Location: condition_edit.php?id='.$index.'&error='.$error);
    include('condition_edit.php');
    return;
}
?>
