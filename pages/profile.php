<?php
require_once(dirname(__FILE__).'/../properties/constants.php');
require_once(dirname(__FILE__).'/../util/authenticate.php');
require_once(dirname(__FILE__).'/../util/utils.php');
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>drIDme</title>
<link href="css/main.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="css/nav.css" type="text/css" />
<link rel="stylesheet" href="css/cal.css" type="text/css" />

<!--<link type="text/css" rel="stylesheet" href="css/jquery.dropdown.css" />
<script type="text/javascript" src="jquery.dropdown.js"></script>-->
<script>
function popup(mylink, windowname)
{
    if (!window.focus) return true;
    var href;
    if (typeof(mylink) == 'string')
    {
        href = mylink;
    }
    else
    {
        href = mylink.href;
    }
    window.open(href, windowname, 'left=500, top=200, width=800, height=600, scrollbars=yes');
    return false;
}
</script>
</head>

<body>
<?php include 'header.php';?>

<div class="wrap">
<div id="content">
    <?php include 'profile_content.php';?>
</div>
</div>

<?php include 'footer.php';?>
</body>
</html>
