<?php
require_once(dirname(__FILE__).'/../db/userprofileDB.php');
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
<title>Edit Profile</title>
<link href="css/popup.css" rel="stylesheet" type="text/css">
<script>
function editUserProfile()
{
    var frm = eval("document.editProfileForm");
    frm.action = "profile_edit_action.php";
    frm.submit();
}
</script>
</head>
<body>
<div id="top">
    <h2>Edit Profile</h2>
</div>
<div id="edit">
    <div id="container">
        <?php if ($error == '0000000000') echo('<span class="redbold">Error: Update Failure</span><br><br>'); ?>
        <form name="editProfileForm" method="post">
            <input type="hidden" name="username" value="<?php echo(clean_input($_SESSION['username'])); ?>">
            <input type="hidden" name="type" value="<?php echo(clean_input($_SESSION['type'])); ?>">

            What's your first name? *
            <?php if (substr($error, 0, 1) == 1) echo('<span class="redbold"> (Required Field)</span>'); ?>
            <?php if (substr($error, 0, 1) == 2) echo('<span class="redbold"> (Error: Invalid Input)</span>'); ?><br>
            <input type="text" name="firstName" value="<?php echo(clean_input($_SESSION['firstName'])); ?>"><br>
            What's your last name? *
            <?php if (substr($error, 1, 1) == 1) echo('<span class="redbold"> (Required Field)</span>'); ?>
            <?php if (substr($error, 1, 1) == 2) echo('<span class="redbold"> (Error: Invalid Input)</span>'); ?><br>
            <input type="text" name="lastName" value="<?php echo(clean_input($_SESSION['lastName'])); ?>"><br>
            What's your gender?
            <br>
            <input type="radio" name="gender" value="Female"
                   <?php if (isset($_SESSION['gender']) && clean_input($_SESSION['gender']) == 'Female') echo('checked'); ?>><span class="radio">Female</span>
            <input type="radio" name="gender" value="Male"
                   <?php if (isset($_SESSION['gender']) && clean_input($_SESSION['gender']) == 'Male') echo('checked'); ?>><span class="radio">Male</span><br>
            What's your birthday?
            <?php if (substr($error, 3, 1) == 2) echo('<span class="redbold"> (Error: Invalid Input)</span>'); ?><br>
            <input type="text" name="birthdate" value="<?php echo(clean_input($_SESSION['birthdate'])); ?>"><br>
            What's your contact information?<br><br>
            Address: *
            <?php if (substr($error, 4, 1) == 1) echo('<span class="redbold"> (Required Field)</span>'); ?>
            <?php if (substr($error, 4, 1) == 2) echo('<span class="redbold"> (Error: Invalid Input)</span>'); ?><br>
            <input type="text" name="address" value="<?php echo(clean_input($_SESSION['address'])); ?>"><br>
            City: *
            <?php if (substr($error, 5, 1) == 1) echo('<span class="redbold"> (Required Field)</span>'); ?>
            <?php if (substr($error, 5, 1) == 2) echo('<span class="redbold"> (Error: Invalid Input)</span>'); ?><br>
            <input type="text" name="city" value="<?php echo(clean_input($_SESSION['city'])); ?>"><br>
            State: *
            <?php if (substr($error, 6, 1) == 1) echo('<span class="redbold"> (Required Field)</span>'); ?>
            <?php if (substr($error, 6, 1) == 2) echo('<span class="redbold"> (Error: Invalid Input)</span>'); ?><br>
            <input type="text" name="province" value="<?php echo(clean_input($_SESSION['province'])); ?>"><br>
            Country: *
            <?php if (substr($error, 7, 1) == 1) echo('<span class="redbold"> (Required Field)</span>'); ?>
            <?php if (substr($error, 7, 1) == 2) echo('<span class="redbold"> (Error: Invalid Input)</span>'); ?><br>
            <input type="text" name="country" value="<?php echo(clean_input($_SESSION['country'])); ?>"><br>
            Phone number: *
            <?php if (substr($error, 8, 1) == 1) echo('<span class="redbold"> (Required Field)</span>'); ?>
            <?php if (substr($error, 8, 1) == 2) echo('<span class="redbold"> (Error: Invalid Input)</span>'); ?><br>
            <input type="text" name="phonenumber" value="<?php echo(clean_input($_SESSION['phonenumber'])); ?>"><br>
            Email address: *
            <?php if (substr($error, 9, 1) == 1) echo('<span class="redbold"> (Required Field)</span>'); ?>
            <?php if (substr($error, 9, 1) == 2) echo('<span class="redbold"> (Error: Invalid Input)</span>'); ?><br>
            <input type="text" name="email" value="<?php echo(clean_input($_SESSION['email'])); ?>"><br>
            * <small>Required field</small><br>

            <input type="hidden" name="height" value="<?php echo(clean_input($_SESSION['height'])); ?>">
            <input type="hidden" name="weight" value="<?php echo(clean_input($_SESSION['weight'])); ?>">
            <input type="hidden" name="age" value="<?php echo(clean_input($_SESSION['age'])); ?>">
            <input type="hidden" name="website" value="<?php echo(clean_input($_SESSION['website'])); ?>">

            <div class="button-wrap">
                <div class="cancel-btn"><a href="javascript: self.close()">Cancel</a></div>
                <div class="update-btn"><a href="javascript: editUserProfile()">Update Profile</a></div>
            </div>
        </form>
    </div>
</div>
</body>
</html>
