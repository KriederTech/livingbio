<?php
require_once(dirname(__FILE__).'/properties/constants.php');
require_once(dirname(__FILE__).'/util/utils.php');

session_start();

$error = 0;
if (isset($_REQUEST['error']))
{
    $error = clean_input($_REQUEST['error']);
}

$password = '';
if (isset($_REQUEST['password']))
{
    $password = clean_input($_REQUEST['password']);
}

$retype = '';
if (isset($_REQUEST['retype']))
{
    $retype = clean_input($_REQUEST['retype']);
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
function changePassword()
{
    var frm = eval("document.changeForm");
    var password = frm.password.value;
    var retype = frm.retype.value;

    var url = "change_password_action.php";
    if (password == '' || retype == '')
    {
        var url = "change_password.php?error=1";
    }
    else
    {
        if (password != retype)
        {
            var url = "change_password.php?error=2";
        }
    }

    frm.action = url;
    frm.submit();
}

function logOut()
{
    var frm = eval("document.changeForm");
    frm.action = "index.php";
    frm.submit();
}
</script>
</head>

<body onload="changeForm.password.focus()">
<div id="header">
    <div class="wrap">
        <div class="logo2"><img src="pages/img/<?php echo(LOGO); ?>" height="50" alt=""></div>
    </div>
</div>
<div id="content">
    <div class="wrap">
        <br>
        <h3>Create New Password</h3>
        <p>Maybe some text here.</p>
        <form name="changeForm" method="post">
            <span style="display: inline-block; width: 250px" class="title">New Password:</span>
            <input type="password" name="password" value="<?php echo($password); ?>" size="25" autocomplete="off"/><br>
            <span style="display: inline-block; width: 250px" class="title">Retype New Password:</span>
            <input type="password" name="retype" value="<?php echo($retype); ?>" size="25" autocomplete="off"/>
<?php
if ($error == 1)
{
    echo("&nbsp;&nbsp;<span style=\"color: red\">Both password and the retype are required.</span>");
}
else if ($error == 2)
{
    echo("&nbsp;&nbsp;<span style=\"color: red\">The password and the retype are not the same.</span>");
}
?>
            <p><br>
            <input type="submit" name="create" value="Create" onclick="changePassword()"/>&nbsp;&nbsp;
            <input type="button" name="cancel" value="Cancel" onclick="logOut()"/>
        </form>
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
