<?php
require_once(dirname(__FILE__).'/../properties/constants.php');
require_once(dirname(__FILE__).'/../util/authenticate.php');
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
</script>
</head>

<body>
<?php include 'header.php';?>

<div class="wrap">
    <div id="content">
        <?php include 'privacy_content.php';?>
    </div>
</div>
   
<?php include 'footer.php';?>
</body>
</html>
