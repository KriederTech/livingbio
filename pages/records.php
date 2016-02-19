<?php
require_once(dirname(__FILE__).'/../db/medicalrecordDB.php');
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
<script src="../pages/js/jquery-1.11.1.min.js"></script>
<script src="../pages/js/naturalsize.js"></script>
<!--<link type="text/css" rel="stylesheet" href="css/jquery.dropdown.css" />
	<script type="text/javascript" src="jquery.dropdown.js"></script>-->
<script>
$(document).ready(function() {
    $('.img-zoom').hover(function() {
        var iWidth = $(this).width();
        var nWidth = $(this).naturalWidth();
        var scale = nWidth / iWidth;

        $(this).css({
            'position': 'relative',
            'z-index': 99,
            '-webkit-transform': 'scale('+scale+')',
            '-moz-transform': 'scale('+scale+')',
            '-o-transform': 'scale('+scale+')',
            '-ms-transform': 'scale('+scale+')',
            'transform': 'scale('+scale+')'
        });
    }, function() {
        $(this).css({
            'position': 'relative',
            'z-index': 0,
            '-webkit-transform': 'scale(1)',
            '-moz-transform': 'scale(1)',
            '-o-transform': 'scale(1)',
            '-ms-transform': 'scale(1)',
            'transform': 'scale(1)'
        });
    });
});

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

function popupImage(mylink, windowname, width, height)
{
    if (!window.focus) return true;
    var href, left, top, awidth, aheight;
    if (typeof(mylink) == 'string')
    {
        href = mylink;
        xpos = 500;
        ypox = 200;
    }
    else
    {
        href = mylink.href;
        left = mylink.getBoundingClientRect().left;
        top = mylink.getBoundingClientRect().top;

        xpos = left - (0.25 * width);
        ypos = top - (0.75 * height);
    }
    window.open(href, windowname, 'left='+xpos+', top='+ypos+', width='+width+', height='+height+', scrollbars=yes');
    return false;
}
</script>
</head>

<body>
<?php include 'header.php';?>

<div class="wrap">
    <div id="content">
        <?php include 'records_content.php';?>
    </div>
</div>
   
<?php include 'footer.php';?>
</body>
</html>
