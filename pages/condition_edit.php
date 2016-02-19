<?php
require_once(dirname(__FILE__).'/../db/medicalconditionDB.php');
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

$error = null;
if (isset($_REQUEST['error']))
{
        $error = clean_input($_REQUEST['error']);
}

$index = array_search($condition_id, $_SESSION['edit']['id']);
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Edit Medical Condition</title>
<link href="css/popup.css" rel="stylesheet" type="text/css">
<script>
function editMedicalCondition(condition_id)
{
    var frm = eval("document.editConditionForm");
    frm.action = "condition_edit_action.php?id="+condition_id;
    frm.submit();
}

function deleteMedicalCondition(condition_id)
{
    var frm = eval("document.editConditionForm");
    var msg = "Do you really wish to delete this condition?";

    if (confirm(msg))
    {
        frm.action = "condition_delete_action.php?id="+condition_id;
        frm.submit();
    }
}
</script>
</head>
<body>
</script>
</head>
<body>
<div id="top">
    <h2>Edit Medical Condition</h2>
</div>
<div id="edit">
    <div id="container">
        <?php if ($error == '0000000000') echo('<span class="redbold">Error: Update Failure</span><br><br>'); ?>
        <?php if ($error == 'D') echo('<span class="redbold">Error: Delete Failure</span><br><br>'); ?>
        <form name="editConditionForm" method="post">
            What's your condition? *
            <?php if (substr($error, 0, 1) == 1) echo('<span class="redbold"> (Required Field)</span>'); ?>
            <?php if (substr($error, 0, 1) == 2) echo('<span class="redbold"> (Error: Invalid Input)</span>'); ?><br>
            <input type="text" name="condition" value="<?php echo(clean_input($_SESSION['edit']['condition'][$index])); ?>"><br>
            What's your status? *
            <?php if (substr($error, 1, 1) == 1) echo('<span class="redbold"> (Required Field)</span>'); ?>
            <?php if (substr($error, 1, 1) == 2) echo('<span class="redbold"> (Error: Invalid Input)</span>'); ?><br>
            <input type="text" name="status" value="<?php echo(clean_input($_SESSION['edit']['status'][$index])); ?>"><br>
            First Observed/Onset? *
            <?php if (substr($error, 2, 1) == 1) echo('<span class="redbold"> (Required Field)</span>'); ?>
            <?php if (substr($error, 2, 1) == 2) echo('<span class="redbold"> (Error: Invalid Input)</span>'); ?><br>
            <input type="text" name="onset" value="<?php echo(clean_input($_SESSION['edit']['onset'][$index])); ?>"><br>
            Details: *
            <?php if (substr($error, 3, 1) == 1) echo('<span class="redbold"> (Required Field)</span>'); ?>
            <?php if (substr($error, 3, 1) == 2) echo('<span class="redbold"> (Error: Invalid Input)</span>'); ?><br>
            <textarea rows="4" cols="1" name="details"><?php echo(clean_input($_SESSION['edit']['details'][$index])); ?></textarea><br>
            * <small>Required field</small><br>

            <div class="button-wrap">
                <div class="cancel-btn"><a href="javascript: self.close()">Cancel</a></div>
                <div class="update-btn"><a href="javascript: editMedicalCondition(<?php echo($condition_id); ?>)">Update Medical Condition</a></div>
            </div>
            <div class="button-wrap">
                <div class="delete-btn"><a href="javascript: deleteMedicalCondition(<?php echo($condition_id); ?>)">Delete Medical Condition</a></div>
            </div>
        </form>
    </div>
</div>
</bodY>
</html>
