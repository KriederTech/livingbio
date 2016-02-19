<?php
require_once(dirname(__FILE__).'/util/session.php');
require_once(dirname(__FILE__).'/properties/constants.php');
require_once(dirname(__FILE__).'/util/utils.php');

logout();

$error = 0;
if (isset($_REQUEST['error']))
{
    $error = clean_input($_REQUEST['error']);
}
$message = '';
if (isset($_REQUEST['message']))
{
    $message = clean_input($_REQUEST['message']);
}

?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>drIDme</title>
<link href="pages/css/main.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="pages/css/nav.css" type="text/css" />
<link rel="stylesheet" href="pages/css/cal.css" type="text/css" />
<script>
function resetPassword()
{
    var frm = eval("document.resetForm");
    var username = frm.username.value;

    if (username == '')
    {
        frm.action = "forgot_password.php?error=1";
        frm.submit();
    }
    else
    {
        frm.action = "forgot_password_action.php";
        frm.submit();
    }
}

function logOut()
{
    var frm = eval("document.resetForm");
    frm.action = "index.php";
    frm.submit();
}
</script>
</head>

<body onload="resetForm.username.focus()">
<div id="header">
    <div class="wrap">
        <div class="logo2"><img src="pages/img/<?php echo(LOGO); ?>" height="50" alt=""></div>
    </div>
</div>
<div id="content">
    <div class="wrap">
        <br>
        <h3>Reset Password</h3>
<?php
if ($message == '')
{
?>
        <p>Maybe some text here.</p>
        <form name="resetForm" method="post">
            <span style="display: inline-block; width: 110px" class="title">Username:</span>
            <input type="text" name="username" size="25"/>
<?php
if ($error == 1)
{
    echo("&nbsp;&nbsp;<span style=\"color: red\">Please enter a username.</span>");
}
?>
            <p><br>
            <input type="submit" name="reset" value="Reset" onclick="resetPassword()"/>&nbsp;&nbsp;
            <input type="button" name="cancel" value="Cancel" onclick="logOut()"/>
        </form>
<?php
}
else
{
?>
        An email containing a temporary password has been sent to the address: <span style="color: black"><?php echo($message); ?></span><br>
        Please use that password when next you try to login.<br>
        You will be prompted to create a new password at that time.<p>
        <form name="resetForm" method="post">
            <input type="button" name="cancel" value="Return" onclick="logOut()"/>
        </form>
<?php
}
?>
        <br>
    </div>
</div>
<div id="footer">
    <div class="wrap">
        <div class="logo2">
            <img src="pages/img/<?php echo(LOGO); ?>" height="50" alt="">
        </div>
    </div>
</div>
</body>
</html>
