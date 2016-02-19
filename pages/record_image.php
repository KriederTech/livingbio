<?php
require_once(dirname(__FILE__).'/../util/authenticate.php');
require_once(dirname(__FILE__).'/../util/utils.php');

$doc_id = null;
if (isset($_REQUEST['id']))
{
    $doc_id = clean_input($_REQUEST['id']);
}

$index = array_search($doc_id, $_SESSION['img']['doc_id']);

$document = $_SESSION['img']['document'][$index];

$imgdata = base64_decode($document);
$f = finfo_open();
$mime_type = finfo_buffer($f, $imgdata, FILEINFO_MIME_TYPE);

$src = 'data:'.$mime_type.';base64,'.$document;
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Medical Record</title>
<link href="css/popup.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php
if (eregi('image/', $mime_type))
{
    echo('<img id="img" src="'.$src.'" />'."\n");
}
else
{
    if((isset($_SERVER['HTTP_USER_AGENT']) && (strpos($_SERVER['HTTP_USER_AGENT'], 'Trident') !== false || strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)))
    {
        // IE
        echo('<object data="record_iehack.php?id='.$doc_id.'" type="'.$mime_type.'" width="100%" height="100%"></object>'."\n");
    }
    else
    {
        // Not IE
        echo('<object data="'.$src.'" type="'.$mime_type.'" width="100%" height="100%"></object>'."\n");
    }
}
?>
</body>
</html>
