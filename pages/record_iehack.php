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

header("Content-type: application/pdf");
echo(base64_decode($document));
?>
