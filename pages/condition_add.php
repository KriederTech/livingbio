<?php
require_once(dirname(__FILE__).'/../db/medicalconditionDB.php');
require_once(dirname(__FILE__).'/../util/authenticate.php');
require_once(dirname(__FILE__).'/../util/utils.php');

$userId = null;
if (isset($_SESSION['userid']))
{
        $userId = clean_input($_SESSION['userid']);
}

$error = null;
if (isset($_REQUEST['error']))
{
        $error = clean_input($_REQUEST['error']);
}
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Add Medical Condition</title>
<link href="css/popup.css" rel="stylesheet" type="text/css">
<script>
function addMedicalCondition()
{
    var frm = eval("document.addConditionForm");
    frm.action = "condition_add_action.php";
    frm.submit();
}
</script>
</head>
<body>
<div id="top">
    <h2>Add Medical Condition</h2>
</div>
<div id="edit">
    <div id="container">
        <?php if ($error == 'A') echo('<span class="redbold">Error: Add Failure</span><br><br>'); ?>
        <form name="addConditionForm" method="post">
            What's your condition? *
            <?php if (substr($error, 0, 1) == 1) echo('<span class="redbold"> (Required Field)</span>'); ?>
            <?php if (substr($error, 0, 1) == 2) echo('<span class="redbold"> (Error: Invalid Input)</span>'); ?><br>
            <input type="text" name="condition" value="<?php echo(clean_input($_SESSION['add']['condition'])); ?>"><br>
            What's your status? *
            <?php if (substr($error, 1, 1) == 1) echo('<span class="redbold"> (Required Field)</span>'); ?>
            <?php if (substr($error, 1, 1) == 2) echo('<span class="redbold"> (Error: Invalid Input)</span>'); ?><br>
            <input type="text" name="status" value="<?php echo(clean_input($_SESSION['add']['status'])); ?>"><br>
            First Observed/Onset? *
            <?php if (substr($error, 2, 1) == 1) echo('<span class="redbold"> (Required Field)</span>'); ?>
            <?php if (substr($error, 2, 1) == 2) echo('<span class="redbold"> (Error: Invalid Input)</span>'); ?><br>
            <input type="text" name="onset" value="<?php echo(clean_input($_SESSION['add']['onset'])); ?>"><br>
            Details: *
            <?php if (substr($error, 3, 1) == 1) echo('<span class="redbold"> (Required Field)</span>'); ?>
            <?php if (substr($error, 3, 1) == 2) echo('<span class="redbold"> (Error: Invalid Input)</span>'); ?><br>
            <textarea rows="4" cols="1" name="details" value="<?php echo(clean_input($_SESSION['add']['details'])); ?>"></textarea><br>
            * <small>Required field</small><br>

            <div class="button-wrap">
                <div class="cancel-btn"><a href="javascript: self.close()">Cancel</a></div>
                <div class="update-btn"><a href="javascript: addMedicalCondition()">Add Medical Condition</a></div>
            </div>
        </form>
    </div>
</div>
</bodY>
</html>
