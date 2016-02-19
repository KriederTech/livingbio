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

$username = '';
if (isset($_REQUEST['username']))
{
    $username = clean_input($_REQUEST['username']);
}

$password = '';
if (isset($_REQUEST['password']))
{
    $password = clean_input($_REQUEST['password']);
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
function logIn()
{
    var frm = eval("document.loginForm");
    var username = frm.username.value;
    var password = frm.password.value;

    var url = "login_action.php";
    if (username == '' || password == '')
    {
        var url = "index.php?error=1";
    }

    frm.action = url;
    frm.start();
}
</script>
</head>

<body onload="loginForm.username.focus()">
<div id="header">
    <div class="wrap">
        <div class="logo2"><img src="pages/img/<?php echo(LOGO); ?>" height="50" alt=""></div>
    </div>
</div>
<div id="content">
    <div class="wrap">
        <br>
        <p>Maybe some text here.</p>
        <br>
        <form name="loginForm" method="post">
            <span style="display: inline-block; width: 110px" class="title">Username:</span>
            <input type="text" name="username" value="<?php echo($username); ?>" size="25"/><br>
            <span style="display: inline-block; width: 110px" class="title">Password:</span>
            <input type="password" name="password" value="<?php echo($password); ?>" size="25" autocomplete="off"/>
<?php
if ($error == 1)
{
    echo("&nbsp;&nbsp;<span style=\"color: red\">Both username and password are required.</span>");
}
else if ($error == 2)
{
    echo("&nbsp;&nbsp;<span style=\"color: red\">Username and password do not agree.</span>");
}
?>
            <p>
            <input type="submit" name="login" value="Login" onclick="logIn()"/>
        </form>
        <div class="password">
            Forgot password? <a href="forgot_password.php">Click here</a>.
        </div>
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
