<?php
require_once(dirname(__FILE__).'/../db/medicalcontactDB.php');
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
<title>Add Medical Contact</title>
<link href="css/popup.css" rel="stylesheet" type="text/css">
<script>
function addMedicalContact()
{
    var frm = eval("document.addContactForm");
    frm.action = "contact_add_action.php";
    frm.submit();
}
</script>
</head>
<body>
<div id="top">
    <h2>Add Medical Contact</h2>
</div>
<div id="edit">
    <div id="container">
        <?php if ($error == 'A') echo('<span class="redbold">Error: Add Failure</span><br><br>'); ?>
        <form name="addContactForm" method="post">
            What's the doctor's first name? *
            <?php if (substr($error, 0, 1) == 1) echo('<span class="redbold"> (Required Field)</span>'); ?>
            <?php if (substr($error, 0, 1) == 2) echo('<span class="redbold"> (Error: Invalid Input)</span>'); ?><br>
            <input type="text" name="first_name" value="<?php echo(clean_input($_SESSION['add']['first_name'])); ?>"><br>
            What's the doctor's last name? *
            <?php if (substr($error, 1, 1) == 1) echo('<span class="redbold"> (Required Field)</span>'); ?>
            <?php if (substr($error, 1, 1) == 2) echo('<span class="redbold"> (Error: Invalid Input)</span>'); ?><br>
            <input type="text" name="last_name" value="<?php echo(clean_input($_SESSION['add']['last_name'])); ?>"><br>
            <input type="hidden" name="doctor_type" value="Doctor">
            What's the doctor's contact information?<br><br>
            Address line 1: *
            <?php if (substr($error, 3, 1) == 1) echo('<span class="redbold"> (Required Field)</span>'); ?>
            <?php if (substr($error, 3, 1) == 2) echo('<span class="redbold"> (Error: Invalid Input)</span>'); ?><br>
            <input type="text" name="address1" value="<?php echo(clean_input($_SESSION['add']['address1'])); ?>"><br>
            Address line 2:
            <?php if (substr($error, 4, 1) == 2) echo('<span class="redbold"> (Error: Invalid Input)</span>'); ?><br>
            <input type="text" name="address2" value="<?php echo(clean_input($_SESSION['add']['address2'])); ?>"><br>
            City: *
            <?php if (substr($error, 5, 1) == 1) echo('<span class="redbold"> (Required Field)</span>'); ?>
            <?php if (substr($error, 5, 1) == 2) echo('<span class="redbold"> (Error: Invalid Input)</span>'); ?><br>
            <input type="text" name="city" value="<?php echo(clean_input($_SESSION['add']['city'])); ?>"><br>
            State: *
            <?php if (substr($error, 6, 1) == 1) echo('<span class="redbold"> (Required Field)</span>'); ?>
            <?php if (substr($error, 6, 1) == 2) echo('<span class="redbold"> (Error: Invalid Input)</span>'); ?><br>
            <input type="text" name="state" value="<?php echo(clean_input($_SESSION['add']['state'])); ?>"><br>
            Zip Code: *
            <?php if (substr($error, 7, 1) == 1) echo('<span class="redbold"> (Required Field)</span>'); ?>
            <?php if (substr($error, 7, 1) == 2) echo('<span class="redbold"> (Error: Invalid Input)</span>'); ?><br>
            <input type="text" name="zipCode" value="<?php echo(clean_input($_SESSION['add']['zipCode'])); ?>"><br>
            Phone Number: *
            <?php if (substr($error, 8, 1) == 1) echo('<span class="redbold"> (Required Field)</span>'); ?>
            <?php if (substr($error, 8, 1) == 2) echo('<span class="redbold"> (Error: Invalid Input)</span>'); ?><br>
            <input type="text" name="phone" value="<?php echo(clean_input($_SESSION['add']['phone'])); ?>"><br>
            * <small>Required field</small><br>

            <div class="button-wrap">
                <div class="cancel-btn"><a href="javascript: self.close()">Cancel</a></div>
                <div class="update-btn"><a href="javascript: addMedicalContact()">Add Medical Contact</a></div>
            </div>
        </form>
    </div>
</div>
</bodY>
</html>
