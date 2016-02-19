<?php
require_once(dirname(__FILE__).'/../db/medicalcontactDB.php');
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

$error = null;
if (isset($_REQUEST['error']))
{
        $error = clean_input($_REQUEST['error']);
}

$index = array_search($doctor_id, $_SESSION['edit']['doctor_id']);
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Edit Medical Contact</title>
<link href="css/popup.css" rel="stylesheet" type="text/css">
<script>
function editMedicalContact(doctor_id)
{
    var frm = eval("document.editContactForm");
    frm.action = "contact_edit_action.php?id="+doctor_id;
    frm.submit();
}

function deleteMedicalContact(doctor_id)
{
    var frm = eval("document.editContactForm");
    var msg = "Do you really wish to delete this contact?";

    if (confirm(msg))
    {
        frm.action = "contact_delete_action.php?id="+doctor_id;
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
    <h2>Edit Medical Contact</h2>
</div>
<div id="edit">
    <div id="container">
        <?php if ($error == '0000000000') echo('<span class="redbold">Error: Update Failure</span><br><br>'); ?>
        <?php if ($error == 'D') echo('<span class="redbold">Error: Delete Failure</span><br><br>'); ?>
        <form name="editContactForm" method="post">
            What's the doctor's first name? *
            <?php if (substr($error, 0, 1) == 1) echo('<span class="redbold"> (Required Field)</span>'); ?>
            <?php if (substr($error, 0, 1) == 2) echo('<span class="redbold"> (Error: Invalid Input)</span>'); ?><br>
            <input type="text" name="first_name" value="<?php echo(clean_input($_SESSION['edit']['first_name'][$index])); ?>"><br>
            What's the doctor's last name? *
            <?php if (substr($error, 1, 1) == 1) echo('<span class="redbold"> (Required Field)</span>'); ?>
            <?php if (substr($error, 1, 1) == 2) echo('<span class="redbold"> (Error: Invalid Input)</span>'); ?><br>
            <input type="text" name="last_name" value="<?php echo(clean_input($_SESSION['edit']['last_name'][$index])); ?>"><br>
            <input type="hidden" name="doctor_type" value="Doctor">
            What's the doctor's contact information?<br><br>
            Address line 1: *
            <?php if (substr($error, 3, 1) == 1) echo('<span class="redbold"> (Required Field)</span>'); ?>
            <?php if (substr($error, 3, 1) == 2) echo('<span class="redbold"> (Error: Invalid Input)</span>'); ?><br>
            <input type="text" name="address1" value="<?php echo(clean_input($_SESSION['edit']['address1'][$index])); ?>"><br>
            Address line 2:
            <?php if (substr($error, 4, 1) == 2) echo('<span class="redbold"> (Error: Invalid Input)</span>'); ?><br>
            <input type="text" name="address2" value="<?php echo(clean_input($_SESSION['edit']['address2'][$index])); ?>"><br>
            City: *
            <?php if (substr($error, 5, 1) == 1) echo('<span class="redbold"> (Required Field)</span>'); ?>
            <?php if (substr($error, 5, 1) == 2) echo('<span class="redbold"> (Error: Invalid Input)</span>'); ?><br>
            <input type="text" name="city" value="<?php echo(clean_input($_SESSION['edit']['city'][$index])); ?>"><br>
            State: *
            <?php if (substr($error, 6, 1) == 1) echo('<span class="redbold"> (Required Field)</span>'); ?>
            <?php if (substr($error, 6, 1) == 2) echo('<span class="redbold"> (Error: Invalid Input)</span>'); ?><br>
            <input type="text" name="state" value="<?php echo(clean_input($_SESSION['edit']['state'][$index])); ?>"><br>
            Zip Code: *
            <?php if (substr($error, 7, 1) == 1) echo('<span class="redbold"> (Required Field)</span>'); ?>
            <?php if (substr($error, 7, 1) == 2) echo('<span class="redbold"> (Error: Invalid Input)</span>'); ?><br>
            <input type="text" name="zipCode" value="<?php echo(clean_input($_SESSION['edit']['zipCode'][$index])); ?>"><br>
            Phone Number: *
            <?php if (substr($error, 8, 1) == 1) echo('<span class="redbold"> (Required Field)</span>'); ?>
            <?php if (substr($error, 8, 1) == 2) echo('<span class="redbold"> (Error: Invalid Input)</span>'); ?><br>
            <input type="text" name="phone" value="<?php echo(clean_input($_SESSION['edit']['phone'][$index])); ?>"><br>
            * <small>Required field</small><br>

            <div class="button-wrap">
                <div class="cancel-btn"><a href="javascript: self.close()">Cancel</a></div>
                <div class="update-btn"><a href="javascript: editMedicalContact(<?php echo($doctor_id); ?>)">Update Medical Contact</a></div>
            </div>
            <div class="button-wrap">
                <div class="delete-btn"><a href="javascript: deleteMedicalContact(<?php echo($doctor_id); ?>)">Delete Medical Contact</a></div>
            </div>
        </form>
    </div>
</div>
</bodY>
</html>
